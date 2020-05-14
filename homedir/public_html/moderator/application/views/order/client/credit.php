<div id="page-content" class="p20 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h4>خریدهای اقساطی</h4>
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
            source: '<?php echo_uri("order/client_cash/".$this->login_user->user_key) ?>',
            columns: [
                {title: 'محصول / خدمات'},
                {title: 'تاریخ خرید'},
                {title: 'قیمت'},
                {title: 'پذیرنده'},
                {title: 'وضعیت'},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
            printColumns: [0, 1, 2, 3]
        });
    });
</script>