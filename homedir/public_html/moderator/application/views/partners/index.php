<!DOCTYPE html>
<html lang="fa" dir="rtl">
<?php $this->load->view('includes/headsite'); ?>
    <link rel="stylesheet" href="/moderator/assets/shop/css/util.css">
    <link rel="stylesheet" href="/moderator/assets/shop/css/contact.css">

    <body>
        <div class="loading">
            <div>
                <div> <img src="images/inner-logo.png" alt="" class="img-res"> </div>
                <div class="blobs">
                    <div class="blob-center"></div>
                    <div class="blob"></div>
                    <div class="blob"></div>
                    <div class="blob"></div>
                    <div class="blob"></div>
                    <div class="blob"></div>
                    <div class="blob"></div>
                </div>
                <div class="text-center mt20">
                    <button id="refresh" style="display: none"><i class="o-icon o-refresh-69 x2"></i></button>
                </div>
            </div>
        </div>
        <div id="app">
            <?php $this->load->view('includes/header'); ?>
                <div class="package-list">
                    <div class="container">
                        <div class="row search-box" style="margin-top: 40px;">
                            <div class="col-md-6 mt20">
                                <h4 class="text-medium black">جستجو در شرکای تجاری</h4>
                                <p class="mt15 ultralight">
                                    شرکای تجاری ما را بیاید، در صورتی که دارای مجموعه بزرگی می باشید و علاقه مند به همکاری با ما هستید لطفا با ما تماس بگیرید 
                                </p>
                            </div>
                            <div class="col-md-6 mt20">
                                <form action="" method="get">
                                    <input type="text" class="form-control search-input" name="s" placeholder="جستجو در شرکای تجاری ..." />
                                </form>
                                <i class="o-icon o-zoom-2 lg"></i>
                            </div>
                        </div>
                        <div class="pt5 visible-xs"></div>
                        <div class="pr50 pl50 mt50 relative">
                            <div class="line"></div>
                            <div class="text-center">
                                <p class="ultralight line-title">شرکای تجاری</p>
                            </div>
                        </div>
                        <div class="mt30">
                            <div class="package-box">
                                <div class="">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/design-online-store.html">
                                                <div class="package">
                                                    <i class="o-icon o-cart"></i>
                                                    <h5 class="mt30">فروشگاه اینترنتی</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/corporate-website-design.html">
                                                <div class="package">
                                                    <i class="o-icon o-hierarchy-53"></i>
                                                    <h5 class="mt30">شرکتی</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/insurance-website-and-app.html">
                                                <div class="package">
                                                    <i class="o-icon o-security"></i>
                                                    <h5 class="mt30">بیمه و نمایندگی</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/medical-website-and-app.html">
                                                <div class="package">
                                                    <i class="o-icon o-doctor"></i>
                                                    <h5 class="mt30">رزرو آنلاین پزشکی</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/sports-club-webdesign.html">
                                                <div class="package">
                                                    <i class="o-icon o-sport"></i>
                                                    <h5 class="mt30">باشگاه ورزشی</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/announcement-website-and-app.html">
                                                <div class="package">
                                                    <i class="o-icon o-notification-69"></i>
                                                    <h5 class="mt30">آگهی و نیازمندی </h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/finance-banking-service-website-design.html">
                                                <div class="package">
                                                    <i class="o-icon o-coins"></i>
                                                    <h5 class="mt30">خدمات مالی و بانکی</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/commerce-company-website-design.html">
                                                <div class="package">
                                                    <i class="o-icon o-boat-front"></i>
                                                    <h5 class="mt30">بازرگانی</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/publications-magazines-website-design.html">
                                                <div class="package">
                                                    <i class="o-icon o-book"></i>
                                                    <h5 class="mt30">انتشارات کتاب</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/social-networking-webdesign.html">
                                                <div class="package">
                                                    <i class="o-icon o-b-meeting"></i>
                                                    <h5 class="mt30">شبکه اجتماعی</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/travel-agency-website-design.html">
                                                <div class="package">
                                                    <i class="o-icon o-plane-17"></i>
                                                    <h5 class="mt30">آژانس مسافرتی</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/hairdressing-website-design.html">
                                                <div class="package">
                                                    <i class="o-icon o-scissors"></i>
                                                    <h5 class="mt30">آرایشگاه و پیرایش</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/online-auction-web-and-app.html">
                                                <div class="package">
                                                    <i class="o-icon o-law"></i>
                                                    <h5 class="mt30">حراجی آنلاین</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/download-sitedesign.html">
                                                <div class="package">
                                                    <i class="o-icon o-square-download"></i>
                                                    <h5 class="mt30">دانلود</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/clothing-webDesign.html">
                                                <div class="package">
                                                    <i class="o-icon o-long-sleeve"></i>
                                                    <h5 class="mt30">فروشگاه اینترنتی پوشاک</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/building-company-website-design.html">
                                                <div class="package">
                                                    <i class="o-icon o-building"></i>
                                                    <h5 class="mt30">شرکت ساختمانی</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/training-website-design.html">
                                                <div class="package">
                                                    <i class="o-icon o-book-open "></i>
                                                    <h5 class="mt30">علمی آموزشی</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/petrochemical-website-design.html">
                                                <div class="package">
                                                    <i class="o-icon o-drop"></i>
                                                    <h5 class="mt30">پتروشیمی</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/digikala-website-design.html">
                                                <div class="package">
                                                    <i class="o-icon picIcon digikala"></i>
                                                    <h5 class="mt30">مشابه دیجی کالا</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/B2B-webdesign.html">
                                                <div class="package">
                                                    <i class="o-icon o-handshake"></i>
                                                    <h5 class="mt30">تجارت الکترونیک B2B</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/designing-customer-relationship-system.html">
                                                <div class="package">
                                                    <i class="o-icon o-filter-organization"></i>
                                                    <h5 class="mt30">سامانه ارتباط با مشتری CRM</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/film-and-music-website-design.html">
                                                <div class="package">
                                                    <i class="o-icon o-note-03"></i>
                                                    <h5 class="mt30">فیلم و موزیک</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/furniture-websitedesign.html">
                                                <div class="package">
                                                    <i class="o-icon o-armchair"></i>
                                                    <h5 class="mt30">صنعت مبلمان</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/Bamilo-website-design.html">
                                                <div class="package">
                                                    <i class="o-icon picIcon bamilo"></i>
                                                    <h5 class="mt30">مشابه بامیلو</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/agriculture-website-design.html">
                                                <div class="package">
                                                    <i class="o-icon o-plant-vase"></i>
                                                    <h5 class="mt30">کشاورزی</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/alibaba-website-design.html">
                                                <div class="package">
                                                    <i class="o-icon picIcon alibaba"></i>
                                                    <h5 class="mt30">مشابه علی بابا</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/zoodfood-website-design.html">
                                                <div class="package">
                                                    <i class="o-icon picIcon snappfood"></i>
                                                    <h5 class="mt30">مشابه زودفود</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/zoomit-website-design.html">
                                                <div class="package">
                                                    <i class="o-icon picIcon zoomit"></i>
                                                    <h5 class="mt30">مشابه زومیت</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/Atelier-website-design.html">
                                                <div class="package">
                                                    <i class="o-icon o-focus"></i>
                                                    <h5 class="mt30">آتلیه عکس</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/design-website-ceremony.html">
                                                <div class="package">
                                                    <i class="o-icon o-cake-100"></i>
                                                    <h5 class="mt30">مجالس</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/government-offices-website-design.html">
                                                <div class="package">
                                                    <i class="o-icon o-white-house"></i>
                                                    <h5 class="mt30">ادارات دولتی</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/online-pharmacy-website-design.html">
                                                <div class="package">
                                                    <i class="o-icon o-pill-42"></i>
                                                    <h5 class="mt30">داروخانه آنلاین</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/Portal-Design.html">
                                                <div class="package">
                                                    <i class="o-icon o-folder-user"></i>
                                                    <h5 class="mt30">پورتال</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/hospital-website-design.html">
                                                <div class="package">
                                                    <i class="o-icon o-hospital-33"></i>
                                                    <h5 class="mt30">بیمارستان</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/Snapp-application-design.html">
                                                <div class="package">
                                                    <i class="o-icon   picIcon snapp"></i>
                                                    <h5 class="mt30">مشابه اسنپ</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/Lawyers-website-Design.html">
                                                <div class="package">
                                                    <i class="o-icon o-scale"></i>
                                                    <h5 class="mt30">حقوقی وکلا</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/automobile-webdesign.html">
                                                <div class="package">
                                                    <i class="o-icon o-car-simple"></i>
                                                    <h5 class="mt30">خودرو</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/recreational-webdesign.html">
                                                <div class="package">
                                                    <i class="o-icon o-dart"></i>
                                                    <h5 class="mt30">تفریحی</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/hotel-webdesign.html">
                                                <div class="package">
                                                    <i class="o-icon o-hotel"></i>
                                                    <h5 class="mt30">هتل</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/production-company-sitedesign.html">
                                                <div class="package">
                                                    <i class="o-icon o-settings-gear-63"></i>
                                                    <h5 class="mt30">تولیدی</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/cultural-art-website-design.html">
                                                <div class="package">
                                                    <i class="o-icon o-note-03"></i>
                                                    <h5 class="mt30">فرهنگی و هنری</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/university-and-school-webdesign.html">
                                                <div class="package">
                                                    <i class="o-icon o-hat-3 "></i>
                                                    <h5 class="mt30">دانشگاه و مدرسه</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/personal-webdesign.html">
                                                <div class="package">
                                                    <i class="o-icon o-user-frame-31 "></i>
                                                    <h5 class="mt30">شخصی</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/government-and-enterprise-webdesign.html">
                                                <div class="package">
                                                    <i class="o-icon o-white-house"></i>
                                                    <h5 class="mt30">دولتی و سازمانی</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/advertising-website-design.html">
                                                <div class="package">
                                                    <i class="o-icon o-board-2"></i>
                                                    <h5 class="mt30">تبلیغات آنلاین</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/educational-institutions-website-design.html">
                                                <div class="package">
                                                    <i class="o-icon o-board-51"></i>
                                                    <h5 class="mt30">موسسه آموزشی</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/religious-webdesign.html">
                                                <div class="package">
                                                    <i class="o-icon o-mosque"></i>
                                                    <h5 class="mt30">دینی و مذهبی</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/website-design-online-food-order.html">
                                                <div class="package">
                                                    <i class="o-icon o-cutlery-77"></i>
                                                    <h5 class="mt30">رزرو آنلاین غذا</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/fast-food-and-coffee-Shop-webdesign.html">
                                                <div class="package">
                                                    <i class="o-icon o-pizza-slice"></i>
                                                    <h5 class="mt30">فست فود و کافی شاپ</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/tourism-website-design.html">
                                                <div class="package">
                                                    <i class="o-icon o-paris-tower"></i>
                                                    <h5 class="mt30">گردشگری</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/database-information-website-design.html">
                                                <div class="package">
                                                    <i class="o-icon o-file-download-89"></i>
                                                    <h5 class="mt30">بانک اطلاعاتی</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/exchange-website-design.html">
                                                <div class="package">
                                                    <i class="o-icon o-currency-dollar"></i>
                                                    <h5 class="mt30">کسب و کار صرافی</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/reception-hall-website-design.html">
                                                <div class="package">
                                                    <i class="o-icon o-drink"></i>
                                                    <h5 class="mt30">تالار پذیرایی</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/forum-website-design.html">
                                                <div class="package">
                                                    <i class="o-icon o-b-meeting"></i>
                                                    <h5 class="mt30">تالار گفتگو - انجمن</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/commercial-centers-webdesign.html">
                                                <div class="package">
                                                    <i class="o-icon o-shop"></i>
                                                    <h5 class="mt30">تجاری اداری</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/estate-webdesign.html">
                                                <div class="package">
                                                    <i class="o-icon o-home-52"></i>
                                                    <h5 class="mt30">املاک</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/feminine-hairdresser-website-design.html">
                                                <div class="package">
                                                    <i class="o-icon o-woman-24"></i>
                                                    <h5 class="mt30">آرایشگاه زنانه</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/Snapp-service-and-taxi-finder-website-design.html">
                                                <div class="package">
                                                    <i class="o-icon o-car-taxi"></i>
                                                    <h5 class="mt30">مشابه اسنپ و سرویس‌های تاکسی یاب</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/decoration-website-design.html">
                                                <div class="package">
                                                    <i class="o-icon o-palette"></i>
                                                    <h5 class="mt30">شرکت دکوراسیون</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mt30 ">
                                            <a href="package/industrial-sitedesign.html">
                                                <div class="package">
                                                    <i class="o-icon o-factory"></i>
                                                    <h5 class="mt30">صنعتی</h5>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt10"></div>
                <?php $this->load->view('includes/footer'); ?>
    </body>

</html>