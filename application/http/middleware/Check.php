<?php

namespace app\http\middleware;

use think\Db;

class Check
{
    public function handle($request, \Closure $next)
    {
       $system= Db::name('system')->column('value','enname');
	   if(request()->controller()!=="Wxnotify"){ //这个是微信支付的回调，以后回调都写在这个控制器里面的了
		   if($system["value"] != "开启"){
		       if($system["redirect"]){
		           return redirect($system["redirect"], '',302);
		       }
		       return json(['非法访问'])->code(404);
		       exit('网站关闭');
		   }
	   }
       return $next($request);
    }
}
