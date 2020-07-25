<?php
namespace app\manage\controller;
use app\manage\controller\Conn;
use think\Db;
use think\helper\Time;
class Index extends Conn
{
    public function index()
    {
       return $this->fetch();
    }
	//核心页面
	public function main()
    {
		// 今日开始和结束的时间戳
		list($tstart, $tend)=Time::today();
		// 昨日开始和结束的时间戳
		list($ystart, $yend)=Time::yesterday();
		// 本周开始和结束的时间戳
		list($wstart, $wend)=Time::week();
		// 本月开始和结束的时间戳
		list($mstart, $mend)=Time::month();
		$this->assign([
            'w'  => [
					'zong'=>Db::name('article')->count(),
					'jin'=>Db::name('article')->where('time','>',$tstart)->where('time','<',$tend)->count(),
					'zuo'=>Db::name('article')->where('time','>',$ystart)->where('time','<',$yend)->count(),
					'zhou'=>Db::name('article')->where('time','>',$wstart)->where('time','<',$wend)->count(),
					'yue'=>Db::name('article')->where('time','>',$mstart)->where('time','<',$mend)->count(),
			],
			'liu'  => [
					'zong'=>Db::name('message')->count(),
					'jin'=>Db::name('message')->where('create_time','>',$tstart)->where('create_time','<',$tend)->count(),
					'zuo'=>Db::name('message')->where('create_time','>',$ystart)->where('create_time','<',$yend)->count(),
					'zhou'=>Db::name('message')->where('create_time','>',$wstart)->where('create_time','<',$wend)->count(),
					'yue'=>Db::name('message')->where('create_time','>',$mstart)->where('create_time','<',$mend)->count(),
			],
			'yong'  => [
					'zong'=>Db::name('member')->count(),
					'zong'=>Db::name('member')->count(),
					'jin'=>Db::name('member')->where('create_time','>',$tstart)->where('create_time','<',$tend)->count(),
					'zuo'=>Db::name('member')->where('create_time','>',$ystart)->where('create_time','<',$yend)->count(),
					'zhou'=>Db::name('member')->where('create_time','>',$wstart)->where('create_time','<',$wend)->count(),
					'yue'=>Db::name('member')->where('create_time','>',$mstart)->where('create_time','<',$mend)->count(),
			],
			'ping'  => [
					'zong'=>Db::name('comment')->count(),
					'zong'=>Db::name('comment')->count(),
					'jin'=>Db::name('comment')->where('create_time','>',$tstart)->where('create_time','<',$tend)->count(),
					'zuo'=>Db::name('comment')->where('create_time','>',$ystart)->where('create_time','<',$yend)->count(),
					'zhou'=>Db::name('comment')->where('create_time','>',$wstart)->where('create_time','<',$wend)->count(),
					'yue'=>Db::name('comment')->where('create_time','>',$mstart)->where('create_time','<',$mend)->count(),
			],
        ]);
		
		$log=Db::name('log')->order('id desc')->find();
		$this->assign('log', $log);
		$count1=Db::name('log')->count();
		$this->assign('count1', $count1);
		$this->assign('cms', Db::name('cms')->find(1));
       return $this->fetch();
	   
    }
}
