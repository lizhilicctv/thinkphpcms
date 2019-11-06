<?php
namespace app\manage\controller;
use app\manage\controller\Conn;
use app\manage\model\Member as Membermodel;
use think\Db;
class Member extends Conn
{
	//这里用前置操作，表示提前运行，本来要用于栏目删除子栏目呢，现在不用了
	protected $beforeActionList = [
        
    ];
    public function index()
    {
    	$link=new Membermodel();
    	if(request()->isPost()){
    		$data=input('key');
			$link=$link->whereor('username','like','%'.$data.'%')
						    ->order('id asc')
						    ->paginate(10);
			$this->assign('member',$link);
    	}else{
    		$link=$link->order('id desc')->paginate(10);
			$this->assign('member', $link);
    	}
		
		$count1=db('member')->count();
		$this->assign('count1', $count1);
       	return $this->fetch();
    }
	public function ajax()
    {
    	$data=input('param.');
		$member=new Membermodel();
		
		if($data['type']=='member_start'){
			if(db('member')->where('id',$data['id'])->setField('isopen',1)){
				return 1;//修改成功返回1
			}else{
				return 0;
			}
		}
       	if($data['type']=='member_stop'){
			if(db('member')->where('id',$data['id'])->setField('isopen',0)){
				return 1;//修改成功返回1
			}else{
				return 0;
			}
		}
		
		
		if($data['type']=='member_del'){
			if(Membermodel::destroy($data['id'])){
				return 1;//修改成功返回1
			}else{
				return 0;
			}
		}
		if($data['type']=='member_zhongdel'){
			if(Membermodel::destroy($data['id'],true)){
				return 1;//修改成功返回1
			}else{
				return 0;
			}
		}
		if($data['type']=='member_huanyuan'){
			if(Db::name('member')->where('id',$data['id'])->update(['delete_time' => null])){
				return 1;//修改成功返回1
			}else{
				return 0;
			}
		}
		if($data['type']=='member_all'){
			$da=0;
			 $shu=count($data['id']);
			foreach($data['id'] as $value){ 
				Membermodel::destroy($value);
				$da++;
			} 
			if($da==$shu){
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
			$ping=db('shield')->find('1');
			$pingarr=explode("|", $ping['shield']);
			if(in_array($data['username'], $pingarr)){
				$this->error('用户名包含敏感字，不能注册！');
			}
			
			$validate = new \app\manage\validate\Member;
			if(!$validate->check($data)){
				$this->error($validate->getError());
			}	
			$data['state']=1;
			$data['isopen']=1;
			$member=new Membermodel();
			$member->data($data);
			$res=$member->save();
			if($res){
				return $this->success('添加成功',url('member/index',['st'=>1]));
			}else{
				$this->error('添加失败了');
			}
    	}
       return $this->fetch();
    }
	public function edit()
    {
    	$link = new Membermodel();
    	if(request()->isPost()){
    		$data=input('post.');
			$ping=db('shield')->find('1');
			$pingarr=explode("|", $ping['shield']);
			if(in_array($data['username'], $pingarr)){
				$this->error('用户名包含敏感字，不能注册！');
			}
			$validate = new \app\manage\validate\Member;
			if(!$validate->check($data)){
				$this->error($validate->getError());
			}	
			$zhi=db('member')->find($data['id']);
			if($data['sheng']=='请选择'){
				$data['sheng']=$zhi['sheng'];
				$data['xian']=$zhi['xian'];
				$data['shi']=$zhi['shi'];
			}

			$res=$link->save($data,['id' => input('id')]);
			
			if($res){
				return $this->success('修改成功',url('link/index',['st'=>1]));
			}else{
				$this->error('修改失败了');
			}
    	}
		
		$id=input('id');
		$data= $link->get($id);
		$this->assign('data',$data);
       return $this->fetch();
    }
	public function password()
    {
    	$link = new Membermodel();
    	if(request()->isPost()){
    		$data=input('post.');
			
			$validate = new \app\manage\validate\Member;
			if(!$validate->scene('edit')->check($data)){
				$this->error($validate->getError());
			}	
			$data1 = [
				'password'=>md5($data['password']),
			];
			$res=$link->save($data1,['id' => input('id')]);
			
			if($res){
				return $this->success('修改成功',url('link/index',['st'=>1]));
			}else{
				$this->error('修改失败了');
			}
    	}
		
		$id=input('id');
		$data= $link->get($id);
		$this->assign('data',$data);
       return $this->fetch();
    }
	public function shan()
    {
    	$link=new Membermodel();
    	if(request()->isPost()){
    		$data=input('key');
			$link=$link->whereor('username','like','%'.$data.'%')
						    ->order('id asc')
						    ->paginate(10);
			$this->assign('member',$link);
    	}else{
    		$link=$link->onlyTrashed()->order('id desc')->paginate(10);
			$this->assign('member', $link);
    	}
		
		$count1=db('member')->where('delete_time','<>','null')->count();
		$this->assign('count1', $count1);
       	return $this->fetch();
    }
}
