<?php /*a:3:{s:71:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\link\index.html";i:1585894975;s:73:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\common\_meta.html";i:1585880499;s:75:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\common\_footer.html";i:1585880499;}*/ ?>
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
<title>友情链接管理</title>
<meta name="keywords" content="李志立，lizhilimaster@163.com">
<meta name="description" content="李志立，lizhilimaster@163.com">
</head>
<body>
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 友情链接<span class="c-gray en">&gt;</span>
		链接管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);"
		 title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="pd-20 text-c">
		<div class="text-c">
			<form action="" method="get">
				<input type="text" name="key" value="<?php echo htmlentities($key); ?>" placeholder="友情链接名称" style="width:250px" class="input-text">
				<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
			</form>
		</div>
		<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="catesort()" class="btn btn-danger radius"><i
					 class="Hui-iconfont">&#xe6e2;</i> 更新排序</a> <a class="btn btn-primary radius" onclick="system_category_add('添加友情链接','<?php echo url('link/add'); ?>')"
				 href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加友情链接</a></span> <span class="r">共有数据：<strong><?php echo htmlentities($count1); ?></strong>
				条</span> </div>
		<div class="mt-20">
			<table class="table table-border table-bordered table-hover table-bg table-sort">
				<thead>
					<tr class="text-c">
						<th width="20">ID</th>
						<th width="20">排序</th>
						<th width="40">友情链接名称</th>
						<th width="100">友情链接地址</th>
						<th width="200">友情链接备注</th>
						<th width="10">操作</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($link) || $link instanceof \think\Collection || $link instanceof \think\Paginator): $i = 0; $__LIST__ = $link;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?>
					<tr class="text-c">
						<td><?php echo htmlentities($user['id']); ?></td>
						<td style="width: 15px;"><input type="text" name="<?php echo htmlentities($user['id']); ?>" class="input-text lizhi" value="<?php echo htmlentities($user['sort']); ?>"></td>
						<td><?php echo htmlentities($user['title']); ?></td>
						<td><a href="<?php echo htmlentities($user['linkurl']); ?>" target="_blank"><?php echo htmlentities($user['linkurl']); ?></a></td>
						<td><?php echo htmlentities($user['desc']); ?></td>
						<td class="f-14"><a title="编辑" href="javascript:;" onclick="system_category_edit('友情链接编辑','<?php echo url('link/edit',['id'=>$user['id']]); ?>')"
							 style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;" onclick="system_category_del(this,<?php echo htmlentities($user['id']); ?>)"
							 class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
					</tr>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>

		</div>
		<?php echo $link; ?>
	</div>
	<!--_footer 作为公共模版分离出去-->
	<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/manage/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/static/manage/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/manage/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/static/manage/static/h-ui.admin/js/H-ui.admin.js"></script> 
<!--/_footer 作为公共模版分离出去-->

	<script type="text/javascript" src="/static/manage/lib/My97DatePicker/4.8/WdatePicker.js"></script>
	<script type="text/javascript">
		/*系统-友情链接-添加*/
		function system_category_add(title, url, w, h) {
			layer_show(title, url, w, h);
		}
		/*系统-友情链接-编辑*/
		function system_category_edit(title, url, id, w, h) {
			layer_show(title, url, w, h);
		}
		/*系统-友情链接-删除*/
		function system_category_del(obj, id) {
			layer.confirm('确认要删除吗？', function(index) {
				$.post(
					"<?php echo url('link/ajax'); ?>", {
						id: id,
						type: 'link_del',
					},
					function(result) {
						if (result === 0) {
							layer.msg('删除失败!', {
								icon: 5,
								time: 1000
							});
						} else if (result === 1) {
							$(obj).parents("tr").remove();
							layer.msg('已删除!', {
								icon: 1,
								time: 1000
							});
						}
					});

			});
		}
		//自己编写更新排序

		function catesort() {
			layer.confirm('确认要更新排序吗？', function(index) {
				var x = document.getElementsByClassName("lizhi");
				var sortarr = new Array();
				var idarr = new Array();
				for (var i = 0; i < x.length; i++) {
					sortarr.push(x[i].value);
					idarr.push(x[i].name);
				}
				$.post(
					"<?php echo url('link/ajax'); ?>", {
						'sort': sortarr,
						'id': idarr,
						type: 'link_sort',
					},
					function(result) {
						//console.log(result);
						if (result === 1) {
							layer.msg('更新成功!', {
								icon: 1,
								time: 1000
							});
							history.go(0);
						} else {
							layer.msg('更新失败!', {
								icon: 5,
								time: 1000
							});
							history.go(0);
						}
					});
			});
		}
	</script>
	<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
