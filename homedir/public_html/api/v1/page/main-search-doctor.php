<div style="height:50px;width:100%;display:none" class="sortdoctor">
 <div style="width:80px;height:50px;float:left;background-image:url('/assets/img/sort.png');background-position:center left;background-repeat:no-repeat;background-size:20px;font-size:11px;text-align:right;line-height:50px;font-weight:bold;color:#5F7D95">مرتب سازی</div>
</div>
<div id="search"></div>

<div class="pagination-navbar navbar navbar-default navbar-component no-margin-left no-margin-right pagein" style="display:none">
    <div class="navbar-header">
        <div class="navbar-text"><span class="pagination-count">صفحه 1 از 2</span></div>
    </div>
    <div class="navbar-right navbar-btn m-10">
        <ul class="pagination pagination-flat pagination-rounded">
            
        </ul>
    </div>
</div>
<input type="hidden" id="page" value="1" />
<script>
    $(document).ready(function() {
      search();
    });
	function search(){
	  var sp = '';
	  var s = '<li class="media panel panel-body stack-media-on-mobile" style="height:480px;text-align:center;margin-top:10px;border-radius:8px"><img src="/assets/img/loading.gif" style="margin:0 auto;max-height:100%" /></li>';
		$('#search').html(s)
        var state = $('#state').val();
        var q = $('#q').val();
        var specialty = $('#specialty').val();
        var page = $('#page').val();
		var time = '<?php echo date("Y-m-d"); ?>';
		var time1 = "<?php echo date('Y-m-d',strtotime(date('Y-m-d').'+1 days')); ?>";
		var time2 = "<?php echo date('Y-m-d',strtotime(date('Y-m-d').'+2 days')); ?>";
        $.ajax({
            type: "GET",
			data:'type=doctor&time='+time+'&state='+state+'&q='+q+'&specialty='+specialty+'&page='+page,
            url: "/api/v1/search/search",
            success: function(msg) {
				s = '';
				var count = 0;
				if(msg){
				 var count = msg[0].count;
				}
				if(count > 10){
				  var p = count / 10;
				  p = Math.floor(p) + 1;
				  
				  if(!page){page = 1;}
				  
				  $('.pagein').css('display','block')
				   sp = '<li class="disabled"><a class="text-semibold"><span class="hidden-xs">قبلی</span><span class="visible-xs">«</span></a></li>';
				  var nclass = '';
				  for(var d = 1 ; d < p ; d++ ){
				   if(d == page){
					 nclass = 'class="active"';
				   }else{
					 nclass = '';  
				   }
				   sp = sp + '<li '+nclass+' onclick="ChangePage(&quot;'+d+'&quot;)" ><a class="disabled">'+d+'</a></li>';
				  }
				  sp = sp + '<li><a class="text-semibold"><span class="hidden-xs">بعدی</span><span class="visible-xs">»</span></a></li>';
				  $('.pagination').html(sp)
				}
				
				if(count < 10){
                  for (var i = 0; i < msg.length; i++) {
					var d=0,d1=0,d2=0;
					var t1 = msg[i].times.split('$$');
                    s = s + '<li class="media panel panel-body stack-media-on-mobile" style="height:160px;border-radius:10px"> <div class="search-result-item"> <div class="media-left"> <a href="/detail/doctor/' + msg[i].id + '"> <img class="img-rounded img-lg" src="' + msg[i].image + '" style="width:120px!important;height:120px!important;border:5px solid #cfcfcf;box-shadow:2px 6px 12px 1px rgba(119, 119, 119, 0.19)"> </a> </div> <div class="media-body" style="width:600px"> <h6 class="media-heading text-semibold"> <a href="/detail/doctor/' + msg[i].id + '" style="float:right">' + msg[i].name + '</a><p style="font-size:14px;margin:0;padding:0;line-height:20px;background-color:#60ce0c;border-radius:4px;width:35px;color:#fff;padding-top:0px;font-weight:bold;float:right;text-align:center;margin-right:8px">4.4</p> </h6> <ul class="list-inline list-inline-separate list-specialties text-muted " style="clear:both"> <li style="font-size:14px;padding:10px 0;color:#888;margin:0;font-weight:100">'+msg[i].specialty+'</li> </ul> <p class="info-text" style="line-height:28px;margin-top:20px;float:right;font-weight:bold"> <span style="font-weight:100">نظام پزشکی :  </span> '+msg[i].system_code+'</p> <p class="info-text" style="line-height:28px;margin-top:20px;float:right;margin-right:30px;font-weight:bold"> <span style="font-weight:100">مشاوره :  </span> '+msg[i].Sum+' مشاوره ( در مدت '+msg[i].created+' روز )</p>  </div> ';
					s = s + '<div style="width:110px;float:left;margin-top:-120px"><a href="/detail/doctor/' + msg[i].id + '"><p style="font-size:12px;padding:0;line-height:20px;border:1px solid #c8c9ca;border-radius:5px;width:100%;color:#000;padding-top:2px;padding:5px 0;text-align:center">مشاهده رزومه کامل</p></a><p style="font-size:12px;padding:0;line-height:20px;border-radius:5px;width:100%;color:#000;padding-top:2px;padding:5px 0;text-align:center;margin-top:20px"><div style="float:left;width:30px;height:30px;background-image:url(/assets/img/phone-white.png);background-size:12px;background-repeat:no-repeat;background-position:center;background-color:#3c75fa;border-radius:50%"></div><div style="float:left;width:30px;height:30px;background-image:url(/assets/img/message.png);background-size:12px;background-repeat:no-repeat;background-position:center;background-color:#ffa652;border-radius:50%;margin-left:10px"></div></p></div>';
                  }
                }
				if(msg.length == 0){
				 s = s + '<li class="media panel panel-body stack-media-on-mobile" style="height:480px;text-align:center;align-items: center; flex-direction: column;"><img src="/assets/img/diagnostics-03.png" style="height:150px;margin:100px auto 30px" /><p style="font-weight:bold;font-size:16px">نتیجه ای یافت نشد !</p><a href="/" class="btn btn-flat btn-xs navbar-btn btn-pliro-secondary border-pliro-secondary" style="margin:20px 0">جستجوی مجدد</a></li>';
				}
				$('.sortdoctor,.bestdoctor').css('display','block')
				$('#search').html(s)
            }
        })
		
	}
    function ChangePage(p){
	 $('#page').val(p)
     search();	 
	}
</script>