<?php echo form_open(get_uri("archive/add_archive"), array("id" => "category-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    <div class="form-group">
        <label for="status" class=" col-md-3">نام</label>
        <div class=" col-md-9">
          <?php
           echo form_input(array(
            "id" => "name",
            "name" => "name",
            "class" => "form-control",
            "placeholder" => "نام",
            "autofocus" => true,
            "data-rule-required" => true,
            "data-msg-required" => lang("field_required"),
           ));
          ?>
        </div>
    </div>
    <div class="form-group">
        <label for="status" class=" col-md-3">رنگ</label>
        <div class=" col-md-9">
          <?php
           echo form_input(array(
            "id" => "color",
            "type" => "color",
            "name" => "color",
            "class" => "form-control",
            "placeholder" => "رنگ",
            "autofocus" => true,
            "data-rule-required" => true,
            "data-msg-required" => lang("field_required"),
           ));
          ?>
        </div>
    </div>
	<div class="form-group">
        <label for="status" class=" col-md-3">سال</label>
        <div class=" col-md-9">
          <?php
           echo form_input(array(
            "id" => "create_date",
            "name" => "create_date",
            "class" => "form-control",
            "placeholder" => "سال",
            "autofocus" => true,
            "data-rule-required" => true,
            "data-msg-required" => lang("field_required"),
           ));
          ?>
        </div>
    </div>
	<div class="form-group">
        <label for="status" class=" col-md-3">توضیحات</label>
        <div class=" col-md-9">
          <?php
           echo form_input(array(
            "id" => "comment",
            "name" => "comment",
            "class" => "form-control",
            "placeholder" => "توضیحات",
            "autofocus" => true,
            "data-rule-required" => true,
            "data-msg-required" => lang("field_required"),
           ));
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
                //$("#category-table").appTable({newData: result.data, dataId: result.id});
				location.reload();
            }
        });
    });
</script>    