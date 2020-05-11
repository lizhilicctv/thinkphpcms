<?php /*a:3:{s:70:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\sql\index.html";i:1585986766;s:73:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\common\_meta.html";i:1585880499;s:75:"D:\phpstudy_pro\WWW\thinkphpcms\application\manage\view\common\_footer.html";i:1585880499;}*/ ?>
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
<meta name="keywords" content="李志立，lizhilimaster@163.com">
<meta name="description" content="李志立，lizhilimaster@163.com">
<style>
    #lod {
        position: absolute;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.2);
        z-index: 999;
        display: none;
    }

</style>

</head>
<body>
<div id="lod">
    <div style="width: 1000px;height: 400px;background-color: #ffffff;margin: 100px auto;padding: 45px 15px">
        <h4 style="text-align: center;font-size: 40px;font-weight: 600">正在操作数据库，请等待！</h4>
        <div class="loading"  style="width: 80px;height:80px;background-size:100% 100%; background-repeat:no-repeat;margin: 80px auto">
        </div>
    </div>
</div>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
    <span class="c-gray en">&gt;</span>
    数据备份
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px"
       href="javascript:location.replace(location.href);"
       title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">


    <div class="panel panel-danger">
        <div class="panel-header">注意</div>
        <div class="panel-body"> 1，数据备份，一般用于测试和少量备份。不能代替运维，建议同时使用，服务器管理软件或者其他方式多重备份！
            2，需要设置目录 sql ，所有权限。</div>
    </div>

    <div class="text-c">

    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20">
			<span class="l">
				<a class="btn btn-primary radius" onclick="add()" href="javascript:;"><i
                        class="Hui-iconfont">&#xe600;</i> 添加数据备份</a>
				<a href="javascript:;" onclick="data_del()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
			</span>
        <span class="r">共有数据：<strong><?php echo htmlentities($count1); ?></strong> 条</span>
    </div>

    <table class="table table-border table-bordered table-bg table-hover table-sort">
        <thead>
        <tr class="text-c">
            <th width="25"><input type="checkbox" name="" value=""></th>
            <th width="80">ID</th>
            <th width="120">备份时间</th>
            <th width="120">距离现在时间</th>
            <th width="70">还原</th>
            <th width="70">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr class="text-c">
            <td><input type="checkbox" class="all" value="<?php echo htmlentities($vo['id']); ?>" name=""></td>
            <td><?php echo htmlentities($vo['id']); ?></td>
            <td><?php echo htmlentities(date("Y-m-d H:i:s",!is_numeric($vo['time'])? strtotime($vo['time']) : $vo['time'])); ?></td>
            <td><?php echo htmlentities(tonow($vo['time'])); ?></td>
            <td>
                <button type="button" onclick="huanyuan(this,<?php echo htmlentities($vo['id']); ?>)" class="btn btn-success radius">还原</button>
            </td>
            <td>
                <button type="button" onclick="article_del(this,<?php echo htmlentities($vo['id']); ?>)" class="btn radius btn-warning">删除</button>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
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
    /*添加备份*/
    function add(obj) {
        layer.confirm('确认要备份吗？，不建议代替运维备份！', function (index) {
            $('#lod').show();
            $.post(
                "<?php echo url('sql/ajax'); ?>", {
                    type: 'sql_add',
                },
                function (result) {
                    if (result.code === 1) {
                        layer.msg('备份成功!', {
                            icon: 1,
                            time: 1000
                        });
                        location.reload()

                    } else {
                        layer.msg('备份失败!', {
                            icon: 5,
                            time: 1000
                        });
                    }
                    $('#lod').hide()
                });
        });
    }


    /*资讯-删除*/
    function article_del(obj, id) {
        layer.confirm('确认要删除吗？', function (index) {
            $('#lod').show();
            $.post(
                "<?php echo url('sql/ajax'); ?>", {
                    id: id,
                    type: 'sql_del',
                },
                function (result) {
                    if (result.code === 1) {
                        layer.msg('已删除!', {
                            icon: 1,
                            time: 1000
                        });
                        location.reload()
                    } else {
                        layer.msg('删除失败!', {
                            icon: 5,
                            time: 1000
                        });
                    }
                    $('#lod').hide()
                });
        });
    }

    /*资讯-还原*/
    function huanyuan(obj, id) {
        layer.confirm('确认要还原吗？还原会替换原来数据库，谨慎操作！！！', function (index) {
            $('#lod').show();
            $.post(
                "<?php echo url('sql/ajax'); ?>", {
                    id: id,
                    type: 'sql_huanyuan',
                },
                function (result) {
                    if (result.code === 1) {
                        layer.msg('已还原!', {
                            icon: 1,
                            time: 1000
                        });
                        location.reload()
                    } else {
                        layer.msg('还原失败!', {
                            icon: 5,
                            time: 1000
                        });
                    }
                    $('#lod').hide()
                });
        });
    }

    /*自己编写管理员-批量删除*/
    function data_del() {
        var arr = new Array();
        $("input[type='checkbox']:gt(0):checked").each(function () {
            arr.push($(this).attr("value"));
        });
        if (arr.length < 1) {
            alert("请至少选择一个");
        } else {
            layer.confirm('确认要删除吗？', function (index) {
                $('#lod').show();
                $.post(
                    "<?php echo url('sql/ajax'); ?>", {
                        id: arr,
                        type: 'sql_all',
                    },
                    function (result) {
                        if (result.code === 1) {
                            layer.msg('已删除!', {
                                icon: 1,
                                time: 1000
                            });
                            location.reload()
                        } else {
                            layer.msg('删除失败!', {
                                icon: 5,
                                time: 1000
                            });
                        }
                        $('#lod').hide()
                    });
            });
        }

    }
</script>
</body>
</html>
