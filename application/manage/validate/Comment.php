<?php
namespace app\manage\validate;
use think\Validate;
class Member extends Validate
{
     protected $rule = [
        'username' =>  'require|unique:member',
        'sex' =>  'require',
        'phone'=>'require|unique:member',
        'email'=>'require|email|unique:member',

    ];
	 protected $message  =   [
        'username.require' => '用户名必须填写', 
        'sex.require' => '性别必须填写', 
        'phone.require' => '电话号码必须填写',
        'username.unique'     => '当前用户名已经存在，不能重复！',
        'phone.unique'     => '当前电话已经存在，不能重复！',
        'email.unique'     => '当前邮箱已经存在，不能重复！',
        'email.email' => '邮箱格式不正确',
        'email.require' => '邮箱必须填写', 
    ];
	protected $scene = [
        'edit'  =>  ['password'=>'require|length:6,16'],
    ];
}
