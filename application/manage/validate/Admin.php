<?php
namespace app\manage\validate;
use think\Validate;
class Admin extends Validate
{
     protected $rule = [
        'username'  =>  'require|length:4,16|unique:admin',
        'password' =>  'require',
        'password2' =>  'require|confirm:password',
    ];
	 protected $message  =   [
        'username.require' => '用户名必须填写',
        'username.length'     => '用户名必须4-16个字符之间',
        'username.unique'     => '当前用户名已经存在，不能重复！',
        'password.require'   => '密码必须填写',
        'password2.require'   => '确认密码必须填写',
        'password2.confirm'  => '两次密码必须一致', 
    ];
	protected $scene = [
        'edit'  =>  ['username'],
    ];
}
