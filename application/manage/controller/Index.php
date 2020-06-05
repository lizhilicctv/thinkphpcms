<?php
namespace app\manage\controller;
use app\manage\controller\Conn;
use think\Db;
class Index extends Conn
{
    public function index()
    {
    	
       return $this->fetch();
    }
	//核心页面
	public function main()
    {
		//文章统计
		$w_zong=Db::name('article')->count();
		$w_jin=Db::name('article')->where('to_days(date_format(from_UNIXTIME(`time`),\'%Y-%m-%d\')) = to_days(now())')->count();
		$w_zuo=Db::query('select count(*) from `lizhili_article` where to_days(date_format(from_UNIXTIME(`time`),\'%Y-%m-%d\')) - to_days(now()) <1 and to_days(date_format(from_UNIXTIME(`time`),\'%Y-%m-%d\')) - to_days(now()) <0;');
		$w_zhou=Db::name('article')->where('YEARWEEK(date_format(from_UNIXTIME(`time`),\'%Y-%m-%d\')) = YEARWEEK(now())')->count();
		$w_yue=Db::name('article')->where('date_format(date_format(from_UNIXTIME(`time`),\'%Y-%m-%d\'), \'%Y%m\') = date_format(curdate() ,\'%Y%m\')')->count();
		
		//留言统计
		$liu_zong=Db::name('message')->count();
		$liu_jin=Db::name('message')->where('to_days(date_format(from_UNIXTIME(`create_time`),\'%Y-%m-%d\')) = to_days(now())')->count();
 		$liu_zuo=Db::query('select count(*) from `lizhili_message` where to_days(date_format(from_UNIXTIME(`create_time`),\'%Y-%m-%d\')) - to_days(now()) <1 and to_days(date_format(from_UNIXTIME(`create_time`),\'%Y-%m-%d\')) - to_days(now()) <0;');
 		$liu_zhou=Db::name('message')->where('YEARWEEK(date_format(from_UNIXTIME(`create_time`),\'%Y-%m-%d\')) = YEARWEEK(now())')->count();
 		$liu_yue=Db::name('message')->where('date_format(date_format(from_UNIXTIME(`create_time`),\'%Y-%m-%d\'), \'%Y%m\') = date_format(curdate() ,\'%Y%m\')')->count();
		
		//用户统计
		$yong_zong=Db::name('member')->count();
		$yong_jin=Db::name('member')->where('to_days(date_format(from_UNIXTIME(`create_time`),\'%Y-%m-%d\')) = to_days(now())')->count();
		$yong_zuo=Db::query('select count(*) from `lizhili_member` where to_days(date_format(from_UNIXTIME(`create_time`),\'%Y-%m-%d\')) - to_days(now()) <1 and to_days(date_format(from_UNIXTIME(`create_time`),\'%Y-%m-%d\')) - to_days(now()) <0;');
		$yong_zhou=Db::name('member')->where('YEARWEEK(date_format(from_UNIXTIME(`create_time`),\'%Y-%m-%d\')) = YEARWEEK(now())')->count();
		$yong_yue=Db::name('member')->where('date_format(date_format(from_UNIXTIME(`create_time`),\'%Y-%m-%d\'), \'%Y%m\') = date_format(curdate() ,\'%Y%m\')')->count();
		
		//评论统计
		$ping_zong=Db::name('comment')->count();
		$ping_jin=Db::name('comment')->where('to_days(date_format(from_UNIXTIME(`create_time`),\'%Y-%m-%d\')) = to_days(now())')->count();
		$ping_zuo=Db::query('select count(*) from `lizhili_comment` where to_days(date_format(from_UNIXTIME(`create_time`),\'%Y-%m-%d\')) - to_days(now()) <1 and to_days(date_format(from_UNIXTIME(`create_time`),\'%Y-%m-%d\')) - to_days(now()) <0;');
		$ping_zhou=Db::name('comment')->where('YEARWEEK(date_format(from_UNIXTIME(`create_time`),\'%Y-%m-%d\')) = YEARWEEK(now())')->count();
		$ping_yue=Db::name('comment')->where('date_format(date_format(from_UNIXTIME(`create_time`),\'%Y-%m-%d\'), \'%Y%m\') = date_format(curdate() ,\'%Y%m\')')->count();

		$this->assign([
            'w'  => [
					'zong'=>$w_zong,
					'jin'=>$w_jin,
					'zuo'=>$w_zuo[0]["count(*)"],
					'zhou'=>$w_zhou,
					'yue'=>$w_yue,
			],
			'liu'  => [
					'zong'=>$liu_zong,
					'jin'=>$liu_jin,
					'zuo'=>$liu_zuo[0]["count(*)"],
					'zhou'=>$liu_zhou,
					'yue'=>$liu_yue,
			],
			'yong'  => [
					'zong'=>$yong_zong,
					'jin'=>$yong_jin,
					'zuo'=>$yong_zuo[0]["count(*)"],
					'zhou'=>$yong_zhou,
					'yue'=>$yong_yue,
			],
			'ping'  => [
					'zong'=>$ping_zong,
					'jin'=>$ping_jin,
					'zuo'=>$ping_zuo[0]["count(*)"],
					'zhou'=>$ping_zhou,
					'yue'=>$ping_yue,
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
