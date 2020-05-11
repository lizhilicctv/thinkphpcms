<?php
namespace app\manage\controller;
use app\manage\controller\Conn;
use \think\Loader;
use app\manage\model\AuthRule as AuthRulemodel;
use think\Db;
class Authrule extends Conn
{
    public function index()
    {
    	$page=input('page');
		
    	global $countpage; #定全局变量    
    	$url='index';
		$count=12;

    	$cate=new AuthRulemodel();
		$datasort=$cate->tree();
		$all=$this->page_array($count,$page,$datasort,0);
		$this->assign('datasort',$all);
		
		
		$totals=count($datasort);      
   		$countpage=ceil($totals/$count); #计算总页面数   
		$show=$this->show_array($countpage,$url);
		$this->assign('show',$show);
		
		$count1=db('auth_rule')->count();
		$this->assign('count1', $count1);
       	return $this->fetch('admin_permission');
    }
	

/**  
 * 数组分页函数  核心函数  array_slice  
 * 用此函数之前要先将数据库里面的所有数据按一定的顺序查询出来存入数组中  
 * $count   每页多少条数据  
 * $page   当前第几页  
 * $array   查询出来的所有数组  
 * order 0 - 不变     1- 反序  
*/		
		
function page_array($count,$page,$array,$order){    
    
    $page=(empty($page))?'1':$page; #判断当前页面是否为空 如果为空就表示为第一页面     
       $start=($page-1)*$count; #计算每次分页的开始位置    
    if($order==1){    
      $array=array_reverse($array);    
    }         
    $pagedata=array();    
    $pagedata=array_slice($array,$start,$count);    //分隔数组
    return $pagedata;  #返回查询数据    
}    
/**  
 * 分页及显示函数  
 * $countpage 全局变量，照写  
 * $url 当前url  
 */    
function show_array($countpage,$url){   
     $page=empty($_GET['page'])?1:$_GET['page'];    
     if($page > 1){    
        $uppage=$page-1;    
    
     }else{    
        $uppage=1;    
     }    
    
     if($page < $countpage){    
        $nextpage=$page+1;    
    
     }else{    
            $nextpage=$countpage;    
     }    
           
    $str='<div style="border:1px; width:300px; height:30px; color:#9999CC">';    
    $str.="<span>共  {$countpage}  页 / 第 {$page} 页</span>";    
    $str.="<span><a href='$url?page=1'>   首页  </a></span>";    
    $str.="<span><a href='$url?page={$uppage}'> 上一页  </a></span>";    
    $str.="<span><a href='$url?page={$nextpage}'>下一页  </a></span>";    
    $str.="<span><a href='$url?page={$countpage}'>尾页  </a></span>";    
    $str.='</div>';    
    return $str;    
}    
	
	
	
	
	public function ajax()
    {
    	$data=input('param.');
	
		if($data['type']=='AuthRule_del'){
			if(Db::name('AuthRule')->where('fid',$data['id'])->find()){
				return 2;//下级有东西不能删除
			}else{
				if(db('AuthRule')->delete($data['id'])){
					return 1;//修改成功返回1
				}else{
					return 0;
				}
			}
			
		}
		if($data['type']=='AuthRule_sort'){
			$arrlength=count($data['id']);
			$ar=[];
			for($x=0;$x<$arrlength;$x++)
			{
			    $ar[$x]=['id'=>$data['id'][$x], 'sort'=>$data['sort'][$x]];
			}
			$info=new AuthRulemodel();
			
			if($info->saveAll($ar)){
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
			$validate = new \app\manage\validate\AuthRule;
			if(!$validate->check($data)){
				$this->error($validate->getError());
			}
			$num=db('AuthRule')->where('id',$data['fid'])->field('level')->find();
			if($num!= null){
				$data['level']=$num['level']+1;
			}
			
			if(db('AuthRule')->insert($data)){
				return '<script>alert("你好，添加成功了！");parent.location.reload()</script>';
			}else{
				$this->error('添加失败了');
			}
    	}
		$cate=new AuthRulemodel();
		$datasort=$cate->tree();
		$this->assign('res',$datasort);
       return $this->fetch('add');
    }
	public function edit()
    {
    	if(request()->isPost()){
    		$data=input('post.');
			$validate = new \app\manage\validate\AuthRule;
			if(!$validate->check($data)){
				$this->error($validate->getError());
			}
			if($data['fid']){
				$data['level']=1;
			}else{
				$data['level']=0;
			}
			
			if(Db::name('AuthRule')->where('id',$data['id'])->update($data)){
				return '<script>alert("你好，修改成功了！");parent.location.reload()</script>';
			}else{
				$this->error('修改失败了');
			}
    	}
		
		$cid=input('id');
		$data=db('AuthRule')->where('id',$cid)->find();
		$this->assign('data',$data);
		$cate=new AuthRulemodel();
		$datasort=$cate->tree();
		$this->assign('res',$datasort);
       return $this->fetch('edit');
    }


	
}
