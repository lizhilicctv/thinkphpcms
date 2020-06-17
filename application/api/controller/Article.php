<?php
namespace app\api\controller;
use app\api\controller\Base;
use think\Db;
class Article extends Base
{
	 public function _empty()
    {
        header("Location:/404.html"); 
        exit;
    }
   public function ajax()
   {
   	$data=input('param.');
	   //下面获取新闻列表
	if($data['type']=='article_list'){
		$article=Db::name('article')->where('cateid',$data['cate_id'])->select();		
		if($article){
			return ['code'=>1,'message'=>'获取成功','data'=>$article];
		}else{
			return ['code'=>0,'message'=>'获取错误'];
		}
	}


   	if($data['type']=='article'){
		Db::name('article')->where('id', $data['arc_id'])->setInc('click');
		$article=Db::name('article')->where('id',$data['arc_id'])->find();
		$arr=[];
		
		$arr['title']=$article['title'];
		$arr['authorName']=$article['author'] ? $article['author'] : '佚名';
		$arr['authorFcae']='';
		$arr['viewNumber']=$article['click'];
		$arr['date']=date('Y-m-d',$article['time']);
		$arr['contents']=$article['editorValue'];
		
		
		
		if($arr){
			return ['code'=>1,'message'=>'获取成功','data'=>$arr];
		}else{
			return ['code'=>0,'message'=>'获取错误'];
		}
		
	}
   	return ['code'=>0,'message'=>'非法获取'];
   }
	
	
}
