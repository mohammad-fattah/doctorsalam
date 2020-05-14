<?php include('api/v1/settings/Header.php'); ?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo $site_name; ?> | ورود</title>
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
	    @font-face{font-family:bitmeh;font-style:normal;font-weight:400;src:url('/assets/fonts/IRANSansWeb(FaNum)_Light.eot') format("embedded-opentype"),url('/assets/fonts/IRANSansWeb(FaNum)_Light.woff') format("woff"),url('/assets/fonts/IRANSansWeb(FaNum)_Light.woff2') format("woff2"),url('/assets/fonts/IRANSansWeb(FaNum)_Light.ttf') format("truetype")}
        .slaask-button {
            text-align: left!important
        }
        
        .slaask-button.slaask-mini.slaask-opened {
            -webkit-transition-duration: 0s;
            transition-duration: 0s
        }
        
        .slaask-button.slaask-mini.slaask-opened .slaask-button-image {
            opacity: 0;
            -webkit-transition-delay: .2s;
            transition-delay: .2s
        }
        
        .slaask-button.slaask-mini.slaask-opened .slaask-button-cross {
            opacity: 1
        }
        
        .slaask-button.slaask-mini.slaask-opened #messages-counter {
            display: none
        }
        
        .slaask-button .slaask-button-image {
            border-radius: 50%;
            background-repeat: no-repeat;
            border-width: 0;
            position: absolute;
            bottom: -1px!important;
            right: -1px!important;
            width: calc(100% + 2px)!important;
            height: calc(100% + 2px)!important;
            cursor: pointer;
            background-position: center;
            opacity: 1;
            background-color: #fff
        }
        
        .slaask-button .slaask-button-cross {
            opacity: 0;
            position: absolute;
            z-index: 1;
            display: inline-block;
            background-color: rgba(20, 20, 20, .8);
            -webkit-transition-duration: .3s;
            transition-duration: .3s;
            cursor: pointer;
            width: 100%;
            bottom: -1px!important;
            right: -1px!important;
            width: calc(100% + 2px)!important;
            height: calc(100% + 2px)!important;
            height: 100%;
            font-size: 0;
            border-radius: 50%
        }
        
        .slaask-button .slaask-button-cross svg {
            width: 30%;
            height: 30%;
            margin: 35%;
            -webkit-transition-duration: .2s;
            transition-duration: .2s
        }
        
        .slaask-button.slaask-opened .slaask-button-cross svg {
            -webkit-transform: scale(1);
            transform: scale(1)
        }
        
        .slaask-button.slaask-opened .slaask-button-cross:hover svg {
            -webkit-transform: scale(1.1);
            transform: scale(1.1)
        }
        
        .slaask-button.slaask-opened .slaask-button-cross:active svg {
            -webkit-transform: scale(.8);
            transform: scale(.8)
        }
        
        .slaask-button:not(.slaask-opened) .slaask-pulsing-button span {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 100%;
            pointer-events: none
        }
        
        .slaask-button:not(.slaask-opened) .slaask-pulsing-button span::before {
            -webkit-animation: 2s cubic-bezier(.25, .46, .45, .94) 0s normal forwards infinite running slaask-boomerman;
            animation: 2s cubic-bezier(.25, .46, .45, .94) 0s normal forwards infinite running slaask-boomerman
        }
        
        .slaask-button:not(.slaask-opened) .slaask-pulsing-button span::after,
        .slaask-button:not(.slaask-opened) .slaask-pulsing-button span::before {
            bottom: 0;
            content: "";
            height: 100%;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            width: 100%;
            z-index: -1;
            border-radius: 50%
        }
        
        .slaask-button:not(.slaask-opened) .slaask-pulsing-button span::after {
            -webkit-animation: 2s cubic-bezier(.25, .46, .45, .94) .4s normal forwards infinite running slaask-boomerman;
            animation: 2s cubic-bezier(.25, .46, .45, .94) .4s normal forwards infinite running slaask-boomerman
        }
        
        .slaask-button #messages-counter {
            position: absolute;
            padding: 0;
            margin: 0;
            z-index: 9999999999999;
            list-style: none;
            top: -3px;
            right: -3px;
            height: 22px;
            width: 22px;
            line-height: 22px;
            background: #fc576b;
            color: #fff;
            font-size: 1.5rem;
            font-weight: 700;
            border-radius: 50%;
            text-indent: 0;
            -webkit-transition: -webkit-transform .2s .5s;
            transition: -webkit-transform .2s .5s;
            transition: transform .2s .5s;
            transition: transform .2s .5s, -webkit-transform .2s .5s
        }
        
        .slaask-button #messages-counter li {
            color: #fff;
            font-size: 14px;
            padding: 0!important;
            position: absolute;
            -webkit-transform: translateZ(0);
            transform: translateZ(0);
            left: 50%;
            top: 50%;
            bottom: auto;
            right: auto;
            -webkit-transform: translateX(-50%) translateY(-50%);
            transform: translateX(-50%) translateY(-50%)
        }
        
        .slaask-button #messages-counter li:last-of-type {
            visibility: hidden
        }
        
        .slaask-button #messages-counter.update-count li:last-of-type {
            -webkit-animation: slaask-cd-qty-enter .15s;
            animation: slaask-cd-qty-enter .15s;
            -webkit-animation-direction: forwards;
            animation-direction: forwards
        }
        
        .slaask-button #messages-counter.update-count li:first-of-type {
            -webkit-animation: slaask-cd-qty-leave .15s;
            animation: slaask-cd-qty-leave .15s;
            -webkit-animation-direction: forwards;
            animation-direction: forwards
        }
    </style>
