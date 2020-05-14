<div class="tab-content">
    <?php echo form_open(get_uri("merchant/save_job_info/"), array("id" => "job-info-form", "class" => "general-form dashed-row white", "role" => "form")); ?>

    <input name="user_id" type="hidden" value="<?php echo $id; ?>" />
    <div class="panel">
        <div class="panel-default panel-heading">
            <h4><?php echo lang('job_info'); ?></h4>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label for="job_title" class=" col-md-3">نام پذیرنده</label>
                <div class=" col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "job_title",
                        "name" => "job_title",
						"value" => $user_info->job_title,
                        "class" => "form-control",
                        "placeholder" => "نام پذیرنده",
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
			<div class="form-group">
                <label for="job_title" class=" col-md-3">کد پذیرنده</label>
                <div class=" col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "merchant_code",
                        "name" => "merchant_code",
						"value" => $user_info->merchant_code,
                        "class" => "form-control",
                        "placeholder" => "کد پذیرنده",
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
			<div class="form-group">
                <label for="job_title" class=" col-md-3">شماره ثابت</label>
                <div class=" col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "alternative_phone",
                        "name" => "alternative_phone",
						"value" => $user_info->alternative_phone,
                        "class" => "form-control",
                        "placeholder" => "شماره ثابت",
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
			<div class="form-group">
                <label for="job_title" class=" col-md-3">دسته بندی پذیرنده</label>
                <div class=" col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "psp_category",
                        "name" => "psp_category",
						"value" => $user_info->psp_category,
                        "class" => "form-control",
                        "placeholder" => "دسته بندی پذیرنده",
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
        
		</div>

        <?php if ($this->login_user->is_admin) { ?>
            <div class="panel-footer">
                <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span> <?php echo lang('save'); ?></button>
            </div>
        <?php } ?>

    </div>
    <?php echo form_close(); ?>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#job-info-form").appForm({
            isModal: false,
            onSuccess: function (result) {
                appAlert.success(result.message, {duration: 10000});
            }
        });
        $("#job-info-form .select2").select2();

        setDatePicker("#date_of_hire");

    });
</script>    