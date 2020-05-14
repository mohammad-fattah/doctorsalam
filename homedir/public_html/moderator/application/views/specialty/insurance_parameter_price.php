<div id="page-content" class="p220 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h1>نرخ تخصص</h1>
            <div class="title-button-group">
                <?php
                  echo modal_anchor(get_uri("insurance_parameter_price/modal_form/$type"), "<i class='fa fa-plus-circle'></i> افزودن نرخ", array("class" => "btn btn-default", "title" => "افزودن نرخ"));
                ?>
            </div>
        </div>
        <div class="table-responsive">
            <table id="parameter-price-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        $("#parameter-price-table").appTable({
            source: '<?php echo_uri("insurance_parameter_price/list_data/$type") ?>',
            columns: [
                {title: "ردیف", "class": "text-center w50"},
                {title: "عمل", "class": "text-center w100"},
                {title: "مقدار", "class": "text-center w50"},
                {title: "نوع", "class": "text-center w50"},
                {title: "شرکتهای شامل", "class": "text-center w100"},
                {title: "اولویت", "class": "text-center w50"},
				{title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
        });
    });
</script>    
