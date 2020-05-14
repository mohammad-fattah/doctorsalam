<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
    <title>سامانه آنلاین خرید بیمه | <?php echo $site_name; ?></title>
	<meta name="description" content="قیمت انواع بیمه زلزله خودرو از شرکت بیمه ایران , بیمه البرز , بیمه آسیا , بیمه پارسیان , بیمه سامان , بیمه پاسارگاد , بیمه دانا از سامانه جامع آنلاین خرید بیمه"/>
	<link href="/moderator/assets/site/img/ico.png" rel="shortcut icon" type="image/x-icon" />
    <meta name="theme-color" content="#0f2d63">
	<link rel='stylesheet' type='text/css' href='/moderator/assets/site/css/main.css'>
	<link rel='stylesheet' type='text/css' href='/moderator/assets/site/css/styles.css'>
    <link rel="stylesheet" type="text/css" href="/moderator/assets/site/css/master.css">
    <link rel="stylesheet" href="/moderator/assets/site/lib/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="/moderator/assets/site/css/persian-datepicker.min.css">
    <link rel="stylesheet" href="/moderator/assets/site/lib/owlslider/moderator/assets/site/owl.theme.default.min.css">
    <link rel="stylesheet" href="/moderator/assets/site/lib/owlslider/moderator/assets/site/owl.carousel.min.css">
    <link rel="stylesheet" href="/moderator/assets/site/lib/animate/animate.min.css">
    <link rel="stylesheet" href="/moderator/assets/site/lib/scrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="/moderator/assets/site/css/face3.css">
    <link rel="stylesheet" href="/moderator/assets/site/main.b2a96882.css">
	<style>.login,.signup{display:none}#index-index-page main>#map,#index-index-page main>nav{box-sizing:border-box;width:49%;margin-right:5.5%;float:right}#index-index-page main>#map:first-child,#index-index-page main>nav:first-child{width:100%;margin-right:0}#index-index-page main>#map:last-child,#index-index-page main>nav:last-child{padding-top:0;width:36%;margin-left:4%}#index-index-page main>#map h1,#index-index-page main>nav h1{white-space:nowrap}#index-index-page main>#map .introtext,#index-index-page main>nav .introtext{font-size:.9rem}#index-index-page main>#map .blue,#index-index-page main>nav .blue{color:#0078c1}#map [data-map] path{fill:#fde428;stroke:#fff;stroke-width:.03rem}.shake.inline,li.shake{display:inline-block}@-webkit-keyframes spaceboots{0%{-webkit-transform:translate(2px,1px) rotate(0)}10%{-webkit-transform:translate(-1px,-2px) rotate(-1deg)}20%{-webkit-transform:translate(-3px,0) rotate(1deg)}30%{-webkit-transform:translate(0,2px) rotate(0)}40%{-webkit-transform:translate(1px,-1px) rotate(1deg)}50%{-webkit-transform:translate(-1px,2px) rotate(-1deg)}60%{-webkit-transform:translate(-3px,1px) rotate(0)}70%{-webkit-transform:translate(2px,1px) rotate(-1deg)}80%{-webkit-transform:translate(-1px,-1px) rotate(1deg)}90%{-webkit-transform:translate(2px,2px) rotate(0)}100%{-webkit-transform:translate(1px,-2px) rotate(-1deg)}}.shake:focus,.shake:hover{-webkit-animation-name:spaceboots;-webkit-animation-duration:.8s;-webkit-transform-origin:50% 50%;-webkit-animation-iteration-count:infinite;-webkit-animation-timing-function:linear}.ant-col-md-16{display:block;-webkit-box-sizing:border-box;box-sizing:border-box;width:66.66666667%}.modalmenu input,.signin-input-pass{display:block;border:1px solid #648cbb;padding:10px 0;text-align:center;width:100%;font-size:14px;background:#fff;border-radius:3px;color:#333;height:40px;margin:0 auto 20px;box-shadow:none}.modalmenu .button.signin{display:block;padding:10px;text-align:center;font-size:14px;width:100%;background:#648cbb;border:1px solid #648cbb;border-radius:3px;color:#fff}.colm{float:right}.main_header .main_menu ul li.logo12{height:50px;line-height:50px;padding:0}
	</style>
	<script type="text/javascript" src="/moderator/assets/site/js/jquery.min.js"></script>
	<script src="/moderator/assets/site/js/jquery.number.min.js"></script>
	<script type="text/javascript" src="/moderator/assets/site/js/typed.js"></script>
	<style>@media only screen and (min-width: 500px){.b3fire{margin:0}}.error{border-color:red!important}</style>
    <script>
	   $(document).ready(function() {
	  
  $(".datepicker").pDatepicker({
	  autoClose:true
  });
  });
        $(function() {
            $(".element").typed({
                strings: ["صدور تخصص در ۲۴ ساعت شبانه روز","سامانه تخصصی استعلام , مقایسه , مشاوره و خرید انواع تخصص ها تنها با چند کلیک","ارسال رایگان تخصص و در کوتاهترین زمان ممکن"],
                typeSpeed: 120,
                backDelay: 2000,
                loop: true
            });
        });
		function remember(){
		 var data=$('#remember').serialize();
		 $.ajax({
		  type:"GET",
		  data:data,
		  url:"/webservice/reminder.php",
		  success:function(){
		   $('.remtext').css('display','block')
		  }
		 })
		}
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
</head>
<body>
<div class="main_header" id="step_1">
    <?php $this->load->view('includes/menu_site'); ?>
    <div class="slider_area field">
	 <?php $this->load->view('includes/block_page_one'); ?>
	</div>
