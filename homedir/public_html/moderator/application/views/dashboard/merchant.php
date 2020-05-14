<div class="content dashboard_page">
    <div class="container-fluid">
        <div class="row">
            <?php 
			  foreach ($model_info as $team_member) {
				$extant=number_format($team_member->extant);
				$count_client=$team_member->count_client;
				$count_order=$team_member->count_order;
			  }
			?>
			<div class="col-md-4 col-sm-4">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="rose"><i class="material-icons">language</i></div>
                    <div class="card-content">
                        <p class="category">مانده حساب اعتباری</p>
                        <h3 class="card-title" id="dash_onlinevis"><?php echo $extant; ?></h3></div>
                    <div class="card-footer">
                        <div class="stats"> جمع کل : <span class="dash_allvisitor"><?php echo $extant; ?></span> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange"><i class="material-icons">perm_identity</i></div>
                    <div class="card-content">
                        <p class="category">میزان فروش نقدی</p>
                        <h3 class="card-title" id="dash_onlineop"><?php echo $count_order; ?></h3></div>
                    <div class="card-footer">
                        <div class="stats">جمع کل : <span class="dash_alloperator"><?php echo $count_order; ?></span></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue"><i class="material-icons">textsms</i></div>
                    <div class="card-content">
                        <p class="category">تعداد خریدها</p>
                        <h3 class="card-title" id="dash_activechat">0</h3></div>
                    <div class="card-footer">
                        <div class="stats">جمع کل : <span class="dash_allchat">0</span></div>
                    </div>
                </div>
            </div>
        </div>
		<div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="blue"><i class="material-icons">timeline</i></div>
                    <div class="card-content font14">
                       <h4 class="card-title">تراکنش های کیف پول</h4></div>
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