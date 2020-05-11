<?php /*a:3:{s:74:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\message\index.html";i:1585895464;s:73:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\common\_meta.html";i:1585880499;s:75:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\common\_footer.html";i:1585880499;}*/ ?>
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
<title>评论管理</title>
<meta name="keywords" content="李志立，lizhilimaster@163.com">
<meta name="description" content="李志立，lizhilimaster@163.com">
</head>
<body>
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 评论中心 <span class="c-gray en">&gt;</span>
		评论管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);"
		 title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="page-container">
		<div class="text-c">
			<form action="" method="post">
				<input type="text" class="input-text" style="width:250px" placeholder="搜索内容"  value="<?php echo htmlentities($key); ?>" name="key">
				<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜评论</button>
			</form>
		</div>
		<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l">
			</span> <span class="r">共有数据：<strong><?php echo htmlentities($count1); ?></strong> 条</span> </div>
		<div class="mt-20">
			<table class="table table-border table-bordered table-hover table-bg table-sort">
				<thead>
					<tr class="text-c">
						<th width="60">ID</th>
						<th width="100">标题</th>
						<th width="60">姓名</th>
						<th width="60">手机</th>
						<th width="260">内容</th>
						<th width="130">时间</th>
						<th width="70">状态</th>
						<th width="80">操作</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($comment) || $comment instanceof \think\Collection || $comment instanceof \think\Paginator): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<tr class="text-c">
						<td><?php echo htmlentities($vo['id']); ?></td>
						<td>
							<?php echo htmlentities($vo['title']); ?>
						</td>
						<td><?php echo htmlentities($vo['name']); ?></td>
						<td><?php echo htmlentities($vo['phone']); ?></td>
						<td><?php echo htmlentities($vo['neirong']); ?></td>
						<td><?php echo htmlentities($vo['create_time']); ?></td>
						<td class="td-status">
							<?php switch($vo['isopen']): case "1": ?><span class="label label-success radius">已查看</span><?php break; case "0": ?><span class="label label-default radius">未查看</span><?php break; ?>
							<?php endswitch; ?>
						</td>
						<td class="td-manage">

							<a title="编辑" href="javascript:;" onclick="member_edit('编辑','<?php echo url('message/edit',['id'=>$vo['id']]); ?>','4','','510')"
							 class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>

							<a title="删除" href="javascript:;" onclick="member_del(this,<?php echo htmlentities($vo['id']); ?>)" class="ml-5" style="text-decoration:none"><i
								 class="Hui-iconfont">&#xe6e2;</i></a></td>
					</tr>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
			<?php echo $comment; ?>
		</div>
	</div>
	<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/manage/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/static/manage/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/manage/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/static/manage/static/h-ui.admin/js/H-ui.admin.js"></script> 
<!--/_footer 作为公共模版分离出去-->
	<!--请在下方写此页面业务相关的脚本-->
	<script type="text/javascript" src="/static/manage/lib/My97DatePicker/4.8/WdatePicker.js"></script>
	<script type="text/javascript">
		/*评论-编辑*/
		function member_edit(title, url, id, w, h) {
			layer_show(title, url, w, h);
		}

		/*管理员-删除*/
		function member_del(obj, id) {
			layer.confirm('确认要删除吗？', function(index) {
				//此处请求后台程序，下方是成功后的前台处理……
				$.post(
					"<?php echo url('message/ajax'); ?>", {
						id: id,
						type: 'member_del',
					},
					function(result) {
						if (result[0] == 1) {
							$(obj).parents("tr").remove();
							layer.msg('已删除!', {
								icon: 1,
								time: 1000
							});
							if (result[1] == 0) {
								parent.document.getElementById("lizhili_liu").innerHTML = "留";
							} else {
								parent.document.getElementById("lizhili_liu").innerHTML = "留" + result[1];
							}
						} else {
							layer.msg('删除失败!', {
								icon: 5,
								time: 1000
							});
						}


					});
			});
		}
		/*自己编写管理员-批量删除*/
		function data_del() {
			var arr = new Array();
			$("input[type='checkbox']:gt(0):checked").each(function() {
				arr.push($(this).attr("value"));
			});
			if (arr.length < 1) {
				layer.msg('至少选择一个', {
					icon: 5,
					time: 1000
				});
			} else {
				layer.confirm('确认要删除吗？', function(index) {
					$.post(
						"<?php echo url('member/ajax'); ?>", {
							id: arr,
							type: 'member_all',
						},
						function(result) {
							if (result === 1) {
								layer.msg('批量删除成功!', {
									icon: 1,
									time: 1000
								});
								history.go(0);
							} else {
								layer.msg('批量删除失败!', {
									icon: 5,
									time: 1000
								});
							}
						});
				});
			}
		}
	</script>
</body>
</html>
