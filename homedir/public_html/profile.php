<?php 
 include('api/v1/settings/Header.php');
 if(!$user_key_user){
  header('location:../');
 }
 $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
?>
<!DOCTYPE html>
    <html lang="fa">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>
            <?php echo $site_name; ?> :: <?php echo $first_name.' '.$last_name; ?>
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
		.fancybox-margin{margin-right:17px}.cat-deal-color.main-cat .main-cat-deal-thumbnail .cds-item .cat-deal-box .cat-deal-box-main{margin-top:17px}.btn-group-vertical>.btn-group:after,.btn-group-vertical>.btn-group:before,.btn-toolbar:after,.btn-toolbar:before,.clearfix:after,.clearfix:before,.container-fluid:after,.container-fluid:before,.container:after,.container:before,.dl-horizontal dd:after,.dl-horizontal dd:before,.form-horizontal .form-group:after,.form-horizontal .form-group:before,.modal-footer:after,.modal-footer:before,.modal-header:after,.modal-header:before,.nav:after,.nav:before,.navbar-collapse:after,.navbar-collapse:before,.navbar-header:after,.navbar-header:before,.navbar:after,.navbar:before,.pager:after,.pager:before,.panel-body:after,.panel-body:before,.row:after,.row:before{content:" ";display:table}.cat-deal-color .main-row .cat-deal-smallbox .cat-deal-box-main .cdbm-title{margin-top:0;padding-top:0;line-height:1;margin-bottom:4px}.cat-deal-color .main-row .cat-deal-box .cat-deal-box-main .cdbm-title{margin:15px 0 3px}.cat-deal-color.main-cat .main-cat-deal-thumbnail .cds-item .cat-deal-box .cdbm-title a{font-size:1.4rem;width:80%;padding-bottom:1px;position:relative;padding-right:32px}.cat-deal-color .main-row .cat-deal-smallbox .cat-deal-box-main .cdbm-title a{width:77%;font-size:1.2rem;padding-bottom:0;line-height:18px;min-height:18px}.cat-deal-color.main-cat .main-cat-deal-thumbnail .cds-item .cat-deal-box .cdbm-title a:before{position:absolute;font-family:netbarg;content:'\e97b';font-size:2.6rem;color:#00ae4d;right:0}@font-face{font-family:bitmeh;font-style:normal;font-weight:400;src:url('/assets/fonts/IRANSansWeb(FaNum)_Light.eot') format("embedded-opentype"),url('/assets/fonts/IRANSansWeb(FaNum)_Light.woff') format("woff"),url('/assets/fonts/IRANSansWeb(FaNum)_Light.woff2') format("woff2"),url('/assets/fonts/IRANSansWeb(FaNum)_Light.ttf') format("truetype")}#learning .items .item .img_box img{width:40%}#learning .items .item:hover .seemore{background:#2068e0 url(/assets/img/cta-arrow.png) no-repeat 10px center;color:#fff}#learning .items .item .text{display:block;height:75px;overflow:hidden;color:#fff}#learning .item a{display:block;height:100%}#learning .seemore{display:inline-block;padding:5px 15px;border-radius:28px;background:#f7f7f7;font-size:12px;margin-top:10px;color:#404040;border:1px solid #efefef}#learning .slick-dots{top:-65px}#learning .title{margin-bottom:20px}#learning .items .item .img_box img{width:40%}#learning .items .item:hover .seemore{background:#2068e0 url(/assets/img/cta-arrow.png) no-repeat 10px center;color:#fff}#learning .items .item .text{display:block;height:75px;overflow:hidden}#learning .item a{display:block;height:100%}#learning .seemore{display:inline-block;padding:5px 15px;border-radius:28px;background:#f7f7f7;font-size:12px;margin-top:10px;color:#404040;border:1px solid #efefef}#learning .slick-dots{top:-65px}#learning .title{margin-bottom:20px}#how_to_start,#learning{padding-bottom:120px;position:relative}#how_to_start .object,#learning .object{position:absolute;pointer-events:none}#how_to_start .object.one,#learning .object.one{width:25%;left:0;top:0}#how_to_start .object.two,#learning .object.two{right:0;width:15%;top:-100px}#how_to_start .title,#learning .title{margin-bottom:100px}#how_to_start .items,#learning .items{text-align:center}#how_to_start .items .item,#learning .items .item{background:#354bbb;position:relative;border-radius:39px;display:inline-block;padding:75px 19px 20px;width:19%;font-size:15px;height:180px;vertical-align:top;transition:all .5s ease;-webkit-transition:all .5s ease;-ms-transition:all .5s ease;-o-transition:all .5s ease;-moz-transition:all .5s ease;cursor:default}#how_to_start .items .item .img_box,#learning .items .item .img_box{width:83px;height:83px;border-radius:50%;background-color:#41d296;position:absolute;top:-40px;transition:all .2s ease;-webkit-transition:all .2s ease;-ms-transition:all .2s ease;-o-transition:all .2s ease;-moz-transition:all .2s ease;left:50%;transform:translate(-50%,0)}#how_to_start .items .item .img_box img,#learning .items .item .img_box img{width:50%;position:absolute;transform:translate(-50%,-50%);top:50%;left:50%}#how_to_start .items .item:hover,#learning .items .item:hover{transform:translateY(-10px)}#how_to_start .items .item:hover .img_box,#learning .items .item:hover .img_box{background-color:#2068e0}#how_to_start .items .item:hover a,#learning .items .item:hover a{color:#404040}#how_to_start .items .item:not(:last-child),#learning .items .item:not(:last-child){margin-left:2%}#brands{background:#01137c;padding:35px 0;text-align:center}#brands a{width:10%;height:61px;display:inline-block;background:#fff;vertical-align:top;border-radius:4px;position:relative}#brands a:not(:last-child){margin-left:10px}#brands a:hover img{-webkit-filter:grayscale(0);filter:grayscale(0)}#brands a img{position:absolute;top:50%;width:60%;left:50%;transition:all .2s ease;-webkit-transition:all .2s ease;-ms-transition:all .2s ease;-o-transition:all .2s ease;-moz-transition:all .2s ease;transform:translate(-50%,-50%);-webkit-filter:grayscale(100%);filter:grayscale(100%)}#brands a img.small{width:35%}ul li a .hidden-sm{color:#777!important;font-size:12px}.kk-archive-table tr td{padding:8px}
		.kk-archive-table tr td:nth-child(4) a.not-comment,.kk-archive-table tr td:nth-child(4) a.not-deliverd{border:1px solid #d8d8d8}
		</style>
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

                <div class="col-md-4" style="margin-top:144px">
                    <div class="wrapper-right">
                        <div class="booking-panel">
                            <?php if($user_type=='doctor'): ?>
                                <app-booking-info>
                                    <div class="panel panel-flat no-border">
                                        <div class="category-title text-white text-bold no-border bg-pliro-secondary" style="padding-right: 0;">
                                            <span style="font-size:14px;text-align:center">موجودی حساب شما</span>
                                        </div>
                                        <div class="panel-body ">
                                            <div class="text-mediumbold" style="height:200px;text-align:center;display:flex;justify-content: center;align-items: center;flex-direction: column;">
                                                <div style="font-size:12px;padding-right:8px;color:#02c773;">موجودی فعلی شما</div>
                                                <span style="font-size:12px;padding-right:8px"><span style="font-size:25px;" id="get_extant_cash">0</span>تومان</span>
                                            </div>
                                            <div class="text-mediumbold">

                                                <input type="text" class="select-location form-control input-xlg select2" style="height:50px;border-style:none;border:1px solid #efefef;font-size:12px;text-align:center" placeholder="مبلغ دلخواه (تومان)" />
                                            </div>
                                            <div class="form-group text-right" style="margin-top:20px">
                                                <button class="btn btn-block btn-pliro-secondary text-bold fs-button-apt-book-profile" onclick="AddOrder()" style="height:45px">
                                                    درخواست تسویه
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </app-booking-info>

                            <?php else: ?>
                                    <app-booking-info>
                                        <div class="panel panel-flat no-border">
                                            <div class="category-title text-white text-bold no-border bg-pliro-secondary" style="padding-right: 0;">
                                                <span style="font-size:14px;text-align:center">موجودی کیف پول</span>
                                            </div>
                                            <div class="panel-body ">
                                                <div class="text-mediumbold" style="height:200px;text-align:center;display:flex;justify-content: center;align-items: center;flex-direction: column;">
                                                    <div style="font-size:12px;padding-right:8px;color:#02c773;">اعتبار فعلی شما</div>
                                                    <span style="font-size:12px;padding-right:8px"><span style="font-size:25px;" id="get_extant_cash">0</span>تومان</span>
                                                </div>
                                                <div class="text-mediumbold">
                                                    <div class="form-group">
                                                        <label class="radio-inline" onclick="ChangePrice('20000')">
                                                            <div class="choice" style="top:6px">
                                                                <span class="20000 chk">
                <input name="price" type="radio" value="20000">
              </span>
                                                            </div>
                                                            20,000 تومان
                                                        </label>
                                                        <label class="radio-inline" style="margin-left:0" onclick="ChangePrice('50000')">
                                                            <div class="choice" style="top:6px">
                                                                <span class="50000 chk">
                <input name="price" type="radio" value="50000">
              </span>
                                                            </div>
                                                            50,000 تومان
                                                        </label>
                                                        <label class="radio-inline" style="margin-left:0" onclick="ChangePrice('100000')">
                                                            <div class="choice" style="top:6px">
                                                                <span class="100000 chk">
                <input name="price" type="radio" value="100000">
              </span>
                                                            </div>
                                                            100,000 تومان
                                                        </label>
                                                    </div>

                                                    <input type="text" class="select-location form-control input-xlg select2" style="height:50px;border-style:none;border:1px solid #efefef;font-size:12px;text-align:center" placeholder="مبلغ دلخواه (تومان)" />
                                                </div>
                                                <div class="form-group text-right" style="margin-top:20px">
                                                    <button class="btn btn-block btn-pliro-secondary text-bold fs-button-apt-book-profile" onclick="AddOrder()" style="height:45px">
                                                        تایید افزایش موجودی
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </app-booking-info>

                            <?php endif; ?>
                        </div>

                    </div>

                </div>

                <div class="col-md-8">

                    <div class="media stack-media-on-mobile" style="margin-top: 20px;margin-bottom:25px">

                        <div class="media-left">
                            <a class="profile-thumb">
                                <?php if($image): ?>
                                    <img class="img-profile img-md img_doctor" src="/moderator/files/profile_images/<?php echo $image; ?>">
                                    <?php else: ?>
                                        <img class="img-profile img-md img_doctor" src="/moderator/files/profile_images/_file5e3e702d88e59-avatar.png">
                                        <?php endif; ?>
                            </a>
                        </div>

                        <div class="media-body">
                            <h1 class="text-white mb-5 doctor_name" style="margin-top:45px"><?php echo $first_name.' '.$last_name; ?></h1>
                        </div>

                    </div>
                    <div class="navbar sub-header-nav">
                        <div class="media stack-media-on-mobile" style="margin-top:0">
                            <div class="media-body">
                                <p class="navbar-text pl-5 orders" style="text-align:right;float:right;cursor:pointer;border-bottom: 2px solid rgb(24, 83, 207); color: rgb(24, 83, 207); font-weight: 600;" onclick="ChangeTab('orders')">
                                    سفارش ها
                                </p>
								<p class="navbar-text pl-5 payment" style="text-align:right;float:right;margin-right:20px;cursor:pointer" onclick="ChangeTab('payment')">
							     مالی
							    </p>
								<p class="navbar-text pl-5 profile" style="text-align:right;float:right;cursor:pointer;margin-right:20px;" onclick="ChangeTab('profile')">
                                    مشخصات کاربری
                                </p>
                                <p class="navbar-text pl-5 password" style="text-align:right;float:right;margin-right:20px;cursor:pointer" onclick="ChangeTab('password')">
                                    تغییر رمز عبور
                                </p>
                                <p class="navbar-text pl-5 earning" style="text-align:right;float:right;margin-right:20px;cursor:pointer" onclick="ChangeTab('earning')">
                                    معرفی به دوستان
                                </p>
                                
                            </div>
                        </div>
                    </div>

                    <div class="wrapper-left" style="margin-top:20px">
                        <div class="container-fluid" style="padding:0">
                            <div class="row">

                                <div class="panel no-padding">
                                    <div class="panel-body pt-20">
                                        <div class="content-group no-margin" style="padding:20px">
                                            <div style="display:none" id="profile" class="tab">
                                                <form id="ProfileForm" action="javascript:;">
                                                    <div class="col-md-12">
                                                        مشخصات کاربری
                                                        <hr>
                                                        <div class="col-md-6">

                                                        </div>
                                                        <div class="col-md-6">
                                                            <input name="first_name" class=" form-control input-xlg  typeahead-remote tt-input" type="text" style="position: relative; vertical-align: top;direction:rtl;font-weight:100;height:40px;font-size:12px" placeholder="نام" value="<?php echo $first_name; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12" style="margin-top:15px">
                                                        <div class="col-md-6">

                                                        </div>
                                                        <div class="col-md-6">
                                                            <input name="last_name" class=" form-control input-xlg  typeahead-remote tt-input" type="text" style="position: relative; vertical-align: top;direction:rtl;font-weight:100;height:40px;font-size:12px" placeholder="نام خانوادگی" value="<?php echo $last_name; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12" style="margin-top:15px">
                                                        <div class="col-md-6">
                                                            <input class=" form-control input-xlg  typeahead-remote tt-input" type="text" style="position: relative; vertical-align: top;direction:rtl;font-weight:100;height:40px;font-size:12px" placeholder="شماره همراه" value="<?php echo $phone; ?>" disabled>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input name="cellphone" class=" form-control input-xlg  typeahead-remote tt-input" type="text" style="position: relative; vertical-align: top;direction:rtl;font-weight:100;height:40px;font-size:12px" value="<?php echo $cellphone; ?>" placeholder="شماره ثابت">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12" style="margin-top:15px">
                                                        <div class="col-md-6">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input name="melli_code" class=" form-control input-xlg typeahead-remote tt-input" type="text" style="position: relative; vertical-align: top;direction:rtl;font-weight:100;height:40px;font-size:12px" placeholder="کد ملی" value="<?php echo $melli_code; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12" style="margin-top:15px">
                                                        <div class="col-md-6">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <select name="state" class="select-location form-control input-xlg select2 state " style="height:40px;font-size:12px">
                                                                <?php if($state_user): ?>
                                                                    <option>
                                                                        <?php echo $state_user; ?>
                                                                    </option>
                                                                    <?php else: ?>
                                                                        <option>استان</option>
                                                                        <?php endif; ?>
                                                                            <option>آذربایجان شرقی</option>
                                                                            <option>آذربایجان غربی</option>
                                                                            <option>اردبیل</option>
                                                                            <option>اصفهان</option>
                                                                            <option>البرز</option>
                                                                            <option>ایلام</option>
                                                                            <option>بوشهر</option>
                                                                            <option>تهران</option>
                                                                            <option>چهارمحال وبختیاری</option>
                                                                            <option>خراسان جنوبی</option>
                                                                            <option>خراسان رضوی</option>
                                                                            <option>خراسان شمالی</option>
                                                                            <option>خوزستان</option>
                                                                            <option>زنجان</option>
                                                                            <option>سمنان</option>
                                                                            <option>سیستان وبلوچستان</option>
                                                                            <option>فارس</option>
                                                                            <option>قزوین</option>
                                                                            <option>قم</option>
                                                                            <option>کردستان</option>
                                                                            <option>کرمان</option>
                                                                            <option>کرمانشاه</option>
                                                                            <option>کهگیلویه وبویراحمد</option>
                                                                            <option>گلستان</option>
                                                                            <option>گیلان</option>
                                                                            <option>لرستان</option>
                                                                            <option>مازندران</option>
                                                                            <option>مرکزی</option>
                                                                            <option>هرمزگان</option>
                                                                            <option>همدان</option>
                                                                            <option>یزد</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12" style="margin-top:15px">
                                                        <div class="col-md-6">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input name="city" class=" form-control input-xlg typeahead-remote tt-input" type="text" style="position: relative; vertical-align: top;direction:rtl;font-weight:100;height:40px;font-size:12px" placeholder="شهر" value="<?php echo $city_user; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12" style="margin-top:15px">
                                                        <div class="col-md-12">
                                                            <input name="address" class=" form-control input-xlg typeahead-remote tt-input" type="text" style="position: relative; vertical-align: top;direction:rtl;font-weight:100;height:40px;font-size:12px" placeholder="آدرس" value="<?php echo $address_user; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12" style="margin-top:15px">
                                                        <div class="col-md-6">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input name="postal_code" class=" form-control input-xlg typeahead-remote tt-input" type="text" style="position: relative; vertical-align: top;direction:rtl;font-weight:100;height:40px;font-size:12px" placeholder="کد پستی" value="<?php echo $postalcode_user; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12" style="margin-top:15px">
                                                        <div class="col-md-4">
                                                            <div class="btn btn-flat btn-xs navbar-btn btn-pliro-secondary border-pliro-secondary" style="height:40px;width:100%;margin-top:0;line-height:28px" onclick="UpdateProfile()">تایید و ثبت</div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <div style="display:none" id="password" class="tab">
                                                <div class="col-md-12">
                                                    تغییر رمز عبور
                                                    <hr>
                                                    <div class="col-md-6">

                                                    </div>
                                                    <div class="col-md-6">
                                                        <input name="pass" class=" form-control input-xlg  typeahead-remote tt-input" type="password" style="position: relative; vertical-align: top;direction:rtl;font-weight:100;height:40px;font-size:12px" placeholder="پسورد جدید" value="">
                                                    </div>
                                                </div>

                                                <div class="col-md-12" style="margin-top:15px">
                                                    <div class="col-md-6">

                                                    </div>
                                                    <div class="col-md-6">
                                                        <input name="re_pass" class=" form-control input-xlg  typeahead-remote tt-input" type="password" style="position: relative; vertical-align: top;direction:rtl;font-weight:100;height:40px;font-size:12px" placeholder="تکرار پسورد جدید" value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="margin-top:15px">
                                                    <div class="col-md-4">
                                                        <div class="btn btn-flat btn-xs navbar-btn btn-pliro-secondary border-pliro-secondary" href="/moshaver" style="height:40px;width:100%;margin-top:0;line-height:28px">تغییر رمز عبور</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div style="display:block" id="orders" class="tab">
                                                سفارشات
                                                <hr>
                                                <div class="kk-pp-menu-container kk-order-archive" style="padding:0">
                                                    <?php 
													  $k = 1;
													  include_once 'api/v1/user/order_list.php';
													  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
														extract($row);
													 ?>
                                                        <table class="kk-archive-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="kk-fa-digit text-center col-xs-1 kk-fa-digit-done">
                                                                     <?php echo $k; ?>
                                                                    </td>
                                                                    <td class="col-xs-2">
                                                                      <?php echo $doctor_name; ?>
                                                                    </td>
																	<td class="col-xs-4">
                                                                       وضعیت : <?php echo $status; ?>
                                                                    </td>
                                                                    <td class="text-center col-xs-3">
                                                                        ش پیگیری :
                                                                        <?php echo $factor; ?>
                                                                    </td>
                                                                    <td style="font-size: 11px;" class="col-xs-2">
                                                                        <a class="not-deliverd" style="width:120px;padding:0px 10px;float:left;text-align:center;border:1px solid #efefef">
																		 مشاهده جزییات
																		</a>
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                        <?php $k++; } ?>
                                                            <?php if($k == 1): ?>
                                                                <div class="media panel panel-body stack-media-on-mobile" style="height:300px;text-align:center;box-shadow:none">
                                                                    <img src="/assets/img/diagnostics-03.png" style="height:150px;margin:0px auto 30px" />
                                                                    <p style="font-weight:100;font-size:14px">سفارشی ثبت نشده است !</p>
                                                                </div>
                                                         <?php endif; ?>
                                                </div>
                                            </div>

                                           
                                            <div style="display:none" id="earning" class="tab">
                                                معرفی به دوستان
                                                <hr>
                                                <p>چطوری با
                                                    <?php echo $site_name; ?> کسب درآمد کنیم؟
                                                        <br> کافی است لینک زیر را با دوستانی که تا به حال از
                                                        <?php echo $site_name; ?> خرید نداشته‌اند، به اشتراک بگذارید؛ به ازای هر خرید که از این لینک انجام شود، ۲۰,۰۰۰ تومان به شما تعلق می‌گیرد . شما می‌توانید این درآمد را بصورت نقدی دریافت کرده و یا در صورت تمایل به خرید ، 5% بیشتر از مجموع درآمدتان اعتبار خرید هدیه بگیرید. با این کار، 25,000 تومان تخفیف خرید اول نیز به دوستان‌تان هدیه می‌دهید.
                                                            <br> این اعتبار زمانی به شما تعلق خواهد گرفت که فرد معرفی شده با اعتباری که از شما هدیه گرفته است در
                                                            <?php echo $site_name; ?> خرید انجام دهد.</p>
                                                <div class="media panel panel-body stack-media-on-mobile" style="height:150px;text-align:center;border:1px dashed #efefef;box-shadow:none;border-radius:8px;background-color:#fcfcfc">
                                                    <div style="height:50px;text-align:center;border:1px dashed #efefef;box-shadow:none;border-radius:8px;background-color:#fff;min-width:300px;margin:0 auto;display:flex;justify-content:center;align-items:center;width:auto;">
                                                        <?php echo $actual_link.'/broker/'.$user_key_user; ?>
                                                    </div>
                                                    <a href="javascript:;" class="btn btn-flat btn-xs navbar-btn btn-pliro-secondary border-pliro-secondary" style="margin:20px 0">اشتراک به دیگران</a>
                                                    <a target="_blank" class="btn btn-lg text-facebook p-15" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $actual_link.'/broker/'.$user_key_user; ?>">
                                                        <i class="icon-facebook2 icon-2x" style="font-size:24px;padding-top:5px!important"></i>
                                                    </a>
                                                    <a target="_blank" class="btn btn-lg text-instagram p-15" href="<?php echo $actual_link.'/broker/'.$user_key_user; ?>">
                                                        <i class="icon-instagram icon-2x" style="font-size:24px;padding-top:5px!important"></i>
                                                    </a>
                                                    <a target="_blank" class="btn btn-lg text-twitter p-15" href="https://twitter.com/intent/tweet?url=<?php echo $actual_link.'/broker/'.$user_key_user; ?>">
                                                        <i class="icon-twitter icon-2x" style="font-size:24px;padding-top:5px!important"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            
											<div style="display:none" id="payment" class="tab">
                                               مالی
                                                <hr>
                                                <div class="kk-pp-menu-container kk-order-archive" style="padding:0">
                                                    <?php 
													  $k = 1;
													  include_once 'api/v1/user/payment_list.php';
													  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
														extract($row);
													 ?>
                                                        <div style="width:100%;height:50px;line-height:50px;border:1px solid #f3f3f3;border-bottom:none">
                                                                    <div style="width:5%;float:right;border-left:1px solid #f3f3f3;text-align:center">
                                                                     <?php echo $k; ?>
                                                                    </div>
                                                                    <div style="width:20%;float:right;border-left:1px solid #f3f3f3;text-align:center">
                                                                      <?php echo $for; ?>
                                                                    </div>
                                                                    <div style="width:20%;float:right;border-left:1px solid #f3f3f3;text-align:center">
                                                                        <?php echo number_format($amount); ?> تومان
                                                                    </div>
																	<div style="width:25%;float:right;border-left:1px solid #f3f3f3;text-align:center">
                                                                        مانده : <?php echo number_format($extant); ?> تومان
                                                                    </div>
																	<div style="width:10%;float:right;border-left:1px solid #f3f3f3;text-align:center">
                                                                        <?php if($type=='plus'): ?> 
																		 <span style="color:#09bf09">افزایش</span>
																		<?php else: ?>
																		 <span style="color:#f00">کاهش</span>
																		<?php endif; ?>
                                                                    </div>
																	<div style="width:15%;float:right;border-left:1px solid #f3f3f3;text-align:center">
                                                                        <?php if($status=='active'): ?> 
																		 <span style="color:#09bf09">تراکنش موفق</span>
																		<?php else: ?>
																		 <span style="color:#f00">تراکنش ناموفق</span>
																		<?php endif; ?>
                                                                    </div>
                                                            </div>
                                                            <?php $k++; } ?>
                                                            <?php if($k == 1): ?>
                                                                <div class="media panel panel-body stack-media-on-mobile" style="height:300px;text-align:center;box-shadow:none">
                                                                    <img src="/assets/img/diagnostics-03.png" style="height:150px;margin:0px auto 30px" />
                                                                    <p style="font-weight:100;font-size:14px">سفارشی ثبت نشده است !</p>
                                                                </div>
                                                         <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
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

