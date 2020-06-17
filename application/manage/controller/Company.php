<?php
namespace app\manage\controller;
use \think\Loader;
use app\manage\controller\Conn;
use app\manage\model\Company as Companymodel;
use think\Db;
class Company extends Conn
{
	//这里用前置操作，表示提前运行，本来要用于栏目删除子栏目呢，现在不用了
	protected $beforeActionList = [
        
    ];
    public function index()
    {
        $company = new Companymodel();
        if(request()->isPost()){
            $data=input('post.');
            $file = request()->file('');
            if(isset($file['erweima'])){
                $info = $file['erweima']->move('company');
                $li=strtr($info->getSaveName()," \ "," / ");
                $data['erweima']='/company/'.$li;
            }
            $res=$company->save($data,['id' => 1]);
            if($res){
                return $this->success('修改成功');
            }else{
                $this->error('修改失败了');
            }
        }


        $data= $company->get(1);
        $this->assign('data',$data);
        return $this->fetch();
    }



}
