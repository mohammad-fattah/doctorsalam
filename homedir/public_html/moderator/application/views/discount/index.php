<div id="page-content" class="p20 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h4>تخفیف ها</h4>
			<div class="title-button-group">
                <?php echo modal_anchor(get_uri("discount/category_modal_form/" . $user_key), "<i class='fa fa-plus-circle'></i> " . "افزودن تخفیف", array("class" => "btn btn-default", "title" => "تخفیف ها")); ?>
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
            source: '<?php echo_uri("order/all_transaction_client/".$user_id) ?>',
            columns: [
                {title: 'نوع تخصص'},
                {title: 'مدت'},
                {title: 'مبلغ تخفیف'},
                {title: 'نام کاربر'},
                {title: 'نقد/اقساط'},
                {title: 'وضعیت'},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
            printColumns: [0, 1, 2, 3,4]
        });
    });
</script>