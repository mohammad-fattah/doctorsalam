<div class="tab-content">
    <?php echo form_open(get_uri("archive/save_general_info/" . $info->id), array("id" => "general-info-form", "class" => "general-form dashed-row white", "role" => "form")); ?>
    <div class="panel">
        <div class="panel-default panel-heading">
            <h4>اطلاعات زونکن</h4>
        </div>
        <div class="panel-body">
          <div class="form-group col-md-6">
                <label for="name" class=" col-md-4">نام</label>
                <div class=" col-md-8">
				    
                    <?php
                    echo form_input(array(
                        "id" => "name",
                        "name" => "name",
						"value" => $info->name,
                        "class" => "form-control",
                        "placeholder" => "نام",
                        "autofocus" => true,
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
			<div class="form-group col-md-6">
                <label for="name" class=" col-md-4">رنگ</label>
                <div class=" col-md-8">
				    
                    <?php
                    echo form_input(array(
                        "id" => "color",
                        "name" => "color",
                        "type" => "color",
						"value" => $info->color,
                        "class" => "form-control",
                    ));
                    ?>
                </div>
            </div>
			<div class="form-group col-md-6">
                <label for="name" class=" col-md-4">سال</label>
                <div class=" col-md-8">
				    
                    <?php
                    echo form_input(array(
                        "id" => "create_date",
                        "name" => "create_date",
						"value" => $info->create_date,
                        "class" => "form-control",
                        "placeholder" => "سال",
                        "autofocus" => true,
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
			<div class="form-group col-md-6">
                <label for="name" class=" col-md-4">توضیحات</label>
                <div class=" col-md-8">
				    
                    <?php
                    echo form_input(array(
                        "id" => "comment",
                        "name" => "comment",
						"value" => $info->comment,
                        "class" => "form-control",
                        "placeholder" => "توضیحات",
                        "autofocus" => true,
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
			<div class="form-group col-md-6" >
                <label for="job_title" class=" col-md-4">وضعیت</label>
                <div class=" col-md-8">
                    <?php
					 echo form_dropdown("status", $status ,$info->deleted, "class='select2' id='statuses' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
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

<script type="text/javascript">
    $(document).ready(function () {
        $(".select2").select2();
		$("#general-info-form").appForm({
            isModal: false,
            onSuccess: function (result) {
                appAlert.success(result.message, {duration: 10000});
                setTimeout(function () {
                    window.location.href = '';
                }, 500000);
            }
        });
    });
</script>
