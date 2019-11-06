<?php
namespace app\manage\controller;
use app\manage\controller\Conn;
use app\manage\model\Link as Linkmodel;
class Link extends Conn
{
	//这里用前置操作，表示提前运行，本来要用于栏目删除子栏目呢，现在不用了
	protected $beforeActionList = [
        
    ];
    public function index()
    {
    	$link=new Linkmodel();
    	if(request()->isPost()){
    		$data=input('key');
			$link=$link->where('title','like','%'.$data.'%')
						    ->order('sort asc')
						    ->paginate(4);
			$this->assign('link',$link);
    	}else{
    		$link=$link->order('sort asc,id desc')->paginate(4);
			$this->assign('link', $link);
    	}
		
		$count1=db('link')->count();
		$this->assign('count1', $count1);
       	return $this->fetch();
    }
	public function ajax()
    {
    	$data=input('param.');
		$link=new Linkmodel();
		if($data['type']=='link_del'){
			$id=$data['id'];
			$info=$link->destroy($id);
			if($info){
				return 1;//修改成功返回1
			}else{
				return 0;
			}

		}
		if($data['type']=='link_sort'){
			$arrlength=count($data['id']);
			$ar=[];
			for($x=0;$x<$arrlength;$x++)
			{
			    $ar[$x]=['id'=>$data['id'][$x], 'sort'=>$data['sort'][$x]];
			}
			$info=$link->saveAll($ar);
			if($info){
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
			$validate = new \app\manage\validate\Link;
			if(!$validate->check($data)){
				$this->error($validate->getError());
			}	
			$link=new Linkmodel();
			$link->data($data);
			$res=$link->save();
			if($res){
				return $this->success('添加成功',url('link/index',['st'=>1]));
			}else{
				$this->error('友情链接添加失败了');
			}
    	}
       return $this->fetch();
    }
	public function edit()
    {
    	$link = new Linkmodel();
    	if(request()->isPost()){
    		$data=input('post.');
			$validate = new \app\manage\validate\Link;
			if(!$validate->check($data)){
				$this->error($validate->getError());
			}	
			$res=$link->save($data,['id' => input('id')]);
			
			if($res){
				return $this->success('修改成功',url('link/index',['st'=>1]));
			}else{
				$this->error('友情链接修改失败了');
			}
    	}
		
		$id=input('id');
		$data= $link->get($id);
		$this->assign('data',$data);
       return $this->fetch();
    }
}