</div>

<div class="main_content">
   <div class="howtobuy" id="step_3" style="padding:0;padding-top:100px">
        <div class="container_2">
            <h3 style="text-align:center;direction: rtl;margin:0 0 15px;font-size:25px;font-weight:bold;color:#0f2d63">چـــــــرا <?php echo $site_name; ?> ؟</h3>
            <h3 style="text-align:center;direction: rtl;margin:0px;font-size:14px;height:40px" class="element">سامانه تخصصی استعلام , مقایسه , مشاوره و خرید انواع تخصص ها تنها با چند کلیک</h3>
            <div class="row">
                <div class="col-md-3">
                    <div class="box" style="background:none;box-shadow:none;height:300px">
                        <img src="/moderator/assets/site/img/consultant.png" alt="img"/>
                        <h5 style="font-size:13px;">سادگی در خرید</h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box" style="background:none;box-shadow:none;height:200px">
                        <img src="/moderator/assets/site/img/compare.png" alt="img"/>
                        <h5 style="font-size:13px;">پشتیبانی 24 ساعته و 7 روز هفته</h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box" style="background:none;box-shadow:none;height:200px">
                        <img src="/moderator/assets/site/img/free-shippping.png" alt="img"/>
                        <h5 style="font-size:13px;">تحویل رایگان در سریع ترین زمان ممکن</h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box" style="background:none;box-shadow:none;height:200px">
                        <img src="/moderator/assets/site/img/cod.png" alt="img"/>
                        <h5 style="font-size:13px;">پیگیری امور خسارت</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="remember_bimeh" id="step_2">
	 <div style="width:100%;background-color:#0f2d63">
        <div class="container_2">
              <div class="calculator">
			    <div style="width:100%;height:70px;text-align:center">
				 <img src="/moderator/assets/site/img/alarm-bell.png" style="height:50px" />
				</div>
			    <div style="width:100%;height:40px;text-align:center;color:#fde428;font-size:16px">یادآور تمدید یا اقساط بیمه</div>
                <form action="javascript:" autocomplete="off" id="remember" >
                    <div class="row">
                        <div class="col col-md-3">
                            <input type="text" class="form-control" name="fname" placeholder="نام و نام خانوادگی" style="border-style:none">
                        </div>
						<div class="col col-md-3">
                            <input type="text" class="form-control" name="phone" placeholder="شماره موبایل" style="border-style:none">
                        </div>
						<div class="col col-md-3">
                            <select class="select2" id="state" name="state" onchange="Func()" style="border-style:none">
                                 <option value="انتخاب استان" data-name="انتخاب شهر">انتخاب استان</option>
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
                        <div class="col col-md-3">
                            <select class="select2" id="city" name="city" style="border-style:none">
                                <option value="0">شهر</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-3">
                            <select class="select2" name="type" style="border-style:none">
                                <option value="0">نوع بیمه</option>
                                <option>بیمه شخص ثالث</option>
                                <option>بیمه بدنه</option>
                                <option>بیمه آتش سوزی</option>
                                <option>بیمه زلزله</option>
                                <option>بیمه عمر</option>
                                <option>بیمه مسافرت</option>
                                <option>بیمه مهندسی</option>
                                <option>بیمه حوادث</option>
                                <option>بیمه تکمیل درمان</option>
                                <option>بیمه سرطان</option>
                                <option>بیمه نازایی</option>
                                <option>بیمه مسئولیت پزشکان</option>
                                <option>بیمه مسئولیت آسانسور</option>
                                <option>بیمه تکمیل درمان انفرادی</option>
                                <option>بیمه موبایل تبلت لپ تاپ</option>

                            </select>
                        </div>
                        <div class="col col-md-3">
                            <input type="text" class="datepicker" name="date" placeholder="تاریخ سر رسید" style="border-style:none">
                        </div>
						<div class="col col-md-3">
                            <input type="text" class="form-control" name="comment" placeholder="توضیحات" style="border-style:none">
                        </div>
						<div class="col col-md-3" style="text-align: center;margin-top:0px;float:left">
                         <button type="submit" onclick="remember()" style="outline:none;margin-left:0;background-color:#fde428;cursor:pointer">ثبت اطلاعات</button>
                        </div>
						<div class="col col-md-12 remtext" style="text-align: center;margin-top:0px;float:right;text-align:right;line-height:50px;color:#fde428;display:none">
                         سررسید بیمه شما با موفقیت ثبت شد
                        </div>
                    </div>
					<div class="row">
					 
                    </div>
                </form>
              </div>
            </div>
        
        </div>
    </div>
	
	<div class="howtobuy" id="step_3">
        <div class="container_2">
            <div style="text-align:center;direction: rtl;color:#0f2d63;height:10px;padding:0 15px">
			 <span style="float:right;font-size:15px;font-weight:bold;">مجله <?php echo $site_name; ?></span>
			 <a href="/blog"><span style="float:left;font-size:12px;font-weight:100;">مشاهده همه</span></a>
			</div>
            <div class="row">
                <div class="col-md-3">
				  <a href="/blog/1">
                    <div class="box" style="padding:0;height:300px">
                        <img src="/moderator/assets/site/img/Bimeblog-300x169.jpg" style="width: 100%; margin: 0; height: 160px;" alt="img"/>
						<div style="padding:10px;">
                          <h5>مقایسه و انتخاب بهترین بیمه</h5>
                          <p style="color:#333">
                            قیمت و سایر مشخصات شرکت‌های بیمه را مقایسه کنید و اگر نیاز به مشاوره داشتید، با ما تماس بگیرید
                          </p>
						</div>
                    </div>
				  </a>
                </div>
                <div class="col-md-3">
                    <div class="box" style="padding:0;height:300px">
					  <a href="/blog/1">
                        <img src="/moderator/assets/site/img/organizations_final02-300x172.png" style="width: 100%; margin: 0; height: 160px;" alt="img"/>
						<div style="padding:10px;">
                          <h5>مقایسه و انتخاب بهترین بیمه</h5>
                          <p style="color:#333">
                            قیمت و سایر مشخصات شرکت‌های بیمه را مقایسه کنید و اگر نیاز به مشاوره داشتید، با ما تماس بگیرید
                          </p>
						</div>
                      </a>
					</div>
                </div>
                <div class="col-md-3">
                    <div class="box" style="padding:0;height:300px">
					  <a href="/blog/1">
                        <img src="/moderator/assets/site/img/Bimeblog-300x169.jpg" style="width: 100%; margin: 0; height: 160px;" alt="img"/>
						<div style="padding:10px;">
                          <h5>مقایسه و انتخاب بهترین بیمه</h5>
                          <p style="color:#333">
                            قیمت و سایر مشخصات شرکت‌های بیمه را مقایسه کنید و اگر نیاز به مشاوره داشتید، با ما تماس بگیرید
                          </p>
						</div>
					  </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box" style="padding:0;height:300px">
					  <a href="/blog/1">
                        <img src="/moderator/assets/site/img/Bimeblog-300x169.jpg" style="width: 100%; margin: 0; height: 160px;" alt="img"/>
						<div style="padding:10px;">
                          <h5>مقایسه و انتخاب بهترین بیمه</h5>
                          <p style="color:#333">
                            قیمت و سایر مشخصات شرکت‌های بیمه را مقایسه کنید و اگر نیاز به مشاوره داشتید، با ما تماس بگیرید
                          </p>
						</div>
					  </a>
                    </div>
                </div>
			</div>
        </div>
    </div>
	
	<div class="articles" id="step_4" style="padding:0">
        <div class="container_2">
            <div class="row">
			
			<div class="col col-md-4">
			
			<section id="map"><?php //include('php/map.php'); ?>
			 <img src="/moderator/assets/site/img/mobile.png" style="height:460px;float:left"/>
			</section>
			
			</div>
			<div class="col col-md-8" style="text-align:right;padding-top:50px">
			  <h2 style="font-weight:bold;font-size:18px;color:#666;line-height:60px;text-align:right">اپلیکیشن <?php echo $site_name; ?></h2>
			  <p style="line-height:35px;direction:rtl;text-align:justify">با اپلیکیشن <?php echo $site_name; ?> , براحتی میتوانید انواع تخصص های شخص ثالث , بیمه بدنه , بیمه عمر , بیمه آتش سوزی و زلزله و بیمه لوازم الکترونیکی را خریداری کرده و از تخفیف ویژه برخودار شوید </p>
			  <p style="line-height:35px;direction:rtl;text-align:justify">بزودی در کافه بازار</p>
			</div>
			
			
        </div>
    </div>
