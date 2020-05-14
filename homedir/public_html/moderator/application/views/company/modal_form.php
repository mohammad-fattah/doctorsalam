<?php echo form_open(get_uri("company/save_category"), array("id" => "category-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    <input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />
    <input type="hidden" name="type" value="<?php echo $type; ?>" />

    <div class="form-group">
        <label for="name" class="col-md-4">نام فارسی شرکت</label>
        <div class="col-md-8">
            <?php
            echo form_input(array(
                "id" => "name",
                "name" => "name",
                "value" => $model_info->name,
                "class" => "form-control",
                "placeholder" => "نام فارسی شرکت",
                "autofocus" => true,
                "data-rule-required" => true,
                "data-msg-required" => lang("field_required")
            ));
            ?>
        </div>
    </div>
    <div class="form-group">
        <label for="en_name" class="col-md-4">نام انگلیسی شرکت</label>
        <div class="col-md-8">
            <?php
            echo form_input(array(
                "id" => "en_name",
                "name" => "en_name",
                "value" => $model_info->en_name,
                "class" => "form-control",
                "placeholder" => "نام انگلیسی شرکت"
            ));
            ?>
        </div>
    </div>
	<div class="form-group">
        <label for="description" class="col-md-4">امتیاز</label>
        <div class="col-md-8">
            <?php
            echo form_input(array(
                "id" => "emtiaz",
                "name" => "emtiaz",
                "value" => $model_info->emtiaz,
                "class" => "form-control",
                "placeholder" => "امتیاز",
            ));
            ?>
        </div>
    </div>
	<div class="form-group">
        <label for="description" class="col-md-4">توانگری</label>
        <div class="col-md-8">
            <?php
            echo form_input(array(
                "id" => "tavangari",
                "name" => "tavangari",
                "value" => $model_info->tavangari,
                "class" => "form-control",
                "placeholder" => "توانگری",
            ));
            ?>
        </div>
    </div>
	<div class="form-group">
        <label for="description" class="col-md-4">مدت زمان پاسخ به شکایت</label>
        <div class="col-md-8">
            <?php
            echo form_input(array(
                "id" => "pasokh",
                "name" => "pasokh",
                "value" => $model_info->pasokh,
                "class" => "form-control",
                "placeholder" => "مدت زمان پاسخ به شکایت",
            ));
            ?>
        </div>
    </div>
	<div class="form-group">
        <label for="description" class="col-md-4">تعداد پرداخت خسارت</label>
        <div class="col-md-8">
            <?php
            echo form_input(array(
                "id" => "khesarat",
                "name" => "khesarat",
                "value" => $model_info->khesarat,
                "class" => "form-control",
                "placeholder" => "تعداد پرداخت خسارت",
            ));
            ?>
        </div>
    </div>
	<div class="form-group">
        <label for="description" class="col-md-4">رضایت مشتری</label>
        <div class="col-md-8">
            <?php
            echo form_input(array(
                "id" => "rezayat",
                "name" => "rezayat",
                "value" => $model_info->rezayat,
                "class" => "form-control",
                "placeholder" => "رضایت مشتری",
            ));
            ?>
        </div>
    </div>
	<div class="form-group">
        <label for="description" class="col-md-4">سهم بازار</label>
        <div class="col-md-8">
            <?php
            echo form_input(array(
                "id" => "market",
                "name" => "market",
                "value" => $model_info->market,
                "class" => "form-control",
                "placeholder" => "سهم بازار",
            ));
            ?>
        </div>
    </div>
	<div class="form-group">
        <label for="description" class="col-md-4">پرداخت خسارت سیار</label>
        <div class="col-md-8">
            <?php
            echo form_input(array(
                "id" => "sayar",
                "name" => "sayar",
                "value" => $model_info->sayar,
                "class" => "form-control",
                "placeholder" => "پرداخت خسارت سیار",
            ));
            ?>
        </div>
    </div>
    <div class="form-group">
        <label for="sort" class="col-md-4"><?php echo lang('sort'); ?></label>
        <div class="col-md-8">
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
                <label for="status" class=" col-md-3">وضعیت</label>
                <div class=" col-md-9">
                    <?php
                    echo form_radio(array(
                        "id" => "active",
                        "name" => "status",
                            ), "active", true);
                    ?>
                    <label for="gender_male">فعال</label> 
					<br>
					<?php
                    echo form_radio(array(
                        "id" => "deactive",
                        "name" => "status",
                            ), "deactive", false);
                    ?>
                    <label for="gender_female" class="">غیرفعال</label>
                </div>
            </div>

</div>

<div class="modal-footer">
    <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span> <?php echo lang('save'); ?></button>
	<button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> <?php echo lang('close'); ?></button>
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