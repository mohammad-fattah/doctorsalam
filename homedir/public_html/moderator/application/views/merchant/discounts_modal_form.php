<?php echo form_open(get_uri("merchant/save_discounts"), array("id" => "category-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    <input type="hidden" name="id" value="<?php echo $id; ?>" />
	
    <input type="hidden" name="merchant_id" value="<?php echo $merchant_id; ?>" />
	
	<div class="form-group">
        <label for="title" class=" col-md-3">عنوان</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "title",
                "name" => "title",
                "value" => $model_info->title,
                "class" => "form-control",
                "placeholder" => "عنوان",
                "autofocus" => true,
            ));
            ?>
        </div>
    </div>

	<?php if($id) { ?>
		<div class="form-group">
			<label for="description" class=" col-md-3">کد</label>
			<div class=" col-md-9">
				<?php
				echo form_input(array(
					"id" => "number",
					"name" => "number",
					"value"=>$model_info->code,
					
					"class" => "form-control",
					"placeholder" => "تعداد",
				));
				?>
			</div>
		</div>
	<?php } ?>


	<?php if(!$id) { ?>
		<div class="form-group">
			<label for="description" class=" col-md-3">تعداد</label>
			<div class=" col-md-9">
				<?php
				echo form_input(array(
					"id" => "number",
					"name" => "number",
					"class" => "form-control",
					"placeholder" => "تعداد",
				));
				?>
			</div>
		</div>
	<?php } ?>

	<div class="form-group">
        <label for="description" class=" col-md-3">تاریخ شروع</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "start_date",
                "name" => "start_date",
                "type" => "date",
				"value" => $model_info->start_date,
                "class" => "form-control",
                "placeholder" => "تاریخ شروع",
            ));
            ?>
        </div>
    </div>
	<div class="form-group">
        <label for="description" class=" col-md-3">تاریخ پایان</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "expire_date",
                "name" => "expire_date",
				"type" => "date",
                "value" => $model_info->expire_date,
                "class" => "form-control",
                "placeholder" => "تاریخ پایان",
            ));
            ?>
        </div>
    </div>
	<div class="form-group">
        <label for="description" class=" col-md-3">مقدار</label>
        
		<div class=" col-md-6">
            <?php
            echo form_input(array(
                "id" => "value",
                "name" => "value",
                "value" => $model_info->value,
                "class" => "form-control",
                "placeholder" => "مقدار",
            ));
            ?>
        </div>
		<div class=" col-md-3">
           <select name="type" class="select2" id="card_name" data-rule-required="true" data-msg-required="این فیلد مورد نیاز است." aria-required="true">
            <option value="percent" <?php if($model_info->type == "percent") echo "selected"; ?> >درصدی</option>
            <option value="currency" <?php if($model_info->type == "currency") echo "selected"; ?> >ریالی</option>
           </select>
        </div>
    </div>
	<div class="form-group">
        <label for="title" class=" col-md-3">استفاده کنندگان</label>
        <div class=" col-md-9">
           <select name="users" class="select2" id="card_name" data-rule-required="true" data-msg-required="این فیلد مورد نیاز است." aria-required="true">
            <option value="allUsers" <?php if($model_info->users == "allUsers") echo "selected"; ?> >همه</option>
            <option value="myUsers"  <?php if($model_info->users == "myUsers") echo "selected"; ?> >فقط مشتریان خودم</option>
            <option value="newUsers" <?php if($model_info->users == "newUsers") echo "selected"; ?> >مشتریان تازه</option>
           </select>
        </div>
    </div>
	
	<div class="form-group">
        <label for="description" class=" col-md-3">تاریخ پایان</label>
        <div class=" col-md-9">
            <?php
            echo form_textarea(array(
                "id" => "comment",
                "name" => "comment",
				"type" => "text",
                "value" => $model_info->comment,
                "class" => "form-control",
                "placeholder" => "توضیحات در مورد گروه تخفیفی",
            ));
            ?>
        </div>
    </div>
	 <div class="form-group">
        <label for="status" class=" col-md-3"><?php echo lang('status'); ?></label>
        <div class=" col-md-9">
            <?php
            echo form_radio(array(
                "id" => "activeOrDeactive",
                "name" => "activeOrDeactive",
                "data-msg-required" => lang("field_required"),
                    ), "active", ($model_info->activeOrDeactive == "active") ? true:false);
            ?>
            <label for="status_active" class=""><?php echo lang('active'); ?></label>
			<br>
            <?php
            echo form_radio(array(
                "id" => "activeOrDeactive",
                "name" => "activeOrDeactive",
                "data-msg-required" => lang("field_required"),
                    ), "deactive", ($model_info->activeOrDeactive == "deactive") ? true:false);
            ?>
            <label for="status_inactive" class=""><?php echo lang('inactive'); ?></label>
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> <?php echo lang('close'); ?></button>
    <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span> <?php echo lang('save'); ?></button>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">
    $(document).ready(function () {
        $("#category-form").appForm({
            onSuccess: function (result) {
                $("#category-table").appTable({newData: result.data, dataId: result.id});
            }
        });
    });
</script>    