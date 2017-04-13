<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <link rel="stylesheet" href="{{asset('lib/css/index.css')}}">
    <link rel="stylesheet" href="{{asset('lib/mobiscroll/mobiscroll.custom-3.0.0-beta4.min.css')}}">
    <link rel="stylesheet" href="{{asset('lib/dialog/ui-dialog.css')}}">
    <script src="{{asset('lib/js/jquery.js')}}"></script>
    <script src="{{asset('lib/dialog/dialog-min.js')}}"></script>
    <script src="{{asset('lib/mobiscroll/mobiscroll.custom-3.0.0-beta4.min.js')}}"></script>
    <script src="{{asset('lib/js/index.js')}}"></script>
    <script type="text/javascript">var seatresurl ="{php echo $this->createMobileUrl('Seatres',array('openid'=>$openid))}" </script>
    <script type="text/javascript">
        window.detail_url ='{{url('lib/detail')}}';
    </script>
    <title>在线座位查询</title>
    <script type="text/javascript">

        (function (doc, win) {
            var docEl = doc.documentElement,
                    resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
                    recalc = function () {
                        var clientWidth = docEl.clientWidth;
                        if (!clientWidth) return;
                        docEl.style.fontSize = 100 * (clientWidth / 375) + 'px';
                    };

            if (!doc.addEventListener) return;
            win.addEventListener(resizeEvt, recalc, false);
            doc.addEventListener('DOMContentLoaded', recalc, false);
        })(document, window);
    </script>
</head>
<body>
<div class="module">
    <form id ="form" method="POST">
        <div id="form-login">
            <div class="form-group">
                <input  class="form-control" id="time" name="time" placeholder="请选择预约时间" />
            </div>
            <button id ="submit" type="button" class="btn login_btn">确认选座</button>
        </div>
    </form>
</div>
<nav>
    <img src="{{asset('lib/img/back.png')}}" id="back">
    三楼座位情况
</nav>
<div class="compass">
    <span class="north">N</span>
    <img src="{{asset('lib/img/compass.png')}}">
    <span class="south">S</span>
</div>
<div class="legend">
    <div class="lseat"></div>
    已占座位&nbsp;&nbsp;
    <div class="lseat"></div>
    空座
</div>
<div class="container">
    <div class="room1">
        <span class="libName">自然科学第一书库</span>
        <div class="seaticon">
            <div class="lseat"></div> <span>{{$nonum[1]}}</span>
            <div class="lseat" style="background:#777;"></div> <span>{{$yesnum[1]}}</span>
        </div>
    </div>
    <div class="room2">
        <span class="libName">自然科学第二书库</span>
        <div class="seaticon">
            <div><div class="lseat"></div> <span>{{$nonum[2]}}</span></div>
            <div><div class="lseat" style="background:#777;"></div> <span>{{$yesnum[2]}}</span></div>

        </div>
    </div>
    <div class="room3">
        <span class="libName">自然科学第三书库</span>
        <div class="seaticon">
            <div><div class="lseat"></div> <span>{{$nonum[3]}}</span></div>
            <div><div class="lseat" style="background:#777;"></div> <span>{{$yesnum[3]}}</span></div>
        </div>
    </div>
    <div class="bottom">南大门</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var wh = $('body').height();
        console.log(wh);
        $(".form-group").height(wh*0.15);
    });
</script>
</body>
</html>