<?php
namespace app\manage\controller;
use app\manage\controller\Conn;
use app\manage\model\Goods as Goodsmodel;
use app\manage\model\Category as Categorymodel;
use \think\Loader;
use think\Db;
class Goods extends Conn
{
    public function index()
    {
    
		$key=input('key') ? input('key') : '';
		$this->assign('key',$key);
		
		$goodsRes=Db::name('goods')->where('goods_name','like','%'.$key.'%')->order('id DESC')->paginate(10);
		$this->assign(['goodsRes'=>$goodsRes]);
		
		$count1=Db::name('goods')->count();
		$this->assign('count1', $count1);
       	return $this->fetch();
    }
	public function ajax()
    {
    	$data=input('param.');
		//下面是删除
		if($data['type']=='goods_del'){
			$id=$data['id'];
			if(model('goods')->destroy($id)){
				return 1;//修改成功返回1
			}else{
				return 0;
			}
		}
		//下面两个是商品的启用和停止
		if($data['type']=='goods_start'){
			if(Db::name('goods')->where('id',$data['id'])->setField('isopen',1)){
				return 1;//修改成功返回1
			}else{
				return 0;
			}
		}
       	if($data['type']=='goods_stop'){
			if(Db::name('goods')->where('id',$data['id'])->setField('isopen',0)){
				return 1;//修改成功返回1
			}else{
				return 0;
			}
		}
		
		return 0;
    }
	public function add()
    {
    	if(request()->isPost()){
    		$data=input('post.');
			$validate = new \app\manage\validate\Goods;
			if (!$validate->check($data)) {
			    $this->error($validate->getError());
			}
			$file = request()->file();
			if(!isset($file['goods_img'])){
				$this->error('请添加首页主图！');
			}
			if(!isset($file['goods_list_img'])){
				$this->error('请添加详情主图！');
			}
			
			if (!isset($data['isopen'])) {
			    $data['isopen']=0;
			} else {
			    $data['isopen']=1;
			}
			$data['goods_code']=time().rand(111111,999999);//商品编号
			
			$info = $file['goods_img']->move('goods_min');
			$li=strtr($info->getSaveName(), " \ ", " / ");
			$data['goods_img']='/goods_min/'.$li;
			
			$info = $file['goods_list_img']->move('goods_list');
			$li=strtr($info->getSaveName(), " \ ", " / ");
			$data['goods_list_img']='/goods_list/'.$li;


			$goods = new goodsmodel();
			if($goods->save($data)){
				$this->success('添加成功了');
			}else{
				$this->error('添加失败了');
			}
    	}
		

      	return $this->fetch();
    }
	public function edit()
    {
    	$id=input('id');
		
    	if(request()->isPost()){
    		$data=input('post.');
			
			$validate = new \app\manage\validate\Goods;
			if (!$validate->scene('edit')->check($data)) {
			    $this->error($validate->getError());
			}
			$file = request()->file();
			if(isset($file['goods_img'])){
				$info = $file['goods_img']->move('goods_min');
				$li=strtr($info->getSaveName(), " \ ", " / ");
				$data['goods_img']='/goods_min/'.$li;
			}
			if(isset($file['goods_list_img'])){
				$info = $file['goods_list_img']->move('goods_list');
				$li=strtr($info->getSaveName(), " \ ", " / ");
				$data['goods_list_img']='/goods_list/'.$li;
			}
			
			if (!isset($data['isopen'])) {
			    $data['isopen']=0;
			} else {
			    $data['isopen']=1;
			}

			$goods = new goodsmodel();
			if($goods->allowField(true)->save($data,['id' => $id])){
				$this->success('修改成功了');
			}else{
				$this->error('修改失败了');
			}
    	}
		// 查询当前商品基本信息
        $goods=db('goods')->find($id);
		$this->assign('goods',$goods);
      	return $this->fetch();
    }
	

}
