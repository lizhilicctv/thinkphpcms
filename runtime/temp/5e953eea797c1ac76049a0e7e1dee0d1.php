<?php /*a:1:{s:72:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\login\login.html";i:1591351820;}*/ ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="renderer" content="webkit|ie-comp|ie-stand">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
		<meta http-equiv="Cache-Control" content="no-siteapp" />
		<!--[if lt IE 9]>
<script type="text/javascript" src="/static/manage/lib/html5shiv.js"></script>
<script type="text/javascript" src="/static/manage/lib/respond.min.js"></script>
<![endif]-->
		<link href="/static/manage/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
		<link href="/static/manage/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />
		<link href="/static/manage/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />
		<link href="/static/manage/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />
		<!--[if IE 6]>
<script type="text/javascript" src="/static/manage/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
		<title>后台登录</title>
		<meta name="keywords" content="李志立，lizhilimaster@163.com">
		<meta name="description" content="李志立，lizhilimaster@163.com">
	</head>
	<body>
		<div class="header"></div>
		<div class="loginWraper">
			<div id="loginform" class="loginBox">
				<form class="form form-horizontal" action="" method="post">
					<div class="row cl">
						<label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
						<div class="formControls col-xs-8">
							<input name="username" type="text" placeholder="账户" class="input-text size-L">
						</div>
					</div>
					<div class="row cl">
						<label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
						<div class="formControls col-xs-8">
							<input name="password" type="password" placeholder="密码" class="input-text size-L">
						</div>
					</div>
					<div class="row cl">
						<div class="formControls col-xs-8 col-xs-offset-3">
							<input class="input-text size-L" type="text" placeholder="验证码" onblur="if(this.value==''){this.value='验证码:'}"
							 onclick="if(this.value=='验证码:'){this.value='';}" value="验证码:" name="coder" style="width:180px;">
							<img src="<?php echo captcha_src(); ?>" onclick="this.src='<?php echo captcha_src(); ?>?'+Math.random()"> </div>
					</div>
					<div class="row cl">
						<div class="formControls col-xs-8 col-xs-offset-3">
							<input name="" type="submit" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
							<input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="footer">本后台系统由<a href="http://www.biaotian.net/" target="_blank" title="河北标天计算机" style="color: white;">河北标天计算机</a>提供技术支持</div>
		<script type="text/javascript" src="/static/manage/lib/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript" src="/static/manage/static/h-ui/js/H-ui.min.js"></script>
	</body>
</html>
