<?php
namespace app\manage\controller;

use app\manage\controller\Conn;
use app\manage\model\User as Usermodel;
use think\Db;

class User extends Conn
{
    //这里用前置操作，表示提前运行，本来要用于栏目删除子栏目呢，现在不用了
    protected $beforeActionList = [
        
    ];
    public function index()
    {
        $link=new Usermodel();
        
        $key=input('key') ? input('key') : '';
        $this->assign('key', $key);
            
        $link=$link
            ->where('nickName', 'like', '%'.$key.'%')
            ->order('id desc')->paginate(10, false, ['query'=>request()->param()])->each(function ($item, $key) {
                $item->fname = Db::name('user')->where('id',$item->fid)->value('nickName');
				$item->xia = Db::name('user')->where('fid',$item->id)->count('id');
            });
			
        $this->assign('user', $link);
        
        
        $count1=db('user')->count();
        $this->assign('count1', $count1);
        return $this->fetch();
    }
    public function ajax()
    {
        $data=input('param.');
        $user=new Usermodel();
        
        if ($data['type']=='user_start') {
            if (Db::name('user')->where('id', $data['id'])->setField('istui', 1)) {
                return 1;//修改成功返回1
            } else {
                return 0;
            }
        }
        if ($data['type']=='user_stop') {
            if (Db::name('user')->where('id', $data['id'])->setField('istui', 0)) {
                return 1;//修改成功返回1
            } else {
                return 0;
            }
        }
        

       
        return 0;
    }
    public function lit()
    {
        $link=new Usermodel();
        
        $key=input('key') ? input('key') : '';
        $this->assign('key', $key);
            
        $link=$link
			->where('fid',input('id'))
            ->where('nickName', 'like', '%'.$key.'%')
            ->order('id desc')->paginate(5, false, ['query'=>request()->param()])->each(function ($item, $key) {
                $item->zong = Db::name('order')->where('user_id',$item->id)->where('pay_status',1)->where('order_time','<>','')->sum('goods_price_zong');
            });
    		
    
        $this->assign('user', $link);
        
        
        $count1=db('user')->where('fid',input('id'))->count();
        $this->assign('count1', $count1);
        return $this->fetch();
    }
    
}
