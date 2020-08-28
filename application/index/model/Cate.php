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
			$order='state desc,time desc,id asc';
		}else{
			$order='state desc,time desc,id desc';
		}
		if(config('app_debug')){
			$index_cate=Db::name('article')->where('cateid',$id)->where($where)->field($field)->limit($offset,$num)->order($order)->select();
		}else{
			if(!$index_cate=Cache::get('index_cate')){
				$index_cate=Db::name('article')->where('cateid',$id)->where($where)->field($field)->limit($offset,$num)->order($order)->select();
				Cache::set('index_cate',$index_cate,3600);
			}
		}
		return $index_cate;
	}

	public function cateall($unid, $num, $order,$field, $where){
		if(!is_array($unid)){
			return 'unid 必须为数组！';
		}
		if($order){
			$order1='id asc';
		}else{
			$order1='id desc';
		}
	
		if(config('app_debug')){
			$cateall=Db::name('cate')->where('fid',0)->where('isopen',1)->where('id','notin',$unid)->where('type','in',[1,2])->order($order1)->field('id,catename,en_name')->select();
			foreach($cateall as $k=>$v){
				if($order){
					$order='state desc,time desc,id asc';
				}else{
					$order='state desc,time desc,id desc';
				}
				$data=Db::name('cate')->where('fid',$v['id'])->where('isopen',1)->where('id','notin',$unid)->where('type','in',[1,2])->order($order1)->field('id,catename,en_name')->select();
				foreach($data as $k=>$v){
					$data[$k]['list']=Db::name('article')->where('cateid',$v['id'])->where($where)->field($field)->limit($num)->order($order)->select();
				}
				$cateall[$k]['zi']=$data;
			}
		}else{
			if(!$cateall=Cache::get('index_cate')){
				$cateall=Db::name('cate')->where('fid',0)->where('isopen',1)->where('id','notin',$unid)->where('type','in',[1,2])->order($order1)->field('id,catename,en_name')->select();
				foreach($cateall as $k=>$v){
					if($order){
						$order='state desc,time desc,id asc';
					}else{
						$order='state desc,time desc,id desc';
					}
					$data=Db::name('cate')->where('fid',$v['id'])->where('isopen',1)->where('id','notin',$unid)->where('type','in',[1,2])->order($order1)->field('id,catename,en_name')->select();
					foreach($data as $k=>$v){
						$data[$k]['list']=Db::name('article')->where('cateid',$v['id'])->where($where)->field($field)->limit($num)->order($order)->select();
					}
					$cateall[$k]['zi']=$data;
				}
				Cache::set('index_cate',$cateall,3600);
			}
		}
		return $cateall;
	}
	public function catelist($unid, $num, $order,$field, $where){
		if(!is_array($unid)){
			return 'unid 必须为数组！';
		}
		if($order){
			$order1='id asc';
		}else{
			$order1='id desc';
		}
	
		if(config('app_debug')){
			$catelist=Db::name('cate')->where('isopen',1)->where('id','notin',$unid)->where('type','in',[1,2])->order($order1)->field('id,catename,en_name')->select();
			foreach($catelist as $k=>$v){
				if($order){
					$order='state desc,time desc,id asc';
				}else{
					$order='state desc,time desc,id desc';
				}
				$catelist[$k]['list']=Db::name('article')->where('cateid',$v['id'])->where($where)->field($field)->limit($num)->order($order)->select();
			}
		}else{
			if(!$catelist=Cache::get('index_cate')){
				$catelist=Db::name('cate')->where('isopen',1)->where('id','notin',$unid)->where('type','in',[1,2])->order($order1)->field('id,catename,en_name')->select();
				foreach($catelist as $k=>$v){
					if($order){
						$order='state desc,time desc,id asc';
					}else{
						$order='state desc,time desc,id desc';
					}
					$catelist[$k]['list']=Db::name('article')->where('cateid',$v['id'])->where($where)->field($field)->limit($num)->order($order)->select();
				}
				Cache::set('index_cate',$catelist,3600);
			}
		}
		return $catelist;
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
			$order='time desc,id asc';
		}else{
			$order='time desc,id desc';
		}
		if(config('app_debug')){
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
		if(config('app_debug')){
			$index_cate=Db::name('article')->where($where2)->where($where)->field($field)->limit($num)->order(true)->select();
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