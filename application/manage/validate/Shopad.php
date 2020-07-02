<?php
namespace app\manage\validate;
use think\Validate;
class Shopad extends Validate
{
     protected $rule = [
        'title' =>  'require|unique:shopad',
        'url' =>  'url',

    ];
	 protected $message  =   [
        'title.require' => '名称必须填写', 
        'title.unique'     => '当前名称已经存在，不能重复！',
        'url.url' => '网址格式不正确',
    ];
	protected $scene = [
        'edit'  =>  ['username'],
    ];
}
