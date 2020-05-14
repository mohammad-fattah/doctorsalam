var ghavanin='',address='',yesno='',dat='';
		var addressi='';
		var f='0';
		var url='/';
        $(document).ready(function(e) {	 
			
			$(".aaa").focus(function() {
             $(this).addClass('activei').removeClass('error');
            });
			$(".aaa").focusout(function() {
             $(this).removeClass('activei')
            });
			
			
            $("#reciverForm").on('submit', (function(e) {
				$('.banki').val('در حال پردازش ...');
                
				//
				$('#namei,#city,#phone2,#cellphone,#reciver,.vehiclef,.timebime,.addressbime').removeClass('error')
				
				var name=$('#namei').val();
				if(!name){$('#namei').addClass('error');f='0';}
				
				if(!addressi){
				 addressi=$('.addressi').val();
				 if(!addressi && !address){$('.addressbime').addClass('error');f='0'; addressi=address;}
				}
				
				if(!dat){$('.timebime').addClass('error');f='0';}
				
				var city=$('#city').val();
				if(!city){$('#city').addClass('error');f='0';}
				
				var phone=$('#phone2').val();
				if(!phone){$('#phone2').addClass('error');f='0';}
				
				var cellphone=$('#cellphone').val();
				if(!cellphone){$('#cellphone').addClass('error');f='0';}
				
				var reciver=$('#reciver').val();
				if(!reciver){$('#reciver').addClass('error');f='0';}
				if(!ghavanin){$('.vehiclef').css('color','#f00');}
				
				if(name && city && phone && cellphone && reciver && dat && addressi){
				 f='1';	
				}		
				if(address != 'new'){
			      var extra="&address="+address+"&date="+dat;
				}else{
				  var extra="&date="+dat;	
				}
				
				if(f == '1'){
				 var vname=$('.vehicle').attr('name');
				 if(vname=='yes'){
				  var datai=$('#reciverForm').serialize();
                  $.ajax({
                    url: "/webservice/body/level2.php",
                    type: "GET",
                    data: datai+extra,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
					  window.location.href="/send";
					 //alert('لطفا در ساعات دیگر مراجعه کنید . سامانه در حال بروز رسانی می باشد ')
                    },
                    error: function() {}
                  });
				 }else{
                  swal("لطفا شرایط و قوانین را مطالعه و تایید نمایید") 
				  $('.banki').val('تایید و پرداخت');
				 }
				}else{
                 swal("تمام موارد را کامل کنید") 
				 $('.banki').val('تایید و پرداخت');
				}
				//e.preventDefault();
            }));
			$('.addressbtn').on('click',function(){
				var name=$(this).attr('name');
				if(name == 'new'){
				 address='';
				 addressi=address;
				 $('.hideaddress').css('display','block')
				}else{
				 address=name;
				 addressi=name;
				 $('.hideaddress').css('display','none')	
				}
				$('.addressbtn').css('background-color','#fff').css('color','#252525')
				$(this).css('background-color','#12a3c1').css('color','#fff')
			})
			$('.addressbtnvehicle').on('click',function(){
				var name=$(this).attr('name');
				if(name == 'new'){
				 address='';
				 addressi=address;
				 $('.hideaddress').css('display','block')
				}else{
				 address=name;
				 addressi=name;
				 $('.hideaddress').css('display','none')	
				}
				$('.addressbtnvehicle').css('background-color','#fff').css('color','#252525')
				$(this).css('background-color','#12a3c1').css('color','#fff')
			})
			$('.vehicle').on('click',function(){
				var name=$('.vehicle').attr('name');
		        if(name == 'no'){
				 ghavanin='1';f=1;
		         $('.vehicle').css('background-color','#12a3c1').css('color','#fff')
		         $('.vehicle').attr('name','yes');
		        }else{
				 ghavanin='';f='0';
		         $('.vehicle').css('background-color','#fff').css('color','#252525')
		         $('.vehicle').attr('name','no');
		        }
			})
        });
		function adddate(){
		 $('.delivertime').css('display','block');
		 var d = new Date(); 
         var weekday = new Array(7);
         weekday[0] = "یکشنبه";
         weekday[1] = "دوشنبه";
         weekday[2] = "سه شنبه";
         weekday[3] = "چهارشنبه";
         weekday[4] = "پنج شنبه";
         weekday[5] = "جمعه";
         weekday[6] = "شنبه";
		 var dd=d.getDay();
		 var o='';
		 var oo='';
		 var ooo='';
		 //dd=6;
		 var city=$('#city').val()
		 if(city=='تهران'){
		  if(d.getHours() < '12')
		  {
		   if(dd==6){
			o=6;
            oo=0;			
            ooo=1;			
		   }else{
			o=dd;
            oo=parseInt(dd)+1;   
            ooo=parseInt(dd)+2;
            if(ooo==7){ooo=0;}			
		   }
		   var n = weekday[o];
           var p = weekday[oo];
           var q = weekday[ooo];
		   var t='<div class="deliveryitem"> <div class="ant-row-flex ant-row-flex-middle"> <div class="item_date ant-col-xs-24 ant-col-sm-24 ant-col-md-4"> <div>امروز</div></div> <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-20"> <div class="item_time"> <label><span class="ant-radio"><input type="radio" name="date" value="'+n+' 14 تا 19"></span><span> 14 تا 19</span></label> </div></div> </div> </div>';
		   t = t + '<div class="deliveryitem"> <div class="ant-row-flex ant-row-flex-middle"> <div class="item_date ant-col-xs-24 ant-col-sm-24 ant-col-md-4"> <div>'+p+'</div></div> <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-20"> <div class="item_time"> <label ><span class="ant-radio"><input type="radio" name="date" value="'+p+' 9 تا 13"></span><span> 9 تا 13</span></label> </div> <div class="item_time"> <label class="ant-radio-wrapper"><span class="ant-radio"><input type="radio" name="date" value="'+p+' 14 تا 19"></span><span> 14 تا 19</span></label> </div> <div class="item_time"> <label class="ant-radio-wrapper"><span class="ant-radio"><input type="radio" name="date" value="'+p+' 19 تا 22"></span><span> 19 تا 22</span></label> </div></div> </div> </div>';
		   t = t + '<div class="deliveryitem"> <div class="ant-row-flex ant-row-flex-middle"> <div class="item_date ant-col-xs-24 ant-col-sm-24 ant-col-md-4"> <div>'+q+'</div></div> <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-20"> <div class="item_time"> <label ><span class="ant-radio"><input type="radio" name="date" value="'+q+' 9 تا 13"></span><span> 9 تا 13</span></label> </div> <div class="item_time"> <label class="ant-radio-wrapper"><span class="ant-radio"><input type="radio" name="date" value="'+q+' 14 تا 19"></span><span> 14 تا 19</span></label> </div> <div class="item_time"> <label class="ant-radio-wrapper"><span class="ant-radio"><input type="radio" name="date" value="'+p+' 19 تا 22"></span><span> 19 تا 22</span></label> </div></div> </div> </div>';
		   $('.adddati').html(t);
		  }else{
		   if(dd==6){
            oo=0;
            ooo=1;			
		   }else{
            oo=parseInt(dd)+1; 
            ooo=parseInt(dd)+2;
            if(ooo==7){ooo=0;}			
		   }
           var p = weekday[oo];
		   var q = weekday[ooo];
		   var t ='<div class="deliveryitem"> <div class="ant-row-flex ant-row-flex-middle"> <div class="item_date ant-col-xs-24 ant-col-sm-24 ant-col-md-4"> <div>'+p+'</div></div> <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-20"> <div class="item_time"> <label ><span class="ant-radio"><input type="radio" name="date" value="'+p+' 9 تا 13"></span><span> 9 تا 13</span></label> </div> <div class="item_time"> <label class="ant-radio-wrapper"><span class="ant-radio"><input type="radio" name="date" value="'+p+' 14 تا 19"></span><span> 14 تا 19</span></label> </div><div class="item_time"> <label class="ant-radio-wrapper"><span class="ant-radio"><input type="radio" name="date" value="'+p+' 19 تا 22"></span><span> 19 تا 22</span></label> </div> </div> </div> </div>';
		   t = t + '<div class="deliveryitem"> <div class="ant-row-flex ant-row-flex-middle"> <div class="item_date ant-col-xs-24 ant-col-sm-24 ant-col-md-4"> <div>'+q+'</div></div> <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-20"> <div class="item_time"> <label ><span class="ant-radio"><input type="radio" name="date" value="'+q+' 9 تا 13"></span><span> 9 تا 13</span></label> </div> <div class="item_time"> <label class="ant-radio-wrapper"><span class="ant-radio"><input type="radio" name="date" value="'+q+' 14 تا 19"></span><span> 14 تا 19</span></label> </div> <div class="item_time"> <label class="ant-radio-wrapper"><span class="ant-radio"><input type="radio" name="date" value="'+p+' 19 تا 22"></span><span> 19 تا 22</span></label> </div></div> </div> </div>';
		   $('.adddati').html(t);
		  }
		 }else{
		  if(dd==3){
			o=6;
            oo=0;
            ooo=1;			
		  }else if(dd==4){
			o=0;
            oo=1;
            ooo=2;			
		  }else if(dd==2){
			o=5;
            oo=6;
            ooo=0;			
		  }else if(dd==5){
			o=1;
            oo=2;
            ooo=3;			
		  }else if(dd==6){
			o=2;
            oo=3;
            ooo=4;			
		  }else{
			o=d.getDay()+3;
            oo=d.getDay()+4;   
            ooo=d.getDay()+5;   
		  }
		  var n = weekday[o];
          var p = weekday[oo];
          var q = weekday[ooo];
		  var t ='<div class="deliveryitem"> <div class="ant-row-flex ant-row-flex-middle"> <div class="item_date ant-col-xs-24 ant-col-sm-24 ant-col-md-4"> <div>'+n+'</div></div> <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-20"> <div class="item_time"> <label ><span class="ant-radio"><input type="radio" name="date" value="'+n+' 9 تا 13"></span><span> 9 تا 13</span></label> </div> <div class="item_time"> <label class="ant-radio-wrapper"><span class="ant-radio"><input type="radio" name="date" value="'+n+' 14 تا 19"></span><span> 14 تا 19</span></label> </div><div class="item_time"> <label class="ant-radio-wrapper"><span class="ant-radio"><input type="radio" name="date" value="'+n+' 19 تا 22"></span><span> 19 تا 22</span></label> </div> </div> </div> </div>';
		  t = t + '<div class="deliveryitem"> <div class="ant-row-flex ant-row-flex-middle"> <div class="item_date ant-col-xs-24 ant-col-sm-24 ant-col-md-4"> <div>'+p+'</div></div> <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-20"> <div class="item_time"> <label ><span class="ant-radio"><input type="radio" name="date" value="'+p+' 9 تا 13"></span><span> 9 تا 13</span></label> </div> <div class="item_time"> <label class="ant-radio-wrapper"><span class="ant-radio"><input type="radio" name="date" value="'+p+' 14 تا 19"></span><span> 14 تا 19</span></label> </div><div class="item_time"> <label class="ant-radio-wrapper"><span class="ant-radio"><input type="radio" name="date" value="'+p+' 19 تا 22"></span><span> 19 تا 22</span></label> </div> </div> </div> </div>';
		  t = t + '<div class="deliveryitem"> <div class="ant-row-flex ant-row-flex-middle"> <div class="item_date ant-col-xs-24 ant-col-sm-24 ant-col-md-4"> <div>'+q+'</div></div> <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-20"> <div class="item_time"> <label ><span class="ant-radio"><input type="radio" name="date" value="'+q+' 9 تا 13"></span><span> 9 تا 13</span></label> </div> <div class="item_time"> <label class="ant-radio-wrapper"><span class="ant-radio"><input type="radio" name="date" value="'+q+' 14 تا 19"></span><span> 14 تا 19</span></label> </div><div class="item_time"> <label class="ant-radio-wrapper"><span class="ant-radio"><input type="radio" name="date" value="'+q+' 19 تا 22"></span><span> 19 تا 22</span></label> </div> </div> </div> </div>';
		  $('.adddati').html(t);
		 }
		}
		function timebtn(name){
		  $('.timebtn').css('background-color','#fff').css('color','#252525')
		  $('#timebtn'+name).css('background-color','#12a3c1').css('color','#fff')
		  dat=$('#timebtn'+name).html();
		}