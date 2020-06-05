<?php
namespace app\manage\controller;
use \think\Loader;
use app\manage\controller\Conn;
use app\manage\model\Advertisement as Advertisementmodel;
use think\Db;
class Advertisement extends Conn
{
	//这里用前置操作，表示提前运行，本来要用于栏目删除子栏目呢，现在不用了
	protected $beforeActionList = [
        
    ];
    public function index()
    {
    	$advertisement=new Advertisementmodel();
    	
    		$key=input('key') ? input('key') : '';
    		$this->assign('key',$key);
			$advertisement=$advertisement->where(function($query) use ($key){
					$query->whereor('key','like','%'.$key.'%');
				})->order('id desc')->paginate(8,false,['query'=>request()->param()]);
			$this->assign('advertisement',$advertisement);
    	
		
		$count1=db('advertisement')->count();
		$this->assign('count1', $count1);
       	return $this->fetch();
    }
	public function ajax()
    {
    	$data=input('param.');
		$advertisement=new Advertisementmodel();
		if($data['type']=='advertisement_del'){
			$id=$data['id'];
			
			//删除图片
			$imgarr=Db::name('ad_img')->where('ad_id',$id)->column('img');
			foreach($imgarr as $v){
				@unlink(substr($v,1));
			}
			Db::name('ad_img')->where('ad_id',$id)->delete();
			$info=$advertisement->destroy($id);
			if($info){
				return 1;//修改成功返回1
			}else{
				return 0;
			}
		}
		if($data['type']=='advertisement_del_img'){
			$id=$data['id'];
			//删除图片
			$imgarr=Db::name('ad_img')->where('id',$id)->value('img');
			@unlink(substr($v,1));
			if(Db::name('ad_img')->where('id',$id)->delete()){
				return 1;//修改成功返回1
			}else{
				return 0;
			}
		}
		
		
		
		return 0;
    }
	
	
	public function add_img()
	{
		if(request()->isPost()){
			$data=input('post.');
			if(!isset($data['isopen'])){
				$data['isopen']=0;
			}else{
				$data['isopen']=1;
			}
			
			$file = request()->file('');
			if(isset($file['img'])){
				$info = $file['img']->move('advertisement');
				$li=strtr($info->getSaveName()," \ "," / ");
				$data['img']='/advertisement/'.$li;
			}else{
				$this->error('图片必须填写');
			}
			$link=model('ad_img');
			$link->data($data);
			$res=$link->save();
			if($res){
				return $this->success('添加成功',url('advertisement/index',['st'=>1]));
			}else{
				$this->error('添加失败了');
			}
		}
		$this->assign('ad_id', input('id'));
		return $this->fetch();
	}
	public function guan_img()
	{
		$data=Db::name('ad_img')->order('id desc')->paginate(8);
		$this->assign('data',$data);
		
		$count1=Db::name('ad_img')->count();
		$this->assign('count1', $count1);
		$this->assign('ad_id', input('id'));
	   	return $this->fetch();
	}
	
	public function img_edit()
	{

		if(request()->isPost()){
			$data=input('post.');
			
			if(!isset($data['isopen'])){
				$data['isopen']=0;
			}else{
				$data['isopen']=1;
			}
	
			$file = request()->file('');
			if(isset($file['img'])){
				$info = $file['img']->move('advertisement');
				$li=strtr($info->getSaveName()," \ "," / ");
				$data['img']='/advertisement/'.$li;
			}
			$advertisement=\model('ad_img');
			$res=$advertisement->save($data,['id' => input('id')]);
			
			if($res){
				return $this->success('修改成功',url('advertisement/index',['st'=>1]));
			}else{
				$this->error('修改失败了');
			}
		}
		
		$id=input('id');
		$data= Db::name('ad_img')->find($id);
		$this->assign('data',$data);
	   return $this->fetch();
	}
	
	
	
	
	public function add()
    {
    	if(request()->isPost()){
			$data=input('post.');
			$validate = new \app\manage\validate\Advertisement;
			if(!$validate->check($data)){
				$this->error($validate->getError());
			}	
			if(!isset($data['isopen'])){
				$data['isopen']=0;
			}else{
				$data['isopen']=1;
			}
			
			$file = request()->file('');
			if(isset($file['img'])){
				$info = $file['img']->move('advertisement');
				$li=strtr($info->getSaveName()," \ "," / ");
				$data['img']='/advertisement/'.$li;
			}
			$link=new Advertisementmodel();
			$link->data($data);
			$res=$link->save();
			if($res){
				return $this->success('添加成功',url('advertisement/index',['st'=>1]));
			}else{
				$this->error('添加失败了');
			}
    	}
       return $this->fetch();
    }
	public function edit()
    {
    	$advertisement = new Advertisementmodel();
    	if(request()->isPost()){
    		$data=input('post.');
			$validate = new \app\manage\validate\Advertisement;
			if(!$validate->check($data)){
				$this->error($validate->getError());
			}	
			if(!isset($data['isopen'])){
				$data['isopen']=0;
			}else{
				$data['isopen']=1;
			}

			$file = request()->file('');
			if(isset($file['img'])){
				$info = $file['img']->move('advertisement');
				$li=strtr($info->getSaveName()," \ "," / ");
				$data['img']='/advertisement/'.$li;
			}
			
			$res=$advertisement->save($data,['id' => input('id')]);
			
			if($res){
				return $this->success('修改成功',url('advertisement/index',['st'=>1]));
			}else{
				$this->error('修改失败了');
			}
    	}
		
		$id=input('id');
		$data= $advertisement->get($id);
		$this->assign('data',$data);
       return $this->fetch();
    }
}
