<div id="sidebar" class="box-content ani-width">
    <div class="col col-side" style="padding:0">
        <div class="row" style="margin:0">
            <div class="card" style="margin:0">
                <div class="user">
         
                                <div class="avatar">
								 <a href="/moderator/clients/profile/<?php echo $this->login_user->id; ?>/general">
								  <img src="<?php echo get_avatar($this->login_user->image); ?>">
								 </a>
								</div>
                                <div class="balance">
                                    <p>
					                     <span id="agent_name">
					                      <?php
						                   echo $this->login_user->first_name . " " . $this->login_user->last_name;
										  ?>
					                     </span>
                                    </p>
                                </div>
								<?php if ($this->login_user->user_type == "staff") { ?>
								<button type="button" class="btn  btn-primary v-btn v-btn--block theme--light" style="margin:0 auto;padding:0px 20px"><a href="/moderator/specialty" style="color:#fff"><div class="v-btn__content"><span>مدیریت تخصص ها</span></div></a></button>
								<?php } ?>
                </div>
            </div>
        </div>
        <script>
            var t = '';

            function opensubmain(type) {
                if (t == type) {
                    $('.submenuone').css('display', 'none');
                    $('.' + type).css('display', 'none');
                    t = '';
                } else {
                    $('.submenuone').css('display', 'none');
                    $('.' + type).css('display', 'block');
                    t = type;
                }
            }
        </script>
        <div class="row break" style="margin:0;margin-top:10px">
            <div class="card" style="margin:0">
                    <?php if ($this->login_user->user_type == "staff") { ?>
                        <ul class="menu">
                            <li class="menu-item">
                             <a href="/moderator/dashboard"><i class="icon i-gauge" style="background-image:url('/moderator/assets/images/dashboard-active.e7785aaa.svg');background-color:#fff"></i> <span><?php echo lang('dashboard'); ?></span></a>
                            </li>
                            <li class="menu-item sell">
                             <a onclick="javascript:$('.submenu').css('display','none');$('.sell .submenu').css('display','block');" class="toggle toggle" style="cursor:pointer"><i class="icon i-gauge" style="background-image:url('/moderator/assets/images/transactions-active.15a1df39.svg');background-color:#fff"></i><i class="icon i-gauge" style="float:left;margin-left:0;background-color:#fff;background-image:url('/moderator/assets/images/flashl.png');background-size:12px"></i><span><?php echo lang('orders'); ?></span></a>
                              <ul class="submenu">
                               <li class="submenu-item"><a href="/moderator/order"><i aria-hidden="true" class="icon i-files-coding"></i> <span>همه سفارش ها</span></a></li>
				               <li class="submenu-item"><a href="/moderator/archive"><i aria-hidden="true" class="icon i-files-coding"></i> <span>نوبت های گذشته</span></a></li>
                               <li class="submenu-item"><a href="/moderator/reminders"><i aria-hidden="true" class="icon i-files-coding"></i> <span>نوبت های امروز</span></a></li>
                              </ul>
                             </li>
										<li class="menu-item financial">
                                            <a onclick="javascript:$('.submenu').css('display','none');$('.financial .submenu').css('display','block');" class="toggle toggle" style="cursor:pointer"><i class="icon i-gauge" style="background-image:url('/moderator/assets/images/transactions-active.15a1df39.svg');background-color:#fff"></i><i class="icon i-gauge" style="float:left;margin-left:0;background-color:#fff;background-image:url('/moderator/assets/images/flashl.png');background-size:12px"></i><span>مالی</span></a>
                                            <ul class="submenu">
                                                <li class="submenu-item"><a href="/moderator/order"><i aria-hidden="true" class="icon i-files-coding"></i> <span>فاکتورها</span></a></li>
                                                <li class="submenu-item"><a href="/moderator/order"><i aria-hidden="true" class="icon i-files-coding"></i> <span>بازاریاب ها</span></a></li>
												<li class="submenu-item"><a href="/moderator/archive"><i aria-hidden="true" class="icon i-files-coding"></i> <span>پزشکان</span></a></li>
                                            </ul>
                                        </li>
										<li class="menu-item member">
                                            <a onclick="javascript:$('.submenu').css('display','none');$('.member .submenu').css('display','block');" class="toggle toggle" style="cursor:pointer"><i class="icon i-gauge" style="background-image:url('/moderator/assets/images/transactions-active.15a1df39.svg');background-color:#fff"></i><i class="icon i-gauge" style="float:left;margin-left:0;background-color:#fff;background-image:url('/moderator/assets/images/flashl.png');background-size:12px"></i><span>اعضا</span></a>
                                            <ul class="submenu">
                                                <li class="submenu-item"><a href="/moderator/clients"><i aria-hidden="true" class="icon i-files-coding"></i> <span>بیماران</span></a></li>
                                                <li class="submenu-item"><a href="/moderator/doctor"><i aria-hidden="true" class="icon i-files-coding"></i> <span>پزشکان</span></a></li>
												<li class="submenu-item"><a href="/moderator/clinic"><i aria-hidden="true" class="icon i-files-coding"></i> <span>مراکز درمانی</span></a></li>
												<li class="submenu-item"><a href="/moderator/brokers"><i aria-hidden="true" class="icon i-files-coding"></i> <span>بازاریابان</span></a></li>
												<!--<li class="submenu-item"><a href="/moderator/medical_bank"><i aria-hidden="true" class="icon i-files-coding"></i> <span>بانک سلامت</span></a></li>-->
                                            </ul>
                                        </li>
										<li class="menu-item lottery">
                                          <a href="/moderator/lottery" class="toggle toggle" style="cursor:pointer"><i class="icon i-gauge" style="background-image:url('/moderator/assets/images/transactions-active.15a1df39.svg');background-color:#fff"></i><span>اطلاعیه ها</span></a>
                                        </li>
                                        
                                        <li class="menu-item help">
                                            <a href="/moderator/help/help_articles" onclick="javascript:$('.submenu').css('display','none');$('.help .submenu').css('display','block');" class="toggle toggle"><i class="icon i-gauge" style="background-image:url('/moderator/assets/images/transactions-active.15a1df39.svg');background-color:#fff"></i><i class="icon i-gauge" style="float:left;margin-left:0;background-color:#fff;background-image:url('/moderator/assets/images/flashl.png');background-size:12px"></i> <span>دانستنی های سلامت</span></a>
                                            <!--<ul class="submenu">
                                                <li class="submenu-item"><a href="/moderator/help/help_categories"><i aria-hidden="true" class="icon i-laptop-shopping"></i> <span>دسته بندی</span></a></li>
                                                <li class="submenu-item"><a href="/moderator/help/help_articles"><i aria-hidden="true" class="icon i-laptop-shopping"></i> <span>دانستنی های سلامت</span></a></li>
                                                <li class="submenu-item"><a href="/moderator/videos/help_articles"><i aria-hidden="true" class="icon i-laptop-shopping"></i> <span>ویدیوها</span></a></li>
                                            </ul>-->
                                        </li>
										<li class="menu-item settings">
                                            <a onclick="javascript:$('.submenu').css('display','none');$('.settings .submenu').css('display','block');" class="toggle toggle" style="cursor:pointer"><i class="icon i-gauge" style="background-image:url('/moderator/assets/images/transactions-active.15a1df39.svg');background-color:#fff"></i><i class="icon i-gauge" style="float:left;margin-left:0;background-color:#fff;background-image:url('/moderator/assets/images/flashl.png');background-size:12px"></i><span>تنظیمات</span></a>
                                            <ul class="submenu">
                                                <li class="submenu-item"><a href="/moderator/settings/general"><i aria-hidden="true" class="icon i-files-coding"></i> <span>عمومی</span></a></li>
                                                <li class="submenu-item"><a href="/moderator/state"><i aria-hidden="true" class="icon i-files-coding"></i> <span>شهرها</span></a></li>
                                                <li class="submenu-item"><a href="/moderator/specialty"><i aria-hidden="true" class="icon i-files-coding"></i> <span>تخصص ها</span></a></li>
                                            </ul>
                                        </li>
                        </ul>
                       
                    <?php } ?>
            </div>
        </div>
    </div>

</div>