<div class="pagination-navbar navbar navbar-default navbar-component no-margin-left no-margin-right" style="padding-left:0;margin-top:10px">
    <div class="navbar-right navbar-btn m-10" >
        <ul class="pagination pagination-flat pagination-rounded" style="display:flex;">

            <li class="disabled">
                <a class="text-semibold" style="padding-right:0;padding-left:0">
                    <img src="/assets/img/arrow-right.png" style="width:30px" />
                </a>
            </li>
            <li style="width:100px">
                <div style="border-style:none;font-size:12px;width:100%;line-height:20px;cursor:pointer;border-radius:0;margin:5px 1.4%;text-align:center;direction:rtl;border-radius:5px;color:#918684;font-weight:100"><?php echo convert(date('D')); ?>
                    <br><span id="day1_date"><?php echo gregorian_to_jalali(date('Y'),date('m'),date('d'),''); ?></span></div>
            </li>
            <li style="width:100px">
                <div style="border-style:none;font-size:12px;width:100%;line-height:20px;cursor:pointer;border-radius:0;margin:5px 1.4%;text-align:center;direction:rtl;border-radius:5px;color:#918684;font-weight:100"><?php echo convert(date('D',strtotime(date('Y-m-d')."+1 days"))); ?>
                 <br>
				 <span id="day2_date">
				 <?php 
				  $date=explode('-',date('Y-m-d',strtotime(date('Y-m-d')."+1 days")));
				  echo gregorian_to_jalali($date[0],$date[1],$date[2],'');
				 ?>
				 </span>
				</div>
            </li>
            <li style="width:100px">
                <div style="border-style:none;font-size:12px;width:100%;line-height:20px;cursor:pointer;border-radius:0;margin:5px 1.4%;text-align:center;direction:rtl;border-radius:5px;color:#918684;font-weight:100"><?php echo convert(date('D',strtotime(date('Y-m-d')."+2 days"))); ?>
                 <br>
				 <span id="day3_date">
				 <?php 
				  $date=explode('-',date('Y-m-d',strtotime(date('Y-m-d')."+2 days")));
				  echo gregorian_to_jalali($date[0],$date[1],$date[2],'');
				 ?>
                 </span>				 
				</div>
            </li>
            <li>
                <a class="text-semibold" style="padding-right:0;padding-left:0" onclick="ChangeDate()">
                    <img src="/assets/img/arrow-left.png" style="width:30px" />
                </a>
            </li>

        </ul>
    </div>
</div>
<script>
 var p = 0;
 function ChangeDate(){ 
 }
</script>
<?php 
 function convert($day){
	if($day =='Sat'){return 'شنبه';} 
	if($day =='Sun'){return 'یکشنبه';} 
	if($day =='Mon'){return 'دوشنبه';} 
	if($day =='Tue'){return 'سه شنبه';} 
	if($day =='Wed'){return 'چهار شنبه';} 
	if($day =='Thu'){return 'پنج شنبه';} 
	if($day =='Fri'){return 'جمعه';} 
 }
