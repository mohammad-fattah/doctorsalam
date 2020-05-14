<?php echo form_open(get_uri("insurance_parameter/add_parameter"), array("id" => "team_member-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    <input type="hidden" name="specialty" value="<?php echo $specialty; ?>" />
    <div class="tab-content mt15">
		
		<div class="form-group">
			<label for="last_name" class=" col-md-3">نام فارسی پارامتر</label>
			<div class=" col-md-9">
				<?php
				echo form_input(array(
					"id" => "name",
					"name" => "name",
					"value" => $model_info->name,
					"class" => "form-control",
					"placeholder" => "نام فارسی پارامتر",
					"data-rule-required" => true,
					"data-msg-required" => lang("field_required"),
				));
				?>
			</div>
		</div>
		<div class="form-group">
			<label for="last_name" class=" col-md-3">نام انگلیسی پارامتر</label>
			<div class=" col-md-9">
				<?php
				echo form_input(array(
					"id" => "element_name",
					"name" => "element_name",
					"value" => $model_info->element_name,
					"class" => "form-control",
					"placeholder" => "نام انگلیسی پارامتر",
					"data-rule-required" => true,
					"data-msg-required" => lang("field_required"),
				));
				?>
			</div>
		</div>
		
</div>
<div class="modal-footer">
    <button class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> <?php echo lang('close'); ?></button>
    <button id="form-submit" type="button" class="btn btn-primary "><span class="fa fa-check-circle"></span> <?php echo lang('save'); ?></button>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">
    $(document).ready(function() {
        $("#team_member-form").appForm({
            onSuccess: function(result) {
                if (result.success) {
                    $("#cover-table").appTable({newData: result.data, dataId: result.id});
                }
            },
            onSubmit: function() {
                $("#form-previous").attr('disabled', 'disabled');
            },
            onAjaxSuccess: function() {
                $("#form-previous").removeAttr('disabled');
            }
        });
        $("#form-submit").click(function() {
            $("#team_member-form").trigger('submit');
        });
    });
</script>