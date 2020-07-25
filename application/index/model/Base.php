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
		$data=Db::name('advertisement')->column('id','key');
		foreach($data as $k=>$v){
			if(!!Db::name('advertisement')->where('id',$v)->value('isopen')){
				$data[$k]=Db::name('ad_img')->field('title,url,img')->where('isopen',1)->where('ad_id',$v)->select();
			}else{
				$data[$k]=[];
			}
		}
        return $data;
	}
}