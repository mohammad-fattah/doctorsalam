<div id="page-content" class="p220 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h1>انتقال ها</h1>
        </div>
        <div class="table-responsive">
            <table id="transfer-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        $("#transfer-table").appTable({
            source: '<?php echo_uri("report/transfer_list/"); ?>',
            order: [[1, "dec"]],
            columns: [
                {title: "زمان ثبت", "class": "text-center w50"},
				{title: "نام کاربر", "class": "text-center w50"},
                {title: "شماره تماس کاربر", "class": "text-center w50"},
                {title: "اعتبار انتقالی", "class": "text-center w50"},
				{title: "نوع تراکنش", "class": "text-center w50"},
				{title: "کاربر مرتبط", "class": "text-center w50"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
        });
    });
</script>    
