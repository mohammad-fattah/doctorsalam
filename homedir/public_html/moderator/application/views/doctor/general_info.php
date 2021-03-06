<div class="tab-content">
    <?php echo form_open(get_uri("doctor/save_general_info/" . $user_info->id), array("id" => "general-info-form", "class" => "general-form dashed-row white", "role" => "form")); ?>
    <div class="panel">
        <div class="panel-default panel-heading">
            <h4> <?php echo lang('general_info'); ?></h4>
        </div>
        <div class="panel-body">
            <div class="form-group">
			  <div class=" col-md-6">
                <label for="name" class="col-md-3"><?php echo lang('first_name'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "first_name",
                        "name" => "first_name",
                        "value" => $user_info->first_name,
                        "class" => "form-control",
                        "placeholder" => lang('first_name'),
                    ));
                    ?>
                </div>
              </div>
			  <div class=" col-md-6"> 
				<label for="last_name" class="col-md-3"><?php echo lang('last_name'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "last_name",
                        "name" => "last_name",
                        "value" => $user_info->last_name,
                        "class" => "form-control",
                        "placeholder" => lang('last_name'),
                    ));
                    ?>
                </div>
              </div>
            </div>
			<div class="form-group">
			  <div class=" col-md-6"> 
                <label for="last_name" class="col-md-3"><?php echo lang('melli_code'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "melli_code",
                        "name" => "melli_code",
                        "class" => "form-control",
						"value" => $user_info->melli_code,
                        "placeholder" =>lang('melli_code'),
						"maxlength " => "10",
                    ));
                    ?>
                </div>
              </div>
			  <div class=" col-md-6"> 
			    <label for="phone" class="col-md-3"><?php echo lang('phone'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "phone",
                        "name" => "phone",
						"value" => $user_info->phone,
                        "class" => "form-control",
                        "placeholder" => lang('phone')
                    ));
                    ?>
                </div>
			  </div>
            </div>
			<div class="form-group">
			  <div class=" col-md-6">
                <label for="name" class="col-md-3"><?php echo lang('email'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "email",
                        "name" => "email",
                        "value" => $user_info->email,
                        "class" => "form-control",
                        "placeholder" =>lang('email'),
                    ));
                    ?>
                </div>
              </div>
			  <div class=" col-md-6">
			  </div>
            </div>
			<div class="form-group">
			  <div class=" col-md-6">
                <label for="last_name" class="col-md-3"><?php echo lang('state'); ?></label>
                <div class="col-md-9">
					<select class="select2" id="state" name="state" onchange="Func()">
                            <option value="<?php echo $user_info->state; ?>" data-name="<?php echo $user_info->state; ?>" selected><?php echo $user_info->state; ?></option>
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
			  <div class=" col-md-6">
			    <label for="last_name" class="col-md-3"><?php echo lang('city'); ?></label>
                <div class="col-md-9">
					<select class="select2" id="city" name="city">
                     <option value="<?php echo $user_info->city; ?>" selected><?php echo $user_info->city; ?></option>
                    </select>
                </div>
			  </div>
            </div>
			<div class="form-group">
			  <div class=" col-md-6">
                <label for="last_name" class="col-md-3">تخصص</label>
                <div class="col-md-9">
					<select class="select2" id="specialty" name="specialty" onClick="ChangeSpecialty()">
					 <option value="">انتخاب تخصص</option>
					 <?php for($i = 0 ; $i < count($specialty) ; $i++): ?>
					  <option value="<?php echo $specialty[$i]->site_link; ?>" <?php if($user_info->specialty == $specialty[$i]->site_link): echo 'selected'; endif; ?>><?php echo $specialty[$i]->name; ?></option>
					 <?php endfor; ?>
					</select>
                </div>
              </div>
			  <script>
			   function ChangeSpecialty(){
				 //alert($('#specialty').val())
				 $.ajax({
				   type:"GET",
				   url:"/moderator/doctor/sub_specialty/doctor",
				   success:function(msg){
					   var d = msg.data[0];
					   alert(d[0])
				   }
				 })
			   }
			  </script>
			  <div class=" col-md-6">
			    <label for="last_name" class="col-md-3">زیر تخصص</label>
                <div class="col-md-9">
					<select class="select2" id="sub_specialty" name="sub_specialty">
                     <option value="">انتخاب زیر تخصص</option>
                    </select>
                </div>
			  </div>
            </div>
			<div class="form-group">
			  <div class=" col-md-6">
                <label for="last_name" class=" col-md-3"><?php echo lang('address'); ?></label>
                <div class=" col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "address",
                        "name" => "address",
						"value" => $user_info->address,
                        "class" => "form-control",
                        "placeholder" => lang('address'),
                    ));
                    ?>
                </div>
              </div>
			  <div class=" col-md-6">
              </div>
            </div>
            <div class="form-group">
			  <div class=" col-md-6">
                <label for="last_name" class=" col-md-3">درباره دکتر</label>
                <div class=" col-md-9">
				    <textarea id="comment" name="comment" style="width:100%;height:150px;border-radius:5px;border:1px solid #efefef"><?php echo $user_info->comment; ?></textarea>
                </div>
              </div>
			  <div class=" col-md-6">
              </div>
            </div>
            <div class="form-group">
			 <div class=" col-md-6">
                <label for="gender" class=" col-md-3"><?php echo lang('gender'); ?></label>
                <div class="col-md-3">
                    <?php
                    echo form_radio(array(
                        "id" => "gender_male",
                        "name" => "gender",
                        "data-msg-required" => lang("field_required"),
                            ), "male", ($user_info->gender === "female") ? false : true);
                    ?>
                    <label for="gender_male" ><?php echo lang('male'); ?></label> <br><br>
					<?php
                      echo form_radio(array(
                        "id" => "gender_female",
                        "name" => "gender",
                        "data-msg-required" => lang("field_required"),
                            ), "female", ($user_info->gender === "female") ? true : false);
                    ?>
                    <label for="gender_female" class=""><?php echo lang('female'); ?></label>
                </div>
            </div>
          </div>
        </div>
        <div class="panel-footer">
            <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span> <?php echo lang('save'); ?></button>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#general-info-form").appForm({
            isModal: false,
            onSuccess: function (result) {
                appAlert.success(result.message, {duration: 10000});
                
            }
        });
        $("#general-info-form .select2").select2();
        setDatePicker("#dob");

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