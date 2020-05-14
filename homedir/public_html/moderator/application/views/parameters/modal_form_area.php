<?php echo form_open(get_uri("parameters/save_state"), array("id" => "team-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    <input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />
    <div class="form-group">
        <label for="state" class=" col-md-3">نام استان</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "state",
                "name" => "state",
                "value" => $model_info->state,
                "class" => "form-control",
                "placeholder" => "نام استان",
                "autofocus" => true,
                "data-rule-required" => true,
                "data-msg-required" => lang("field_required"),
            ));
            ?>
        </div>
    </div>
    
    <div class="form-group">
        <label for="title" class=" col-md-3">نام شرکت</label>
        <div class=" col-md-9">
            <?php
			 echo form_dropdown("company_id", $company_dropdown ,$price_info->company, "class='select2' id='psp_category' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
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
    $(document).ready(function() {
        $("#team-form").appForm({
            onSuccess: function(result) {
                $("#team-table").appTable({newData: result.data, dataId: result.id});
            }
        });
    $("#team_members_dropdown").select2({
            multiple: true,
            data: <?php echo ($members_dropdown); ?>
        });
        
        $("#team-form .select2").select2();
        $("#title").focus();
    });
</script>    