<div id="page-content" class="p20 clearfix">
  <div class="panel panel-default">
    <div class="tab-title clearfix">
        <h4>نظرات</h4>
    </div>
    <div class="table-responsive">
        <table id="discount-table" class="display" cellspacing="0" width="100%">
        </table>
    </div>
  </div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
        $("#discount-table").appTable({
            source: '<?php echo_uri("doctor/comment_list/".$user_key) ?>',
            columns: [
                {title: "<?php echo lang('row'); ?>", "class": "text-center option w50"},
                {title: "بیمار", "class": "text-center option w50"},
                //{title: "شهر", "class": "text-center option w50"},
                {title: "نظرات", "class": "text-center option w100"},
                {title: "تاریخ سفارش", "class": "text-center option w100"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w50"}
            ]
        });
    });
</script>