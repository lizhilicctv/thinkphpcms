<?php
namespace app\api\controller;
use app\api\controller\Base;
use app\manage\model\Category as Categorymodel;
use think\Db;
class Goods extends Base
{
	 public function _empty()
    {
        header("Location:/404.html"); 
        exit;
    }
   public function ajax()
   {
   	$data=input('param.');
	//确认本地存储密钥是否正确
	if($data['type']=='que_mi'){
		$res=Db::name('member')->where('rand_key',$data['user_key'])->find();
		if(!$res){
			return ['code'=>0,'message'=>'尚未登录'];
		}else{
			return ['code'=>1,'message'=>'密码正确'];
		}
	}
	//下面是分类列表
	if($data['type']=='cate_list'){
		$one_cate=Db::name('category')->field('id,catename')->where('fid',0)->where('isopen',1)->select();
		foreach($one_cate as $k=>$v){ 
			$one_cate[$k]['cateid']=$v['id'];
			$one_cate[$k]['name']=$v['catename'];

		}
		if($one_cate){
			return ['code'=>1,'message'=>'获取栏目成功','data'=>$one_cate];
		}else{
			return ['code'=>0,'message'=>'获取栏目错误'];
		}
	}
	//下面是二级分类和商品
	if($data['type']=='cate_two'){
		$res = Db::name('goods')->field('id,goods_name,shop_price,md_pic,category_id')->where('finish',1)->select();
		
		//获取真实价格不包括,属性价格
		
		$arr=[];
		foreach($res as $k=>$v){
			$v['shop_price']=model('goods')->getMemberPrice($data['user_id'],$v['id']);
			$arr['price'.$v['category_id']][]=['productId'=>$v['id'],'name'=>$v['goods_name'],'img'=>$v['md_pic'],'price'=>$v['shop_price'],'id'=>$v['id']];
		}
		if($arr){
			return ['code'=>1,'message'=>'获取栏目成功','data'=>$arr];
		}else{
			return ['code'=>0,'message'=>'获取栏目错误'];
		}
	}
	
   //下面是收藏
	if($data['type']=='goods_collect'){
		$love=Db::name('member')->where('id',$data['user_id'])->value('love');
		if(!$love){
			$love=[];
		}else{
			$love = explode(",", $love);
		}
		
		if(in_array($data['id'], $love)){
			foreach($love as $k=>$v){  
		        if($v == $data['id']){  
		            unset($love[$k]);  
		        }  
			}
			$love=implode(",", $love);
			$res=Db::name('member')->where('id', $data['user_id'])->update(['love' => $love]);
			if($res){
				return ['code'=>1,'message'=>'移除收藏成功','data'=>0];
			}else{
				return ['code'=>0,'message'=>'移除收藏失败','data'=>1];
			}
		}else{
			array_push($love,$data['id']);
			$love=implode(",", $love);
			$res=Db::name('member')->where('id', $data['user_id'])->update(['love' => $love]);
			if($res){
				return ['code'=>1,'message'=>'添加收藏成功','data'=>1];
			}else{
				return ['code'=>0,'message'=>'添加收藏失败','data'=>0];
			}
		}		
   	return ['code'=>0,'message'=>'非法获取'];
   }
	//下面是搜索
	if($data['type']=='goods_sreach'){
		$sreach=Db::name('sokey')->select();
		if($sreach){
			return ['code'=>1,'message'=>'获取成功','data'=>$sreach];
		}else{
			return ['code'=>0,'message'=>'获取错误'];
		}
   	return ['code'=>0,'message'=>'非法获取'];
   }
	//下面是商品列表
	if($data['type']=='goods_list'){
		if(!isset($data['key'])){
			$data['key']='';
		}

		$goods=Db::name('goods')->where('goods_name','like','%'.$data['key'].'%')->where('finish',1)->order('shop_price desc,buy_num desc,id desc')->where('isopen',1)->select();
		//获取分类
		$category=Db::name('category')->order('id','desc')->where('isopen',1)->select();
		$category_name=Db::name('category')->order('id','desc')->where('isopen',1)->column('catename');
		//获取品牌
		$brand=Db::name('brand')->order('id','desc')->where('status',1)->select();
		$brand_name=Db::name('brand')->order('id','desc')->where('status',1)->column('brand_name');
		
		return ['code'=>1,'message'=>'获取列表成功','data'=>[
			'goods'=>$goods,
			'category'=>$category,
			'category_name'=>$category_name,
			'brand'=>$brand,
			'brand_name'=>$brand_name
		]];
		
   	return ['code'=>0,'message'=>'非法获取'];
   }
	
	//下面是商品列表排序 ,这里需要编写
	if($data['type']=='goods_sort'){
		if(!isset($data['key'])){
			$data['key']='';
		}

		if($data['category_id']==0){
			$category=[];
		}else{
			$category=['category_id'=>$data['category_id']];
		}
		if($data['brand_id']==0){
			$brand=[];
		}else{
			$brand=['brand_id'=>$data['brand_id']];
		}

		if($data['jia']==1){
			$jia='shop_price desc';
		}else{
			$jia='shop_price asc';
		}
		if($data['xiao']==1){
			$xiao='buy_num desc';
		}else{
			$xiao='buy_num asc';
		}

		$goods=Db::name('goods')
		->where($category)
		->where($brand)
		->where('isopen',1)
		->where('goods_name','like','%'.$data['key'].'%')
		->order($jia)
		->order($xiao)
		->where('finish',1)
		->select();
		if($goods){
			return ['code'=>1,'message'=>'获取列表成功','data'=>$goods];
		}else{
			return ['code'=>0,'message'=>'获取列表错误'];
		}
	}
	//下面是商品详情
	if($data['type']=='goods_show'){
		
	
		//查询商品主表,注意下面价格用到,注意缓存
		$id=$data['goods_id'];
		Db::name('goods')->where('id', $id)->setInc('click_num');
		$goodsInfo=Db::name('goods')->find($id);
		if($goodsInfo['isopen'] == 0){
			return ['code'=>0,'message'=>'产品已经下架'];
		}
		
		//下面是猜你喜欢
		if(cache('ulike')){
		    $ulike=cache('ulike');
		}else{
		   $ulike=Db::name('goods')
		   ->alias('g')
		   ->join('category c','c.id = g.category_id','left')
		   ->field('g.id,md_pic,goods_name,shop_price,catename')->orderRaw('rand()')->limit(4)->select();
		    cache('ulike',$ulike,36000);
		}
		
		
		
		
		
		
		
 		//判断商品是否已经收藏
   		$love=Db::name('member')->where('id',$data['user_id'])->value('love');
   		if(!$love){
   			$love=[];
   		}else{
   			$love = explode(",", $love);
   		}
		
   		if(in_array($id, $love)){
   			$shou=1;
   		}else{
   			$shou=0;
   		}
		//查看产品规格
		$goods_norms=Db::name('goods_norms')->where('goods_id',$id)->select();
		
	
		if($data['user_id']==''){
			$real_price=0;
		}else{
			//查询会员折扣
			$points=Db::name('member')->where('id',$data['user_id'])->value('points');
			$rate=Db::name('member_level')->where('bom_point','<=',$points)->where('top_point','>=',$points)->field('id,rate')->find();
			
			$zhi=Db::name('member_price')->where('mlevel_id',$rate['id'])->where('goods_id',$id)->value('mprice');
			//真实价格，打完折之后的价格
			if($zhi){
				$real_price=$zhi;
			}else{
				$real_price=$goodsInfo['shop_price']*(int)$rate['rate']/100;
			}
			
		}

		
			
		//查询商品主图
		$goodsPhotoRes=Db::name('goods_photo')->field('md_photo as imgUrl')->where(array('goods_id'=>$id))->select();
	
		//获取并处理商品属性信息 ,单选属性
		$gaArr=db('goods_attr')->alias('ga')->field('ga.*,a.attr_name,a.attr_type')->join('attr a',"ga.attr_id = a.id")->where(array('ga.goods_id'=>$id))->select();
		foreach ($gaArr as $key => $value) {
			$gaArr[$key]['check']=FALSE;
		}
		$radioAttrArr=array();
		$uniAttrArr=array();
		foreach ($gaArr as $k => $v) {
		    if($v['attr_type'] == 1){
		        $radioAttrArr[$v['attr_id']][]=$v;
		    }else{
		        $uniAttrArr[]=$v;
		    }
		}
		
		//获取评论
		$pingjia=Db::name('evaluation')
		->alias('e')
		->join('member m','e.uid = m.id','left')
		->join('member_info mif','e.uid = mif.member_id','left')
		->where('e.goods_id',$id)
		->field('e.*,m.username,mif.urlimg')
		->order('e.id desc')->select();
		
		foreach ($pingjia as $key => $value) {
			if(isset($value['goods_attr_id'])){
				$newarr=explode('-', $value['goods_attr_id']);
				if($newarr[1]){
			            // 属性名称  属性值  属性价格
			            // 颜色       红色    0          颜色:红色  (￥ 0 元)  
			            // 尺寸       XXL     100
			            $goodsAttrStr=array();//商品单选属性字符串
			            $goodsAttrPrice=0;
			            $goodsAttrRes=db('goods_attr')->alias('ga')->field('ga.*,a.attr_name')->join('attr a',"ga.attr_id = a.id")->where('ga.id','in',$newarr[1])->select();
			            foreach ($goodsAttrRes as $k1 => $v1) {
			               $goodsAttrStr[]=$v1['attr_name'].':'.$v1['attr_value'].'(￥ '.$v1['attr_price'].'元)';
			               $goodsAttrPrice+=$v1['attr_price'];
			            }
			            $goodsAttrStr=implode(' - ', $goodsAttrStr);
			    }
				$pingjia[$key]['attr']=$goodsAttrStr;
			}
		}
		
		
		return ['code'=>1,'message'=>'获取成功','data'=>[
			'goodsInfo'=>$goodsInfo,
			'goods_norms'=>$goods_norms,
			'goodsPhotoRes'=>$goodsPhotoRes,
			'radioAttrArr'=>$radioAttrArr,
			'real_price'=>$real_price,
			'pingjia'=>$pingjia,
			'shou'=>$shou,
			'ulike'=>$ulike
		]];
	}
	//下面是修改价格和数量
	if($data['type']=='bian_jia'){
			
			$new=$data['goods_attr_ids'];
			if(substr( $new, 0, 1 ) == '['){
				$new=substr($new,0,strlen($new)-1);
				$new=substr($new,1);
			}
			
			$zong =model('goods')->getMemberPrice($data['uid'],$data['id'],$new);
				
			
			
			$arr_str=$data['goods_attr_ids'];
			if(substr( $arr_str, 0, 1 ) == '['){
				$arr_str=substr($arr_str,0,strlen($arr_str)-1);
				$arr_str=substr($arr_str,1);
			}

			$liarr = explode(",",$arr_str);
			sort($liarr);
			$att=implode(",",$liarr);
			//下面是读取库存
			$goodsnum=Db::name('goods_num')->where('goods_attr',$att)->value('goods_num');
			if(!isset($goodsnum) or $goodsnum <= 0){
				$goodsnum=0;
			}
			return ['code'=>1,'message'=>'查询成功','data'=>[
				'zong'=>$zong,
				'goodsnum'=>$goodsnum
			]];
		}
	
	
	
	return ['code'=>0,'message'=>'非法获取'];
	}
}
