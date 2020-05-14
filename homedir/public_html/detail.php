<?php 
 include('api/v1/settings/Header.php');
 if(isset($_GET['uid'])){$uid=$_GET['uid'];}else{$uid='';}
 $uid=str_replace('.php','',$uid);
 
 $users = new settings($db,'users');
 $users->user=$uid;
 $stmt=$users->doctor();
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
     extract($row);
	 $first_name_doctor=$first_name;
	 $last_name_doctor = $last_name;
	 $job_user_doctor = $job_title;
	 $email_doctor = $email;
	 $state_doctor = $state;
	 $city_doctor = $city;
	 $address_doctor = $address;
	 $birthday_doctor = $birthday;  
	 $image_doctor = $image;  
	 $user_key_doctor = $user_key;  
	 $doctor_comment = $comment;  
 }
 $address_item=array();
 $users = new settings($db,'users_address');
 $users->user=$user_key_doctor;
 $stmt=$users->doctor_address();
 $doctor_address_clinic = '';
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
     extract($row);
	 $doctor_address_clinic = $doctor_address_clinic . $state.' - '.$city.' - '.$area.' - '.$address.'##';	 
 }
 
 function div($a,$b) { 
     return (int) ($a / $b); 
    }
    function gregorian_to_jalali ($g_y, $g_m, $g_d,$str) 
    { 
     $g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31); 
     $j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29); 
     $gy = $g_y-1600; 
     $gm = $g_m-1; 
     $gd = $g_d-1;  
     $g_day_no = 365*$gy+div($gy+3,4)-div($gy+99,100)+div($gy+399,400);
     for ($i=0; $i < $gm; ++$i) 
      $g_day_no += $g_days_in_month[$i]; 
      if ($gm>1 && (($gy%4==0 && $gy%100!=0) || ($gy%400==0))) 
      $g_day_no++; 
      $g_day_no += $gd; 
      $j_day_no = $g_day_no-79; 
      $j_np = div($j_day_no, 12053); /* 12053 = 365*33 + 32/4 */ 
      $j_day_no = $j_day_no % 12053; 
      $jy = 979+33*$j_np+4*div($j_day_no,1461); /* 1461 = 365*4 + 4/4 */ 
      $j_day_no %= 1461; 
      if($j_day_no >= 366) { 
       $jy += div($j_day_no-1, 365); 
       $j_day_no = ($j_day_no-1)%365; 
      } 
      for($i = 0; $i < 11 && $j_day_no >= $j_days_in_month[$i]; ++$i) 
       $j_day_no -= $j_days_in_month[$i]; 
       $jm = $i+1; 
       $jd = $j_day_no+1; 
     return $jy.'/'.$jm.'/'.$jd ;
    }
