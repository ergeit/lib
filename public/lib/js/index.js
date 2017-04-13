var seatTpl='<div class="table" id="table{$tableId}" seat="{$seat}">\
			<div class="seat seat_{$status1} seat1"></div>\
			<div class="seat seat_{$status2} seat2"></div>\
			<div class="tableItem"></div>\
			<div class="seat seat_{$status3} seat3"></div>\
			<div class="seat seat_{$status4} seat4"></div>\
		</div>';
$(function(){
	switch(window.location.hash)
	{
		case '':
		break;
		case '#room1':
		LoadRoom1();
		break;
		case '#room2':
		LoadRoom2();
		break;
		case '#room3':
		LoadRoom3();
		break;
	}
	window.onhashchange=function(){
		switch(window.location.hash)
		{
			case '':
			window.location.reload();
			break;
			case '#room1':
			LoadRoom1();
			break;
			case '#room2':
			LoadRoom2();
			break;
			case '#room3':
			LoadRoom3();
			break;
		}
	}
	$('.room1').on('click',function(){
		window.location.hash="#room1";
	});
	$('.room2').on('click',function(){
		window.location.hash="#room2";
	});
	$('.room3').on('click',function(){
		window.location.hash="#room3";
	});
	$('#back').on('click',function(){
		history.back(-1);
	})
});
function LoadRoom1()
{
	$.ajax({
		'url':window.detail_url,
		'dataType':'json',
		'type': 'GET',
		'data':{
			'floor': 3,
			'room': 1
		},
		'success': function(data){
			AddTpl(data);
			$('.seat').on('click',function(){
				var tool=$(this).attr('class').split(' ');
				var floor = 3;
				var room = 1;
				var table = $(this).parent().attr('id').slice(-1);
				var seat = tool[2].slice(-1);
				$('.module').css('display','block');
				observe(floor,room,table,seat);
				$('.module').one('click',function(event){
					event.stopPropagation();
				    event.preventDefault();
				    $('.module').css('display','none');
				});
				$('#submit').one('click',function(event){
					event.stopPropagation();
					event.preventDefault();
				});
			});
		},
		'errror':function(a,b,c){
			alert('信息获取失败！');
			console.log(a+b+c);
		}
	});
	$('.container').empty();
	$('.compass').css('position','fixed');
	
}
function LoadRoom2()
{
	$.ajax({
		'url':window.detail_url,
		'dataType':'json',
		'type': 'GET',
		'data':{
			'floor': 3,
			'room': 2
		},
		'success': function(data){
			AddTpl(data);
			$('.seat').on('click',function(){
				var tool=$(this).attr('class').split(' ');
				var floor = 3;
				var room = 2;
				var table = $(this).parent().attr('id').slice(-1);
				var seat = tool[2].slice(-1);
				$('.module').css('display','block');
				observe(floor,room,table,seat);
				$('.module').one('click',function(event){
					event.stopPropagation();
				    event.preventDefault();
				    $('.module').css('display','none');
				});
				$('#submit').one('click',function(event){
					event.stopPropagation();
					event.preventDefault();
				});
			});
		},
		'errror':function(a,b,c){
			alert('信息获取失败！');
			console.log(a+b+c);
		}
	});
	$('.container').empty();
	$('.compass').css('position','fixed');
	
}
function LoadRoom3()
{
	$.ajax({
		'url':window.detail_url,
		'dataType':'json',
		'type': 'GET',
		'data':{
			'floor': 3,
			'room': 3
		},
		'success': function(data){
			AddTpl(data);
			$('.seat').on('click',function(){
				var tool=$(this).attr('class').split(' ');
				var floor = 3;
				var room = 3;
				var table = $(this).parent().attr('id').slice(-1);
				var seat = tool[2].slice(-1);
				$('.module').css('display','block');
				observe(floor,room,table,seat);
				$('.module').one('click',function(event){
					event.stopPropagation();
				    event.preventDefault();
				    $('.module').css('display','none');
				});
				$('#submit').one('click',function(event){
					event.stopPropagation();
					event.preventDefault();
				});
			});
		},
		'errror':function(a,b,c){
			alert('信息获取失败！');
			console.log(a+b+c);
		}
	});
	$('.container').empty();
	$('.compass').css('position','fixed');
}
function AddTpl(data)
{
	var str = "";
	for(key in data)
	{
		var node = seatTpl;
		node = node.replace(/\{\$tableId\}/gi,key) //桌子编号
					.replace(/\{\$status1\}/gi,data[key][0])
					.replace(/\{\$status2\}/gi,data[key][1])
					.replace(/\{\$status3\}/gi,data[key][2])
					.replace(/\{\$status4\}/gi,data[key][3]);
		str += node;
	}
	$('.container').html(str);
}
function observe(floor,room,table,seat)
{
	alert('暂不支持预约座位');
	return;
	// $('#submit').one('click',function(){
     //       var time=$('#time').val();
     //       var formParam = $("#form").serialize();
     //       if(time!=''){
     //            $.ajax({
     //            type:"GET",
     //            dataType:"json",
     //            // url:'http://www.cnkasd.cn/pro/app/index.php?i=2&c=entry&do=Seatres&m=lib_seat',
     //       		url:seatresurl,
     //            data:{
     //            	'time':formParam,
     //            	'floor':floor,
     //            	'room':room,
     //            	'table':parseInt(table)+1,
     //            	'seat':seat
     //            },
     //            success:function(data){//请求发送成功后的回调函数
     //            	console.log(data);
     //                var d = dialog({
     //                  title: '选座成功',
     //                  content: ' <div class="form-group"><h3>'+data.floor+'楼'+data.room+'房间'+data.desk+'桌'+data.number+'号椅子'+'</h3></div>',
     //                  height: 100,
     //                  width: 280,
     //                  okValue: '确定',
     //                  ok: function () {
     //                  }
     //                });
     //                 d.showModal();
     //            },
     //            error : function() {
	// 		          alert("请求失败！");
	// 		     }
     //        	});
     //       }
     //       else{
     //            alert('请选择预约时间');
     //       }
     //    });
     //    $('#time').mobiscroll().time({
     //        theme: 'ios',
     //        lang: 'zh',
     //        display: 'bottom',
     //        headerText: false,
     //        maxWidth: 90
     //    });
}
