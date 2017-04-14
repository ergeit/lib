<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use EasyWeChat\Foundation\Application;
use EasyWeChat\Message\News;
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
            switch ($message->MsgType){
                case 'text':
                    if ($message->text=='空座'){
//                        $message->FromUserName openid
                        $news = array(
                            'title' => '空座查询系统',
                            'description' => '查询空座、预约讨论室等功能',
                            'url' => route('libShow'),
                            'img' => asset('lib/img/libbg.jpg')
                        );
                        return new News($news);
                    }
                    break;
                default :
                    return '虽然不知道你在说什么，不过没关系，你继续。';

            }
            return "欢迎关注 overtrue！";
        });

        Log::info('return response.');
        $response = $wechat->server->serve();
        return $response;
    }

}
