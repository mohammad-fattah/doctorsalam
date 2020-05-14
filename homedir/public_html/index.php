<?php include('api/v1/settings/Header.php'); ?>
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
    <style type="text/css">
	.fancybox-margin{margin-right:17px}.cat-deal-color.main-cat .main-cat-deal-thumbnail .cds-item .cat-deal-box .cat-deal-box-main{margin-top:17px}.btn-group-vertical>.btn-group:after,.btn-group-vertical>.btn-group:before,.btn-toolbar:after,.btn-toolbar:before,.clearfix:after,.clearfix:before,.container-fluid:after,.container-fluid:before,.container:after,.container:before,.dl-horizontal dd:after,.dl-horizontal dd:before,.form-horizontal .form-group:after,.form-horizontal .form-group:before,.modal-footer:after,.modal-footer:before,.modal-header:after,.modal-header:before,.nav:after,.nav:before,.navbar-collapse:after,.navbar-collapse:before,.navbar-header:after,.navbar-header:before,.navbar:after,.navbar:before,.pager:after,.pager:before,.panel-body:after,.panel-body:before,.row:after,.row:before{content:" ";display:table}.cat-deal-color .main-row .cat-deal-smallbox .cat-deal-box-main .cdbm-title{margin-top:0;padding-top:0;line-height:1;margin-bottom:4px}.cat-deal-color .main-row .cat-deal-box .cat-deal-box-main .cdbm-title{margin:15px 0 3px}.cat-deal-color.main-cat .main-cat-deal-thumbnail .cds-item .cat-deal-box .cdbm-title a{font-size:1.4rem;width:80%;padding-bottom:1px;position:relative;padding-right:32px}.cat-deal-color .main-row .cat-deal-smallbox .cat-deal-box-main .cdbm-title a{width:77%;font-size:1.2rem;padding-bottom:0;line-height:18px;min-height:18px}.cat-deal-color.main-cat .main-cat-deal-thumbnail .cds-item .cat-deal-box .cdbm-title a:before{position:absolute;font-family:netbarg;content:'\e97b';font-size:2.6rem;color:#00ae4d;right:0}@font-face{font-family:bitmeh;font-style:normal;font-weight:400;src:url('/assets/fonts/IRANSansWeb(FaNum)_Light.eot') format("embedded-opentype"),url('/assets/fonts/IRANSansWeb(FaNum)_Light.woff') format("woff"),url('/assets/fonts/IRANSansWeb(FaNum)_Light.woff2') format("woff2"),url('/assets/fonts/IRANSansWeb(FaNum)_Light.ttf') format("truetype")}#learning .items .item .img_box img{width:40%}#learning .items .item:hover .seemore{background:#2068e0 url(/assets/img/cta-arrow.png) no-repeat 10px center;color:#fff}#learning .items .item .text{display:block;height:75px;overflow:hidden;color:#fff}#learning .item a{display:block;height:100%}#learning .seemore{display:inline-block;padding:5px 15px;border-radius:28px;background:#f7f7f7;font-size:12px;margin-top:10px;color:#404040;border:1px solid #efefef}#learning .slick-dots{top:-65px}#learning .title{margin-bottom:20px}#learning .items .item .img_box img{width:40%}#learning .items .item:hover .seemore{background:#2068e0 url(/assets/img/cta-arrow.png) no-repeat 10px center;color:#fff}#learning .items .item .text{display:block;height:75px;overflow:hidden}#learning .item a{display:block;height:100%}#learning .seemore{display:inline-block;padding:5px 15px;border-radius:28px;background:#f7f7f7;font-size:12px;margin-top:10px;color:#404040;border:1px solid #efefef}#learning .slick-dots{top:-65px}#learning .title{margin-bottom:20px}#how_to_start,#learning{padding-bottom:120px;position:relative}#how_to_start .object,#learning .object{position:absolute;pointer-events:none}#how_to_start .object.one,#learning .object.one{width:25%;left:0;top:0}#how_to_start .object.two,#learning .object.two{right:0;width:15%;top:-100px}#how_to_start .title,#learning .title{margin-bottom:100px}#how_to_start .items,#learning .items{text-align:center}#how_to_start .items .item,#learning .items .item{background:#354bbb;position:relative;border-radius:39px;display:inline-block;padding:75px 19px 20px;width:19%;font-size:15px;height:180px;vertical-align:top;transition:all .5s ease;-webkit-transition:all .5s ease;-ms-transition:all .5s ease;-o-transition:all .5s ease;-moz-transition:all .5s ease;cursor:default}#how_to_start .items .item .img_box,#learning .items .item .img_box{width:83px;height:83px;border-radius:50%;background-color:#41d296;position:absolute;top:-40px;transition:all .2s ease;-webkit-transition:all .2s ease;-ms-transition:all .2s ease;-o-transition:all .2s ease;-moz-transition:all .2s ease;left:50%;transform:translate(-50%,0)}#how_to_start .items .item .img_box img,#learning .items .item .img_box img{width:50%;position:absolute;transform:translate(-50%,-50%);top:50%;left:50%}#how_to_start .items .item:hover,#learning .items .item:hover{transform:translateY(-10px)}#how_to_start .items .item:hover .img_box,#learning .items .item:hover .img_box{background-color:#2068e0}#how_to_start .items .item:hover a,#learning .items .item:hover a{color:#404040}#how_to_start .items .item:not(:last-child),#learning .items .item:not(:last-child){margin-left:2%}#brands{background:#01137c;padding:35px 0;text-align:center}#brands a{width:10%;height:61px;display:inline-block;background:#fff;vertical-align:top;border-radius:4px;position:relative}#brands a:not(:last-child){margin-left:10px}#brands a:hover img{-webkit-filter:grayscale(0);filter:grayscale(0)}#brands a img{position:absolute;top:50%;width:60%;left:50%;transition:all .2s ease;-webkit-transition:all .2s ease;-ms-transition:all .2s ease;-o-transition:all .2s ease;-moz-transition:all .2s ease;transform:translate(-50%,-50%);-webkit-filter:grayscale(100%);filter:grayscale(100%)}#brands a img.small{width:35%}
	.section{padding-bottom:40px}.section-title-main{text-align:center;margin:0 0 30px;padding:0 20px;display:block;width:100%}.section-title-text{font-size:22px;font-weight:700;color:#ed1846;margin:0 0 10px}.section-title-explain{font-size:14px;color:#373941;font-weight:400;margin:0}.section-header{margin:0 0 20px 0;display:block;width:100%;padding:0 20px 0 20px}.section-title{font-size:16px;font-weight:700;color:#032133;display:block;text-align:center}.section-explain{font-size:12px;font-weight:400;text-align:right;color:#03273c;margin:0;display:inline-block}.section-body{width:100%;padding:0 20px 0 0}section#bank-drug .section-title-main,section#bank-germ .section-title-main{margin-top:60px}@media screen and (max-width:350px){.section-header{padding:0 20px 0 5px}.section-explain{font-size:11px}}@media screen and (min-width:768px){.section-title{font-size:25px}.section-explain{font-size:16px;margin:3px 0 0 0}.show-more{font-size:12px;height:32px;padding:4px 20px;text-align:center;top:5px}}@media screen and (min-width:1200px) and (max-width:1400px){.section-title{font-size:23px}}.wide-bnt{display:block;width:100%;clear:both}.red-secondry-btn{background-color:#fff;color:#ed1846;border:1px solid #ed1846}
	
	.content-search-name>span{font-size:16px}.content-search-name .content-search-explanation{font-size:13px}.search-rslt-cptn>label{font-size:14px}.search-rslt-list>li{padding:0 20px 20px}.search-rslt-list>li.search-rslt-cptn{padding:15px 20px 20px}.content-search-image i{width:12px;height:12px}.expertise-search-name a.content-search-name>label{font-size:15px}.expertise-search-name a.content-search-name>div>span.red-text{font-size:13px}.expertise-search-name a.content-search-name>div>span{font-size:13px}.show-more-expertise{width:8px;height:8px;margin:0 8px 0 0;top:-6px}.search-box-opacity{display:none;visibility:hidden}.search-typing-icon{width:24px;height:24px;background-size:10px;left:20px;top:19px;padding:3px 0 0 0}.search-typing-icon.icon-close:before{font-size:10px}}.above-page-img{min-height:420px;max-height:420px}.above-page-content{padding:80px 7px 40px 7px}.above-page-search{margin:80px auto 0 auto}@media screen and (max-width:359px){.above-page-content{padding:56px 7px 40px 7px}}#services .section-body{white-space:nowrap;overflow-x:scroll;padding:0 0px 27px 0}#services .section-body::-webkit-scrollbar{display:none;visibility:hidden}#services .section-body::-webkit-scrollbar-track{display:none;visibility:hidden}#services .section-body::-webkit-scrollbar-thumb{display:none;visibility:hidden}.sevice-list-item>a{display:block}.sevice-list .sevice-list-item{-ms-border-radius:20px;-moz-border-radius:20px;-webkit-border-radius:20px;border-radius:20px;background-color:#fff;-ms-box-shadow:0 10px 20px 0 rgba(0,0,0,.09);-moz-box-shadow:0 10px 20px 0 rgba(0,0,0,.09);-webkit-box-shadow:0 10px 20px 0 rgba(0,0,0,.09);box-shadow:0 10px 20px 0 rgba(0,0,0,.09);text-align:center;padding:18px 10px}.sevice-list-item{margin-left:23px;margin-right:0;height:auto;display:inline-block;-ms-border-radius:20px;-moz-border-radius:20px;-webkit-border-radius:20px;border-radius:20px;-ms-box-shadow:0 10px 20px 0 rgba(0,0,0,.09);-moz-box-shadow:0 10px 20px 0 rgba(0,0,0,.09);-webkit-box-shadow:0 10px 20px 0 rgba(0,0,0,.09);box-shadow:0 10px 20px 0 rgba(0,0,0,.09);padding:17px;background-color:#fff;width:136px;height:136px;text-align:center}.sevice-list-item:last-child{margin-left:0}.service-icon{width:58px;height:58px;display:block;background-size:57px}.service-icon>i{width:100%}.service-title{font-size:12px;font-weight:700;font-style:normal;color:#031f30;margin:14px 0 3px;white-space:nowrap}.service-explaine{font-size:9px;font-weight:300;color:#193a4d;margin:0;white-space:nowrap}.consultation-service .service-icon{background-image:url(/assets/img/consultation-icon.svg)}.booking-service .service-icon{background-image:url(/assets/img/booking-icon.svg)}.bank-service .service-icon{background-image:url(/assets/img/healthbank-icon.svg)}.blog-service .service-icon{background-image:url("/assets/img/Health blog-icon.svg")}@media screen and (min-width:768px){#services .section-body{text-align:center;padding:10px 20px 27px 0}.sevice-list-item{-ms-border-radius:50px;-moz-border-radius:50px;-webkit-border-radius:50px;border-radius:50px;padding:30px 20px 30px 20px;width:240px;margin-left:43px;height:235px}.service-icon{width:100px;height:100px;background-size:100px;margin:0 auto 27px!important}.service-title{font-size:16px;margin:14px 0 4px}.service-explaine{font-size:12px}}
	.sevice-list-item{margin-left:25px}
	</style>
</head>
<body class="loaded pace-done">
	<?php if($title_lottery): ?>
        <div style="width: 100%; height:50px; background-color: #fcd643;padding-top:0;direction:rtl">
            <div class="container" style="text-align:center;display: flex; justify-content: center; align-items: center; height: 50px;">
                <span style="color:white;text-align:right;color:#333;font-size:14px">
                  <?php echo $title_lottery; ?>
				  <?php if($lowest_score): ?>
				   <a class=" btn btn-flat btn-xs navbar-btn btn-pliro border-pliro" href="<?php echo $prize; ?>"></i><?php echo $lowest_score; ?></a>
				  <?php endif; ?>
                </span>
            </div>
        </div>
     <?php endif; ?>

	 <div class="container-fluid home">
                <header class="section-cover no-padding">

                        <div class="navbar navbar-default navbar-transparent">
                            <div class="navbar-boxed container-fluid">
                                <div class="navbar-collapse collapse" id="navbar-mobile">
                                  <?php include('api/v1/page/nav.php'); ?>
                                </div>
                            </div>
                        </div>

                    <div class="content">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="content-group-sm text-white" style="margin-top:90px">
                                <div class="search-header text-center mb-20">
                                    <h1 class="header-title"><?php echo $site_name; ?> !</h1>
                                    <h4 class="no-margin text-light header-subtitle">
                                     <span class="text-regular" style="font-size:14px">
									   رزرو قرار ملاقات پزشک ، آزمایش های تشخیصی و خدمات پزشکی ساده است
									 </span>
                                    </h4>
                                </div>
                                    <div class="main-search">
                                        <div class="row">
										 <?php include('api/v1/page/main-form.php'); ?>
										</div>
                                    </div>
                            </div>

                        </div>

                    </div>
                </header>
				<section id="services" class="section" style="padding-top:120px;">
    <div class="container">
        <div class="row">
            <div class="section-header" style="margin-bottom:50px">
                <label class="section-title"> چه خدماتی به شما ارائه می دهیم؟ </label>
            </div>
            <div class="section-body">
                <nav>
                    <div class="sevice-list-item consultation-service top-interaction-box-transform">
                        <a href="/search?status=onine" title="مشاوره آنلاین پزشکی">
                            <section style="padding:0!important"><i class="service-icon m-auto img-bg"> </i>
                                <h2 class="service-title">مشاوره آنلاین</h2>
                                <p class="service-explaine">گفتگو متنی و تلفنی</p>
                            </section>
                        </a>
                    </div>
                    <div class="sevice-list-item booking-service top-interaction-box-transform">
                        <a href="/search?status=offline" title="نوبت دهی آنلاین">
                            <section style="padding:0!important"><i class="service-icon m-auto img-bg"> </i>
                                <h2 class="service-title">نوبت دهی آنلاین</h2>
                                <p class="service-explaine">رزرو تاریخ و ساعت نوبت</p>
                            </section>
                        </a>
                    </div>
                    <div class="sevice-list-item bank-service top-interaction-box-transform">
                        <a href="/place" title="بانک سلامت">
                            <section style="padding:0!important"><i class="service-icon m-auto img-bg"> <i></i> </i>
                                <h2 class="service-title">بانک سلامت</h2>
                                <p class="service-explaine">اطلاعات مراکز درمانی، بیماری و دارو</p>
                            </section>
                        </a>
                    </div>
                    <div class="sevice-list-item blog-service top-interaction-box-transform">
                        <a href="/blog" title="دانستنی های سلامت">
                            <section style="padding:0!important"><i class="service-icon m-auto img-bg"> <i></i> </i>
                                <h2 class="service-title">دانستنی های سلامت</h2>
                                <p class="service-explaine">ویدئو و پادکست سلامت</p>
                            </section>
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>
                <section class="section-services" style="padding:80px 0 50px">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <h2 class="section-title" style="text-align:center"><?php echo $site_name; ?> کمک می کند تا زودتر خوب شوید !</h2>
                            <p class="section-subtitle p-20 pt-5">بهترین متخصصان یا خدمات پزشکی را جستجو کنید و با چند کلیک ساده زمان مناسب انتخاب کنید و بلافاصله رزرو کنید</p>
                        </div>
                    </div>
                    <div class="container">
                        <div class="tiles">
                            <div class="col-md-4">
                                <div class="service-tile">
                                    <div class="panel-body text-center">
                                        <div class="thumb thumb-rounded"><img alt="Search Doctor | Our platform is available round the clock" applazyload="" src="/assets/img/01.search-doctors.png"></div>
                                        <h5 class="text-semibold text-grey">24 ساعته در دسترسیم</h5>
                                        <p class="content-group text-muted text-semibold">بدون انتظار پلتفرم ما بصورت شبانه روزی در دسترس است</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="service-tile">
                                    <div class="panel-body text-center">
                                        <div class="thumb thumb-rounded"><img alt="Best Practice | Based on location, schedule and reviews" applazyload="" src="/assets/img/02.best-practice.png"></div>
                                        <h5 class="text-semibold text-grey">بهترین متخصص را انتخاب کنید</h5>
                                        <p class="content-group text-muted text-semibold"> بر اساس مکان پزشک ، برنامه و نظرات تایید شده , بهترین تصمیم را بگیرید</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="service-tile">
                                    <div class="panel-body text-center">
                                        <div class="thumb thumb-rounded"><img alt="Book Appointment | Click to book most convenient time" applazyload="" src="/assets/img/03.book-appointment.png"></div>
                                        <h5 class="text-semibold text-grey">راحت رزرو کنید</h5>
                                        <p class="content-group text-muted text-semibold">با یک کلیک راحت ترین زمان را انتخاب کنید</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="section-features" style="background-color: #f9f9f9;">
                    <div class="container">
                        <div class="row" >
                           
                            <section id="services" class="section" style="padding:30px 0 0;">
    <div class="container">
        <div class="row">
            <div class="section-header" style="margin-bottom:25px">
                <label class="section-title">بهترین پزشکان و کلینیک‌های <?php echo $site_name; ?></label>
				<p style="font-size:14px;text-align:center">مشاوره متنی و تلفنی و حضوری با مشاوران برتر <?php echo $site_name; ?></p>
            </div>
            <div class="section-body" style="padding:10px 0px 27px 0">
                <nav id="navdoctor">
			   </nav>
            </div>
        </div>
    </div>
</section>
							
                        </div>
                    </div>
                </section>

                <section class="section-features" style="padding:0">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-6 col-sm-6 col-xs-12">
                              <div class="col-md-10 col-sm-10 col-xs-12">
                                <div class="content-group p-20"><img class="img-responsive" src="/assets/img/02.leading-healthcare-provider.png" style="padding:40px 20px 0"></div>
                              </div>
                            </div>
                            <div class="col-md-6 col-md-offset-6 col-sm-6 col-xs-6" style="display: flex; justify-content: center; flex-direction: column;align-items:center;height:450px">
                                <div class="content-group col-md-8">
                                    <div class="content-group-sm">
                                        <h2 class="feature-title no-margin"> پیشرو در ارائه دهندگان خدمات بهداشتی .</h2></div>
                                    <ul class="feature-list list list-icons" style="padding:0">
                                        <li class="text-muted text-semibold"><i class="icon-checkmark3 text-success position-left"></i> حضور آنلاین ایجاد کنید </li>
                                        <li class="text-muted text-semibold"><i class="icon-checkmark3 text-success position-left"></i> قرار ملاقات ها را مدیریت کنید </li>
                                        <li class="text-muted text-semibold"><i class="icon-checkmark3 text-success position-left"></i> سوابق بیمار را مدیریت کنید</li>
                                        <li class="text-muted text-semibold"><i class="icon-checkmark3 text-success position-left"></i> صورتحساب و صورتحساب را مدیریت کنید</li>
                                    </ul>
									<div class="btn-group"><a class="btn btn-primary btn-labeled text-semibold" style="float:right" href="/features"><b><i class="icon-paperplane"></i></b> بیشتر بخوانید </a></div>
                                </div>
                            </div>
                            <div class="visible-xs col-xs-12">
                                <div class="content-group p-20 "><img alt="Leading Health Care Provider" class="img-responsive"></div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="section-features" style="background-color: #f9f9f9;padding:0">
                    <div class="container">
                        <div class="row" >
                            <div class="col-md-6 col-md-offset-6 col-sm-6 col-xs-6" style="display: flex; justify-content: center; flex-direction: column;align-items:center;height:450px">
                                <div class="content-group col-md-8">
                                    <div class="content-group-sm">
                                        <h2 class="feature-title no-margin"> اپلیکیشن <span class="text-grey-800"> <?php echo $site_name; ?></span></h2></div>
                                    <ul class="feature-list list list-icons" style="padding:0">
                                        <li class="text-muted text-semibold"><i class="icon-checkmark3 text-success position-left"></i> از پزشکان واقعی به صورت آنلاین سؤال کنید </li>
                                        <li class="text-muted text-semibold"><i class="icon-checkmark3 text-success position-left"></i> نکات بهداشتی را بخوانید </li>
                                        <li class="text-muted text-semibold"><i class="icon-checkmark3 text-success position-left"></i> سوابق درمانی خود را مدیریت کنید</li>
                                    </ul>
									<div class="btn-group" style="margin-top:20px"><a class="bg-primary-400 btn btn-labeled text-semibold  btn-labeled-right" href="<?php echo $android_app_link; ?>" style="border-radius:4px;margin-left:10px" >دانلود اپلیکیشن اندروید <b><i class="icon-google"></i></b></a><a class="bg-grey-800 btn btn-labeled text-semibold" href="<?php echo $ios_app_link; ?>" style="border-radius:4px;margin-left:10px"><b><i class="icon-apple2"></i></b>دانلود اپلیکیشن آی او اس</a></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-md-offset-6 col-sm-6 col-xs-12">
                              <div class="col-md-10 col-sm-10 col-xs-12">
                                <div class="content-group p-20"><img class="img-responsive" src="/assets/img/03.introduction-app-pliro.png" style="padding:20px"></div>
                              </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

   
        <?php include('api/v1/page/footer.php'); ?>
        <script src="/assets/js/persian-date.min.js"></script>
        <script src="/assets/js/persian-datepicker.min.js"></script>
        <script src="/assets/js/jquery.number.min.js"></script>
        <script src="/assets/js/select2.min.js"></script>
        <script>
		 $(document).ready(function() {
           $('.select2').select2();
		   
		   var s = '';
           $.ajax({
            type: "GET",
			data:'type=doctor',
            url: "/api/v1/search/searchPageOne",
            success: function(msg) {
                for (var i = 0; i < msg.length; i++) {
					s = s + '<div class="sevice-list-item consultation-service top-interaction-box-transform" style="box-shadow: 0 0 8px 0 rgba(0,0,0,.09);border-radius:10px;height:280px"> <a href="/detail/doctor/' + msg[i].id + '" > <section style="padding:0!important"><i><img class="doctor-img" src="' + msg[i].image + '" style="border-radius:50%;width:80px;height:80px"> </i> <h2 class="service-title" style="font-size:15px">' + msg[i].name + ' </h2> <p class="service-explaine" style="padding-top:10px;font-size:12px">فوق تخصص کلیه کودکان ( نفرولوژی )</p> <a class="btn btn-flat btn-xs navbar-btn btn-pliro-secondary border-pliro-secondary" href="/detail/doctor/' + msg[i].id + '" style="width:100%;margin-top:40px"><i class="icon-add position-left"></i>دریافت نوبت</a> </section> </a> </div>';
					
                }
                $('#navdoctor').html(s)
            }
           })
		   
		 })
		</script>
</body>

</html>