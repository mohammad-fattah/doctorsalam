<?php
echo form_open(get_uri("terminals/save_special_off/".$model_info->id), array("id" => "special-off-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    <input type="hidden" name="special_off" value="special_off" />
    <input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />
    <input type="hidden" name="type" value="<?php echo $type; ?>" />
	
	<div class="form-group">
        <label for="title" class=" col-md-3">درصد تخفیف</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "percent",
                "name" => "percent",
                "class" => "form-control",
                "placeholder" => "درصد تخفیف",
                "autofocus" => true,
                "data-rule-required" => true,
                "data-msg-required" => lang("field_required"),
            ));
            ?>
        </div>
    </div>
    <div class="form-group">
        <label for="description" class=" col-md-3">تاریخ اعمال</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "release_date",
                "name" => "release_date",
                "class" => "form-control",
                "type" => "date",
                "placeholder" => "تاریخ اعمال",
            ));
            ?>
        </div>
    </div>
	
	<div class="form-group">
        <label for="description" class=" col-md-3">تاریخ اتمام</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "end_date",
                "name" => "end_date",
                "type" => "date",
                "class" => "form-control",
                "placeholder" => "تاریخ اتمام",
            ));
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
        $("#special-off-form").appForm({
            onSuccess: function (result) {
                //$("#product-table").appTable({newData: result.data, dataId: result.id});
            }
        });
    });
</script>    



