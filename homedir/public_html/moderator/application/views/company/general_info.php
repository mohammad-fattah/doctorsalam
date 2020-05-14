<div class="tab-content">
    <?php echo form_open(get_uri("insurance/save_general_info/".$id), array("id" => "general-info-form", "class" => "general-form dashed-row white", "role" => "form")); ?>
    <div class="panel">
        <div class="panel-body">
            <div class="form-group">
			  <div class=" col-md-6">
                <label for="name" class="col-md-3">نام فارسی شرکت</label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "name",
                        "name" => "name",
                        "value" => $info->name,
                        "class" => "form-control",
                        "placeholder" => "نام فارسی شرکت",
                    ));
                    ?>
                </div>
              </div>
			  <div class=" col-md-6">
                <label for="name" class="col-md-3">نام انگلیسی شرکت</label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "en_name",
                        "name" => "en_name",
                        "value" => $info->en_name,
                        "class" => "form-control",
                        "placeholder" => "نام انگلیسی شرکت",
                    ));
                    ?>
                </div>
              </div>
			</div>
            
			<div class="form-group">
			  <div class=" col-md-6">
                <label for="name" class="col-md-3">امتیاز</label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "emtiaz",
                        "name" => "emtiaz",
                        "value" => $info->emtiaz,
                        "class" => "form-control",
                        "placeholder" => "امتیاز",
                    ));
                    ?>
                </div>
              </div>
			  <div class=" col-md-6">
                <label for="name" class="col-md-3">توانگری</label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "tavangari",
                        "name" => "tavangari",
                        "value" => $tavangari,
                        "class" => "form-control",
                        "placeholder" => "توانگری",
                    ));
                    ?>
                </div>
              </div>
			</div>
			<div class="form-group">
			  <div class=" col-md-6">
                <label for="name" class="col-md-3">امتیاز</label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "emtiaz",
                        "name" => "emtiaz",
                        "value" => $info->emtiaz,
                        "class" => "form-control",
                        "placeholder" => "امتیاز",
                    ));
                    ?>
                </div>
              </div>
			  <div class=" col-md-6">
                <label for="name" class="col-md-3">توانگری</label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "tavangari",
                        "name" => "tavangari",
                        "value" => $tavangari,
                        "class" => "form-control",
                        "placeholder" => "توانگری",
                    ));
                    ?>
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
        setDatePicker("#dob");

    });
</script>