<div id="page-content" class="p20 clearfix">
  <div class="panel panel-default">
    <div class="tab-title clearfix">
        <h4>آدرس</h4>
		<div class="title-button-group">
         <?php echo modal_anchor(get_uri("doctor/address_form/".$user_key), "<i class='fa fa-plus-circle'></i> " . "افزودن آدرس", array("class" => "btn btn-default", "title" => "آدرس")); ?>
        </div>
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
            source: '<?php echo_uri("doctor/address_list/".$user_key) ?>',
            columns: [
                {title: "<?php echo lang('row'); ?>", "class": "text-center option w50"},
                {title: "استان", "class": "text-center option w50"},
                {title: "شهر", "class": "text-center option w50"},
                {title: "منطقه", "class": "text-center option w50"},
                {title: "آدرس", "class": "text-center option w100"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w50"}
            ]
        });
    });
</script>