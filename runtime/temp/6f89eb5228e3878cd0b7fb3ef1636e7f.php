<?php /*a:3:{s:72:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\article\add.html";i:1586853934;s:73:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\common\_meta.html";i:1585880499;s:75:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\common\_footer.html";i:1585880499;}*/ ?>
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
<title>新增文章 - 资讯管理 </title>
<meta name="keywords" content="李志立，lizhilimaster@163.com">
<meta name="description" content="李志立，lizhilimaster@163.com">
</head>
<body>
	<article class="page-container" style="padding-left: 100px !important;">
		<form class="form form-horizontal" enctype="multipart/form-data" action="" method="post" id="form-article-add">
			<div class="row cl">
				<label class="form-label col-xs-3 col-sm-2"><span class="c-red">*</span>文章标题：</label>
				<div class="formControls col-xs-9 col-sm-9">
					<input type="text" class="input-text" value="" placeholder="请输入文章标题" id="title" name="title">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-3 col-sm-2"><span class="c-red">*</span>分类栏目：</label>
				<div class="formControls col-xs-9 col-sm-9"> <span class="select-box">
						<select name="cateid" id="cate" class="select">
							<option value>全部栏目</option>
							<?php if(is_array($datasort) || $datasort instanceof \think\Collection || $datasort instanceof \think\Paginator): $i = 0; $__LIST__ = $datasort;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							<option value="<?php echo htmlentities($vo['id']); ?>">
								<?php if(isset($vo['level'])){echo str_repeat("|--",$vo['level']);}?><?php echo htmlentities($vo['catename']); ?></option>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</span> </div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-3 col-sm-2">关键词：</label>
				<div class="formControls col-xs-9 col-sm-9">
					<input type="text" class="input-text" value="" placeholder="请输入关键词" id="keyword" name="keyword">
				</div>
			</div>
			<div class="row cl wenzhang">
				<label class="form-label col-xs-3 col-sm-2">文章摘要：</label>
				<div class="formControls col-xs-9 col-sm-9">
					<textarea name="desc" cols="" rows="" id="desc" class="textarea" placeholder="说点什么...最少输入10个字符" datatype="*10-100"
					 dragonfly="true" nullmsg="备注不能为空！" onKeyUp="textlength()"></textarea>
					<p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-3 col-sm-2">文章作者：</label>
				<div class="formControls col-xs-9 col-sm-9">
					<input type="text" class="input-text" value="" placeholder="" id="author" name="author">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-3 col-sm-2">设为推荐：</label>
				<div class="formControls col-xs-9 col-sm-9">
					<div class="switch" data-on-label="开" data-off-label="关">
						<input type="checkbox" name="state" />
					</div>
				</div>
			</div>
			<div class="row cl wenzhang">
				<label class="form-label col-xs-3 col-sm-2">缩略图：</label>
				<div class="formControls col-xs-9 col-sm-9">
					<div class="uploader-thum-container">
						<a href="javascript:void();" class="btn btn-primary radius"><i class="icon Hui-iconfont">&#xe642;</i> 浏览文件</a>
						<input type="file" class="input-file" onchange='onpic()' name="pic" id="pic" value="" accept='image/*' style="font-size: 20px;left:0;" /><span
						 id="sp"></span>
					</div>
				</div>
			</div>
			<div class="row cl tupian"  style="display: none; background-color: #f2f2f2;padding: 5px 0;">
				<label class="form-label col-xs-3 col-sm-2"><span class="c-red">*</span><a class="dtbtn" onclick="adddtrow(this)">【+】</a>上传图片：</label>
				<div class="formControls col-xs-9 col-sm-9">
					
					<div class="uploader-thum-container">
						<a href="javascript:void();" class="btn btn-primary radius"><i class="icon Hui-iconfont">&#xe642;</i> 浏览文件</a>
						<input type="file" class="input-file" onchange='onpic1(this)' name="img_pic[]"  value="" accept='image/*' style="font-size: 20px;left:0;" /><span
						 class="sp1"></span>
					</div>
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-3 col-sm-2">自动缩略图：</label>
				<div class="formControls col-xs-9 col-sm-9">
					<div class="skin-minimal">
						<div class="check-box">
							<input name="ti" checked="checked" type="checkbox" id="checkbox-122">
							<label for="checkbox-122">自动提取内容第一张图片为缩率图</label>
						</div>
					</div>
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-3 col-sm-2"><span class="c-red">*</span>文章内容：</label>
				<div class="formControls col-xs-9 col-sm-9">
					<script id="editor" name='text' type="text/plain" style="width:100%;height:400px;"></script>
				</div>
			</div>
			<div class="row cl">
				<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
					<button class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i>&nbsp;&nbsp;提交</button>
				</div>
			</div>
		</form>
	</article>

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
		#abtn,.dtbtn{
			color: red;
		}
	</style>
	<script type="text/javascript" src="/static/manage/lib/My97DatePicker/4.8/WdatePicker.js"></script>
	<script type="text/javascript" src="/static/manage/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
	<script type="text/javascript" src="/static/manage/lib/jquery.validation/1.14.0/validate-methods.js"></script>
	<script type="text/javascript" src="/static/manage/lib/jquery.validation/1.14.0/messages_zh.js"></script>
	<script type="text/javascript" src="/static/manage/lib/ueditor/ueditor.config.js"></script>
	<script type="text/javascript" src="/static/manage/lib/ueditor/ueditor.all.min.js"> </script>
	<script type="text/javascript" src="/static/manage/lib/ueditor/lang/zh-cn/zh-cn.js"></script>
	<script type="text/javascript">
		$(function() {
			$('.skin-minimal input').iCheck({
				checkboxClass: 'icheckbox-blue',
				radioClass: 'iradio-blue',
				increaseArea: '20%'
			});

			$("#form-article-add").validate({
				rules: {
					title: {
						required: true,
					},
					cateid: {
						required: true,
					},
					text: {
						required: true,
					},
				}
			});
			var ue = UE.getEditor('editor');
			//获取默认栏目值
			if(!!$('#cate').val()){
			   $.post(
				"<?php echo url('article/ajax'); ?>",
			   {
				id:$('#cate').val(),
				type:'cate_article',
			   },
			   function(result){
				if(result==1){
					$('.tupian').hide();
					$('.wenzhang').show();
				}else if(result==3){
					$('.tupian').show();
					$('.wenzhang').hide();
				}
				  
			   });	
			}
			
		});
		
		$("#cate").change(function () {
		   if(!!$(this).val()){
			   $.post(
			   	"<?php echo url('article/ajax'); ?>",
			   {
			   	id:$(this).val(),
			   	type:'cate_article',
			   },
			   function(result){
			   	if(result==1){
					$('.tupian').hide();
					$('.wenzhang').show();
				}else if(result==3){
					$('.tupian').show();
					$('.wenzhang').hide();
				}
			      
			   });	
		   }
		})
		function adddtrow(o){
		    var div=$(o).parent().parent();
		    if($(o).html() == '【+】'){
		        var newdiv=div.clone();    
		        newdiv.find('.dtbtn').html('【-】');
				newdiv.find('input').val('');
				newdiv.find('.sp1').html('');
		        div.before(newdiv);
		    }else{
		        div.remove();
		    }
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
		function onpic1(e) {
			$(e).parent().find('.sp1').html(e.files[0].name).addClass('li123');
			//获取当前的值
		}
	</script>
	<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
