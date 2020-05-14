<!DOCTYPE html>
<html lang="fa" dir="rtl">
<?php $this->load->view('includes/headsite'); ?>
<body>
    <?php $this->load->view('includes/loading'); ?>
    <div id="app">
        <?php $this->load->view('includes/header'); ?>
		<div class="blog-cat-list">
            <div class="container">
                <div class="row search-box" style="margin-top: 40px;">
                    <div class="col-md-6 mt20">
                        <h4 class="text-medium black">مراکز خدمات <?php echo get_setting('company_name'); ?></h4>
                        <p class="mt15 ultralight">بیابید، بخوانید و به روز باشید. بلاگ ما حاصل تجربیات و اطلاعات تیم ما و هچنین برگردان هایی از مراکز خدمات روز وب سایت های معتبر دنیاست....

                        </p>
                    </div>
                    <div class="col-md-6 mt20">
                        <input type="text" class="form-control search-input filter-element" name="s" placeholder="جستجو در مراکز خدمات..." />
                        <i class="o-icon o-zoom-2 lg"></i>
                    </div>

                </div>
                
                <div class="row mt10">
                    <div class="col-md-3 mt30 sub-cat-parent  active ">
                        <a href="../digimarket.html">
                            <div class="sub-cat">

                                <h4>پوشاک</h4>

                            </div>
                        </a>
                        <div class="active-border mt5 opacity0"></div>
                    </div>
                    <div class="col-md-3 mt30 sub-cat-parent ">
                        <a href="socialmedia.html">
                            <div class="sub-cat">

                                <h4>هتل</h4>

                            </div>
                        </a>
                        <div class="active-border mt5 opacity0"></div>
                    </div>
                    <div class="col-md-3 mt30 sub-cat-parent ">
                        <a href="contentmarket.html">
                            <div class="sub-cat">

                                <h4>تورهای مسافرتی</h4>

                            </div>
                        </a>
                        <div class="active-border mt5 opacity0"></div>
                    </div>
                    <div class="col-md-3 mt30 sub-cat-parent ">
                        <a href="advertise.html">
                            <div class="sub-cat">

                                <h4>تبلیغات و سایر روش‌ها</h4>

                            </div>
                        </a>
                        <div class="active-border mt5 opacity0"></div>
                    </div>

                </div>
                <div class="white-box mt50">
                    <div class="filter-text mt30 text-center-xs">
                        <h4 class="text-medium black">مرتب‌سازی مراکز خدمات بر اساس :</h4>
                    </div>
                    <div class="filter-buttons mt30 text-center-xs">

                        <div class="filter-div">
                            <label>
                                <input type="radio" name="orders" value="cmcount" checked="checked" class="hidden filter-element" />
                                <span class="button">
                                <span class="icon-parent">
                                    <i class="o-icon o-chat-round-content x2"></i>
                                </span>
                                <span class="button-text ultralight mt10">تعداد نظرات</span>
                                </span>
                            </label>
                        </div>
                        <div class="filter-div">
                            <label>
                                <input type="radio" name="orders" value="ratecount" class="hidden filter-element" />
                                <span class="button">
                                <span class="icon-parent">
                                    <i class="o-icon o-favourite-31 x2"></i>
                                </span>
                                <span class="button-text ultralight mt10">امتیاز مقاله</span>
                                </span>
                            </label>
                        </div>
                        <div class="filter-div">
                            <label>
                                <input type="radio" name="orders" value="hit" class="hidden filter-element" />
                                <span class="button">
                                <span class="icon-parent">
                                    <i class="o-icon o-eye-17 x2"></i>
                                </span>
                                <span class="button-text ultralight mt10">تعداد بازدید</span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="filter-switch mt30">
                        <div class="switch-parent">
                            <span class="red ml50 hidden-sm hidden-xs">|</span>
                            <div class="switch-parent2">
                                <i class="o-icon o-funnel-39 flip ml15" data-checked="false"></i>
                                <label class="switch">
                                    <input type="checkbox" name="sort" value="asc" class="filter-element">
                                    <span class="slider round"></span>
                                </label>
                                <i class="o-icon o-funnel-39 mr15" data-checked="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
              </div>
             </div>
                
		   <div class="package-single">
            <div class="container">
                <div class="pr50 pl50 mt50 relative">
                    <div class="line"></div>
                    <div class="text-center">
                        <p class="ultralight line-title">مراکز ارایه دهنده خدمات <?php echo get_setting('company_name'); ?></p>
                    </div>
                </div>

                <div class="mt50">
                    <ul class="portfolios p0">
                        <li>
                            <a href="../portfolio/BNDGame-Online-Game-shop.html">
                                <div class="pic">
                                    <img src="/moderator/assets/response/1000/500/60fc48.jpg?url=/moderator/assets/portfolios-49-bndgame-header.jpg" class="width100" />
                                </div>
                                <div class="desc text-center">
                                    <h4 class="red line-height2 text-medium">فروشگاه رزگلاب گلستان قمصر</h4>
                                    
									<p class="mt30 line-height2 text-justify light blog-editor-parent">آدرس : تهران<br>درصد تخفیف : 5 تا 30 درصد<br>ساعات کاری : 8 الی 24<br>فروش آنلاین : دارد</p>
                                    <div class="mt50">
                                        <a href="" class="btn btn-port">مشاهده کامل جزییات</a>
                                    </div>
                                </div>
                                <span class="clearfix"></span>
                            </a>
                        </li>
                        <li>
                            <a href="../portfolio/Design-online-bookstore-website.html">
                                <div class="pic">
                                    <img src="/moderator/assets/response/1000/500/60d3da.jpg?url=/moderator/assets/portfolios-47-bookonline-header.png" class="width100" />
                                </div>
                                <div class="desc text-center">
                                    <h4 class="red line-height2 text-medium">فروشگاه اینترنتی کتاب آنلاین</h4>
                                    <p class="mt30 line-height2 text-justify light blog-editor-parent">کتاب‌آنلاین با هدف ارائه کتاب های کمک آموزشی برای دانش آموزان ، کنکوری ها و دانشجویان راه اندازی شده است که قابلیت مشاهده نقد و بررسی مشتریان هر محصول و امتیازات ثبت شده در آنها را دارد.</p>
                                    <div class="mt50">
                                        <a href="../portfolio/Design-online-bookstore-website.html" class="btn btn-port">مشاهده کامل جزییات</a>
                                    </div>
                                </div>
                                <span class="clearfix"></span>
                            </a>
                        </li>
                        <li>
                            <a href="../portfolio/IrBook-Online-Bookstore-website.html">
                                <div class="pic">
                                    <img src="/moderator/assets/response/1000/500/60676a.jpg?url=/moderator/assets/portfolios-58-iranbook-shop-header2.jpg" class="width100" />
                                </div>
                                <div class="desc text-center">
                                    <h4 class="red line-height2 text-medium">فروشگاه اینترنتی کتاب ایران‌بوک</h4>
                                    <p class="mt30 line-height2 text-justify light blog-editor-parent">فروشگاه اینترنتی کتاب یکی از پر طرفدار ترین فروشگاه های آنلاین کشور میباشند که روزانه میلیون ها خرید توسط مردم در این سایت ها به ثبت میرسد و کمک شایانی به پخش کتاب و ناشران کشور شده است.</p>
                                    <div class="mt50">
                                        <a href="../portfolio/IrBook-Online-Bookstore-website.html" class="btn btn-port">مشاهده کامل جزییات</a>
                                    </div>
                                </div>
                                <span class="clearfix"></span>
                            </a>
                        </li>
                        <li>
                            <a href="../portfolio/Naghi-Online-bookstore.html">
                                <div class="pic">
                                    <img src="/moderator/assets/response/1000/500/600df7.jpg?url=/moderator/assets/portfolios-64-naqibook-header.jpg" class="width100" />
                                </div>
                                <div class="desc text-center">
                                    <h4 class="red line-height2 text-medium">فروشگاه اینترنتی کتاب نور‌نقی</h4>
                                    <p class="mt30 line-height2 text-justify light blog-editor-parent">پروژه طراحی فروشگاه اینترنتی کتاب رسان نقی با بهره گیری از سبک طراحی ترکیبی ، فروشگاهی که متفاوت از سبک کاری دیگر فروشگاه های اینترنتی کشور به معرفی و فروش کتاب میپردازد.</p>
                                    <div class="mt50">
                                        <a href="../portfolio/Naghi-Online-bookstore.html" class="btn btn-port">مشاهده کامل جزییات</a>
                                    </div>
                                </div>
                                <span class="clearfix"></span>
                            </a>
                        </li>
                        <li>
                            <a href="../portfolio/Halalbar-beverages-Online-store.html">
                                <div class="pic">
                                    <img src="/moderator/assets/response/1000/500/60e306.jpg?url=/moderator/assets/portfolios-44-halalbar-header.jpg" class="width100" />
                                </div>
                                <div class="desc text-center">
                                    <h4 class="red line-height2 text-medium">فروشگاه اینترنتی نوشیدنی حلال‌بار</h4>
                                    <p class="mt30 line-height2 text-justify light blog-editor-parent">پروژه فروشگاه اینترنتی حلال بار ، به عنوان اولین فروشگاه آنلاین نوشیدنی در ایران توسط فراسو وب به صورت اختصاصی طراحی و برنامه نویسی گردیده. در این فروشگاه امکان خرید عمده و جزئی وجود دارد.</p>
                                    <div class="mt50">
                                        <a href="../portfolio/Halalbar-beverages-Online-store.html" class="btn btn-port">مشاهده کامل جزییات</a>
                                    </div>
                                </div>
                                <span class="clearfix"></span>
                            </a>
                        </li>
                        <li>
                            <a href="../portfolio/Zedhome-wallpapers-Online-store.html">
                                <div class="pic">
                                    <img src="/moderator/assets/response/1000/500/60ab3d.jpg?url=/moderator/assets/portfolios-45-zedhome-header.jpg" class="width100" />
                                </div>
                                <div class="desc text-center">
                                    <h4 class="red line-height2 text-medium">فروشگاه اینترنتی کاغذ دیواری زِدهوم</h4>
                                    <p class="mt30 line-height2 text-justify light blog-editor-parent">گروه zedhome فعالیت خود را از سال ۱۳۸۸ در زمینه طراحی دکوراسیون فضاهای داخلی آغاز نموده و در حال حاضر با توجه به تنوع و گستردگی فروشگاه آنلاین کاغذ دیواری موجود در بازار، اقدام به تاسیس وبسایت نموده</p>
                                    <div class="mt50">
                                        <a href="../portfolio/Zedhome-wallpapers-Online-store.html" class="btn btn-port">مشاهده کامل جزییات</a>
                                    </div>
                                </div>
                                <span class="clearfix"></span>
                            </a>
                        </li>
                        <li>
                            <a href="../portfolio/Charm-Leather-Store-application.html">
                                <div class="pic">
                                    <img src="/moderator/assets/response/1000/500/60cccc.jpg?url=/moderator/assets/portfolios-82-charmineh-app.jpg" class="width100" />
                                </div>
                                <div class="desc text-center">
                                    <h4 class="red line-height2 text-medium">اپلیکیشن فروشگاه اینترنتی چرم</h4>
                                    <p class="mt30 line-height2 text-justify light blog-editor-parent">اپلیکیشن فروشگاه اینترنتی تولید کننده مطرح پوشاک، کیف و کفش سرزمین چرم کرج تهران توسط فراسو وب طراحی و اجرا گردید و از این پس اعضا میتوانند به راحتی فروشگاه آنلاین را جستجو کرده و خرید نمایند.</p>
                                    <div class="mt50">
                                        <a href="../portfolio/Charm-Leather-Store-application.html" class="btn btn-port">مشاهده کامل جزییات</a>
                                    </div>
                                </div>
                                <span class="clearfix"></span>
                            </a>
                        </li>
                        <li>
                            <a href="../portfolio/Metec-Shop-application.html">
                                <div class="pic">
                                    <img src="/moderator/assets/response/1000/500/60f4e0.jpg?url=/moderator/assets/portfolios-76-metec-header.jpg" class="width100" />
                                </div>
                                <div class="desc text-center">
                                    <h4 class="red line-height2 text-medium">اپلیکیشن فروشگاه اینترنتی میتِک</h4>
                                    <p class="mt30 line-height2 text-justify light blog-editor-parent">اپلیکیشن فروشگاه اینترنتی میتِک Metec با هدف فروش لوازم و فروشگاه آنلاین الکترونیکی و آسان ساختن دسترسی به اطلاعات فنی و مورد نیاز ابزار و لوازم الکترونیکی و خرید آنلاین راه اندازی شده است.</p>
                                    <div class="mt50">
                                        <a href="../portfolio/Metec-Shop-application.html" class="btn btn-port">مشاهده کامل جزییات</a>
                                    </div>
                                </div>
                                <span class="clearfix"></span>
                            </a>
                        </li>
                        <li>
                            <a href="../portfolio/Hekmat-Publication-website.html">
                                <div class="pic">
                                    <img src="/moderator/assets/response/1000/500/6054b3.jpg?url=/moderator/assets/portfolios-68-hekmat-header.jpg" class="width100" />
                                </div>
                                <div class="desc text-center">
                                    <h4 class="red line-height2 text-medium">فروشگاه اینترنتی انتشارات حکمت</h4>
                                    <p class="mt30 line-height2 text-justify light blog-editor-parent">فراسو وب با بهره گیری از طراح گرافیکی اختصاصی، cms اختصاصی، اجرای قالب ریسپانسیو و بهینه و در نهایت کدنویسی با استفاده از به روزترین تکنولوژی ها و امنیت بالا مورد اعتماد انتشارات حکمت واقع شد</p>
                                    <div class="mt50">
                                        <a href="../portfolio/Hekmat-Publication-website.html" class="btn btn-port">مشاهده کامل جزییات</a>
                                    </div>
                                </div>
                                <span class="clearfix"></span>
                            </a>
                        </li>
                        <li>
                            <a href="../portfolio/Online-Glasses-Store.html">
                                <div class="pic">
                                    <img src="/moderator/assets/response/1000/500/60d677.jpg?url=/moderator/assets/portfolios-66-ottica-slash.jpg" class="width100" />
                                </div>
                                <div class="desc text-center">
                                    <h4 class="red line-height2 text-medium">فروشگاه اینترنتی عینک اُتیکا</h4>
                                    <p class="mt30 line-height2 text-justify light blog-editor-parent">طراحی این سایت به صورت اختصاصی بوده و دارای فروشگاه پیشرفته ای می باشد که انتخاب و خرید را برای مشتری آسان می کند. جهت مشاهده امکانات فوق العاده خاص این فروشگاه کلیک نمایید.</p>
                                    <div class="mt50">
                                        <a href="../portfolio/Online-Glasses-Store.html" class="btn btn-port">مشاهده کامل جزییات</a>
                                    </div>
                                </div>
                                <span class="clearfix"></span>
                            </a>
                        </li>
                        <li>
                            <a href="../portfolio/Kohanbazar-online-market.html">
                                <div class="pic">
                                    <img src="/moderator/assets/response/1000/500/60f9ae.jpg?url=/moderator/assets/portfolios-69-kohanbazar-header.jpg" class="width100" />
                                </div>
                                <div class="desc text-center">
                                    <h4 class="red line-height2 text-medium">فروشگاه اینترنتی کهن بازار</h4>
                                    <p class="mt30 line-height2 text-justify light blog-editor-parent">کهن بازار قرن کسب و کار اینترنتی جدیدی بوده که با طراحی UX حرفه ای روند خرید کالا را آسوده و امن کرده است. هدف جلب رضایت مشتریان و به فروش رساندن کالاها و خدمات با کیفیت بالا میباشد.</p>
                                    <div class="mt50">
                                        <a href="../portfolio/Kohanbazar-online-market.html" class="btn btn-port">مشاهده کامل جزییات</a>
                                    </div>
                                </div>
                                <span class="clearfix"></span>
                            </a>
                        </li>
                        <li>
                            <a href="../portfolio/Kalakoosh-Online-Store.html">
                                <div class="pic">
                                    <img src="/moderator/assets/response/1000/500/600b4a.jpg?url=/moderator/assets/portfolios-41-kalakoosh-header02.jpg" class="width100" />
                                </div>
                                <div class="desc text-center">
                                    <h4 class="red line-height2 text-medium">فروشگاه اینترنتی کالاکوش</h4>
                                    <p class="mt30 line-height2 text-justify light blog-editor-parent">طراحی سایت فروشگاه اینترنتی کالاکوش از مهر ماه شروع گردید و در تاریخ 26 آبان ماه سال 1394 به پایان رسید. فروشگاه اینترنتی کالاکوش کاملا به صورت اختصاصی و از صفر توسط فراسو وب طراحی شده است.</p>
                                    <div class="mt50">
                                        <a href="../portfolio/Kalakoosh-Online-Store.html" class="btn btn-port">مشاهده کامل جزییات</a>
                                    </div>
                                </div>
                                <span class="clearfix"></span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        
		<div class="pt10"></div>
		<?php $this->load->view('includes/footer'); ?>
</body>
</html>