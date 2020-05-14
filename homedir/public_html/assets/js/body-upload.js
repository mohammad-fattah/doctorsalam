var $imageupload = $('.imageupload');
        $imageupload.imageupload();
		
		 $(document).ready(function(e) {
		  var i=0,i1=0,i2=0,i4=0,i5=0,i6=0; 
		  $("#imgcar").on('change', (function(e) {
				$('#onepic').html('در حال آپلود ....');
				var form = $('#uploadForm')[0];
                var formData = new FormData(form);
                e.preventDefault();
                $.ajax({
                    url: "/webservice/body/upload.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
					 $('#onepic').html(data);
					 if(data=='آپلود با موفقیت انجام شد'){$('#onepic').css("color","#41cc2d");i=1;$('.blockpic1').css("border-color","#41cc2d");$('.plus1').css("color","#41cc2d");}
                    }
                });
            }));
			$("#imgcart1").on('change', (function(e) {
				$('#twopic').html('در حال آپلود ....');
				var form = $('#uploadForm2')[0];
                var formData = new FormData(form);
                e.preventDefault();
                $.ajax({
                    url: "/webservice/body/upload2.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
					 $('#twopic').html(data);
					 if(data=='آپلود با موفقیت انجام شد'){$('#twopic').css("color","#41cc2d");i1=1;$('.blockpic2').css("border-color","#41cc2d");$('.plus2').css("color","#41cc2d");}
                    }
                });
            }));
			
			$("#imgcart2").on('change', (function(e) {
				$('#threepic').html('در حال آپلود ....');
				var form = $('#uploadForm3')[0];
                var formData = new FormData(form);
                e.preventDefault();
                $.ajax({
                    url: "/webservice/body/upload3.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
					 $('#threepic').html(data);
					 if(data=='آپلود با موفقیت انجام شد'){$('#threepic').css("color","#41cc2d");i2=1;$('.blockpic3').css("border-color","#41cc2d");$('.plus3').css("color","#41cc2d");}
                    }
                });
            }));
			
			$("#imgcart3").on('change', (function(e) {
				$('#fourpic').html('در حال آپلود ....');
				var form = $('#uploadForm4')[0];
                var formData = new FormData(form);
                e.preventDefault();
                $.ajax({
                    url: "/webservice/body/upload4.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
					 $('#fourpic').html(data);
					 if(data=='آپلود با موفقیت انجام شد'){$('#fourpic').css("color","#41cc2d");i2=1;$('.blockpic4').css("border-color","#41cc2d");$('.plus4').css("color","#41cc2d");}
                    }
                });
            }));
			
			
            $(".backcompare").on('click', (function(e) {
			   $('.info').css('display','none');	
            }));
			
			$(".btnupload").on('click', (function(e) {
			   $('.errorPic').html('');
			   window.scrollTo(0,0);
			   var iscode=IsCodemeli($('#melli_code').val())
			   $('#melli_code').css("border-color","#d9d9d9")
			   if(iscode==true){
			     var data=$('#InsuranceProfile').serialize();
			     if((i == '1') && (i1 == '1')){
				   $.ajax({
                    url: "/webservice/body/uploadok.php",
                    type: "GET",
					data:data,
                    contentType: false,
                    cache: false,
                    processData: false
                   });
                   $('#block_pic').css('display','none')
			       $('#block_address').css('display','block')				   
			     }else{
				   $('.errorPic').html("تمام تصاویر را آپلود نمایید");
				   if(i != '1'){$('.blockpic1').css("border-color","#ee6f75");$('#onepic').css("color","#ee6f75");$('.plus1').css("color","#ee6f75");}
				   if(i1 != '1'){$('.blockpic2').css("border-color","#ee6f75");$('#twopic').css("color","#ee6f75");$('.plus2').css("color","#ee6f75");}			 
			     }
			   }else{
				 if($("#melli_code").val()){
		          $("#melli_code").css("border-color", "#ee6f75"), $(".errorPic").html("کد ملی وارد شده اشتباه است")
	             }else{
		          $("#melli_code").css("border-color", "#ee6f75"), $(".errorPic").html("کد ملی را وارد کنید")  
	             }
			   }
            }));
			
			
			$("#check1").on('change', (function(e) {
				$('#onepic4').html('در حال آپلود ....');
				var form = $('#uploadcheck1')[0];
                var formData = new FormData(form);
                e.preventDefault();
                $.ajax({
                    url: "/webservice/body/uploadcheck1.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
					 $('#onepic4').html(data);
					 if(data=='آپلود با موفقیت انجام شد'){$('#onepic4').css("color","#41cc2d");i4=1;$('.blockpic4').css("border-color","#41cc2d");$('.plus4').css("color","#41cc2d");}
                    }
                });
            }));
			$("#check2").on('change', (function(e) {
				$('#twopic5').html('در حال آپلود ....');
				var form = $('#uploadcheck2')[0];
                var formData = new FormData(form);
                e.preventDefault();
                $.ajax({
                    url: "/webservice/body/uploadcheck2.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
					 $('#twopic5').html(data);
					 if(data=='آپلود با موفقیت انجام شد'){$('#twopic5').css("color","#41cc2d");i5=1;$('.blockpic5').css("border-color","#41cc2d");$('.plus5').css("color","#41cc2d");}
                    }
                });
            }));
			$("#check3").on('change', (function(e) {
				$('#threepic6').html('در حال آپلود ....');
				var form = $('#uploadcheck3')[0];
                var formData = new FormData(form);
                e.preventDefault();
                $.ajax({
                    url: "/webservice/body/uploadcheck3.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
					 $('#threepic6').html(data);
					 if(data=='آپلود با موفقیت انجام شد'){$('#threepic6').css("color","#41cc2d");i6=1;$('.blockpic6').css("border-color","#41cc2d");$('.plus6').css("color","#41cc2d");}
                    }
                });
            }));
			$(".btnuploadcheck").on('click', (function(e) {
			   $('.errorPic').html(' ');
			   if((i4 == '1') && (i5 == '1') && (i6 == '1')){
				   $.ajax({
                    url: "/webservice/body/uploadcheckok.php",
                    type: "POST",
                    contentType: false,
                    cache: false,
                    processData: false
                   });
                   $('#block_aghsat').css('display','none')
			       $('#block_pic').css('display','block')				   
			   }else{
				 $('.errorPic').html("تمام تصاویر را آپلود نمایید");
				 if(i4 != '1'){$('.blockpic4').css("border-color","#ee6f75");$('#onepic4').css("color","#ee6f75");$('.plus4').css("color","#ee6f75");}
				 if(i5 != '1'){$('.blockpic5').css("border-color","#ee6f75");$('#twopic5').css("color","#ee6f75");$('.plus5').css("color","#ee6f75");}
				 if(i6 != '1'){$('.blockpic6').css("border-color","#ee6f75");$('#threepic6').css("color","#ee6f75");$('.plus6').css("color","#ee6f75");}
				 			 
			   }
            }));
			
        });
		function IsCodemeli(value) {
      var r=0;
      var n=0;
      var c=0;
      
      if (value.length <10){
         //msg.innerHTML="طول کد ملی وارد شده باید 10 کاراکتر باشد ";
         return false;
         }
      else if (value.length == 10) {
        if (value == '1111111111' || value == '0000000000' || value == '2222222222' || value == '3333333333' || value == '4444444444' || value == '5555555555' || value == '7777777777' || value == '8888888888' || value == '9999999999')
          // msg.innerHTML="کد ملی وارد شده اشتباه است";
	      return false;
     }          
     else if (value.charAt(0) == '0' && value.charAt(1) == '0' && value.charAt(2) == '0' && value.charAt(3) == '0' && value.charAt(4) == '0' && value.charAt(5) == '0' && value.charAt(6) == '0')
           return false;                    
                
        c = parseInt(value.charAt(9));
        for (i=1; i<=9; i++){
            n= n + parseInt(value.charAt(i-1) * (11-i));
        }
        r = parseInt(n % 11);
         if ((r <2 && r == c) || (r > 2 && c == 11 - r)){
         //$('.errorPic').html("کد ملی وارد شده صحیح است");
           return true;
           }
         else
         return false; 
                      
      }