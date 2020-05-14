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
            source: '<?php echo_uri("brokers/all_transaction_client/".$user_id) ?>',
            columns: [
                {title: "<?php echo lang('row'); ?>", "class": "text-center option w50"},
                {title: "<?php echo lang('type'); ?>", "class": "text-center option w50"},
                {title: "<?php echo lang('date_sell'); ?>", "class": "text-center option w100"},
                {title: "<?php echo lang('price'); ?>", "class": "text-center option w50"},
                {title: "<?php echo lang('broker'); ?>", "class": "text-center option w50"},
                {title: "<?php echo lang('cash/credit'); ?>", "class": "text-center option w50"},
                {title: "<?php echo lang('status'); ?>", "class": "text-center option w50"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w50"}
            ]
        });
    });
</script>