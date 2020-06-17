<?php
namespace app\api\controller;

use app\api\controller\Base;
use think\Db;

class Order extends Base
{
    public function _empty()
    {
        header("Location:/404.html");
        exit;
    }
    public function ajax()
    {
        $data=input('post.');
        //需要token 的页面
        if (!isset($data["lizhili"]) or !isset($data["type"]) or $data["lizhili"]!= "0d89b868429be6158ba1ebc0f7c073de") {
            header("Location:/404.html");
            exit;
        }
        $token=\request()->header('token');
        if (!!$token and (array)$token) {
            $myinfo=Db::name('user')->where('tonken', $token)->find();
        } else {
            header("Location:/404.html");
            exit;
        }
        
        //小程序支付
        if ($data['type'] == 'xcx_pay') {
            $config=Db::name('xcxpay')->column('value', 'name');
            $order=Db::name('order')->find($data['order_id']);
            $params = [
                           'appid' => $config['appid'],
                           'mch_id' => $config['mch_id'],
                           // 随机串，32字符以内
                           'nonce_str' => (string) mt_rand(10000, 99999),
                           // 商品名
                           'body' => $config['body'],
                           // 订单号，自定义，32字符以内。多次支付时如果重复的话，微信会返回“重复下单”
                           'out_trade_no' => $order['out_trade_no'],
                           // 订单费用，单位：分
                           'total_fee' => $order['goods_price_zong']*100,
                           'spbill_create_ip' => $_SERVER['REMOTE_ADDR'],
                           // 支付成功后的回调地址，服务端不一定真得有这个地址
                           'notify_url' => $config['notify_url'],
                           'trade_type' => 'JSAPI',
                           // 小程序传来的OpenID
                           'openid' =>$myinfo['openId'],
                       ];
                
            // 按照要求计算sign
                
            ksort($params);
            $sequence = '';
            foreach ($params as $key => $value) {
                $sequence .= "$key=$value&";
            }
                
            $sequence = $sequence . "key=".$config['key'];
            $params['sign'] = strtoupper(md5($sequence));
                
            // 给微信发出的请求，整个参数是个XML
                
            $xml = '<xml>' . PHP_EOL;
            foreach ($params as $key => $value) {
                $xml .= "<$key>$value</$key>" . PHP_EOL;
            }
            $xml .= '</xml>';
                
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://api.mch.weixin.qq.com/pay/unifiedorder');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            $output = curl_exec($ch);
                
            if (false === $output) {
                echo 'CURL Error:' . curl_error($ch);
            }
                
            // 下单成功的话，微信返回个XML，里面包含prepayID，提取出来
                
            if (0 === preg_match('/<prepay_id><\!\[CDATA\[(\w+)\]\]><\/prepay_id>/', $output, $match)) {
                echo $output;
                exit(0);
            }
                
            // 这里不是给小程序返回个prepayID，而是返回一个包含其他字段的JSON
            // 这个JSON小程序自己也可以生成，放在服务端生成是出于两个考虑：
            //
            // 1. 小程序的appid不用写在小程序的代码里，appid、secret信息全部由服务器管理，比较安全
            // 2. 计算paySign需要用到md5，小程序端使用的是JavaScript，没有内置的md5函数，放在服务端计算md5比较方便
            $prepayId = $match[1];
            $response= [
                           'appId' => $config['appid'],
                           // 随机串，32个字符以内
                           'nonceStr' => (string) mt_rand(10000, 99999),
                           // 微信规定
                           'package' => 'prepay_id=' . $prepayId,
                           'signType' => 'MD5',
                           // 时间戳，注意得是字符串形式的
                           'timeStamp' => (string) time(),
                       ];
            $sequence = '';
            foreach ($response as $key => $value) {
                $sequence .= "$key=$value&";
            }
            $response['paySign'] = strtoupper(md5("{$sequence}key=".$config['key']));
            // return $response;
            return json_encode($response);
        }
                
                
        
        
        //获取 默认地址
        if ($data['type']=='get_address_moren') {
            $address=Db::name('address')->where('user_id', $myinfo['id'])->where('moren', 1)->find();
            if ($address) {
                return \json(['code'=>1,'message'=>'获取成功','data'=>$address]);
            } else {
                return \json(['code'=>2,'message'=>'没有默认地址']);
            }
        }
        //获取 所有地址
        if ($data['type']=='get_address_all') {
            $address=Db::name('address')->where('user_id', $myinfo['id'])->select();
            if ($address) {
                return \json(['code'=>1,'message'=>'获取成功','data'=>$address]);
            } else {
                return \json(['code'=>2,'message'=>'没有地址']);
            }
        }
        //地址列表 设为默认
        if ($data['type']=='updata_address_moren') {
            //去掉默认
            Db::name('address')->where('user_id', $myinfo['id'])->update(['moren'=>0]);
            $address=Db::name('address')->where('user_id', $myinfo['id'])->where('id', $data['address_id'])->update(['moren'=>1]);
            if ($address) {
                return \json(['code'=>1,'message'=>'修改成功']);
            } else {
                return \json(['code'=>0,'message'=>'修改失败']);
            }
        }
        
        //获取 指定id 地址
        if ($data['type']=='get_address_id') {
            $address=Db::name('address')->find($data['id']);
            if ($address) {
                return \json(['code'=>1,'message'=>'获取成功','data'=>$address]);
            } else {
                return \json(['code'=>0,'message'=>'没有地址']);
            }
        }
        //获取 添加默认地址 修改地址
        if ($data['type']=='add_address_moren') {
            $info=json_decode($data['data'], true);
            //去掉默认
            Db::name('address')->where('user_id', $myinfo['id'])->update(['moren'=>0]);
            $address=model('address');
            $data1=[
               'user_id'=>$myinfo['id'],
              'name'=>$info['name'],
               'sheng'=>$data['sheng'],
               'shi'=>$data['shi'],
               'xian'=>$data['xian'],
               'moren'=>1,
               'address'=>$info['address'],
               'phone'=>$info['phone'],
           ];
            if ($data['id']) {
                if ($address->save($data1, ['id'=>$data['id']])) {
                    return \json(['code'=>1,'message'=>'修改成功']);
                } else {
                    return \json(['code'=>0,'message'=>'修改失败']);
                }
            } else {
                if ($address->save($data1)) {
                    return \json(['code'=>1,'message'=>'插入成功']);
                } else {
                    return \json(['code'=>0,'message'=>'插入失败']);
                }
            }
        }
        // 删除地址
        if ($data['type']=='del_address') {
            if (Db::name('address')->where('user_id', $myinfo['id'])->where('id', $data['address_id'])->where('moren', 1)->find()) {
                return \json(['code'=>2,'message'=>'删除为默认，不能删除']);
            }
            $address=Db::name('address')->where('user_id', $myinfo['id'])->where('id', $data['address_id'])->delete();
            if ($address) {
                return \json(['code'=>1,'message'=>'删除成功']);
            } else {
                return \json(['code'=>0,'message'=>'删除失败']);
            }
        }
        //获取 获取购买商品
        if ($data['type']=='get_order_goods') {
            $goods=Db::name('goods')->find($data['goods_id']);
            if ($goods) {
                return \json(['code'=>1,'message'=>'获取成功','data'=>$goods]);
            } else {
                return \json(['code'=>0,'message'=>'失败']);
            }
        }
        // 确认收货
        if ($data['type']=='update_order_shouhuo') {
            $shouhuo=Db::name('order')->where('id', $data['id'])->update(['post_status'=>2]);
            if ($shouhuo) {
                return \json(['code'=>1,'message'=>'获取成功']);
            } else {
                return \json(['code'=>0,'message'=>'失败']);
            }
        }
        //添加 留言
        if ($data['type']=='update_order_liuyan') {
            Db::name('order')->where('id', $data['id'])->update(['isping'=>1]);
            $order=Db::name('order')->find($data['id']);
            $res=Db::name('evaluation')->insert([
                'order_id'=>$order['id'],
                'pingjia'=>$data['liuyan'],
                'time'=>time(),
                'user_id'=>$order['user_id'],
                'goods_id'=>$order['goods_id']
            ]);
            if ($res) {
                return \json(['code'=>1,'message'=>'获取成功']);
            } else {
                return \json(['code'=>0,'message'=>'失败']);
            }
        }
        //删除订单
        if ($data['type']=='del_order') {
            $shouhuo=Db::name('order')->where('id', $data['id'])->update(['delete_time'=>time()]);
            if ($shouhuo) {
                return \json(['code'=>1,'message'=>'获取成功']);
            } else {
                return \json(['code'=>0,'message'=>'失败']);
            }
        }

        //获取 添加到订单列表
        if ($data['type']=='update_order_goods') {
            $address_id=Db::name('address')->where('user_id', $myinfo['id'])->where('moren', 1)->value('id');
            $goods=Db::name('goods')->find($data['goods_id']);
            $order=model('order');
            $order->data([
                'income'=>(float)$goods['draw'],
               'goods_id'=>$data['goods_id'],
               'user_id'=>$myinfo['id'],
               'address_id'=>$address_id,
               'post_spent'=>(float)($goods['postage']*$data['num']), //邮费
               'payment'=>2, //2代表是微信支付
               'goods_price_zong'=>(float)($goods['postage']*$data['num'])+(float)($goods['shop_price']*$data['num']),
               'order_num'=>$data['num'],
               'goods_price'=>$goods['shop_price'],
               'out_trade_no'=>time().rand(111111, 999999) //编号
           ]);
            if ($order->save()) {
                return \json(['code'=>1,'message'=>'插入成功','id'=>$order->id]);
            } else {
                return \json(['code'=>0,'message'=>'插入失败']);
            }
        }
        //获取 获取订单列表 所有状态
        if ($data['type']=='get_order_list') {
            if (!isset($data['lei'])) {
                \json(['code'=>0,'message'=>'非法获取']);
            }

            if ($data['lei']=='daifahuo') {
                $where=[
                    'pay_status'=>1,
                    'post_status'=>0,
                    'order_status'=>0
               ];
            }
            if ($data['lei']=='daishouhuo') {
                $where='pay_status =1 and order_status = 1 and post_status <> 2';
            }
            if ($data['lei']=='daipingjia') {
                $where=[
                   'pay_status'=>1,
                   'post_status'=>2,
                   'order_status'=>1,
                   'isping'=>0
               ];
            }
            if ($data['lei']=='yiwancheng') {
                $where=[
                   'isping'=>1
               ];
            }
            
           
            $info=Db::name('order')->where($where)->whereNull('delete_time')->where('user_id', $myinfo['id'])->page($data['page'], 5)->select();

            foreach ($info as $k=>$v) {
                $info[$k]['img']=Db::name('goods')->where('id', $v['goods_id'])->value('goods_img');
                $info[$k]['goods_name']=Db::name('goods')->where('id', $v['goods_id'])->value('goods_name');
            }
            if ($info) {
                return \json(['code'=>1,'message'=>'获取成功','data'=>$info]);
            } else {
                return \json(['code'=>2,'message'=>'没有数据']);
            }
        }
        
        
        // 订单个数
        if ($data['type']=='get_order_num') {
            $infoone=Db::name('order')->where([
                'pay_status'=>1,
                'post_status'=>0,
                'order_status'=>0
            ])->whereNull('delete_time')->where('user_id', $myinfo['id'])->count();
            
            
        
            $infotwo=Db::name('order')->whereColumn([
                        ['pay_status',1],
                        ['order_status',1],
                       ['post_status','<>',2]
                    ])->whereNull('delete_time')->where('user_id', $myinfo['id'])->count();
            // dump(Db::getLastSql());
            $infothree=Db::name('order')->where([
                'pay_status'=>1,
                'post_status'=>2,
                'order_status'=>1,
                'isping'=>0
            ])->whereNull('delete_time')->where('user_id', $myinfo['id'])->count();
              
            
            return \json(['code'=>1,'message'=>'获取成功','infoone'=>$infoone,'infotwo'=>$infotwo,'infothree'=>$infothree]);
        }
       
       
       
        // 获取团队 3个
        if ($data['type']=='get_item_3') {
            $item=Db::name('user')->where('fid', $myinfo['id'])->limit(3)->select();
            
            $itemNum=Db::name('user')->where('fid', $myinfo['id'])->count();
    
           
            return \json(['code'=>1,'message'=>'获取成功','data'=>$item,'itemNum'=>$itemNum,'istui'=>$myinfo['istui']]);
        }
       
       
        if ($data['type']=='get_item_list') {
            $item=Db::name('user')->where('fid', $myinfo['id'])->select();
            foreach ($item as $k=>$v) {
                $item[$k]['zong']=Db::name('order')->where('user_id', $v['id'])->where('pay_status', 1)->where('post_status', 2)->sum('goods_price_zong');
            }
            
            $itemNum=Db::name('user')->where('fid', $myinfo['id'])->count();
               
            if ($item) {
                return \json(['code'=>1,'message'=>'获取成功','data'=>$item,'itemNum'=>$itemNum]);
            } else {
                return \json(['code'=>2,'message'=>'暂无数据']);
            }
        }
        
        if ($data['type']=='get_company') {
            $item=Db::name('company')->where('id', 1)->find();
               
            if ($item) {
                return \json(['code'=>1,'message'=>'获取成功','data'=>$item]);
            } else {
                return \json(['code'=>2,'message'=>'暂无数据']);
            }
        }
       
        if ($data['type']=='get_article_list') {
            $item=Db::name('article')->select();
              
            if ($item) {
                return \json(['code'=>1,'message'=>'获取成功','data'=>$item]);
            } else {
                return \json(['code'=>2,'message'=>'暂无数据']);
            }
        }
       
        if ($data['type']=='get_article_show') {
            $item=Db::name('article')->find($data['id']);
            if ($item) {
                return \json(['code'=>1,'message'=>'获取成功','data'=>$item]);
            } else {
                return \json(['code'=>2,'message'=>'暂无数据']);
            }
        }
       
        // 年份
        if ($data['type']=='get_income') {
            //获取年份
            $niannum=date('Y', time())-date('Y', $myinfo['create_time'])+1;
    
            //获取数据
            $user =Db::name('user')->where('fid', $myinfo['id'])->column('id');
            $nian=$this->getyue(date('Y', time()));
            $qian=[];
            foreach ($nian as $k=>$v) {
                $qian[]=Db::name('order')
               ->where('user_id', 'in', $user)
               ->where('order_time', '<>', null)
               ->where('order_time', '>', $v['start_time'])
               ->where('order_time', '<', $v['end_time'])
               ->where('pay_status', 1)
               ->where('post_status', '>', 0)
               ->sum('income');
            }
           
            $zong=Db::name('order')
               ->where('user_id', 'in', $user)
               ->where('order_time', '<>', null)
               ->where('pay_status', 1)
               ->where('post_status', '>', 0)
               ->sum('income');
            return \json(['code'=>1,'message'=>'获取成功','zong'=>$zong,'qian'=>$qian,'nian'=>['niannum'=>$niannum,'nian'=>date('Y', time())]]);
        }
        // 获取年数据
        if ($data['type']=='get_nian_data') {
            $user =Db::name('user')->where('fid', $myinfo['id'])->column('id');
            $nian=$this->getyue($data['nian']);
            $qian=[];
            foreach ($nian as $k=>$v) {
                $qian[]=Db::name('order')
                   ->where('user_id', 'in', $user)
                   ->where('order_time', '<>', null)
                   ->where('order_time', '>', $v['start_time'])
                   ->where('order_time', '<', $v['end_time'])
                   ->where('pay_status', 1)
                   ->where('post_status', '>', 0)
                   ->sum('income');
            }
                      
            return \json(['code'=>1,'message'=>'获取成功','qian'=>$qian]);
        }
       
        // 年份
        if ($data['type']=='get_income_list') {
            //获取年份
            $niannum=date('Y', time())-date('Y', $myinfo['create_time'])+1;
            //获取下一级
            $user =Db::name('user')->where('fid', $myinfo['id'])->column('id');
            $qian=[];
            for ($i=0;$i<$niannum;$i++) {
                $year=date('Y', time())-$i;
                $nian=$this->getyue($year);
                $qian[$year]=[];
                foreach ($nian as $k=>$v) {
                    $qian[$year][]=Db::name('order')
                       ->where('user_id', 'in', $user)
                       ->where('order_time', '<>', null)
                       ->where('order_time', '>', $v['start_time'])
                       ->where('order_time', '<', $v['end_time'])
                       ->where('pay_status', 1)
                       ->where('post_status', '>', 0)
                       ->sum('income');
                }
            }
            $zong=Db::name('order')
              ->where('user_id', 'in', $user)
              ->where('order_time', '<>', null)
              ->where('pay_status', 1)
              ->where('post_status', '>', 0)
              ->sum('income');
              
            if (Db::name('withdrawal')->where('user_id', $myinfo['id'])->where('status', 0)->find()) {
                $dang=true;
            } else {
                $dang=false;
            }
             
            return \json(['code'=>1,'message'=>'获取成功','zong'=>$zong,'qian'=>$qian,'money'=>$myinfo['money'],'dang'=>$dang]);
        }
        
        //提现申请判断
        if ($data['type']=='get_withdrawal_show') {
            $withdrawal= Db::name('withdrawal')->where('user_id', $myinfo['id'])->where('status', 1);
            
            if ($withdrawal) {
                return \json(['code'=>1,'message'=>'获取成功']);
            } else {
                return \json(['code'=>0,'message'=>'获取失败']);
            }
        }
        
        //添加提现申请
        if ($data['type']=='get_withdrawal') {
            $info=json_decode($data['data'], true);
            if ((float)$info['money'] <=0 or (float)$info['money']>$myinfo['money']) {
                return \json(['code'=>2,'message'=>'提现金额不对！']);
            }
            
            if (Db::name('withdrawal')->where('user_id', $myinfo['id'])->where('status', 0)->find()) {
                return \json(['code'=>2,'message'=>'正在提现，请等待审核！']);
            }
            
            
            
            $data = [
                    'name'=>$info['name'],
                    'user_id'=>$myinfo['id'],
                    'zfb'=>$info['zfb'],
                    'wx'=>$info['wx'],
                    'money'=>$info['money'],
                    'status'=>0,
                ];
            $withdrawal=model('withdrawal');
            $withdrawal= $withdrawal->save($data);
            
            if ($withdrawal) {
                return \json(['code'=>1,'message'=>'获取成功']);
            } else {
                return \json(['code'=>0,'message'=>'获取失败']);
            }
        }
       
       
       
       
       
        return \json(['code'=>0,'message'=>'非法获取']);
    }
    
    public function getyue($time=2020)
    {
        $year = $time;
        $yeararr = [];
        $month = [];
        for ($i=1; $i <=12 ; $i++) {
            $yeararr[$i] = $year.'-'.$i;
        }
        foreach ($yeararr as $key => $value) {
            $timestamp = strtotime($value);
            $start_time = date('Y-m-1 00:00:00', $timestamp);
            $mdays = date('t', $timestamp);
            $end_time = date('Y-m-' . $mdays . ' 23:59:59', $timestamp);
        
            $month[$key]['start_time'] =strtotime($start_time);
            $month[$key]['end_time'] = strtotime($end_time);
        }
        return $month;
    }
}
