<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Base as Basemodel;
use think\Db;
use think\facade\Cache;
class Base extends Controller
{
    //date_default_timezone_set("PRC");
	public function initialize()
    {

		$base= new Basemodel();
		//系统配置
		if(config('app_debug')){
			$system=$base->getsystem();
		}else{
			if(!$system=Cache::get('system')){
				$system=$base->getsystem();
				Cache::set('system',$system,3600);
			}
		}
		$this->assign('system', $system);
		//分配广告
		if(config('app_debug')){
			$ad=$base->ad();
		}else{
			if(!$ad=Cache::get('ad')){
				$ad=$base->ad();
				Cache::set('ad',$ad,3600);
			}
		}
		$this->assign('ad', $ad);
    }
	
	
}