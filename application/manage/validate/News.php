<?php
namespace app\manage\validate;
use think\Validate;
class News extends Validate
{
     protected $rule = [
        'title' =>  'require|unique:news',
        'text' =>  'require',
    ];
	 protected $message  =   [
        'title.require' => '新闻名称必须填写', 
        'title.unique'     => '当前新闻名称已经存在，不能重复！',
        'text.require'   => '新闻内容必须选择',
    ];
	protected $scene = [
        'edit'  =>  ['username'],
    ];
}
