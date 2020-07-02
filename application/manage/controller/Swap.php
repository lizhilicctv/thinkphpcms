<?php
namespace app\manage\controller;
use app\manage\controller\Conn;
use app\manage\model\Swap as Swapmodel;
use think\Db;
class Swap extends Conn
{
	//这里用前置操作，表示提前运行，本来要用于栏目删除子栏目呢，现在不用了
	protected $beforeActionList = [
        
    ];
    public function index()
    {
    	$swap=new Swapmodel();
    	$key=input('key') ? input('key') : '';
    	$this->assign('key',$key);;
	//	$swap=$swap->where('name','like','%'.$key.'%')
				$swap=$swap
						->alias('s')
						->join('user u','u.id = s.uid')
						->join('address adr','adr.id = s.address_id')
						->field('s.*,adr.sheng,adr.shi,adr.xian,adr.address,adr.name,u.nickname,adr.phone')
						->order('s.id desc')
						->where('name','like','%'.$key.'%')
						->paginate(8,false,['query'=>request()->param()]);
		$this->assign('swap',$swap);
		
		$count1=db('swap')->count();
		$this->assign('count1', $count1);
       	return $this->fetch();
    }
	public function ajax()
    {
    	$data=input('param.');
		$swap=new Swapmodel();
		if($data['type']=='swap_del'){
			$id=$data['id'];
			$info=$swap->destroy($id);
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
    	$swap = new Swapmodel();
    	if(request()->isPost()){
    		$data=input('post.');
			if(!isset($data['isopen'])){
				$this->error('没有选择处理结果');
			}
			$res=$swap->save($data,['id' => input('id')]);
			if($res){
				return $this->success('修改成功',url('swap/index',['st'=>1]));
			}else{
				$this->error('修改失败了');
			}
    	}
		
		$id=input('id');
		$data= $swap->get($id);
		$this->assign('data',$data);
       return $this->fetch();
    }
}
