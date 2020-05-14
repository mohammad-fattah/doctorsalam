<div id="page-content" class="p220 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h1>مقدارها</h1>
            <div class="title-button-group">
                <?php
                  echo modal_anchor(get_uri("insurance_parameter_val/modal_form/$type/$id"), "<i class='fa fa-plus-circle'></i> افزودن مقدار", array("class" => "btn btn-default", "title" => "افزودن مقدار"));
                ?>
            </div>
        </div>
        <div class="table-responsive">
            <table id="parameter-val-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        $("#parameter-val-table").appTable({
            source: '<?php echo_uri("insurance_parameter_val/list_data/$id") ?>',
            order: [[1, "asc"]],
            columns: [
                {title: "ردیف", "class": "text-center w50"},
				{title: "نام", "class": "text-center w100"},
                {title: "وابسته", "class": "text-center w50"},
                {title: "اولویت", "class": "text-center w50"},
                {title: "وضعیت", "class": "text-center w50"},
				{title: '<i class="fa fa-bars"></i>', "class": "text-center option w50"}
            ],
        });
    });
</script>    
