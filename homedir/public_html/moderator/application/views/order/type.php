<div id="page-content" class="p20 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h4><?php echo $name; ?></h4>
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
            source: '<?php echo_uri("order/all_transaction/".$type) ?>',
			filterDropdown: [{name: "status", class: "w200", options: <?php echo $order_status_dropdown; ?>}],
            columns: [
                {title: 'ردیف', "class": "text-center option w50"},
                {title: 'نوع', "class": "text-center option w50"},
                {title: 'تاریخ خرید', "class": "text-center option w100"},
                {title: 'قیمت', "class": "text-center option w50"},
                {title: 'نام کاربر', "class": "text-center option w50"},
                {title: 'بازاریاب', "class": "text-center option w50"},
                {title: 'نقد/اقساط', "class": "text-center option w50"},
                {title: 'وضعیت', "class": "text-center option w50"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w50"}
            ],
        });
    });
</script>