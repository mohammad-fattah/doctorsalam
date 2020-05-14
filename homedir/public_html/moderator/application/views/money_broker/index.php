<div id="page-content" class="p20 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h1>گزارشات فروش و مالی بازاریاب ها</h1>
            <div class="title-button-group">
                <?php echo modal_anchor(get_uri("money_broker/modal_form"), "<i class='fa fa-plus-circle'></i> " . lang('add_client'), array("class" => "btn btn-default", "title" => lang('add_client'))); ?>
            </div>
        </div>
        <div class="table-responsive">
            <table id="client-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        var showInvoiceInfo = true;
        if (!"<?php echo $show_invoice_info; ?>") {
            showInvoiceInfo = false;
        }

        $("#client-table").appTable({
            source: '<?php echo_uri("money_broker/list_data") ?>',
            columns: [
                {title: "<?php echo lang("id") ?>", "class": "text-center w50"},
                {title: "<?php //echo lang("company_name") ?>نام و نام خانوادگی"},
                {title: "تعداد سفارش ها"},
                {title: "مجموع خرید نقدی"},
                {title: "مجموع خرید اقساطی"},
                {visible: showInvoiceInfo, searchable: false, title: "مجموع کارمزد دریافتی"},
                {visible: showInvoiceInfo, searchable: false, title: "جمع بدهکار"}
                <?php echo $custom_field_headers; ?>,
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
            printColumns: combineCustomFieldsColumns([0, 1, 2, 3, 4, 5], '<?php echo $custom_field_headers; ?>'),
            xlsColumns: combineCustomFieldsColumns([0, 1, 2, 3, 4, 5], '<?php echo $custom_field_headers; ?>')
        });
    });
</script>