<div id="page-content" class="p20 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h4>گردش حساب</h4>
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
            source: '<?php echo_uri("wallet/all_transaction/".$this->login_user->user_key) ?>',
            columns: [
                {title: 'شناسه'},
                {title: 'مورد استفاده'},
                {title: 'تاریخ'},
                {title: 'مبلغ'},
                {title: 'باقیمانده'},
                {title: 'نوع'},
                {title: 'وضعیت'},
                {title: 'کیف پول'}
            ],
            printColumns: [0, 1, 2, 3]
        });
    });
</script>