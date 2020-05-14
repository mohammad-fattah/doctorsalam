<div id="page-content" class="p220 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h1>زیر تخصصها</h1>
            <div class="title-button-group">
                <?php
                  echo modal_anchor(get_uri("insurance_parameter/modal_form/$type"), "<i class='fa fa-plus-circle'></i> افزودن زیر تخصص", array("class" => "btn btn-default", "title" => "افزودن زیر تخصص"));
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
            source: '<?php echo_uri("insurance_parameter/list_data/$type") ?>',
            order: [[1, "asc"]],
            columns: [
                {title: "ردیف", "class": "text-center w50"},
                {title: "نام", "class": "text-center w100"},
                {title: "اولویت", "class": "text-center w50"},
				{title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
        });
    });
</script>    
