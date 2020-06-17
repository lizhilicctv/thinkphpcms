<?php
namespace app\api\controller;

use think\facade\Session;
use app\api\controller\Base;
use think\Db;
use think\facade\Env;
class Playbill extends Base
{
    public function _empty()
    {
        header("Location:/404.html");
        exit;
    }
    public function ajax()
    {
        $data=input('post.');
    
        if (!isset($data["lizhili"]) or !isset($data["type"]) or $data["lizhili"]!= "0d89b868429be6158ba1ebc0f7c073de") {
            header("Location:/404.html");
            exit;
        }
        $token=\request()->header('token');
       
        if ($token and (array)$token) {
            $myinfo=Db::name('user')->where('tonken', $token)->find();
        } else {
            header("Location:/404.html");
            exit;
        }
        //生成海报
        if ($data['type']=='get_playbill') {
            if ($myinfo['haibao']) {
                return \json(['code'=>1,'message'=>'完成','data'=>$myinfo['haibao']]);
            }
            
            //生成二维码
            $ACCESS_TOKEN=$this->getWxAccessToken();
            $url="https://api.weixin.qq.com/wxa/getwxacodeunlimit?access_token=".$ACCESS_TOKEN['access_token'];
            $post_data=
             array(
                 'page'=>'pages/index/index',
                 'scene'=>$myinfo['id']
             );
            $post_data=json_encode($post_data);
            $data1=$this->send_post($url, $post_data);
            $filename = 'xiao_img/'.$myinfo['id'].'_'.time().'.jpg';
            
            $file = fopen($filename, "w");
            fwrite($file, $data1);//写入
            fclose($file);//关闭
			
			
            $config = array(
              'image'=>array(
                array(
                  'url'=>Env::get('root_path').'public/'.$filename,     //二维码资源
                  'stream'=>0,
                  'left'=>45,
                  'top'=>-110,
                  'right'=>0,
                  'bottom'=>0,
                  'width'=>340,
                  'height'=>340,
                  'opacity'=>100
                )
              ),
              'background'=>Env::get('root_path').'public/'.'haibao.jpg'          //背景图
            );
            $filename = 'haibao/'.time().'.jpg';
            $img='/'.$this->createPoster($config, $filename);
			
            if (Db::name('user')->where('id',$myinfo['id'])->update([
                'haibao'=>$img
            ])) {
                return \json(['code'=>1,'message'=>'完成','data'=>$img]);
            } else {
                return \json(['code'=>0,'message'=>'生成错误！']);
            }
        }
        
        return \json(['code'=>0,'message'=>'非法获取']);
    }
    
    /**
     * 生成宣传海报
     * @param array  参数,包括图片和文字
     * @param string  $filename 生成海报文件名,不传此参数则不生成文件,直接输出图片
     * @return [type] [description]
     */
    private function createPoster($config=array(), $filename="")
    {
        //如果要看报什么错，可以先注释调这个header
        if (empty($filename)) {
            header("content-type: image/png");
        }
        $imageDefault = array(
        'left'=>0,
        'top'=>0,
        'right'=>0,
        'bottom'=>0,
        'width'=>100,
        'height'=>100,
        'opacity'=>100
      );
        $textDefault = array(
        'text'=>'',
        'left'=>0,
        'top'=>0,
        'fontSize'=>32,       //字号
        'fontColor'=>'255,255,255', //字体颜色
        'angle'=>0,
      );
        $background = $config['background'];//海报最底层得背景
        //背景方法
        $backgroundInfo = \getimagesize($background);
        $backgroundFun = 'imagecreatefrom'.image_type_to_extension($backgroundInfo[2], false);
        $background = $backgroundFun($background);
        $backgroundWidth = imagesx($background);  //背景宽度
      $backgroundHeight = imagesy($background);  //背景高度
      $imageRes = imageCreatetruecolor($backgroundWidth, $backgroundHeight);
        $color = imagecolorallocate($imageRes, 0, 0, 0);
        imagefill($imageRes, 0, 0, $color);
        // imageColorTransparent($imageRes, $color);  //颜色透明
        imagecopyresampled($imageRes, $background, 0, 0, 0, 0, imagesx($background), imagesy($background), imagesx($background), imagesy($background));
        //处理了图片
        if (!empty($config['image'])) {
            foreach ($config['image'] as $key => $val) {
                $val = array_merge($imageDefault, $val);
                $info = getimagesize($val['url']);
                $function = 'imagecreatefrom'.image_type_to_extension($info[2], false);
                if ($val['stream']) {   //如果传的是字符串图像流
                    $info = getimagesizefromstring($val['url']);
                    $function = 'imagecreatefromstring';
                }
                $res = $function($val['url']);
                $resWidth = $info[0];
                $resHeight = $info[1];
                //建立画板 ，缩放图片至指定尺寸
                $canvas=imagecreatetruecolor($val['width'], $val['height']);
                imagefill($canvas, 0, 0, $color);
                //关键函数，参数（目标资源，源，目标资源的开始坐标x,y, 源资源的开始坐标x,y,目标资源的宽高w,h,源资源的宽高w,h）
                imagecopyresampled($canvas, $res, 0, 0, 0, 0, $val['width'], $val['height'], $resWidth, $resHeight);
                $val['left'] = $val['left']<0?$backgroundWidth- abs($val['left']) - $val['width']:$val['left'];
                $val['top'] = $val['top']<0?$backgroundHeight- abs($val['top']) - $val['height']:$val['top'];
                //放置图像
          imagecopymerge($imageRes, $canvas, $val['left'], $val['top'], $val['right'], $val['bottom'], $val['width'], $val['height'], $val['opacity']);//左，上，右，下，宽度，高度，透明度
            }
        }
        //处理文字
        if (!empty($config['text'])) {
            foreach ($config['text'] as $key => $val) {
                $val = array_merge($textDefault, $val);
                list($R, $G, $B) = explode(',', $val['fontColor']);
                $fontColor = imagecolorallocate($imageRes, $R, $G, $B);
                $val['left'] = $val['left']<0?$backgroundWidth- abs($val['left']):$val['left'];
                $val['top'] = $val['top']<0?$backgroundHeight- abs($val['top']):$val['top'];
                imagettftext($imageRes, $val['fontSize'], $val['angle'], $val['left'], $val['top'], $fontColor, $val['fontPath'], $val['text']);
            }
        }
        //生成图片
        if (!empty($filename)) {
            $res = imagejpeg($imageRes, $filename, 90); //保存到本地
            imagedestroy($imageRes);
            if (!$res) {
                return false;
            }
            return $filename;
        } else {
            imagejpeg($imageRes);     //在浏览器上显示
            imagedestroy($imageRes);
        }
    }
    
    
    // public function erweima(){
            
