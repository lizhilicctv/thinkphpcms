<?php /*a:3:{s:81:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\authgroup\admin_role.html";i:1585880499;s:73:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\common\_meta.html";i:1585880499;s:75:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\common\_footer.html";i:1585880499;}*/ ?>
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
<title>角色管理 - 管理员管理 </title>
<meta name="keywords" content="李志立，lizhilimaster@163.com">
<meta name="description" content="李志立，lizhilimaster@163.com">
</head>
<body>
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span>
		角色管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);"
		 title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<div class="cl pd-5 bg-1 bk-gray"> <span class="l"> <a href="javascript:;" onclick="catesort()" class="btn btn-danger radius"><i
						 class="Hui-iconfont">&#xe6e2;</i> 角色排序</a> <a class="btn btn-primary radius" href="javascript:;" onclick="admin_role_add('添加角色','<?php echo url('AuthGroup/add'); ?>','900')"><i
						 class="Hui-iconfont">&#xe600;</i> 添加角色</a> </span> <span class="r">共有数据：<strong><?php echo htmlentities($count1); ?></strong> 条</span>
			</div>
			<div class="mt-10">
				<table class="table table-border table-bordered table-hover table-bg">
					<thead>
						<tr>
							<th scope="col" colspan="7">角色管理</th>
						</tr>
						<tr class="text-c">
							<th width="40">ID</th>
							<th width="55">排序</th>
							<th width="200">角色名</th>
							<th width="700">描述</th>
							<th width="80">是否已启用</th>
							<th width="80">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
						<tr class="text-c">
							<td><?php echo htmlentities($data['id']); ?></td>
							<td><input type="text" name="<?php echo htmlentities($data['id']); ?>" class="input-text lizhi" value="<?php echo htmlentities($data['sort']); ?>"></td>
							<td><?php echo htmlentities($data['title']); ?></td>
							<td><?php echo htmlentities($data['desc']); ?></td>
							<td class="td-status">
								<?php if($data['status'] == 1): ?>
								<span class="label label-success radius">已启用</span>
								<?php else: ?>
								<span class="label label-default radius">已禁用</span>
								<?php endif; ?>
							</td>
							<td class="td-manage">
								<?php if($data['id'] != 1): if($data['status'] == 1): ?>
								<a style="text-decoration:none" onClick="admin_stop(this,<?php echo htmlentities($data['id']); ?>)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>
								<?php else: ?>
								<a onClick="admin_start(this,<?php echo htmlentities($data['id']); ?>)" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>
								<?php endif; ?>
								<?php endif; ?>

								<a title="编辑" href="javascript:;" onclick="admin_role_edit('管理员编辑','<?php echo url('AuthGroup/edit',['id'=>$data['id']]); ?>','1','1000')"
								 class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
								<?php if($data['id'] != 1): ?>
								<a title="删除" href="javascript:;" onclick="admin_role_del(this,<?php echo htmlentities($data['id']); ?>)" class="ml-5" style="text-decoration:none"><i
									 class="Hui-iconfont">&#xe6e2;</i></a>
								<?php endif; ?>

							</td>
						</tr>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>

			</div>
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
		/*管理员-角色-添加*/
		function admin_role_add(title, url, w, h) {
			layer_show(title, url, w, h);
		}
		/*管理员-角色-编辑*/
		function admin_role_edit(title, url, id, w, h) {
			layer_show(title, url, w, h);
		}
		/*管理员-角色-删除*/
		function admin_role_del(obj, id) {
			layer.confirm('角色删除须谨慎，确认要删除吗？', function(index) {
				//此处请求后台程序，下方是成功后的前台处理……
				$.post(
					"<?php echo url('AuthGroup/ajax'); ?>", {
						id: id,
						type: 'AuthGroup_del',
					},
					function(result) {
						console.log(result);
						if (result === 0) {
							layer.msg('删除失败!', {
								icon: 5,
								time: 1000
							});
						} else {
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
					"<?php echo url('AuthGroup/ajax'); ?>", {
						'sort': sortarr,
						'id': idarr,
						type: 'AuthGroup_sort',
					},
					function(result) {
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

		/*角色-停用*/
		function admin_stop(obj, id) {
			layer.confirm('确认要停用吗？', function(index) {
				//此处请求后台程序，下方是成功后的前台处理……
				$.post(
					"<?php echo url('AuthGroup/ajax'); ?>", {
						id: id,
						type: 'AuthGroup_stop',
					},
					function(result) {
						if (result === 1) {
							location.reload();
							layer.msg('已停用!', {
								icon: 5,
								time: 1000
							});
						} else {
							layer.msg('停用失败!', {
								icon: 5,
								time: 1000
							});
						}
					});
			});
		}

		/*角色-启用*/
		function admin_start(obj, id) {
			layer.confirm('确认要启用吗？', function(index) {
				//此处请求后台程序，下方是成功后的前台处理……
				$.post(
					"<?php echo url('AuthGroup/ajax'); ?>", {
						id: id,
						type: 'AuthGroup_start',
					},
					function(result) {
						if (result === 1) {
							location.reload();
							layer.msg('已启用!', {
								icon: 6,
								time: 1000
							});
						} else {
							layer.msg('启动失败!', {
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
