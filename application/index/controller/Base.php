<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Base as Basemodel;
use think\Db;
class Base extends Controller
{
    //date_default_timezone_set("PRC");
	public function initialize()
    {
		$base= new Basemodel();
		$system=$base->getsystem();
		if($system["value"] != "开启"){
			exit('网站关闭');
		}
		$this->assign('system', $system);
		//分配广告
		$this->assign('ad', $base->ad());
    }
	
	
}