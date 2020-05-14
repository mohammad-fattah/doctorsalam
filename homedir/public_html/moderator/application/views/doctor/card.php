<div id="page-content" class="p20 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h4>شماره حساب / شمارت کارت</h4>
			<div class="title-button-group">
                <?php echo modal_anchor(get_uri("doctor/card_modal_form/" . $user_key), "<i class='fa fa-plus-circle'></i> " . "افزودن حساب / کارت", array("class" => "btn btn-default", "title" => "افزودن حساب / کارت")); ?>
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
            source: '<?php echo_uri("doctor/card_list_data/$user_key") ?>',
            columns: [
                {title: 'نام بانک', "class": "text-center option w100"},
                {title: 'افزودن حساب / کارت', "class": "text-center option w100"},
                {title: 'وضعیت حساب / کارت', "class": "text-center option w50"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ]
        });
    });
</script>