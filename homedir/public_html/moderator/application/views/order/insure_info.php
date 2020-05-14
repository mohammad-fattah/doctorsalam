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
                        "id" => "factor",
                        "name" => "factor",
						"value" => $bime_info->factor,
                        "class" => "form-control",
                        "placeholder" => "شماره پیگیری",
                        "autofocus" => true,
						"disabled"=>true,
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
                <label for="name" class=" col-md-4">قیمت تخصص</label>
                <div class=" col-md-8">  
                    <?php
                    echo form_input(array(
                        "id" => "price",
                        "name" => "price",
						"value" => number_format($bime_info->price).' تومان',
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
						"value" => $bime_info->phone,
                        "class" => "form-control",
                        "placeholder" =>"شماره تماس همراه تحویل گیرنده",
                        "disabled"=>true,
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
			   
			<div class="form-group col-md-6" style="padding-bottom:17px">
                <label for="job_title" class=" col-md-4">وضعیت</label>
                <div class=" col-md-8">
                    <?php
						echo form_dropdown("status", $statuses ,$bime_info->status, "class='select2' id='statuses' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
					?>
                </div>
            </div>
			<div class="form-group col-md-6" style="clear:both;border-style:none" >
                <label for="job_title" class=" col-md-4">بازاریاب</label>
                <div class=" col-md-8">
                   <?php
                    echo form_input(array(
						"value" => $bime_info->broker,
                        "class" => "form-control",
                        "placeholder" =>"بازاریاب",
                        "disabled"=>true,
                    ));
                    ?> 
                </div>
            </div>
		
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
        $("#general-info-form").appForm({
            isModal: false,
            onSuccess: function (result) {
                appAlert.success(result.message, {duration: 10000});
                setTimeout(function () {
                    window.location.href = '<?php echo get_uri("order/view/" . $bime_info->id); ?>' + '/general';
                }, 500);
            }
        });
        $("#general-info-form .select2").select2();

        setDatePicker("#dob");

    });
</script>
