<?php
namespace app\api\model;
use think\Model;
use think\Db;
class Goods extends Model
{
	//如果表名和文件名不是对应的，用下面代码修改
	//protected $table = 'lizhili_system';
	
	//获取指定推荐位里的商品
   public function getRecposGoods($recposId,$limit=''){
   	$_hotIds=db('rec_item')->where(array('value_type'=>1,'recpos_id'=>$recposId))->select();
		$hotIds=array();
		foreach ($_hotIds as $k => $v) {
			$hotIds[]=$v['value_id'];
		}
		$map['id']=array('IN',$hotIds);
		$recRes=$this->field('id,md_pic,goods_name,shop_price,markte_price')->where('isopen',1)->where($map)->limit($limit)->select();
		return $recRes;
   }
   
   
   //这里是获取指定栏目里面的商品
   public function getallGoods($recposId,$limit='',$alllanid){
   	$_allIds=db('rec_item')->where(array('value_type'=>1,'recpos_id'=>$recposId))->select();
		$hotIds=array();
		foreach ($_allIds as $k => $v) {
			$hotIds[]=$v['value_id'];
		}
		
		$map['id']=array('IN',$hotIds);
		$map2['category_id']=array('IN',$alllanid);
		
		$recRes=$this->field('id,md_pic,goods_name,shop_price,markte_price')->where('isopen',1)->where($map)->where($map2)->limit($limit)->select();
		
		return $recRes;
   }
   
//     //获取商品会员价
//    public function getMemberPrice($goods_id){
// 
// 	  $levelId=session('user_memberlevel');
// 	$levelRate=session('user_rate');
//       $goodsInfo=$this->find($goods_id);
//       if(session('user_rate')){
//         $memberPrice=db('member_price')->where(array('mlevel_id'=>$levelId,'goods_id'=>$goods_id))->find();
//         if($memberPrice){
//           $price=$memberPrice['mprice'];
//         }else{
//           $levelRate=$levelRate/100;
//           $price=$goodsInfo['shop_price']*$levelRate;
//         }
//       }else{
//         $price=$goodsInfo['shop_price'];
//       }
//       return $price;//最终会员价
//    }
   
    //获取商品会员价
	public function getMemberPrice($user_id,$goods_id,$attr=''){
   
		$points=Db::name('member')->where('id',$user_id)->value('points');
		$memberLevel=db('member_level')->where('bom_point','<=',$points)->where('top_point','>=',$points)->find();
		$levelId=$memberLevel['id'];
		$levelRate=$memberLevel['rate'];

         $goodsInfo=$this->find($goods_id);
         if($levelRate){
           $memberPrice=db('member_price')->where(array('mlevel_id'=>$levelId,'goods_id'=>$goods_id))->find();
           if($memberPrice){
             $price=$memberPrice['mprice'];
           }else{
             $levelRate=$levelRate/100;
			 $jia=0;
			 if($attr != ''){
				$attr= explode(",",$attr); 
				 foreach($attr as $k=>$v){
					$jia+=Db::name('goods_attr')->where('id',$v)->value('attr_price');
				 }
			 }else{
				 $jia=0;
			 }
             $price=($goodsInfo['shop_price']+$jia)*$levelRate;
           }
         }else{
           $price=$goodsInfo['shop_price'];
         }
         return $price;//最终会员价
      }
   
   
   //自己写核心操作，这里是把购物车里面的数据提交到，订单页面，展示操作
   
   public function getgoods($data){
   		$arr=[];
		$i=1;
		foreach ($data['checbox'] as $key => $value) {
			$newarr=explode('-', $key);
			$goodsInfo=$this->field('id,goods_name,md_pic,shop_price,markte_price')->find($newarr[0]);
         	$memberPrice=$this->getMemberPrice($newarr[0]);

			
			 $arr[$i]['goods_name']=$goodsInfo['goods_name'];
	         $arr[$i]['md_pic']=$goodsInfo['md_pic'];
	         $arr[$i]['member_price']=$memberPrice;
	         $arr[$i]['shop_price']=$goodsInfo['shop_price'];
	         $arr[$i]['market_price']=$goodsInfo['markte_price'];
	         $arr[$i]['goods_num']=$value;
	         $arr[$i]['goods_id']=$goodsInfo['id'];
	         $arr[$i]['goods_id_attr_id']=$key;//单独保存$k，用于处理复选框问题
	         $arr[$i]['goods_attr_str']='';//商品单选属性字符串初始化
	         if($newarr[1]){
	            // 属性名称  属性值  属性价格
	            // 颜色       红色    0          颜色:红色  (￥ 0 元)  
	            // 尺寸       XXL     100
	            $goodsAttrStr=array();//商品单选属性字符串
	            $goodsAttrPrice=0;
	            $goodsAttrRes=db('goods_attr')->alias('ga')->field('ga.*,a.attr_name')->join('attr a',"ga.attr_id = a.id")->where('ga.id','in',$newarr[1])->select();
	            foreach ($goodsAttrRes as $k1 => $v1) {
	               $goodsAttrStr[]=$v1['attr_name'].':'.$v1['attr_value'].'(￥ '.$v1['attr_price'].'元)';
	               $goodsAttrPrice+=$v1['attr_price'];
	            }
	            $goodsAttrStr=implode('<br />', $goodsAttrStr);
	            $arr[$i]['goods_attr_str']=$goodsAttrStr;
	            $arr[$i]['member_price']+=$goodsAttrPrice;
	            $arr[$i]['shop_price']+=$goodsAttrPrice;
				
	         }
			$arr[$i]['zong_price']=(double)$arr[$i]['goods_num']*(double)$arr[$i]['member_price'];
			$i++;
		}
		$arr['num']=0;
		foreach ($arr as $key => $value) {
			$arr['num']+=(int)$value["goods_num"];
		}
		$arr['jia']=0;
		foreach ($arr as $key => $value) {
			$arr['jia']+=(double)$value["member_price"]*(double)$value['goods_num'];
		}

		
		return $arr;
	
	
   }
   
   
   
   
   
}