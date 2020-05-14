<div id="page-content" class="p20 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h4>کارتهای بانکی</h4>
			<div class="title-button-group">
                <?php echo modal_anchor(get_uri("user_cards/category_modal_form/" . $user_key), "<i class='fa fa-plus-circle'></i> " . "افزودن کارت", array("class" => "btn btn-default", "title" => "کارتهای بانکی")); ?>
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
            source: '<?php echo_uri("user_cards/categories_list_data/" . $user_key) ?>',
            columns: [
                {title: 'نام بانک', "class": "text-center option w100"},
                {title: 'شماره کارت', "class": "text-center option w100"},
                {title: 'وضعیت کارت', "class": "text-center option w50"},
                {title: 'اتصال به پی اس پی', "class": "text-center option w50"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
            printColumns: [0, 1, 2, 3]
        });
    });
</script>