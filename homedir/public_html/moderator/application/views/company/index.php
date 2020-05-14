<div id="page-content" class="p20 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h4><?php echo lang("insurance_company"); ?></h4>
			<div class="title-button-group">
                <?php
                 echo modal_anchor(get_uri("company/category_modal_form/"), "<i class='fa fa-plus-circle'></i> ".lang("add_insurance_company"), array("class" => "btn btn-default", "title" => lang("add_insurance_company")));
                ?>
            </div>
        </div>
        <div class="table-responsive">
            <table id="company-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#company-table").appTable({
            source: '<?php echo_uri("company/company_list_data/") ?>',
            columns: [
                {title: '<?php echo lang("row"); ?>', "class": "text-center option w50"},
                {title: '<?php echo lang("logo"); ?>', "class": "text-center option w50"},
                {title: '<?php echo lang("company_name"); ?>', "class": "text-center option w100"},
                {title: '<?php echo lang("company_en_name"); ?>', "class": "text-center option w100"},
                {title: '<?php echo lang("status"); ?>', "class": "text-center option w50"},
                {title: '<?php echo lang("sort"); ?>', "class": "text-center option w50"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w50"}
            ]
        });
    });
</script>