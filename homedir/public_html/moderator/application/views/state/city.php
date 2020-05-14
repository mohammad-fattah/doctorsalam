<div id="page-content" class="p220 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h1>شهرها</h1>
            <div class="title-button-group">
                <?php
                  //echo modal_anchor(get_uri("insurance_parameter/modal_form/thirdparty"), "<i class='fa fa-plus-circle'></i> افزودن پارامتر", array("class" => "btn btn-default", "title" => "افزودن پارامتر"));
                ?>
            </div>
        </div>
        <div class="table-responsive">
            <table id="parameter-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        $("#parameter-table").appTable({
            source: '<?php echo_uri("state/list_data_city/$id") ?>',
            order: [[1, "asc"]],
            columns: [
                {title: "ردیف", "class": "text-center w50"},
                {title: "نام", "class": "text-center w100"},
                {title: "وضعیت", "class": "text-center w50"},
				{title: '<i class="fa fa-bars"></i>', "class": "text-center option w50"}
            ],
        });
    });
</script>    
