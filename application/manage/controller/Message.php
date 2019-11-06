<?php
namespace app\manage\controller;
use app\manage\controller\Conn;
use app\manage\model\Message as Messagemodel;
use think\Db;
class Message extends Conn
{
	//这里用前置操作，表示提前运行，本来要用于栏目删除子栏目呢，现在不用了
	protected $beforeActionList = [
        
    ];
    public function index()
    {
    	$link=new Messagemodel();
    	if(request()->isPost()){
    		$data=input('key');
			$link=$link->whereor('title','like','%'.$data.'%')
						    ->order('id desc')
						    ->paginate(10);
			$this->assign('comment',$link);
    	}else{
    		$data=$link->order('id desc')->paginate(10);
			$this->assign('comment',$data);
    	}
		
		$count1=db('message')->count();
		$this->assign('count1', $count1);
       	return $this->fetch();
    }
	public function ajax()
    {
    	$data=input('param.');
		$message=new Messagemodel();
		if($data['type']=='member_del'){
			$id=$data['id'];
			$info=$message->destroy($id);
			$liu=$message->where('isopen','0')->count();
			if($info){
				return [1,$liu];//修改成功返回1
			}else{
				return 0;
			}
		}
		return 0;
    }
	public function edit()
    {
    	$message=new Messagemodel();
    	if(request()->isPost()){
    		$data=input('post.');
			$res=$message->save($data,['id' => input('id')]);
			$liu=$message->where('isopen','0')->count();
			if($res){
				if($liu!=0){
					echo '<script>parent.parent.document.getElementById("lizhili_liu").innerHTML="留',$liu,'"</script>';
				}else{
					echo '<script>parent.parent.document.getElementById("lizhili_liu").innerHTML="留"</script>';
				}
				return $this->success('修改成功',url('message/index',['st'=>1]));
			}else{
				$this->error('修改失败了');
			}
    	}
		
		$id=input('id');
		$data=$message->get($id);
		$this->assign('data',$data);
       return $this->fetch();
    }
	
}
