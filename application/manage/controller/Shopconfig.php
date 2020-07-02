<?php
namespace app\manage\controller;
use app\manage\controller\Conn;

use think\Db;

class Shopconfig extends Conn
{
	//这里用前置操作，表示提前运行，本来要用于栏目删除子栏目呢，现在不用了
	protected $beforeActionList = [
        
    ];
    public function index()
    {
     
        if(request()->isPost()){
            $data=input('post.');
            //插入 留言
			$file = request()->file('');
			if (isset($file['logo'])) {
			    $info = $file['logo']->move('shopconfig');
			    $li=strtr($info->getSaveName(), " \ ", " / ");
			    $data['logo']='/shopconfig/'.$li;
			}
			if (isset($file['share_img'])) {
			    $info = $file['share_img']->move('shopconfig');
			    $li=strtr($info->getSaveName(), " \ ", " / ");
			    $data['share_img']='/shopconfig/'.$li;
			}
            if(Db::name('shopconfig')->where('id',1)->update($data)){
                $this->success('修改成功');
            }else{
                $this->error('修改失败了');
            }
        }
        $data= Db::name('shopconfig')->get(1);
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
