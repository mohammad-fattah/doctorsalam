<div id="page-content" class="p20 row">
    <div class="col-sm-3 col-lg-2" style="background-color:#37b1c0">
        <?php
        $tab_view['active_tab'] = "company";
        $this->load->view("settings/tabs", $tab_view);
        ?>
    </div>

    <div class="col-sm-9 col-lg-10" style="background-color:#fff">
        <?php echo form_open(get_uri("settings/save_company_settings"), array("id" => "company-settings-form", "class" => "general-form dashed-row", "role" => "form")); ?>
        <div class="panel">
            <div class="panel-default panel-heading">
                <h4><?php echo lang("company_settings"); ?></h4>
            </div>
            <div class="panel-body">
                <!--<div class="form-group">
                    <label for="company_name" class=" col-md-2"><?php //echo lang('company_name'); ?></label>
                    <div class=" col-md-10">
                        <?php
                        /*echo form_input(array(
                            "id" => "company_name",
                            "name" => "company_name",
                            "value" => get_setting("company_name"),
                            "class" => "form-control",
                            "placeholder" => lang('company_name'),
                            "data-rule-required" => true,
                            "data-msg-required" => lang("field_required")
                        ));*/
                        ?>
                    </div>
                </div>-->

                <div class="form-group">
                    <label for="company_address" class=" col-md-2"><?php echo lang('address'); ?></label>
                    <div class=" col-md-10">
                        <?php
                        echo form_textarea(array(
                            "id" => "company_address",
                            "name" => "company_address",
                            "value" => get_setting("company_address"),
                            "class" => "form-control",
                            "placeholder" => lang('address'),
                        ));
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="company_phone" class=" col-md-2">شماره تماس</label>
                    <div class=" col-md-10">
                        <?php
                        echo form_input(array(
                            "id" => "company_phone",
                            "name" => "company_phone",
                            "value" => get_setting("company_phone"),
                            "class" => "form-control",
                            "placeholder" => "شماره تماس"
                        ));
                        ?>
                    </div>
                </div>
				<div class="form-group">
                    <label for="company_website" class=" col-md-2">فکس</label>
                    <div class=" col-md-10">
                        <?php
                        echo form_input(array(
                            "id" => "company_fax",
                            "name" => "company_fax",
                            "value" => get_setting("company_fax"),
                            "class" => "form-control",
                            "placeholder" => 'فکس'
                        ));
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="company_email" class=" col-md-2"><?php echo lang('email'); ?> عمومی</label>
                    <div class=" col-md-10">
                        <?php
                        echo form_input(array(
                            "id" => "company_email",
                            "name" => "company_email",
                            "value" => get_setting("company_email"),
                            "class" => "form-control",
                            "placeholder" => lang('email')
                        ));
                        ?>
                    </div>
                </div>
				<div class="form-group">
                    <label for="company_email" class=" col-md-2"><?php echo lang('email'); ?> فروش</label>
                    <div class=" col-md-10">
                        <?php
                        echo form_input(array(
                            "id" => "company_email_sell",
                            "name" => "company_email_sell",
                            "value" => get_setting("company_email_sell"),
                            "class" => "form-control",
                            "placeholder" => "پست الکترونیکی فروش"
                        ));
                        ?>
                    </div>
                </div>
				
                <div class="form-group">
                    <label for="company_website" class=" col-md-2"><?php echo lang('website'); ?></label>
                    <div class=" col-md-10">
                        <?php
                        echo form_input(array(
                            "id" => "company_website",
                            "name" => "company_website",
                            "value" => get_setting("company_website"),
                            "class" => "form-control",
                            "placeholder" => lang('website')
                        ));
                        ?>
                    </div>
                </div>
				<div class="form-group">
                    <label for="company_website" class=" col-md-2">فیس بوک</label>
                    <div class=" col-md-10">
                        <?php
                        echo form_input(array(
                            "id" => "company_facebook",
                            "name" => "company_facebook",
                            "value" => get_setting("company_facebook"),
                            "class" => "form-control",
                            "placeholder" =>'فیس بوک'
                        ));
                        ?>
                    </div>
                </div>
				<div class="form-group">
                    <label for="company_website" class=" col-md-2">توییتر</label>
                    <div class=" col-md-10">
                        <?php
                        echo form_input(array(
                            "id" => "company_twitter",
                            "name" => "company_twitter",
                            "value" => get_setting("company_twitter"),
                            "class" => "form-control",
                            "placeholder" =>'توییتر'
                        ));
                        ?>
                    </div>
                </div>
				<div class="form-group">
                    <label for="company_website" class=" col-md-2">تلگرام</label>
                    <div class=" col-md-10">
                        <?php
                        echo form_input(array(
                            "id" => "company_telegram",
                            "name" => "company_telegram",
                            "value" => get_setting("company_telegram"),
                            "class" => "form-control",
                            "placeholder" =>'تلگرام'
                        ));
                        ?>
                    </div>
                </div>
				<div class="form-group">
                    <label for="company_website" class=" col-md-2">اینستاگرام</label>
                    <div class=" col-md-10">
                        <?php
                        echo form_input(array(
                            "id" => "company_instagram",
                            "name" => "company_instagram",
                            "value" => get_setting("company_instagram"),
                            "class" => "form-control",
                            "placeholder" =>'اینستاگرام'
                        ));
                        ?>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span> <?php echo lang('save'); ?></button>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#company-settings-form").appForm({
            isModal: false,
            onSuccess: function(result) {
                appAlert.success(result.message, {duration: 10000});
            }
        });

    });
</script>