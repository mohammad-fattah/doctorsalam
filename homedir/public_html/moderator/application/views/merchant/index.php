<div id="page-content" class="p220 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h1>پذیرندگان</h1>
            <div class="title-button-group">
                <?php
                //if ($this->login_user->is_admin) {
                  echo modal_anchor(get_uri("merchant/modal_form"), "<i class='fa fa-plus-circle'></i> افزودن پذیرنده", array("class" => "btn btn-default", "title" => "افزودن پذیرنده"));
                //}
                ?>
            </div>
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
            source: '<?php echo_uri("merchant/list_data/") ?>',
            order: [[1, "asc"]],
            columns: [
                {title: "شناسه", "class": "text-center w50"},
                {title: "مشخصات پذیرنده", "class": "text-center w100"},
                {title: "نام پذیرنده", "class": "text-center w100"},
                {title: "کد پذیرندگی", "class": "text-center w50"},
                {title: "نام باشگاه", "class": "text-center w50"},
                {title: "استان - شهر", "class": "text-center w50"},
                {title: "کد ملی", "class": "text-center w50"},
                {title: "شماره همراه", "class": "text-center w50"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
            printColumns: combineCustomFieldsColumns([0, 1, 2, 3, 4], '<?php echo $custom_field_headers; ?>'),
            xlsColumns: combineCustomFieldsColumns([0, 1, 2, 3, 4], '<?php echo $custom_field_headers; ?>')

        });
    });
</script>    
