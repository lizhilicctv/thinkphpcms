<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
//计算距离现在多长时间
function tonow($data){
		$data=time()-$data;
	  //计算天数
      $days = intval($data/86400);
      //计算小时数
      $remain = $data%86400;
      $hours = intval($remain/3600);
      //计算分钟数
      $remain = $data%3600;
      $mins = intval($remain/60);
      //计算秒数
      $secs = $data%60;
	return $days.'天'.$hours.'小时'.$mins.'分钟'.$secs.'秒';
}
function jiequ($data,$num=50){
	return mb_substr($data, 0, $num);
}
//下面自己编写的方法
function boot($data,$time=3000){
	$html='<div class="carousel slide lizhili_ad" data-ride="carousel" data-interval="'.$time.'"> 	<div class="carousel-inner">';
	foreach($data as $k=>$v){
		$html.='<div class="item ';
		if($k==0){
			$html.='active';
		}
		$html.='">		<a href="'.$v['url'].'" target="_blank"><img src="'.$v['img'].'" /></a>		</div>';
	}
	$html.='</div></div>';
	return $html;
	//使用方法
	//{:boot($ad.index)}
}
function cate($id=0,$num=3,$offset=0,$field='*',$where=true,$debug=false){
	if($id==0){
		return 'id必须填写！';
	}
	return model('cate')->cate($id,$num,$offset,$field,$where,$debug);
	//使用方法
	// {volist name=":cate($id,$num,$offset,$field,$where,$debug)" id="vo"}
	// {$vo.id}
	// {/volist}
}
function friend(){
	return db('link')->where('isopen',1)->select();
	// 使用方法
	// {volist name=":friend()" id="vo"}
	// {$vo.id}
	// {/volist}
}
function nav(){
	$cate = db('cate')->where('fid',0)->field('id,catename,en_name')->where('isopen',1)->order('sort asc')->select();
	foreach($cate as $k=>$v){
		$cate[$k]['zi']=db('cate')->where('fid',$v['id'])->field('id,catename,en_name')->order('sort asc')->where('isopen',1)->select();
	}
	return $cate;
	// 使用方法
	// {volist name=":nav()" id="vo"}
	// {$vo.id}
	// {/volist}
}