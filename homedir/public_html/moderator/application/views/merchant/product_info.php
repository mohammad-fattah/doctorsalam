<div id="page-content" class="p20 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h4>محصولات</h4>
			<div class="title-button-group">
                <?php echo modal_anchor(get_uri("product/category_modal_form/".$user_id), "<i class='fa fa-plus-circle'></i> " . "افزودن محصولات", array("class" => "btn btn-default", "title" => "افزودن محصولات")); ?>
            </div>
        </div>
        <div class="table-responsive">
            <table id="category-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#category-table").appTable({
            source: '<?php echo_uri("product/merchant_product_list_data/".$user_id) ?>',
            columns: [
                {title: 'نام محصول'},
				{title: 'فروشنده'},
                {title: 'قیمت (تومان)'},
                {title: 'موجودی'},
                {title: 'تعداد فروش'},
				{title: 'وضعیت'},
				{title: 'فروش ویژه'},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
            printColumns: [0, 1, 2, 3]
        });
    });
</script>