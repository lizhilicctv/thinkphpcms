<?php
namespace app\manage\validate;
use think\Validate;
class System extends Validate
{
     protected $rule = [
        'cnname'  =>  'require|chs|unique:system',
        'enname' =>  'require|alpha|unique:system',
        'type' =>  'require',
    ];
	 protected $message  =   [
        'cnname.require' => '中文名称必须填写',
        'cnname.chs'     => '中文名称必须为汉字',
        'cnname.unique'     => '中文名称已经存在，不能重复！',
        'enname.require' => '英文名称必须填写',
        'enname.alpha'     => '英文名称必须为字母',
        'enname.unique'     => '英文名称已经存在，不能重复！',
        'type.require'   => '类型必须填写',
    ];
	protected $scene = [
        'edit'  =>  [
			'cnname'  =>  'require|chs',
	        'enname' =>  'require|alpha',
	        'type' =>  'require',
        ],
        
    ];
}
