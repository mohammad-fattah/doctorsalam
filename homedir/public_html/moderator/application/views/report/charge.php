<div id="page-content" class="p220 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h1>شارژ ها</h1>
        </div>
        <div class="table-responsive">
            <table id="charge-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        $("#charge-table").appTable({
            source: '<?php echo_uri("report/charge_list/"); ?>',
            order: [[1, "dec"]],
            columns: [
                {title: "زمان ثبت", "class": "text-center w50"},
				{title: "نام کاربر", "class": "text-center w50"},
                {title: "شماره تماس کاربر", "class": "text-center w50"},
                {title: "میزان شارژ", "class": "text-center w50"},
				{title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
        });
    });
</script>    