</div>
	<div class="list_bimeh">
    <div class="container_2">
	    <!--<h3 style="text-align:center;direction: rtl;margin:0 0 15px;font-size:25px;font-weight:bold;color:#0f2d63">سایر خدمات</h3>-->
        <div class="row" style="text-align:center">
			<div class="col">
                <img src="/moderator/assets/site/img/factory.png" style="width:50px"/>
				<div style="margin-top:10px">بیمه مهندسی</div>
            </div>
            <div class="col">
                <img src="/moderator/assets/site/img/delivery.png" style="width:50px"/>
				<div style="margin-top:10px">بیمه باربری</div>
            </div>
            <div class="col">
                <img src="/moderator/assets/site/img/medical-insurance.png" style="width:50px"/>
				<div style="margin-top:10px">بیمه درمان گروهی</div>
            </div>
            <div class="col">
                <img src="/moderator/assets/site/img/student-hat.png" style="width:50px"/>
				<div style="margin-top:10px">بیمه مهندسی</div>
            </div>
            <div class="col">
                <img src="/moderator/assets/site/img/family-insurance.png" style="width:50px"/>
				<div style="margin-top:10px">بیمه زنان خانه دار</div>
            </div>
            <div class="col">
                <img src="/moderator/assets/site/img/havades.png" style="width:50px"/>
				<div style="margin-top:10px">بیمه حوادث</div>
            </div>
        </div>
    </div>

</div>

	
    
<?php $this->load->view('includes/footer'); ?>
<script src="/moderator/assets/site/lib/select2/dist/js/select2.min.js"></script>

<script src="/moderator/assets/site/lib/owlslider/owl.carousel.min.js"></script>
<script src="/moderator/assets/site/lib/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/moderator/assets/site/js/main.js"></script>

<script src="/moderator/assets/site/js/persian-date.min.js"></script>
<script src="/moderator/assets/site/js/persian-datepicker.min.js"></script>
<script src="/moderator/assets/site/js/jquery.number.min.js"></script>

<script>
 $(document).ready(function() {
  $('.numbermin').number( true);
 });
</script>
</body>
</html>