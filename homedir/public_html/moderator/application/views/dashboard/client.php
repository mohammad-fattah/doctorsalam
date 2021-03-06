<script src="/assets/js/jquery.number.min.js"></script>
<div class="content dashboard_page">
    <div class="container-fluid">
		<div class="row">
            <?php 
			  $count_active_thirdparty=0;$count_deactive_thirdparty=0;
			  $count_active_body=0;$count_deactive_body=0;
			  $count_active_fire=0;$count_deactive_fire=0;
			  $count_active_life=0;$count_deactive_life=0;
			  $count_active_pet=0;$count_deactive_pet=0;
			  $count_active_health=0;$count_deactive_health=0;
			  foreach ($model_info as $team_member) {
				if($team_member->insure_type=='thirdparty'  && $team_member->status=='تکمیل رزرو'){
					$count_active_thirdparty+=$team_member->count;
				}
				if($team_member->insure_type=='thirdparty'){
					$count_deactive_thirdparty+=$team_member->count;
				}
				
				if($team_member->insure_type=='body'  && $team_member->status=='تکمیل رزرو'){
					$count_active_body+=$team_member->count;
				}
				if($team_member->insure_type=='body'){
					$count_deactive_body+=$team_member->count;
				}
				
				if($team_member->insure_type=='fire'  && $team_member->status=='تکمیل رزرو'){
					$count_active_fire+=$team_member->count;
				}
				if($team_member->insure_type=='fire'){
					$count_deactive_fire+=$team_member->count;
				}
				
				if($team_member->insure_type=='life'  && $team_member->status=='تکمیل رزرو'){
					$count_active_life=count_active_life+$team_member->count;
				}
				if($team_member->insure_type=='life'){
					$count_deactive_life+=$team_member->count;
				}
				
				if($team_member->insure_type=='pet'  && $team_member->status=='تکمیل رزرو'){
					$count_active_pet+=$team_member->count;
				}
				if($team_member->insure_type=='pet'){
					$count_deactive_pet+=$team_member->count;
				}
				
				if($team_member->insure_type=='health'  && $team_member->status=='تکمیل رزرو'){
					$count_active_health+=$team_member->count;
				}
				if($team_member->insure_type=='health'){
					$count_deactive_health+=$team_member->count;
				}
			  }
			  foreach ($extra_count as $client_counts) {
				$client_count=$client_counts->count; 
			  }
			  foreach ($ticket_count as $ticket_counts) {
				$ticket_count_dash=$ticket_counts->count; 
			  }
			  foreach ($reminder_count as $reminder_counts) {
				$reminder_count_dash=$reminder_counts->count; 
			  }
			?>
                <div class="col-md-4 col-sm-4">
                    <a href="/moderator/order/thirdparty">
					  <div class="card card-stats">
                        <div class="card-header" data-background-color="rose"><i class="material-icons">local_car_wash</i></div>
                        <div class="card-content">
                            <p class="category">شخص ثالث</p>
                            <h3 class="card-title" id="dash_onlinevis"><?php echo $count_active_thirdparty; ?></h3></div>
                        <div class="card-footer">
                            <div class="stats">جمع کل : <span class="dash_allvisitor"><?php echo $count_deactive_thirdparty; ?></span> </div>
                        </div>
                      </div>
					</a>
                </div>
                <div class="col-md-4 col-sm-4">
                    <a href="/moderator/order/body">
					  <div class="card card-stats">
                        <div class="card-header" data-background-color="orange"><i class="material-icons">directions_car</i></div>
                        <div class="card-content">
                            <p class="category">بدنه</p>
                            <h3 class="card-title"><?php echo $count_active_body; ?></h3></div>
                        <div class="card-footer">
                            <div class="stats"> جمع کل : <span class="dash_alloperator"><?php echo $count_deactive_body; ?></span></div>
                        </div>
                      </div>
					</a>
                </div>
                <div class="col-md-4 col-sm-4">
                    <a href="/moderator/order/fire">
					  <div class="card card-stats">
                        <div class="card-header" data-background-color="blue"><i class="material-icons">home</i></div>
                        <div class="card-content">
                            <p class="category">آتش سوزی</p>
                            <h3 class="card-title">
						 <?php echo $count_active_fire; ?>
						</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">جمع کل : <span class="dash_allchat"><?php echo $count_deactive_fire; ?></span></div>
                        </div>
                      </div>
					</a>
                </div>
				<div class="col-md-4 col-sm-4">
                    <a href="/moderator/order/life">
					  <div class="card card-stats">
                        <div class="card-header" data-background-color="red"><i class="material-icons">wc</i></div>
                        <div class="card-content">
                            <p class="category">عمر</p>
                            <h3 class="card-title">
						 <?php echo $count_active_life; ?>
						</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">جمع کل : <span class="dash_allchat">
							<?php echo $count_deactive_life; ?></span></div>
                        </div>
                      </div>
					</a>
                </div>
				<div class="col-md-4 col-sm-4">
                    <a href="/moderator/order/health">
					  <div class="card card-stats">
                        <div class="card-header" data-background-color="purple"><i class="material-icons">healing</i></div>
                        <div class="card-content">
                            <p class="category">درمان</p>
                            <h3 class="card-title">
						 <?php echo $count_active_health; ?>
						</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">جمع کل : <span class="dash_allchat"><?php echo $count_deactive_health; ?></span></div>
                        </div>
                      </div>
					</a>
                </div>
				<div class="col-md-4 col-sm-4">
				    <a href="/moderator/reminders">
                      <div class="card card-stats">
                        <div class="card-header" data-background-color="pink"><i class="material-icons">aspect_ratio</i></div>
                        <div class="card-content">
                            <p class="category">سررسیدهای بیمه</p>
                            <h3 class="card-title">
						      0
						    </h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">تعداد کل : <span class="dash_allchat">0</span></div>
                        </div>
                      </div>
					</a>
                </div>
        </div>
        
		<div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="blue"><i class="material-icons">timeline</i></div>
                    <div class="card-content font14">
                       <h4 class="card-title">آخرین سفارشات ثبت شده</h4></div>
                           <div class="table-responsive">
                            <table id="category-table" class="display" cellspacing="0" width="100%">
                            </table>
                        </div>
                         <script type="text/javascript">
    $(document).ready(function () {
        $("#category-table").appTable({
            source: '<?php echo_uri("order/all_transaction_limit/") ?>',
            columns: [
                {title: 'ردیف', "class": "text-center option w50"},
                {title: 'نوع', "class": "text-center option w50"},
                {title: 'تاریخ خرید', "class": "text-center option w100"},
                {title: 'قیمت', "class": "text-center option w50"},
                {title: 'نام کاربر', "class": "text-center option w50"},
                {title: 'بازاریاب', "class": "text-center option w50"},
                {title: 'نقد/اقساط', "class": "text-center option w50"},
                {title: 'وضعیت', "class": "text-center option w50"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w50"}
            ],
            printColumns: [0, 1, 2, 3,4]
        });
    });
</script>
                    
                </div>
            </div>
        </div>
		
	</div>
</div>