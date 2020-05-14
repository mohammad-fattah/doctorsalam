<div id="page-content" class="p20 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h4>چک ها</h4>
        </div>
        <div class="table-responsive">
            <table id="checks-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#checks-table").appTable({
            source: '<?php echo_uri("validation/list_checks/".$id) ?>',
            columns: [
                {title: 'تاریخ چک'},
                {title: 'مبلغ'},
                {title: 'تصویر چک'},
				{title: 'وضعیت پرداخت'},
				{title: 'وضعیت تایید'},
            ],
            printColumns: [0, 1, 2, 3]
        });
    });
</script>