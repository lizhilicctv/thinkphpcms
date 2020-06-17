<?php
namespace app\manage\controller;
use app\manage\controller\Conn;
use app\manage\model\Evaluation as Evaluationmodel;
class Evaluation extends Conn
{
	//这里用前置操作，表示提前运行，本来要用于栏目删除子栏目呢，现在不用了
	protected $beforeActionList = [
        
    ];
    public function index()
    {
    	$evaluation=new Evaluationmodel();
		$evaluation=$evaluation->where('goods_id',input('id'))->paginate(4,false,['query'=>request()->param()]);
		$this->assign('evaluation',$evaluation);
    	
		$this->assign('goods_id', input('id'));
		$count1=db('evaluation')->count();
		$this->assign('count1', $count1);
       	return $this->fetch();
    }
	public function ajax()
    {
    	$data=input('param.');
		$evaluation=new Evaluationmodel();
		if($data['type']=='evaluation_del'){
			$id=$data['id'];
			$info=$evaluation->destroy($id);
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
			$evaluation=new Evaluationmodel();
			$evaluation->data([
				'pingjia'=>$data["pingjia"],
				'time'=>time(),
				'goods_id'=>$data["goods_id"]
			]);
			$res=$evaluation->save();
			if($res){
				return $this->success('添加成功',url('evaluation/index',['st'=>1]));
			}else{
				$this->error('友情链接添加失败了');
			}
    	}
       return $this->fetch();
    }
	
}
