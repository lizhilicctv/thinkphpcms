<?php
namespace app\manage\validate;
use think\Validate;
class Cate extends Validate
{
     protected $rule = [
        'catename'  =>  'require|chs|unique:cate',
        'en_name' =>  'require|alpha|unique:cate',
    ];
	 protected $message  =   [
        'catename.require' => '中文名称必须填写',
        'catename.chs'     => '中文名称必须为汉字',
        'catename.unique'     => '中文名称已经存在，不能重复！',
        'en_name.require' => '英文名称必须填写',
        'en_name.alpha'     => '英文名称必须为字母',
        'en_name.unique'     => '英文名称已经存在，不能重复！',
    ];
	protected $scene = [
        'edit'  =>  [
			'cnname'  =>  'require|chs',
	        'enname' =>  'require|alpha',
	        'type' =>  'require',
        ],
        
    ];
}
