<div id="page-content" class="p220 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h1>نحوه پرداخت ها</h1>
            <div class="title-button-group">
                <?php
                  echo modal_anchor(get_uri("insurance_payment/modal_form/$type"), "<i class='fa fa-plus-circle'></i> افزودن نحوه پرداخت ", array("class" => "btn btn-default", "title" => "افزودن نحوه پرداخت "));
                ?>
            </div>
        </div>
        <div class="table-responsive">
            <table id="payment-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        $("#payment-table").appTable({
            source: '<?php echo_uri("insurance_payment/list_data/$type") ?>',
            order: [[1, "asc"]],
            columns: [
                {title: "ردیف", "class": "text-center w50"},
                {title: "بیمه", "class": "text-center w100"},
                {title: "نام", "class": "text-center w100"},
                {title: "شرکت", "class": "text-center w50"},
				{title: '<i class="fa fa-bars"></i>', "class": "text-center option w50"}
            ],
        });
    });
</script>    
