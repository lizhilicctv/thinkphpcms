<?php
namespace app\manage\controller;
use think\Controller;
use app\manage\controller\Auth;
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
			
	    $comment=db('comment')->where('isopen','-1')->count();
		$this->assign('comment', $comment);	
	    $message=db('message')->where('isopen','0')->count();
		$this->assign('message', $message);	
    }
}
