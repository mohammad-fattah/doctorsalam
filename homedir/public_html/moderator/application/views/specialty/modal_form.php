<?php echo form_open(get_uri("specialty/save"), array("id" => "category-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    <input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />
    <input type="hidden" name="type" value="<?php echo $type; ?>" />

    <div class="form-group">
        <label for="name" class=" col-md-3">نام تخصص</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "name",
                "name" => "name",
                "value" => $model_info->name,
                "class" => "form-control",
                "placeholder" => "نام تخصص",
                "autofocus" => true,
                "data-rule-required" => true,
                "data-msg-required" => lang("field_required"),
            ));
            ?>
        </div>
    </div>
    <div class="form-group">
        <label for="site_title" class="col-md-3">نامک تخصص</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "site_link",
                "name" => "site_link",
                "value" => $model_info->en_name,
                "class" => "form-control",
                "placeholder" => "نامک تخصص",
            ));
            ?>
        </div>
    </div>
	<div class="form-group">
        <label for="sort" class=" col-md-3"><?php echo lang('sort'); ?></label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "sort",
                "name" => "sort",
                "value" => $model_info->sort,
                "class" => "form-control",
                "placeholder" => lang('sort'),
                "type" => "number",
                "min" => "0"
            ));
            ?>
        </div>
    </div>
	<div class="form-group">
        <label for="sort" class=" col-md-3">وضعیت نمایش</label>
        <div class=" col-md-9">
          <select name="mainsub" class="select2" id="mainsub">
           <option value="main">اصلی</option>
           <option value="sub">فرعی</option>
          </select>
        </div>
    </div>
    <div class="form-group">
        <label for="status" class=" col-md-3"><?php echo lang('status'); ?></label>
        <div class=" col-md-9">
            <?php
            echo form_radio(array(
                "id" => "status_active",
                "name" => "status",
                "data-msg-required" => lang("field_required"),
                    ), "1", ($model_info->status === "1") ? true : ($model_info->status !== "0") ? true : false);
            ?>
            <label for="status_active" class=""><?php echo lang('active'); ?></label>
			<br>
            <?php
            echo form_radio(array(
                "id" => "status_inactive",
                "name" => "status",
                "data-msg-required" => lang("field_required"),
                    ), "0", ($model_info->status === "0") ? true : false);
            ?>
            <label for="status_inactive" class=""><?php echo lang('inactive'); ?></label>
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
		     location.reload();
             //$("#category-table").appTable({newData: result.data, dataId: result.id});
            }
        });
    });
</script>    