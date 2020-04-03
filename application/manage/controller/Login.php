<?php
namespace app\manage\controller;
use think\Controller;
use app\manage\model\Admin;
use think\Db;
class Login extends Controller
{
    public function index()
    {
    	if(request()->isPost()){
    		$ip=$this->getIp();
    		$data=input('post.');	
			if(!captcha_check($data['coder'])){
			 return $this->error('验证码输入错误');
			};
			$log1=[
				'username'=>$data['username'],
				'ip'=>$ip,
				'create_time'=>time()
			];
			Db::name('log')->insert($log1);

			$login=new Admin();
			$info=$login->login($data);
			if($info == 1){
				return $this->success('信息正确，正在跳转',url('index/index'));
			}else{
				return $this->error('用户名或密码错误');
			}
			die;
    	}

       return $this->fetch('login');
    }
	public function out()
    {
		session(null);
		return $this->success('退出成功','login/index');
    }
	
	 public function getIp()
    {

        if(!empty($_SERVER["HTTP_CLIENT_IP"]))
        {
            $cip = $_SERVER["HTTP_CLIENT_IP"];
        }
        else if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
        {
            $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        }
        else if(!empty($_SERVER["REMOTE_ADDR"]))
        {
            $cip = $_SERVER["REMOTE_ADDR"];
        }
        else
        {
            $cip = '';
        }
        preg_match("/[\d\.]{7,15}/", $cip, $cips);
        $cip = isset($cips[0]) ? $cips[0] : 'unknown';
        unset($cips);

        return $cip;
    }
	
	 public function log(){
	 	
    		$data=input('get.');	
			$this->assign('key', $data);
			if(isset($data['start']) or isset($data['end'])){
				$map=[];
				if($data['start'] != ''){
					$map[]=	['create_time','>',strtotime($data['start'])];
				}
				if($data['end'] != ''){
					$map[]=	['create_time','<',strtotime($data['end'])+60*60*24];
				}
			}else{
				$map=true;
			}
			
			
			
			$data=Db::name('log')->where($map)->order('id','desc')->paginate(15,false,['query'=>request()->param()]);
			$this->assign('data',$data);

		
		$count1=db('log')->count();
		$this->assign('count1', $count1);
	 	return $this->fetch();
	 }
	public function ajax()
    {
    	$data=input('param.');
		if($data['type']=='log_del'){
			if(db('log')->delete($data['id'])){
				return 1;//修改成功返回1
			}else{
				return 0;
			}
		}
		if($data['type']=='log_all'){
			if(db('log')->delete($data['id'])){
				return 1;//修改成功返回1
			}else{
				return 0;
			}
		}
		return 0;
    }
}
