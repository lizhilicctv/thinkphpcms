<?php

namespace app\manage\controller;
use think\Controller;
use think\Db;

class Sql extends Controller
{
    public function index()
    {
        $data = Db::name('sql')->order('id', 'desc')->select();
        $this->assign('data', $data);

        $count1 = db('sql')->count();
        $this->assign('count1', $count1);
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
                //插入数据库
                $wo = Db::name('sql')->insert(['time' => time(), 'url' => $url]);
                if ($wo) {
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
            } else {
                return json([
                    'code' => 0,
                    'msg' => '备份失败！'
                ]);
            }
        }

        if ($data['type'] == 'sql_huanyuan') {
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

            return $sql->restore($shu);
            die;
        }


        if ($data['type'] == 'sql_del') {
            $url = Db::name('sql')->where('id', $data['id'])->value('url');
            @unlink($url);
            if (db('sql')->delete($data['id'])) {
                return json([
                    'code' => 1,
                    'msg' => '删除成功！'
                ]);
            } else {
                return json([
                    'code' => 0,
                    'msg' => '删除失败！'
                ]);
            }
        }
        if ($data['type'] == 'sql_all') {
            $url = Db::name('sql')->where('id', 'in', $data['id'])->column('url');

            foreach ($url as $k => $v) {
                @unlink($v);
            }

            if (db('sql')->delete($data['id'])) {
                return json([
                    'code' => 1,
                    'msg' => '删除成功！'
                ]);
            } else {
                return json([
                    'code' => 0,
                    'msg' => '删除失败！'
                ]);
            }
        }
        return 0;
    }
}
