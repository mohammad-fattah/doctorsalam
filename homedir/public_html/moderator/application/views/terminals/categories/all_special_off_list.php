<div id="page-content" class="p20 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h4>فروش ویژه ترمینال ها</h4>
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
            source: '<?php echo_uri("terminals/special_off_list_data/" . $id) ?>',
            columns: [
                {title: 'عنوان ترمینال'},
                {title: 'آی دی ترمینال'},
                {title: 'psp'},
                {title: 'وضعیت'},
                {title: 'تاریخ اعمال'},
                {title: 'تاریخ اتمام'},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
            printColumns: [0, 1, 2, 3]
        });
    });
</script>