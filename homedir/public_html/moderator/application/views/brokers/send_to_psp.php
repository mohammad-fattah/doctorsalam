<?php
echo form_open(get_uri("api/AddOrUpdateMember"), array("id" => "special-off-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
	<div style="font-size:12px">در صورتی که مشخصات بازاریاب شما صحیح می باشد , درخواست عضویت در باشگاه را ثبت کنید</div>
	<div class="form-group">
        <label for="title" class=" col-md-3">نام</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "Name",
                "name" => "Name",
				"value" => $model_info->first_name,
                "class" => "form-control",
                "placeholder" => "نام",
                "autofocus" => true,
                "data-rule-required" => true,
                "data-msg-required" => lang("field_required"),
				"disabled"=>"true"
            ));
            ?>
        </div>
    </div>
    <div class="form-group">
        <label for="description" class=" col-md-3">نام خانوادگی</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "Family",
                "name" => "Family",
				"value" => $model_info->last_name,
                "class" => "form-control",
                "placeholder" => "نام خانوادگی",
				"disabled"=>"true"
            ));
            ?>
        </div>
    </div>
	
	<div class="form-group">
        <label for="description" class=" col-md-3">کد ملی</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "NationalCode",
                "name" => "NationalCode",
				"value" => $model_info->melli_code,
                "class" => "form-control",
                "placeholder" => "کد ملی",
				"disabled"=>"true"
            ));
            ?>
        </div>
    </div>
	
	<div class="form-group">
        <label for="description" class=" col-md-3">شماره همراه</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "MobileNo",
                "name" => "MobileNo",
				"value" => $model_info->phone,
                "class" => "form-control",
                "placeholder" => "شماره همراه",
				"disabled"=>"true"
            ));
            ?>
        </div>
    </div>
	
    
</div>

<div class="modal-footer">
    <button type="submit" class="btn btn-primary">ثبت در باشگاه</button>
	<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close'); ?></button>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">
    $(document).ready(function () {
        $("#special-off-form").appForm({
            onSuccess: function (result) {
                //$("#product-table").appTable({newData: result.data, dataId: result.id});
            }
        });
    });
</script>    



