<?php echo form_open(get_uri("reminders/add_reminder"), array("id" => "category-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    <div class="form-group">
        <label for="status" class=" col-md-3">نام کاربر</label>
        <div class=" col-md-9">
            <?php
				 echo form_dropdown("username", $users_dropdown ,"", "class='select2' id='psp_category' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
			?>
        </div>
    </div>

        <div class="form-group">
        <label for="status" class=" col-md-3">تاریخ</label>
        <div class=" col-md-9">
            <script type="text/javascript" src="/assets/js/jquery.min.js"></script>
            <script>
			 $(document).ready(function() {
			  $("#datepicker").persianDatepicker({
               autoClose: true,
              });
             });
			</script>
            <script src="/assets/js/persian-datepicker.min.js"></script>
            <div class="ant-col-xs-24 ant-col-sm-6 ant-col-md-6 ant-col-lg-6">
                <div class="ant-form-item-control has-feedback">
                <?php
                echo form_input(array(
                    "id" => "datepicker",
                    "name" => "datepicker",
                    "class" => "form-control ant-btn",
                    "placeholder" => "تاریخ",
                    "type" => "text",
                    "style" => "padding-right:5px",
                    "autofocus" => true,
                    "data-rule-required" => true,
                    "data-msg-required" => lang("field_required"),
                ));
            ?> 
                </div>
            </div>
        </div>
    </div>
	<div class="form-group">
        <label for="status" class=" col-md-3">نوع بیمه</label>
        <div class=" col-md-9">
            <?php
				 echo form_dropdown("insurance_type", $insurance_type_dropdown ,"", "class='select2' id='psp_category' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
			?>
        </div>
    </div>
	<div class="form-group">
        <label for="status" class=" col-md-3">شرکت بیمه</label>
        <div class=" col-md-9">
            <?php
				 echo form_dropdown("company", $company_dropdown ,"", "class='select2' id='psp_category' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
			?>
        </div>
    </div>
	<div class="form-group">
        <label for="status" class=" col-md-3">وضعیت</label>
        <div class=" col-md-9">
            <?php
				 echo form_dropdown("status", array(0=>'غیر فعال' , 1=>'فعال') ,1, "class='select2' id='psp_category' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
			?>
        </div>
    </div>
	
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> <?php echo lang('close'); ?></button>
    <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span> <?php echo lang('save'); ?></button>
</div>
<?php echo form_close(); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#category-form").appForm({
            onSuccess: function (result) {
                $("#category-table").appTable({newData: result.data, dataId: result.id});
            }
        });
    });
</script>    