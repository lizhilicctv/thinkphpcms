<?php
namespace app\manage\controller;
use app\manage\controller\Conn;
use app\manage\model\Live as Livemodel;
use app\manage\model\LiveMsg;
use think\Db;

class Live extends Conn
{
	//这里用前置操作，表示提前运行，本来要用于栏目删除子栏目呢，现在不用了
	protected $beforeActionList = [
        
    ];
    public function index()
    {
        $live = new Livemodel();
        if(request()->isPost()){
            $data=input('post.');
            //插入 留言
            $list=[];
            $user = new LiveMsg();
            foreach ($data['id'] as $k=>$v){
                if($v!=0){
                    $user->update([
                        'name'=>$data['name'][$k],
                        'msg'=>$data['msg'][$k],
                        'time'=>$data['time'][$k],
                        'id'=>$v
                    ]);
                }else{
                    if($data['time'][$k] and $data['name'][$k] and $data['msg'][$k]){
                        $list[]=[
                            'name'=>$data['name'][$k],
                            'msg'=>$data['msg'][$k],
                            'time'=>$data['time'][$k],
                        ];
                    }
                }


            }

            $user->saveAll($list);
           
			if (!isset($data['isopen'])) {
                $data['isopen']=0;
            } else {
                $data['isopen']=1;
            }
 
            $file = request()->file('');
            if (isset($file['pic'])) {
                $info = $file['pic']->move('uploads');
                $li=strtr($info->getSaveName(), " \ ", " / ");
                $data['pic']='/uploads/'.$li;
            }


			$live=new Livemodel();
            unset($data['id']);
            $res=$live->force()->save($data,['id'=>1]);
            if($res){
                return $this->success('添加成功');
            }else{
                $this->error('添加失败了');
            }
        }
        $data= $live->get(1);
        $this->assign('data',$data);
        $this->assign('goods',Db::name('goods')->select());
        $this->assign('msg',Db::name('live_msg')->select());
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
