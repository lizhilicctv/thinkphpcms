<?php

namespace app\http\middleware;

use think\Db;

class Check
{
    public function handle($request, \Closure $next)
    {
       $system= Db::name('system')->column('value','enname');
        if($system["value"] != "开启"){
            if($system["redirect"]){
                return redirect($system["redirect"], '',302);
            }
            return json(['非法访问'])->code(404);
            exit('网站关闭');
        }
       return $next($request);
    }
}