?>
    <!DOCTYPE html>
    <html lang="fa">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>
         <?php echo $site_name; ?> : <?php echo $first_name_doctor.' '.$last_name_doctor; ?>
        </title>
        <link href="<?php echo $site_logo; ?>" rel="shortcut icon" type="image/x-icon" />
        <meta name="theme-color" content="<?php echo $theme_color; ?>">

        <link rel="stylesheet" href="/assets/css/select2.min.css">
        <link href="/assets/css/styles.css" rel="stylesheet" type="text/css">
        <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css">
        <link href="/assets/css/styles.b730ba5e0c98ca09d713.bundle.css" rel="stylesheet">
        <script type="text/javascript" src="/assets/js/jquery.min.js"></script>
        <script src="/assets/js/jquery.number.min.js"></script>
        <style type="text/css">
		.fancybox-margin{margin-right:17px}.cat-deal-color.main-cat .main-cat-deal-thumbnail .cds-item .cat-deal-box .cat-deal-box-main{margin-top:17px}.btn-group-vertical>.btn-group:after,.btn-group-vertical>.btn-group:before,.btn-toolbar:after,.btn-toolbar:before,.clearfix:after,.clearfix:before,.container-fluid:after,.container-fluid:before,.container:after,.container:before,.dl-horizontal dd:after,.dl-horizontal dd:before,.form-horizontal .form-group:after,.form-horizontal .form-group:before,.modal-footer:after,.modal-footer:before,.modal-header:after,.modal-header:before,.nav:after,.nav:before,.navbar-collapse:after,.navbar-collapse:before,.navbar-header:after,.navbar-header:before,.navbar:after,.navbar:before,.pager:after,.pager:before,.panel-body:after,.panel-body:before,.row:after,.row:before{content:" ";display:table}.cat-deal-color .main-row .cat-deal-smallbox .cat-deal-box-main .cdbm-title{margin-top:0;padding-top:0;line-height:1;margin-bottom:4px}.cat-deal-color .main-row .cat-deal-box .cat-deal-box-main .cdbm-title{margin:15px 0 3px}.cat-deal-color.main-cat .main-cat-deal-thumbnail .cds-item .cat-deal-box .cdbm-title a{font-size:1.4rem;width:80%;padding-bottom:1px;position:relative;padding-right:32px}.cat-deal-color .main-row .cat-deal-smallbox .cat-deal-box-main .cdbm-title a{width:77%;font-size:1.2rem;padding-bottom:0;line-height:18px;min-height:18px}.cat-deal-color.main-cat .main-cat-deal-thumbnail .cds-item .cat-deal-box .cdbm-title a:before{position:absolute;font-family:netbarg;content:'\e97b';font-size:2.6rem;color:#00ae4d;right:0}@font-face{font-family:bitmeh;font-style:normal;font-weight:400;src:url('/assets/fonts/IRANSansWeb(FaNum)_Light.eot') format("embedded-opentype"),url('/assets/fonts/IRANSansWeb(FaNum)_Light.woff') format("woff"),url('/assets/fonts/IRANSansWeb(FaNum)_Light.woff2') format("woff2"),url('/assets/fonts/IRANSansWeb(FaNum)_Light.ttf') format("truetype")}#learning .items .item .img_box img{width:40%}#learning .items .item:hover .seemore{background:#2068e0 url(/assets/img/cta-arrow.png) no-repeat 10px center;color:#fff}#learning .items .item .text{display:block;height:75px;overflow:hidden;color:#fff}#learning .item a{display:block;height:100%}#learning .seemore{display:inline-block;padding:5px 15px;border-radius:28px;background:#f7f7f7;font-size:12px;margin-top:10px;color:#404040;border:1px solid #efefef}#learning .slick-dots{top:-65px}#learning .title{margin-bottom:20px}#learning .items .item .img_box img{width:40%}#learning .items .item:hover .seemore{background:#2068e0 url(/assets/img/cta-arrow.png) no-repeat 10px center;color:#fff}#learning .items .item .text{display:block;height:75px;overflow:hidden}#learning .item a{display:block;height:100%}#learning .seemore{display:inline-block;padding:5px 15px;border-radius:28px;background:#f7f7f7;font-size:12px;margin-top:10px;color:#404040;border:1px solid #efefef}#learning .slick-dots{top:-65px}#learning .title{margin-bottom:20px}#how_to_start,#learning{padding-bottom:120px;position:relative}#how_to_start .object,#learning .object{position:absolute;pointer-events:none}#how_to_start .object.one,#learning .object.one{width:25%;left:0;top:0}#how_to_start .object.two,#learning .object.two{right:0;width:15%;top:-100px}#how_to_start .title,#learning .title{margin-bottom:100px}#how_to_start .items,#learning .items{text-align:center}#how_to_start .items .item,#learning .items .item{background:#354bbb;position:relative;border-radius:39px;display:inline-block;padding:75px 19px 20px;width:19%;font-size:15px;height:180px;vertical-align:top;transition:all .5s ease;-webkit-transition:all .5s ease;-ms-transition:all .5s ease;-o-transition:all .5s ease;-moz-transition:all .5s ease;cursor:default}#how_to_start .items .item .img_box,#learning .items .item .img_box{width:83px;height:83px;border-radius:50%;background-color:#41d296;position:absolute;top:-40px;transition:all .2s ease;-webkit-transition:all .2s ease;-ms-transition:all .2s ease;-o-transition:all .2s ease;-moz-transition:all .2s ease;left:50%;transform:translate(-50%,0)}#how_to_start .items .item .img_box img,#learning .items .item .img_box img{width:50%;position:absolute;transform:translate(-50%,-50%);top:50%;left:50%}#how_to_start .items .item:hover,#learning .items .item:hover{transform:translateY(-10px)}#how_to_start .items .item:hover .img_box,#learning .items .item:hover .img_box{background-color:#2068e0}#how_to_start .items .item:hover a,#learning .items .item:hover a{color:#404040}#how_to_start .items .item:not(:last-child),#learning .items .item:not(:last-child){margin-left:2%}#brands{background:#01137c;padding:35px 0;text-align:center}#brands a{width:10%;height:61px;display:inline-block;background:#fff;vertical-align:top;border-radius:4px;position:relative}#brands a:not(:last-child){margin-left:10px}#brands a:hover img{-webkit-filter:grayscale(0);filter:grayscale(0)}#brands a img{position:absolute;top:50%;width:60%;left:50%;transition:all .2s ease;-webkit-transition:all .2s ease;-ms-transition:all .2s ease;-o-transition:all .2s ease;-moz-transition:all .2s ease;transform:translate(-50%,-50%);-webkit-filter:grayscale(100%);filter:grayscale(100%)}#brands a img.small{width:35%}ul li a .hidden-sm{color:#777!important;font-size:12px}</style>
    </head>

    <body class="loaded pace-done pace-done">

        <div class="navbar navbar-default no-padding-left no-padding-right">
            <div class="navbar-boxed container-fluid">
                <div class="navbar-collapse collapse" id="navbar-mobile">
                    <?php include('api/v1/page/nav.php'); ?>
                </div>
            </div>
        </div>
        <div class="doctor-profile-view">

            <div class="page-header">

                <div class="page-container">

                    <div class="page-content">

                        <div class="col-md-4">
                            <div class="wrapper-right">
                                <div class="booking-panel">
                                    <form action="javascript:;" id="reserve_doctor">
									    <input type="hidden" name="user_key" id="user_key" value="<?php echo $user_key_user; ?>" />
									    <input type="hidden" name="doctor_id" id="doctor_id" value="<?php echo $uid; ?>" />
                                        <div class="panel panel-flat no-border">
                                            <div class="category-title text-white text-bold no-border bg-pliro-secondary" style="padding-right: 0;">
                                                <span style="font-size:14px;text-align:center">ثبت نوبت</span>
                                            </div>
                                            <div class="panel-body ">
                                                <div class="text-mediumbold div_doctor_clinic">
                                                    <select name="doctor_clinic" id="doctor_clinic" class="select-location form-control input-xlg select2" style="height:50px;border-style:none;border:1px solid #efefef;font-size:12px">
                                                        <option value="">انتخاب مطب</option>
														<?php $clinic = explode('##',$doctor_address_clinic); ?>
														<?php for($i = 0 ; $i < count($clinic) - 1; $i++ ): ?>
                                                         <option><?php echo $clinic[$i]; ?></option>
														<?php endfor; ?>
                                                    </select>
                                                </div>
                                                <div class="text-mediumbold div_doctor_insurance" style="margin-top:20px">
                                                    <select id="doctor_insurance" name="doctor_insurance" class="select-location form-control input-xlg select2" style="height:50px;border-style:none;border:1px solid #efefef;font-size:12px">
                                                        <option value="">کدامیک از بیمه های زیر را دارید ؟</option>
                                                        <option>بیمه نیروهای مسلح</option>
                                                        <option>بیمه تکمیلی</option>
                                                        <option>بیمه تامین اجتماعی</option>
                                                        <option>هیچکدام</option>
                                                    </select>
                                                </div>
                                                <div class="text-mediumbold div_doctor_view" style="margin-top:20px">
                                                    <select id="doctor_view" name="doctor_view" class="select-location form-control input-xlg select2" style="height:50px;border-style:none;border:1px solid #efefef;font-size:12px">
                                                        <option value="">آیا قبلا دکتر  را ملاقات کرده اید ؟</option>
                                                        <option>خیر , بار اولم هست</option>
                                                        <option>بله , قبلا ویزیت شده ام</option>
                                                    </select>
                                                </div>
                                                <div class="text-mediumbold div_doctor_time" style="margin-top:20px;border:1px solid #ddd;border-radius:5px;padding:25px 0">

                                                    <div class="pagination-navbar navbar-default navbar-component" style="padding:0;margin:0">
                                                        <div class=" navbar-btn " style="margin: 10px 0px!important;">
                                                            <ul class="pagination pagination-flat pagination-rounded" style="display:flex;padding:0;">

                                                                <li class="disabled" style="display: flex; align-items: center;">
                                                                    <a onclick="GoDate('perv')" class="text-semibold" style="padding:0;">
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
            
                                                                <li style="display: flex; align-items: center;">
                                                                    <a onclick="GoDate('next')" class="text-semibold" style="padding:0;">
                                                                        <img src="/assets/img/arrow-left.png" style="width:30px" />
                                                                    </a>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>
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
                                                    <div class="search-result-item">

                                                        <div class="text-nowrap">
                                                            <div class="text-mediumbold">
                                                                <div class="select-location form-control input-xlg datapicker" style="min-height:200px;border-style:none;font-size:12px;padding:0;width:90%;margin:0 auto">
                                                                    
                                                                </div>
																<div style="clear:both"></div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="text-mediumbold div_doctor_reson" style="margin-top:20px">
                                                        <select name="doctor_reson" id="doctor_reson" class="select-location form-control input-xlg select2" style="height:50px;border-style:none;border:1px solid #efefef;font-size:12px">
                                                            <option value="">دلیل ویزیت شما ؟</option>
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
                                                <div class="form-group text-right" style="margin-top:20px;font-size:13px;color:#222" id="priceval">
												 
												</div>
                                                <div class="form-group text-right" style="margin-top:20px">
                                                    <button class="btn btn-block btn-pliro-secondary text-bold fs-button-apt-book-profile" style="height:45px" onclick="AddOrder()">
                                                     ثبت نوبت
                                                    </button>
                                                </div>
												<div class="form-group text-right" style="margin-top:20px;font-size:13px;color:#222" id="ErrorMsg">
												 
												</div>

                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!--<div class="panel">
                                    <div class="category-title bg-pliro no-border">
                                        <span>موقعیت</span>
                                    </div>
                                    <div class="panel-body " style="padding:0">
                                        <app-google-map>
                                            <div class="map" style="position: relative; overflow: hidden;">
                                                <div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);">
                                                </div>
                                            </div>
                                        </app-google-map>
                                    </div>

                                </div>-->

                                <!--<div class="content-group-sm bg-white">
                                    <div class="category-title text-white text-bold no-border bg-pliro-secondary" style="padding-right: 0;">
                                                <span style="font-size:14px;text-align:center">ثبت نظر</span>
                                            </div>
                                    <div class="panel-body">
                                        <form novalidate="" class="ng-untouched ng-pristine ng-invalid">
                                            <div class="input-section">
                                                <div class="form-group">
                                                    <label>نام و نام خانوادگی</label>
                                                    <app-text placeholder="e.g Muhammad Ali" _nghost-c0="">
                                                        <input _ngcontent-c0="" class="form-control ng-untouched ng-pristine ng-invalid" type="text" placeholder="نام و نام خانوادگی" maxlength="10000">
                                                        
                                                    </app-text>
                                                </div>
                                                <div class="form-group">
                                                    <label>شماره همراه</label>
                                                    <app-phone-number>
                                                        <input class="form-control format-phone-number ng-untouched ng-pristine ng-invalid" pattern="(0|92|0092|\+92)?[3][0-4]{1}[0-9]{8}" placeholder="شماره همراه" type="text">

                                                        
                                                    </app-phone-number>
                                                </div>
                                                <div class="form-group">
                                                    <label>پیام</label>
                                                    <textarea class="form-control ng-untouched ng-pristine ng-invalid" cols="3" formcontrolname="comment" placeholder="پیام خود را وارد کنید" rows="3"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <app-editable-rating fillcolor="#02c773" formcontrolname="ratingvalue" ngdefaultcontrol="" class="ng-untouched ng-pristine ng-valid">
                                                        <div class="rating rating-control">
                                                            <span>
        <span style="color: rgb(2, 199, 115);">
                   <i class="icon-star-empty3"></i>
        </span>
                                                            </span><span class="star">
        <span style="color: rgb(2, 199, 115);">
                   <i class="icon-star-empty3"></i>
        </span>
                                                            
                                                            </span><span class="star">
        <span style="color: rgb(2, 199, 115);">
                   <i class="icon-star-empty3"></i>
        </span>
                                                            
                                                            </span><span class="star">
        <span style="color: rgb(2, 199, 115);">
                   <i class="icon-star-empty3"></i>
        </span>
                                                            
                                                            </span><span class="star">
        <span style="color: rgb(2, 199, 115);">
                   <i class="icon-star-empty3"></i>
        </span>
                                                            
                                                            </span>
                                                        </div>
                                                    </app-editable-rating>
                                                    <label class="display-block" style="clear: both">رتبه </label>
                                                </div>

                                                <div class="form-group text-right">
                                                    <button class="btn btn-block btn-pliro-secondary text-bold" type="button" disabled="">
                                                        ارسال نظر بعد از ثبت نوبت فعال میشود
                                                        <app-spinner><i class="spinner position-left"></i> </app-spinner>
                                                    </button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>-->

                            </div>

                        </div>

                        <div class="col-md-8">

                            <div class="media stack-media-on-mobile">

                                <div class="media-left">
                                    <a class="profile-thumb">
                                        <img class="img-profile img-md" src="/moderator/files/profile_images/<?php echo $image_doctor; ?>">
                                    </a>
                                </div>

                                <div class="media-body">
                                    <h1 class="text-white mb-5"><?php echo $first_name_doctor.' '.$last_name_doctor; ?></h1>
                                    <small class="label bg-indigo-800"><?php echo $job_user_doctor; ?></small>
                                    
                                </div>

                                <!--<div class="media-middle media-right text-right">

                                    <div>
                                        <meta itemprop="ratingValue" content="0">
                                        <meta content="1" itemprop="worstRating">
                                        <meta itemprop="bestRating" content="5">
                                        <meta itemprop="reviewCount" content="0">
                                    </div><a class="bg-white border-white label label-icon-xs mr-5 text-pliro-secondary">
                پنج ستاره
                <i class="icon-star-full2 text-size-small"></i>
              </a>
                                    <small class="label label-icon-xs">1 نظر</small>
                                </div>-->

                            </div>

                            <div class="wrapper-left">
                                <div class="container-fluid">
                                    <div class="row">
                                        
                                        <div class="panel no-padding">
                                            <div class="panel-body pt-20">
                                                
                                                <div class="content-group no-margin">
                                                    <p class="no-margin">
													 <h5 class="text-pliro text-bold">مشخصات پزشک</h5>
													 <pre style="padding:0;margin:0;border-style:none;background:transparent;text-align:right;font-family:'bitmeh';line-height:30px"><?php echo $doctor_comment; ?>
													 </pre>
                                                    </p>
                                                </div>
												
                                                    <!---->
                                                    <div class="content-group no-margin">
                                                        <h5 class="text-pliro text-bold">شرایط استفاده</h5>
                                                        <!----><small><a><!----><span class="speciality-label speciality-mint">
