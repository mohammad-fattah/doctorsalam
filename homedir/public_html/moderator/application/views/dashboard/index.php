<div class="content dashboard_page">
    <div class="container-fluid">
        <div class="row">
            <?php 
			  foreach ($model_info as $team_member) {
				$count_merchant=$team_member->count_merchant;
				$count_client=explode('@',$team_member->count_client);
				$count_order=explode('@',$team_member->count_order);
			  }
			?>
			<div class="col-md-4 col-sm-4">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="rose"><i class="material-icons">language</i></div>
                    <div class="card-content">
                        <p class="category">اعضا فعال</p>
                        <h3 class="card-title" id="dash_onlinevis"><?php if($count_client[1]){echo $count_client[1];}else{echo '0';} ?></h3></div>
                    <div class="card-footer">
                        <div class="stats"> اعضا عضو : <span class="dash_allvisitor"><?php if($count_client[0]){echo $count_client[0];}else{echo '0';} ?></span> نفر </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange"><i class="material-icons">perm_identity</i></div>
                    <div class="card-content">
                        <p class="category">تراکنش های موفق</p>
                        <h3 class="card-title" ><?php if($count_order[0]){echo number_format($count_order[0]);}else{echo '0';} ?></h3></div>
                    <div class="card-footer">
                        <div class="stats"> تراکنش های ناموفق : <span class="dash_alloperator"><?php if($count_order[1]){echo number_format($count_order[1]);}else{echo '0';} ?> تومان</span></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue"><i class="material-icons">textsms</i></div>
                    <div class="card-content">
                        <p class="category">پذیرندگان فعال</p>
                        <h3 class="card-title" >
						 <?php if($count_merchant){echo number_format($count_merchant);}else{echo '0';} ?>
						</h3>
					</div>
                    <div class="card-footer">
                        <div class="stats">پذیرندگان غیرفعال : <span class="dash_allchat"><?php if($count_merchant){echo number_format($count_merchant);}else{echo '0';} ?></span> نفر</div>
                    </div>
                </div>
            </div>
        </div>
		<div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="blue"><i class="material-icons">timeline</i></div>
                    <div class="card-content font14">
                       <h4 class="card-title">آخرین تراکنشهای اعضا</h4></div>
                       <div style="height:320px">
                        <?php 
			             foreach ($transaction as $row_transaction) {
						  $mer_name=explode('@',$row_transaction->m_name);
						  //echo $mer_name[1];
				         ?>
						 <div class="tab-pane ps active" id="goftinotab2">
                          <div class="chatlist_item" data-last="2019-04-16T17:08:52.000Z" data-chat="5cb60c0d2bfc1f7646d1b24f"><img src="/moderator/assets/images/user.jpg" class="chatlist_item_pic"><span class="chatlist_item_status chatlist_status_off"></span>
                           <div class="chatlist_item_name"><font><?php echo $row_transaction->fname; ?>(<?php if($row_transaction->fname==$mer_name[1]){echo 'پذیرنده خودم';} ?>)</font><span><i class="material-icons send">call_made</i></span><span style="float:left"><?php echo number_format($row_transaction->price); ?> تومان </span></div>
                           <div class="chatlist_item_pm"><?php echo $row_transaction->title; ?>(<?php echo $mer_name[0].' نوع : '.$row_transaction->CashIinstallments; ?>)<span><?php echo $row_transaction->start_date; ?></span></div>
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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="blue"><i class="material-icons">tune</i></div>
                    <div class="card-content">
                        <h4 class="dash_h3">پذیرندگان برتر</h4>
						<div style="height:320px">
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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="blue"><i class="material-icons">tune</i></div>
                    <div class="card-content">
                        <h4 class="dash_h3">اعضا برتر</h4>
						<div style="height:320px">
                        <?php 
			             foreach ($client as $row_merchant) {
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