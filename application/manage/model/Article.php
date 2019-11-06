<?php
namespace app\manage\model;
use think\Model;
class Article extends Model
{
	//如果表名和文件名不是对应的，用下面代码修改
	//protected $table = 'think_user';
	protected static function init()
    {
    	//下面是自己编写的但是有问题，需要修改，现在先去掉的。
//      Article::event('before_update', function ($user) {
//      	dump($user);
//			die;
//      	$user=Article::get(1);
//			
//			if(file_exists($_SERVER["DOCUMENT_ROOT"].$user->pic)){
//				unlink($_SERVER["DOCUMENT_ROOT"].$user->pic);
//			}
//      });
		
		//下面是从别的地方复制过来的。需要仔细研究
//		Article::event('before_insert',function($article){
//        if($_FILES['thumb']['tmp_name']){
//              $file = request()->file('thumb');
//              $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
//              if($info){
//                  // $thumb=ROOT_PATH . 'public' . DS . 'uploads'.'/'.$info->getExtension();
//                  $thumb='/bick/' . 'public' . DS . 'uploads'.'/'.$info->getSaveName();
//                  $article['thumb']=$thumb;
//              }
//          }
//    	});
//
//
//    	Article::event('before_update',function($article){
//        if($_FILES['thumb']['tmp_name']){
//        		$arts=Article::find($article->id);
//        		$thumbpath=$_SERVER['DOCUMENT_ROOT'].$arts['thumb'];
//              if(file_exists($thumbpath)){
//              	@unlink($thumbpath);
//              }
//              $file = request()->file('thumb');
//              $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
//              if($info){
//                  // $thumb=ROOT_PATH . 'public' . DS . 'uploads'.'/'.$info->getExtension();
//                  $thumb='/bick/' . 'public' . DS . 'uploads'.'/'.$info->getSaveName();
//                  $article['thumb']=$thumb;
//              }
//
//          }
//    	});
		
		
		
		
    }
}