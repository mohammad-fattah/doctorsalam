<!DOCTYPE html>
<html lang="fa">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>ورود به مدیریت</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge, chrome=1">
    <link rel="stylesheet" media="screen, projection" type="text/css" href="/moderator/assets/css/signin.css">
	<link href="<?php echo get_setting('site_logo'); ?>" rel="shortcut icon" type="image/x-icon" />
    <style type="text/css">.account .group:last-child,.account .line,.account .ussd{text-align:center}.account{background-color:#fbfbfb;background-repeat:no-repeat;background-size:cover}.account .brand,.account .has-back{background-repeat:no-repeat;background-size:contain}.account .main{padding:100px 0 0;margin-top:0!important}.account .row{margin-bottom:40px}.account .row:last-child{margin-bottom:0}.account .col .col{padding:40px}.account .brand{width:80px;margin:auto;display:block;color:#fff;background-position:50%;background-image:url(<?php echo get_setting('site_logo'); ?>);height:60px}.account .brand h1{height:40px;display:none;line-height:40px;font-size:20px}.account .card{border-top-right-radius:15px;border-bottom-left-radius:15px;background-color:#ffffff;-webkit-box-shadow:0 0 40px 0 rgba(0,0,0,.102);box-shadow:0 0 40px 0 rgba(0,0,0,.102)}.account .has-back{background-position:0}.account .has-back .col:last-child{border-right:1px dashed #c9dae3}.account .ussd{padding:20px 0 0}.account .ussd .code{margin:10px 10px 0;font-size:310%;font-weight:700;color:#e2007c}.account .steps .ussd .code{font-size:195%}.account .line{height:40px;margin:15px 0;position:relative;line-height:40px}.account .line:before{width:100%;height:1px;display:block;position:absolute;content:"";top:20px;z-index:10;border-top:1px dashed #c9dae3}.account .line span{width:30px;height:30px;margin:5px auto 5px -15px;display:inline-block;position:absolute;z-index:25;top:0;left:50%;line-height:30px;color:#637282;border-radius:15px;background-color:#c9dae3}.button,.group{position:relative}.account .group:last-child a{margin-top:20px;display:block}.account .button{margin:0}.account .btn-clean{margin-left:10px}.account .alert .alert-warning{background-color:#fcb313;padding:10px;color:#252525}.group{margin-bottom:10px;text-align:right}.group:last-child{margin-bottom:0}.group .label{margin-bottom:5px;display:block;color:#615f5f}.group .input,.group .select,.group .textarea{width:100%;height:40px;padding:5px 10px;display:block;color:#657786;line-height:normal;outline:0;-webkit-box-shadow:none;box-shadow:none;border-radius:3px;border:1px solid #e4e9ec;background-color:#fff;-webkit-transition:all .3s ease-in-out;transition:all .3s ease-in-out}.group .input:focus,.group .select:focus,.group .textarea:focus{color:#615f5f;border-color:#93ccee;-webkit-box-shadow:0 0 0 3px #d5ecfb;box-shadow:0 0 0 3px #d5ecfb;-webkit-transition-duration:.2s;transition-duration:.2s}.group .textarea{min-height:80px;resize:vertical}.group .disabled{cursor:not-allowed}.button{min-width:40px;height:40px;padding:0 15px;margin:auto auto auto 10px;display:inline-block;text-align:center;color:#fff;font-size:12.5px;font-weight:400;line-height:40px;white-space:nowrap;border:0;border-radius:3px;-webkit-transition:all .3s ease-in-out;transition:all .3s ease-in-out}.button.button-success{background-color:#1bcc87}.button.button-danger{background-color:#e45a57}.button.button-info{background-color:#2196f3}.button:last-child{margin-left:0;width:100%}.button-success:active,.button-success:focus,.button-success:hover{color:#fff;background-color:#1ac280}.button-danger:active,.button-danger:focus,.button-danger:hover{color:#fff;background-color:#ef675e}.button-info:active,.button-info:focus,.button-info:hover{color:#fff;background-color:#44a9f3}.btn-clean{padding:0;color:#4073b5;background-color:unset}.btn-clean:active,.btn-clean:focus,.btn-clean:hover{color:#615f5f;background-color:unset}</style>
</head>
	<body class="account">
    <div id="app">
        <div>
            <div class="auth">
                <div>
                    <div class="main">
                        <div class="wrap">
                            <div class="row">
                                <div class="col col-8 offset-2"><a href="/" target="_self" class="brand"><h1>bimitek</h1></a></div>
                            </div>
                            <div class="row">
                                
                                            <?php
                                              $this->load->view("signin/signin_form");
                                            ?>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
  </body>
</html>