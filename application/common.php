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
function tonow($data)
{
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
function jiequ($data, $num=50)
{
    return mb_substr($data, 0, $num);
}
//下面自己编写的方法
function boot($data, $time=3000)
{ //广告幻灯片 利用Bootstrap
    $html='<div class="carousel slide lizhili_ad" data-ride="carousel" data-interval="'.$time.'"> 	<div class="carousel-inner">';
    foreach ($data as $k=>$v) {
        $html.='<div class="item ';
        if ($k==0) {
            $html.='active';
        }
        $html.='">		<a href="'.$v['url'].'" target="_blank"><img src="'.$v['img'].'" /></a>		</div>';
    }
    $html.='</div></div>';
    return $html;
    //使用方法
    //{:boot($ad.index)}
}
function SuperSlide($data=null,$time=3000,$autoPlay=true,$next=false){
	$name='a'.uniqid();
	$shu='';
	foreach ($data as $k=>$v) {
	    $shu.="<li><a href='".$v['url']."' target='_blank'><img src='".$v['img']."' /></a></li>";
	}
	$qian='';
	if($next){
		$qian="/* 下面是前/后按钮代码，如果不需要删除即可 */
			.$name .prev,
			.$name .next{ position:absolute; left:3%; top:50%; margin-top:-25px; display:block; width:32px; height:40px; background:url(/static/slider-arrow.png) -110px 5px no-repeat; filter:alpha(opacity=50);opacity:0.5;   }
			.$name .next{ left:auto; right:3%; background-position:8px 5px; }
			.$name .prev:hover,
			.$name .next:hover{ filter:alpha(opacity=100);opacity:1;  }
			.$name .prevStop{ display:none;  }
			.$name .nextStop{ display:none;  }";
	}
	$html=<<<EOF
	<style type="text/css">
			/* 本例子css */
			.$name{ width:100%; height:auto; overflow:hidden; position:relative;}
			.$name .hd ul li.on{ background:#f00; color:#fff; }
			.$name .bd{ position:relative; height:100%; z-index:0;   }
			.$name .bd li{ zoom:1; vertical-align:middle;}
			.$name .bd img{ width:100%; height:auto; display:block;  }
			$qian
			</style>
			<div class="$name">
				<div class="bd">
					<ul>
						$shu
					</ul>
				</div>
				<!-- 下面是前/后按钮代码，如果不需要删除即可 -->
				<a class="prev" href="javascript:void(0)"></a>
				<a class="next" href="javascript:void(0)"></a>
			</div>
			<script src="/static/jquery.SuperSlide.2.1.3.source.js"></script>
			<script type="text/javascript">
			jQuery(".$name").slide({mainCell:".bd ul",effect:"leftLoop",autoPlay:$autoPlay,interTime:$time});
			</script>
EOF;

 return $html;
 //使用说明
 //需要提前引入 jq ，
 //参数 广告数据，间隔时间，自动播放，是否显示 上下箭头
 // {:SuperSlide($ad.index,$time=3000,$autoPlay=true,$next=false)}
}

function hot($id=0, $num=3, $field='*', $where=true, $debug=false) // 热门文章
{ 
    if ($id==0) {
        return 'id必须填写！';
    }
    if (!$debug and config('app_debug')) {
        $debug=true;
    }
    return model('cate')->hot($id, $num, $field, $where, $debug);
    //使用方法
    // {volist name=":hot($id,$num,$field,$where,$debug)" id="vo"}
    // {$vo.id}
    // {/volist}
}
function sui($id=0, $num=3, $field='*', $where=true, $debug=false) //随机读取文章,默认调用两级
{ 
    if ($id==0) {
        return 'id必须填写！';
    }
    if (!$debug and config('app_debug')) {
        $debug=true;
    }
    return model('cate')->hot($id, $num, $field, $where, $debug);
    //使用方法
    // {volist name=":hot($id,$num,$field,$where,$debug)" id="vo"}
    // {$vo.id}
    // {/volist}
}

function cate($id=0, $num=3, $offset=0, $field='*', $where=true, $debug=false)
{
    if ($id==0) {
        return 'id必须填写！';
    }
    if (!$debug and config('app_debug')) {
        $debug=true;
    }
    return model('cate')->cate($id, $num, $offset, $field, $where, $debug);
    //使用方法
    // {volist name=":cate($id,$num,$offset,$field,$where,$debug)" id="vo"}
    // {$vo.id}
    // {/volist}
}
function friend()
{
    if (!config('app_debug')) {
        $friend=db('link')->where('isopen', 1)->select();
    } else {
        if (!$friend=cache('friend')) {
            $friend=db('link')->where('isopen', 1)->select();
            cache('friend', $friend, 3600);
        }
    }
    return $friend;
    // 使用方法
    // {volist name=":friend()" id="vo"}
    // {$vo.id}
    // {/volist}
}
function nav()
{
    if (!config('app_debug')) {
        $cate = db('cate')->where('fid', 0)->field('id,catename,en_name')->where('isopen', 1)->order('sort asc')->select();
        foreach ($cate as $k=>$v) {
            $cate[$k]['zi']=db('cate')->where('fid', $v['id'])->field('id,catename,en_name')->order('sort asc')->where('isopen', 1)->select();
        }
    } else {
        if (!$cate=cache('cate')) {
            $cate = db('cate')->where('fid', 0)->field('id,catename,en_name')->where('isopen', 1)->order('sort asc')->select();
            foreach ($cate as $k=>$v) {
                $cate[$k]['zi']=db('cate')->where('fid', $v['id'])->field('id,catename,en_name')->order('sort asc')->where('isopen', 1)->select();
            }
            cache('cate', $cate, 3600);
        }
    }
    return $cate;
    // 使用方法
    // {volist name=":nav()" id="vo"}
    // {$vo.id}
    // {/volist}
}
