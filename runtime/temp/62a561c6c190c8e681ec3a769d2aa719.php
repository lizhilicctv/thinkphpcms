<?php /*a:3:{s:77:"D:\phpstudy_pro\WWW\thinkphpcms.com\application\manage\view\article\edit.html";i:1574389691;s:77:"D:\phpstudy_pro\WWW\thinkphpcms.com\application\manage\view\common\_meta.html";i:1572408326;s:79:"D:\phpstudy_pro\WWW\thinkphpcms.com\application\manage\view\common\_footer.html";i:1572408326;}*/ ?>
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

<title>新增文章 - 资讯管理 - H-ui.admin v3.0</title>
<meta name="keywords" content="H-ui.admin v3.0,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.0，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>

<article class="page-container" style="padding-left: 100px !important;">
	<form class="form form-horizontal" enctype="multipart/form-data"  action="" method="post" id="form-article-add">
		<input type="hidden" name="id" id="id" value="<?php echo htmlentities($data['id']); ?>" />
		<div class="row cl">
			<label class="form-label col-xs-3 col-sm-2"><span class="c-red">*</span>文章标题：</label>
			<div class="formControls col-xs-9 col-sm-9">
				<input type="text" class="input-text" value="<?php echo htmlentities($data['title']); ?>" placeholder="请输入文章标题" id="title" name="title">
			</div>
		</div>
		
		<div class="row cl">
			<label class="form-label col-xs-3 col-sm-2"><span class="c-red">*</span>分类栏目：</label>
			<div class="formControls col-xs-9 col-sm-9"> <span class="select-box">
				<select  name="cateid" class="select">
					<option value>全部栏目</option>
					<?php if(is_array($datasort) || $datasort instanceof \think\Collection || $datasort instanceof \think\Paginator): $i = 0; $__LIST__ = $datasort;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['id'] == $data['cateid']): ?> 
							<option value="<?php echo htmlentities($vo['id']); ?>" selected><?php if(isset($vo['level'])){echo str_repeat("|--",$vo['level']);}?><?php echo htmlentities($vo['catename']); ?></option>
						<?php else: ?> 
							<option value="<?php echo htmlentities($vo['id']); ?>"><?php if(isset($vo['level'])){echo str_repeat("|--",$vo['level']);}?><?php echo htmlentities($vo['catename']); ?></option>
						<?php endif; ?>
					
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-3 col-sm-2">关键词：</label>
			<div class="formControls col-xs-9 col-sm-9">
				<input type="text" class="input-text" value="<?php echo htmlentities($data['keyword']); ?>" placeholder="请输入关键词" id="keyword" name="keyword">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-3 col-sm-2">文章摘要：</label>
			<div class="formControls col-xs-9 col-sm-9">
				<textarea name="desc" id="desc" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="textlength()"><?php echo htmlentities($data['desc']); ?></textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-3 col-sm-2">文章作者：</label>
			<div class="formControls col-xs-9 col-sm-9">
				<input type="text" class="input-text" value="<?php echo htmlentities($data['author']); ?>" placeholder="" id="author" name="author">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-3 col-sm-2">设为推荐：</label>
			<div class="formControls col-xs-9 col-sm-9">
				<div class="switch"  data-on-label="开" data-off-label="关">
					<?php if($data['state'] == 1): ?> 
						<input type="checkbox" checked="checked" name="state"/>
					<?php else: ?> 
						<input type="checkbox" name="state"/>
					<?php endif; ?>
			    </div>
			</div>
		</div>
		 
		<div class="row cl">
			<label class="form-label col-xs-3 col-sm-2">缩略图：</label>
			<div class="formControls col-xs-9 col-sm-9">
				<div class="uploader-thum-container">
					<a href="javascript:void();" class="btn btn-primary radius"><i class="icon Hui-iconfont">&#xe642;</i> 浏览文件</a>
					<input type="file" class="input-file" onchange='onpic()' name="pic" id="pic" value="" accept='image/*' style="font-size: 20px;left:0;"/><span id="sp"></span>
				</div>
				<div style="margin-top: 15px;">
					<?php if($data['pic'] != ''): ?> 
						<img src="<?php echo htmlentities($data['pic']); ?>" height="60" style="margin: 20px;"/>
					<?php else: ?> 
						<div>暂无缩率图</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-3 col-sm-2">自动缩略图：</label>
			<div class="formControls col-xs-9 col-sm-9">
				 <div class="skin-minimal">
				    <div class="check-box">
				       <input name="ti" type="checkbox" id="checkbox-122">
				       <label for="checkbox-122">自动提取内容第一张图片为缩率图</label>
				     </div>
				</div>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-3 col-sm-2"><span class="c-red">*</span>文章内容：</label>
			<div class="formControls col-xs-9 col-sm-9"> 
				<script id="editor" type="text/plain" style="width:100%;height:400px;"><?php echo $data['editorValue']; ?></script> 
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button onClick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i>&nbsp;&nbsp;提交</button>
				<button onClick="removeIframe();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
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
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<style type="text/css">
	.li123{
		line-height: 30px;
		background: burlywood;
		display: inline-block;
		vertical-align: middle;padding: 0 8px;
	}
</style>
<script type="text/javascript" src="/static/manage/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/static/manage/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/static/manage/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/static/manage/lib/jquery.validation/1.14.0/messages_zh.js"></script>   
<script type="text/javascript" src="/static/manage/lib/webuploader/0.1.5/webuploader.min.js"></script> 
<script type="text/javascript" src="/static/manage/lib/ueditor/1.4.3/ueditor.config.js"></script> 
<script type="text/javascript" src="/static/manage/lib/ueditor/1.4.3/ueditor.all.min.js"> </script> 
<script type="text/javascript" src="/static/manage/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-article-add").validate({
		rules:{
			title:{
				required:true,
			},
			cateid:{
				required:true,
			},
			editor:{
				required:true,
			},
		}
	});
	

	var ue = UE.getEditor('editor');
	
});
function textlength(){
	var nmb=$('#desc').val().length;
	$('.textarea-length').text(nmb);
	if(nmb>200){
		$('#desc').css("background-color","orangered");
	}else{
		$('#desc').css("background-color","white");
	}
}
function removeIframe(){
	history.go(-1);
	return false;
}
function onpic(){
	var file=document.getElementById("pic").files[0];
	document.getElementById("sp").innerHTML='您已经选择图片：'+file['name'];
	document.getElementById("sp").className = 'li123';
}
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>