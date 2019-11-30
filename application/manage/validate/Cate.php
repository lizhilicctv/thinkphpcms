<?php
namespace app\manage\validate;
use think\Validate;
class Cate extends Validate
{
     protected $rule = [
        'catename'  =>  'require|unique:cate',
        'en_name' =>  'require|alphaNum|unique:cate',
    ];
	 protected $message  =   [
        'catename.require' => '中文名称必须填写',
        'catename.unique'     => '中文名称已经存在，不能重复！',
        'en_name.require' => '英文名称必须填写',
        'en_name.alphaNum'     => '英文名称必须为字母和数字',
        'en_name.unique'     => '英文名称已经存在，不能重复！',
    ];
	protected $scene = [
        'edit'  =>  [
			'cnname'  =>  'require',
	        'enname' =>  'require|alphaNum',
	        'type' =>  'require',
        ],
        
    ];
}
