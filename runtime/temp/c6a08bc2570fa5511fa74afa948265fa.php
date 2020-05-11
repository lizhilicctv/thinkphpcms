<?php /*a:3:{s:70:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\pilot\lit.html";i:1589187415;s:73:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\common\_meta.html";i:1585880499;s:75:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\common\_footer.html";i:1585880499;}*/ ?>
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
<title>顶部导航管理</title>
<meta name="keywords" content="李志立，lizhilimaster@163.com">
<meta name="description" content="李志立，lizhilimaster@163.com">
</head>
<body>
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 侧面导航管理 <a class="btn btn-success radius r"
		 style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a></nav>

	<div class="pd-20 text-c">
		<div class="cl pd-5 bg-1 bk-gray"> <span class="l"><a href="javascript:;" onclick="catesort()" class="btn btn-danger radius"><i
					 class="Hui-iconfont">&#xe6e2;</i> 更新排序</a> <a class="btn btn-primary radius" onclick="system_category_add('添加侧面导航','<?php echo url('pilot/litadd'); ?>',1000,800)"
				 href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加侧面导航</a></span> <span class="r">共有数据：<strong><?php echo htmlentities($count1); ?></strong>
				条</span> </div>
		<div class="mt-20">
			<h4 style="margin-left: 20px;text-align: left">不建议自己添加删除导航。修改完成后，刷新页面生效。</h4>
			<table class="table table-border table-bordered table-hover table-bg table-sort">
				<thead>
					<tr class="text-c">
						<th width="10">ID</th>
						<th width="5">排序</th>
						<th width="10">图标</th>
						<th width="10">所属导航</th>
						<th width="25">名称</th>
						<th width="25">地址</th>
						<th width="10">状态</th>
						<th width="10">操作</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($pilot_list) || $pilot_list instanceof \think\Collection || $pilot_list instanceof \think\Paginator): $i = 0; $__LIST__ = $pilot_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?>
					<tr class="text-c">
						<td><?php echo htmlentities($user['id']); ?></td>
						<td style="width: 15px;"><input type="text" name="<?php echo htmlentities($user['id']); ?>" class="input-text lizhi" value="<?php echo htmlentities($user['sort']); ?>"></td>
						<td>
							<?php if($user['level']): ?>
							<span style="color: #e0e0e0">不需要图标</span>
							<?php else: ?>
							<i class="icon Hui-iconfont" style="font-size: 30px"><?php echo $user['icon']; ?></i>
							<?php endif; ?>
						</td>
						<td><?php echo htmlentities($user['pname']); ?></td>
						<td class="text-l">
							<?php if(isset($user['level'])){echo str_repeat("|--",$user['level']);}?><?php echo htmlentities($user['name']); ?></td>
						<td><?php echo htmlentities((isset($user['url']) && ($user['url'] !== '')?$user['url']:'没有填写')); ?></td>
						<td>
							<?php if($user['isopen'] == 1): ?>
							<span class="label label-success radius">已启用</span>
							<?php else: ?>
							<span class="label label-default radius">已禁用</span>
							<?php endif; ?>
						</td>
						<td class="f-14">

							<?php if($user['isopen'] == 1): ?>
							<a style="text-decoration:none" onclick="admin_stop(this,<?php echo htmlentities($user['id']); ?>)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>
							<?php else: ?>
							<a onclick="admin_start(this,<?php echo htmlentities($user['id']); ?>)" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>
							<?php endif; ?>
							<a title="编辑" href="javascript:;" onclick="system_category_edit('幻灯片编辑','<?php echo url('pilot/litedit',['id'=>$user['id']]); ?>',1000,800)"
							 style="text-decoration:none;margin-left: 10px"><i class="Hui-iconfont">&#xe6df;</i></a>

							<a title="删除" href="javascript:;" onclick="system_category_del(this,<?php echo htmlentities($user['id']); ?>)" class="ml-5" style="text-decoration:none"><i
								 class="Hui-iconfont">&#xe6e2;</i></a></td>
					</tr>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>

		</div>

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
	<script type="text/javascript" src="/static/manage/lib/My97DatePicker/4.8/WdatePicker.js"></script>

	<script type="text/javascript">
		/*系统-顶部导航-添加*/
		function system_category_add(title, url, w, h) {
			layer_show(title, url, w, h);
		}
		/*系统-顶部导航-编辑*/
		function system_category_edit(title, url, w, h) {
			layer_show(title, url, w, h);
		}
		/*系统-顶部导航-删除*/
		function system_category_del(obj, id) {
			layer.confirm('确认要删除吗？', function(index) {
				$.post(
					"<?php echo url('pilot/ajax'); ?>", {
						id: id,
						type: 'pilotl_del',
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
					"<?php echo url('pilotl/ajax'); ?>", {
						'sort': sortarr,
						'id': idarr,
						type: 'pilot_sort',
					},
					function(result) {
						console.log(result);
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
		/*管理员-停用*/
		function admin_stop(obj, id) {
			layer.confirm('确认要停用吗？', function(index) {
				//此处请求后台程序，下方是成功后的前台处理……
				$.post(
					"<?php echo url('pilot/ajax'); ?>", {
						id: id,
						type: 'pilotl_stop',
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
		/*管理员-启用*/
		function admin_start(obj, id) {
			layer.confirm('确认要启用吗？', function(index) {
				//此处请求后台程序，下方是成功后的前台处理……
				$.post(
					"<?php echo url('pilot/ajax'); ?>", {
						id: id,
						type: 'pilotl_start',
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
