<?php
namespace app\manage\validate;
use think\Validate;
class Order extends Validate
{
     protected $rule = [
        'title' =>  'require|unique:link',
        'linkurl' =>  'require|url',

    ];
	 protected $message  =   [
        'title.require' => '友情链接名称必须填写', 
        'linkurl.require' => '友情链接网址必须填写', 
        'title.unique'     => '当前友情链接已经存在，不能重复！',
        'linkurl.url' => '网址格式不正确',
    ];
	protected $scene = [
        'edit'  =>  ['username'],
    ];
}
