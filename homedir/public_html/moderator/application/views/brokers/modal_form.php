<?php echo form_open(get_uri("brokers/add_client"), array("id" => "team_member-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">

    <div class="tab-content mt15">
        <div role="tabpanel" class="tab-pane active" id="general-info-tab">
            <div class="form-group">
                <label for="name" class=" col-md-3"><?php echo lang('first_name'); ?></label>
                <div class=" col-md-9">
				    
                    <?php
                    echo form_input(array(
                        "id" => "first_name",
                        "name" => "first_name",
                        "class" => "form-control",
                        "placeholder" => lang('first_name'),
                        "autofocus" => true,
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="last_name" class=" col-md-3"><?php echo lang('last_name'); ?></label>
                <div class=" col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "last_name",
                        "name" => "last_name",
                        "class" => "form-control",
                        "placeholder" => lang('last_name'),
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
			<div class="form-group">
                <label for="last_name" class=" col-md-3">کد ملی</label>
                <div class=" col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "melli_code",
                        "name" => "melli_code",
                        "class" => "form-control",
                        "placeholder" => "کد ملی",
						"maxlength " => "10",
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="phone" class=" col-md-3"><?php echo lang('phone'); ?></label>
                <div class=" col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "phone",
                        "name" => "phone",
						"maxlength " => "11",
                        "class" => "form-control",
                        "placeholder" => lang('phone')
                    ));
                    ?>
                </div>
            </div>
			<div class="form-group">
                <label for="email" class=" col-md-3">آدرس مجازی</label>
                <div class=" col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "skype",
                        "name" => "skype",
                        "class" => "form-control",
                        "placeholder" => "آدرس مجازی",
                        "autofocus" => true,
                    ));
                    ?>
                </div>
            </div>
			<div class="form-group">
                <label for="last_name" class=" col-md-3">استان</label>
                <div class=" col-md-9">
                    	<select class="select2" id="state" name="state" onchange="Func()">
                            <option value="البرز" data-name="انتخاب شهر , آسارا , اشتهارد , چهارباغ , شهر جدید هشتگرد , طالقان , کرج , کمال&zwnj;شهر , کوهسار , گرمدره , ماهدشت , محمدشهر , مشکین&zwnj;دشت , نظرآباد , هشتگرد">البرز</option>
                            <option value="آذربایجان شرقی" data-name="انتخاب شهر , آبش&zwnj;احمد , آذرشهر , آقکند , اسکو , اهر , ایلخچی , باسمنج , بخشایش , بستان&zwnj;آباد , بناب , بناب جدید , تبریز , ترک , ترکمانچایتسوج , تیکمه&zwnj;داش , جلفا , خاروانا , خامنه , خراجو , خسروشهر , خضرلو , خمارلو , خواجه , دوزدوزان , زرنق , زنوز , سراب , سردرود , سهند , سیس , سیه&zwnj;رود , شبستر , شربیان , شرفخانه , شندآباد , صوفیان , عجب&zwnj;شیر , قره&zwnj;آغاج , کشکسرای , کلوانق , کلیبر , کوزه&zwnj;کنان , گوگان , لیلان , مراغه , مرند , ملکان , ملک&zwnj;کیان , ممقان , مهربان , میانه , نظرکهریزی , وایقان , ورزقان , هادیشهر , هرگلان , هریس , هشترود , هوراند , یامچی">آذربایجان شرقی</option>
                            <option value="آذربایجان غربی" data-name="انتخاب شهر , آواجیق , ارومیه , اشنویه , ایواوغلی , باروق , بازرگان , بوکان , پلدشت , پیرانشهر , تازه&zwnj;شهر , تکاب , چهاربرج , خوی , ربط , سردشت , سرو , سلماس , سیلوانه , سیمینه , سیه&zwnj;چشمه , شاهین&zwnj;دژ , شوط , فیرورق , قره&zwnj;ضیاءالدین , قوشچی , کشاورز , گردکشانه , ماکو , محمدیار , محمودآباد , مهاباد , میاندوآب , میرآباد , نالوس , نقده , نوشین&zwnj;شهر">آذربایجان غربی</option>
                            <option value="اردبیل" data-name="انتخاب شهر , خلخال , آبی&zwnj;بیگلو , اردبیل , اصلاندوز , بیله&zwnj;سوار , پارس&zwnj;آباد , تازه&zwnj;کند , تازه&zwnj;کند انگوت , جعفرآباد , رضی , سرعین , عنبران , فخرآباد , کلور , کوراییم , گرمی , گیوی , لاهرود , مشگین&zwnj;شهر , نمین , نیر , هشتجین , هیر">اردبیل</option>
                            <option value="اصفهان" data-name="انتخاب شهر , ابریشم , اردستان , اژیه , اصفهان , افوس , انارک , ایمان&zwnj;شهر , بادرود , باغ بهادران , برف&zwnj;انبار , بهاران&zwnj;شهر , بهارستان , بویین و میاندشت , پیربکران , تودشک , تیران , جندق , جوزدان , چادگان , چرمهین , چم گردان , حبیب&zwnj;آباد , حسن&zwnj;آباد , حنا , خالدآباد , خمینی&zwnj;شهر , خوانسار , خور , خوراسگان , خورزوق , داران , دامنه , درچه&zwnj;پیاز , دستگرد , دهاقان , دهق , دولت&zwnj;آباد , دیزیچه , رزوه , رضوان&zwnj;شهر , زاینده&zwnj;رود , زرین&zwnj;شهر , زواره , زیباشهر , سده لنجان , سگزی , سمیرم , شاهین&zwnj;شهر , شهرضا , طالخونچه , عسگران , علویجه , فریدون&zwnj;شهر , فلاورجان , فولادشهر , قهدریجان , کاشان , کرکوند , کلیشاد و سودرجان , کمشجه , کمه , کهریزسنگ , کوشک , کوهپایه , گز , گلپایگان , گل&zwnj;دشت , گل&zwnj;شهر , گوگد , مبارکه , محمدآباد , مشکات , منظریه , مهاباد , میمه , نایین , نجف&zwnj;آباد , نصرآباد , نطنز , نیک&zwnj;آباد , ورزنه , ورنامخواست , وزوان , ونک , هرند">اصفهان</option>
                            <option value="ایلام" data-name="انتخاب شهر , آبدانان , آسمان&zwnj;آباد , ارکواز , ایلام , ایوان , بدره , پهله , توحید , چوار , دره&zwnj;شهر , دلگشا , دهلران , زرنه , سرابله , سراب&zwnj;باغ , صالح&zwnj;آباد , لومار , مورموری , موسیان , مهران , میمه">ایلام</option>
                            <option value="بوشهر" data-name="انتخاب شهر , آب&zwnj;پخش , آبدان , امام حسن , اهرم , برازجان , بردخون , بردستان , بندر بوشهر , بندر دیر , بندر دیلم , بندر ریگ , بندر کنگان , بندر گناوه , تنگ ارم , جم , چغادک , خارک , خورموج , دالکی , دلوار , ریز , سعدآباد , شبانکاره , شنبه , طاهری , عسلویه , کاکی , کلمه , نخل تقی , وحدتیه">بوشهر</option>
                            <option value="تهران" data-name="انتخاب شهر , آبسرد , آبعلی , ارجمند , اسلام&zwnj;شهر , اندیشه , باغستان , باقرشهر , بومهن , پاکدشت , پردیس , پیشوا , تجریش , تهران , جوادآباد , چهاردانگه , حسن&zwnj;آباد , دماوند , رباطکریم , رودهن , شاهدشهر , شریف&zwnj;آباد , شهرری , شهریار , صالح&zwnj;آباد , صباشهر , صفادشت , فردوسیه , فشم , فیروزکوه , قدس , قرچک , کهریزک , کیلان , گلستان , لواسان , ملارد , نسیم&zwnj;شهر , نصیرآباد , وحیدیه , ورامین">تهران</option>
                            <option value="چهارمحال و بختیاری" data-name="انتخاب شهر , اردل , آلونی , باباحیدر , بروجن , بلداجی , بن , جونقان , چلگرد , سامان , سفیددشت , سودجان , سورشجان , شلمزار , شهرکرد , طاقانک , فارسان , فرادنبه , فرخ&zwnj;شهر , کیان , گندمان , گهرو , لردگان , مال&zwnj;خلیفه , ناغان , نافچ , نقنه , هفشجان">چهارمحال و بختیاری</option>
                            <option value="خراسان جنوبی" data-name="انتخاب شهر , آرین&zwnj;شهر , ارسک , اسدیه , اسفدن , اسلامیه , آیسک , بشرویه , بیرجند , حاجی&zwnj;آباد , خضری دشت بیاض , خوسف , زهان , سرایان , سربیشه , سه&zwnj;قلعه , شوسف , طبس مسینا , فردوس , قائن , قهستان , مود , نهبندان , نیمبلوک">خراسان جنوبی</option>
                            <option value="خراسان رضوی" data-name="انتخاب شهر , انابد , باجگیران , بار , باخرز , بایگ , بجستان , بردسکن , بیدخت , تایباد , تربت جام , تربت حیدریه , جغتای , جنگل , چاپشلو , چکنه , چناران , خرو , خلیل&zwnj;آباد , خواف , داورزن , دررود , درگز , دولت&zwnj;آباد , رباط سنگ , رشتخوار , رضویه , رودآب , ریوش , سبزوار , سرخس , سلامی , سلطان&zwnj;آباد , سنگان , شادمهر , شاندیز , ششتمد , شهرآباد , صالح&zwnj;آباد , طرقبه , عشق&zwnj;آباد , فرهادگرد , فریمان , فیروزه , فیض&zwnj;آباد , قاسم&zwnj;آباد , قدمگاه , قلندرآباد , قوچان , کاخک , کاریز , کاشمر , کدکن , کلات , کندر , گناباد , لطف&zwnj;آباد , مشهد , مشهد ریزه , ملک&zwnj;آباد , نشتیفان , نصرآباد , نقاب , نوخندان , نیشابور , نیل&zwnj;شهر , همت&zwnj;آباد">خراسان رضوی</option>
                            <option value="خراسان شمالی" data-name="انتخاب شهر , آشخانه , اسفراین , بجنورد , پیش&zwnj;قلعه , جاجرم , حصار گرم&zwnj;خان , درق , راز , سنخواست , شوقان , شیروان , صفی&zwnj;آباد , فاروج , قاضی , گرمه , لوجلی">خراسان شمالی</option>
                            <option value="خوزستان" data-name="انتخاب شهر , آبادان , آغاجاری , اروندکنار , الوان , امیدیه , اندیمشک , اهواز , ایذه , باغ&zwnj;ملک , بستان , بندر امام خمینی , بندر ماهشهر , بهبهان , جایزان , جنت&zwnj;مکان , چمران , حر ریاحی , حسینیه , حمیدیه , خرمشهر , دزآب , دزفول , دهدز , رامشیر , رامهرمز , رفیع , زهره , سالند , سردشت , سوسنگرد , شادگان , شوش , شوشتر , شیبان , صفی&zwnj;آباد , صیدون , قلعه خواجه , قلعه&zwnj;تل , گتوند , لالی , مسجدسلیمان , مقاومت , ملاثانی , میانرود , مینوشهر , هفتگل , هندیجان , هویزه , ویس">خوزستان</option>
                            <option value="زنجان" data-name="انتخاب شهر , آب&zwnj;بر , ابهر , ارمغان&zwnj;خانه , چورزق , حلب , خرمدره , دندی , زرین&zwnj;آباد , زرین&zwnj;رود , زنجان , سجاس , سلطانیه , سهرورد , صائین&zwnj;قلعه , قیدار , گرماب , ماه&zwnj;نشان , هیدج ">زنجان</option>
                            <option value="سمنان" data-name="انتخاب شهر , آرادان , امیریه , ایوانکی , بسطام , بیارجمند , دامغان , درجزین , دیباج , سرخه , سمنان , شاهرود , شهمیرزاد , کلاته خیج , گرمسار , مجن , مهدی&zwnj;شهر , میامی">سمنان</option>
                            <option value="سیستان و بلوچستان" data-name="انتخاب شهر , ادیمی , اسپکه , ایرانشهر , بزمان , بمپور , بنت , بنجار , پیشین , جالق , چابهار , خاش , دوست&zwnj;محمد , راسک , زابل , زابلی , زاهدان , زهک , سراوان , سرباز , سوران , سیرکان , فنوج , قصرقند , کنارک , گلمورتی , محمد&zwnj;آباد , میرجاوه , نصرت&zwnj;آباد , نگور , نوک&zwnj;آباد , نیک&zwnj;شهر">سیستان و بلوچستان</option>
                            <option value="فارس" data-name="انتخاب شهر , آباده , آباده طشک , اردکان , ارسنجان , استهبان , اسیر , اشکنان , افزر , اقلید , اهل , اوز , ایج , ایزدخواست , باب انار , بالاده , بنارویه , بهمن , بیرم , بیضا , جنت&zwnj;شهر , جهرم , جویم , حاجی&zwnj;آباد , خاوران , خرامه , خشت , خنج , خور , خومه&zwnj;زار , داراب , داریان , دوزه , دهرم , رامجرد , رونیز , زاهدشهر , زرقان , سده , سروستان , سعادت&zwnj;شهر , سورمق , سوریان , سیدان , ششده , شهرپیر , شیراز , صغاد , صفاشهر , علامرودشت , فتح&zwnj;آباد , فراشبند , فسا , فیروزآباد , قائمیه , قادرآباد , قطب&zwnj;آباد , قیر , کازرون , کامفیروز , کره&zwnj;ای , کنارتخته , کوار , گراش , گله&zwnj;دار , لارستان , لامرد , لپوئی , لطیفی , مرودشت , مشکان , مصیری , مهر , میمند , نوجین , نودان , نورآباد , نی&zwnj;ریز , وراوی , هماشهر">فارس</option>
                            <option value="قزوین" data-name="انتخاب شهر , آبگرم , آبیک , آوج , ارداق , اسفرورین , اقبالیه , الوند , بوئین&zwnj;زهرا , بیدستان , تاکستان , خاکعلی , خرمدشت , دانسفهان , رازمیان , سگزآباد , سیردان , شال , ضیاءآباد , قزوین , کوهین , محمدیه , محمودآباد نمونه , معلم&zwnj;کلایه , نرجه">قزوین</option>
                            <option value="قم" data-name="انتخاب شهر , جعفریه , دستجرد , سلفچگان , قم , قنوات , کهک">قم</option>
                            <option value="کردستان" data-name="انتخاب شهر , آرمرده , بابارشانی , بانه , بلبان&zwnj;آباد , بویین سفلی , بیجار , چناره , دزج , دلبران , دهگلان , دیواندره , زرینه , سروآباد , سریش&zwnj;آباد , سقز , سنندج , شویشه , صاحب , قروه , کامیاران , کانی&zwnj;دینار , کانی&zwnj;سور , مریوان , موچش , یاسوکند">کردستان</option>
                            <option value="کرمان" data-name="انتخاب شهر , اختیارآباد , ارزوئیه , امین&zwnj;شهر , انار , اندوهجرد , باغین , بافت , بردسیر , بروات , بزنجان , بم , بهرمان , پاریز , جبالبارز , جوزم , جوپار , جیرفت , چترود , خاتون&zwnj;آباد , خانوک , خرسند , درب بهشت , دهج , رابر , راور , راین , رفسنجان , رودبار , ریحان&zwnj;شهر , زرند , زنگی&zwnj;آباد , زیدآباد , سیرجان , شهداد , شهربابک , صفائیه , عنبرآباد , فاریاب , فهرج , قلعه گنج , کاظم&zwnj;آباد , کرمان , کشکوئیه , کهنوج , کوهبنان , کیان&zwnj;شهر , گلباف , گلزار , ماهان , محمدآباد , محی&zwnj;آباد , مردهک , مس سرچشمه , منوجان , نجف&zwnj;شهر , نرماشیر , نظام&zwnj;شهر , نگار , نودژ , هجدک , یزدان&zwnj;شهر">کرمان</option>
                            <option value="کرمانشاه" data-name="انتخاب شهر , ازگله , اسلام&zwnj;آباد غرب , باینگان , بیستون , پاوه , تازه&zwnj;آباد , جوانرود , حمیل , رباط , روانسر , سرپل ذهاب , سرمست , سطر , سنقر , سومار , صحنه , قصر شیرین , کرمانشاه , کرند غرب , کنگاور , کوزران , گهواره , گیلانغرب , میان&zwnj;راهان , نودشه , نوسود , هرسین , هلشی">کرمانشاه</option>
                            <option value="کهکیلویه و بویراحمد" data-name="انتخاب شهر , باشت , پاتاوه , چرام , چیتاب , دهدشت , دوگنبدان , دیشموک , سوق , سی&zwnj;سخت , قلعه رئیسی , گراب سفلی , لنده , لیکک , مارگون , یاسوج">کهگیلویه و بویراحمد</option>
                            <option value="گلستان" data-name="انتخاب شهر , آزادشهر ,آق&zwnj;قلا ,بندر گز ,ترکمن ,رامیان ,علی&zwnj;آباد ,کردکوی ,کلاله ,گرگان ,گنبد کاووس ,مراوه&zwnj;تپه ,مینودشت">گلستان</option>
                            <option value="گیلان" data-name="انتخاب شهر , آستارا , آستانه اشرفیه , احمدسرگوراب , اسالم , اطاقور , املش , بازارجمعه , بره&zwnj;سر , بندر انزلی , پره&zwnj;سر , توتکابن , جیرنده , چابکسر , چاف و چمخاله , چوبر , حویق , خشکبیجار , خمام , دیلمان , رانکوه , رحیم&zwnj;آباد , رستم&zwnj;آباد , رشت , رضوانشهر , رودبار , رودسر , رودبنه , سنگر , سیاهکل , شفت , شلمان , صومعه&zwnj;سرا , فومن , کلاچای , کوچصفهان , کومله , کیاشهر , گوراب زرمیخ , لاهیجان , لشت نشا , لنگرود , لوشان , لوندویل , لیسار , ماسال , ماسوله , مرجغل , منجیل , واجارگاه , هشتپر">گیلان</option>
                            <option value="لرستان" data-name="انتخاب شهر , زنا , اشترینان , الشتر , الیگودرز , بروجرد , پل&zwnj;دختر , چالانچولان , چغلوندی , چقابل , خرم&zwnj;آباد , درب گنبد , دورود , زاغه , سپیددشت , سراب&zwnj;دوره , فیروزآباد , کونانی , کوهدشت , گراب , معمولان , مومن&zwnj;آباد , نورآباد , ویسیان">لرستان</option>
                            <option value="مازندران" data-name="انتخاب شهر , آلاشت , آمل , امیرشهر , ایزدشهر , بابل , بابلسر , بلده , بهشهر , بهنمیر , پل سفید , تنکابن , جویبار , چالوس , چمستان , خرم&zwnj;آباد , خلیل&zwnj;شهر , خوش&zwnj;رودپی , دابودشت , رامسر , رستمکلا , رویان , رینه , زرگرمحله , زیرآب , ساری , سرخ&zwnj;رود , سلمان&zwnj;شهر , سورک , شیرگاه , شیرود , عباس&zwnj;آباد , فریدون&zwnj;کنار , فریم , قائم&zwnj;شهر , کتالم و سادات&zwnj;شهر , کلارآباد , کلاردشت , کله&zwnj;بست , کوهی&zwnj;خیل , کیاسر , کیاکلا , گزنک , گلوگاه , گلوگاه بابل , گتاب , محمودآباد , مرزن&zwnj;آباد , مرزیکلا , نشتارود , نکا , نور , نوشهر">مازندران</option>
                            <option value="مرکزی" data-name="انتخاب شهر , اراک , آستانه , آشتیان , پرندک , تفرش , توره , خمین , خنداب , داودآباد , دلیجان , رازقان , زاویه , بیمیتکه , سنجانشازند , غرق&zwnj;آباد , فرمهین , قورچی&zwnj;باشی , کرهرود , کمیجان , مأمونیه , محلات , میلاجرد , نراق , نوبران , نیم&zwnj;ورهندودر">مرکزی</option>
                            <option value="هرمزگان" data-name="انتخاب شهر , ابوموسی , بستک , بندر چارک , بندر خمیر , بندرعباس , بندر لنگه , پارسیان , جاسک , جناح , حاجی&zwnj;آباد , درگهاندهبارز , رویدر , زیارت&zwnj;علی , سندرک , سوزا , سیریک , فارغان , فین , قشم , کنگ , کیش , هرمز , هشت&zwnj;بندیمیناب">هرمزگان</option>
                            <option value="همدان" data-name="انتخاب شهر , ازندریان , اسدآباد , برزول , بهار , تویسرکان , جورقان , جوکار , دمق , رزن , زنگنه , سامن , سرکان , شیرین&zwnj;سو , صالح&zwnj;آباد , فامنین , فرسفج , فیروزان , قروه درجزین , قهاوند , کبودرآهنگ , گل&zwnj;تپه , گیان , لالجین , مریانج , ملایر , مهاجران , نهاوند , همدان">همدان</option>
                            <option value="یزد" data-name="انتخاب شهر , ابرکوه , احمدآباد , اردکان , اشکذر , بافق , بهاباد , تفت , حمیدیا , خضرآباد , دیهوک , زارچ , شاهدیه , طبس , عشق&zwnj;آباد , عقدا , مروست , مهردشت , مهریز , میبد , ندوشن , نیر , هرات , یزد">یزد</option>
                            </select>
                
                </div>
            </div>
			<div class="form-group">
                <label for="last_name" class=" col-md-3">شهر</label>
                <div class=" col-md-9">
                    <select class="select2" id="city" name="city">
                    </select>
                </div>
            </div>
			<div class="form-group">
                <label for="last_name" class=" col-md-3">آدرس</label>
                <div class=" col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "address",
                        "name" => "address",
                        "class" => "form-control",
                        "placeholder" => "آدرس",
                    ));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="gender" class=" col-md-3"><?php echo lang('gender'); ?></label>
                <div class=" col-md-9">
                    <?php
                    echo form_radio(array(
                        "id" => "gender_male",
                        "name" => "gender",
                            ), "male", true);
                    ?>
                    <label for="gender_male"><?php echo lang('male'); ?></label> 
					<br>
					<?php
                    echo form_radio(array(
                        "id" => "gender_female",
                        "name" => "gender",
                            ), "female", false);
                    ?>
                    <label for="gender_female" class=""><?php echo lang('female'); ?></label>
                </div>
            </div>
			<div class="form-group">
                <label for="email" class=" col-md-3"><?php echo lang('email'); ?></label>
                <div class=" col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "email",
                        "name" => "email",
                        "class" => "form-control",
                        "placeholder" => lang('email'),
                        "autofocus" => true,
                        "autocomplete" => "off",
                        "data-rule-email" => true,
                        "data-msg-email" => lang("enter_valid_email"),
                    ));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-md-3"><?php echo lang('password'); ?></label>
                <div class=" col-md-8">
                    <div class="input-group" style="width:100%">
                        <?php
                        echo form_password(array(
                            "id" => "password",
                            "name" => "password",
                            "class" => "form-control",
                            "placeholder" => lang('password'),
                            "autocomplete" => "off",
                            "data-rule-required" => true,
                            "data-msg-required" => lang("field_required"),
                            "data-rule-minlength" => 6,
                            "data-msg-minlength" => lang("enter_minimum_6_characters"),
                            "autocomplete" => "off",
                            "style" => "z-index:auto;"
                        ));
                        ?>
                        <label for="password" class="input-group-addon clickable" id="generate_password" style="width:110px;max-width:110px"><span class="fa fa-key"></span>ساخت پسورد</label>
                    </div>
                </div>
                <div class="col-md-1 p0">
                    <a href="#" id="show_hide_password" class="btn btn-default" title="<?php echo lang('show_text'); ?>" style="margin-top:0px"><span class="fa fa-eye"></span></a>
                </div>
            </div>
        
            
        <?php $this->load->view("custom_fields/form/prepare_context_fields", array("custom_fields" => $custom_fields, "label_column" =>"col-md-3", "field_column" => " col-md-9")); ?> 
            
        </div>
    </div>

