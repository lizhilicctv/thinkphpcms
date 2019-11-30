<?php
namespace app\manage\controller;
use app\manage\controller\Conn;
use think\Db;
use app\manage\model\Cate as Catemodel;
class Cate extends Conn
{
   //这里用前置操作，表示提前运行，本来要用于栏目删除子栏目呢，现在不用了
	protected $beforeActionList = [
        
    ];
    public function index()
    {
    	if(request()->isPost()){
    		$data=input('post.');
			$datasort=Db::name('cate')
				    ->whereOr('catename','like','%'.$data['key'].'%')
				    ->order('id','ASC')->paginate(10);
			$this->assign('datasort',$datasort);
    	}else{
    		$cate=new Catemodel();
			$datasort=$cate->tree();
			$this->assign('datasort',$datasort);
    	}
		$count1=db('cate')->count();
		$this->assign('count1', $count1);
       	return $this->fetch();
    }
	public function ajax()
    {
    	$data=input('param.');
		if($data['type']=='cate_sort'){
			$arrlength=count($data['id']);
			$ar=[];
			for($x=0;$x<$arrlength;$x++)
			{
			    $ar[$x]=['id'=>$data['id'][$x], 'sort'=>$data['sort'][$x]];
			}
			$cate=new Catemodel();
			$info=$cate->saveAll($ar);
			if($info){
				return 1;//修改成功返回1
			}else{
				return 0;
			}
		}
		if($data['type']=='cate_del'){
			if(Db::name('cate')->where('fid',$data['id'])->find()){
				return 2;//下级有东西不能删除
			}else{
				//删除图片(单页内容图片)
				$shan=Db::name('cate')->find($data['id']);
				$imgarr=[];
				preg_match_all("/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/",$shan["editorValue"],$arr);
				foreach($arr[1] as $k=>$v){
					if($v and substr($v,0,4)!='http'){
						$imgarr[]=$v;	
					}
				}
				foreach($imgarr as $k1=>$v1){
					@unlink(substr($v1,1));
				}
				
				if(db('cate')->delete($data['id'])){
					return 1;//修改成功返回1
				}else{
					return 0;
				}
			}
			
		}
		return 0;
    }
	public function add()
    {
    	if(request()->isPost()){
			$data=input('post.');
			
			$validate = new \app\manage\validate\Cate;
			if(!$validate->check($data)){
				$this->error($validate->getError());
			}	
			$user = new Catemodel($data);
			$res=$user->save();
			if($res){
				$this->success('添加成功',url('cate/index',['st'=>1]));
			}else{
				$this->error('栏目添加失败了');
			}
    	}
		$cate=new Catemodel();
		$datasort=$cate->tree();
		$this->assign('datasort',$datasort);
       return $this->fetch();
    }
	public function edit()
    {
    	if(request()->isPost()){
			$data=input('post.');
			$validate = new \app\manage\validate\Cate;
			if(!$validate->check($data)){
				$this->error($validate->getError());
			}	
			if($data['id']==$data['fid']){
				$this->error('自己不能成为自己的下一级！');
			}
    		$user = new Catemodel();
			$res=$user->allowField(true)->save($data,['id' => input('id')]);
			if($res){
				return $this->success('修改成功',url('cate/index',['st'=>1]));
			}else{
				$this->error('栏目修改失败了');
			}
    	}
		
		$cid=input('id');
		$data=db('cate')->where('id',$cid)->find();
		$this->assign('data',$data);
		$cate=new Catemodel();
		$datasort=$cate->tree();
		$this->assign('datasort',$datasort);
       return $this->fetch();
    }
}
