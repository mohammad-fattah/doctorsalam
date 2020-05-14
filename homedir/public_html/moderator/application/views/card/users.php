<div id="page-content" class="p20 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h4>کارتهای بانکی</h4>
			<div class="title-button-group">
                <?php echo modal_anchor(get_uri("card/add_card/" . $user_key), "<i class='fa fa-plus-circle'></i> " . "افزودن کارت", array("class" => "btn btn-default", "title" => "کارتهای بانکی")); ?>
            </div>
        </div>
        <div class="table-responsive">
            <table id="card-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#card-table").appTable({
            source: '<?php echo_uri("card/list_data/$user_key") ?>',
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