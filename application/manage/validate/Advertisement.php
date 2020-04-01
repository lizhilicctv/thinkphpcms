<?php
namespace app\manage\validate;
use think\Validate;
class Advertisement extends Validate
{
     protected $rule = [
        'key' =>  'require|alphaNum|unique:advertisement',
        'url' =>  'url',
    ];
	 protected $message  =   [
        'key.require' => '广告关键字必须填写', 
        'key.unique'     => '当前广告关键字已经存在，不能重复！',
		'key.alphaNum'     => '广告关键字必须为字母和数字',
        'url.url' => '网址格式不正确',
    ];
	protected $scene = [
        'edit'  =>  ['username'],
    ];
}
