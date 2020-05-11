<?php /*a:3:{s:86:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\authrule\admin_permission.html";i:1585880499;s:73:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\common\_meta.html";i:1585880499;s:75:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\common\_footer.html";i:1585880499;}*/ ?>
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
<title>权限管理 - 管理员管理 </title>
<meta name="keywords" content="李志立，lizhilimaster@163.com">
<meta name="description" content="李志立，lizhilimaster@163.com">
</head>
<body>
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span>
		权限管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);"
		 title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="Hui-article">
		<article class="cl pd-20">

			<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="catesort()" class="btn btn-danger radius"><i
						 class="Hui-iconfont">&#xe6e2;</i> 更新排序</a> <a href="javascript:;" onclick="admin_permission_add('添加权限节点','<?php echo url('AuthRule/add'); ?>','1000','610')"
					 class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加权限节点</a></span> <span class="r">共有数据：<strong><?php echo htmlentities($count1); ?></strong>
					条</span> </div>
			<table class="table table-border table-bordered table-bg">
				<thead>
					<tr>
						<th scope="col" colspan="7">权限节点</th>
					</tr>
					<tr class="text-c">
						<th width="40">ID</th>
						<th width="100">排序</th>
						<th width="500">权限名称</th>
						<th width="500">字段名</th>
						<th width="200">级别</th>
						<th width="100">操作</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($datasort) || $datasort instanceof \think\Collection || $datasort instanceof \think\Paginator): $i = 0; $__LIST__ = $datasort;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
					<tr class="text-c">

						<td><?php echo htmlentities($data['id']); ?></td>
						<td><input type="text" name="<?php echo htmlentities($data['id']); ?>" class="input-text lizhi" value="<?php echo htmlentities($data['sort']); ?>"></td>
						<td class="text-l" style="padding-left: 20px;">
							<?php if(isset($data['level'])){echo str_repeat("|--",$data['level']);}?><?php echo htmlentities($data['title']); ?>
						</td>
						<td><?php echo htmlentities($data['name']); ?></td>
						<td><?php echo htmlentities($data['level']); ?>级别</td>
						<td><a title="编辑" href="javascript:;" onclick="admin_permission_edit('角色编辑','<?php echo url('AuthRule/edit',['id'=>$data['id']]); ?>','1000','610')"
							 class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;"
							 onclick="admin_permission_del(this,<?php echo htmlentities($data['id']); ?>)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
					</tr>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
			<?php echo $show; ?>
		</article>
	</div>


	<!--_footer 作为公共模版分离出去-->
	<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/manage/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/static/manage/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/manage/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/static/manage/static/h-ui.admin/js/H-ui.admin.js"></script> 
<!--/_footer 作为公共模版分离出去-->
	<script type="text/javascript">
		/*管理员-权限-添加*/
		function admin_permission_add(title, url, w, h) {
			layer_show(title, url, w, h);
		}
		/*管理员-权限-编辑*/
		function admin_permission_edit(title, url, w, h) {
			layer_show(title, url, w, h);
		}

		/*管理员-权限-删除*/
		function admin_permission_del(obj, id) {
			layer.confirm('角色删除须谨慎，确认要删除吗？', function(index) {
				$.post(
					"<?php echo url('AuthRule/ajax'); ?>", {
						id: id,
						type: 'AuthRule_del',
					},
					function(result) {
						if (result === 1) {
							$(obj).parents("tr").remove();
							layer.msg('已删除!', {
								icon: 1,
								time: 1000
							});
						} else if (result === 2) {
							layer.msg('此角色拥有下级角色，不能删除！', {
								icon: 5,
								time: 3000
							});
						} else {
							layer.msg('删除失败!', {
								icon: 5,
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
					"<?php echo url('AuthRule/ajax'); ?>", {
						'sort': sortarr,
						'id': idarr,
						type: 'AuthRule_sort',
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
						}
					});
			});
		}
	</script>
	<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
