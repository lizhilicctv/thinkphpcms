<?php
namespace app\index\controller;

use app\index\controller\Base;
use think\Db;


class Index extends Base
{
    public function _empty()
    {
        //重定向浏览器
        header("Location:/404.html");
        //确保重定向后，后续代码不会被执行
        exit;
    }
    public function index()
    {
		//这里请使用缓存
		return $this->fetch();
    }
	public function cate()
	{
		//这里请使用缓存
		//return $this->fetch();
	}
	public function show()
	{
		//这里请使用缓存
		//return $this->fetch();
	}
}
