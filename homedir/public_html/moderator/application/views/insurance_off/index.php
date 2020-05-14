<div id="page-content" class="p220 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h1>تخفیف ها</h1>
            <div class="title-button-group">
                <?php
                  echo modal_anchor(get_uri("insurance_off/modal_form/"), "<i class='fa fa-plus-circle'></i> افزودن تخفیف", array("class" => "btn btn-default", "title" => "افزودن تخفیف"));
                ?>
            </div>
        </div>
        <div class="table-responsive">
            <table id="cover-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        $("#cover-table").appTable({
            source: '<?php echo_uri("insurance_off/list_data/$type") ?>',
            order: [[1, "asc"]],
            columns: [
                {title: "ردیف", "class": "text-center w50"},
                {title: "تخصص", "class": "text-center w50"},
                {title: "نام تخفیف", "class": "text-center w100"},
                {title: "مقدار", "class": "text-center w50"},
                {title: "نمایش", "class": "text-center w50"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w50"}
            ],
        });
    });
</script>    
