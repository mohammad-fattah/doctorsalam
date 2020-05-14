<div id="page-content" class="p20 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h4>ترمینال ها</h4>
			<div class="title-button-group">
                <?php echo modal_anchor(get_uri("terminals/category_modal_form/0/".$type), "<i class='fa fa-plus-circle'></i> " . "افزودن ترمینال ها", array("class" => "btn btn-default", "title" => "افزودن ترمینال ها")); ?>
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
            source: '<?php echo_uri("terminals/categories_list_data/" . $type) ?>',
            columns: [
                {title: 'عنوان ترمینال'},
                {title: 'آی دی ترمینال'},
                {title: 'psp'},
                {title: 'وضعیت'},
				{title : 'فروش ویژه'},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
            printColumns: [0, 1, 2, 3]
        });
    });
</script>