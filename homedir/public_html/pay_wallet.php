<?php 
 include('api/v1/settings/Header.php');
 
 $factor = 0;
 $status = 0;
 
 if(isset($_GET['status'])){
  $status = $_GET['status'];	 
 }
 if(isset($_GET['factor'])){
  $factor = $_GET['factor'];
 }else{
  $factor = 'نا مشخص'; 
 }
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
    <script src="/assets/js/jquery.number.min.js"></script>
    <script type="text/javascript" src="/assets/js/typed.js"></script>
    <style type="text/css">
	.fancybox-margin{margin-right:17px}.cat-deal-color.main-cat .main-cat-deal-thumbnail .cds-item .cat-deal-box .cat-deal-box-main{margin-top:17px}.btn-group-vertical>.btn-group:after,.btn-group-vertical>.btn-group:before,.btn-toolbar:after,.btn-toolbar:before,.clearfix:after,.clearfix:before,.container-fluid:after,.container-fluid:before,.container:after,.container:before,.dl-horizontal dd:after,.dl-horizontal dd:before,.form-horizontal .form-group:after,.form-horizontal .form-group:before,.modal-footer:after,.modal-footer:before,.modal-header:after,.modal-header:before,.nav:after,.nav:before,.navbar-collapse:after,.navbar-collapse:before,.navbar-header:after,.navbar-header:before,.navbar:after,.navbar:before,.pager:after,.pager:before,.panel-body:after,.panel-body:before,.row:after,.row:before{content:" ";display:table}.cat-deal-color .main-row .cat-deal-smallbox .cat-deal-box-main .cdbm-title{margin-top:0;padding-top:0;line-height:1;margin-bottom:4px}.cat-deal-color .main-row .cat-deal-box .cat-deal-box-main .cdbm-title{margin:15px 0 3px}.cat-deal-color.main-cat .main-cat-deal-thumbnail .cds-item .cat-deal-box .cdbm-title a{font-size:1.4rem;width:80%;padding-bottom:1px;position:relative;padding-right:32px}.cat-deal-color .main-row .cat-deal-smallbox .cat-deal-box-main .cdbm-title a{width:77%;font-size:1.2rem;padding-bottom:0;line-height:18px;min-height:18px}.cat-deal-color.main-cat .main-cat-deal-thumbnail .cds-item .cat-deal-box .cdbm-title a:before{position:absolute;font-family:netbarg;content:'\e97b';font-size:2.6rem;color:#00ae4d;right:0}@font-face{font-family:bitmeh;font-style:normal;font-weight:400;src:url('/assets/fonts/IRANSansWeb(FaNum)_Light.eot') format("embedded-opentype"),url('/assets/fonts/IRANSansWeb(FaNum)_Light.woff') format("woff"),url('/assets/fonts/IRANSansWeb(FaNum)_Light.woff2') format("woff2"),url('/assets/fonts/IRANSansWeb(FaNum)_Light.ttf') format("truetype")}#learning .items .item .img_box img{width:40%}#learning .items .item:hover .seemore{background:#2068e0 url(/assets/img/cta-arrow.png) no-repeat 10px center;color:#fff}#learning .items .item .text{display:block;height:75px;overflow:hidden;color:#fff}#learning .item a{display:block;height:100%}#learning .seemore{display:inline-block;padding:5px 15px;border-radius:28px;background:#f7f7f7;font-size:12px;margin-top:10px;color:#404040;border:1px solid #efefef}#learning .slick-dots{top:-65px}#learning .title{margin-bottom:20px}#learning .items .item .img_box img{width:40%}#learning .items .item:hover .seemore{background:#2068e0 url(/assets/img/cta-arrow.png) no-repeat 10px center;color:#fff}#learning .items .item .text{display:block;height:75px;overflow:hidden}#learning .item a{display:block;height:100%}#learning .seemore{display:inline-block;padding:5px 15px;border-radius:28px;background:#f7f7f7;font-size:12px;margin-top:10px;color:#404040;border:1px solid #efefef}#learning .slick-dots{top:-65px}#learning .title{margin-bottom:20px}#how_to_start,#learning{padding-bottom:120px;position:relative}#how_to_start .object,#learning .object{position:absolute;pointer-events:none}#how_to_start .object.one,#learning .object.one{width:25%;left:0;top:0}#how_to_start .object.two,#learning .object.two{right:0;width:15%;top:-100px}#how_to_start .title,#learning .title{margin-bottom:100px}#how_to_start .items,#learning .items{text-align:center}#how_to_start .items .item,#learning .items .item{background:#354bbb;position:relative;border-radius:39px;display:inline-block;padding:75px 19px 20px;width:19%;font-size:15px;height:180px;vertical-align:top;transition:all .5s ease;-webkit-transition:all .5s ease;-ms-transition:all .5s ease;-o-transition:all .5s ease;-moz-transition:all .5s ease;cursor:default}#how_to_start .items .item .img_box,#learning .items .item .img_box{width:83px;height:83px;border-radius:50%;background-color:#41d296;position:absolute;top:-40px;transition:all .2s ease;-webkit-transition:all .2s ease;-ms-transition:all .2s ease;-o-transition:all .2s ease;-moz-transition:all .2s ease;left:50%;transform:translate(-50%,0)}#how_to_start .items .item .img_box img,#learning .items .item .img_box img{width:50%;position:absolute;transform:translate(-50%,-50%);top:50%;left:50%}#how_to_start .items .item:hover,#learning .items .item:hover{transform:translateY(-10px)}#how_to_start .items .item:hover .img_box,#learning .items .item:hover .img_box{background-color:#2068e0}#how_to_start .items .item:hover a,#learning .items .item:hover a{color:#404040}#how_to_start .items .item:not(:last-child),#learning .items .item:not(:last-child){margin-left:2%}#brands{background:#01137c;padding:35px 0;text-align:center}#brands a{width:10%;height:61px;display:inline-block;background:#fff;vertical-align:top;border-radius:4px;position:relative}#brands a:not(:last-child){margin-left:10px}#brands a:hover img{-webkit-filter:grayscale(0);filter:grayscale(0)}#brands a img{position:absolute;top:50%;width:60%;left:50%;transition:all .2s ease;-webkit-transition:all .2s ease;-ms-transition:all .2s ease;-o-transition:all .2s ease;-moz-transition:all .2s ease;transform:translate(-50%,-50%);-webkit-filter:grayscale(100%);filter:grayscale(100%)}#brands a img.small{width:35%}
	:placeholder{font-size:11px}</style>
</head>
<body class="loaded pace-done pace-done" style="background-color:#fff">
    <div class="search-bar-wrapper">
        <div class="navbar navbar-default navbar-transparent">
            <div class="navbar-boxed container-fluid">
                <div class="navbar-collapse collapse" id="navbar-mobile">
                    <?php include('api/v1/page/nav.php'); ?>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="container">
                <app-search-bar>
                    <div class="main-search">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="content-group-sm text-white">
                                <div class="search-header text-center mb-20" style="padding-top:100px">
                                    <h1 class="header-title">
									 <?php 
									  if($status == 1): 
									   
									   $GetStatus = $status;
									   $GetFactor = $factor;
									   include('api/v1/order/ChangeStatusWallet.php');
									   
									   echo 'کیف پول با موفقیت شارژ شد'; 
									  else: 
									   $GetStatus = $status;
									   $GetFactor = $factor;
									   include('api/v1/order/ChangeStatusWallet.php');
									   echo 'پرداخت با خطا همراه بود'; 
									  endif;
									 ?>
									</h1>
                                    <h4 class="no-margin text-light header-subtitle">
									 <font style="vertical-align: inherit;line-height:40px;font-size:15px;width:100%">شماره پیگیری : <?php echo $factor; ?></font><br><font style="vertical-align: inherit;line-height:40px;font-size:15px;width:100%">با تشکر از اعتماد شما </font>
									</h4>
								</div>
                            </div>
							<div style="width:90%;height:200px;margin:0 auto;margin-top:50px">
							 <div class="col-md-12" style="margin-top:20px;display: flex;">
							  <div class="col-md-4" style="margin:0 auto">
							   <a class="btn btn-flat btn-xs navbar-btn btn-pliro-secondary border-pliro-secondary" href="/profile" style="height:40px;width:100%;margin-top:0;line-height:28px">بازگشت به ناحیه کاربری</a>
							  </div>
							 </div>
							 
							</div>
                        </div>
                    </div>
                </app-search-bar>
            </div>
        </div>
    </div>

    <?php include('api/v1/page/footer.php'); ?>
</body>
</html>