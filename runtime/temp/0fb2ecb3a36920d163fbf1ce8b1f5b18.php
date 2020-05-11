<?php /*a:3:{s:73:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\pilot\litadd.html";i:1589188188;s:73:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\common\_meta.html";i:1585880499;s:75:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\common\_footer.html";i:1585880499;}*/ ?>
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
						<label class="form-label col-xs-3 col-sm-2"><span class="c-red">*</span>顶部导航：</label>
						<div class="formControls col-xs-9 col-sm-9"> <span class="select-box">
								<select name="pn_id" class="select">
									<?php if(is_array($ding) || $ding instanceof \think\Collection || $ding instanceof \think\Paginator): $i = 0; $__LIST__ = $ding;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
									<option value="<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['name']); ?></option>
									<?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
							</span> </div>
					</div>
					<div class="row cl">
						<label class="form-label col-xs-3 col-sm-2"><span class="c-red">*</span>侧面父导航：</label>
						<div class="formControls col-xs-9 col-sm-9"> <span class="select-box">
								<select name="fid" id="cate" class="select">
									<option value=0>顶部栏目</option>
									<?php if(is_array($ce) || $ce instanceof \think\Collection || $ce instanceof \think\Paginator): $i = 0; $__LIST__ = $ce;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
									<option value="<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['name']); ?></option>
									<?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
							</span> </div>
					</div>
					<div class="row cl">
						<label class="form-label col-xs-3 col-sm-2"><span class="c-red">*</span> 导航名称：</label>
						<div class="formControls col-xs-9 col-sm-9">
							<input type="text" class="input-text" value="" placeholder="导航名称" name="name">
						</div>
					</div>
					<div class="row cl">
						<label class="form-label col-xs-3 col-sm-2"><span class="c-red">*</span> 图标：</label>
						<div class="formControls col-xs-9 col-sm-9">
							<input type="hidden" name="icon" id="icon" value="" />
							  <a onclick="system_category_add('添加侧面导航','<?php echo url('pilot/icon'); ?>',800,600)" href="javascript:void(0);" class="btn btn-primary radius btn-upload"><i class="Hui-iconfont">&#xe642;</i> 选择图标</a>
							   <i class="icon Hui-iconfont lizhili-icon">点击选择图标切换图标</i>
						</div>
					</div>
					<div class="row cl">
						<label class="form-label col-xs-3 col-sm-2"><span class="c-red">*</span> 导航地址：</label>
						<div class="formControls col-xs-9 col-sm-9">
							<input type="text" class="input-text" value="" placeholder="导航地址" name="url">
						</div>
					</div>
					<div class="row cl">
						<label class="form-label col-xs-3 col-sm-2">是否启用：</label>
						<div class="formControls col-xs-9 col-sm-9">
							<div class="switch" data-on-label="开" data-off-label="关">
								<input type="checkbox" name="isopen" checked="checked" />
							</div>
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
		.lizhili-icon{
			padding: 5px 8px;
			margin: 0 8px;
			font-size: 22px;
			background-color: #F2F2F2;
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
					name: {
						required: true,
					},
					pn_id: {
						required: true,
					},
					fid: {
						required: true,
					},
					icon: {
						required: true,
					},
					url: {
						required: true,
					},
				}
			});

		});
		function system_category_add(title, url, w, h) {
			window.index = layer.open({
				type: 2,
				title: title,
				content: url,
				area: [w+'px', h+'px'],
			});
			
		}
		function wo(e,v){
			$('.lizhili-icon').text(e)
			$('#icon').val(v);
		}
	</script>
	<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
