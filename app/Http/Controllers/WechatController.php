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
        $signature = $request->input('signature');
        $timestamp = $request->input('timestamp');
        $nonce = $request->input('nonce');
        $echostr = $request->input('echostr');

        if ($this->checkSignature($signature,$timestamp,$nonce)){
            echo $echostr;
            return ;
        }
        echo $echostr;
        echo '<br />为什么不出东西';
        Log::error('微信验证失败');
        return ;

        $wechat = app('wechat');

        $wechat->server->setMessageHandler(function($message){
            return "欢迎关注 overtrue！";
        });

        Log::info('return response.');
        $response = $wechat->server->serve();
        return $response;
    }

    private function checkSignature($signature,$timestamp,$nonce)
    {
        $token = env('WECHAT_TOKEN');
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }
}
