<?php
namespace app\index\model;
use think\Model;
use think\Db;
class Base extends Model
{
	//如果表名和文件名不是对应的，用下面代码修改
	protected $table = 'lizhili_system';
	public function getsystem()
    {
        return $this->column('value','enname');
    }
	public function ad(){
        return Db::name('advertisement')->where('isopen',1)->column('*','key');
	}
}