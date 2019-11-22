<?php /*a:3:{s:75:"D:\phpstudy_pro\WWW\thinkphpcms.com\application\manage\view\index\main.html";i:1574325742;s:77:"D:\phpstudy_pro\WWW\thinkphpcms.com\application\manage\view\common\_meta.html";i:1572408326;s:79:"D:\phpstudy_pro\WWW\thinkphpcms.com\application\manage\view\common\_footer.html";i:1572408326;}*/ ?>
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
<title>我的桌面</title>
</head>
<body>
<div class="page-container">
	<p class="f-20 text-success">欢迎使用<b>后台管理系统</b> <span class="f-14">v1.0</span>！</p>
	<p>登录次数：<?php echo htmlentities($count1); ?> </p>
	<p>本次登录IP：<?php echo htmlentities($log['ip']); ?>  本次登录时间：<?php echo htmlentities(date("Y-m-d H:i:s",!is_numeric($log['create_time'])? strtotime($log['create_time']) : $log['create_time'])); ?></p>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th colspan="7" scope="col">信息统计</th>
			</tr>
			<tr class="text-c">
				<th>统计</th>
				<th>资讯库</th>
				<th>留言库</th>
				<th>会员</th>
				<th>评论库</th>
			</tr>
		</thead>
		<tbody>
			<tr class="text-c">
				<td>总数</td>
				<td><?php echo htmlentities($w['zong']); ?></td>
				<td><?php echo htmlentities($liu['zong']); ?></td>
				<td><?php echo htmlentities($yong['zong']); ?></td>
				<td><?php echo htmlentities($ping['zong']); ?></td>
			</tr>
			<tr class="text-c">
				<td>今日</td>
				<td><?php echo htmlentities($w['jin']); ?></td>
				<td><?php echo htmlentities($liu['jin']); ?></td>
				<td><?php echo htmlentities($yong['jin']); ?></td>
				<td><?php echo htmlentities($ping['jin']); ?></td>
			</tr>
			<tr class="text-c">
				<td>昨日</td>
				<td><?php echo htmlentities($w['zuo']); ?></td>
				<td><?php echo htmlentities($liu['zuo']); ?></td>
				<td><?php echo htmlentities($yong['zuo']); ?></td>
				<td><?php echo htmlentities($ping['zuo']); ?></td>
			</tr>
			<tr class="text-c">
				<td>本周</td>
				<td><?php echo htmlentities($w['zhou']); ?></td>
				<td><?php echo htmlentities($liu['zhou']); ?></td>
				<td><?php echo htmlentities($yong['zhou']); ?></td>
				<td><?php echo htmlentities($ping['zhou']); ?></td>
			</tr>
			<tr class="text-c">
				<td>本月</td>
				<td><?php echo htmlentities($w['yue']); ?></td>
				<td><?php echo htmlentities($liu['yue']); ?></td>
				<td><?php echo htmlentities($yong['yue']); ?></td>
				<td><?php echo htmlentities($ping['yue']); ?></td>
			</tr>
		</tbody>
	</table>
	<table class="table table-border table-bordered table-bg mt-20">
		
		<div id="bang">
			<h2>使用说明</h2>
			<p style="text-indent: 20px;">感谢您一年来对我们的支持和包容。为了更好的服务大家，在2018年6月份，我们全新发布了后台管理系统版本。我们的发布离不开广大用户给出的建议和意见。我们整合了更多优秀插件；优化了框架的体积。当然相比目前行业其他管理系统还有很多不足。但初心不改，实实在在把事做好，做用户最喜欢的框架。更好为客户服务。</p>
			<p style="text-indent: 20px;">我们在2018年版本上面，先进行了，大量的技术更新，包括了秒杀，团购，即时通讯，购物，等等功能的扩展。然后在2019年的9月份，我们又进行了重构，大量的精简了原始代码，把原始的一些插件进行了替换，速度是2018年第一版的3倍以上。从最早网站开发，到现在我们已经经历过了6个年头，我们经历过的项目数百个，每一次修改后台我们都抱着不忘初心的态度，努力的写好每一句代码，希望我们的努力，可以得到您的认可。你们的肯定就是对我们最大支持！</p>
			<p class="red">注：扫描二维码，可以添加解决疑问专家的QQ/微信，添加好友时请您写明疑问，以便解决您的问题</p>
			<div class="fen">
				<span>疑问QQ群：99078439</span>
				<a href="mailto:lizhilimaster@163.com">发送邮件：lizhilimaster@163.com</a>
				<a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=d0eb332edc6d7702e82852e29fd39e065ee75aa4f828adc992b931b9817f2254"><img border="0" src="//pub.idqqimg.com/wpa/images/group.png" alt="河北网站技术交流" title="河北网站技术交流"></a>
				<img  style="CURSOR: pointer" onclick="javascript:window.open('tencent://message/?uin=821642832&Site=www.linglukeji.com&Menu=yes', '_blank', 'height=502, width=644,toolbar=no,scrollbars=no,menubar=no,status=no');"  border="0" SRC=http://wpa.qq.com/pa?p=1:821642832:1 alt="点击这里给我发消息">
			</div>
			<div class="frame-img"> <img src="/static/manage/qqimg.jpg" width="130" ><img src="/static/manage/weixinimg.jpg" width="130"><img src="/static/manage/qqqun.jpg" width="130"></div>
		</div>
		
	</table>
</div>
<footer class="footer mt-20">
	<div class="container">
		<p>感谢hui0、jQuery、layer、laypage、Validform、UEditor、My97DatePicker、iconfont、Datatables、WebUploaded、icheck、highcharts、bootstrap-Switch提供技术支持<br>
			Copyright &copy;2015-2019 河北灵鹿科技 All Rights Reserved.<br>
			本后台系统由<a href="http://www.biaotian.net/" target="_blank" title="河北灵鹿科技">李志立</a>提供技术支持</p>
	</div>
</footer>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/manage/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/static/manage/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/manage/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/static/manage/static/h-ui.admin/js/H-ui.admin.js"></script> 
	
<!--/_footer 作为公共模版分离出去-->

</body>
</html>