<?php
namespace app\manage\controller;
use \think\Loader;
use app\manage\controller\Conn;
use app\manage\model\Order as Ordermodel;
use think\Db;
class Order extends Conn
{
	//这里用前置操作，表示提前运行，本来要用于栏目删除子栏目呢，现在不用了
	protected $beforeActionList = [
        
    ];
    public function index()
    {
    	$order=new Ordermodel();
    	if(request()->isPost()){
    		$data=input('post.');
			//导出
			if($data['type']=='dao'){
				
				include_once(dirname(__FILE__).'/PHPExcel/PHPExcel.php');
				$excel =new \PHPExcel();
				
				
				        //基础信息
				        $excel->getProperties()->setCreator("phpGrace")
				                             ->setLastModifiedBy("phpGrace")
				                             ->setTitle("phpGrace demo")
				                             ->setSubject("objPHPExcel");
				           //设置 sheet 名称
				           $excel->getActiveSheet(0)->setTitle('订单表');
				        //标题
				        $excel->setActiveSheetIndex(0)
				                    ->setCellValue('A1', '订单号')
				                    ->setCellValue('B1', '姓名')
				                    ->setCellValue('C1', '费用')
									->setCellValue('D1', '产品名')
									->setCellValue('E1', '数量')
									->setCellValue('F1', '收件人')
									->setCellValue('G1', '收件省')
									->setCellValue('H1', '收件市')
									->setCellValue('I1', '收件县')
									->setCellValue('J1', '收件地址')
									->setCellValue('K1', '收件电话')
									->setCellValue('L1', '支付时间');
				        
				        //数据填充【此数据可以来自数据库】
						$data=Db::name('order')
						->alias('o')
						->join('user u','o.user_id= u.id')
						->join('address a','o.address_id= a.id')
						->join('goods g','o.goods_id= g.id')
						->where('pay_status',1)->where('order_time','<>','')
						->field('out_trade_no,goods_price_zong,order_num,order_time,nickName,a.name,a.sheng,a.shi,a.xian,a.address,a.phone,goods_name')->select();
						
				        $i = 2;
				        foreach($data as $rows){
				            $excel->setActiveSheetIndex(0)
				                    ->setCellValue('A'.$i, $rows['out_trade_no'])
				                    ->setCellValue('B'.$i, $rows['nickName'])
				                    ->setCellValue('C'.$i, $rows['goods_price_zong'])
									->setCellValue('D'.$i, $rows['goods_name'])
									->setCellValue('E'.$i, $rows['order_num'])
									->setCellValue('F'.$i, $rows['name'])
									->setCellValue('G'.$i, $rows['sheng'])
									->setCellValue('H'.$i, $rows['shi'])
									->setCellValue('I'.$i, $rows['xian'])
									->setCellValue('J'.$i, $rows['address'])
									->setCellValue('K'.$i, $rows['phone'])
									->setCellValue('L'.$i, date('Y-m-d H:i:s', $rows['order_time']));
				            $i++;
				        }
				        //保存为 xls
				        $objWriter = \PHPExcel_IOFactory::createWriter($excel, 'Excel5');
						$na='xls/'.time().'.xls';
				       $objWriter->save($na);
					   return download($na, '已经支付的订单.xls');
				
			}
			
			
			if($data['type']=='so'){
				$order=$order
				->alias('o')
	    		->join('address a',"o.address_id = a.id",'LEFT')
				->join('user m',"o.user_id = m.id",'LEFT')
				->join('goods g',"o.goods_id = g.id",'LEFT')
				->field('o.*,a.name,a.phone,m.nickName as username,m.phone as mphone,g.goods_name')
	    		->order('id desc')
				->whereor('out_trade_no','like','%'.$data['key'].'%')
				->whereor('m.phone','like','%'.$data['key'].'%')
				->whereor('m.nickName as username','like','%'.$data['key'].'%')
				->whereor('a.phone','like','%'.$data['key'].'%')
				->paginate(12);
			}
			if($data['type']=='noque'){
				$order=$order
				->alias('o')
	    		->join('address a',"o.address_id = a.id",'LEFT')
				->join('user m',"o.user_id = m.id",'LEFT')
				->join('goods g',"o.goods_id = g.id",'LEFT')
				->field('o.*,a.name,a.phone,m.nickName as username,m.phone as mphone,g.goods_name')
	    		->order('id desc')
				->where('order_status',0)
				->paginate(12);
			}
			if($data['type']=='que'){
				$order=$order
				->alias('o')
	    		->join('address a',"o.address_id = a.id",'LEFT')
				->join('user m',"o.user_id = m.id",'LEFT')
				->join('goods g',"o.goods_id = g.id",'LEFT')
				->field('o.*,a.name,a.phone,m.nickName as username,m.phone as mphone,g.goods_name')
	    		->order('id desc')
				->where('order_status',1)
				->paginate(12);
			}
			if($data['type']=='tui'){
				$order=$order
				->alias('o')
	    		->join('address a',"o.address_id = a.id",'LEFT')
				->join('user m',"o.user_id = m.id",'LEFT')
				->join('goods g',"o.goods_id = g.id",'LEFT')
				->field('o.*,a.name,a.phone,m.nickName as username,m.phone as mphone,g.goods_name')
	    		->order('id desc')
				->where('order_status',2)
				->paginate(12);
			}
			if($data['type']=='endtui'){
				$order=$order
				->alias('o')
	    		->join('address a',"o.address_id = a.id",'LEFT')
				->join('user m',"o.user_id = m.id",'LEFT')
				->join('goods g',"o.goods_id = g.id",'LEFT')
				->field('o.*,a.name,a.phone,m.nickName as username,m.phone as mphone,g.goods_name')
	    		->order('id desc')
				->where('order_status',3)
				->paginate(12);
			}
			
			
			
			if($data['type']=='nopay'){
				$order=$order
				->alias('o')
	    		->join('address a',"o.address_id = a.id",'LEFT')
				->join('user m',"o.user_id = m.id",'LEFT')
				->join('goods g',"o.goods_id = g.id",'LEFT')
				->field('o.*,a.name,a.phone,m.nickName as username,m.phone as mphone,g.goods_name')
	    		->order('id desc')
				->where('pay_status',0)
				->paginate(12);
			}
			if($data['type']=='pay'){
				$order=$order
				->alias('o')
	    		->join('address a',"o.address_id = a.id",'LEFT')
				->join('user m',"o.user_id = m.id",'LEFT')
				->join('goods g',"o.goods_id = g.id",'LEFT')
				->field('o.*,a.name,a.phone,m.nickName as username,m.phone as mphone,g.goods_name')
	    		->order('id desc')
				->where('pay_status',1)
				->paginate(12);
			}
			if($data['type']=='nodeliver'){
				$order=$order
				->alias('o')
	    		->join('address a',"o.address_id = a.id",'LEFT')
				->join('user m',"o.user_id = m.id",'LEFT')
				->join('goods g',"o.goods_id = g.id",'LEFT')
				->field('o.*,a.name,a.phone,m.nickName as username,m.phone as mphone,g.goods_name')
	    		->order('id desc')
				->where('post_status',0)
				->paginate(12);
			}
			if($data['type']=='deliver'){
				$order=$order
				->alias('o')
	    		->join('address a',"o.address_id = a.id",'LEFT')
				->join('user m',"o.user_id = m.id",'LEFT')
				->join('goods g',"o.goods_id = g.id",'LEFT')
				->field('o.*,a.name,a.phone,m.nickName as username,m.phone as mphone,g.goods_name')
	    		->order('id desc')
				->where('post_status',1)
				->paginate(12);
			}
			if($data['type']=='enddeliver'){
				$order=$order
				->alias('o')
	    		->join('address a',"o.address_id = a.id",'LEFT')
				->join('user m',"o.user_id = m.id",'LEFT')
				->join('goods g',"o.goods_id = g.id",'LEFT')
				->field('o.*,a.name,a.phone,m.nickName as username,m.phone as mphone,g.goods_name')
	    		->order('id desc')
				->where('post_status',2)
				->paginate(12);
			}
    	}else{
    		$order=$order
    		->alias('o')
    		->join('address a',"o.address_id = a.id",'LEFT')
			->join('user m',"o.user_id = m.id",'LEFT')
			->join('goods g',"o.goods_id = g.id",'LEFT')
			->field('o.*,a.name,a.phone,m.nickName as username,m.phone as mphone,g.goods_name')
    		->order('id desc')->paginate(12);
    	}
		$this->assign('order', $order);
		$count1=db('order')->count();
		$this->assign('count1', $count1);
       	return $this->fetch();
    }
	public function ajax()
    {
    	$data=input('param.');
		$order=new Ordermodel();
		if($data['type']=='order_del'){
			$id=$data['id'];
			$info=$order->destroy($id);
			if($info){
				return 1;//修改成功返回1
			}else{
				return 0;
			}
		}
		return 0;
    }
	public function edit()
    {
    	$order = new Ordermodel();
    	if(request()->isPost()){
    		$data=input('post.');
//			$validate = Loader::validate('Order');
//			if(!$validate->check($data)){
//				$this->error($validate->getError());
//			}	
			$res=$order->save($data,['id' => input('id')]);
			$ding=$order->where('order_status','0')->count();
			if($res){
				if($ding!=0){
					echo '<script>parent.parent.document.getElementById("lizhili_ding").innerHTML="订',$ding,'"</script>';
				}else{
					echo '<script>parent.parent.document.getElementById("lizhili_ding").innerHTML="订"</script>';
				}
			
				return $this->success('修改成功',url('order/index',['st'=>1]));
			}else{
				$this->error('订单修改失败了');
			}
    	}
		
		$id=input('id');
		
		$data= $order
				->alias('o')
	    		->join('address a',"o.address_id = a.id",'LEFT')
				->join('user m',"o.user_id = m.id",'LEFT')
				->field('o.*,a.name,a.phone,m.nickName as username,m.phone as mphone,a.sheng,a.shi,a.xian,a.address')
				->where('o.id',$id)
				->find();
		$this->assign('data',$data);
       return $this->fetch();
    }
	
	  public function  goods()
    {
    	$id=input('id');
		$goods=Db::name('order_goods')
		->where('order_id',$id)
		->order('id desc')
    	->select();
    	
		$this->assign('goods', $goods);
		//dump($goods);
		//die;
		$count1=db('order_goods')->where('order_id',$id)->count();
		$this->assign('count1', $count1);
       	return $this->fetch();
    }
}
