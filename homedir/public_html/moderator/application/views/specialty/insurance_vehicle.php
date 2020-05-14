<div id="page-content" class="p20 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h4><?php echo $name; ?></h4>
			<div class="title-button-group">
              <?php echo modal_anchor(get_uri("vehicle/modal_form"), "<i class='fa fa-plus-circle'></i> " . "افزودن نوع وسیله", array("class" => "btn btn-default", "title" => "افزودن نوع وسیله")); ?>
            </div>
        </div>
        <div class="table-responsive">
            <table id="parameters-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#parameters-table").appTable({
            source: '<?php echo_uri("parameters/get_vehicle_type/$type") ?>',
            columns: [
                {title: "ردیف"},
                {title: "تصویر"},
                {title: "نام وسایل نقلیه"},
                {title: "نوع وسیله نقلیه"},
                {title: "وضعیت"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center  w100"}
            ],
            printColumns: [0, 1]
        });
    });
</script>