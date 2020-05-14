<div id="page-content" class="p220 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h1>امور مالی تخصص</h1>
        </div>
        <div class="table-responsive">
            <table id="sell-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        $("#sell-table").appTable({
            source: '<?php echo_uri("order/financial_list_data/".$id); ?>',
            order: [[1, "asc"]],
            columns: [
                {title: "ردیف", "class": "text-center w50"},
                {title: "مبلغ (تومان)", "class": "text-center w100"},
                /*{title: "کارمزد بازاریاب (تومان)", "class": "text-center w50"},
                {title: "مالیات (تومان)", "class": "text-center w50"},*/
                {title: "تاریخ رزرو", "class": "text-center w100"},
                {title: "وضعیت", "class": "text-center w100"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center w50"},
            ],
            printColumns: combineCustomFieldsColumns([0, 1, 2, 3, 4], ''),

        });
    });
</script>    
