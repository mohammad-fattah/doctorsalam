<?php
echo form_open(get_uri("api/AddMemberCard"), array("id" => "special-off-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
	
    <div class="form-group">
        <label for="description" class=" col-md-3">شماره کارت</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "Pans",
                "name" => "Pans",
				"value" => $card,
                "class" => "form-control",
                "placeholder" => "شماره کارت",
            ));
            ?>
        </div>
    </div>
	
	<div class="form-group">
        <label for="description" class=" col-md-3">کد ملی</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "NationalCode",
                "name" => "NationalCode",
				"value" => $model_info->melli_code,
                "class" => "form-control",
                "placeholder" => "کد ملی",
            ));
            ?>
        </div>
    </div>
	
</div>

<div class="modal-footer">
    <button type="submit" class="btn btn-primary">ارسال</button>
	<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close'); ?></button>
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



