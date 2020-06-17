<?php
namespace app\api\controller;

use app\api\controller\Base;
use think\Db;

class Index extends Base
{
    public function _empty()
    {
        header("Location:/404.html");
        exit;
    }
    public function ajax()
    {
        $data=input('post.');
    
        if (!isset($data["lizhili"]) or !isset($data["type"]) or $data["lizhili"]!= "0d89b868429be6158ba1ebc0f7c073de") {
            header("Location:/404.html");
            exit;
        }
    
        //获取头部广告
        if ($data['type']=='get_ad') {
            $ad=Db::name('advertisement')->where('isopen', 1)->select();
            if ($ad) {
                return \json(['code'=>1,'message'=>'获取成功','data'=>$ad]);
            } else {
                return \json(['code'=>0,'message'=>'获取成功']);
            }
        }
        //获取首页产品
        if ($data['type']=='get_index_goods') {
            $goods=Db::name('goods')->where('isopen', 1)->limit(5)->select();
            $live=Db::name('live')->find(1);
            if ($goods) {
                return \json(['code'=>1,'message'=>'获取成功','data'=>$goods,'live'=>$live]);
            } else {
                return \json(['code'=>0,'message'=>'获取成功']);
            }
        }
        //获取  直播数据
        if ($data['type']=='get_video_info') {
            $live=Db::name('live')->find(1);
            $live['img']=Db::name('goods')->where('id', $live['goods_id'])->value('goods_img');
            $live['msg']=Db::name('live_msg')->field('msg,name,time')->select();
            if ($live) {
                return \json(['code'=>1,'message'=>'获取成功','data'=>$live]);
            } else {
                return \json(['code'=>0,'message'=>'获取成功']);
            }
        }
        //获取产品详情
        if ($data['type']=='get_goods_show') {
            $goods=Db::name('goods')->find($data['id']);
            $pingjia=Db::name('evaluation')
					->alias('o')
					->leftJoin('user u', 'u.id = o.user_id')
					->field('o.pingjia as content,o.time as date,u.nickName as name,u.avatarUrl as face')
					->where('o.goods_id', $data['id'])->limit(3)->select();
			
            if ($goods) {
                return \json(['code'=>1,'message'=>'获取成功','data'=>$goods,'pingjia'=>$pingjia]);
            } else {
                return \json(['code'=>0,'message'=>'获取成功']);
            }
        }
        //获取产品pingjia
        if ($data['type']=='get_goods_pingjia') {
           $pingjia=Db::name('evaluation')
           		->alias('o')
           		->leftJoin('user u', 'u.id = o.user_id')
           		->field('o.pingjia as content,o.time as date,u.nickName as name,u.avatarUrl as face')
           		->where('o.goods_id', $data['id'])->select();
            if ($pingjia) {
                return \json(['code'=>1,'message'=>'获取成功','pingjia'=>$pingjia]);
            } else {
                return \json(['code'=>0,'message'=>'获取成功']);
            }
        }
        return \json(['code'=>0,'message'=>'非法获取']);
    }
}