</div>
        <script src="/assets/js/jquery.number.min.js"></script>
        <script src="/assets/js/select2.min.js"></script>
        <script>
            var final_price = 0;

            function ChangeTab(tab) {
                $('.navbar-text').css('border-bottom', 'none').css('color', '#333').css('font-weight', '100')
                $('.' + tab).css('border-bottom', '2px solid #1853cf').css('color', '#1853cf').css('font-weight', '600')
                $('.tab').css('display', 'none')
                $('#' + tab).css('display', 'block')
            }

            function AddOrder() {
		      $.ajax({
               type: "GET",
			   data:"user=<?php echo $user_key_user; ?>&price="+final_price,
               url: "/api/v1/user/addmoney",
               success: function(msg) {
				window.location = 'https://iransavclub.com/bank/doctor_send_wallet.php?price='+final_price+"&factor="+msg;
			   }
		      })
            }
			function UpdateProfile() {
			  var data = $('#ProfileForm').serialize();
		      $.ajax({
               type: "GET",
			   data:data,
               url: "/api/v1/user/update",
               success: function(msg) {
				alert('با موفقیت ثبت شد')
			   }
		      })
            }

            function ChangePrice(price) {
                $('.chk').removeClass('checked')
                $('.' + price).addClass('checked')
                final_price = price
            }
            $(document).ready(function() {
             $.ajax({
              type: "GET",
			  data:'user=<?php echo $user_key_user; ?>',
              url: "/api/v1/user/get_extant_cash",
              success: function(msg) {
				$('#get_extant_cash').html(msg.extant)
			  }
		     })
	        })
        </script>
    </body>
</html>