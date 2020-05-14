<?php echo form_open(get_uri("insurance_parameter_price/add_parameter_price"), array("id" => "team_member-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">

    <div class="tab-content mt15">
        <div role="tabpanel" class="tab-pane active" id="general-info-tab">
        	<div class="form-group">
                <label for="job_title" class=" col-md-3">تخصص</label>
                <div class=" col-md-9">
					<?php
                     echo form_dropdown("insurance", $staff_dropdown ,$model_info->insurance, "class='select2' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
                    ?>
                </div>
            </div>
		</div>
		
		<div role="tabpanel" class="tab-pane active" id="general-info-tab">
        	<div class="form-group">
                <label for="job_title" class=" col-md-3">اولویت ها</label>
                <div class=" col-md-9">
					<?php
                     echo form_dropdown("insurance_parameter_price", $insurance_parameter_price_olv ,$model_info->insurance_parameter_price, "class='select2' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
                    ?>
                </div>
            </div>
		</div>
		
		<div role="tabpanel" class="tab-pane active" id="general-info-tab">
        	<div class="form-group">
                <label for="job_title" class=" col-md-3">پارامتر</label>
                <div class=" col-md-9">
					<?php
                     echo form_dropdown("parameter_val", $dependent ,$model_info->parameter_val, "class='select2' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
                    ?>
                </div>
            </div>
		</div>
		<div role="tabpanel" class="tab-pane active" id="general-info-tab">
        	<div class="form-group">
                <label for="job_title" class=" col-md-3">شرکت ها</label>
                <div class=" col-md-9">
					<?php
                     echo form_dropdown("company[]",$company_dropdown ,"", "class='select2 multiple' id='company' multiple='multiple' data-rule-required='true' , data-msg-required='" . lang('field_required') . "'");
                    ?>
                </div>
            </div>
		</div>
		<div class="form-group">
			<label for="last_name" class=" col-md-3">عمل</label>
			<div class=" col-md-9">
				<?php
                 echo form_dropdown("per_value", $per_value ,$model_info->per_value, "class='select2' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
                ?>
			</div>
		</div>
		<div class="form-group">
			<label for="last_name" class=" col-md-3">مقدار</label>
			<div class=" col-md-9">
				<?php
                 echo form_input(array(
					"id" => "value",
					"name" => "value",
					"value" => $model_info->value,
					"class" => "form-control",
					"placeholder" => "مقدار",
					"data-rule-required" => true,
					"data-msg-required" => lang("field_required"),
				));
                ?>
			</div>
		</div>
		<div class="form-group">
			<label for="last_name" class=" col-md-3">نوع</label>
			<div class=" col-md-9">
				<?php
                 echo form_dropdown("type_value", $type_value ,$model_info->type_value, "class='select2' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
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

        setDatePicker("#date_of_hire");

        $("#form-previous").click(function() {
            var $generalTab = $("#general-info-tab"),
                    $jobTab = $("#job-info-tab"),
                    $accountTab = $("#account-info-tab"),
                    $previousButton = $("#form-previous"),
                    $nextButton = $("#form-next"),
                    $submitButton = $("#form-submit");

            if ($accountTab.hasClass("active")) {
                $accountTab.removeClass("active");
                $jobTab.addClass("active");
                $nextButton.removeClass("hide");
                $submitButton.addClass("hide");
            } else if ($jobTab.hasClass("active")) {
                $jobTab.removeClass("active");
                $generalTab.addClass("active");
                $previousButton.addClass("hide");
                $nextButton.removeClass("hide");
                $submitButton.addClass("hide");
            }
        });

        $("#form-next").click(function() {
            var $generalTab = $("#general-info-tab"),
                    $jobTab = $("#job-info-tab"),
                    $accountTab = $("#account-info-tab"),
                    $previousButton = $("#form-previous"),
                    $nextButton = $("#form-next"),
                    $submitButton = $("#form-submit");
            if (!$("#team_member-form").valid()) {
                return false;
            }
            if ($generalTab.hasClass("active")) {
                $generalTab.removeClass("active");
                $jobTab.addClass("active");
                $previousButton.removeClass("hide");
                $("#form-progress-bar").width("35%");
                $("#general-info-label").find("i").removeClass("fa-circle-o").addClass("fa-check-circle");
                $("#team_member_id").focus();
            } else if ($jobTab.hasClass("active")) {
                $jobTab.removeClass("active");
                $accountTab.addClass("active");
                $previousButton.removeClass("hide");
                $nextButton.addClass("hide");
                $submitButton.removeClass("hide");
                $("#form-progress-bar").width("72%");
                $("#job-info-label").find("i").removeClass("fa-circle-o").addClass("fa-check-circle");
                $("#username").focus();
            }
        });

        $("#form-submit").click(function() {
            $("#team_member-form").trigger('submit');
        });

        $("#generate_password").click(function() {
            $("#password").val(getRndomString(8));
        });

        $("#show_hide_password").click(function() {
            var $target = $("#password"),
                    type = $target.attr("type");
            if (type === "password") {
                $(this).attr("title", "<?php echo lang("hide_text"); ?>");
                $(this).html("<span class='fa fa-eye-slash'></span>");
                $target.attr("type", "text");
            } else if (type === "text") {
                $(this).attr("title", "<?php echo lang("show_text"); ?>");
                $(this).html("<span class='fa fa-eye'></span>");
                $target.attr("type", "password");
            }
        });

        $("#user-role").change(function() {
            if ($(this).val() === "admin") {
                $("#user-role-help-block").removeClass("hide");
            } else {
                $("#user-role-help-block").addClass("hide");
            }
        });
    });
</script>