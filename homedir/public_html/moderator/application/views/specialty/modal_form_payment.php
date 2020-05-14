<?php echo form_open(get_uri("insurance_parameter/add_parameter"), array("id" => "team_member-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    <input type="hidden" name="insurance" value="<?php echo $insurance; ?>" />
    <div class="tab-content mt15">
	    <div role="tabpanel" class="tab-pane active" id="general-info-tab">
        	<div class="form-group">
                <label for="job_title" class=" col-md-3">شرکت ها</label>
                <div class=" col-md-9">
					<?php
                     echo form_dropdown("company",$company_dropdown ,"", "class='select2' id='company' data-rule-required='true' , data-msg-required='" . lang('field_required') . "'");
                    ?>
                </div>
            </div>
		</div>
		
		<div class="form-group">
			<label for="last_name" class=" col-md-3">نام</label>
			<div class=" col-md-9">
				<?php
				echo form_input(array(
					"id" => "name",
					"name" => "name",
					"value" => $model_info->name,
					"class" => "form-control",
					"placeholder" => "نام",
					"data-rule-required" => true,
					"data-msg-required" => lang("field_required"),
				));
				?>
			</div>
		</div>
		<div class="form-group">
			<label for="last_name" class=" col-md-3">اولویت</label>
			<div class=" col-md-9">
				<?php
				echo form_input(array(
					"id" => "priority",
					"name" => "priority",
					"value" => $model_info->priority,
					"class" => "form-control",
					"placeholder" => "اولویت",
					"data-rule-required" => true,
					"data-msg-required" => lang("field_required"),
				));
				?>
			</div>
		</div>
		<div class="form-group">
			<label for="last_name" class=" col-md-3">نحوه پرداخت</label>
			<div class=" col-md-9">
				<?php
                 echo form_dropdown("default", $default ,$model_info->default, "class='select2' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
                ?>
			</div>
		</div>
		<div class="form-group">
			<label for="last_name" class=" col-md-3">سایز</label>
			<div class=" col-md-9">
				<?php
                 echo form_dropdown("size", $size ,$model_info->size, "class='select2' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
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

        $("#team_member-form input").keydown(function(e) {
            if (e.keyCode === 13) {
                e.preventDefault();
                if ($('#form-submit').hasClass('hide')) {
                    $("#form-next").trigger('click');
                } else {
                    $("#team_member-form").trigger('submit');
                }
            }
        });
        $("#first_name").focus();
        $("#team_member-form .select2").select2();
    });
</script>