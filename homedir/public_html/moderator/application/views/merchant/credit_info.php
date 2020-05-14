<div class="panel">
    <div class="tab-title clearfix">
        <h4>تراکنش های اقساطی</h4>
    </div>
    <div class="table-responsive">
        <table id="project-table" class="display" cellspacing="0" width="100%">
        </table>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#project-table").appTable({
            source: '<?php echo_uri("projects/credit_info_merchant/" . $user_id) ?>',
            /*radioButtons: [{text: '<?php echo lang("open") ?>', name: "status", value: "open", isChecked: true}, {text: '<?php echo lang("completed") ?>', name: "status", value: "completed", isChecked: false}, {text: '<?php echo lang("canceled") ?>', name: "status", value: "canceled", isChecked: false}],*/
            columns: [
                {title: '<?php echo lang("id") ?>', "class": "w50"},
                {title: 'محصول / خدمات', "class": "w50"},
                {title: '<?php echo lang("client") ?>', "class": "w50"},
                {visible: true, title: '<?php echo lang("price") ?>', "class": "w100"},
                {visible: false, searchable: false},
                {title: 'تاریخ خرید', "class": "w10p", "iDataSort": 4},
                {title: '<?php echo lang("progress") ?>', "class": "w10p"},
                {title: '<?php echo lang("status") ?>', "class": "w10p"}
                <?php echo $custom_field_headers; ?>
            ],
            order: [[1, "desc"]],
            printColumns: combineCustomFieldsColumns( [0, 1, 2, 3, 5, 7, 8, 9], '<?php echo $custom_field_headers; ?>'),
            xlsColumns: combineCustomFieldsColumns( [0, 1, 2, 3, 5, 7, 8, 9], '<?php echo $custom_field_headers; ?>')
        });
    });
</script>