<?php
namespace app\manage\controller;

use app\manage\controller\Conn;
use app\manage\model\Cate as Catemodel;
use app\manage\model\Article as Articlemodel;
use think\Db;

class Article extends Conn
{
    public function index()
    {
            $data=input('get.');
			//获取参数 返回首页
			if(!isset($data['cate'])){
				$data['cate']=0;
			}
			if(!isset($data['key'])){
				$data['key']='';
			}
			 $this->assign('data', $data);
			 //搜索 key
			if($data['cate']==0){
				$map=true;
			}elseif($ar=Db::name('cate')->where('fid',$data['cate'])->column('id')){
				$map=['a.cateid'=>$ar];
			}else{
				$map=['a.cateid'=>$data['cate']];
			}
			
            $info=Db::name('article')
            ->alias('a')
            ->join('cate c', 'a.cateid = c.id', 'LEFT')
            ->field('a.*,c.catename')
			->where($map)->where('a.title', 'like', '%'.$data['key'].'%')
            ->order('a.id desc')
            ->paginate(10,false,['query'=>request()->param()]);
            $this->assign('info', $info);
        
		
		//以上是以前的post 提交
        
        $count1=Db::name('article')->count();
        $this->assign('count1', $count1);
        $cate=new Catemodel();
        $datasort=$cate->tree();
        foreach ($datasort as $k=>$v) {
            if ($v['type']==2) {
                unset($datasort[$k]);
            }
        }
        $this->assign('datasort', $datasort);
        return $this->fetch();
    }
    public function ajax()
    {
        $data=input('param.');
        if ($data['type']=='article_del') {
            //删除图片(包括缩略图和内容图片)
            $shan=Db::name('article')->find($data['id']);
            $imgarr=[];
            if ($shan['pic']) {
                $imgarr[]=$shan['pic'];
            }
            preg_match_all("/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/", $shan["text"], $arr);
            foreach ($arr[1] as $k=>$v) {
                if ($v and substr($v, 0, 4)!='http') {
                    $imgarr[]=$v;
                }
            }
            foreach ($imgarr as $k1=>$v1) {
                @unlink(substr($v1, 1));
            }
			
			
			
			
            if (Db::name('article')->delete($data['id'])) {
                return 1;//修改成功返回1
            } else {
                return 0;
            }
        }
        if ($data['type']=='article_all') {
            //删除图片(包括缩略图和内容图片)
            $shan=Db::name('article')->where('id', 'in', $data['id'])->column('text', 'pic');
            $imgarr=[];
            foreach ($shan as $k=>$v) {
                if ($k) {
                    $imgarr[]=$k;
                }
                preg_match_all("/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/", $v, $arr);
                foreach ($arr[1] as $k1=>$v1) {
                    if ($v1 and substr($v1, 0, 4)!='http') {
                        $imgarr[]=$v1;
                    }
                }
            }
            foreach ($imgarr as $k1=>$v1) {
                @unlink(substr($v1, 1));
            }
            
            if (Db::name('article')->delete($data['id'])) {
                return 1;//修改成功返回1
            } else {
                return 0;
            }
        }
		if ($data['type']=='cate_article') {
			$res=Db::name('cate')->where('id',$data['id'])->value('type');
			if ($res) {
			    return $res;
			} else {
			    return 0;
			}
		}
		if ($data['type']=='article_del_img') {
			//删除图片(包括缩略图和内容图片)
			$shan=Db::name('article_img')->find($data['id']);
			@unlink(substr($shan['pic'], 1));
			
			if (Db::name('article_img')->delete($data['id'])) {
			    return 1;//修改成功返回1
			} else {
			    return 0;
			}
			
		}
		
		
		
        return 0;
    }
    public function add()
    {
        if (request()->isPost()) {
            $data=input('post.');
            $validate = new \app\manage\validate\Article;
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
			
            if (!isset($data['state'])) {
                $data['state']=0;
            } else {
                $data['state']=1;
            }
			if(empty($data['time'])){
				$data['time']=time();
			}else{
				$data['time']=strtotime($data['time']);
			}
            $file = request()->file('');
            if (isset($file['pic'])) {
                $info = $file['pic']->move('uploads');
                $li=strtr($info->getSaveName(), " \ ", " / ");
                $data['pic']='/uploads/'.$li;
            } else {
                if (isset($data['ti'])) {
                    preg_match_all("/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/", $data["text"], $arr);
                    foreach ($arr[1] as $k=>$v) {
                        if (substr($v, 0, 4)!='http') {
                            $newarr=getimagesize(substr($v, 1));
                            if ($newarr[0] >100 and $newarr[1] >100) {
                                //图片转移位置
                                if (!is_dir("uploads/".date("Ymd"))) {
                                    mkdir("uploads/".date("Ymd"));
                                }
                                $newwei="uploads/".date("Ymd").'/'.basename(substr($v, 1));
                                $wo=copy(substr($v, 1), $newwei);
                                if ($wo) {
                                    $data['pic']='/'.$newwei;
                                }
                                break;
                            }
                        }
                    }
                }
            }
            
            $config=Db::name('config')->column('value', 'key');
            //设置缩率图
            if ($config['thumbnail']==1 and isset($data['pic'])) {
                if (isset($data['pic'])) {
                    $image = \think\Image::open(substr($data['pic'], 1));
                    //计算配置项
                    if (!!$config['t_w']) {
                        $config['t_w']=300;
                    }
                    if (!!$config['t_h']) {
                        $config['t_h']=300;
                    }
                    $image->thumb($config['t_w'], $config['t_h'])->save(substr($data['pic'], 1));
                }
            }
            //添加水印
            if ($config['watermark']==1) {
                preg_match_all("/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/", $data["text"], $arr1);
                foreach ($arr1[1] as $k=>$v) {
                    if (substr($v, 0, 4)!='http') {
                        $image = \think\Image::open(substr($v, 1));
                        $image->text($config['shui_neirong'], dirname(__FILE__).'/FZXBSJW.TTF', $config['shui_zihao'], $config['shui_yanse'], $config['shui_weizhi'], -15)->save(substr($v, 1));
                    }
                }
            }
            if (input('desc')=='') {
                $data['desc']=mb_substr(preg_replace('/\&nbsp;/', '', strip_tags(input('text'))), 0, 80);
            }
            $data['faid']=session('uid');
            if ($id=Db::name('article')->strict(false)->insertGetId($data)) {
				
				$list = [];
				foreach($file['img_pic'] as $file){
				    // 移动到框架应用根目录/uploads/ 目录下
					$info = $file->move('img_pic');
					 $li=strtr($info->getSaveName(), " \ ", " / ");
					 $list[]=[
						 'pic'=>'/img_pic/'.$li,
						 'aid'=>$id
					 ];
				         
				}
				
				$img= \model('article_img');
				$img->saveAll($list);
                return '<script>alert("你好，添加成功了！");parent.location.reload()</script>';
            } else {
                $this->error('添加失败了');
            }
        }
        
        $cate=new Catemodel();
        $datasort=$cate->tree();
        foreach ($datasort as $k=>$v) {
            if ($v['type']==2) {
                unset($datasort[$k]);
            }
        }
        $this->assign('datasort', $datasort);
        return $this->fetch();
    }
    public function edit()
    {
        if (request()->isPost()) {
            $data=input('post.');
            $validate = new \app\manage\validate\Article;
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            if (!isset($data['state'])) {
                $data['state']=0;
            } else {
                $data['state']=1;
            }
           if(empty($data['time'])){
           	$data['time']=time();
           }else{
           	$data['time']=strtotime($data['time']);
           }
            if (input('desc')=='') {
                $data['desc']=mb_substr(preg_replace('/\&nbsp;/', '', strip_tags(input('text'))), 0, 80);
            }
            $file = request()->file('');
            if (isset($file['pic'])) {
                $info = $file['pic']->move('uploads');
                $li=strtr($info->getSaveName(), " \ ", " / ");
                $data['pic']='/uploads/'.$li;
            } else {
                if (isset($data['ti'])) {
                    preg_match_all("/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/", $data["text"], $arr);
                    foreach ($arr[1] as $k=>$v) {
                        if (substr($v, 0, 4)!='http') {
                            $newarr=getimagesize(substr($v, 1));
                            if ($newarr[0] >100 and $newarr[1] >100) {
                                //图片转移位置
                                if (!is_dir("uploads/".date("Ymd"))) {
                                    mkdir("uploads/".date("Ymd"));
                                }
                                $newwei="uploads/".date("Ymd").'/'.basename(substr($v, 1));
                                $wo=copy(substr($v, 1), $newwei);
                                if ($wo) {
                                    $data['pic']='/'.$newwei;
                                }
                                break;
                            }
                        }
                    }
                }
            }
    
            $config=Db::name('config')->column('value', 'key');
            //设置缩率图
            if ($config['thumbnail']==1 and isset($data['pic'])) {
                $image = \think\Image::open(substr($data['pic'], 1));
                //计算配置项
                if (!!$config['t_w']) {
                    $config['t_w']=300;
                }
                if (!!$config['t_h']) {
                    $config['t_h']=300;
                }
                $image->thumb($config['t_w'], $config['t_h'])->save(substr($data['pic'], 1));
            }
            //添加水印
            if ($config['watermark']==1) {
                preg_match_all("/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/", $data["text"], $arr1);
                foreach ($arr1[1] as $k=>$v) {
                    if (substr($v, 0, 4)!='http') {
                        $image = \think\Image::open(substr($v, 1));
                        $image->text($config['shui_neirong'], dirname(__FILE__).'/FZXBSJW.TTF', $config['shui_zihao'], $config['shui_yanse'], $config['shui_weizhi'], -15)->save(substr($v, 1));
                    }
                }
            }
            $res=model('article')->allowField(true)->save($data, ['id' => input('id')]);
            if ($res) {
				
				$list = [];
				foreach($file['img_pic'] as $file){
				    // 移动到框架应用根目录/uploads/ 目录下
					$info = $file->move('img_pic');
					 $li=strtr($info->getSaveName(), " \ ", " / ");
					 $list[]=[
						 'pic'=>'/img_pic/'.$li,
						 'aid'=>input('id')
					 ];
				         
				}
				
				$img= \model('article_img');
				$img->saveAll($list);
				
                return $this->success('修改成功', url('article/index'));
            } else {
                return $this->error('修改失败了');
            }
        }
        $cid=input('id');
        $data=Db::name('article')->where('id', $cid)->find();
        $this->assign('data', $data);
		$img=Db::name('article_img')->where('aid', $cid)->select();
		$this->assign('img', $img);
		$this->assign('type', Db::name('cate')->where('id',$data['cateid'])->value('type'));
        $cate=new Catemodel();
        $datasort=$cate->tree();
        foreach ($datasort as $k=>$v) {
            if ($v['type']==2) {
                unset($datasort[$k]);
            }
        }
        $this->assign('datasort', $datasort);
        return $this->fetch();
    }
}