</head>

<body class="ng-tns-0-0">
    <app-root _nghost-sc0="" ng-version="8.0.3" _nghost-serverapp-c0="">
        <router-outlet _ngcontent-serverapp-c0=""></router-outlet>
        <app-login>
            <div class="auth-view-wrapper">
                <div class="container-fluid">
                    <div class="wrapper">
                        <a class="pliro-logo" href="/"><img class="hidden-sm hidden-xs" src="<?php echo $site_logo; ?>"><img class="visible-sm visible-xs" src="<?php echo $site_logo; ?>"></a>
                        <div class="login-side-panel hidden-sm hidden-xs">
                            <div class="footer-content">
                                <h1>دکتر آنلاین به شما کمک می کند زودتر خوب شوید!</h1>
                                <h6>بهترین پزشکان را جستجو کنید ، زمان مناسب را انتخاب کنید و فوراً با یک کلیک رزرو کنید</h6>
                                <div class="social-media-links">
                                    <a href="/"><img src="/assets/img/fb-icon.png"></a>
                                    <a href="/"><img src="/assets/img/twitter-icon.png"></a>
                                    <a href="/"><img src="/assets/img/gplus-icon.png"></a>
                                </div>
                            </div>
                        </div>
                        <div class="main-panel main-container">
                            <div class="main-panel__table">
                                <div class="main-panel__table-cell"><span class="main-panel__switch"><span class="main-panel__switch__text hidden-xs"> هنوز عضو نشده ام ! </span><a class="main-panel__switch__button btn btn-default btn-rounded" href="/signup"> عضویت </a></span>
                                 <div class="border-grey-200 border-top main-panel__content no-border-bottom no-border-left no-border-right p-20"><div class="main-wrapper"><div class="signup-form"><div class="panel panel-body"><div class="text-center"><h5 class="content-group text-bold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ثبت نام کنید تا به Pliro بپیوندید. </font></font><small class="display-block text-semibold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">با ثبت نام به عنوان یک متخصص بهداشت و یا بیمار ، از Pliro بیشترین بهره را ببرید</font></font></small></h5></div><div class="input-section input-group-lg"><div class="form-group"><a id="patient-signup"><ul class="media-list content-group patient-checkbox"><li class="media panel panel-body stack-media-on-mobile"><div class="media-left"><a><img alt="" src="assets/img/patient-vector.png"></a></div><div class="media-body"><h5 class="media-heading text-bold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> به عنوان بیمار بپیوندید </font></font></h5><small class="display-block text-semibold width-200"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">حساب Pliro برای رزرو قرار ملاقاتها و سؤالات مربوط به سلامتی بپرسید. </font></font></small></div><div class="media-right text-nowrap"><a class="btn btn-sm"><i class="icon-checkmark3"></i></a></div></li></ul></a><a><ul class="media-list content-group"><li class="media panel panel-body stack-media-on-mobile"><div class="media-left"><a><img alt="" src="assets/img/doctor-vector.png"></a></div><div class="media-body"><h5 class="media-heading text-bold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> به عنوان یک دکتر بپیوندید </font></font></h5><small class="display-block text-semibold width-200"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Pliro به شما امکان می دهد تا تمرین پزشکی خود را تبلیغ و مدیریت کنید. </font></font></small></div><div class="media-right text-nowrap"><a class="btn btn-sm"><i class="icon-checkmark3"></i></a></div></li></ul></a><a href="/signup/hospital"><ul class="media-list content-group"><li class="media panel panel-body stack-media-on-mobile"><div class="media-left"><img alt="" src="assets/img/hospital-vector.png"></div><div class="media-body"><h5 class="media-heading text-bold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> به عنوان یک بیمارستان بپیوندید </font></font></h5><small class="display-block text-semibold width-200"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">حساب Pliro برای رزرو قرار ملاقاتها و سؤالات مربوط به سلامتی بپرسید. </font></font></small></div><div class="media-right text-nowrap"><a class="btn btn-sm"><i class="icon-checkmark3"></i></a></div></li></ul></a></div></div></div></div></div></div>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </app-login>
    </app-root>
</body>

</html>