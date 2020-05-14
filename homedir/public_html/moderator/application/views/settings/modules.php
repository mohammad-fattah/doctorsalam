<div id="page-content" class="p20 row">
    <div class="col-sm-3 col-lg-2" style="background-color:#37b1c0">
        <?php
        $tab_view['active_tab'] = "modules";
        $this->load->view("settings/tabs", $tab_view);
        ?>
    </div>

    <div class="col-sm-9 col-lg-10" style="background-color:#fff">
        <?php echo form_open(get_uri("settings/save_module_settings"), array("id" => "module-settings-form", "class" => "general-form dashed-row", "role" => "form")); ?>
        <div class="panel">
            <div class="panel-default panel-heading">
                <h4><?php echo lang("manage_modules"); ?></h4>
                <div><?php echo lang("module_settings_instructions"); ?></div>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="module_order" class="col-md-2">سفارشات</label>
                    <div class="col-md-10">
                        <?php
                        echo form_checkbox("module_order", "1", get_setting("module_order") ? true : false, "id='module_order' class='ml15'");
                        ?>                       
                    </div>
                </div>
                <div class="form-group">
                    <label for="module_customer" class="col-md-2">مشتریان</label>
                    <div class="col-md-10">
                        <?php
                        echo form_checkbox("module_customer", "1", get_setting("module_customer") ? true : false, "id='module_customer' class='ml15'");
                        ?>                       
                    </div>
                </div>

                <div class="form-group">
                    <label for="module_agent" class="col-md-2">نمایندگان</label>
                    <div class="col-md-10">
                        <?php
                        echo form_checkbox("module_agent", "1", get_setting("module_agent") ? true : false, "id='module_agent' class='ml15'");
                        ?>                       
                    </div>
                </div>
                <div class="form-group">
                    <label for="module_broker" class="col-md-2">بازاریابان</label>
                    <div class="col-md-10">
                        <?php
                        echo form_checkbox("module_broker", "1", get_setting("module_broker") ? true : false, "id='module_broker' class='ml15'");
                        ?>                       
                    </div>
                </div>
				<div class="form-group">
                    <label for="module_staff" class="col-md-2">کارمندان</label>
                    <div class="col-md-10">
                        <?php
                        echo form_checkbox("module_staff", "1", get_setting("module_staff") ? true : false, "id='module_staff' class='ml15'");
                        ?>                       
                    </div>
                </div>
                <div class="form-group">
                    <label for="module_parameters" class="col-md-2">پارامترها</label>
                    <div class="col-md-10">
                        <?php
                        echo form_checkbox("module_parameters", "1", get_setting("module_parameters") ? true : false, "id='module_parameters' class='ml15'");
                        ?>                       
                    </div>
                </div>    
                <div class="form-group">
                    <label for="module_company" class="col-md-2">شرکت های بیمه</label>
                    <div class="col-md-10">
                        <?php
                        echo form_checkbox("module_company", "1", get_setting("module_company") ? true : false, "id='module_company' class='ml15'");
                        ?>                       
                    </div>
                </div>  
                <div class="form-group">
                    <label for="module_insurance_field" class="col-md-2">رشته تخصص ها</label>
                    <div class="col-md-10">
                        <?php
                        echo form_checkbox("module_insurance_field", "1", get_setting("module_insurance_field") ? true : false, "id='module_insurance_field' class='ml15'");
                        ?>                       
                    </div>
                </div>  
                <div class="form-group">
                    <label for="module_reminder" class="col-md-2">سررسید ها</label>
                    <div class="col-md-10">
                        <?php
                        echo form_checkbox("module_reminder", "1", get_setting("module_reminder") ? true : false, "id='module_reminder' class='ml15'");
                        ?>                       
                    </div>
                </div>
                <div class="form-group">
                    <label for="module_lottery" class="col-md-2">جشنواره ها</label>
                    <div class="col-md-10">
                        <?php
                        echo form_checkbox("module_lottery", "1", get_setting("module_lottery") ? true : false, "id='module_lottery' class='ml15'");
                        ?>                       
                    </div>
                </div>
                <div class="form-group">
                    <label for="module_wallet" class="col-md-2">مدیریت مالی</label>
                    <div class="col-md-10">
                        <?php
                        echo form_checkbox("module_wallet", "1", get_setting("module_wallet") ? true : false, "id='module_wallet' class='ml15'");
                        ?>                       
                    </div>
                </div>
                <div class="form-group">
                    <label for="module_ticket" class="col-md-2"><?php echo lang('ticket'); ?></label>
                    <div class="col-md-10">
                        <?php
                        echo form_checkbox("module_ticket", "1", get_setting("module_ticket") ? true : false, "id='module_ticket' class='ml15'");
                        ?>                       
                    </div>
                </div>
                <div class="form-group">
                    <label for="module_off" class="col-md-2">کدهای تخفیف</label>
                    <div class="col-md-10">
                        <?php
                        echo form_checkbox("module_off", "1", get_setting("module_off") ? true : false, "id='module_off' class='ml15'");
                        ?>                       
                    </div>
                </div>
                <div class="form-group">
                    <label for="module_announcements" class="col-md-2">اطلاعیه ها</label>
                    <div class="col-md-10">
                        <?php
                        echo form_checkbox("module_announcements", "1", get_setting("module_announcements") ? true : false, "id='module_announcements' class='ml15'");
                        ?>                       
                    </div>
                </div>
                <div class="form-group">
                    <label for="module_knowledge_base" class="col-md-2"><?php echo lang('knowledge_base') . " (" . lang("public") . ")"; ?></label>
                    <div class="col-md-10">
                        <?php
                        echo form_checkbox("module_knowledge_base", "1", get_setting("module_knowledge_base") ? true : false, "id='module_knowledge_base' class='ml15'");
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
    $(document).ready(function () {
        $("#module-settings-form").appForm({
            isModal: false,
            onSuccess: function (result) {
                appAlert.success(result.message, {duration: 10000});
                location.reload();
            }
        });
    });
</script>