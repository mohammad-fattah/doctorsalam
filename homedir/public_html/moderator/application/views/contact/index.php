<!DOCTYPE html>
<html lang="fa" dir="rtl">
<?php $this->load->view('includes/headsite'); ?>
<link rel="stylesheet" href="/moderator/assets/shop/css/util.css">
<link rel="stylesheet" href="/moderator/assets/shop/css/contact.css">
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC85unyy7_0BjJs4k65PValsc8mu687Q5U&callback=initMap"></script>
	<script>
	 function initMap() {
  var myLatLng = {lat:35.757345, lng:51.399625};

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 17,
    center: myLatLng
  });

  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'Hello World!'
  });
}
	</script>
<style>.contact100-more::before{display:none}</style>
<body>
    <?php $this->load->view('includes/loading'); ?>
	<div id="app">
        <?php $this->load->view('includes/header'); ?>
		<div class="bg top" style="background-image: url('/moderator/assets/shop/images/service.png');height:680px">
			<div class="container">
               <div class="relative blog-title">
                    <h1 class="yellow" style="text-align:left;line-height:40px;border-left:1px solid #f1f1f1;padding-left:10px;color:#f1f1f1">تماس با ما<br><p style="font-size:18px">Contact</p></h1>  					
				</div>
            </div>
			<div style='right:50px; border-color: transparent; position: absolute; z-index: 0; width: 70%; height: 0; border-style: solid; content: ""; padding-right: 20px; line-height: 30px; padding-right: 20px; padding-top:140px;'>
		     <p style="font-size:17px;width:80%;text-align:justify;font-weight:bold">باشگاه مشتریان بیمیتک به شماره ثبت 531344 خانواده بزرگی است که از مراکز برتر ارائه دهنده خدمات و کالا و از سوی دیگر از پرسنل سازمان‌ها و شرکت‌های دولتی و خصوصی و مردم عزیز ایران تشکیل یافته است. این شرکت با پشتوانه سال‌ها تجربه خویش در زمینه باشگاه‌داری مشتریان و بهره‌گیری از کادری مجرب و متخصص، ارائه دهنده خدمات رفاهی و تخفیفی و تقسیطی درسراسر ایران عزیز می‌باشد</p>
		    </div>
        </div>
        <div id="app">
        
		<div class="contact">
            <div class="" dir="ltr">
                <div class="container">
                    <div class="wrap-contact100">
                        <form class="contact100-form validate-form" method="post" action="contact">
                            <span class="contact100-form-title">
                            برای ما پیام بفرستید
                        </span>
                            <div class="wrap-input100 wrap-input100 validate-input" data-validate="نام خود را وارد نمایید">
                                <input id="first-name" class="input100" type="text" name="name" placeholder="نام ..." dir="rtl">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="wrap-input100 validate-input" data-validate="وارد کردن ایمیل اجباریست">
                                <input id="email" class="input100" type="text" name="email" placeholder="ایمیل..." dir="rtl">
                                <span class="focus-input100"></span>
                            </div>
                            <div class="wrap-input100">
                                <input id="phone" class="input100" type="text" name="mobile" placeholder="تلفن همراه..." dir="rtl">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="wrap-input100">
                                <select name="department_id" id="department_id" class="input100" dir="rtl">
                                    <option value="1">فنی</option>
                                    <option value="3">دپارتمان فروش</option>
                                </select>
                                <span class="focus-input100"></span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="وارد کردن پیام اجباریست">
                                <textarea id="message" class="input100" name="content" placeholder="متن پیام خود را وارد نمایید ..." dir="rtl"></textarea>
                                <span class="focus-input100"></span>
                            </div>

                            <div class="container-contact100-form-btn">
                                <button class="contact100-form-btn animated" type="submit">
                                    ارسال
                                </button>
                            </div>

                        </form>

                        <div class="contact100-more flex-col-c-m"  dir="rtl" id="map">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('includes/footerin'); ?>
    <script src="/moderator/assets/shop/js/contact.js"></script>
</body>
</html>