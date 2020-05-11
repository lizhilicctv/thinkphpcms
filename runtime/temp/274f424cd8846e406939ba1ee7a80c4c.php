<?php /*a:3:{s:74:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\article\index.html";i:1585883830;s:73:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\common\_meta.html";i:1585880499;s:75:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\common\_footer.html";i:1585880499;}*/ ?>
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
<title>资讯列表 - 资讯管理 </title>
<meta name="keywords" content="李志立，lizhilimaster@163.com">
<meta name="description" content="李志立，lizhilimaster@163.com">
</head>
<body>
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;</span>
		资讯管理
		<span class="c-gray en">&gt;</span>
		资讯列表
		<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);"
		 title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a>
	</nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<div class="text-c">
				<form action="" method="get">
					<span class="select-box inline">
					<select name="cate" class="select">
						<option value="0">全部栏目</option>
						<?php if(is_array($datasort) || $datasort instanceof \think\Collection || $datasort instanceof \think\Paginator): $i = 0; $__LIST__ = $datasort;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<option <?php if($data['cate']==$vo['id']): ?> selected="selected" <?php endif; ?>value="<?php echo htmlentities($vo['id']); ?>">
							<?php if(isset($vo['level'])){echo str_repeat("|--",$vo['level']);}?><?php echo htmlentities($vo['catename']); ?></option>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
					</span> 
					<input type="text" class="input-text" style="width:250px" value="<?php echo htmlentities($data['key']); ?>" placeholder="输入资讯标题名称" id="" name="key">
					<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜资讯</button>
				</form>
			</div>
			<div class="cl pd-5 bg-1 bk-gray mt-20">
				<span class="l">
					<a href="javascript:;" onclick="data_del()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i>
						批量删除</a>
					<a class="btn btn-primary radius" data-title="添加资讯" _href="article-add.html" onclick="article_add('添加资讯','<?php echo url('article/add'); ?>')"
					 href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加资讯</a>
				</span>
				<span class="r">共有数据：<strong><?php echo htmlentities($count1); ?></strong> 条</span>
			</div>
			<div class="mt-20">
				<table class="table table-border table-bordered table-bg table-hover table-sort">
					<thead>
						<tr class="text-c">
							<th width="25"><input type="checkbox" name="" value=""></th>
							<th width="40">ID</th>
							<th width="120">标题</th>
							<th width="60">分类</th>
							<th width="40">作者</th>
							<th width="80">缩率图</th>
							<th width="280">简介</th>
							<th width="120">发布时间</th>
							<th width="50">浏览次数</th>
							<th width="50">推荐状态</th>
							<th width="70">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<tr class="text-c">
							<td><input type="checkbox" class="all" value="<?php echo htmlentities($vo['id']); ?>" name=""></td>
							<td><?php echo htmlentities($vo['id']); ?></td>
							<td class="text-l"><a href=""><?php echo htmlentities($vo['title']); ?></a></td>
							<td>
								<?php echo htmlentities($vo['catename']); ?>
							</td>
							<td><?php echo htmlentities((isset($vo['author']) && ($vo['author'] !== '')?$vo['author']:"佚名")); ?></td>
							<td>
								<?php if($vo['pic'] == ''): ?>
								暂无缩率图
								<?php else: ?>
								<img src="<?php echo htmlentities($vo['pic']); ?>" height="50" />
								<?php endif; ?>
							</td>
							<td><?php echo htmlentities($vo['desc']); ?></td>
							<td><?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($vo['time'])? strtotime($vo['time']) : $vo['time'])); ?></td>
							<td><?php echo htmlentities($vo['click']); ?></td>
							<td class="td-status">
								<?php if($vo['state'] == 0): ?>
								<span class="label label-disabled radius">不推荐</span>
								<?php else: ?>
								<span class="label label-success radius">推荐</span>
								<?php endif; ?>
							</td>
							<td class="f-14 td-manage">
								<a style="text-decoration:none" class="ml-5" onclick="article_add('编辑资讯','<?php echo url('article/edit',['id'=>$vo['id']]); ?>')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
								<a style="text-decoration:none" class="ml-5" onclick="article_del(this,<?php echo htmlentities($vo['id']); ?>)" href="javascript:;" title="删除"><i
									 class="Hui-iconfont">&#xe6e2;</i></a>
							</td>
						</tr>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
				<?php echo $info; ?>
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
	<script type="text/javascript">
		/*资讯-添加*/
		function article_add(title, url, w, h) {
			var index = layer.open({
				type: 2,
				title: title,
				content: url
			});
			layer.full(index);
		}
		/*资讯-编辑*/
		function article_edit(title, url, w, h) {
			var index = layer.open({
				type: 2,
				title: title,
				content: url
			});
			layer.full(index);
		}
		/*资讯-删除*/
		function article_del(obj, id) {
			layer.confirm('确认要删除吗？', function(index) {
				$.post(
					"<?php echo url('article/ajax'); ?>", {
						id: id,
						type: 'article_del',
					},
					function(result) {
						if (result === 1) {
							$(obj).parents("tr").remove();
							layer.msg('已删除!', {
								icon: 1,
								time: 1000
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
		/*自己编写管理员-批量删除*/
		function data_del() {
			var arr = new Array();
			$("input[type='checkbox']:gt(0):checked").each(function() {
				arr.push($(this).attr("value"));
			});
			if (arr.length < 1) {
				alert("请至少选择一个");
			} else {
				layer.confirm('确认要删除吗？', function(index) {
					$.post(
						"<?php echo url('article/ajax'); ?>", {
							id: arr,
							type: 'article_all',
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
	<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
