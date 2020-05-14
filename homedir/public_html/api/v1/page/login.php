<style>
.modal {
    background-color: #f8f8f8;
    height: 400px;
    max-width: 500px;
    width: 90%;
    box-shadow: none;
    border-radius: 8px;
    padding: 2rem .5rem 3rem;
    overflow: hidden;
    margin: 0 auto;
	display:block!important;
	position: relative;
}
</style>
<script>
 $('#user_phone').keypress(function (e) {
   if (e.which == 13) {
    return false;
   }
  });
</script>
    <input type="hidden" id="RefLogin" value="" />
	<div class="login modal-group" style="z-index:100000;align-items: center;align-content: center;text-align:center;background-color:rgba(0,0,0,0.7);position: fixed;display: none;justify-content: center;top: 0;left: 0;right: 0;bottom: 0;width: 100%;height: 100%;" id="divlogin">
		<div class="modal" >
		  <div style="background-image:url('/assets/img/close.svg');width:16px;height:16px;background-position:center;background-size:16px;background-repeat:no-repeat;margin-left: 15px;float:left;cursor:pointer" onclick="closeRegister()"></div>
		  
		  <div id="login_one" style="margin-top:30px">
           <form action="javascript:;">		  
		    <div style="width:200px;height:100px;margin:0 auto"></div>
		    <p style="font-weight:bold;color:#333;padding:0;margin:0;margin-top:10px">برای ورود یا عضویت در سایت , شماره همراه خود را وارد کنید</p>
			<p style="font-weight:100;color:#333;padding:0;padding-top:10px;font-size:12px;margin-bottom:15px">عضویت در <?php echo $site_name; ?> فقط یک دقیقه زمان میبره</p>
			<div style="width:100%;text-align:center">
			 <input type="text" style="border: 1px solid #ded4bd;width:350px;height:45px;border-radius:4px;margin-bottom:20px;padding-right:10px;box-shadow:none;overflow-x: hidden; overflow-wrap: break-word;" placeholder="شماره همراه" id="user_phone" maxlength="11" autocomplete="off" />
			 <a onClick="newlogin()" id="newlogin" style="display: inline-block;padding: 18px 25px;color: #fff;text-align: center;text-decoration: none;direction: rtl;outline: 0;line-height: 1;border: none;background-color: <?php echo $theme_color; ?>;width:350px;clear:both;cursor:pointer;border-radius:4px;" >مرحله بعدی</a>
			</div>
			<script>				
				var input = document.getElementById("user_phone");
				input.addEventListener("keyup", function(event) {
					if (event.keyCode === 13) {
						event.preventDefault();
						document.getElementById("newlogin").click();
					}
				});
			</script>
		   </form>
		  </div>
		  
		  <div id="login_two" style="display:none">	
		    <div style="width:200px;height:100px;margin:0 auto"></div>
		    <p style="font-weight:bold;color:#333;padding:0;margin:0;margin-top:10px">رمز عبور خود را وارد کنید</p>
			<p style="font-weight:100;color:#333;padding:0;padding-top:10px;font-size:12px;margin-bottom:15px">شما قبلا عضو شده اید , رمز عبور خود را وارد کنید</p>
			<p style="font-weight:100;color:<?php echo $theme_color; ?>;padding:0;padding-top:10px;font-size:12px;;display:none;margin-bottom:15px" id="errorLogin">رمز عبور اشتباه است , در صورتی که رمز عبور خود را فراموش کرده اید از <a onClick="newPass()" style="color:#333;cursor:pointer">اینجا</a> اقدام نمایید</p>
			<div style="width:100%;text-align:center">
			 <input type="password" style="border: 1px solid #ded4bd;width:350px;height:45px;border-radius:4px;margin-bottom:20px;padding-right:10px;box-shadow:none" placeholder="رمز عبور" id="user_password" />
			 <a style="display: inline-block;padding: 18px 25px;color: #fff;text-align: center;text-decoration: none;direction: rtl;outline: 0;line-height: 1;border: none;background-color: <?php echo $theme_color; ?>;width:350px;clear:both;cursor:pointer;border-radius:4px;" onclick="gotosite();" id="user_password_btn">ورود به سایت</a>
			</div>
			<script>				
				var input = document.getElementById("user_password");
				input.addEventListener("keyup", function(event) {
					if (event.keyCode === 13) {
						event.preventDefault();
						document.getElementById("user_password_btn").click();
					}
				});
			</script>			
		  </div>
		  
		  <div id="login_register_two" style="display:none">	
		    <div style="width:200px;height:100px;margin:0 auto"></div>
		    <p style="font-weight:bold;color:#333;padding:0;margin:0;margin-top:10px">کد تایید فرستاده شده  را وارد کنید</p>
			<p style="font-weight:100;color:#333;margin:0;padding:15px;font-size:12px;margin-bottom:15px">درصورتی که بعد از 2 دقیقه کدی برای شما ارسال نشده , دوباره تلاش کنید</p>
			<p style="font-weight:100;color:<?php echo $theme_color; ?>;margin:0;padding:15px;font-size:12px;display:none;padding-top:0;margin-bottom:15px" id="errorCodeRecive">کد ارسالی صحیح نیست</p>
			<div style="width:100%;text-align:center">
			 <input type="text" style="border: 1px solid #ded4bd;width:350px;height:45px;border-radius:4px;margin-bottom:20px;padding-right:10px;box-shadow:none" placeholder="کد تایید" id="user_code_phone" maxlength="6" />
			 <a style="display: inline-block;padding: 18px 25px;color: #fff;text-align: center;text-decoration: none;direction: rtl;outline: 0;line-height: 1;border: none;background-color: <?php echo $theme_color; ?>;width:350px;clear:both;cursor:pointer;border-radius:4px;" onClick="loginsteptwo();" id="user_code_phone_btn">مرحله بعدی</a>
			<script>				
				var input = document.getElementById("user_code_phone");
				input.addEventListener("keyup", function(event) {
					if (event.keyCode === 13) {
						event.preventDefault();
						document.getElementById("user_code_phone_btn").click();
					}
				});
			</script>					 
			</div>
			<p style="font-weight:100;color:#333;margin:0 auto;padding:15px;font-size:12px;direction:rtl;text-align:right;width:350px;display:none" id="newcode">درخواست کد مجدد بعد از 30 ثانیه<span id="timing" style="float:left;direction: ltr;"></span></p>
		  </div>
		  
		  <div id="login_register_three" style="display:none">	
		    <p style="font-weight:bold;color:#333;padding:0;margin:0;margin-top:20px;padding-bottom:20px;text-align:right;width:350px;margin:0 auto;">مشخصات فردی خود را وارد کنید</p>
			<div style="width:100%;text-align:center">
			 <div style="text-align:right;width:350px;margin:0 auto;padding-bottom:5px">نام : </div>
			 <input type="text" style="border: 1px solid #ded4bd;width:350px;height:45px;border-radius:4px;margin-bottom:20px;padding-right:10px;box-shadow:none" placeholder="نام" id="register__fname" />
			 <div style="text-align:right;width:350px;margin:0 auto;padding-bottom:5px">نام خانوادگی : </div>
			 <input type="text" style="border: 1px solid #ded4bd;width:350px;height:45px;border-radius:4px;margin-bottom:20px;padding-right:10px;box-shadow:none" placeholder="نام خانوادگی" id="register__lname" />
			 <div style="text-align:right;width:350px;margin:0 auto;padding-bottom:5px">رمز عبور : </div>
			 <input type="password" style="border: 1px solid #ded4bd;width:350px;height:45px;border-radius:4px;margin-bottom:20px;padding-right:10px;box-shadow:none" placeholder="رمز عبور برای ورود دوباره به سایت" id="register__password" />
			 <a style="display: inline-block;padding: 18px 25px;color: #fff;text-align: center;text-decoration: none;direction: rtl;outline: 0;line-height: 1;border: none;background-color: <?php echo $theme_color; ?>;width:350px;clear:both;cursor:pointer;border-radius:4px;" onclick="newregister()" id="register__password_btn">ثبت و عضویت</a>
			<script>				
				var input = document.getElementById("register__password");
				input.addEventListener("keyup", function(event) {
					if (event.keyCode === 13) {
						event.preventDefault();
						document.getElementById("register__password_btn").click();
					}
				});
			</script>				 
			</div>
		  </div>
		  
		  <div id="forgot" style="display:none">
		    <p style="font-weight:bold;color:#333;padding:0;margin:0;margin-top:10px">کد تایید ارسال شده و پسورد جدید خود را وارد کنید</p>
			<p style="font-weight:100;color:#333;margin:0;padding:15px;font-size:12px;margin-bottom:15px">درصورتی که بعد از 2 دقیقه کدی برای شما ارسال نشده , دوباره تلاش کنید</p>
			<p style="font-weight:100;color:<?php echo $theme_color; ?>;margin:0;padding:15px;font-size:12px;display:none;padding-top:0;margin-bottom:15px" id="errorCodeRecive">کد ارسالی صحیح نیست</p>
			<div style="width:100%;text-align:center">
			 <input type="text" style="border: 1px solid #ded4bd;width:350px;height:45px;border-radius:4px;margin-bottom:20px;padding-right:10px;box-shadow:none" placeholder="کد تایید ارسال شده به تلفن همراه خود را وارد کنید"  maxlength="6" />
			 
			 <input type="password" id="forget_pass" style="border: 1px solid #ded4bd;width:350px;height:45px;border-radius:4px;margin-bottom:20px;padding-right:10px;box-shadow:none" placeholder="پسورد جدید خود را وارد کنید" />
			 
			 <input type="password" id="forget_pass_rep" style="border: 1px solid #ded4bd;width:350px;height:45px;border-radius:4px;margin-bottom:20px;padding-right:10px;box-shadow:none" placeholder="تکرار پسورد جدید خود را وارد کنید" />
			 <a style="display: inline-block;padding: 18px 25px;color: #fff;text-align: center;text-decoration: none;direction: rtl;outline: 0;line-height: 1;border: none;background-color: <?php echo $theme_color; ?>;width:350px;clear:both;cursor:pointer;border-radius:4px;" onClick="forgetTwo();" id="forget_pass_rep_btn">تایید و ادامه</a>
			<script>				
				var input = document.getElementById("forget_pass_rep");
				input.addEventListener("keyup", function(event) {
					if (event.keyCode === 13) {
						event.preventDefault();
						document.getElementById("forget_pass_rep_btn").click();
					}
				});
			</script>				 
			</div>
			<p style="font-weight:100;color:#333;margin:0 auto;padding:15px;font-size:12px;direction:rtl;text-align:right;width:350px;display:none" id="newcode">درخواست کد مجدد بعد از 30 ثانیه<span id="timing" style="float:left;direction: ltr;"></span></p>
		  </div>
		  
		</div>
       <div class="modal-group-bg" onclick="javascript:$('.login').css('display','none')"></div>
    </div>
	<script>
	 var j=0;
	 var tokenCode=0;
	 var phone='';
	 function closeRegister(){
		 $('#divlogin').css('display','none')
      return false;			  
		 
	 }
	 function newRegister(){
		 $('#login_one').css('display','block')
		 $('#login_two').css('display','none')
		 $('#login_register_two').css('display','none')
		 $('#login_register_three').css('display','none')
		 $('#forgot').css('display','none')
      return false;			  

	 }
	 function newlogin(){
	  phone=$('#user_phone').val();
	  $('#newlogin').html('در حال پردازش ...');
	  if(phone){
	   tokenCode=Math.floor(1000 + Math.random() * 9000);
	   $('#user_phone').css('border','1px solid #ded4bd')
	   $.getJSON("/api/v1/user/login",{user:phone,token:tokenCode}, function(result) {
	    if(result.return.status=='200'){
			alert(result.return.status)
		 $('#login_register_two').css('display','block')  
		 $('#login_one').css('display','none')
	    }else{
		 $('#login_two').css('display','block')  
	     $('#login_one').css('display','none')
	    }
	   })
	  }else{
	   $('#user_phone').css('border','1px solid #f00')  
	  }
      return false;			  

	 }
	 function newCode(){
	   tokenCode=Math.floor(1000 + Math.random() * 9000); 
      return false;			  

	 }
	 function newPass(){
	   $('#login_two').css('display','none')  
	   $('#forgot').css('display','block')
	   tokenCode=Math.floor(1000 + Math.random() * 9000);
	   phone=$('#user_phone').val();
	   $('#user_phone').css('border','1px solid #ded4bd')
	   $.getJSON("/api/v1/user/forget",{user:phone,token:tokenCode}, function(result) {
	    if(result.return.status=='200'){
	    }else{
	     $('#newcode').html('<a onClick="newRegister()" style="cursor:pointer">شما هنوز عضو نشده اید , برای عضویت کلیک کنید</a>');
	    }
	   })
      return false;			  	   
	 }
	 function loginsteptwo(){
	  var phoneCode=$('#user_code_phone').val();
	   if(tokenCode == phoneCode){
		$('#login_register_two').css('display','none') 
		$('#login_register_three').css('display','block') 
	   }else{
		$('#errorCodeRecive,#newcode').css('display','block');
		var start = 5;
        var i=0;
        var timer = setInterval(function() {
         $('#timing').text( Math.floor((start - i) / 60) + " : " + ((start - i) % 60 ));
         i++;
         if(start === i) {
          window.clearInterval(timer);
		  $('#newcode').html('<a onClick="newCode()" style="cursor:pointer">برای ارسال کد مجدد کلیک کنید<span style="float:left;direction: ltr;">0 : 0</span></a>');
         }
        }, 1000);
	   }
      return false;			  	   
	 }
	 function gotosite(){
		var RefLogin=$('#RefLogin').val();
		var phone=$('#user_phone').val();
		var password=$('#user_password').val();
		$.getJSON("/api/v1/user/password",{user:phone,pass:password}, function(result) {
		  if(result.message=='yes'){
		   location.reload();
		  }else{
			$('#errorLogin').css('display','block')   
		  }
		})
      return false;			  		
	 }
	 function newregister(){
	  var RefLogin=$('#RefLogin').val();
	  var phone=$('#user_phone').val();
	  var f=$('#register__fname').val();
	  var l=$('#register__lname').val();
	  var password=$('#register__password').val();
	  $.getJSON("/api/v1/user/register",{user:phone,pass:password,fname:f,lname:l}, function(e) {
	   $.each(e,function(e,l){
	   })   
	  })
      window.location.href=RefLogin;
      location.reload();	
      return false;			  
	 }
	 function forgetTwo(){
	  var RefLogin=$('#RefLogin').val();
	  var phone=$('#user_phone').val();
	  var f1=$('#forget_pass').val();
	  var f2=$('#forget_pass_rep').val();
	  if(f1 == f2){
		$.getJSON("/api/v1/user/changepass",{user:phone,pass:f1}, function(e) {
	     $.each(e,function(e,l){})   
	    })
        window.location.href=RefLogin;	  
	  }	
      return false;			  	  		 
	 }
	</script>