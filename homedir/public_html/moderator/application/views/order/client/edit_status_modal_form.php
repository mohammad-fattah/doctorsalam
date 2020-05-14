<?php echo form_open(get_uri("order/change_status"), array("id" => "category-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    <input type="hidden" name="id" value="<?php echo $id; ?>" />

    <div class="form-group">
        <label for="title" class=" col-md-3">وضعیت رزرو</label>
        <div class="col-md-9">
            <?php
				 echo form_dropdown("status", $statuses ,$current_status, "class='select2' id='statuses' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
            ?>
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