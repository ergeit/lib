<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use EasyWeChat\Foundation\Application;
class WechatController extends Controller
{
    //
    /**
     * 处理微信请求
     * @author 张皓
     * @return mixed
     */
    public function serve(Request $request)
    {
        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志
        Log::info($request);

        $wechat = app('wechat');

        $wechat->server->setMessageHandler(function($message){
            return "欢迎关注 overtrue！";
        });

        Log::info('return response.');
        $response = $wechat->server->serve();
        return $response;
    }
    
}
