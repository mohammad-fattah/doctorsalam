<footer class="footer_style1">
            <div class="container">
			    <div class="goto_top gotop"><i class="i-up-arrow"></i></div>
                <div class="inner">
                    <div class="footer_part1">
                        <div class="footer_box1">
                            <a class="logo"></a>
                            <div class="content_part">
                                <!--<div class="name">دانلود رایگان اپلیکیشن <strong><?php echo $site_name; ?></strong>( بزودی )</div>-->
                                <div class="btn_style1" data-btn="android_app_modal">
                                    <!--<span class="btn_icon"><i class="i-android"></i></span>
                                    <span class="btn_title">اپلیکیشن اندروید</span>-->
                                </div>
                                <div class="btn_style1" data-btn="ios_app_modal">
                                    <!--<span class="btn_icon"><i class="i-apple"></i></span>
                                    <span class="btn_title">اپلیکیشن آیفون</span>-->
                                </div>
                                <div class="social_media_style1">
                                    <ul class="step no_bullet flex">
                                        <li class="item"><a href="https://facebook.com" target="_blank" title="" class="link"><i class="i-facebook"></i></a></li>
                                        <li class="item"><a href="https://instagram.com" target="_blank" title="" class="link"><i class="i-noun-469424-cc"></i></a></li>
                                        <li class="item"><a href="/" target="_blank" title="" class="link"><i class="i-telegram"></i></a></li>
                                        <li class="item"><a href="/" target="_blank" title="" class="link"><i class="i-play-button-1"></i></a></li>
                                        <!--<li class="item"><a href="#" target="_blank" title="" class="link"><i class="i-aparat"></i></a></li>-->
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="footer_box2">
                            <div class="title_style2">بیمه ها</div>
                            <div class="step_style1">
                                <ul class="step no_bullet">
                                    <li class="item"><a class="link" href="/insurance/thirdparty/">بیمه شخص ثالث</a></li>
                                    <li class="item"><a class="link" href="/insurance/body/">بیمه بدنه</a></li>
                                    <li class="item"><a class="link" href="/insurance/motor/">بیمه موتور سیکلت</a></li>
                                    <li class="item"><a class="link" href="/insurance/fire/">بیمه آتش سوزی و زلزله</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer_box3">
                            <div class="title_style2">دسترسی ها</div>
                            <div class="step_style1 music">
                                <ul class="step no_bullet">
								    <li class="item"><a class="link" href="/moderator" target="_blank">پرتال نمایندگان</a></li>
								    <li class="item"><a class="link" href="/moderator" target="_blank">پرتال بازاریابان</a></li>
								    <li class="item"><a class="link">مجله بیمه</a></li>
                                    <li class="item"><a class="link" href="/about">درباره ما</a></li>
                                    <li class="item"><a class="link" href="/contact">تماس با ما</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer_box4">
                            <div class="title_style2">مجوز ها</div>
                            <div class="step_style1 music">
                                <ul class="step no_bullet">
                                    <li class="item" style="width:33%;margin: 0;float: right;">
                                       <img src="/moderator/assets/site/img/samandehi.png" style="width:80%">
                                    </li>
									<li class="item" style="width:33%;margin: 0;float: right;">
                                        <img src="/moderator/assets/site/img/enamad.png" style="width:80%" onclick="window.open(&quot;https://trustseal.enamad.ir/Verify.aspx?id=101000&amp;p=KoxV8LSUOCWd6QjA&quot;, &quot;Popup&quot;,&quot;toolbar=no, location=no, statusbar=no, menubar=no, scrollbars=1, resizable=0, width=580, height=600, top=30&quot;)" id="KoxV8LSUOCWd6QjA">
                                    </li>
									<li class="item" style="width:100%;margin: 0;text-align:left;clear:both;list-style:none">
									 <a class="link" href="mailto:info@bimehshee.ir" style="font-size:15px;"><?php echo $email;  ?></a>
									</li>
									<li class="item" style="width:100%;margin: 0;text-align:left;clear:both;list-style:none">
									 <a class="link" href="tel:02188814862"	style="font-size:18px;"><?php echo $phone;  ?></a>
									</li>
								</ul>
                            </div>
                        </div>
                    </div>
                    <!-- .footer_part1 -->
                    <div class="footer_part2">
                        <div class="newsletter">
                            <form class="flex">
                                <input type="text" name="email" placeholder="ایمیل">
                                <button>عضویت در خبرنامه</button>
                            </form>
                        </div>
                        <div class="copy_right">
                            &copy; فعالیت این وبسایت تابع قوانین و مقررات جمهوری اسلامی ایران می باشد و هرگونه کپی برداری از آن پیگرد قانونی دارد.
                        </div>
                    </div>
                </div>
            </div>
        </footer>
	</main>
<link rel="stylesheet" href="/moderator/assets/site/css/tab.css">
<!--login-->
<?php include('login.php'); ?>
<script>
	 $(".tabContent").hide(); 
     $("ul.tabs li:first").addClass("active").show(); 
     $(".tabContent:first").show(); 
     $("ul.tabs li").click(function () {
      $("ul.tabs li").removeClass("active"); 
      $(this).addClass("active"); 
      $(".tabContent").hide(); 
      var activeTab = $(this).find("a").attr("href"); 
      $(activeTab).fadeIn(); 
      return false;
     });
	 $(document).ready(function() {
	        $('#pricebody,.pricefire,.squerfire').number( true);
		    <?php if($username): ?>
            $.getJSON("/webservice/userinfo.php", function(result) {
                $.each(result, function(i, field) {
					 $('#userinfo').html('<a href="/panel" style="cursor:pointer;float:left;font-size:12px;color:#333;padding-right:5px">ناحیه کاربری</a><span style="width:0px;float:left;color:#333;padding:0 5px">|</span><a href="/logout" style="text-decoration:none;font-size:12px;float:left;color:#333;padding-right:5px">(خروج)</a><a onclick="javascript:" style="cursor:pointer;float:left;color:#333;font-size:12px;padding:0">'+field[0]['company_name']+'</a>');
					 if(field[0]['broker']=='1'){
						$('.moarefli').css('display','block'); 
						$('.bonli').css('display','block'); 
					 }else{
						$('.addbrokerli').css('display','block'); 
					 }
                });
            });
			<?php endif; ?>
			$(".gotop").click(function() {
             $("html, body").animate({ scrollTop: 0 }, "slow");
             return false;
            });
			
			$("#user_email").keydown(function (e) {
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl/cmd+A
            (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+C
            (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+X
            (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
            }
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
             e.preventDefault();
            }
           });
		   var fff=0;
		   $('body').click(function() {$('.navAul').css('display','none')});
	       $('.navA,.btnMobile').click(function(event){
			 if(fff == 0){
			  event.stopPropagation();$('.navAul').css('display','block');
			  fff=1;
			 }else{
			  event.stopPropagation();$('.navAul').css('display','block');
			  fff=0;
			 }
		   });
     });
    </script>
<!--register-->