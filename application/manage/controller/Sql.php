<?php

namespace app\manage\controller;
use think\Controller;
use think\Db;

class Sql extends Controller
{
    public function index()
    {
		$dir=env('root_path').'sql';
		$wo=scandir($dir);
		$data=[];
		foreach($wo as $k=>$v){
			if(\is_file($dir.'/'.$v)){
				$data[]=[
					'dir'=>strtr($dir.'/'.$v, " \ ", " / "),
					'name'=>$v,
					'time'=>filemtime($dir.'/'.$v)
				];
			}
		}

		$this->assign('data',array_reverse($data));
        return $this->fetch();
    }
 
    public function ajax()
    {
        $data = input('param.');
        if ($data['type'] == 'sql_add') {
            $database = config("database.");
            $url = '../sql/' . date("Y-m-d-H-i-s") . '.sql';
            $sql = new \sql\DatabaseTool([
                'host' => $database['hostname'],
                'port' => 3306,
                'user' => $database["username"],
                'password' => $database["password"],
                'database' => $database["database"],
                'charset' => 'utf8',
                'target' => $url
            ]);
            $res = $sql->backup();
            if ($res['code'] == 1) {
				return json([
					'code' => 1,
					'time' => $res['time'],
					'msg' => '备份成功！'
				]);
            } else {
                return json([
                    'code' => 0,
                    'msg' => '备份失败！'
                ]);
            }
        }

        if ($data['type'] == 'sql_huanyuan') {
            $database = config("database.");
            $sql = new \sql\DatabaseTool([
                'host' => $database['hostname'],
                'port' => 3306,
                'user' => $database["username"],
                'password' => $database["password"],
                'database' => $database["database"],
                'charset' => 'utf8',
            ]);
            return $sql->restore($data['name']);
            die;
        }


        if ($data['type'] == 'sql_del') {
            @unlink($data['name']);
			return json([
				'code' => 1,
				'msg' => '删除成功！'
			]);
            
        }
        if ($data['type'] == 'sql_all') {
            foreach ($data['name'] as $k => $v) {
                @unlink($v);
            }
			return json([
				'code' => 1,
				'msg' => '删除成功！'
			]);
        }
        return 0;
    }
}
