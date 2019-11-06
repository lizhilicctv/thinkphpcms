<?php
namespace app\manage\validate;
use think\Validate;
class AuthRule extends Validate
{
     protected $rule = [
        'title'  =>  'require|unique:AuthRule',
    ];
	 protected $message  =   [
        'title.require' => '用户组必须填写',
        'title.unique'     => '当前用户组名已经存在，不能重复！',
    ];
	protected $scene = [
        'edit'  =>  ['username'],
    ];
}
