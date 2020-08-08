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
	public function hot($id,$num,$field,$where,$debug){
		if($debug){
			$index_cate=Db::name('article')->where('state',1)->where($where)->field($field)->limit($num)->select();
		}else{
			if(!$index_cate=Cache::get('index_cate')){
				$index_cate=Db::name('article')->where('state',1)->where($where)->field($field)->limit($num)->select();
				Cache::set('index_cate',$index_cate,3600);
			}
		}
		return $index_cate;
	}
	public function sui($id,$num,$field,$where,$debug){
		$ids=Db::name('cate')->where('fid',$id)->column('id');
		$ids[]=$id;
		if($debug){
			$index_cate=Db::name('article')->where('cateid','in',$ids)->where($where)->field($field)->limit($num)->order(true)->select();
		}else{
			if(!$index_cate=Cache::get('index_cate')){
				$index_cate=Db::name('article')->where('cateid','in',$ids)->where($where)->field($field)->limit($num)->order(true)->select();
				Cache::set('index_cate',$index_cate,3600);
			}
		}
		return $index_cate;
	}
}