<?php /*a:3:{s:73:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\system\index.html";i:1585990579;s:73:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\common\_meta.html";i:1585880499;s:75:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\common\_footer.html";i:1585880499;}*/ ?>
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

<title>基本设置</title>
<meta name="keywords" content="李志立，lizhilimaster@163.com">
<meta name="description" content="李志立，lizhilimaster@163.com">
</head>
<body>
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 系统管理 <span class="c-gray en">&gt;</span>
		基本设置 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);"
		 title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<form action="" method="post" class="form form-horizontal" enctype="multipart/form-data" id="form-article-add">
				<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['type'] == '1'){ ?>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2"><?php echo htmlentities($vo['cnname']); ?>：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" id="website-title" placeholder="<?php if($vo['enname']=='redirect'): ?>请输入完整网站，http:// 开头<?php endif; ?>" name="<?php echo htmlentities($vo['enname']); ?>" value="<?php echo htmlentities($vo['value']); ?>" class="input-text">
					</div>
				</div>
				<?php } if($vo['type'] == '2'){ ?>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2"><?php echo htmlentities($vo['cnname']); ?>：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<textarea name="<?php echo htmlentities($vo['enname']); ?>" class="textarea"><?php echo htmlentities($vo['value']); ?></textarea>
					</div>
				</div>
				<?php } if($vo['type'] == '3'){ ?>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2"><?php echo htmlentities($vo['cnname']); ?>：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<?php $lizhi=explode(",",$vo['kxvalue']);
									foreach($lizhi as $k=>$v)
									{
								?>
						<div class="radio-box" style="margin-top: 3px;padding-left: 0;">
							<input type="radio" id="radio-1" name="value" <?php if($v==$vo['value']){ echo 'checked' ;}?> value="<?php echo $v ?>">
							<label for="radio-1">
								<?php echo $v ?></label>
						</div>
						<?php	}	?>

					</div>
				</div>
				<?php } if($vo['type'] == '4'){ ?>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2"><?php echo htmlentities($vo['cnname']); ?>：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<a href="javascript:void();" class="btn btn-primary radius"><i class="icon Hui-iconfont">&#xe642;</i> 浏览文件</a>
						<input type="file" class="input-file required" onchange='onpic(this)' name="img[]" class="img" accept='image/*'
						 style="font-size: 20px;left:0;" />
						<span class="sp"></span>
						<?php if($vo['type'] == 4){ ?>
						<img src="<?php echo htmlentities($vo['value']); ?>" height="60">
						<?php  } ?>

					</div>
				</div>
				<?php } ?>
				<?php endforeach; endif; else: echo "" ;endif; ?>
				<div class="row cl">
					<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
						<button onClick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i>
							保存</button>
						<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
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

	<style type="text/css">
		.li123 {
			line-height: 30px;
			background: burlywood;
			display: inline-block;
			vertical-align: middle;
			padding: 0 8px;
		}
	</style>
	<script type="text/javascript">
		$(function() {
			$('.skin-minimal input').iCheck({
				checkboxClass: 'icheckbox-blue',
				radioClass: 'iradio-blue',
				increaseArea: '20%'
			});

			function onpic(o) {
				var file = $(o)[0].files[0].name;
				$(o).parent().find('.sp').text('您已经选择图片：' + file);
				$(o).parent().find('.sp').addClass('li123');
			}
		});
	</script>
</body>
</html>
