<div id="page-content" class="p20 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h4><?php echo $name; ?></h4>
			<div class="title-button-group">
              <?php echo modal_anchor(get_uri("parameters/modal_form_area/$type"), "<i class='fa fa-plus-circle'></i> " . "افزودن منطقه", array("class" => "btn btn-default", "title" => "افزودن منطقه")); ?>
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
            source: '<?php echo_uri("parameters/get_area/$type") ?>',
            columns: [
                {title: "ردیف"},
                {title: "منطقه"},
                {title: "رشته بیمه"},
                {title: "شرکت بیمه"},
                {title: "وضعیت"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
            printColumns: [0, 1]
        });
    });
</script>