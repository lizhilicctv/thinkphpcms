<?php /*a:5:{s:72:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\index\index.html";i:1589019350;s:73:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\common\_meta.html";i:1585880499;s:75:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\common\_header.html";i:1589019047;s:73:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\common\_menu.html";i:1589021973;s:75:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\common\_footer.html";i:1585880499;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/static/manage/lib/html5shiv.js"></script>
<script type="text/javascript" src="/static/manage/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/static/manage/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/static/manage/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/static/manage/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/static/manage/static/h-ui.admin/skin/green/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/static/manage/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="/static/manage/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>网站名称</title>
<meta name="keywords" content="李志立，lizhilimaster@163.com">
<meta name="description" content="李志立，lizhilimaster@163.com">
</head>
<body>
	<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl">
			<a class="logo navbar-logo f-l mr-10 hidden-xs" href="<?php echo url('index/index'); ?>">网站管理后台</a>
			<a class="logo navbar-logo-m f-l mr-10 visible-xs" href="<?php echo url('index/index'); ?>">网站管理后台</a>
			<span class="logo navbar-slogan f-l mr-10 hidden-xs">v1.3</span>
			<a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
			<nav class="nav navbar-nav">
				<ul class="cl">
					<li class="dropDown dropDown_hover">
						<?php if(is_array($pilot_nav) || $pilot_nav instanceof \think\Collection || $pilot_nav instanceof \think\Paginator): $i = 0; $__LIST__ = $pilot_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							<li class="navbar-levelone current" <?php if($i==1): ?>style="margin-left: 50px;"<?php endif; ?>>
								<a href="javascript:;"><?php echo htmlentities($vo['name']); ?></a>
							</li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
						<li>
							<a href="/" target="_blank">网站首页</a>
						</li>
					</li>
				</ul>
			</nav>
			<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
				<ul class="cl">
					<li>
						<?php echo session('uid')==1 ? '超级管理' : '管理员'; ?>
					</li>
					<li class="dropDown dropDown_hover">
						<a href="#" class="dropDown_A"><?php echo htmlentities(app('session')->get('name')); ?><i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">

							<li><a href="<?php echo url('login/out'); ?>">退出</a></li>
						</ul>
					</li>
					<li class="lizhili1" id="Hui-msg">
						<a data-href="<?php echo url('comment/index'); ?>" data-title="评论消息" href="javascript:;" title="评论消息"><span class="badge badge-danger"
							 id="lizhili_ping">评
								<?php if($comment!=0){ echo $comment; } ?></span><i class="Hui-iconfont" style="font-size:18px">&#xe622;</i></a>
					</li>
					<li class="lizhili1" id="Hui-msg">
						<a data-href="<?php echo url('message/index'); ?>" data-title="留言消息" href="javascript:;" title="留言消息"><span class="badge badge-danger"
							 id="lizhili_liu">留
								<?php if($message!=0){ echo $message; } ?></span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a>
					</li>
					<li id="Hui-skin" class="dropDown right dropDown_hover">
						<a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li>
								<a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a>
							</li>
							<li>
								<a href="javascript:;" data-val="blue" title="蓝色">蓝色</a>
							</li>
							<li>
								<a href="javascript:;" data-val="green" title="绿色">绿色</a>
							</li>
							<li>
								<a href="javascript:;" data-val="red" title="红色">红色</a>
							</li>
							<li>
								<a href="javascript:;" data-val="yellow" title="黄色">黄色</a>
							</li>
							<li>
								<a href="javascript:;" data-val="orange" title="橙色">橙色</a>
							</li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</header>

	<aside class="Hui-aside">
	<?php if(is_array($pilot_list) || $pilot_list instanceof \think\Collection || $pilot_list instanceof \think\Paginator): $i = 0; $__LIST__ = $pilot_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
	<div class="menu_dropdown bk_2">
		<?php if(is_array($vo) || $vo instanceof \think\Collection || $vo instanceof \think\Paginator): $i = 0; $__LIST__ = $vo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?>
		<dl >
			<?php if(count($vo1['zi']) > 0){ ?>
				<dt><i class="icon Hui-iconfont"><?php echo $vo1['icon']; ?></i> <?php echo htmlentities($vo1['name']); ?><i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<?php if(is_array($vo1['zi']) || $vo1['zi'] instanceof \think\Collection || $vo1['zi'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo1['zi'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
						<li>
							<a data-href="/manage.php/<?php echo $vo2['url']; ?>" data-title="<?php echo htmlentities($vo2['name']); ?>" href="javascript:void(0)"><?php echo htmlentities($vo2['name']); ?></a>
						</li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</dd>
			<?php }else{ ?>
				<dt><a data-href="/manage.php/<?php echo $vo1['url']; ?>" data-title="<?php echo htmlentities($vo1['name']); ?>" href="javascript:void(0)"><i class="Hui-iconfont"><?php echo $vo1['icon']; ?></i> <?php echo htmlentities($vo1['name']); ?></a></dt>
			<?php }?>
		</dl>
		<?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	<?php endforeach; endif; else: echo "" ;endif; ?>
</aside>
<div class="dislpayArrow hidden-xs">
	<a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a>
</div>

	<section class="Hui-article-box">
		<div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
			<div class="Hui-tabNav-wp">
				<ul id="min_title_list" class="acrossTab cl">
					<li class="active">
						<span title="系统信息" data-href="<?php echo url('main'); ?>">系统信息</span>
						<em></em></li>
				</ul>
			</div>
			<div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i
					 class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i
					 class="Hui-iconfont">&#xe6d7;</i></a></div>
		</div>
		<div id="iframe_box" class="Hui-article">
			<div class="show_iframe">
				<div style="display:none" class="loading"></div>
				<iframe scrolling="yes" frameborder="0" src="<?php echo url('main'); ?>"></iframe>
			</div>
		</div>
	</section>

	<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/manage/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/static/manage/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/manage/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/static/manage/static/h-ui.admin/js/H-ui.admin.js"></script> 
<!--/_footer 作为公共模版分离出去-->

	<!--请在下方写此页面业务相关的脚本-->
	<script type="text/javascript">
		$(function() {

			$("body").Huitab({
				tabBar: ".navbar-wrapper .navbar-levelone",
				tabCon: ".Hui-aside .menu_dropdown",
				className: "current",
				index: 0,
			});
		});
		/*个人信息*/
		function myselfinfo() {
			layer.open({
				type: 1,
				area: ['600px', '600px'],
				fix: false, //不固定
				maxmin: true,
				shade: 0.4,
				title: '帮助信息',
				content: ' <img src="/static/manage/qqimg.jpg" width="100" > <img src="/static/manage/weixinimg.jpg" width="100">',
			});
		}
	</script>
</body>
</html>
