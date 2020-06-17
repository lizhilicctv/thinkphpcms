<?php
namespace app\api\controller;
use app\api\controller\Base;
use think\Db;
class Myinfo extends Base
{
	 public function _empty()
    {
        header("Location:/404.html"); 
        exit;
    }
   public function ajax()
   {
       $data=input('post.');

       if(!isset($data["lizhili"]) or !isset($data["type"]) or $data["lizhili"]!= "0d89b868429be6158ba1ebc0f7c073de" ){
           header("Location:/404.html");
           exit;
       }


       //获取首页产品
       if($data['type']=='login'){
		   $config=Db::name('xcxpay')->column('value', 'name');
			$appid = $config['appid'];
			$secret=$config['secret'];
           //获取key
           $url='https://api.weixin.qq.com/sns/jscode2session?appid='.$appid.'&secret='.$secret.'&js_code='.$data['code'].'&grant_type=authorization_code';
           $arr =json_decode(file_get_contents($url), true);
           include_once "wxBizDataCrypt.php";
           $sessionKey = $arr["session_key"];
           $encryptedData=$data['encryptedData'];
           $iv = $data['iv'];
           $pc = new \WXBizDataCrypt($appid, $sessionKey);
           $errCode = $pc->decryptData($encryptedData, $iv, $info);
           $info =json_decode($info, true);
           if(isset($info['openId']) and $res=Db::name('user')->where('openId',$info['openId'])->find()){
               return \json(['code'=>1,'message'=>'成功','data'=>[
                   'name'=>$res['nickName'],
                   'tonken'=>$res['tonken'],
                   'img'=>$res['avatarUrl'],
				   'istui'=>$res['istui']
               ]]);
           }
           if ($errCode == 0) {
                   $member=model('user');
                   $info['tonken']=md5($info['openId']);
				   $info['fid']=$data['fid'];
                   $member->allowField(true)->save($info);
                   return \json(['code'=>1,'message'=>'成功','data'=>[
                       'name'=>$info['nickName'],
                       'tonken'=> $info['tonken'],
                       'img'=>$info['avatarUrl'],
					   'istui'=>0
                   ]]);
           }else{
               return \json(['code'=>0,'message'=>'获取失败']);
           }
       }
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	
   	return \json(['code'=>0,'message'=>'非法获取']);
   }
	
	
}
