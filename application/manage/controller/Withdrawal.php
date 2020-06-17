<?php
namespace app\manage\controller;
use app\manage\controller\Conn;
use app\manage\model\Withdrawal as Withdrawalmodel;
use think\Db;
class Withdrawal extends Conn
{
	//这里用前置操作，表示提前运行，本来要用于栏目删除子栏目呢，现在不用了
	protected $beforeActionList = [
        
    ];
    public function index()
    {
    	$withdrawal=new Withdrawalmodel();
    	$key=input('key') ? input('key') : '';
    	$this->assign('key',$key);;
		$withdrawal=$withdrawal->where('name','like','%'.$key.'%')
						->order('id desc')
						->paginate(8,false,['query'=>request()->param()])->each(function($item, $key){
							$item->nickname = Db::name('user')->where('id',$item->user_id)->value('nickName');
						});
		$this->assign('withdrawal',$withdrawal);
    	
		
		$count1=db('withdrawal')->count();
		$this->assign('count1', $count1);
       	return $this->fetch();
    }
	public function ajax()
    {
    	$data=input('param.');
		$withdrawal=new Withdrawalmodel();
		if($data['type']=='withdrawal_del'){
			$id=$data['id'];
			$info=$withdrawal->destroy($id);
			if($info){
				return 1;//修改成功返回1
			}else{
				return 0;
			}

		}
		
		return 0;
    }
	public function edit()
    {
    	$withdrawal = new Withdrawalmodel();
    	if(request()->isPost()){
    		$data=input('post.');
			if(!isset($data['status'])){
				$this->error('没有选择处理结果');
			}
			$res=$withdrawal->save($data,['id' => input('id')]);
			$data= $withdrawal->get(input('id'));
			//余额减去 提现金额
			Db::name('user')->where('id',$data['user_id'])->setDec('money',$data['money']);
			if($res){
				return $this->success('修改成功',url('withdrawal/index',['st'=>1]));
			}else{
				$this->error('修改失败了');
			}
    	}
		
		$id=input('id');
		$data= $withdrawal->get($id);
		$this->assign('data',$data);
       return $this->fetch();
    }
}