?>
<div id="search"></div>
<script>
    $(document).ready(function() {
        var s = '';
        var state = $('#state').val();
		var time = '<?php echo date("Y-m-d"); ?>';
		var time1 = "<?php echo date('Y-m-d',strtotime(date('Y-m-d').'+1 days')); ?>";
		var time2 = "<?php echo date('Y-m-d',strtotime(date('Y-m-d').'+2 days')); ?>";
        $.ajax({
            type: "GET",
			data:'type=<?php echo $type; ?>&time='+time+'&state='+state,
            url: "/api/v1/search/search",
            success: function(msg) {
                for (var i = 0; i < msg.length; i++) {
					var d=0,d1=0,d2=0;
					var t1 = msg[i].times.split('$$');
                    s = s + '<li class="media panel panel-body stack-media-on-mobile" style="height:240px"> <div class="search-result-item"> <div class="media-left"> <a href="/detail/doctor/' + msg[i].id + '"> <img alt="" class="img-rounded img-lg" src="' + msg[i].image + '" style="border-radius:50%;width:120px!important;height:120px!important"> </a> </div> <div class="media-body" style="width:600px"> <h6 class="media-heading text-semibold"> <a href="/detail/doctor/' + msg[i].id + '">' + msg[i].name + '</a> </h6> <ul class="list-inline list-inline-separate list-specialties text-muted "> <li style="font-size:14px;padding:10px 0;color:#333;margin:0">'+msg[i].specialty+'</li> </ul> <p class="info-text mb-5" style="line-height:28px"> <span>مرکز :  </span> '+msg[i].address+'</p>  </div> <div class="media-right text-nowrap"> <div class="text-mediumbold"> <div class="select-location form-control input-xlg" style="height:140px;border-style:none;font-size:12px;padding:0"><div class="media-right text-nowrap" style="padding:0"> <div class="text-mediumbold"> <div class="select-location form-control input-xlg" style="height:140px;border-style:none;font-size:12px;padding:0;width:300px"> '+
					
					'<div style="float:right;width:30%;margin-right:3%">';
					for(var j = 0; j < t1.length - 1; j++){
					 var t2 = t1[j].split('#');
					  if(t2[1] == time){
					    s = s +'<div class="select-location form-control input-xlg" style="height:40px;border-style:none;font-size:12px;float:right;width:80px;line-height:20px;cursor:pointer;border-radius:0;margin:5px 1.4%;padding-right: 0;padding-left: 0;text-align:center;background-color:#fff;color:#333;direction:rtl;border-radius:5px;border:1px solid #efefef"> '+t2[0]+'</div>';
						d ++;
					  }
					}
					for(var j = 0; j < 3 - d; j++){
					    s = s +'<div class="select-location form-control input-xlg" style="height:40px;border-style:none;font-size:20px;float:right;width:80px;line-height:20px;cursor:pointer;border-radius:0;margin:5px 1.4%;padding-right: 0;padding-left: 0;text-align:center;background-color:#fff;color:#333;direction:rtl;border-radius:5px;border:1px solid #efefef"> - </div>';
					}
					s = s +'</div>'+
					
					'<div style="float:right;width:30%;margin-right:3%">';
					for(var j = 0; j < t1.length - 1; j++){
					 var t2 = t1[j].split('#');
					  if(t2[1] == time1){
					    s = s +'<div id="set' + msg[i].id + '" class="select-location form-control input-xlg settime" onclick="SetTime(&apos;' + msg[i].id + '&apos;)" style="height:40px;border-style:none;font-size:12px;float:right;width:80px;line-height:20px;cursor:pointer;border-radius:0;margin:5px 1.4%;padding-right: 0;padding-left: 0;text-align:center;background-color:#fff;color:#333;direction:rtl;border-radius:5px;border:1px solid #efefef"> '+t2[0]+'</div>';
						d1 ++;
					  }
					}
					for(var j = 0; j < 3 - d1; j++){
					    s = s +'<div class="select-location form-control input-xlg" style="height:40px;border-style:none;font-size:20px;float:right;width:80px;line-height:20px;cursor:pointer;border-radius:0;margin:5px 1.4%;padding-right: 0;padding-left: 0;text-align:center;background-color:#fff;color:#333;direction:rtl;border-radius:5px;border:1px solid #efefef"> - </div>';
					}
					s = s +'</div>'+
					
					'<div style="float:right;width:30%;margin-right:3%">';
					for(var j = 0; j < t1.length - 1; j++){
					 var t2 = t1[j].split('#');
					  if(t2[1] == time2){
					    s = s +'<div id="set' + msg[i].id + '" class="select-location form-control input-xlg settime" onclick="SetTime(&apos;' + msg[i].id + '&apos;)" style="height:40px;border-style:none;font-size:12px;float:right;width:80px;line-height:20px;cursor:pointer;border-radius:0;margin:5px 1.4%;padding-right: 0;padding-left: 0;text-align:center;background-color:#fff;color:#333;direction:rtl;border-radius:5px;border:1px solid #efefef"> '+t2[0]+'</div>';
						d2 ++;
					  }
					}
					for(var j = 0; j < 3 - d2; j++){
					    s = s +'<div class="select-location form-control input-xlg" style="height:40px;border-style:none;font-size:20px;float:right;width:80px;line-height:20px;cursor:pointer;border-radius:0;margin:5px 1.4%;padding-right: 0;padding-left: 0;text-align:center;background-color:#fff;color:#333;direction:rtl;border-radius:5px;border:1px solid #efefef"> - </div>';
					}
					s = s +'</div></div></div></div></div></div></div></div><div style="height:50px;width:100%;border-top: 1px solid #efefef;margin-top:30px"><a class="btn btn-flat btn-xs navbar-btn btn-pliro-secondary border-pliro-secondary" href="/detail/doctor/' + msg[i].id + '" style="float:left;margin:7px 0;background-color:#ed1846;border-style:none;font-size:14px;padding-right:15px;padding-left:15px;border-radius:5px">نوبت دهی حضوری</a><a class="btn btn-flat btn-xs navbar-btn btn-pliro-secondary border-pliro-secondary" href="/detail/doctor/' + msg[i].id + '" style="float:left;margin:7px 0;border-style:none;font-size:14px;padding-right:15px;padding-left:15px;border-radius:5px;margin-left:10px">نوبت دهی اینترنتی</a></div></li>';
					
                }
                
				if(msg.length == 0){
				 s = s + '<li class="media panel panel-body stack-media-on-mobile" style="height:480px;text-align:center"><img src="/assets/img/diagnostics-03.png" style="height:150px;margin:100px auto 30px" /><p style="font-weight:bold;font-size:16px">نتیجه ای یافت نشد !</p><a href="/" class="btn btn-flat btn-xs navbar-btn btn-pliro-secondary border-pliro-secondary" style="margin:20px 0">جستجوی مجدد</a></li>';
				}
				$('#search').html(s)
            }
        })

    });
</script>