<div id="page-content" class="p20 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h4>فروشگاه آنلاین و خدمات</h4>
			<div class="title-button-group">
                <?php echo modal_anchor(get_uri("product/category_modal_form/".$user_id), "<i class='fa fa-plus-circle'></i> " . "افزودن فروشگاه آنلاین و خدمات", array("class" => "btn btn-default", "title" => "افزودن فروشگاه آنلاین و خدمات")); ?>
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
            source: '<?php echo_uri("product/categories_list_data/".$user_id) ?>',
            columns: [
                {title: 'نام محصول',"class": "w50"},
				{title: 'فروشنده'},
                {title: 'هزینه'},
                {title: 'موجودی'},
                {title: 'تعداد فروش'},
				{title: 'وضعیت'},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
            printColumns: [0, 1, 2, 3]
        });
    });
</script>