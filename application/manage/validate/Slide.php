<?php
namespace app\manage\validate;
use think\Validate;
class Slide extends Validate
{
     protected $rule = [
        'title' =>  'require|unique:slide',
        'url' =>  'url',

    ];
	 protected $message  =   [
        'title.require' => '友情链接名称必须填写', 
        'title.unique'     => '当前图片名称已经存在，不能重复！',
        'url.url' => '网址格式不正确',
    ];
	protected $scene = [
        'edit'  =>  ['username'],
    ];
}
