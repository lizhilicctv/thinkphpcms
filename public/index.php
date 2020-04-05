<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]
namespace think;

// 加载基础文件
require __DIR__ . '/../thinkphp/base.php';

// 支持事先使用静态方法设置Request对象和Config对象
//解决thinkphp 本地的bug 拦截控制器不能为 汉字和空格 特殊字符
$path=\think\facade\Request::path();
if($path and !preg_match('/^[A-Za-z0-9][\w|\.]*$/', $path)){
    //重定向浏览器
    header("Location:/404.html");
    //确保重定向后，后续代码不会被执行
    exit;
}
// 执行应用并响应
Container::get('app')->bind('index')->run()->send();
