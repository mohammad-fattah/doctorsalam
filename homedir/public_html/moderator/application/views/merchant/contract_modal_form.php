<?php echo form_open_multipart(get_uri("merchant/save_upload_contract"), array("id" => "team_member-form", "class" => "general-form", "role" => "form" )); ?>


<input type="hidden" name="id" value="<?php echo $id ?>" />
<input type="hidden" name="user_id" value="<?php echo $user_id ?>" />


<div class="modal-body clearfix">

    <div class="tab-content mt15">
        <div role="tabpanel" class="tab-pane active" id="general-info-tab">
            <div class="form-group">
                <label for="name" class=" col-md-3">شماره قرارداد</label>
                <div class=" col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "code",
                        "name" => "code",
                        "class" => "form-control",
						"value" => $modal_info->code,
                        "placeholder" => "شماره قرارداد",
                        "autofocus" => true,
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
			
            <div class="form-group">
                <label for="last_name" class=" col-md-3">مدت قرارداد</label>
                <div class=" col-md-9">
                    <?php
						echo form_dropdown("length", $length_dropdown, $modal_info->length, "class='select2' id='psp_category' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
					?>
                </div>
            </div>
			<div class="form-group">
                <label for="last_name" class=" col-md-3">تاریخ قرارداد</label>
                <div class=" col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "date",
                        "name" => "date",
						"type" => "date",
						"value" => $modal_info->date,
                        "class" => "form-control",
                        "placeholder" => "تاریخ قرارداد",
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
            <div class="form-group">
            <label for="last_name" class=" col-md-3">وضعیت</label>
                <div class=" col-md-9">
					<?php echo form_label('فعال') .
						form_radio(array('name' => 'status', 'value' => '1', 'checked' => $modal_info->status ? true : false)); ?><br>
				
					<?php echo form_label('غیرفعال') .
						form_radio(array('name' => 'status', 'value' => '0', 'checked' => $modal_info->status ? false : true)); ?><br>
				</div>
			</div>
			
			<div>
                <label for="job_title" class=" col-md-3">فایل قرارداد</label>
                <div class=" col-md-9">
				<?php
                    echo form_input(array(
						'type' => 'file',
						'name' => 'contract',
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
						));
				?>
                </div>
            </div>
			<br/>
			
			<div class="form-group">
                <label for="last_name" class=" col-md-3">نام فایل</label>
                <div class=" col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "contract_name",
                        "name" => "contract_name",
                        "class" => "form-control",
                        "placeholder" => "نام فایل",
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
			
        </div>
    </div>

</div>


<div class="modal-footer">
    <button class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> <?php echo lang('close'); ?></button>
    <button id="form-submit" type="button" class="btn btn-primary"><span class="fa fa-check-circle"></span> <?php echo lang('save'); ?></button>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">
    $(document).ready(function() {
        $("#team_member-form").appForm({
            onSuccess: function(result) {
                if (result.success) {
                    $("#project-table").appTable({newData: result.data, dataId: result.id});
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
<script>
function Func() {
var city = document.getElementById('city');
var state=document.getElementById('state');
var val=state.options[state.selectedIndex].getAttribute('data-name');
var arr=val.split(',');
city.options.length = 0;
for(i = 0; i < arr.length; i++)
{
if(arr[i] != "")
{
city.options[city.options.length]=new Option(arr[i],arr[i]);
}
}
}
</script>