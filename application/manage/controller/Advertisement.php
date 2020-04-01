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
    	if(request()->isPost()){
    		$data=input('key');
			$advertisement=$advertisement->where(function($query) use ($data){
					$query->whereor('title','like','%'.$data.'%')->whereor('key','like','%'.$data.'%');
				})->order('id desc')->paginate(8);
			$this->assign('advertisement',$advertisement);
    	}else{
    		$advertisement=$advertisement->order('id desc')->paginate(8);
			$this->assign('advertisement', $advertisement);
    	}
		
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
			if($imgarr=Db::name('advertisement')->where('id',$id)->value('img')){
				@unlink(substr($imgarr,1));
			}
			$info=$advertisement->destroy($id);
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
