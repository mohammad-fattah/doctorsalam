<div id="page-content" class="p20 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h4><?php echo lang("insurance"); ?></h4>
			<div class="title-button-group">
                <?php
                 echo modal_anchor(get_uri("specialty/modal_form/"), "<i class='fa fa-plus-circle'></i> ".lang("add_insurance"), array("class" => "btn btn-default", "title" => lang("add_insurance")));
                ?>
            </div>
        </div>
        <div class="table-responsive">
            <table id="bime-name-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#bime-name-table").appTable({
            source: '<?php echo_uri("specialty/policy_list_data/") ?>',
            columns: [
                {title: '<?php echo lang("row"); ?>', "class": "text-center option w50"},
                {title: '<?php echo lang("logo"); ?>', "class": "text-center option w50"},
                {title: '<?php echo lang("name"); ?>', "class": "text-center option w100"},
				{title: '<?php echo lang("status"); ?>', "class": "text-center option w50"},
				{title: 'وضعیت نمایش', "class": "text-center option w50"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w50"}
            ],
        });	
    });
</script>