    //     }
    /**
        * 消息推送http
        * @param $url
        * @param $post_data
        * @return bool|string
        */
    protected function send_post($url, $post_data)
    {
        $options = array(
                'http' => array(
                    'method'  => 'POST',
                    'header'  => 'Content-type:application/json',
                    //header 需要设置为 JSON
                    'content' => $post_data,
                    'timeout' => 60
                    //超时时间
                )
            );
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return $result;
    }
    //二进制转图片image/png
    public function data_uri($contents, $mime)
    {
        $base64   = base64_encode($contents);
        return ('data:' . $mime . ';base64,' . $base64);
    }
    
    public function getWxAccessToken()
    {
		$config=Db::name('xcxpay')->column('value', 'name');
        $appid = $config['appid'];
        $secret=$config['secret'];
        
        
        if (Session::get('access_token_'.$appid) && Session::get('expire_time_'.$appid)>time()) {
            return Session::get('access_token_'.$appid);
        } else {
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$secret;
            $access_token = $this->makeRequest($url);
            $access_token = json_decode($access_token['result'], true);
            Session::set('access_token_'.$appid, $access_token);
            Session::set('expire_time_'.$appid, time()+7000);
            return $access_token;
        }
    }
    /**
     * 发起http请求
     * @param string $url 访问路径
     * @param array $params 参数，该数组多于1个，表示为POST
     * @param int $expire 请求超时时间
     * @param array $extend 请求伪造包头参数
     * @param string $hostIp HOST的地址
     * @return array    返回的为一个请求状态，一个内容
     */
    public function makeRequest($url, $params = array(), $expire = 0, $extend = array(), $hostIp = '')
    {
        if (empty($url)) {
            return array('code' => '100');
        }
    
        $_curl = curl_init();
        $_header = array(
            'Accept-Language: zh-CN',
            'Connection: Keep-Alive',
            'Cache-Control: no-cache'
        );
        // 方便直接访问要设置host的地址
        if (!empty($hostIp)) {
            $urlInfo = parse_url($url);
            if (empty($urlInfo['host'])) {
                $urlInfo['host'] = substr(DOMAIN, 7, -1);
                $url = "http://{$hostIp}{$url}";
            } else {
                $url = str_replace($urlInfo['host'], $hostIp, $url);
            }
            $_header[] = "Host: {$urlInfo['host']}";
        }
    
        // 只要第二个参数传了值之后，就是POST的
        if (!empty($params)) {
            curl_setopt($_curl, CURLOPT_POSTFIELDS, http_build_query($params));
            curl_setopt($_curl, CURLOPT_POST, true);
        }
    
        if (substr($url, 0, 8) == 'https://') {
            curl_setopt($_curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($_curl, CURLOPT_SSL_VERIFYHOST, false);
        }
        curl_setopt($_curl, CURLOPT_URL, $url);
        curl_setopt($_curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($_curl, CURLOPT_USERAGENT, 'API PHP CURL');
        curl_setopt($_curl, CURLOPT_HTTPHEADER, $_header);
    
        if ($expire > 0) {
            curl_setopt($_curl, CURLOPT_TIMEOUT, $expire); // 处理超时时间
            curl_setopt($_curl, CURLOPT_CONNECTTIMEOUT, $expire); // 建立连接超时时间
        }
    
        // 额外的配置
        if (!empty($extend)) {
            curl_setopt_array($_curl, $extend);
        }
    
        $result['result'] = curl_exec($_curl);
        $result['code'] = curl_getinfo($_curl, CURLINFO_HTTP_CODE);
        $result['info'] = curl_getinfo($_curl);
        if ($result['result'] === false) {
            $result['result'] = curl_error($_curl);
            $result['code'] = -curl_errno($_curl);
        }
    
        curl_close($_curl);
        return $result;
    }
}
