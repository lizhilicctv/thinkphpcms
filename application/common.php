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