تاریخ استفاده: از 1398/9/7 تا 1398/9/27<br>
نیاز به هیچگونه رزرو نیست.<br>
حداقل ۵ ساعت پیش از مراجعه می بایست خرید انجام شده باشد،‌ در غیر این صورت مجموعه توچال از سرویس دهی معذور است.
برای اطمینان از ساعات کاری مجموعه به سایت توچال مراجعه کنید.<br>
لطفا جهت دریافت بلیط به گیشه تله سیژ مراجعه و کد تخفیفان خود را اعلام کنید.<br>
ورود کودکان زیر ۵ سال رایگان است.<br>
در صورت شرایط جوی نامساعد و تکمیل ظرفیت توچال از ارائه سرویس معذور است،  لطفا در روزهای دیگر از کوپن تخفیفان استفاده کنید.
</span><!----><!----></a></small></div>
												
												
                                            </div>
                                        </div>
                                        <div class="panel no-padding">
                                            <div class="panel-body">
                                                <div class="content-group no-margin pb-10 pt-20">
                                                    <h5 class="text-pliro text-bold">نظرات</h5></div>
                                                <hr class="no-margin">
												<div class="content-group no-margin pb-20 pt-20">
												 هنوز نظری ثبت نشده است !
												</div>
                                                <!--<div class="content-group no-margin pb-20 pt-20">
												<a class="btn initial-btn btn-rounded btn-icon btn-xs"><span class="letter-icon text-bold" itemprop="author">V</span></a><span class="text-pliro text-bold">مهری طهماسبی</span><span class="media-annotation text-bold"> ۱۳۹۸/۸/۳۰ - ۱۳:۵۱</span><span class="pull-left" itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating"><meta itemprop="ratingValue" content="5"><meta content="0" itemprop="worstRating"><meta itemprop="bestRating" content="5"><app-rating><div class="text-nowrap"><i class="icon-star-empty3 text-size-base text-warning-300 icon-star-full2"></i><i class="icon-star-empty3 text-size-base text-warning-300 icon-star-full2"></i><i class="icon-star-empty3 text-size-base text-warning-300 icon-star-full2"></i><i class="icon-star-empty3 text-size-base text-warning-300 icon-star-full2"></i><i class="icon-star-empty3 text-size-base text-warning-300 icon-star-full2"></i></div></app-rating></span>
                                                    <p>خیلی دکتر خوبی هستند انشالله همیشه موفق باشند</p>
                                                </div>-->
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div style="clear:both;width:100%;height:20px"></div>
                <?php include('api/v1/page/footer.php'); ?>
            </div>

            <div class="navbar sub-header-nav">
                <div class="col-md-8" style="float:right">
                    <div class="media stack-media-on-mobile">
                        <div class="media-left" style="padding-left: 160px;"></div>
                        <div class="media-body">
                            <p class="navbar-text pl-5" style="text-align:right;float:right">
							 <?php echo $clinic[0]; ?>
							</p>
						</div>
                        
                    </div>
                </div>

            </div>

        </div>
        <script src="/assets/js/jquery.number.min.js"></script>
        <script src="/assets/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.select2').select2();
            })
        </script>
		<script>
		 var TimeGo = '<?php echo date("Y-m-d"); ?>';
		 var TimeGoLev = 0;
		 var final_price = 0;
		 var time_order = '';
		 var date_order = '';
		 var product_id = '';
         $(document).ready(function() {
          var s = '';
		  var time = '<?php echo date("Y-m-d"); ?>';
		  var time1 = "<?php echo date('Y-m-d',strtotime(date('Y-m-d').'+1 days')); ?>";
		  var time2 = "<?php echo date('Y-m-d',strtotime(date('Y-m-d').'+2 days')); ?>";
          $.ajax({
            type: "GET",
			data:'id=<?php echo $uid; ?>&time='+time,
            url: "/api/v1/search/detail",
            success: function(msg) {
                for (var i = 0; i < msg.length; i++) {
					var d=0,d1=0,d2=0;
					$('.doctor_name').html(msg[i].name)
					$('.comment_doctor').html(msg[i].comment)
					$('.img_doctor').attr('src',msg[i].image)
					var t1 = msg[i].times.split('$$');
                    s = s +
					
					'<div style="float:right;width:33.33%;display: flex; justify-content: center; flex-direction: column;">';
					for(var j = 0; j < t1.length - 1; j++){
					 var t2 = t1[j].split('#');
					  if(t2[1] == time){
					    s = s +'<div id="set' + t2[2] + '" onclick="SetTime(&apos;' + t2[2] + '&apos;,&apos;' + t2[3] + '&apos;,&apos;' + t2[4] + '&apos;,&apos;' + t2[5] + '&apos;,&apos;' + time + '&apos;,&apos;' + t2[0] + '&apos;,&apos;' + t2[2] + '&apos;)" class="select-location form-control input-xlg settime" style="height:40px;border-style:none;font-size:12px;float:right;width:80%;line-height:20px;cursor:pointer;border-radius:0;margin:5px auto;padding-right: 0;padding-left: 0;text-align:center;background-color:#fff;color:#333;direction:rtl;border-radius:5px;border:1px solid #efefef"> '+t2[0]+'</div>';
						d ++;
					  }
					}
					for(var j = 0; j < 6 - d; j++){
					    s = s +'<div class="select-location form-control input-xlg" style="height:40px;border-style:none;font-size:20px;float:right;width:80%;line-height:20px;cursor:pointer;border-radius:0;margin:5px auto;padding-right: 0;padding-left: 0;text-align:center;background-color:#fff;color:#333;direction:rtl;border-radius:5px;border:1px solid #efefef"> - </div>';
					}
					s = s +'</div>'+
					
					'<div style="float:right;width:33.33%;display: flex; justify-content: center; flex-direction: column;">';
					for(var j = 0; j < t1.length - 1; j++){
					 var t2 = t1[j].split('#');
					  if(t2[1] == time1){
					    s = s +'<div id="set' + t2[2] + '" class="select-location form-control input-xlg settime" onclick="SetTime(&apos;' + t2[2] + '&apos;,&apos;' + t2[3] + '&apos;,&apos;' + t2[4] + '&apos;,&apos;' + t2[5] + '&apos;,&apos;' + time + '&apos;,&apos;' + t2[0] + '&apos;,&apos;' + t2[2] + '&apos;)" style="height:40px;border-style:none;font-size:12px;float:right;width:80%;line-height:20px;cursor:pointer;border-radius:0;margin:5px auto;padding-right: 0;padding-left: 0;text-align:center;background-color:#fff;color:#333;direction:rtl;border-radius:5px;border:1px solid #efefef"> '+t2[0]+'</div>';
						d1 ++;
					  }
					}
					for(var j = 0; j < 6 - d1; j++){
					    s = s +'<div class="select-location form-control input-xlg" style="height:40px;border-style:none;font-size:20px;float:right;width:80%;line-height:20px;cursor:pointer;border-radius:0;margin:5px auto;padding-right: 0;padding-left: 0;text-align:center;background-color:#fff;color:#333;direction:rtl;border-radius:5px;border:1px solid #efefef"> - </div>';
					}
					s = s +'</div>'+
					
					'<div style="float:right;width:33.33%;display: flex; justify-content: center; flex-direction: column;">';
					for(var j = 0; j < t1.length - 1; j++){
					 var t2 = t1[j].split('#');
					  if(t2[1] == time2){
					    s = s +'<div id="set' + t2[2] + '" class="select-location form-control input-xlg settime" onclick="SetTime(&apos;' + t2[2] + '&apos;,&apos;' + t2[3] + '&apos;,&apos;' + t2[4] + '&apos;,&apos;' + t2[5] + '&apos;,&apos;' + time + '&apos;,&apos;' + t2[0] + '&apos;,&apos;' + t2[2] + '&apos;)" style="height:40px;border-style:none;font-size:12px;float:right;width:80%;line-height:20px;cursor:pointer;border-radius:0;margin:5px auto;padding-right: 0;padding-left: 0;text-align:center;background-color:#fff;color:#333;direction:rtl;border-radius:5px;border:1px solid #efefef"> '+t2[0]+'</div>';
						d2 ++;
					  }
					}
					for(var j = 0; j < 6 - d2; j++){
					    s = s +'<div class="select-location form-control input-xlg" style="height:40px;border-style:none;font-size:20px;float:right;width:80%;line-height:20px;cursor:pointer;border-radius:0;margin:5px auto;padding-right: 0;padding-left: 0;text-align:center;background-color:#fff;color:#333;direction:rtl;border-radius:5px;border:1px solid #efefef"> - </div>';
					}
					s = s +'</div>';
					
                }
                
				$('.datapicker').html(s)
            }
          })
         });
		 function GoDate(type){
		  if(type =='next'){
			TimeGoLev = TimeGoLev + 3;
			var d = '+'+TimeGoLev+' days';
			//TimeGo = "<?php echo date('Y-m-d',strtotime(date('Y-m-d').'+6 days')); ?>";
			var d = new Date();
            var n = d.getDate() + 6;
		  }else{
			  
		  }
		 }
		 function AddOrder(){
		  <?php if($user_key_user): ?>
		   var isok = 1;
		   var form = $('#reserve_doctor').serialize();
		   var doctor_view=$('#doctor_view').val();
		   var doctor_clinic=$('#doctor_clinic').val();
		   var doctor_insurance=$('#doctor_insurance').val();
		   var doctor_reson=$('#doctor_reson').val();
		   
		   $('.div_doctor_time').css('border','1px solid #ddd')
		   $('.text-mediumbold .select2-selection').css('border','1px solid #ddd')
		   
		   if(!product_id){$('.div_doctor_time').css('border','1px solid #f00');isok=0;}
		   if(!doctor_view){$('.div_doctor_view .select2-selection').css('border','1px solid #f00');isok=0;}
		   if(!doctor_clinic){$('.div_doctor_clinic .select2-selection').css('border','1px solid #f00');isok=0;}
		   if(!doctor_insurance){$('.div_doctor_insurance .select2-selection').css('border','1px solid #f00');isok=0;}
		   if(!doctor_reson){$('.div_doctor_reson .select2-selection').css('border','1px solid #f00');isok=0;}
		   
		   if(isok == 0){
			  $('#ErrorMsg').html('تمام موارد را کامل کنید !');
		   }else{
			  $('#ErrorMsg').html(''); 
			  $.ajax({
               type: "POST",
			   data:form+"&time_order="+time_order+"&date_order="+date_order+"&price="+final_price+"&product_id="+product_id,
               url: "/api/v1/order/AddOrder",
               success: function(msg) {
			    //window.location = 'https://iransavclub.com/bank/doctor_send.php?price='+final_price+"&factor="+msg;
			   }
		      })
		   }
		   <?php else: ?>
		    OpenmodalLogin('/');
		   <?php endif; ?>
		 }
		 function SetTime(id,price,comment,payment_method,dateorder,timeorder,productid) {
          $('.settime').css('background-color', '#949292').css('color', '#fff')
          $('#set' + id).css('background-color', '#02c773').css('color', '#fff')
          $('#priceval').html('<div style="width:100%;height:40px"><span style="font-weight:bold">تعرفه : </span><span style="float:left">'+$.number(price)+' تومان</span></div><div style="width:100%;height:40px"><span style="font-weight:bold">توضیحات : </span><span style="float:left">'+comment+'</span></div><div style="width:100%;height:40px"><span style="font-weight:bold">نحوه پرداخت : </span><span style="float:left">'+payment_method+'</span></div>')
		  final_price = price;
		  time_order = timeorder;
		  date_order = dateorder;
		  product_id = productid;
         }
        </script>
    </body>

    </html>