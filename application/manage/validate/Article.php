<?php
namespace app\manage\validate;
use think\Validate;
class Article extends Validate
{
     protected $rule = [
        'title' =>  'require|unique:article',
        'cateid' =>  'require',
        'text' =>  'require',
    ];
	 protected $message  =   [
        'title.require' => '文章名称必须填写', 
        'cateid.require' => '栏目名称必须填写', 
        'title.unique'     => '当前文章名称已经存在，不能重复！',
        'text.require'   => '文章内容必须选择',
    ];
	protected $scene = [
        'edit'  =>  ['username'],
    ];
}
