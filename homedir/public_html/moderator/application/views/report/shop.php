<div id="page-content" class="p220 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h1>فروشگاه آنلاین</h1>
        </div>
        <div class="table-responsive">
            <table id="shop-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        $("#shop-table").appTable({
            source: '<?php echo_uri("product/merchant_product_list_data/"); ?>',
            order: [[1, "dec"]],
            columns: [
                {title: 'نام محصول'},
				{title: 'فروشنده'},
                {title: 'هزینه'},
                {title: 'موجودی'},
                {title: 'تعداد فروش'},
				{title: 'وضعیت'},
				{title: 'فروش ویژه'},
            ],
        });
    });
</script>    
