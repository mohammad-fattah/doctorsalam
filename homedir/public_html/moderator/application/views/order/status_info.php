<div id="page-content" class="p220 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h1>وضعیت تخصص</h1>
        </div>
        <div class="table-responsive">
            <table id="status-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#status-table").appTable({
            source: '<?php echo_uri("order/status_list_data/".$id); ?>',
            columns: [
                {title: "ردیف", "class": "text-center w50"},
                {title: "نام مجری", "class": "text-center w100"},
                {title: "زمان شروع", "class": "text-center w50"},
                {title: "زمان پایان", "class": "text-center w50"},
                {title: "توضیحات", "class": "text-center w100"},
                {title: "وضعیت", "class": "text-center w100"},
            ],
        });
    });
</script>    
