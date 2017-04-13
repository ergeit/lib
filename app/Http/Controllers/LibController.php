<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use App\Model\Seat;
use App\Model\User;
class LibController extends Controller
{
    //
    /**
     * 空座查询页面
     * @author 张皓
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $user = session('wechat.oauth_user');
        $openid = $user->id;
        //循环获取每个房间座位情况的人数
        $yesnum = array();
        $nonum = array();
        $problemnum = array();
        for ($r=1; $r <4 ; $r++) {  //遍历房间
            $yesnum[$r] = Seat::where('floor',3)->where('room',$r)->where('status',0)->count();
            $nonum[$r] = Seat::where('floor',3)->where('room',$r)->where('status',1)->count();
            $problemnum[$r] = Seat::where('floor',3)->where('room',$r)->where('status',2)->count();

        }
        return view('lib.index',compact('yesnum','nonum','problemnum'));
    }

    /**
     * 查询房间空座详情
     * @author 张皓
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function detail(Request $request){
        $floor = $request->input('floor');
        $room = $request->input('room');
        //获取桌子个数
        $desknum = Seat::select('desk')->where('floor',$floor)->where('room',$room)->groupBy('desk')->get()->count();


        //读取该房间具体座位数据
        $seat = Seat::where('floor',$floor)->where('room',$room)->get()->toArray();
        $n = 0;
        $data = array();
        for($i=0;$i<$desknum;$i++){
            for ($r=0; $r < 4; $r++) {
                $data[$i][$r] = (int)$seat[$n]['status'];
                $n++;
            }
        }
        return response()->json($data);

    }
}
