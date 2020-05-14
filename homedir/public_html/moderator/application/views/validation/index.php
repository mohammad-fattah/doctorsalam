<div id="page-content" class="p20 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h4>اعتبارسنجی</h4>
			<div class="title-button-group">
                <?php echo modal_anchor(get_uri("validation/category_modal_form/" . $type), "<i class='fa fa-plus-circle'></i> " . "افزودن اعتبارسنجی", array("class" => "btn btn-default", "title" => "افزودن اعتبارسنجی")); ?>
            </div>
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
            source: '<?php echo_uri("validation/list_validation/") ?>',
            columns: [
                {title: 'نام کاربری', "class": "text-center w50"},
                {title: 'API Key', "class": "text-center w100"},
                {title: 'تاریخ تخصیص', "class": "text-center w50"},
                {title: 'وضعیت', "class": "text-center w50"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w50"}
            ],
            printColumns: [0, 1, 2, 3]
        });
    });
</script>