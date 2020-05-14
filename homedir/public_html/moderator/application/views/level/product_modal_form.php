<?php echo form_open(get_uri("product/save_category"), array("id" => "category-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    <input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />
    <input type="hidden" name="type" value="<?php echo $type; ?>" />
	
    <div class="form-group">
        <label for="title" class=" col-md-3">نام محصول</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "name",
                "name" => "name",
                "value" => $model_info->name,
                "class" => "form-control",
                "placeholder" => "نام محصول",
                "autofocus" => true,
                "data-rule-required" => true,
                "data-msg-required" => lang("field_required"),
            ));
            ?>
        </div>
    </div>
    <div class="form-group">
        <label for="description" class=" col-md-3">قیمت</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "price",
                "name" => "price",
                "value" => $model_info->price,
                "class" => "form-control",
                "placeholder" => "قیمت",
            ));
            ?>
        </div>
    </div>
	<div class="form-group">
        <label for="description" class=" col-md-3">تخفیف</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "discount",
                "name" => "discount",
                "value" => $model_info->discount,
                "class" => "form-control",
                "placeholder" => "درصد تخفیف",
            ));
			
			echo form_input(array(
                "id" => "release_date",
                "name" => "release_date",
                "value" => $model_info->release_date,
                "class" => "form-control",
                "placeholder" => "تاریخ اعمال",
            ));
			
			echo form_input(array(
                "id" => "end_date",
                "name" => "end_date",
                "value" => $model_info->end_date,
                "class" => "form-control",
                "placeholder" => "تاریخ اتمام",
            ));
            ?>
			<!--<button class="btn btn-primary" id="discounts_table"><i class="glyphicon glyphicon-plus"></i>تخفیفات برنامه ریزی شده</button>-->
        </div>
    </div>
	<div class="form-group">
        <label for="description" class=" col-md-3">موجودی</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "stock",
                "name" => "stock",
                "value" => $model_info->stock,
                "class" => "form-control",
                "placeholder" => "موجودی",
            ));
            ?>
        </div>
    </div>
	<div class="form-group">
        <label for="description" class=" col-md-3">برند</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "brand",
                "name" => "brand",
                "value" => $model_info->brand,
                "class" => "form-control",
                "placeholder" => "برند محصول",
            ));
            ?>
        </div>
    </div>
	<div class="form-group">
        <label for="description" class=" col-md-3">امتیاز به خریدار</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "privilege",
                "name" => "privilege",
                "value" => $model_info->privilege,
                "class" => "form-control",
                "placeholder" => "امتیاز داده شده به خریدار",
            ));
            ?>
        </div>
    </div>
	<div class="form-group">
        <label for="description" class=" col-md-3">توضیحات کوتاه</label>
        <div class=" col-md-9">
            <?php
            echo form_textarea(array(
                "id" => "summerized",
                "name" => "summerized",
                "value" => $model_info->summerized,
                "class" => "form-control",
                "placeholder" => "توضیحات اصلی و کوتاه محصول",
            ));
            ?>
        </div>
    </div>
	<div class="form-group">
        <label for="description" class=" col-md-3">توضیحات کامل</label>
        <div class=" col-md-9">
            <?php
            echo form_textarea(array(
                "id" => "complete",
                "name" => "complete",
                "value" => $model_info->complete,
                "class" => "form-control",
                "placeholder" => "توضیحات مفصل محصول",
            ));
            ?>
        </div>
    </div>
	
	<!--<div class="form-group">
        <label for="description" class=" col-md-3">مشخصات محصول</label>
        <div class=" col-md-9">
				<?php echo modal_anchor(get_uri("product/category_modal_form_specs/" . $type), "<i class='fa fa-plus-circle'></i> " . "افزودن مشخصات", array("class" => "btn btn-default", "title" => "مشخصات")); ?>
		</div>
    </div>
	
	<div class="form-group">
        <label for="description" class=" col-md-3">تگ</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "tag",
                "name" => "tag",
                "value" => $model_info->tag,
                "class" => "form-control",
                "placeholder" => "تگ محصول",
            ));
            ?>
			<button class="btn btn-primary" id="add_tag" ><i class="glyphicon glyphicon-plus"></i></button>
        </div>
    </div>	
	<div class="form-group">
        <label for="description" class=" col-md-3">تصویر</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "pic_path",
                "name" => "pic_path",
                "value" => $model_info->puc_path,
                "class" => "form-control",
                "placeholder" => "تگ محصول",
            ));
            ?>
        </div>
		
		<?php echo modal_anchor(get_uri("product/category_modal_form_pics/" . $type), "<i class='fa fa-plus-circle'></i> " . "افزودن تصاویر", array("class" => "btn btn-default", "title" => "افزودن تصاویر")); ?>
		
    </div>	-->
	
	
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