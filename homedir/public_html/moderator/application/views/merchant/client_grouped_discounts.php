<div id="page-content" class="p220 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h1>تخفیف های حضوری</h1>
        </div>
        <div class="table-responsive">
            <table id="team_member-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        

        $("#team_member-table").appTable({
            source: '<?php echo_uri("merchant/client_grouped_discount_list_data/".$merchant_id) ?>',
            order: [[1, "asc"]],
            columns: [
                {title: "پذیرنده", "class": "text-center w50"},
                {title: "عنوان کد", "class": "text-center w50"},
                {title: "تاریخ فعال شدن", "class": "text-center w100"},
                {title: "تاریخ انقضا", "class": "text-center w100"},
                {title: "مقدار تخفیف", "class": "text-center w50"},
                {title: "توضیحات", "class": "text-center w50"},
                {title: "وضعیت فعلی", "class": "text-center w50"},
				{title: "درخواست کد", "class": "text-center w50"},
            ],
            printColumns: combineCustomFieldsColumns([0, 1, 2, 3, 4], '<?php echo $custom_field_headers; ?>'),
            xlsColumns: combineCustomFieldsColumns([0, 1, 2, 3, 4], '<?php echo $custom_field_headers; ?>')

        });
    });
</script>    
