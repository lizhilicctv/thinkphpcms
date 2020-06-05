<?php
namespace app\manage\controller;
use \think\Loader;
use app\manage\controller\Conn;
use think\Db;
class Pilot extends Conn
{
	//这里用前置操作，表示提前运行，本来要用于栏目删除子栏目呢，现在不用了
	protected $beforeActionList = [
        
    ];
    public function nav()
    {
    	$pilot_nav=model('pilot_nav');
        $pilot_nav=$pilot_nav->order('sort asc,id desc')->paginate(4,false,['query'=>request()->param()]);
        $this->assign('pilot_nav',$pilot_nav);
    	
		$count1=db('pilot_nav')->count();
		$this->assign('count1', $count1);
       	return $this->fetch();
    }
	
	public function cms()
	{
		if(request()->isPost()){
			$data=\input('post.');
			if (!isset($data['iswo'])) {
			    $data['iswo']=0;
			} else {
			    $data['iswo']=1;
			}
			$cms=\model('cms');
			if($cms->save($data,['id' => 1])){
			    $this->success('添加成功');
			}else{
			    $this->error('添加失败了');
			}
		}
		$this->assign('data',Db::name('cms')->find(1));
	   	return $this->fetch();
	}
	
    public function lit()
    {
        $pilot_list=model('pilot_list');
        $pilot_list=$pilot_list->tree();
        $this->assign('pilot_list',$pilot_list);

        $count1=db('pilot_list')->count();
        $this->assign('count1', $count1);
        return $this->fetch();
    }
	public function icon()
	{
	    return $this->fetch();
	}
	public function litadd()
	{
		if(request()->isPost()){
			$data=input('post.');
			if (!isset($data['isopen'])) {
			    $data['isopen']=0;
			} else {
			    $data['isopen']=1;
			}

	        $pilot_list=model('pilot_list');
			if($pilot_list->save($data)){
				return $this->success('添加成功',url('pilot/lit',['st'=>1]));
			}else{
				$this->error('添加失败了');
			}
		}
		$ding=Db::name('pilot_nav')->where('isopen',1)->select();
		 $this->assign('ding',$ding);
		$ce=Db::name('pilot_list')->where('fid',0)->where('isopen',1)->select();
		 $this->assign('ce',$ce);
	   return $this->fetch();
	}
	public function litedit()
	{
	    $pilot_list=model('pilot_list');
	    if(request()->isPost()){
	        $data=input('post.');
	        if (!isset($data['isopen'])) {
	            $data['isopen']=0;
	        } else {
	            $data['isopen']=1;
	        }
	        if($pilot_list->save($data,['id' => input('id')])){
	            return $this->success('添加成功',url('pilot/nav',['st'=>1]));
	        }else{
	            $this->error('添加失败了');
	        }
	    }
		$ding=Db::name('pilot_nav')->where('isopen',1)->select();
		 $this->assign('ding',$ding);
		$ce=Db::name('pilot_list')->where('fid',0)->where('isopen',1)->select();
		 $this->assign('ce',$ce);
		 
	    $id=input('id');
	    $data= $pilot_list->get($id);
	    $this->assign('data',$data);
	    return $this->fetch();
	}
	public function ajax()
    {
    	$data=input('param.');
        $pilot_nav=model('pilot_nav');
		$pilot_list=model('pilot_list');
		if($data['type']=='pilotl_del'){
			$id=$data['id'];
			$info=$pilot_list->destroy($id);
			if($info){
				return 1;//修改成功返回1
			}else{
				return 0;
			}
		}
		if($data['type']=='pilotl_sort'){
			$arrlength=count($data['id']);
			$ar=[];
			for($x=0;$x<$arrlength;$x++)
			{
			    $ar[$x]=['id'=>$data['id'][$x], 'sort'=>$data['sort'][$x]];
			}
			$info=$pilot_list->saveAll($ar);
			if($info){
				return 1;//修改成功返回1
			}else{
				return 0;
			}
		}
		if($data['type']=='pilotl_start'){
		    if(Db::name('pilot_list')->where('id',$data['id'])->setField('isopen',1)){
		        return 1;//修改成功返回1
		    }else{
		        return 0;
		    }
		}
		if($data['type']=='pilotl_stop'){
		    if(Db::name('pilot_list')->where('id',$data['id'])->setField('isopen',0)){
		        return 1;//修改成功返回1
		    }else{
		        return 0;
		    }
		}
		
		
		if($data['type']=='pilotn_del'){
			$id=$data['id'];
			$info=$pilot_nav->destroy($id);
			if($info){
				return 1;//修改成功返回1
			}else{
				return 0;
			}
		}
		if($data['type']=='pilotn_sort'){
			$arrlength=count($data['id']);
			$ar=[];
			for($x=0;$x<$arrlength;$x++)
			{
			    $ar[$x]=['id'=>$data['id'][$x], 'sort'=>$data['sort'][$x]];
			}
			$info=$pilot_nav->saveAll($ar);
			if($info){
				return 1;//修改成功返回1
			}else{
				return 0;
			}
		}
        if($data['type']=='pilotn_start'){
            if(Db::name('pilot_nav')->where('id',$data['id'])->setField('isopen',1)){
                return 1;//修改成功返回1
            }else{
                return 0;
            }
        }
        if($data['type']=='pilotn_stop'){
            if(Db::name('pilot_nav')->where('id',$data['id'])->setField('isopen',0)){
                return 1;//修改成功返回1
            }else{
                return 0;
            }
        }
		return 0;
    }
	public function navadd()
    {
    	if(request()->isPost()){
			$data=input('post.');
			if(!isset($data['name'])){
                $this->error('顶部导航名称没有填写！');
			}
            $pilot_nav=model('pilot_nav');
			if($pilot_nav->save($data)){
				return $this->success('添加成功',url('pilot/nav',['st'=>1]));
			}else{
				$this->error('添加失败了');
			}
    	}
       return $this->fetch();
    }
    public function navedit()
    {
        $pilot_nav=model('pilot_nav');
        if(request()->isPost()){
            $data=input('post.');
            if(!isset($data['name'])){
                $this->error('顶部导航名称没有填写！');
            }
            $pilot_nav=model('pilot_nav');
            if($pilot_nav->save($data,['id' => input('id')])){
                return $this->success('添加成功',url('pilot/nav',['st'=>1]));
            }else{
                $this->error('添加失败了');
            }
        }

        $id=input('id');
        $data= $pilot_nav->get($id);
        $this->assign('data',$data);
        return $this->fetch();
    }

}
