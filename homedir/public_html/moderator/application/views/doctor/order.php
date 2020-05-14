<div id="page-content" class="p20 clearfix">
  <div class="panel panel-default">
    <div class="tab-title clearfix">
        <h4><?php echo lang('orders'); ?></h4>
    </div>
    <div class="table-responsive">
        <table id="orders-table" class="display" cellspacing="0" width="100%">
        </table>
    </div>
   </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#orders-table").appTable({
            source: '<?php echo_uri("doctor/all_transaction_client/".$user_id) ?>',
            columns: [
                {title: 'ردیف', "class": "text-center option w50"},
                {title: 'نوبت', "class": "text-center option w50"},
                {title: 'قیمت', "class": "text-center option w50"},
                {title: 'نام بیمار', "class": "text-center option w50"},
                {title: 'نام پزشک', "class": "text-center option w50"},
                {title: 'نحوه پرداخت', "class": "text-center option w50"},
                {title: 'وضعیت', "class": "text-center option w50"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w50"}
            ],
        });
    });
</script>