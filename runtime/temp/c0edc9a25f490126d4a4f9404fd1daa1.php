<?php /*a:1:{s:74:"D:\phpstudy_pro\WWW\thinkphpcms.com\application\index\view\conn\error.html";i:1574401248;}*/ ?>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width">
	<meta name="robots" content="noindex, nofollow" />
	<meta charset="UTF-8">
	<!--[if IE 8]>
		<style>
		.ie8 .alert-circle,.ie8 .alert-footer{display:none}.ie8 .alert-box{padding-top:75px}.ie8 .alert-sec-text{top:45px}
		</style>
		<![endif]-->
	<title>页面加载中,请稍候...</title>
	<style>
		body{margin:0;padding:0;background-repeat:no-repeat;font-family:Arial,'微软雅黑','宋体',sans-serif}.main{position:absolute;left:calc(50% - 200px);top:calc(50% - 13em)}.alert-box{display:none;position:relative;margin:auto;padding:180px 85px 22px;border-radius:10px 10px 0 0;background-color:rgba(255,255,255,.75);box-shadow:5px 9px 17px rgba(102,102,102,.75);width:286px;color:#FFF;text-align:center}.alert-box p{margin:0}.alert-circle{position:absolute;top:-50px;left:111px}.alert-sec-circle{stroke-dashoffset:0;stroke-dasharray:735;transition:stroke-dashoffset 1s linear}.alert-sec-text{position:absolute;top:11px;left:190px;width:76px;color:#000;font-size:68px}.alert-sec-unit{font-size:34px}.alert-body{margin:35px 0}.alert-head{color:#242424;font-size:28px}.alert-concent{margin:25px 0 14px;color:#7B7B7B;font-size:18px}.alert-concent p{line-height:27px}.alert-btn{display:block;border-radius:10px;background-color:#fa4343;height:55px;line-height:55px;width:286px;color:#FFF;font-size:20px;text-decoration:none;letter-spacing:2px}.alert-btn:hover{background-color:#ff6b6b}.alert-footer{margin:0 auto;height:42px;width:120px}.alert-footer-icon{float:left}.alert-footer-text{float:left;border-left:2px solid #EEE;padding:3px 0 0 5px;height:40px;color:#0B85CC;font-size:12px;text-align:left}.alert-footer-text p{color:#7A7A7A;font-size:22px;line-height:18px}
	</style>
</head>
<body class="ie8">
	<div class="main">
		<div id="js-alert-box" class="alert-box" style="display:block">
			<svg class="alert-circle" width="234" height="234">
				<circle cx="117" cy="117" r="108" fill="#FFF" stroke="#fa4343" stroke-width="17"></circle>
				<text class="alert-sec-unit" x="100" y="172" fill="#BDBDBD">秒</text>
			</svg>
			<div id="js-sec-text" class="alert-sec-text">
				<b id="wait"><?php echo($wait);?></b>
			</div>
			<div class="alert-body">
				<div id="js-alert-head" class="alert-head">
					<?php echo(strip_tags($msg));?></div>
				<div class="alert-concent">
				</div>
				<a id="js-alert-btn" class="alert-btn" href="<?php echo($url);?>">立即前往</a>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	(function(){
	            var wait = document.getElementById('wait'),
	                href = document.getElementById('js-alert-btn').href;
	            var interval = setInterval(function(){
	                var time = --wait.innerHTML;
	                if(time <= 0) {
	                    location.href = href;
	                    clearInterval(interval);
	                };
	            }, 1000);
	        })();
	</script>
	
</body>

</html>