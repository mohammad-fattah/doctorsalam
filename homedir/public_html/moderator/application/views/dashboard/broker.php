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
                            <p class="category">سفارشات</p>
                            <h3 class="card-title" id="dash_onlinevis"><?php echo $count_active_thirdparty; ?></h3></div>
                        <div class="card-footer">
                            <div class="stats">جمع کل : <span class="dash_allvisitor"><?php echo $count_deactive_thirdparty; ?></span> </div>
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
						      <?php echo $reminder_count_dash; ?>
						    </h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">تعداد کل : <span class="dash_allchat"><?php echo $reminder_count_dash; ?></span></div>
                        </div>
                      </div>
					</a>
                </div>
				<!--<div class="col-md-4 col-sm-4">
                   <a href="/moderator/clients">                     
					 <div class="card card-stats">
                        <div class="card-header" data-background-color="brown"><i class="material-icons">supervisor_account</i></div>
                        <div class="card-content">
                            <p class="category">مشتریان</p>
                            <h3 class="card-title">
						     <?php echo $client_count; ?>
						    </h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">تعداد کل : <span class="dash_allchat"><?php echo $client_count; ?></span></div>
                        </div>
                      </div>
					<a/>
                </div>-->
				<div class="col-md-4 col-sm-4">
				    <a href="/moderator/tickets">
                      <div class="card card-stats">
                        <div class="card-header" data-background-color="green"><i class="material-icons">message</i></div>
                        <div class="card-content">
                            <p class="category">تیکت ها</p>
                            <h3 class="card-title"><?php echo $ticket_count_dash; ?></h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">تعداد کل : <span class="dash_allchat"><?php echo $ticket_count_dash; ?></span></div>
                        </div>
                      </div>
					</a>
                </div>
				<script>
				 $(document).ready(function() {
				  $('#sms_number').html('0 تومان')
                  $.getJSON("https://api.kavenegar.com/v1/<?php echo get_setting('api_kavenegar'); ?>/account/info.json", function(result) {
                   $.each(result, function(i, field) {
					if(field['remaincredit']){
					 $('#sms_number').html($.number(field['remaincredit']/10)+' تومان')
					}
                   });
                  });
                 });
				</script>
        </div>
        
		<div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="blue"><i class="material-icons">timeline</i></div>
                    <div class="card-content font14">
                       <h4 class="card-title">آخرین سفارشات</h4></div>
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
		
		<div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose"><i class="material-icons">supervisor_account</i></div>
                    <div class="card-content font14">
                       <h4 class="card-title">مشتریان جدید</h4></div>
                           <div class="table-responsive">
                            <table id="team_member-table" class="display" cellspacing="0" width="100%">
                            </table>
                        </div>
                         <script type="text/javascript">
    $(document).ready(function () {
        $("#team_member-table").appTable({
            source: '<?php echo_uri("clients/list_data_limit/") ?>',
            order: [[1, "asc"]],
            columns: [
                {title: "ردیف", "class": "text-center w50"},
                {title: "نام مشتری", "class": "text-center w100"},
                {title: "شماره همراه", "class": "text-center w50"},
                {title: "کد ملی", "class": "text-center w50"},
                {title: "استان", "class": "text-center w50"},
                {title: "ایمیل", "class": "text-center w50"},
                {title: "ثبت در باشگاه", "class": "text-center w50"},
                {title: "وضعیت", "class": "text-center w50"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
            printColumns: combineCustomFieldsColumns([0, 1, 2, 3, 4], '<?php echo $custom_field_headers; ?>'),
            xlsColumns: combineCustomFieldsColumns([0, 1, 2, 3, 4], '<?php echo $custom_field_headers; ?>')

        });
    });
</script>
                    
                </div>
            </div>
        </div>
		
		<div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="orange"><i class="material-icons">aspect_ratio</i></div>
                    <div class="card-content font14">
                       <h4 class="card-title">سر رسید تخصص ها</h4></div>
                           <div class="table-responsive">
                            <table id="reminder-table" class="display" cellspacing="0" width="100%">
                            </table>
                        </div>
                         <script type="text/javascript">
    $(document).ready(function () {
        $("#reminder-table").appTable({
            source: '<?php echo_uri("reminders/reminder_list_data/") ?>',
            columns: [
                {title: 'آیکون'},
                {title: 'شرکت بیمه'},
                {title: 'نام کاربر'},
                {title: 'نوع تخصص'},
				{title: 'تاریخ', "class": "option w100"},
                {title: 'وضعیت'},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
            printColumns: [0, 1, 2, 3]
        });
    });
</script>
                    
                </div>
            </div>
        </div>
    
	</div>
</div>