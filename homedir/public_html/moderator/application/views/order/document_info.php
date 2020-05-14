<div id="page-content" class="p220 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h1>مدارک تخصص</h1>
        </div>
        <div class="table-responsive">
            <table id="document-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        $("#document-table").appTable({
            source: '<?php echo_uri("order/document_list_data/".$id); ?>',
            order: [[1, "asc"]],
            columns: [
                {title: "ردیف", "class": "text-center w50"},
                {title: "نام فایل", "class": "text-center w100"},
                {title: "زمان آپلود", "class": "text-center w50"},
                {title: "دانلود فایل", "class": "text-center w100"}
            ],
        });
    });
</script>    
