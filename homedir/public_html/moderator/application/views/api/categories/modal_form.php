<?php echo form_open(get_uri("validation/save_category"), array("id" => "category-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    <input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />

    <div class="form-group">
        <label for="title" class=" col-md-3">نام کاربری</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "username",
                "name" => "username",
                "value" => $model_info->username,
                "class" => "form-control",
                "placeholder" =>"نام کاربری ( username )",
                "autofocus" => true,
                "data-rule-required" => true,
                "data-msg-required" => lang("field_required"),
            ));
            ?>
        </div>
    </div>
	<div class="form-group">
        <label for="description" class=" col-md-3">پسورد</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "password",
                "name" => "password",
                "value" => $model_info->password,
                "class" => "form-control",
                "placeholder" => "پسورد",
            ));
            ?>
        </div>
    </div>
	<div class="form-group">
        <label for="description" class=" col-md-3">API key</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "API_Key",
                "name" => "API_Key",
                "value" => $model_info->API_Key,
                "class" => "form-control",
                "placeholder" => "کلید API",
				"disabled" => true,
            ));
            ?>
        </div>
    </div>

	 <div class="form-group">
        <label for="status" class=" col-md-3"><?php echo lang('status'); ?></label>
        <div class=" col-md-9">
            <?php
            echo form_radio(array(
                "id" => "status_active",
                "name" => "status",
                "data-msg-required" => lang("field_required"),
                    ), "1", ($model_info->status === "1") ? true : ($model_info->status !== "0") ? true : false);
            ?>
            <label for="status_active" class=""><?php echo lang('active'); ?></label>
			<br>
            <?php
            echo form_radio(array(
                "id" => "status_inactive",
                "name" => "status",
                "data-msg-required" => lang("field_required"),
                    ), "0", ($model_info->status === "0") ? true : false);
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