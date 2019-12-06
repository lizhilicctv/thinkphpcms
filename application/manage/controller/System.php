<?php
namespace app\manage\controller;

use app\manage\controller\Conn;
use app\manage\model\System as Systemmodel;
use think\Db;

class System extends Conn
{
    public function index()
    {
        $system = new Systemmodel();
        if (request()->isPost()) {
            $data=input('key');
            $data=$system->whereor('cnname', 'like', '%'.$data.'%')
                            ->order('sort asc')
                            ->paginate(10);
            $this->assign('data', $data);
        } else {
            $data=$system->order('sort', 'ASC')->paginate(10);
            $this->assign('data', $data);
        }
        $count1=Db::name('system')->count();
        $this->assign('count1', $count1);
        return $this->fetch('list');
    }
    public function ajax()
    {
        $data=input('param.');
        $system=new Systemmodel();
        if ($data['type']=='system_del') {
            if (Db::name('system')->delete($data['id'])) {
                return 1;//修改成功返回1
            } else {
                return 0;
            }
        }
        if ($data['type']=='system_sort') {
            $arrlength=count($data['id']);
            $ar=[];
            for ($x=0;$x<$arrlength;$x++) {
                $ar[$x]=['id'=>$data['id'][$x], 'sort'=>$data['sort'][$x]];
            }
            $info=$system->saveAll($ar);
            if ($info) {
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
            $validate = new \app\manage\validate\System;
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $data['kxvalue']=str_replace("，", ",", $data['kxvalue']);
            $data['value']=explode(",", $data['kxvalue'])[0];
            $user = new Systemmodel($data);
            if ($user->save()) {
                return $this->success('添加成功', url('system/index', ['st'=>1]));
            } else {
                $this->error('添加失败了');
            }
        }
        return $this->fetch('add');
    }
    public function edit()
    {
        if (request()->isPost()) {
            $data=input('post.');
            $validate = new \app\manage\validate\System;
            if ($data['st'] != 1) {
                if (!$validate->check($data)) {
                    $this->error($validate->getError());
                }
            }
            
            $data['kxvalue']=str_replace("，", ",", $data['kxvalue']);
            $user = new Systemmodel();
            if ($user->save($data, ['id' => input('id')])) {
                return $this->success('添加成功', url('system/index', ['st'=>1]));
            } else {
                $this->error('修改失败了');
            }
        }
        $cid=input('id');
        $data=Db::name('system')->where('id', $cid)->find();
        $this->assign('data', $data);
        return $this->fetch('edit');
    }
    
    public function show()
    {
        $system = new Systemmodel();
        if (request()->isPost()) {
            $data=input('post.');
            $arrid=Db::name('system')->where('type', 4)->column('id');
            if (isset($_FILES['img']["name"])) {
                foreach ($_FILES['img']["name"] as $k=>$v) {
                    if (!!$v) {
                        $system_id[]=$arrid[$k];
                    }
                }
            }
            
            $file = request()->file()['img'];
            if ($file) {
                foreach ($system_id as $k=>$v) {
                    $info = $file[$k]->move('system');
                    if ($info) {
                        $li=strtr($info->getSaveName(), " \ ", " / ");
                        $pic='/system/'.$li;
                        Db::name('system')->where('id', $v)->where('type', 4)->update(['value' => $pic]);
                    }
                }
            }
            
            if ($data) {
                foreach ($data as $k => $v) {
                    $li=$system->where('enname', $k)->update(['value'  => trim($v)]);
                }
                return  $this->success('修改成功');
            }
            return $this->error('没有数据');
        }
        
        $data=$system->order('sort', 'ASC')->select();
        $this->assign('data', $data);

        return $this->fetch('index');
    }
    
    public function shield()
    {
        if (request()->isPost()) {
            $data=input('post.');
            $res=Db::name('shield')->where('id', 1)->setField('shield', $data['shield']);
            if ($res!==false) {
                return  $this->success('修改成功');
            } else {
                return $this->error('修改失败！');
            }
            return;
        }
        
        $data=Db::name('shield')->where('id', 1)->find();
        $this->assign('data', $data);

        return $this->fetch();
    }
    public function config()
    {
        if (request()->isPost()) {
            $data=input('post.');
            foreach ($data as $k=>$v) {
                \model('config')->where('key', $k)->update(['value' => $v]);
            }
            return  $this->success('修改成功');
        }
        $data=Db::name('config')->column('value', 'key');
        $this->assign('data', $data);
    
        return $this->fetch();
    }
}
