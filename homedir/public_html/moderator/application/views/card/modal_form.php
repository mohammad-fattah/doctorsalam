<?php echo form_open(get_uri("user_cards/save_category"), array("id" => "category-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    
    <input type="hidden" name="user_key" value="<?php echo $user_key; ?>" />
    <input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />
	<div class="form-group">
        <label for="title" class=" col-md-3">نام بانک</label>
        <div class=" col-md-9">
            <?php
			 echo form_dropdown("card_name", $banks_dropdown, $user_info->card_name, "class='select2' id='card_name' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
			?>
        </div>
    </div>
	<div class="form-group">
        <label for="description" class=" col-md-3">شماره کارت</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "card_number",
                "name" => "card_number",
                "maxlength" => "16",
                "class" => "form-control",
                "placeholder" => "شماره کارت",
				"data-rule-required" => true,
                "data-msg-required" => lang("field_required"),
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