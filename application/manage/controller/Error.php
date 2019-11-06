<?php
namespace app\index\controller;

use think\Controller;
class Error extends Controller
{
	public function index()
	{
		$this->error('链接错误', 'index/index');
	}
}