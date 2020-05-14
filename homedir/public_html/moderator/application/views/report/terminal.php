<div id="page-content" class="p220 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h1>ترمینال ها</h1>
        </div>
        <div class="table-responsive">
            <table id="terminal-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        $("#terminal-table").appTable({
            source: '<?php echo_uri("terminals/categories_list_data/"); ?>',
            order: [[1, "dec"]],
            columns: [
                {title: "عنوان ترمینال", "class": "text-center w50"},
				{title: "آی دی ترمینال", "class": "text-center w50"},
                {title: "psp", "class": "text-center w50"},
                {title: "وضعیت", "class": "text-center w50"},
                {title: "فروش ویژه", "class": "text-center w50"},
            ],
        });
    });
</script>    
