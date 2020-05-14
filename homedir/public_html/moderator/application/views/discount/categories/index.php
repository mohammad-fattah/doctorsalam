<div id="page-content" class="p20 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h4>شرکت های بیمه</h4>
            <div class="title-button-group">
                <?php echo modal_anchor(get_uri("company/category_modal_form/" . $type), "<i class='fa fa-plus-circle'></i> " . "افزودن شرکت", array("class" => "btn btn-default", "title" => "افزودن شرکت")); ?>
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
            source: '<?php echo_uri("company/categories_list_data/" . $type) ?>',
            columns: [
                {title: '<?php //echo lang("title"); ?>نام فارسی'},
                {title: '<?php //echo lang("description"); ?>نام انگلیسی'},
                {title: '<?php echo lang("status"); ?>'},
                {title: '<?php echo lang("sort"); ?>'},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
            printColumns: [0, 1, 2, 3]
        });
    });
</script>