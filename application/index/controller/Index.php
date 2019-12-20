<?php
namespace app\index\controller;

use app\index\controller\Base;
use think\Db;

use Qiniu\Storage\UploadManager;
use Qiniu\Auth;

//use Qiniu\Storage\BucketManager; //这个是管理七牛云

class Index extends Base
{
    public function _empty()
    {
        //重定向浏览器
        header("Location:/404.html");
        //确保重定向后，后续代码不会被执行
        exit;
    }
    public function index()
    {
		return $this->fetch();
    }
    public function index()
    {
        $accessKey='';  //密钥
        $secretKey='';
		$bucket = ''; //空间名字
        $auth = new Auth($accessKey, $secretKey);//验证权限
        // 生成上传Token
        $token = $auth->uploadToken($bucket, null, 3600);
        $upManager = new UploadManager();
		$filePath=dirname(__FILE__)."/111.jpg"; //需要上传的文件，可以是post提交过来的
		$name=time().'.jpg'; //自己定义的路径名字
        list($ret, $error) = $upManager->putFile($token, $name, $filePath);
		if($error){
			dump($error);
		}else{
			dump($ret); //上传之后的信息，包括名字和key
			dump('ok，成功后续操作！！！');
		}
    }
}
