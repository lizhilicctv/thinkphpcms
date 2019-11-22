<?php /*a:3:{s:91:"D:\phpstudy_pro\WWW\thinkphpcms.com\application\manage\view\auth_group\admin_role_edit.html";i:1572408326;s:77:"D:\phpstudy_pro\WWW\thinkphpcms.com\application\manage\view\common\_meta.html";i:1572408326;s:79:"D:\phpstudy_pro\WWW\thinkphpcms.com\application\manage\view\common\_footer.html";i:1572408326;}*/ ?>
﻿<!--_meta 作为公共模版分离出去-->
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

<title>新建网站角色 - 管理员管理 - H-ui.admin v3.0</title>
<meta name="keywords" content="H-ui.admin v3.0,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.0，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="cl pd-20">
	<form action="" method="post" class="form form-horizontal" id="form-admin-role-add">
		<input type="hidden" name="id" value="<?php echo htmlentities($data['id']); ?>" />
		<div class="row cl">
			<label class="form-label col-xs-3 col-sm-2"><span class="c-red">*</span>角色名称：</label>
			<div class="formControls col-xs-9 col-sm-10">
				<input type="text" class="input-text" value="<?php echo htmlentities($data['title']); ?>" placeholder="" id="title" name="title" datatype="*4-16" nullmsg="用户账户不能为空">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-3 col-sm-2">备注：</label>
			<div class="formControls col-xs-9 col-sm-10">
				<input type="text" class="input-text" value="<?php echo htmlentities($data['desc']); ?>" placeholder="" id="desc" name="desc">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-3 col-sm-2">网站角色：</label>
			<div class="formControls col-xs-9 col-sm-10">
				<dl class="permission-list" id="lizhili">
				<?php if(is_array($datasort) || $datasort instanceof \think\Collection || $datasort instanceof \think\Paginator): $i = 0; $__LIST__ = $datasort;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['level'] == 0){ ?>
						<dt>
							<label>
								<input type="checkbox" value="<?php echo htmlentities($vo['id']); ?>" <?php $arr=explode(',', $data['rules']); if(in_array($vo['id'], $arr)){echo 'checked="checked"';} ?> id="f<?php echo htmlentities($vo['id']); ?>" name="rules[]">
								<?php echo htmlentities($vo['title']); ?></label>
						</dt>
					<?php }else{ ?>
									<div class="check-box" value="<?php echo htmlentities($vo['id']); ?>"  style="padding: 8px;">
									    <label ><input type="checkbox" class="f<?php echo htmlentities($vo['fid']); ?>" <?php $arr=explode(',', $data['rules']); if(in_array($vo['id'], $arr)){echo 'checked="checked"';} ?> name="rules[]" value="<?php echo htmlentities($vo['id']); ?>">
									    <?php echo htmlentities($vo['title']); ?></label>
									  </div>
					<?php } ?>
				
				<?php endforeach; endif; else: echo "" ;endif; ?>
				</dl>
				
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-3 col-sm-offset-2">
				<button type="submit" class="btn btn-success radius"><i class="icon-ok"></i> 确定</button>
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
<script type="text/javascript" src="__ADMIN__lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="__ADMIN__lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="__ADMIN__lib/jquery.validation/1.14.0/messages_zh.js"></script> 
<script type="text/javascript">
$(function(){
	$(".permission-list dt input:checkbox").click(function(){
		$(this).closest("dl").find("dd input:checkbox").prop("checked",$(this).prop("checked"));
	});
	$(".permission-list2 dd input:checkbox").click(function(){
		var l =$(this).parent().parent().find("input:checked").length;
		var l2=$(this).parents(".permission-list").find(".permission-list2 dd").find("input:checked").length;
		if($(this).prop("checked")){
			$(this).closest("dl").find("dt input:checkbox").prop("checked",true);
			$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",true);
		}
		else{
			if(l==0){
				$(this).closest("dl").find("dt input:checkbox").prop("checked",false);
			}
			if(l2==0){
				$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",false);
			}
		}
	});
	
	$("#form-admin-role-add").validate({
		rules:{
			title:{
				required:true,
			},
		},
		
	});
	
	$('#lizhili input').click(function(){
	    if($(this).attr('id')){
	    	var liz='.'+$(this).attr('id');
	    	if($(this).prop('checked')){
	    		$(liz).prop("checked",'checked');
	    	}else{
	    		$(liz).removeAttr("checked");
	    	}
	    }
	    if($(this).attr('class')){
	    	var liz='#'+$(this).attr('class');
	    	
	    	$(liz).prop("checked",'checked');
	    	
	    }
	  });
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>