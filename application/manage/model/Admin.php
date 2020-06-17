<?php
namespace app\manage\model;
use think\Model;
class Admin extends Model
{
	//如果表名和文件名不是对应的，用下面代码修改
	//protected $table = 'think_user';
	public function login($data){
		$info=db('admin')->where('username',$data['username'])->find();
		if($info){
			if(md5(substr(md5($data['password']),0,25).'lizhili')==$info['password']){
				if($info['isopen']==1){
					session('name', $info['username']);
					session('uid', $info['id']);
					return 1;//信息正确
				}else{
					return 0; //账号已经关闭
				}
			}else{
				return 0; //密码错误
			}
		}else{
			return 0;//用户名不存在
		}
	}
	public function add($data){
		$data['password']=md5(substr(md5($data['password']),0,25).'lizhili');
		$res=$this->allowField(true)->save($data);
		if($res){
			return 1;//添加成功
		}else{
			return 0;//添加失败
		}
	}
	
}