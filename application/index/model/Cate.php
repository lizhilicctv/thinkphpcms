<?php
namespace app\index\model;
use think\Model;
use think\Db;
use think\facade\Cache;
class Cate extends Model
{
	//如果表名和文件名不是对应的，用下面代码修改
	public function cate($id,$num,$offset,$field,$where,$debug){
		if($debug){
			$index_cate=Db::name('article')->where('cateid',$id)->where($where)->field($field)->limit($offset,$num)->select();
		}else{
			if(!$index_cate=Cache::get('index_cate')){
				$index_cate=Db::name('article')->where('cateid',$id)->where($where)->field($field)->limit($offset,$num)->select();
				Cache::set('index_cate',$index_cate,3600);
			}
		}
		return $index_cate;
	}
}