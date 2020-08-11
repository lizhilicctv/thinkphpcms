<?php
namespace app\index\model;
use think\Model;
use think\Db;
use think\facade\Cache;
class Cate extends Model
{
	//如果表名和文件名不是对应的，用下面代码修改
	public function cate($id,$num,$offset,$order,$field,$where){
		if($order){
			$order='state desc,id asc';
		}else{
			$order='state desc,id desc';
		}
		if(!config('app_debug')){
			$index_cate=Db::name('article')->where('cateid',$id)->where($where)->field($field)->limit($offset,$num)->order($order)->select();
		}else{
			if(!$index_cate=Cache::get('index_cate')){
				$index_cate=Db::name('article')->where('cateid',$id)->where($where)->field($field)->limit($offset,$num)->order($order)->select();
				Cache::set('index_cate',$index_cate,3600);
			}
		}
		return $index_cate;
	}
	public function hot($id,$num,$offset,$order,$field,$where){
		if($id==0){
			$where2=true;
		}else{
			$ids=Db::name('cate')->where('fid',$id)->column('id');
			$ids[]=$id;
			$where2=[
				'cateid'=>$ids
			];
		}
		if($order){
			$order='id asc';
		}else{
			$order='id desc';
		}
		if(!config('app_debug')){
			$index_cate=Db::name('article')->where($where2)->where('state',1)->where($where)->field($field)->limit($offset,$num)->order($order)->select();
		}else{
			if(!$index_cate=Cache::get('index_cate')){
				$index_cate=Db::name('article')->where($where2)->where('state',1)->where($where)->field($field)->limit($offset,$num)->order($order)->select();
				Cache::set('index_cate',$index_cate,3600);
			}
		}
		return $index_cate;
	}
	public function sui($id,$num,$field,$where){
		if($id==0){
			$where2=true;
		}else{
			$ids=Db::name('cate')->where('fid',$id)->column('id');
			$ids[]=$id;
			$where2=[
				'cateid'=>$ids
			];
		}
		if(!config('app_debug')){
			$index_cate=Db::name('article')->where($where2)->where($where)->field($field)->limit($num)->order(true)->select();
			 dump( Db::getLastSql());
		}else{
			if(!$index_cate=Cache::get('index_cate')){
				$index_cate=Db::name('article')->where($where2)->where($where)->field($field)->limit($num)->order(true)->select();
				Cache::set('index_cate',$index_cate,3600);
			}
		}
		
		return $index_cate;
	}
	public function breadcrumb($controller,$action,$id){
		$cate=[];
		if($action=='cate'){
			if($wo=Db::name('cate')->where('id',$id)->field('id,fid,catename')->find()){
				$cate[]=$wo;
			}
			if($wo=Db::name('cate')->where('id',$wo['fid'])->field('id,fid,catename')->find()){
				$cate[]=$wo;
			}
		}
		
		if($action=='show'){
			$id=Db::name('article')->where('id',$id)->value('cateid');
			if($wo=Db::name('cate')->where('id',$id)->field('id,fid,catename')->find()){
				$cate[]=$wo;
			}
			if($wo=Db::name('cate')->where('id',$wo['fid'])->field('id,fid,catename')->find()){
				$cate[]=$wo;
			}
		}
		return array_reverse($cate);
	}
}