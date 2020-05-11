<?php /*a:3:{s:70:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\slide\add.html";i:1585880499;s:73:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\common\_meta.html";i:1585880499;s:75:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\common\_footer.html";i:1585880499;}*/ ?>
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
<title>幻灯片添加</title>
<meta name="keywords" content="李志立，lizhilimaster@163.com">
<meta name="description" content="李志立，lizhilimaster@163.com">
</head>
<body>
	<div class="page-container">
		<form action="" method="post" class="form form-horizontal" id="form-category-add" enctype="multipart/form-data">
			<div id="tab-category" class="HuiTab">
				<div class="tabCon">
					<div class="row cl">
						<label class="form-label col-xs-3 col-sm-2"><span class="c-red">*</span> 图片标题：</label>
						<div class="formControls col-xs-9 col-sm-9">
							<input type="text" class="input-text" value="" placeholder="请输入图片标题" id="keyword" name="title">
						</div>
					</div>

					<div class="row cl">
						<label class="form-label col-xs-3 col-sm-2">链接地址：</label>
						<div class="formControls col-xs-9 col-sm-9">
							<input type="text" class="input-text" value="" placeholder="链接地址必须包含，http://" id="url" name="url">
						</div>
					</div>


					<div class="row cl">
						<label class="form-label col-xs-3 col-sm-2"><span class="c-red">*</span> 上传图片：</label>
						<div class="formControls col-xs-9 col-sm-9">
							<div class="uploader-thum-container">
								<a href="javascript:void();" class="btn btn-primary radius"><i class="icon Hui-iconfont">&#xe642;</i> 浏览文件</a>
								<input type="file" class="input-file" onchange='onpic()' name="img" id="pic" value="" accept='image/*' style="font-size: 20px;left:0;" /><span
								 id="sp"></span>
							</div>
						</div>
					</div>
					<div class="row cl">
						<label class="form-label col-xs-3 col-sm-2">是否启用：</label>
						<div class="formControls col-xs-9 col-sm-9">
							<div class="switch" data-on-label="开" data-off-label="关">
								<input type="checkbox" checked="checked" name="isopen" />
							</div>
						</div>
					</div>
					<div class="row cl">
						<label class="form-label col-xs-3 col-sm-2">文章摘要：</label>
						<div class="formControls col-xs-9 col-sm-9">
							<textarea name="desc" cols="" rows="" id="desc" class="textarea" placeholder="说点什么...最少输入10个字符" datatype="*10-100"
							 dragonfly="true" nullmsg="备注不能为空！" onKeyUp="textlength()"></textarea>
							<p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
						</div>
					</div>

					<div class="row cl">
						<div class="col-9 col-offset-2">
							<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
						</div>
					</div>
				</div>
			</div>
		</form>
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
	<!--请在下方写此页面业务相关的脚本-->
	<script type="text/javascript" src="/static/manage/lib/My97DatePicker/4.8/WdatePicker.js"></script>
	<script type="text/javascript" src="/static/manage/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
	<script type="text/javascript" src="/static/manage/lib/jquery.validation/1.14.0/validate-methods.js"></script>
	<script type="text/javascript" src="/static/manage/lib/jquery.validation/1.14.0/messages_zh.js"></script>
	<script type="text/javascript">
		$(function() {
			$('.skin-minimal input').iCheck({
				checkboxClass: 'icheckbox-blue',
				radioClass: 'iradio-blue',
				increaseArea: '20%'
			});

			$("#tab-category").Huitab({
				index: 0
			});
			$("#form-category-add").validate({
				rules: {
					title: {
						required: true,
					},
					img: {
						required: true,
					},
					url: {
						url: true,
					},
				}
			});

		});



		function removeIframe() {
			history.go(-1);
			return false;
		}

		function textlength() {
			var nmb = $('#desc').val().length;
			$('.textarea-length').text(nmb);
			if (nmb > 200) {
				$('#desc').css("background-color", "orangered");
			} else {
				$('#desc').css("background-color", "white");
			}
		}

		function onpic() {
			var file = document.getElementById("pic").files[0];
			document.getElementById("sp").innerHTML = '您已经选择图片：' + file['name'];
			document.getElementById("sp").className = 'li123';
		}
	</script>
	<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
