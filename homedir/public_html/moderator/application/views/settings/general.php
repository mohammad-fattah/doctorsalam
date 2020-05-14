<?php $this->load->view("includes/cropbox"); ?>
<style>.col-md-2{float:right}.form-group .checkbox label, .form-group .radio label, .form-group label, .form-group .label-on-left, .form-group .label-on-right{padding-top:8px}

.form-group .file-upload:before{display:none}
.form-group .file-upload{background:transparent!important;box-shadow: none;}
</style>
<div id="page-content" class="p220 row">


    <div class="col-sm-12 col-lg-12" style="background-color:#fff">
        <?php echo form_open(get_uri("settings/save_general_settings"), array("id" => "general-settings-form", "class" => "general-form dashed-row", "role" => "form")); ?>
        <div class="panel">
            <div class="panel-default panel-heading">
                <h4><?php echo lang("general_settings"); ?></h4>
            </div>
            <div class="panel-body post-dropzone">
                <div class="form-group">
                    <label for="logo" class=" col-md-2"><?php echo lang('site_logo'); ?></label>
                    <div class=" col-md-10">
                        <div class="pull-left mr15">
                            <img id="site-logo-preview" src="<?php echo get_setting("site_logo"); ?>" alt="..." />
                        </div>
                        <div class="pull-left file-upload btn btn-default btn-xs">
                            <span>...</span>
                            <input id="site_logo_file" class="cropbox-upload upload" name="site_logo_file" type="file" data-height="100" data-width="100" data-preview-container="#site-logo-preview" data-input-field="#site_logo" />
                        </div>
                        <input type="hidden" id="site_logo" name="site_logo" value=""  />
                    </div>
                </div>
				<!--<div class="form-group">
                    <label for="show_background_image_in_signin_page" class=" col-md-2">ساعت کاری روزهای عادی</label>
                    <div class="col-md-4">
					    <span style="padding:0 10px">از</span>
                        <?php
                         echo form_dropdown(
                           "date_format", array(
                            "01:00" => "01:00",
                            "02:00" => "02:00",
                            "03:00" => "03:00",
                            "04:00" => "04:00",
                            "05:00" => "05:00",
                            "06:00" => "06:00",
                            "07:00" => "07:00",
                            "08:00" => "08:00",
                            "09:00" => "09:00",
                            "10:00" => "10:00",
                            "11:00" => "11:00",
                            "12:00" => "12:00",
                            "13:00" => "13:00",
                            "14:00" => "14:00",
                            "15:00" => "15:00",
                            "16:00" => "16:00",
                            "17:00" => "17:00",
                            "18:00" => "18:00",
                            "19:00" => "19:00",
                            "20:00" => "20:00",
                            "21:00" => "21:00",
                            "22:00" => "22:00",
                            "23:00" => "23:00",
                            "24:00" => "24:00",
                           ), get_setting('date_format'), "class='select2 mini'"
                         );
                        ?>
                    </div>
					<div class="col-md-4">
					    <span style="padding:0 10px">تا</span>
                        <?php
                         echo form_dropdown(
                           "date_format", array(
                            "01:00" => "01:00",
                            "02:00" => "02:00",
                            "03:00" => "03:00",
                            "04:00" => "04:00",
                            "05:00" => "05:00",
                            "06:00" => "06:00",
                            "07:00" => "07:00",
                            "08:00" => "08:00",
                            "09:00" => "09:00",
                            "10:00" => "10:00",
                            "11:00" => "11:00",
                            "12:00" => "12:00",
                            "13:00" => "13:00",
                            "14:00" => "14:00",
                            "15:00" => "15:00",
                            "16:00" => "16:00",
                            "17:00" => "17:00",
                            "18:00" => "18:00",
                            "19:00" => "19:00",
                            "20:00" => "20:00",
                            "21:00" => "21:00",
                            "22:00" => "22:00",
                            "23:00" => "23:00",
                            "24:00" => "24:00",
                           ), get_setting('date_format'), "class='select2 mini'"
                         );
                        ?>
                    </div>
                </div>
				<div class="form-group">
                    <label for="show_background_image_in_signin_page" class=" col-md-2">ساعت کاری پنج شنبه</label>
                    <div class="col-md-4">
					    <span style="padding:0 10px">از</span>
                        <?php
                         echo form_dropdown(
                           "date_format", array(
                            "01:00" => "01:00",
                            "02:00" => "02:00",
                            "03:00" => "03:00",
                            "04:00" => "04:00",
                            "05:00" => "05:00",
                            "06:00" => "06:00",
                            "07:00" => "07:00",
                            "08:00" => "08:00",
                            "09:00" => "09:00",
                            "10:00" => "10:00",
                            "11:00" => "11:00",
                            "12:00" => "12:00",
                            "13:00" => "13:00",
                            "14:00" => "14:00",
                            "15:00" => "15:00",
                            "16:00" => "16:00",
                            "17:00" => "17:00",
                            "18:00" => "18:00",
                            "19:00" => "19:00",
                            "20:00" => "20:00",
                            "21:00" => "21:00",
                            "22:00" => "22:00",
                            "23:00" => "23:00",
                            "24:00" => "24:00",
                           ), get_setting('date_format'), "class='select2 mini'"
                         );
                        ?>
                    </div>
					<div class="col-md-4">
					    <span style="padding:0 10px">تا</span>
                        <?php
                         echo form_dropdown(
                           "date_format", array(
                            "01:00" => "01:00",
                            "02:00" => "02:00",
                            "03:00" => "03:00",
                            "04:00" => "04:00",
                            "05:00" => "05:00",
                            "06:00" => "06:00",
                            "07:00" => "07:00",
                            "08:00" => "08:00",
                            "09:00" => "09:00",
                            "10:00" => "10:00",
                            "11:00" => "11:00",
                            "12:00" => "12:00",
                            "13:00" => "13:00",
                            "14:00" => "14:00",
                            "15:00" => "15:00",
                            "16:00" => "16:00",
                            "17:00" => "17:00",
                            "18:00" => "18:00",
                            "19:00" => "19:00",
                            "20:00" => "20:00",
                            "21:00" => "21:00",
                            "22:00" => "22:00",
                            "23:00" => "23:00",
                            "24:00" => "24:00",
                           ), get_setting('date_format'), "class='select2 mini'"
                         );
                        ?>
                    </div>
					<div class="col-md-2">
                        <?php
                         echo form_dropdown(
                           "date_format", array(
                            "0" => "تعطیل است",
                            "1" => "تعطیل نیست",
                           ), get_setting('date_format'), "class='select2 mini'"
                         );
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="show_background_image_in_signin_page" class=" col-md-2">ساعت کاری روزهای تعطیل</label>
                    <div class="col-md-4">
					    <span style="padding:0 10px">از</span>
                        <?php
                         echo form_dropdown(
                           "date_format", array(
                            "01:00" => "01:00",
                            "02:00" => "02:00",
                            "03:00" => "03:00",
                            "04:00" => "04:00",
                            "05:00" => "05:00",
                            "06:00" => "06:00",
                            "07:00" => "07:00",
                            "08:00" => "08:00",
                            "09:00" => "09:00",
                            "10:00" => "10:00",
                            "11:00" => "11:00",
                            "12:00" => "12:00",
                            "13:00" => "13:00",
                            "14:00" => "14:00",
                            "15:00" => "15:00",
                            "16:00" => "16:00",
                            "17:00" => "17:00",
                            "18:00" => "18:00",
                            "19:00" => "19:00",
                            "20:00" => "20:00",
                            "21:00" => "21:00",
                            "22:00" => "22:00",
                            "23:00" => "23:00",
                            "24:00" => "24:00",
                           ), get_setting('date_format'), "class='select2 mini'"
                         );
                        ?>
                    </div>
					<div class="col-md-4">
					    <span style="padding:0 10px">تا</span>
                        <?php
                         echo form_dropdown(
                           "date_format", array(
                            "01:00" => "01:00",
                            "02:00" => "02:00",
                            "03:00" => "03:00",
                            "04:00" => "04:00",
                            "05:00" => "05:00",
                            "06:00" => "06:00",
                            "07:00" => "07:00",
                            "08:00" => "08:00",
                            "09:00" => "09:00",
                            "10:00" => "10:00",
                            "11:00" => "11:00",
                            "12:00" => "12:00",
                            "13:00" => "13:00",
                            "14:00" => "14:00",
                            "15:00" => "15:00",
                            "16:00" => "16:00",
                            "17:00" => "17:00",
                            "18:00" => "18:00",
                            "19:00" => "19:00",
                            "20:00" => "20:00",
                            "21:00" => "21:00",
                            "22:00" => "22:00",
                            "23:00" => "23:00",
                            "24:00" => "24:00",
                           ), get_setting('date_format'), "class='select2 mini'"
                         );
                        ?>
                    </div>
                    <div class="col-md-2">
                        <?php
                         echo form_dropdown(
                           "date_format", array(
                            "0" => "تعطیل است",
                            "1" => "تعطیل نیست",
                           ), get_setting('date_format'), "class='select2 mini'"
                         );
                        ?>
                    </div>
				</div>
				-->
				<div class="form-group">
                    <label for="default_currency" class=" col-md-2"><?php echo lang('currency'); ?></label>
                    <div class="col-md-10">
                        <?php
                        echo form_dropdown(
                                "default_currency", $currency_dropdown, get_setting('default_currency'), "class='select2 mini'"
                        );
                        ?>
                    </div>
                </div>
				<div class="form-group" style="display:none">
                    <label class=" col-md-2"><?php echo lang('signin_page_background'); ?></label>
                    <div class=" col-md-10">
                        <div class="pull-left mr15">
                            <img id="signin-background-preview" style="max-width: 100px; max-height: 80px;" src="<?php echo get_file_uri(get_setting("system_file_path") . "sigin-background-image.jpg"); ?>" alt="..." />
                        </div>
                        <div class="pull-left mr15">
                            <?php $this->load->view("includes/dropzone_preview"); ?>    
                        </div>
                        <div class="pull-left upload-file-button btn btn-default btn-xs">
                            <span>...</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="app_title" class=" col-md-2"><?php echo lang('app_title'); ?></label>
                    <div class=" col-md-10">
                        <?php
                        echo form_input(array(
                            "id" => "app_title",
                            "name" => "app_title",
                            "value" => get_setting('app_title'),
                            "class" => "form-control",
                            "placeholder" => lang('app_title'),
                            "data-rule-required" => true,
                            "data-msg-required" => lang("field_required"),
                        ));
                        ?>
                    </div>
                </div>
                <div class="form-group" style="display:block">
                    <label for="language" class=" col-md-2"><?php echo lang('language'); ?></label>
                    <div class="col-md-10">
                        <?php
                        echo form_dropdown(
                                "language", $language_dropdown, get_setting('language'), "class='select2 mini'"
                        );
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="date_format" class=" col-md-2"><?php echo lang('date_format'); ?></label>
                    <div class="col-md-10">
                        <?php
                        echo form_dropdown(
                                "date_format", array(
                            "d-m-Y" => "d-m-Y",
                            "m-d-Y" => "m-d-Y",
                            "Y-m-d" => "Y-m-d",
                            "d/m/Y" => "d/m/Y",
                            "m/d/Y" => "m/d/Y",
                            "Y/m/d" => "Y/m/d",
                            "d.m.Y" => "d.m.Y",
                            "m.d.Y" => "m.d.Y",
                            "Y.m.d" => "Y.m.d",
                                ), get_setting('date_format'), "class='select2 mini'"
                        );
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="rows_per_page" class=" col-md-2"><?php echo lang('rows_per_page'); ?></label>
                    <div class="col-md-10">
                        <?php
                        echo form_dropdown(
                                "rows_per_page", array(
                            "10" => "10",
                            "25" => "25",
                            "50" => "50",
                            "100" => "100",
                                ), get_setting('rows_per_page'), "class='select2 mini'"
                        );
                        ?>
                    </div>
                </div>
				<!------------------>
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
                    <label for="company_email" class=" col-md-2"><?php echo lang('email'); ?></label>
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
                    <label for="company_website" class=" col-md-2">آدرس فیس بوک</label>
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
                    <label for="company_website" class=" col-md-2">آدرس توییتر</label>
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
                    <label for="company_website" class=" col-md-2">آدرس تلگرام</label>
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
                    <label for="company_website" class=" col-md-2">آدرس اینستاگرام</label>
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
				<div class="form-group">
                    <label for="company_website" class=" col-md-2">آدرس آپارات</label>
                    <div class=" col-md-10">
                        <?php
                        echo form_input(array(
                            "id" => "company_aparat",
                            "name" => "company_aparat",
                            "value" => get_setting("company_aparat"),
                            "class" => "form-control",
                            "placeholder" =>'اینستاگرام'
                        ));
                        ?>
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="company_website" class=" col-md-2">لینک اندروید</label>
                    <div class=" col-md-10">
                        <?php
                        echo form_input(array(
                            "id" => "android_app_link",
                            "name" => "android_app_link",
                            "value" => get_setting("android_app_link"),
                            "class" => "form-control",
                            "placeholder" =>'لینک اندروید'
                        ));
                        ?>
                    </div>
                </div>
				<div class="form-group">
                    <label for="company_website" class=" col-md-2">لینک آی او اس</label>
                    <div class=" col-md-10">
                        <?php
                        echo form_input(array(
                            "id" => "ios_app_link",
                            "name" => "ios_app_link",
                            "value" => get_setting("ios_app_link"),
                            "class" => "form-control",
                            "placeholder" =>'لینک آی او اس'
                        ));
                        ?>
                    </div>
                </div>
            
				<div class="form-group">
                    <label for="scrollbar" class=" col-md-2">اطلاعیه خاموشی سایت</label>
                    <div class="col-md-10">
					  <?php
                        echo form_input(array(
                            "id" => "message_off",
                            "type" => "text",
                            "style" => "padding:0;margin:0;font-size:12px",
                            "name" => "message_off",
                            "value" => get_setting('message_off'),
                            "class" => "form-control",
                            "placeholder" => "اطلاعیه خاموشی سایت",
                            "data-msg-required" => "اطلاعیه خاموشی سایت",
                        ));
                        ?>
                    </div>
                </div>
				<div class="form-group">
                    <label for="scrollbar" class=" col-md-2">API درگاه پرداخت پی</label>
                    <div class="col-md-10">
					  <?php
                        echo form_input(array(
                            "id" => "api_pay",
                            "type" => "text",
                            "style" => "padding:0;margin:0;font-size:14px;font-family:tahoma",
                            "name" => "api_pay",
                            "value" => get_setting('api_pay'),
                            "class" => "form-control",
                            "placeholder" => "API درگاه پرداخت پی",
                            "data-msg-required" => "API درگاه پرداخت پی",
                        ));
                        ?>
                    </div>
                </div>
				<div class="form-group">
                    <label for="scrollbar" class=" col-md-2">API_key پیامک</label>
                    <div class="col-md-10">
					  <?php
                        echo form_input(array(
                            "id" => "api_kavenegar",
                            "type" => "text",
                            "style" => "padding:0;margin:0;font-size:14px;font-family:tahoma",
                            "name" => "api_kavenegar",
                            "value" => get_setting('api_kavenegar'),
                            "class" => "form-control",
                            "placeholder" => "API_key پیامک",
                            "data-msg-required" => "API_key پیامک",
                        ));
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="scrollbar" class=" col-md-2">طول جغرافیایی</label>
                    <div class="col-md-10">
                      <?php
                        echo form_input(array(
                            "id" => "longitude",
                            "type" => "text",
                            "style" => "padding:0;margin:0;font-size:14px;font-family:tahoma",
                            "name" => "longitude",
                            "value" => get_setting('longitude'),
                            "class" => "form-control",
                            "placeholder" => "طول جغرافیایی",
                            "data-msg-required" => "طول جغرافیایی",
                        ));
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="scrollbar" class=" col-md-2">عرض جغرافیایی</label>
                    <div class="col-md-10">
                      <?php
                        echo form_input(array(
                            "id" => "latitude",
                            "type" => "text",
                            "style" => "padding:0;margin:0;font-size:14px;font-family:tahoma",
                            "name" => "latitude",
                            "value" => get_setting('latitude'),
                            "class" => "form-control",
                            "placeholder" => "عرض جغرافیایی",
                            "data-msg-required" => "عرض جغرافیایی",
                        ));
                        ?>
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="scrollbar" class=" col-md-2">رنگ تم سایت</label>
                    <div class="col-md-10">
					  <?php
                        echo form_input(array(
                            "id" => "site_background",
                            "type" => "color",
                            "style" => "padding:0;max-width:200px;margin:0",
                            "name" => "site_background",
                            "value" => get_setting('site_background'),
                            "class" => "form-control",
                            "placeholder" => "رنگ تم سایت",
                            "data-msg-required" => "رنگ تم سایت",
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

<?php $this->load->view("includes/cropbox"); ?>

<script type="text/javascript">
    $(document).ready(function () {
        $("#general-settings-form .select2").select2();

        $("#general-settings-form").appForm({
            isModal: false,
            beforeAjaxSubmit: function (data) {
                $.each(data, function (index, obj) {
                    if (obj.name === "invoice_logo" || obj.name === "site_logo") {
                        var image = replaceAll(":", "~", data[index]["value"]);
                        data[index]["value"] = image;
                    }
                });
            },
            onSuccess: function (result) {
                appAlert.success(result.message, {duration: 500});
                if ($("#site_logo").val() || $("#invoice_logo").val()) {
                    location.reload();
                }
            }
        });

        var uploadUrl = "<?php echo get_uri('settings/upload_file'); ?>";
        var validationUrl = "<?php echo get_uri('settings/validate_file'); ?>";

        var dropzone = attachDropzoneWithForm("#general-settings-form", uploadUrl, validationUrl, {maxFiles: 1});


        $(".cropbox-upload").change(function () {
            showCropBox(this);
        });

    });
</script>