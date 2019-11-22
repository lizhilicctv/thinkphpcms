<?php /*a:3:{s:78:"D:\phpstudy_pro\WWW\thinkphpcms.com\application\manage\view\system\config.html";i:1574395634;s:77:"D:\phpstudy_pro\WWW\thinkphpcms.com\application\manage\view\common\_meta.html";i:1572408326;s:79:"D:\phpstudy_pro\WWW\thinkphpcms.com\application\manage\view\common\_footer.html";i:1572408326;}*/ ?>
<!--_meta 作为公共模版分离出去-->
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
<!--/meta 作为公共模版分离出去-->

<title>基本设置</title>
</head>
<body>

	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 系统管理 <span class="c-gray en">&gt;</span>
		常用配置 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);"
		 title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<form action="" method="post" class="form form-horizontal" enctype="multipart/form-data" id="form-article-add">

				

				<div style="border: 1px solid #D0D0D0;padding-bottom: 20px;margin: 0 20px 20px 20px;border-radius: 20px;background: #fefefe">
					<div class="row cl">
						<label class="form-label col-xs-4 col-sm-2">
							<h3>水印设置</h3>
						</label>
					</div>
					<div class="row cl">
						<label class="form-label col-xs-4 col-sm-2"  style="font-weight: 600;">是否开启水印：</label>
						<div class="formControls col-xs-8 col-sm-9 skin-minimal">
							<div class="radio-box">
								<input type="radio" value="1" <?php if($data['watermark']==1): ?> checked="checked" <?php endif; ?> id="radio-1" name="watermark">
								<label for="radio-1">开启</label>
							</div>
							<div class="radio-box">
								<input type="radio" value="0" <?php if($data['watermark']==0): ?> checked="checked" <?php endif; ?> id="radio-2" name="watermark">
								<label for="radio-2">关闭</label>
							</div>
						</div>
					</div>
					<div class="row cl">
						<label class="form-label col-xs-4 col-sm-2"  style="font-weight: 600;">水印位置：</label>
						<div class="formControls col-xs-8 col-sm-9 skin-minimal">
							<div class="radio-box">
								<input type="radio" value="1" <?php if($data['shui_weizhi']==1): ?> checked="checked" <?php endif; ?> id="radio-11" name="shui_weizhi">
								<label for="radio-11">左上角</label>
							</div>
							<div class="radio-box">
								<input type="radio" value="3" <?php if($data['shui_weizhi']==3): ?> checked="checked" <?php endif; ?> id="radio-22" name="shui_weizhi">
								<label for="radio-22">右上角</label>
							</div>
							<div class="radio-box">
								<input type="radio" value="9" <?php if($data['shui_weizhi']==9): ?> checked="checked" <?php endif; ?> id="radio-33" name="shui_weizhi">
								<label for="radio-33">右下角</label>
							</div>
							<div class="radio-box">
								<input type="radio" value="7" <?php if($data['shui_weizhi']==7): ?> checked="checked" <?php endif; ?> id="radio-44" name="shui_weizhi">
								<label for="radio-44">左下角</label>
							</div>
							<div class="radio-box">
								<input type="radio" value="5" <?php if($data['shui_weizhi']==7): ?> checked="checked" <?php endif; ?> id="radio-55" name="shui_weizhi">
								<label for="radio-55">居中</label>
							</div>
						</div>
					</div>
					<div class="row cl">
						<label class="form-label col-xs-4 col-sm-2"  style="font-weight: 600;">水印内容：</label>
						<div class="formControls col-xs-8 col-sm-9">
							<input type="text" placeholder="请填写水印内容" name="shui_neirong" value="<?php echo htmlentities($data['shui_neirong']); ?>" class="input-text">
						</div>
					</div>
					<div class="row cl">
						<label class="form-label col-xs-4 col-sm-2"  style="font-weight: 600;">水印字号：</label>
						<div class="formControls col-xs-8 col-sm-9">
							<input type="number" placeholder="请填写水印字号" name="shui_zihao" value="<?php echo htmlentities($data['shui_zihao']); ?>" class="input-text" style="width: 30%;">
						</div>
					</div>
					<div class="row cl">
						<label class="form-label col-xs-4 col-sm-2"  style="font-weight: 600;">水印颜色：</label>
						<div class="formControls col-xs-8 col-sm-9">
							<input type="text" placeholder="请填写水印颜色" name="shui_yanse" value="<?php echo htmlentities($data['shui_yanse']); ?>" class="input-text" style="width: 30%;">
						</div>
					</div>
				</div>

				<div style="border: 1px solid #D0D0D0;padding-bottom: 20px;margin: 0 20px  20px 20px;border-radius: 20px;background: #fefefe">
					<div class="row cl">
						<label class="form-label col-xs-4 col-sm-2">
							<h3>缩略图</h3>
						</label>
						<div class="formControls col-xs-8 col-sm-9" style="color: #31B0D5;text-align: left;line-height: 50px;padding-top: 10px;">开启后按照设置走(长宽比例不变，这里设定的是最大宽高)(默认宽高为300*300)。如果不开启，缩略图大小不变！</div>
					</div>
					<div class="row cl">
						<label class="form-label col-xs-4 col-sm-2" style="font-weight: 600;">开启缩略图设置：</label>
						<div class="formControls col-xs-8 col-sm-9 skin-minimal">
							<div class="radio-box">
								<input type="radio" value="1" <?php if($data['thumbnail']==1): ?> checked="checked" <?php endif; ?> id="radio-31" name="thumbnail">
								<label for="radio-31">开启</label>
							</div>
							<div class="radio-box">
								<input type="radio" value="0" <?php if($data['thumbnail']==0): ?> checked="checked" <?php endif; ?> id="radio-32" name="thumbnail">
								<label for="radio-32">关闭</label>
							</div>
						</div>
					</div>
					<div class="row cl">
						<label class="form-label col-xs-4 col-sm-2" style="font-weight: 600;">缩略图大小：</label>
						<div class="formControls col-xs-8 col-sm-9 ">
							缩略图宽: <input type="number" class="input-text" value="<?php echo htmlentities($data['t_w']); ?>" placeholder="请填写缩略图宽" name="t_w" style="width: 30%;"> px
							<span style="padding: 0 10px;">	</span>
							缩略图高: <input type="number" class="input-text" value="<?php echo htmlentities($data['t_h']); ?>" placeholder="请填写缩略图高" name="t_h" style="width: 30%;"> px
						</div>
					</div>

				</div>


				<div class="row cl">
					<div class="col-xs-8 col-sm-9 col-xs-offset-2 col-sm-offset-1">
						<button class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i>
							保存</button>

					</div>
				</div>
			</form>
		</article>
	</div>


	<!--_footer 作为公共模版分离出去-->
	<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/manage/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/static/manage/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/manage/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/static/manage/static/h-ui.admin/js/H-ui.admin.js"></script> 
	
<!--/_footer 作为公共模版分离出去-->
	<!--/_footer /作为公共模版分离出去-->

	<!--请在下方写此页面业务相关的脚本-->

	<script type="text/javascript">
		$(function() {
			$('.skin-minimal input').iCheck({
				checkboxClass: 'icheckbox-blue',
				radioClass: 'iradio-blue',
				increaseArea: '20%'
			});

		});
	</script>
	<!--/_footer /作为公共模版分离出去-->

	<!--请在下方写此页面业务相关的脚本-->


</body>
</html>