</div>


<div class="modal-footer">
    <button class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> <?php echo lang('close'); ?></button>
    <button id="form-submit" type="button" class="btn btn-primary "><span class="fa fa-check-circle"></span> <?php echo lang('save'); ?></button>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">
    $(document).ready(function() {
        $("#team_member-form").appForm({
            onSuccess: function(result) {
                if (result.success) {
                    $("#team_member-table").appTable({newData: result.data, dataId: result.id});
                }
            },
            onSubmit: function() {
                $("#form-previous").attr('disabled', 'disabled');
            },
            onAjaxSuccess: function() {
                $("#form-previous").removeAttr('disabled');
            }
        });

        $("#team_member-form input").keydown(function(e) {
            if (e.keyCode === 13) {
                e.preventDefault();
                if ($('#form-submit').hasClass('hide')) {
                    $("#form-next").trigger('click');
                } else {
                    $("#team_member-form").trigger('submit');
                }
            }
        });
        $("#first_name").focus();
        $("#team_member-form .select2").select2();

        setDatePicker("#date_of_hire");

        $("#form-previous").click(function() {
            var $generalTab = $("#general-info-tab"),
                    $jobTab = $("#job-info-tab"),
                    $accountTab = $("#account-info-tab"),
                    $previousButton = $("#form-previous"),
                    $nextButton = $("#form-next"),
                    $submitButton = $("#form-submit");

            if ($accountTab.hasClass("active")) {
                $accountTab.removeClass("active");
                $jobTab.addClass("active");
                $nextButton.removeClass("hide");
                $submitButton.addClass("hide");
            } else if ($jobTab.hasClass("active")) {
                $jobTab.removeClass("active");
                $generalTab.addClass("active");
                $previousButton.addClass("hide");
                $nextButton.removeClass("hide");
                $submitButton.addClass("hide");
            }
        });

        $("#form-next").click(function() {
            var $generalTab = $("#general-info-tab"),
                    $jobTab = $("#job-info-tab"),
                    $accountTab = $("#account-info-tab"),
                    $previousButton = $("#form-previous"),
                    $nextButton = $("#form-next"),
                    $submitButton = $("#form-submit");
            if (!$("#team_member-form").valid()) {
                return false;
            }
            if ($generalTab.hasClass("active")) {
                $generalTab.removeClass("active");
                $jobTab.addClass("active");
                $previousButton.removeClass("hide");
                $("#form-progress-bar").width("35%");
                $("#general-info-label").find("i").removeClass("fa-circle-o").addClass("fa-check-circle");
                $("#team_member_id").focus();
            } else if ($jobTab.hasClass("active")) {
                $jobTab.removeClass("active");
                $accountTab.addClass("active");
                $previousButton.removeClass("hide");
                $nextButton.addClass("hide");
                $submitButton.removeClass("hide");
                $("#form-progress-bar").width("72%");
                $("#job-info-label").find("i").removeClass("fa-circle-o").addClass("fa-check-circle");
                $("#username").focus();
            }
        });

        $("#form-submit").click(function() {
            $("#team_member-form").trigger('submit');
        });

        $("#generate_password").click(function() {
            $("#password").val(getRndomString(8));
        });

        $("#show_hide_password").click(function() {
            var $target = $("#password"),
                    type = $target.attr("type");
            if (type === "password") {
                $(this).attr("title", "<?php echo lang("hide_text"); ?>");
                $(this).html("<span class='fa fa-eye-slash'></span>");
                $target.attr("type", "text");
            } else if (type === "text") {
                $(this).attr("title", "<?php echo lang("show_text"); ?>");
                $(this).html("<span class='fa fa-eye'></span>");
                $target.attr("type", "password");
            }
        });

        $("#user-role").change(function() {
            if ($(this).val() === "admin") {
                $("#user-role-help-block").removeClass("hide");
            } else {
                $("#user-role-help-block").addClass("hide");
            }
        });
    });
</script>
<script>
function Func() {
var city = document.getElementById('city');
var state=document.getElementById('state');
var val=state.options[state.selectedIndex].getAttribute('data-name');
var arr=val.split(',');
city.options.length = 0;
for(i = 0; i < arr.length; i++)
{
if(arr[i] != "")
{
city.options[city.options.length]=new Option(arr[i],arr[i]);
}
}
}
</script>