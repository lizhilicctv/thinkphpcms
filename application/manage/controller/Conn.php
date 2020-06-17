<?php
namespace app\manage\controller;
use think\Controller;

use app\manage\controller\Auth;
use think\Db;

class Conn extends Controller
{
    public function initialize()
    {
         //date_default_timezone_set("PRC");
		
        if(!session('?name') or !session('?uid')){
        	return $this->error('请登陆后访问','login/index');
        }
		$auth=new Auth();
		$c=request()->controller();
		$a=request()->action();
		$url=$c.'/'.$a;
		if(session('uid')!==1){
			if($url!='Index/index'){
				if($url!='Index/main'){
					if(!$auth->check($url,session('uid'))){
						return $this->error('没有权限',url('index/main'));
					}
				}
				
			}
		}
	    $comment=Db::name('comment')->where('isopen','-1')->count();
		$this->assign('comment', $comment);	
	    $message=Db::name('message')->where('isopen','0')->count();
		$this->assign('message', $message);
		$ding=Db::name('order')->where('order_status',0)->count();
		$this->assign('ding', $ding);
		//获取导航
       $pilot_nav=Db::name('pilot_nav')->where('isopen',1)->order('sort asc')->select();
        $this->assign('pilot_nav', $pilot_nav);
        //侧边导航
        foreach ($pilot_nav as $k=>$v){
            $arr=Db::name('pilot_list')->where('fid',0)->where('pn_id',$v['id'])->where('isopen',1)->order('sort asc')->select();
            foreach ($arr as $k1=>$v1){
                $arr[$k1]['zi']=Db::name('pilot_list')->where('fid',$v1['id'])->where('isopen',1)->order('sort asc')->select();
            }
            $pilot_list[]=$arr;
        }
        $this->assign('pilot_list', $pilot_list);


    }
}
