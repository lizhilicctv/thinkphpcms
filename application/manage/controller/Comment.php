<?php
namespace app\manage\controller;
use app\manage\controller\Conn;
use app\manage\model\Comment as Commentmodel;
use think\Db;
class Comment extends Conn
{
	//这里用前置操作，表示提前运行，本来要用于栏目删除子栏目呢，现在不用了
	protected $beforeActionList = [
        
    ];
    public function index()
    {
    	$link=new Commentmodel();
    	if(request()->isPost()){
    		$data=input('key');
			$data=Db::table('lizhili_comment')
			->alias('a')
			->join('member m','a.user_id = m.id', 'LEFT')
			->order('a.id','ASC')->field( 'a.id,content,wenzhang_id,a.create_time,a.update_time,m.username,a.isopen,score' )
			->whereor('content','like','%'.$data.'%')
			->paginate(10);
			$this->assign('comment',$data);
    	}else{
    		$data=Db::table('lizhili_comment')
			->alias('a')
			->join('member m','a.user_id = m.id', 'LEFT')
			->order('a.id','ASC')->field( 'a.id,content,wenzhang_id,a.create_time,a.update_time,m.username,a.isopen,score' )->paginate(10);
			$this->assign('comment',$data);
    	}
		
		$count1=db('comment')->count();
		$this->assign('count1', $count1);
       	return $this->fetch();
    }
	public function ajax()
    {
    	$data=input('param.');
		$comment=new Commentmodel();

		if($data['type']=='member_del'){
			$id=$data['id'];
			$info=$comment->destroy($id);
			$liu=$comment->where('isopen','-1')->count();
			if($info){
				return [1,$liu];//修改成功返回1
			}else{
				return 0;
			}
		}
		
		if($data['type']=='member_all'){
			$da=0;
			 $shu=count($data['id']);
			foreach($data['id'] as $value){ 
				Commentmodel::destroy($value);
				$da++;
			} 
			$liu=$comment->where('isopen','-1')->count();
			if($da==$shu){
				return [1,$liu];//修改成功返回1
			}else{
				return 0;
			}
		}
		
		return 0;
    }
	public function edit()
    {
    	$link = new Commentmodel();
    	if(request()->isPost()){
    		$data=input('post.');
			$validate = new \app\manage\validate\Comment;
			if(!$validate->check($data)){
				$this->error($validate->getError());
			}	
			$res=$link->save($data,['id' => input('id')]);
			
			
			$liu=$link->where('isopen','-1')->count();
			if($res){
				if($liu!=0){
					echo '<script>parent.parent.document.getElementById("lizhili_ping").innerHTML="评',$liu,'"</script>';
				}else{
					echo '<script>parent.parent.document.getElementById("lizhili_ping").innerHTML="评"</script>';
				}
				return $this->success('修改成功',url('comment/index',['st'=>1]));
			}else{
				$this->error('修改失败了');
			}
    	}
		
		$id=input('id');
		$data=Db::table('lizhili_comment')
			->alias('a')
			->join('member m','a.user_id = m.id', 'LEFT')
			->where('a.id',$id)
			->order('a.id','ASC')->field( 'a.id,content,wenzhang_id,a.create_time,a.update_time,m.username,a.isopen,score' )->find();
		$this->assign('data',$data);
       return $this->fetch();
    }
	
}
