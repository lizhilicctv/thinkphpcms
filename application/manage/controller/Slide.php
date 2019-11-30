<?php
namespace app\manage\controller;
use \think\Loader;
use app\manage\controller\Conn;
use app\manage\model\Slide as Slidemodel;
use think\Db;
class Slide extends Conn
{
	//这里用前置操作，表示提前运行，本来要用于栏目删除子栏目呢，现在不用了
	protected $beforeActionList = [
        
    ];
    public function index()
    {
    	$slide=new Slidemodel();
    	if(request()->isPost()){
    		$data=input('key');
			$slide=$slide->whereor('title','like','%'.$data.'%')
						    ->order('sort asc,id desc')
						    ->paginate(4);
			$this->assign('slide',$slide);
    	}else{
    		$slide=$slide->order('sort asc,id desc')->paginate(4);
			$this->assign('slide', $slide);
    	}
		
		$count1=db('slide')->count();
		$this->assign('count1', $count1);
       	return $this->fetch();
    }
	public function ajax()
    {
    	$data=input('param.');
		$slide=new Slidemodel();
		if($data['type']=='slide_del'){
			$id=$data['id'];
			//删除图片
			if($imgarr=Db::name('slide')->where('id',$id)->value('img')){
				@unlink(substr($imgarr,1));
			}
			$info=$slide->destroy($id);
			if($info){
				return 1;//修改成功返回1
			}else{
				return 0;
			}
		}
		if($data['type']=='slide_sort'){
			$arrlength=count($data['id']);
			$ar=[];
			for($x=0;$x<$arrlength;$x++)
			{
			    $ar[$x]=['id'=>$data['id'][$x], 'sort'=>$data['sort'][$x]];
			}
			$info=$slide->saveAll($ar);
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
			$validate = new \app\manage\validate\Slide;
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
				$info = $file['img']->move('slide');
				$li=strtr($info->getSaveName()," \ "," / ");
				$data['img']='/slide/'.$li;
			}
			$link=new Slidemodel();
			$link->data($data);
			$res=$link->save();
			if($res){
				return $this->success('添加成功',url('slide/index',['st'=>1]));
			}else{
				$this->error('添加失败了');
			}
    	}
       return $this->fetch();
    }
	public function edit()
    {
    	$slide = new Slidemodel();
    	if(request()->isPost()){
    		$data=input('post.');
			$validate = new \app\manage\validate\Slide;
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
				$info = $file['img']->move('slide');
				$li=strtr($info->getSaveName()," \ "," / ");
				$data['img']='/slide/'.$li;
			}
			
			$res=$slide->save($data,['id' => input('id')]);
			
			if($res){
				return $this->success('修改成功',url('slide/index',['st'=>1]));
			}else{
				$this->error('修改失败了');
			}
    	}
		
		$id=input('id');
		$data= $slide->get($id);
		$this->assign('data',$data);
       return $this->fetch();
    }
}
