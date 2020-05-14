<div class="tab-content">
    <?php echo form_open(get_uri("order/save_general_info/" . $bime_info->id), array("id" => "general-info-form", "class" => "general-form dashed-row white", "role" => "form")); ?>
    <div class="panel">
        <div class="panel-default panel-heading">
            <h4>اطلاعات تخصص</h4>
        </div>
        <div class="panel-body">
          <div class="form-group col-md-6">
                <label for="name" class=" col-md-4">شماره پیگیری</label>
                <div class=" col-md-8">
				    
                    <?php
                    echo form_input(array(
                        "id" => "factori",
                        "name" => "factori",
						"value" => $bime_info->factor,
                        "class" => "form-control",
                        "placeholder" => "شماره پیگیری",
                        "autofocus" => true,
						//"disabled"=>true,
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
			
		  <div class="form-group col-md-6">
                <label for="name" class=" col-md-4">نوع رزرو</label>
                <div class=" col-md-8">
				    
                    <?php
                    echo form_input(array(
                        "id" => "title",
                        "name" => "title",
						"value" => $bime_info->title,
                        "class" => "form-control",
                        "placeholder" => "نوع رزرو",
                        "autofocus" => true,
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
			
            <div class="form-group col-md-6">
                <label for="phone" class=" col-md-4">تاریخ خرید بیمه</label>
                <div class=" col-md-8">
                    <?php
                    echo form_input(array(
                        "id" => "start_date",
                        "name" => "start_date",
						"value" => $bime_start_date,
                        "disabled"=>true,
						"class" => "form-control",
                        "placeholder" => "تاریخ خرید بیمه",
                    ));
                    ?>
                </div>
            </div>
			
			<div class="form-group col-md-6">
                <label for="name" class=" col-md-4">قیمت تخصص (تومان)</label>
                <div class=" col-md-8">  
                    <?php
                    echo form_input(array(
                        "id" => "price",
                        "name" => "price",
						"value" => number_format($bime_info->price),
                        "class" => "form-control",
                        "placeholder" => 'قیمت تخصص',
                        "autofocus" => true,
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
			
			<div class="form-group col-md-6">
                <label for="last_name" class=" col-md-4">نام کاربر</label>
                <div class=" col-md-8">
                    <?php
                    echo form_input(array(
                        "id" => "user_key",
                        "name" => "user_key",
						"value" => $bime_user,
                        "class" => "form-control",
                        "placeholder" =>"نام کاربر",
                        "disabled"=>true,
						"data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
			
			<div class="form-group col-md-6">
                <label for="last_name" class=" col-md-4">تاریخ تولد بیمه گذار</label>
                <div class=" col-md-8">
                    <?php
                    echo form_input(array(
                        "id" => "birthday",
                        "name" => "birthday",
						"value" => $bime_info->birthday,
                        "class" => "form-control",
                        "placeholder" =>"تاریخ تولد بیمه گذار",
                        "disabled"=>true,
                    ));
                    ?>
                </div>
            </div>
			<div class="form-group col-md-6">
                <label for="last_name" class=" col-md-4">کد ملی بیمه گذار</label>
                <div class=" col-md-8">
                    <?php
                    echo form_input(array(
                        "id" => "melli_code",
                        "name" => "melli_code",
						"value" => $bime_info->melli_code,
                        "class" => "form-control",
                        "placeholder" =>"کد ملی بیمه گذار",
                        "disabled"=>true,
                    ));
                    ?>
                </div>
            </div>
			<div class="form-group col-md-6">
                <label for="last_name" class=" col-md-4">جنسیت</label>
                <div class=" col-md-8">
                    <?php
                    echo form_input(array(
                        "id" => "gender",
                        "name" => "gender",
						"value" => $bime_info->gender,
                        "class" => "form-control",
                        "placeholder" =>"جنسیت",
                        "disabled"=>true,
                    ));
                    ?>
                </div>
            </div>
			
			<div class="form-group col-md-6">
                <label for="last_name" class=" col-md-4">نقد/اقساط</label>
                <div class=" col-md-8">
					<?php
                    echo form_input(array(
                        "id" => "CashIinstallments",
                        "name" => "CashIinstallments",
						"value" => $bime_info->CashIinstallments,
                        "class" => "form-control",
                        "placeholder" =>"نام کاربر",
                        "disabled"=>true,
						"data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
			<div class="form-group col-md-6" style="border-style:none">
                <label for="last_name" class=" col-md-4">مشخصات تحویل گیرنده</label>
                <div class=" col-md-8">
					<?php
                    echo form_input(array(
						"value" => $bime_info->name,
                        "class" => "form-control",
                        "placeholder" =>"مشخصات تحویل گیرنده",
                        "disabled"=>true,
                    ));
                    ?>
                </div>
            </div>
			<div class="form-group" style="clear:both;padding-top:10px">
                <label for="last_name" class=" col-md-2">آدرس تحویل گیرنده</label>
                <div class=" col-md-10">
					<?php
                    echo form_input(array(
						"value" => $bime_info->city.' '.$bime_info->address,
                        "class" => "form-control",
                        "placeholder" =>"مشخصات تحویل گیرنده",
                        "disabled"=>true,
                    ));
                    ?>
                </div>
            </div>
			<div class="form-group" style="clear:both;padding-top:10px">
                <label for="last_name" class=" col-md-2">آدرس جهت درج در تخصص</label>
                <div class=" col-md-10">
					<?php
                    echo form_input(array(
						"value" => $bime_info->city.' '.$bime_info->address,
                        "class" => "form-control",
                        "placeholder" =>"مشخصات تحویل گیرنده",
                        "disabled"=>true,
                    ));
                    ?>
                </div>
            </div>
			<div class="form-group col-md-6">
                <label for="last_name" class=" col-md-4">شماره تماس ثابت تحویل گیرنده</label>
                <div class=" col-md-8">
					<?php
                    echo form_input(array(
						"value" => $bime_info->cellphone,
                        "class" => "form-control",
                        "placeholder" =>"شماره تماس ثابت تحویل گیرنده",
                        "disabled"=>true,
                    ));
                    ?>
                </div>
            </div>
			<div class="form-group col-md-6">
                <label for="last_name" class=" col-md-4">شماره تماس همراه تحویل گیرنده</label>
                <div class=" col-md-8">
					<?php
                    echo form_input(array(
						"id" => "userphone",
						"name" => "userphone",
						"value" => $bime_info->phone,
                        "class" => "form-control",
                        "placeholder" =>"شماره تماس همراه تحویل گیرنده",
                        //"disabled"=>true,
                    ));
                    ?>
                </div>
            </div>
			<div class="form-group col-md-6">
                <label for="last_name" class=" col-md-4">زمان ارسال</label>
                <div class=" col-md-8">
					<?php
                    echo form_input(array(
						"value" => $bime_info->date,
                        "class" => "form-control",
                        "placeholder" =>"زمان ارسال",
                        "disabled"=>true,
                    ));
                    ?>
                </div>
            </div>
			<div class="form-group col-md-6">
                <label for="last_name" class=" col-md-4">شرکت بیمه گر</label>
                <div class=" col-md-8">
					<?php
                    echo form_input(array(
						"value" => $bime_info->company,
                        "class" => "form-control",
                        "placeholder" =>"شرکت بیمه گر",
                        "disabled"=>true,
                    ));
                    ?>
                </div>
            </div>
			   
			<div class="form-group col-md-6" >
                <label for="job_title" class=" col-md-4">وضعیت</label>
                <div class=" col-md-8">
                    <?php
					 echo form_dropdown("status", $statuses ,$bime_info->status, "class='select2' id='statuses' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
					?>
                </div>
            </div>
			<div class="form-group col-md-6"  >
                <label for="job_title" class=" col-md-4">زونکن</label>
                <div class=" col-md-8">
                   <?php
					echo form_dropdown("archive", $archive_dropdown ,$bime_info->archive, "class='select2' id='archive' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
                   ?> 
                </div>
            </div>
			<div class="form-group col-md-6"  >
                <label for="job_title" class=" col-md-4">بازاریاب</label>
                <div class=" col-md-8">
                   <?php
					echo form_dropdown("broker", $brokers_dropdown ,$bime_info->broker_id, "class='select2' id='broker' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
                   ?> 
                </div>
            </div>
			<div class="form-group col-md-6"  >
                <label for="job_title" class=" col-md-4">ارجاع به</label>
                <div class=" col-md-8">
                   <?php
					echo form_dropdown("agents", $agents_dropdown ,$bime_info->agents_id, "class='select2' id='agents' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
                   ?> 
                </div>
            </div>
			<div class="form-group col-md-6" >
                <label for="job_title" class=" col-md-4">تاریخ سررسید</label>
                <div class=" col-md-8">
                   <?php
                    echo form_input(array(
						"id" => "reminder",
						"name" => "reminder",
						"value" => $bime_info->reminder,
                        "class" => "form-control",
                        "placeholder" =>"تاریخ سررسید",
                    ));
                    ?> 
                </div>
            </div>
		    <!--<script type="text/javascript" src="/assets/js/jquery.min.js"></script>-->
            <!--<script>
			 $(document).ready(function() {
			  $("#reminder").persianDatepicker({
               autoClose: true,
              });
             });
			</script>
            <script src="/assets/js/persian-datepicker.min.js"></script>-->
		    <div class="form-group" style="clear:both;padding-top:10px">
                <label for="job_title" class=" col-md-2">مشخصات کامل تخصص</label>
                <div class=" col-md-10 ">
                    <?php
					 $description=explode('#',$bime_info->description);
					 for($i=0;$i<count($description);$i++){
					   echo $description[$i].'<br/><br/>';
					 }
                    ?>
                </div>
            </div>
            
        </div>
        <div class="panel-footer">
            <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span> <?php echo lang('save'); ?></button>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $(".select2").select2();
		$("#general-info-form").appForm({
            isModal: false,
            onSuccess: function (result) {
                appAlert.success(result.message, {duration: 10000});
                setTimeout(function () {
                    window.location.href = '<?php echo get_uri("order/view/" . $bime_info->id); ?>' + '/general';
                }, 500000);
            }
        });
    });
</script>
