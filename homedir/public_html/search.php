<?php 
 include('api/v1/settings/Header.php');
 if(isset($_GET['specialty'])){$specialty=$_GET['specialty'];}else{$specialty='';}
 if(isset($_GET['q'])){$q=$_GET['q'];}else{$q='';}
 if(isset($_GET['state'])){$state=$_GET['state'];}else{$state='';}
 if(isset($_GET['type'])){$type=$_GET['type'];}else{$type='doctor';}
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
    <style type="text/css">
	.fancybox-margin{margin-right:17px}.cat-deal-color.main-cat .main-cat-deal-thumbnail .cds-item .cat-deal-box .cat-deal-box-main{margin-top:17px}.btn-group-vertical>.btn-group:after,.btn-group-vertical>.btn-group:before,.btn-toolbar:after,.btn-toolbar:before,.clearfix:after,.clearfix:before,.container-fluid:after,.container-fluid:before,.container:after,.container:before,.dl-horizontal dd:after,.dl-horizontal dd:before,.form-horizontal .form-group:after,.form-horizontal .form-group:before,.modal-footer:after,.modal-footer:before,.modal-header:after,.modal-header:before,.nav:after,.nav:before,.navbar-collapse:after,.navbar-collapse:before,.navbar-header:after,.navbar-header:before,.navbar:after,.navbar:before,.pager:after,.pager:before,.panel-body:after,.panel-body:before,.row:after,.row:before{content:" ";display:table}.cat-deal-color .main-row .cat-deal-smallbox .cat-deal-box-main .cdbm-title{margin-top:0;padding-top:0;line-height:1;margin-bottom:4px}.cat-deal-color .main-row .cat-deal-box .cat-deal-box-main .cdbm-title{margin:15px 0 3px}.cat-deal-color.main-cat .main-cat-deal-thumbnail .cds-item .cat-deal-box .cdbm-title a{font-size:1.4rem;width:80%;padding-bottom:1px;position:relative;padding-right:32px}.cat-deal-color .main-row .cat-deal-smallbox .cat-deal-box-main .cdbm-title a{width:77%;font-size:1.2rem;padding-bottom:0;line-height:18px;min-height:18px}.cat-deal-color.main-cat .main-cat-deal-thumbnail .cds-item .cat-deal-box .cdbm-title a:before{position:absolute;font-family:netbarg;content:'\e97b';font-size:2.6rem;color:#00ae4d;right:0}@font-face{font-family:bitmeh;font-style:normal;font-weight:400;src:url('/assets/fonts/IRANSansWeb(FaNum)_Light.eot') format("embedded-opentype"),url('/assets/fonts/IRANSansWeb(FaNum)_Light.woff') format("woff"),url('/assets/fonts/IRANSansWeb(FaNum)_Light.woff2') format("woff2"),url('/assets/fonts/IRANSansWeb(FaNum)_Light.ttf') format("truetype")}#learning .items .item .img_box img{width:40%}#learning .items .item:hover .seemore{background:#2068e0 url(/assets/img/cta-arrow.png) no-repeat 10px center;color:#fff}#learning .items .item .text{display:block;height:75px;overflow:hidden;color:#fff}#learning .item a{display:block;height:100%}#learning .seemore{display:inline-block;padding:5px 15px;border-radius:28px;background:#f7f7f7;font-size:12px;margin-top:10px;color:#404040;border:1px solid #efefef}#learning .slick-dots{top:-65px}#learning .title{margin-bottom:20px}#learning .items .item .img_box img{width:40%}#learning .items .item:hover .seemore{background:#2068e0 url(/assets/img/cta-arrow.png) no-repeat 10px center;color:#fff}#learning .items .item .text{display:block;height:75px;overflow:hidden}#learning .item a{display:block;height:100%}#learning .seemore{display:inline-block;padding:5px 15px;border-radius:28px;background:#f7f7f7;font-size:12px;margin-top:10px;color:#404040;border:1px solid #efefef}#learning .slick-dots{top:-65px}#learning .title{margin-bottom:20px}#how_to_start,#learning{padding-bottom:120px;position:relative}#how_to_start .object,#learning .object{position:absolute;pointer-events:none}#how_to_start .object.one,#learning .object.one{width:25%;left:0;top:0}#how_to_start .object.two,#learning .object.two{right:0;width:15%;top:-100px}#how_to_start .title,#learning .title{margin-bottom:100px}#how_to_start .items,#learning .items{text-align:center}#how_to_start .items .item,#learning .items .item{background:#354bbb;position:relative;border-radius:39px;display:inline-block;padding:75px 19px 20px;width:19%;font-size:15px;height:180px;vertical-align:top;transition:all .5s ease;-webkit-transition:all .5s ease;-ms-transition:all .5s ease;-o-transition:all .5s ease;-moz-transition:all .5s ease;cursor:default}#how_to_start .items .item .img_box,#learning .items .item .img_box{width:83px;height:83px;border-radius:50%;background-color:#41d296;position:absolute;top:-40px;transition:all .2s ease;-webkit-transition:all .2s ease;-ms-transition:all .2s ease;-o-transition:all .2s ease;-moz-transition:all .2s ease;left:50%;transform:translate(-50%,0)}#how_to_start .items .item .img_box img,#learning .items .item .img_box img{width:50%;position:absolute;transform:translate(-50%,-50%);top:50%;left:50%}#how_to_start .items .item:hover,#learning .items .item:hover{transform:translateY(-10px)}#how_to_start .items .item:hover .img_box,#learning .items .item:hover .img_box{background-color:#2068e0}#how_to_start .items .item:hover a,#learning .items .item:hover a{color:#404040}#how_to_start .items .item:not(:last-child),#learning .items .item:not(:last-child){margin-left:2%}#brands{background:#01137c;padding:35px 0;text-align:center}#brands a{width:10%;height:61px;display:inline-block;background:#fff;vertical-align:top;border-radius:4px;position:relative}#brands a:not(:last-child){margin-left:10px}#brands a:hover img{-webkit-filter:grayscale(0);filter:grayscale(0)}#brands a img{position:absolute;top:50%;width:60%;left:50%;transition:all .2s ease;-webkit-transition:all .2s ease;-ms-transition:all .2s ease;-o-transition:all .2s ease;-moz-transition:all .2s ease;transform:translate(-50%,-50%);-webkit-filter:grayscale(100%);filter:grayscale(100%)}#brands a img.small{width:35%}
	
	.select2-container--default .select2-selection--single{height:40px!important;padding:0}
	.select2-container--default .select2-selection--single .select2-selection__arrow{top:7px}
	.sidebar-content .panel-body, .sidebar-content .panel-heading{padding:15px 20px}
	
	.mt-15{margin:8px !important}
	.pulse1{display:block;width:15px;height:15px;margin:10px 0 0 10px;float:right;border-radius:50%;background:#25b75f;cursor:pointer;box-shadow:0 0 0 rgba(238,181,36,0.4);animation:pulse 2s infinite;position:absolute;top:5px;right:120px;z-index:1000;border:2px solid #fff}
	
	.content-wrapper.search-results-wrapper .media.panel{box-shadow:0px 1px 1px 0 #d9dadc}
	.content-wrapper.search-results-wrapper .media.panel:hover{box-shadow:0 10px 14px 0 #d9dadc}
	.btn_free{background:#0190b0;border-color:#0190b0!important;cursor:pointer;box-shadow:0 0 0 rgba(238,181,36,0.4);animation:pulse 2s infinite}
	.search-result-item{width:100%}
	</style>
</head>
<body class="loaded pace-done pace-done" style="background:#ecf5fc">
    <div class="search-bar-wrapper">
        <div class="navbar navbar-default navbar-transparent">
            <div class="navbar-boxed container-fluid">
                <div class="navbar-collapse collapse" id="navbar-mobile">
                    <?php include('api/v1/page/nav.php'); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="page-container" style="padding-top:0;padding: 0px 40px;background:#ecf5fc">

        <div class="page-content">

            <div class="sidebar sidebar-main sidebar-default" style="padding:0">
                <div class="sidebar-content" style="box-shadow:0 1px 2px rgba(0,0,0,.05);margin-top:10px;border-radius:4px;width:95%;border-radius:10px;overflow:hidden">

                    <div class="filter-options" style="border-style:none">
                        
						<div class="panel-white">
                            <div class="panel-heading" style="padding: 10px 20px;">
							    <div style="height:30px;font-weight:700;font-size:13px">استان :</div>
                                <select id="state" class="select-location form-control input-xlg select state " style="height:40px;border-style: none; border: 1px solid #efefef; border-radius: 5px;line-height:40px;padding:0;font-size:12px" onChange="search()">
								 <option value="">انتخاب استان</option>
								</select>
                            </div>
                        </div>
						<div class="panel-white">
                         <div class="panel-heading" style="padding: 10px 20px;">
						  <div class="has-feedback has-feedback-left">
						   <div style="height:30px;font-weight:700;font-size:13px">نام پزشک :</div>
                           <span class="twitter-typeahead" style="position: relative; display: inline-block;">
		                    <input id="q" class="border-primary-800 form-control input-xlg  typeahead-remote tt-input" type="text" autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top;direction:rtl;height:40px;border-style: none; border: 1px solid #cfcfcf; border-radius: 5px;line-height:40px;padding:0;font-size:12px;padding-right:5px;box-shadow:none" placeholder="جستجوی نام پزشک یا مرکز درمانی..." onKeyUp="search()">
                           </span>
                           <div class="form-control-feedback" style="top:33px">
                            <i class="icon-search4 text-muted text-size-base"></i>
                           </div>
                          </div>
						 </div>
                        </div>
						<div class="panel-white">
                            <div class="panel-heading" style="padding: 10px 20px;">
							 <div style="height:30px;font-weight:700;font-size:13px">تخصص : </div>
                              <select id="specialty" class="select-location form-control input-xlg select " style="height:40px;border-style: none; border: 1px solid #efefef; border-radius: 5px;line-height:40px;padding:0;font-size:12px" onChange="search()">
							   <option value="">انتخاب تخصص</option>
							   <?php echo $option_specialty; ?>
							  </select>
                            </div>
                        </div>
                        

                    </div>
                </div>
				
				<div class="sidebar-content" style="box-shadow:box-shadow:0 1px 2px rgba(0,0,0,.05);margin-top:10px;border-radius:4px;width:95%;border-radius:10px;overflow:hidden">

                    <div class="filter-options" style="border-style:none">
                        
                        <div class="panel-white">
                            <div class="panel-heading">
                                <div class="panel-title sidebar-panel-title text-semibold">
                                    جنسیت
                                </div>
                            </div>

                            <div class="panel-body">

                                <div class="form-group" style="width:33%;float:right;">
                                    <label class="radio-inline">
                                        <div class="choice">
                                            <span>
                <input name="gender" type="radio" value="MALE">
              </span>
                                        </div>
                                        آقا
                                    </label>
                                </div>

                                <div class="form-group" style="width:33%;float:right;">
                                    <label class="radio-inline">
                                        <div class="choice">
                                            <span>
                <input name="gender" type="radio" value="FEMALE">
              </span>
                                        </div>
                                        خانم
                                    </label>
                                </div>

                                <div class="form-group" style="width:33%;float:right;">
                                    <label class="radio-inline">
                                        <div class="choice">
                                            <span class="checked">
                <input name="gender" type="radio" value="BOTH">
              </span>
                                        </div>
                                        هر دو
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="panel-white">
                            <div class="panel-heading">
                                <div class="panel-title sidebar-panel-title text-semibold">
                                    شیفت کاری
                                </div>
                            </div>

                            <div class="panel-body">

                                <div class="form-group" style="width:33%;float:right;">
                                    <label class="radio-inline">
                                        <div class="choice">
                                            <span>
                <input name="gender" type="radio" value="MALE">
              </span>
                                        </div>
                                        صبح
                                    </label>
                                </div>

                                <div class="form-group" style="width:33%;float:right;">
                                    <label class="radio-inline">
                                        <div class="choice">
                                            <span>
                <input name="gender" type="radio" value="FEMALE">
              </span>
                                        </div>
                                        عصر
                                    </label>
                                </div>

                                <div class="form-group" style="width:33%;float:right;">
                                    <label class="radio-inline">
                                        <div class="choice">
                                            <span class="checked">
                <input name="gender" type="radio" value="BOTH">
              </span>
                                        </div>
                                        هر دو
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="panel-white">
                            <div class="panel-heading">
                                <div class="panel-title sidebar-panel-title text-semibold">
                                    مطب / کلینیک
                                </div>
                            </div>

                            <div class="panel-body">

                                <div class="form-group" style="width:33%;float:right;">
                                    <label class="radio-inline">
                                        <div class="choice">
                                            <span>
                <input name="gender" type="radio" value="MALE">
              </span>
                                        </div>
                                        مطب
                                    </label>
                                </div>

                                <div class="form-group" style="width:33%;float:right;">
                                    <label class="radio-inline">
                                        <div class="choice">
                                            <span>
                <input name="gender" type="radio" value="FEMALE">
              </span>
                                        </div>
                                        کلینیک
                                    </label>
                                </div>

                                <div class="form-group" style="width:33%;float:right;">
                                    <label class="radio-inline">
                                        <div class="choice">
                                            <span class="checked">
                <input name="gender" type="radio" value="BOTH">
              </span>
                                        </div>
                                        هر دو
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="panel-white">
                            <div class="panel-heading">
                                <div class="panel-title sidebar-panel-title text-semibold">
                                    نوع ویزیت
                                </div>
                            </div>

                            <div class="panel-body">

                                <div class="form-group" style="width:33%;float:right;">
                                    <label class="radio-inline">
                                        <div class="choice">
                                            <span>
                <input name="gender" type="radio" value="MALE">
              </span>
                                        </div>
                                        حضوری
                                    </label>
                                </div>

                                <div class="form-group" style="width:33%;float:right;">
                                    <label class="radio-inline">
                                        <div class="choice">
                                            <span>
                <input name="gender" type="radio" value="FEMALE">
              </span>
                                        </div>
                                        تلفنی
                                    </label>
                                </div>

                                <div class="form-group" style="width:33%;float:right;">
                                    <label class="radio-inline">
                                        <div class="choice">
                                            <span class="checked">
                <input name="gender" type="radio" value="BOTH">
              </span>
                                        </div>
                                        هر دو
                                    </label>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="content-wrapper search-results-wrapper">
                <div class="loader-panel content-group loader-panel media-list" style="position: static; zoom: 1;">
                  <ul class="media-list content-group loader-panel" style="padding-right:10px">  
                   <?php include('api/v1/page/main-search-doctor.php'); ?>
                  </ul>
                </div>
            </div>

        </div>

    </div>
    <?php include('api/v1/page/footer.php'); ?>
	<input type="hidden" id="state" value="<?php echo $state; ?>" />
	<script src="/assets/js/select2.min.js"></script>
        <script>
		 $(document).ready(function() {
           $('.select').select2();
		   $(document).ready(function() {
            var state = '<option value="">استان</option>';
            $.ajax({
             type: "GET",
             url: "/api/v1/settings/state",
             success: function(msg) {
                for (var i = 0; i < msg.length; i++) {
                    state = state + '<option>' + msg[i].name + '</option>';
                }
                $('.state').html(state)
             }
            })
           });
		 })
		</script>
</body>
</html>