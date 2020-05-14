<?php 
 include('api/v1/settings/Header.php');
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title><?php echo $site_name; ?></title>
	<link href="<?php echo $site_logo; ?>" rel="shortcut icon" type="image/x-icon" />
    <meta name="theme-color" content="<?php echo $theme_color; ?>">
	<link rel="stylesheet" href="/assets/css/persian-datepicker.min.css">
	<link rel="stylesheet" href="/assets/css/select2.min.css">
    <link href="/assets/css/styles.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/styles.b730ba5e0c98ca09d713.bundle.css" rel="stylesheet">
	<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/jquery.number.min.js"></script>
    <script type="text/javascript" src="/assets/js/typed.js"></script>
    <style type="text/css">.fancybox-margin{margin-right:17px}.cat-deal-color.main-cat .main-cat-deal-thumbnail .cds-item .cat-deal-box .cat-deal-box-main{margin-top:17px}.btn-group-vertical>.btn-group:after,.btn-group-vertical>.btn-group:before,.btn-toolbar:after,.btn-toolbar:before,.clearfix:after,.clearfix:before,.container-fluid:after,.container-fluid:before,.container:after,.container:before,.dl-horizontal dd:after,.dl-horizontal dd:before,.form-horizontal .form-group:after,.form-horizontal .form-group:before,.modal-footer:after,.modal-footer:before,.modal-header:after,.modal-header:before,.nav:after,.nav:before,.navbar-collapse:after,.navbar-collapse:before,.navbar-header:after,.navbar-header:before,.navbar:after,.navbar:before,.pager:after,.pager:before,.panel-body:after,.panel-body:before,.row:after,.row:before{content:" ";display:table}.cat-deal-color .main-row .cat-deal-smallbox .cat-deal-box-main .cdbm-title{margin-top:0;padding-top:0;line-height:1;margin-bottom:4px}.cat-deal-color .main-row .cat-deal-box .cat-deal-box-main .cdbm-title{margin:15px 0 3px}.cat-deal-color.main-cat .main-cat-deal-thumbnail .cds-item .cat-deal-box .cdbm-title a{font-size:1.4rem;width:80%;padding-bottom:1px;position:relative;padding-right:32px}.cat-deal-color .main-row .cat-deal-smallbox .cat-deal-box-main .cdbm-title a{width:77%;font-size:1.2rem;padding-bottom:0;line-height:18px;min-height:18px}.cat-deal-color.main-cat .main-cat-deal-thumbnail .cds-item .cat-deal-box .cdbm-title a:before{position:absolute;font-family:netbarg;content:'\e97b';font-size:2.6rem;color:#00ae4d;right:0}@font-face{font-family:bitmeh;font-style:normal;font-weight:400;src:url('/assets/fonts/IRANSansWeb(FaNum)_Light.eot') format("embedded-opentype"),url('/assets/fonts/IRANSansWeb(FaNum)_Light.woff') format("woff"),url('/assets/fonts/IRANSansWeb(FaNum)_Light.woff2') format("woff2"),url('/assets/fonts/IRANSansWeb(FaNum)_Light.ttf') format("truetype")}#learning .items .item .img_box img{width:40%}#learning .items .item:hover .seemore{background:#2068e0 url(/assets/img/cta-arrow.png) no-repeat 10px center;color:#fff}#learning .items .item .text{display:block;height:75px;overflow:hidden;color:#fff}#learning .item a{display:block;height:100%}#learning .seemore{display:inline-block;padding:5px 15px;border-radius:28px;background:#f7f7f7;font-size:12px;margin-top:10px;color:#404040;border:1px solid #efefef}#learning .slick-dots{top:-65px}#learning .title{margin-bottom:20px}#learning .items .item .img_box img{width:40%}#learning .items .item:hover .seemore{background:#2068e0 url(/assets/img/cta-arrow.png) no-repeat 10px center;color:#fff}#learning .items .item .text{display:block;height:75px;overflow:hidden}#learning .item a{display:block;height:100%}#learning .seemore{display:inline-block;padding:5px 15px;border-radius:28px;background:#f7f7f7;font-size:12px;margin-top:10px;color:#404040;border:1px solid #efefef}#learning .slick-dots{top:-65px}#learning .title{margin-bottom:20px}#how_to_start,#learning{padding-bottom:120px;position:relative}#how_to_start .object,#learning .object{position:absolute;pointer-events:none}#how_to_start .object.one,#learning .object.one{width:25%;left:0;top:0}#how_to_start .object.two,#learning .object.two{right:0;width:15%;top:-100px}#how_to_start .title,#learning .title{margin-bottom:100px}#how_to_start .items,#learning .items{text-align:center}#how_to_start .items .item,#learning .items .item{background:#354bbb;position:relative;border-radius:39px;display:inline-block;padding:75px 19px 20px;width:19%;font-size:15px;height:180px;vertical-align:top;transition:all .5s ease;-webkit-transition:all .5s ease;-ms-transition:all .5s ease;-o-transition:all .5s ease;-moz-transition:all .5s ease;cursor:default}#how_to_start .items .item .img_box,#learning .items .item .img_box{width:83px;height:83px;border-radius:50%;background-color:#41d296;position:absolute;top:-40px;transition:all .2s ease;-webkit-transition:all .2s ease;-ms-transition:all .2s ease;-o-transition:all .2s ease;-moz-transition:all .2s ease;left:50%;transform:translate(-50%,0)}#how_to_start .items .item .img_box img,#learning .items .item .img_box img{width:50%;position:absolute;transform:translate(-50%,-50%);top:50%;left:50%}#how_to_start .items .item:hover,#learning .items .item:hover{transform:translateY(-10px)}#how_to_start .items .item:hover .img_box,#learning .items .item:hover .img_box{background-color:#2068e0}#how_to_start .items .item:hover a,#learning .items .item:hover a{color:#404040}#how_to_start .items .item:not(:last-child),#learning .items .item:not(:last-child){margin-left:2%}#brands{background:#01137c;padding:35px 0;text-align:center}#brands a{width:10%;height:61px;display:inline-block;background:#fff;vertical-align:top;border-radius:4px;position:relative}#brands a:not(:last-child){margin-left:10px}#brands a:hover img{-webkit-filter:grayscale(0);filter:grayscale(0)}#brands a img{position:absolute;top:50%;width:60%;left:50%;transition:all .2s ease;-webkit-transition:all .2s ease;-ms-transition:all .2s ease;-o-transition:all .2s ease;-moz-transition:all .2s ease;transform:translate(-50%,-50%);-webkit-filter:grayscale(100%);filter:grayscale(100%)}#brands a img.small{width:35%}
	:placeholder{font-size:11px}</style>
</head>
<body class="loaded pace-done pace-done" style="background-color:#fff">
    <div class="search-bar-wrapper">
        <div class="navbar navbar-default navbar-transparent">
            <div class="navbar-boxed container-fluid">
                <div class="navbar-collapse collapse" id="navbar-mobile">
                    <?php include('api/v1/page/nav.php'); ?>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="container">
                <app-search-bar>
                    <div class="main-search">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="content-group-sm text-white">
                                <div class="search-header text-center mb-20" style="padding-top:100px">
                                    <h1 class="header-title">مشاوره برای یافتن بهترین پزشک یا کلینیک</h1>
                                    <h4 class="no-margin text-light header-subtitle"><span class="text-regular"><font style="vertical-align: inherit;line-height:40px;font-size:15px">برای یافتن بهترین پزشک و یا مطب , فرم زیر را پر کنید تا مشاوران ما بهترین گزینه را به شما پیشنهاد دهند .</font></span></h4>
								</div>
                            </div>
							<div style="width:90%;height:500px;margin:0 auto;margin-top:50px">
							 <div class="col-md-12">
							  <div class="col-md-6">
							   <input name="first_name" class="border-primary-800 form-control input-xlg  typeahead-remote tt-input" type="text" style="position: relative; vertical-align: top;direction:rtl;font-weight:100;height:45px;font-size:13px" placeholder="نام خانوادگی">
							  </div>
							  <div class="col-md-6">
							   <input name="last_name" class="border-primary-800 form-control input-xlg  typeahead-remote tt-input" type="text" style="position: relative; vertical-align: top;direction:rtl;font-weight:100;height:45px;font-size:13px" placeholder="نام">
							  </div>
							 </div>
							 
							 <div class="col-md-12" style="margin-top:20px">
							  <div class="col-md-12">
							   <select id="doctor_insurance" name="doctor_insurance" class="select-location form-control input-xlg select2" style="height:50px;border-style:none;border:1px solid #efefef;font-size:12px">
                                                        <option>کدامیک از بیمه های زیر را دارید ؟</option>
                                                        <option>بیمه نیروهای مسلح</option>
                                                        <option>بیمه تکمیلی دانا</option>
                                                        <option>هیچکدام</option>
                                                    </select>
							  </div>
							 </div>
							 <div class="col-md-12" style="margin-top:20px">
							  <div class="col-md-12">
							   <select name="state" class="select-location form-control input-xlg select2 state " style="height:50px;border-style:none;font-size:13px" data-select2-id="4" tabindex="-1" aria-hidden="true"><option data-select2-id="7">استان</option><option data-select2-id="13">آذربایجان شرقی</option><option data-select2-id="14">آذربایجان غربی</option><option data-select2-id="15">اردبیل</option><option data-select2-id="16">اصفهان</option><option data-select2-id="17">البرز</option><option data-select2-id="18">ایلام</option><option data-select2-id="19">بوشهر</option><option data-select2-id="20">تهران</option><option data-select2-id="21">چهارمحال وبختیاری</option><option data-select2-id="22">خراسان جنوبی</option><option data-select2-id="23">خراسان رضوی</option><option data-select2-id="24">خراسان شمالی</option><option data-select2-id="25">خوزستان</option><option data-select2-id="26">زنجان</option><option data-select2-id="27">سمنان</option><option data-select2-id="28">سیستان وبلوچستان</option><option data-select2-id="29">فارس</option><option data-select2-id="30">قزوین</option><option data-select2-id="31">قم</option><option data-select2-id="32">کردستان</option><option data-select2-id="33">کرمان</option><option data-select2-id="34">کرمانشاه</option><option data-select2-id="35">کهگیلویه وبویراحمد</option><option data-select2-id="36">گلستان</option><option data-select2-id="37">گیلان</option><option data-select2-id="38">لرستان</option><option data-select2-id="39">مازندران</option><option data-select2-id="40">مرکزی</option><option data-select2-id="41">هرمزگان</option><option data-select2-id="42">همدان</option><option data-select2-id="43">یزد</option></select>
							  </div>
							 </div>
							 <div class="col-md-12" style="margin-top:20px">
							  <div class="col-md-12">
							   <select name="doctor_reson" id="doctor_reson" class="select-location form-control input-xlg select2" style="height:50px;border-style:none;border:1px solid #efefef;font-size:12px">
                                                            <option>دلیل ویزیت شما ؟</option>
                                                            <option>امتحان سالانه پاپ اسمیر / GYN
                                                            </option>
                                                            <option>سالانه جسمی
                                                            </option>
                                                            <option>مشاوره عمومی
                                                            </option>
                                                            <option>پیگیری عمومی
                                                            </option>
                                                            <option >بیماری
                                                            </option>
                                                            <option>آسم آلرژیک
                                                            </option>
                                                            <option>بررسی سالانه
                                                            </option>
                                                            <option>کمردرد
                                                            </option>
                                                            <option>مشکلات برگشت
                                                            </option>
                                                            <option>کنترل تولد / پیشگیری از بارداری
                                                            </option>
                                                            <option>کار خون
                                                            </option>
                                                            <option>احساس سوزش در ادرار
                                                            </option>
                                                            <option>بازدید از غربالگری قلب و عروق
                                                            </option>
                                                            <option>کلامیدیا
                                                            </option>
                                                            <option>بررسی کلسترول / لیپیدها
                                                            </option>
                                                            <option>ECG / EKG
                                                            </option>
                                                            <option>پر بودن گوش / پرت کردن
                                                            </option>
                                                            <option>عفونت گوش
                                                            </option>
                                                            <option>تمیز کردن موم گوش
                                                            </option>
                                                            <option>واکسن آنفلوآنزا
                                                            </option>
                                                            <option>انجماد زگیل
                                                            </option>
                                                            <option>مشاوره زنان و زایمان
                                                            </option>
                                                            <option>پیشگیری در معرض اچ آی وی (PREP)
                                                            </option>
                                                            <option>فشار خون بالا / فشار خون بالا
                                                            </option>
                                                            <option>تخلیه بیمارستان / پیگیری
                                                            </option>
                                                            <option>اختلال بیش فعالی (ADD / ADHD)
                                                            </option>
                                                            <option>آسیب دیدگی / جزیی
                                                            </option>
                                                            <option>سندرم روده تحریک پذیر
                                                            </option>
                                                            <option>تزریق مشترک
                                                            </option>
                                                            <option>بازدید سالانه سلامتی Medicare
                                                            </option>
                                                            <option>ویزیت جدید بیمار
                                                            </option>
                                                            <option>مشاوره در مورد چاقی / کاهش وزن
                                                            </option>
                                                            <option>روش پلاسمای غنی از پلاکت
                                                            </option>
                                                            <option>بررسی قبل از عمل / ترخیص قبل از جراحی
                                                            </option>
                                                            <option>نسخه / پر کردن مجدد
                                                            </option>
                                                            <option>مشاوره پزشکی پیشگیری
                                                            </option>
                                                            <option >پروتز درمانی
                                                            </option>
                                                            <option>غربالگری بیماری / پزشکی پیشگیرانه
                                                            </option>
                                                            <option>بیماری مقاربتی (STD)
                                                            </option>
                                                            <option>بیوپسی پوست / از بین بردن ضایعه پوستی
                                                            </option>
                                                            <option>گلو درد
                                                            </option>
                                                            <option>مشاوره پزشکی سفر
                                                            </option>
                                                            <option>تزریق نقطه Trigger
                                                            </option>
                                                            <option>دیابت نوع 2
                                                            </option>
                                                            <option>عفونت ادراری (UTI)
                                                            </option>
                                                            <option>تخلیه / عفونت واژن
                                                            </option>
                                                            <option>زگیل (ها)
                                                            </option>
                                                            <option>مشاوره در مورد کاهش وزن
                                                            </option>
                                                            <option>امتحان خوب خانمها
                                                            </option>
                                                            <option>سلامتی
                                                            </option>
                                                            <option>ویزیت سالانه سلامتی (برای بیماران مدیکر)
                                                            </option>
                                                        </select>
							  </div>
							 </div>
							 
							 <div class="col-md-12" style="margin-top:20px">
							  <div class="col-md-4">
							   <div class="btn btn-flat btn-xs navbar-btn btn-pliro-secondary border-pliro-secondary" href="/moshaver" style="height:40px;width:100%;margin-top:0;line-height:28px">ثبت درخواست مشاوره</div>
							  </div>
							  <div class="col-md-8">
							   <div style="height:40px;width:100%;border-radius:3px;background-color:#fff;line-height:40px;padding-right:10px">بارگزاری مدارک پزشکی</div>
							  </div>
							 </div>
							 
							</div>
                        </div>
                    </div>
                </app-search-bar>
            </div>
        </div>
    </div>

    <?php include('api/v1/page/footer.php'); ?>
</body>
</html>