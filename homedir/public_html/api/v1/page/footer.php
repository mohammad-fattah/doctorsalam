<div class="footer-group container-fluid">
    <footer class="section footer">
        <div class="container">
            <div class="col-md-offset-1 col-md-10">
                <div class="row">
                    <div class="col-sm-6 col-lg-5">
                        <div class="col-md-10">
                            <div class="content-group logo-panel">
                                <div class="col-md-12" style="justify-content: space-between; display: flex;height:160px">
                                    <img alt="" class="img-responsive col-md-3" src="/assets/img/samandehi.png" style="background-color:#ffff;border-radius:10px;padding:10px;">
                                    <img alt="" class="img-responsive col-md-3" src="/assets/img/enamad-3.png" style="background-color:#ffff;border-radius:10px;padding:15px">
                                    <img alt="" class="img-responsive col-md-3" src="/assets/img/namad.png" style="background-color:#ffff;border-radius:10px;padding:10px">
                                </div>
                                <h6 class="copyrights mt-20 text-muted" style="clear:both">ایجاد شده با عشق در سال 1398 &copy;</h6>
                                <ul class="list-social list-inline mt-20">
								   <?php if($company_facebook): ?>
                                    <li class="no-padding">
                                        <a class="btn btn-lg text-facebook p-5" href="<?php echo $company_facebook; ?>">
                                            <i class="icon-facebook2 icon-2x"></i>
                                        </a>
                                    </li>
								   <?php endif; ?>
								   <?php if($company_instagram): ?>
									<li class="no-padding">
                                        <a class="btn btn-lg text-instagram p-5" href="<?php echo $company_instagram; ?>">
                                            <i class="icon-instagram icon-2x"></i>
                                        </a>
                                    </li>
								   <?php endif; ?>
								   <?php if($company_twitter): ?>
                                    <li class="no-padding">
                                        <a class="btn btn-lg text-twitter p-5" href="<?php echo $company_twitter; ?>">
                                            <i class="icon-twitter icon-2x"></i>
                                        </a>
                                    </li>
								   <?php endif; ?>
								   <?php if($company_google_plus): ?>
                                    <li class="no-padding">
                                        <a class="btn btn-lg text-google-plus p-5" href="<?php echo $company_google_plus; ?>">
                                            <i class="icon-google-plus icon-2x"></i>
                                        </a>
                                    </li>
                                   <?php endif; ?>
								   <?php if($company_linkedin): ?>
                                    <li class="no-padding">
                                        <a class="btn btn-lg text-linked-in p-5" href="<?php echo $company_linkedin; ?>">
                                            <i class="icon-linkedin icon-2x"></i>
                                        </a>
                                    </li>
								   <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-7">
                        <div class="row">
                            <div class="col-md-3 col-xs-6">
                                <div class="content-group">
                                    <h6 class="text-grey-600 text-bold text-uppercase">&nbsp;</h6>
                                    <ul class="list list-unstyled">
                                        <li><a>دندانپزشک</a></li>
                                        <li><a>متخصص پوست</a></li>
                                        <li><a>متخصص پزشکی</a></li>
                                        <li><a>متخصص مغز و اعصاب</a></li>
                                        <li><a>متخصص اطفال</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3  col-xs-6">
                                <div class="content-group">
                                    <h6 style="font-size:14px">تخصص ها</h6>
                                    <ul class="list list-unstyled">
                                        <li><a>متخصص قلب</a></li>
                                        <li><a>متخصص گوش و حلق و بینی</a></li>
                                        <li><a>پزشک عمومی</a></li>
                                        <li><a>روانپزشک</a></li>
                                        <li><a>متخصص اورولوژی</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3  col-xs-6">
                                <div class="content-group">
                                    <h6 class="text-grey-600 text-bold text-uppercase">&nbsp;</h6>
                                    <ul class="list list-unstyled">
                                        <li><a>گیلان</a></li>
                                        <li><a>خراسان</a></li>
                                        <li><a>بندرعباس</a></li>
                                        <li><a>خوزستان </a></li>
                                        <li><a>همدان</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3  col-xs-6">
                                <div class="content-group">
                                    <h6 style="font-size:14px">شهرهای تحت پوشش</h6>
                                    <ul class="list list-unstyled">
                                        <li><a>تهران</a></li>
                                        <li><a>اصفهان</a></li>
                                        <li><a>تبریز</a></li>
                                        <li><a>شیراز</a></li>
                                        <li><a>کرمان</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="container">
        <div class="navbar navbar-default footer">
            <div class="col-md-offset-1 col-md-10">
                <ul class="nav navbar-nav visible-xs-block">
                    <li><a class="text-center collapsed"><i class="icon-circle-up2"></i></a></li>
                </ul>
                <div class="navbar-collapse collapse" id="footer" style="border-top:1px solid #ccc;line-height:50px;text-align:center">
				  <p style="color:#999db2">تمامی حقوق مادی و معنوی متعلق به دکتر آنلاین می باشد .</p>
				</div>
            </div>
        </div>
    </div>
<?php include('login.php'); ?>
</div>
<div style="width:100%;height:100%;position:fixed;z-index:100000;top:0;right:0;display:none" id="modal-chat">
<div style="width:100%;height:100%;position:fixed;background-color:rgba(0,0,0,0.3);z-index:100001;top:0;right:0;" id="modal-chat-back" onclick="CloseModalChat()">
</div>
 <div style="width:400px;height:100%;position:fixed;background-color:#f8fafd;z-index:100002;top:0;left:0;box-shadow:4px 0 9px 0 rgba(0,0,0,.2)">
  <div style="width: 100%;float: right;background-color: #f8fafd;padding: 24px 16px;height: 100%;">
   <p style="flex: 1;text-align: center;font-size:15px;color:#0a1115; margin: 0;">گفتگوهای من</p>
   <p style="height:120px;width:120px; margin:0 auto;background-image:url('/assets/img/consultation-empty.svg');background-repeat:no-repeat;margin-top:100px"></p>
   <p style="flex: 1;text-align: center;font-size:14px;color:#0a1115; margin:80px 0 30px;line-height:30px">پزشکان دکتر آنلاین آماده گفتگو با شما هستند و قدم به قدم تا انتهای مشاوره همراه شما خواهند بود</p>
   <div style="width:100%;text-align:center">
    <a href="/moshaver"> 
	 <div class="btn btn-flat btn-xs navbar-btn btn-pliro-secondary border-pliro-secondary" style="margin:0 auto;border-style:none;font-size:14px;padding:10px 20px;border-radius:30px;">دریافت مشاوره</div>
	</a>
   </div>
  </div>
 </div>
</div>