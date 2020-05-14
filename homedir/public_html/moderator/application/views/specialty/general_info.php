<div class="tab-content">
    <?php echo form_open(get_uri("specialty/save_general_info/".$info->id), array("id" => "general-info-form", "class" => "general-form dashed-row white", "role" => "form")); ?>
    <div class="panel">
        <div class="panel-body">
            <div class="form-group">
			  <div class=" col-md-6">
                <label for="name" class="col-md-3">نام تخصص </label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "name",
                        "name" => "name",
                        "value" => $info->name,
                        "class" => "form-control",
                        "placeholder" => "نام تخصص",
						"data-rule-required" => true,
					    "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
              </div>
			  <div class=" col-md-6">
                <label for="name" class="col-md-3">نامک تخصص</label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "site_link",
                        "name" => "site_link",
                        "value" => $info->site_link,
                        "class" => "form-control",
                        "placeholder" => "نامک تخصص",
						"data-rule-required" => true,
					    "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
              </div>
			</div>
            <div class="form-group">
			  <div class=" col-md-6">
                <label for="name" class="col-md-3">ترتیب</label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "sort",
                        "name" => "sort",
                        "value" => $info->sort,
                        "class" => "form-control",
                        "placeholder" => "ترتیب",
                    ));
                    ?>
                </div>
              </div>
			</div>
		    <div class="form-group">
			 <div class=" col-md-6">
                <label for="gender" class=" col-md-3">وضعیت</label>
                <div class="col-md-9">
                    <?php
                    echo form_radio(array(
                        "name" => "status",
                        "data-msg-required" => lang("field_required"),
                            ), "1", ($info->status === "1") ? true : false);
                    ?>
                    <label for="gender_male" >فعال</label> <br>
					<?php
                      echo form_radio(array(
                        "name" => "status",
                        "data-msg-required" => lang("field_required"),
                            ), "0", ($info->status === "0") ? true : false);
                    ?>
                    <label for="gender_female" class="">غیر فعال</label>
                </div>
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
        $("#general-info-form").appForm({
            isModal: false,
            onSuccess: function (result) {
                appAlert.success(result.message, {duration: 10000});
            }
        });
        $("#general-info-form .select2").select2();
    });
</script>