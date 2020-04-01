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
        $list=$this->field('enname,value')->select();
		$arr=[];
		foreach ($list as $key => $value) {
			$arr[$value["enname"]]=$value["value"];
		}
		return $arr;
    }
	public function ad(){
		$data=Db::name('advertisement')->where('isopen',1)->column('*','key');
		return $data;
	}
}