<?php
namespace app\manage\model;
use think\Model;
class Cate extends Model
{
	//如果表名和文件名不是对应的，用下面代码修改
	//protected $table = 'think_user';
	public function tree(){
		$res = $this->order('sort ASC')->select();
		return $this->sort($res);
	}
	public function sort($res,$fid=0,$level=0){
		static $arr=[];//这样需要学习一下
		foreach ($res as $key => $value) {
			if($value['fid']==$fid){
				$value['level']=$level;
				$arr[]=$value;
				$this->sort($res,$value['id'],$level+1);
			}
		}
		return $arr;
	}
	
	
}