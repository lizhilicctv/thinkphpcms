<?php
namespace app\manage\validate;
use think\Validate;
class Goods extends Validate
{
     protected $rule = [
        'goods_name' =>  'require|unique:goods|length:3,200',
        'markte_price'=>'require|float',
        'shop_price'=>'require|float',
        'goods_desc'=>'require',
		

    ];
	 protected $message  =   [
        'goods_name.require' => '商品名称必须填写', 
        'goods_name.unique'     => '当前商品名称已经存在，不能重复！',
        'goods_name.length'=>'商品名称在3-60个字符之间！',
        'markte_price.require' => '市场价格必须填写', 
        'markte_price.float'     => '市场价格必须为数字',
        'shop_price.require' => '本店价格必须填写', 
        'shop_price.float'     => '本店价格必须为数字',
        'goods_desc.require' => '产品描述必须填写', 
    ];
	protected $scene = [
        'edit'  =>  [
		        'goods_name' =>  'require|length:3,60',
		        'markte_price'=>'require|number',
		        'shop_price'=>'require|number',
		        'goods_desc'=>'require',
			],
    ];
}

