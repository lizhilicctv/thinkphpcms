<?php
namespace app\manage\controller;
use app\manage\controller\Conn;
use \think\Loader;
use app\manage\model\AuthGroup as AuthGroupmodel;
use app\manage\model\AuthRule as AuthRulemodel;
use think\Db;
class Authgroup extends Conn
{
    public function index()
    {
    	$data=db('AuthGroup')->order('sort','ASC')->select();
		$this->assign('data',$data);
    	
		$count1=db('auth_group')->count();
		$this->assign('count1', $count1);
       	return $this->fetch('admin_role');
    }
	public function ajax()
    {
    	$data=input('param.');
		if($data['type']=='AuthGroup_start'){
			if(db('AuthGroup')->where('id',$data['id'])->setField('status',1)){
				return 1;//修改成功返回1
			}else{
				return 0;
			}
		}
       	if($data['type']=='AuthGroup_stop' and $data['id'] != 1){
			if(db('AuthGroup')->where('id',$data['id'])->setField('status',0)){
				return 1;//修改成功返回1
			}else{
				return 0;
			}
		}
		if($data['type']=='AuthGroup_del' and $data['id'] != 1){
			if(db('AuthGroup')->delete($data['id'])){
				return 1;//修改成功返回1
			}else{
				return 0;
			}
		}
		if($data['type']=='AuthGroup_sort'){
			$arrlength=count($data['id']);
			$ar=[];
			for($x=0;$x<$arrlength;$x++)
			{
			    $ar[$x]=['id'=>$data['id'][$x], 'sort'=>$data['sort'][$x]];
			}
			$info=new AuthGroupmodel();
			
			if($info->saveAll($ar)){
				return 1;//修改成功返回1
			}else{
				return 0;
			}
		}
		return 0;
    }
	public function add()
    {
    	if(request()->isPost()){
    		$data=input('post.');
			$validate = new \app\manage\validate\AuthGroup;
			if(!$validate->check($data)){
				$this->error($validate->getError());
			}
			if(!isset($data['rules'])){
				$this->error('请添加规则后提交！');
			}
			if($data['rules']){
				$data['rules'] = implode(',',$data['rules']);
			}
			if(db('AuthGroup')->insert($data)){
				return '<script>alert("你好，添加成功了！");parent.location.reload()</script>';
			}else{
				$this->error('添加失败了');
			}
    	}


		$cate=new AuthRulemodel();
		$datasort=$cate->tree();
		$this->assign('datasort',$datasort);
       return $this->fetch('admin_role_add');
    }
	public function edit()
    {
    	if(request()->isPost()){
    		$data=input('post.');
			$validate = new \app\manage\validate\AuthGroup;
			if(!$validate->check($data)){
				$this->error($validate->getError());
			}
			if(!isset($data['rules'])){
				$this->error('请添加规则后提交！');
			}
			if($data['rules']){
				$data['rules'] = implode(',',$data['rules']);
			}
			if(db('AuthGroup')->update($data)){
				return '<script>alert("你好，修改成功了！");parent.location.reload()</script>';
			}else{
				$this->error('修改失败了');
			}
    	}
		
		$cid=input('id');
		$data=db('AuthGroup')->where('id',$cid)->find();
		$this->assign('data',$data);
		$cate=new AuthRulemodel();
		$datasort=$cate->tree();
		$this->assign('datasort',$datasort);
       return $this->fetch('admin_role_edit');
    }
}
