<div id="page-content" class="p220 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h1>فروش های نقدی</h1>
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
            source: '<?php echo_uri("report/sell_cash_list/"); ?>',
            order: [[1, "dec"]],
            columns: [
                {title: "زمان ثبت", "class": "text-center w50"},
				{title: "نام کاربر", "class": "text-center w50"},
                {title: "شماره تماس کاربر", "class": "text-center w50"},
                {title: "ترمینال خرید", "class": "text-center w50"},
                {title: "هزینه", "class": "text-center w50"},
                {title: "کالا فروخته شده", "class": "text-center w100"},
                {title: "نوع فروش", "class": "text-center w100"},
            ],
        });
    });
</script>    
