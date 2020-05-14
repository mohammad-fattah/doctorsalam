<?php echo form_open(get_uri("doctor/add_discount/$user_key"), array("id" => "discount-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    <input type="hidden" name="iddiscount" value="<?php echo $id; ?>" >
    <div class="tab-content mt15">
        <div role="tabpanel" class="tab-pane active" >
        	<div class="form-group">
                <label for="job_title" class=" col-md-3">تخصص</label>
                <div class=" col-md-9">
					<?php
                     echo form_dropdown("insurance", $staff_dropdown ,$model_info->insurance, "class='select2' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
                    ?>
                </div>
            </div>
		</div>
		<div role="tabpanel" class="tab-pane active" >
        	<div class="form-group">
                <label for="job_title" class=" col-md-3">شرکت</label>
                <div class=" col-md-9">
					<?php
                     echo form_dropdown("company[]", $company_dropdown ,$model_info->company, "class='select2' data-rule-required='true' multiple='multiple', data-msg-required='" . lang('field_required') . "'");
                    ?>
                </div>
            </div>
		</div>
		<div class="form-group">
		  <div class=" col-md-9">
			<label for="last_name" class=" col-md-4">مقدار</label>
			<div class=" col-md-8">
				<?php
				echo form_input(array(
					"id" => "value",
					"name" => "value",
					"value" => $model_info->value,
					"class" => "form-control",
					"placeholder" => "مثال : 6000",
					"data-rule-required" => true,
					"data-msg-required" => lang("field_required"),
				));
				?>
			</div>
		   </div>
		   <div class=" col-md-3">
		    <div class=" col-md-12" style="padding:0">
				<?php
                 echo form_dropdown("value_type", $value_type ,$model_info->value_type, "class='select2' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
                ?>
			</div>
		   </div>
		</div>
		<div class="form-group">
		  <div class=" col-md-9">
		    <label for="last_name" class=" col-md-4">برای رزرو</label>
		    <div class=" col-md-8" style="padding:0">
				<?php
                 echo form_dropdown("more_less", $more_less ,$model_info->more_less, "class='select2' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
                ?>
			</div>
		   </div>
		  <div class=" col-md-3">
			
			<div class=" col-md-12">
				<?php
				echo form_input(array(
					"id" => "more_less_val",
					"name" => "more_less_val",
					"value" => $model_info->more_less_val,
					"class" => "form-control",
					"placeholder" => "مثال : 6000",
					"data-rule-required" => true,
					"data-msg-required" => lang("field_required"),
				));
				?>
			</div>
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
        $("#discount-form").appForm({
            onSuccess: function(result) {
                if (result.success) {
                    $("#discount-table").appTable({newData: result.data, dataId: result.id});
                }
            }
        });
        $("#discount-form .select2").select2();
        
        $("#form-submit").click(function() {
            $("#discount-form").trigger('submit');
        });

     });
</script>