<div id="page-content" class="p220 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h1>مدارک تخصص</h1>
            <div class="title-button-group">
                <?php
                  echo modal_anchor(get_uri("insurance_document/modal_form/$type"), "<i class='fa fa-plus-circle'></i> افزودن مدارک", array("class" => "btn btn-default", "title" => "افزودن مدارک"));
                ?>
            </div>
        </div>
        <div class="table-responsive">
            <table id="document-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        $("#document-table").appTable({
            source: '<?php echo_uri("insurance_document/list_data/$type") ?>',
            order: [[1, "asc"]],
            columns: [
                {title: "ردیف", "class": "text-center w50"},
                {title: "نوع", "class": "text-center w50"},
                {title: "نام", "class": "text-center w100"},
                {title: "اولویت", "class": "text-center w50"},
                {title: "سایز", "class": "text-center w50"},
                {title: "الزامی / غیرالزامی", "class": "text-center w50"},
				{title: '<i class="fa fa-bars"></i>', "class": "text-center option w50"}
            ],
        });
    });
</script>    
