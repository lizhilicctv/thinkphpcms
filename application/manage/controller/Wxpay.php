<?php
namespace app\manage\controller;
use app\manage\controller\Conn;

use think\Db;

class Wxpay extends Conn
{
	//这里用前置操作，表示提前运行，本来要用于栏目删除子栏目呢，现在不用了
	protected $beforeActionList = [
        
    ];
    public function index()
    {
        
        if(request()->isPost()){
            $data=input('post.');
            //插入 留言
			foreach($data as $k=>$v){
				Db::name('xcxpay')->where('name',$k)->update(['value'=>$v]);
			}
            $this->success('修改成功');
        }
        $data= Db::name('xcxpay')->select();
        $this->assign('data',$data);

       	return $this->fetch();
    }
	public function ajax()
    {
    	$data=input('param.');
		if($data['type']=='del_msg'){
			if(Db::name('live_msg')->delete($data['id'])){
				return 1;//修改成功返回1
			}else{
				return 0;
			}

		}

		return 0;
    }

}
