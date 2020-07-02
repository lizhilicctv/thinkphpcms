<?php
namespace app\manage\controller;
use \think\Loader;
use app\manage\controller\Conn;
use app\manage\model\Shopad as Shopadmodel;
use think\Db;
class Shopad extends Conn
{
	//这里用前置操作，表示提前运行，本来要用于栏目删除子栏目呢，现在不用了
	protected $beforeActionList = [
        
    ];
    public function index()
    {
    	$shopad=new Shopadmodel();
    	$key=input('key') ? input('key') : '';
    	$this->assign('key',$key);
		
			$shopad=$shopad->whereor('title','like','%'.$key.'%')
						    ->order('sort asc,id desc')
						    ->paginate(4,false,['query'=>request()->param()]);
			$this->assign('shopad',$shopad);
    	
		$count1=db('shopad')->count();
		$this->assign('count1', $count1);
       	return $this->fetch();
    }
	public function ajax()
    {
    	$data=input('param.');
		$shopad=new Shopadmodel();
		if($data['type']=='shopad_del'){
			$id=$data['id'];
			//删除图片
			if($imgarr=Db::name('shopad')->where('id',$id)->value('img')){
				@unlink(substr($imgarr,1));
			}
			$info=$shopad->destroy($id);
			if($info){
				return 1;//修改成功返回1
			}else{
				return 0;
			}
		}
		if($data['type']=='shopad_sort'){
			$arrlength=count($data['id']);
			$ar=[];
			for($x=0;$x<$arrlength;$x++)
			{
			    $ar[$x]=['id'=>$data['id'][$x], 'sort'=>$data['sort'][$x]];
			}
			$info=$shopad->saveAll($ar);
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
			$validate = new \app\manage\validate\Shopad;
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
				$info = $file['img']->move('shopad');
				$li=strtr($info->getSaveName()," \ "," / ");
				$data['img']='/shopad/'.$li;
			}
			$link=new Shopadmodel();
			$link->data($data);
			$res=$link->save();
			if($res){
				return $this->success('添加成功',url('shopad/index',['st'=>1]));
			}else{
				$this->error('添加失败了');
			}
    	}
       return $this->fetch();
    }
	public function edit()
    {
    	$shopad = new Shopadmodel();
    	if(request()->isPost()){
    		$data=input('post.');
			$validate = new \app\manage\validate\Shopad;
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
				$info = $file['img']->move('shopad');
				$li=strtr($info->getSaveName()," \ "," / ");
				$data['img']='/shopad/'.$li;
			}
			
			$res=$shopad->save($data,['id' => input('id')]);
			
			if($res){
				return $this->success('修改成功',url('shopad/index',['st'=>1]));
			}else{
				$this->error('修改失败了');
			}
    	}
		
		$id=input('id');
		$data= $shopad->get($id);
		$this->assign('data',$data);
       return $this->fetch();
    }
}
