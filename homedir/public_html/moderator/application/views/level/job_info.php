<div class="tab-content">
    <?php echo form_open(get_uri("merchant/save_job_info/"), array("id" => "job-info-form", "class" => "general-form dashed-row white", "role" => "form")); ?>

    <input name="user_id" type="hidden" value="<?php echo $user_id; ?>" />
    <div class="panel">
        <div class="panel-default panel-heading">
            <h4><?php echo lang('job_info'); ?></h4>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label for="job_title" class=" col-md-2">نام پذیرنده</label>
                <div class=" col-md-10">
                    <?php
                    echo form_input(array(
                        "id" => "job_title",
                        "name" => "job_title",
                        "class" => "form-control",
                        "placeholder" => "نام پذیرنده",
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
			<div class="form-group">
                <label for="job_title" class=" col-md-2">انتخاب psp</label>
                <div class=" col-md-10">
                    <?php
                     echo form_dropdown("role", $role_dropdown, array(), "class='select2' id='psp'");
                    ?>
                </div>
            </div>
			<div class="form-group">
                <label for="job_title" class=" col-md-2">کد پذیرنده</label>
                <div class=" col-md-10">
                    <?php
                    echo form_input(array(
                        "id" => "psp_code",
                        "name" => "psp_code",
                        "class" => "form-control",
                        "placeholder" => "کد پذیرنده",
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
			<div class="form-group">
                <label for="job_title" class=" col-md-2">دسته بندی پذیرنده</label>
                <div class=" col-md-10">
                    <?php
                    echo form_input(array(
                        "id" => "psp_category",
                        "name" => "psp_category",
                        "class" => "form-control",
                        "placeholder" => "دسته بندی پذیرنده",
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
			<div class="form-group">
                <label for="job_title" class=" col-md-2">درصد تخفیف بانکی</label>
                <div class=" col-md-10">
                    <?php
                    echo form_input(array(
                        "id" => "off_bank",
                        "name" => "off_bank",
                        "class" => "form-control",
                        "placeholder" => "درصد تخفیف بانکی",
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
			<div class="form-group">
                <label for="job_title" class=" col-md-2">درصد تخفیف غیربانکی</label>
                <div class=" col-md-10">
                    <?php
                    echo form_input(array(
                        "id" => "off_no_bank",
                        "name" => "off_no_bank",
                        "class" => "form-control",
                        "placeholder" => "درصد تخفیف غیربانکی",
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
			<div class="form-group">
                <label for="job_title" class=" col-md-2">امتیاز</label>
                <div class=" col-md-10">
                    <?php
                    echo form_input(array(
                        "id" => "point",
                        "name" => "point",
                        "class" => "form-control",
                        "placeholder" => "امتیاز",
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
			<div class="form-group">
                <label for="job_title" class=" col-md-2">کارمزد</label>
                <div class=" col-md-10">
                    <?php
                    echo form_input(array(
                        "id" => "porsant",
                        "name" => "porsant",
                        "class" => "form-control",
                        "placeholder" => "کارمزد",
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
                window.location.href = "<?php echo get_uri("merchant/view/" . $job_info->user_id); ?>" + "/job_info";
            }
        });
        $("#job-info-form .select2").select2();

        setDatePicker("#date_of_hire");

    });
</script>    