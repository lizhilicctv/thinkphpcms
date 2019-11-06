<?php
namespace app\manage\model;
use think\Model;
use think\model\concern\SoftDelete;
class Member extends Model
{
	//如果表名和文件名不是对应的，用下面代码修改
	//protected $table = 'think_user';

	use SoftDelete;
    protected $deleteTime = 'delete_time';
	
}

