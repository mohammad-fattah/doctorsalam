<div class="content dashboard_page">
    <div class="container-fluid">
        <div class="row">
            <?php 
			  foreach ($model_info as $team_member) {
				$extant=number_format($team_member->extant);
				$count_client=$team_member->count_client;
				$wallet_credit=number_format($team_member->wallet_credit);
				if(!$wallet_credit){$wallet_credit=0;}
			  }
			?>
			<div class="col-md-4 col-sm-4">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="rose"><i class="material-icons">language</i></div>
                    <div class="card-content">
                        <p class="category">موجودی کیف پول</p>
                        <h3 class="card-title" id="dash_onlinevis"><?php echo $extant; ?></h3></div>
                    <div class="card-footer">
                        <div class="stats"> موجودی کل : <span class="dash_allvisitor"><?php echo $extant; ?></span> تومان </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange"><i class="material-icons">perm_identity</i></div>
                    <div class="card-content">
                        <p class="category">جمع امتیاز</p>
                        <h3 class="card-title" id="dash_onlineop"><?php echo $count_client; ?></h3></div>
                    <div class="card-footer">
                        <div class="stats">کل امتیازها : <span class="dash_alloperator"><?php echo $count_client; ?></span></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue"><i class="material-icons">textsms</i></div>
                    <div class="card-content">
                        <p class="category">موجودی کارت اعتباری</p>
                        <h3 class="card-title" id="dash_activechat"><?php echo $wallet_credit; ?></h3></div>
                    <div class="card-footer">
                        <div class="stats">موجودی کل : <span class="dash_allchat"><?php echo $wallet_credit; ?></span> تومان</div>
                    </div>
                </div>
            </div>
        </div>
		<div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="blue"><i class="material-icons">timeline</i></div>
                    <div class="card-content font14">
                       <h4 class="card-title">آخرین تراکنش‌ها</h4></div>
                       <div style="height:300px">
                        <?php 
			             foreach ($transaction as $row_transaction) {
				         ?>
						 <div class="tab-pane ps active" id="goftinotab2">
                          <div class="chatlist_item" data-last="2019-04-16T17:08:52.000Z" data-chat="5cb60c0d2bfc1f7646d1b24f"><img src="/moderator/assets/images/user.jpg" class="chatlist_item_pic"><span class="chatlist_item_status chatlist_status_off"></span>
                           <div class="chatlist_item_name"><font><?php echo $row_transaction->client_id; ?></font><span><i class="material-icons send">call_made</i></span></div>
                           <div class="chatlist_item_pm"><?php echo $row_transaction->title; ?><span><?php echo $row_transaction->start_date; ?></span></div>
                           <div class="opview"></div>
                          </div>
                          <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                           <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                          </div>
                          <div class="ps__rail-y" style="top: 0px; left: 0px;">
                           <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                          </div>
                         </div>
						 <?php
						 }
			            ?>
                       </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="blue"><i class="material-icons">tune</i></div>
                    <div class="card-content">
                        <h4 class="dash_h3">پذیرندگان برتر</h4>
						<div style="height:300px">
                        <?php 
			             foreach ($merchant as $row_merchant) {
				         ?>
						 <div class="col-md-12">
                            <br>
                            <p class="dash_bar_t"><i class="material-icons" style="float:right">perm_identity</i><span style="float:right"><?php echo $row_merchant->first_name.' '.$row_merchant->last_name; ?></span><span style="float:left">امتیاز : <span class="dash_c2" ><?php if($row_merchant->point): echo $row_merchant->point; else: echo '0'; endif; ?></span></span></p>
                            <div class="progress progress-line-warning">
                                <div class="progress-bar progress-bar-warning dash_c22" style="width: 0%;"></div>
                            </div>
                         </div>
						 <?php
						 }
			            ?>
						
                       </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card changelog_box">
                    <div class="card-content font14">
                        <h4 class="card-title"><i class="material-icons text-warning">new_releases</i>آخرین به روز رسانی بیمیتک <a href="/app" target="_blank"><i class="material-icons text-info">launch</i></a><div class="version">نسخه 1.4.5<span>97/12/19</span></div></h4></div>
                    <div class="col-md-12 changelog_box_c">
                        <div><i class="material-icons text-warning">chevron_left</i>انتشار اپلیکیشن اندروید بیمیتک نسخه 1.0.2</div>
                        <div><i class="material-icons text-warning">chevron_left</i>امکان خرید اینترنتی و خرید اقساطی اضافه شده است</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>