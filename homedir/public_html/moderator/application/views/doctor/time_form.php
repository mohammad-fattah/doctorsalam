<form action="javascript:;" id="off-form" class="general-form" role="form" method="post" accept-charset="utf-8">
<div class="modal-body clearfix">
    <input type="hidden" name="id" value="<?php echo $id; ?>" >
    <div class="tab-content mt15">
		<div class="form-group">
        <label for="description" class=" col-md-3">تاریخ</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "date",
                "name" => "date",
                "type" => "text",
                "value" => $model_info->date,
                "class" => "form-control",
                "placeholder" => "تاریخ",
            ));
            ?>
        </div>
        </div>
		<div class="form-group">
		  <div class=" col-md-12">
			<label for="title" class=" col-md-3">ساعت</label>
			<div class=" col-md-9">
				<?php
				echo form_input(array(
					"id" => "title",
					"name" => "title",
					"value" => $model_info->title,
					"class" => "form-control",
					"placeholder" => "ساعت",
					"data-rule-required" => true,
					"data-msg-required" => lang("field_required"),
				));
				?>
			</div>
		   </div>
		</div>
		<div class="form-group">
		  <div class=" col-md-12">
			<label for="price" class=" col-md-3">قیمت</label>
			<div class=" col-md-9">
				<?php
				echo form_input(array(
					"id" => "price",
					"name" => "price",
					"value" => $model_info->price,
					"class" => "form-control",
					"placeholder" => "قیمت به تومان",
					"data-rule-required" => true,
					"data-msg-required" => lang("field_required"),
				));
				?>
			</div>
		   </div>
		</div>
		<div class="form-group">
		  <div class=" col-md-12">
			<label for="internet_call" class=" col-md-3">تماس اینترنتی</label>
			<div class=" col-md-9">
				<?php
				echo form_input(array(
					"id" => "internet_call",
					"name" => "internet_call",
					"value" => $model_info->internet_call,
					"class" => "form-control",
					"placeholder" => "تماس اینترنتی",
					"data-rule-required" => true,
					"data-msg-required" => lang("field_required"),
				));
				?>
			</div>
		   </div>
		</div>
		<div class="form-group">
		  <div class=" col-md-12">
			<label for="payment_method" class=" col-md-3">نحوه پرداخت</label>
			<div class=" col-md-9">
				<?php
				echo form_input(array(
					"id" => "payment_method",
					"name" => "payment_method",
					"value" => $model_info->payment_method,
					"class" => "form-control",
					"placeholder" => "نحوه پرداخت",
					"data-rule-required" => true,
					"data-msg-required" => lang("field_required"),
				));
				?>
			</div>
		   </div>
		</div>
		<div class="form-group">
		  <div class=" col-md-12">
			<label for="comment" class=" col-md-3">توضیحات</label>
			<div class=" col-md-9">
				<?php
				echo form_input(array(
					"id" => "comment",
					"name" => "comment",
					"value" => $model_info->comment,
					"class" => "form-control",
					"placeholder" => "توضیحات",
					"data-rule-required" => true,
					"data-msg-required" => lang("field_required"),
				));
				?>
			</div>
		   </div>
		</div>
		
		<div class="form-group">
                <label for="gender" class=" col-md-3">وضعیت</label>
                <div class=" col-md-9">
                    <?php
                    echo form_radio(array(
                        "name" => "status",
                            ), "active", true);
                    ?>
                    <label for="gender_male">فعال</label> 
					<br>
					<?php
                    echo form_radio(array(
                        "name" => "status",
                            ), "deactive", false);
                    ?>
                    <label for="gender_female" class="">غیر فعال</label>
                </div>
            </div>
		<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/persianDatepicker.min.js" type="text/javascript"></script>
    <script>$(document).ready(function() {$("#date").persianDatepicker({autoClose: true});});</script>
    <script src="/assets/js/persian-date.min.js"></script>
    <script src="/assets/js/persian-datepicker.min.js"></script>
</div>
<div class="modal-footer">
    <button class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> <?php echo lang('close'); ?></button>
    <button id="form-submit" type="button" class="btn btn-primary click"><span class="fa fa-check-circle"></span> <?php echo lang('save'); ?></button>
</div>
<?php echo form_close(); ?>
<script type="text/javascript">
    $(document).ready(function () {
	 $('.click').on('click',function(){
	   $.ajax({
		 type:"POST",
		 url:'/moderator/doctor/add_times',
		 data:$('#off-form').serialize(),
		 success:function(msg){
		  location.reload();
		 }
	   })
	 })
    });
</script>   