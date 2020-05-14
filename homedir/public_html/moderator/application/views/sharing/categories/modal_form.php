<?php echo form_open(get_uri("sharing/save_category"), array("id" => "category-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    <input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />
    <input type="hidden" name="type" value="<?php echo $type; ?>" />

    <div class="form-group">
        <label for="title" class=" col-md-3">نام سطح</label>
        <div class=" col-md-9">
			<select id="level" name="level">
			 <?php 
			  foreach ($model_info as $team_member) {
               echo '<option value="'.$team_member->id.'">'.$team_member->title.'</option>';
              }
			 ?>
			</select>
        </div>
    </div>
	<div class="form-group">
        <label for="title" class=" col-md-3">نقش</label>
        <div class=" col-md-9">
            <select id="customer" name="customer">
			 <!--<option value="client">مشتری</option>-->
			 <option value="agent">نماینده</option>
			 <option value="broker">بازاریاب</option>
			 <option value="club">باشگاه</option>
			 <option value="psp">پی اس پی</option>
			 <option value="sav">شرکت بیمیتک</option>
			</select>
        </div>
    </div>
	<div class="form-group">
        <label for="description" class=" col-md-3">درصد</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "percent",
                "name" => "percent",
                "value" => $model_info->percent,
                "class" => "form-control",
                "placeholder" => "درصد",
            ));
            ?>
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
                $("#category-table").appTable({newData: result.data, dataId: result.id});
            }
        });
    });
</script>    