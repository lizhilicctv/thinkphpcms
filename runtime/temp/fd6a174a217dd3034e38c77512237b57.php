<?php /*a:3:{s:74:"D:\phpstudy_pro\WWW\thinkphpcms.com\application\manage\view\login\log.html";i:1572408326;s:77:"D:\phpstudy_pro\WWW\thinkphpcms.com\application\manage\view\common\_meta.html";i:1572408326;s:79:"D:\phpstudy_pro\WWW\thinkphpcms.com\application\manage\view\common\_footer.html";i:1572408326;}*/ ?>
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
<title>系统日志</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
	<span class="c-gray en">&gt;</span>
	登陆日志
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
	<div class="text-c"> 
		<form action="" method="post">
			<input type="text" name="key" id="" placeholder="日志名称" style="width:250px" class="input-text">
			<button name=""  id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜日志</button>
		</form>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
		<a href="javascript:;" onclick="data_del()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
		</span>
		<span class="r">共有数据：<strong><?php echo htmlentities($count1); ?></strong> 条</span>
	</div>
	<table class="table table-border table-bordered table-bg table-hover table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="80">ID</th>
				<th width="100">用户名</th>
				<th width="120">客户端IP</th>
				<th width="120">时间</th>
				<th width="120">距离现在时间</th>
				<th width="70">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<tr class="text-c">
				<td><input type="checkbox" class="all" value="<?php echo htmlentities($vo['id']); ?>" name=""></td>
				<td><?php echo htmlentities($vo['id']); ?></td>
				<td><?php echo htmlentities($vo['username']); ?></td>
				<td><?php echo htmlentities($vo['ip']); ?></td>
				<td><?php echo htmlentities(date("Y-m-d H:i:s",!is_numeric($vo['create_time'])? strtotime($vo['create_time']) : $vo['create_time'])); ?></td>
				<td><?php echo htmlentities(tonow($vo['create_time'])); ?></td>
				<td><a title="删除" href="javascript:;" onclick="article_del(this,<?php echo htmlentities($vo['id']); ?>)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
			<?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
	<?php echo $data; ?>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/manage/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/static/manage/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/manage/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/static/manage/static/h-ui.admin/js/H-ui.admin.js"></script> 
	
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/static/manage/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/static/manage/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/static/manage/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">


/*查看日志*/
function system_log_show(){
	
}
/*资讯-删除*/
function article_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.post(
			"<?php echo url('login/ajax'); ?>",
		{
			id:id,
			type:'log_del',
		},
		function(result){
	        if(result===0){
	        	layer.msg('删除失败!',{icon: 5,time:1000});
	        }else{
	        	$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
	        }
	    });	
	});
}
/*自己编写管理员-批量删除*/
function data_del(){
	var arr= new Array();
	$("input[type='checkbox']:gt(0):checked").each(function(){
    	arr.push($(this).attr("value"));
	});
   if(arr.length<1){
    alert("请至少选择一个");
   }else{
	   	layer.confirm('确认要删除吗？',function(index){
			$.post(
				"<?php echo url('login/ajax'); ?>",
			{
				id:arr,
				type:'log_all',
			},
			function(result){
		        if(result===0){
		        	layer.msg('批量删除失败!',{icon: 5,time:1000});
		        }else{
					layer.msg('批量删除成功!',{icon:1,time:1000});
					history.go(0);
		        }
		    });	
		});
   }
	
}
</script>
</body>
</html>