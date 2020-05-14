<div id="page-content" class="p20 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h4>کدهای تخفیف</h4>
			<div class="title-button-group">
                <?php echo modal_anchor(get_uri("off/modal_form/" . $type), "<i class='fa fa-plus-circle'></i> " . "افزودن کد تخفیف", array("class" => "btn btn-default", "title" => "افزودن کد تخفیف")); ?>
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
            source: '<?php echo_uri("off/list_data/" . $type) ?>',
            columns: [
                {title: 'ردیف', "class": "text-center w50"},
                {title: 'نام کد', "class": "text-center w100"},
                {title: 'تاریخ شروع', "class": "text-center w50"},
                {title: 'تاریخ پایان', "class": "text-center w50"},
                {title: 'رشته بیمه', "class": "text-center w50"},
                {title: 'تعداد تولید شده', "class": "text-center w50"},
                {title: 'وضعیت', "class": "text-center w50"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w50"}
            ],
            printColumns: [0, 1, 2, 3]
        });
    });
</script>