<div id="page-content" class="p220 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h1>پذیرندگان</h1>
            <!--<div class="title-button-group">
                <?php
                  echo modal_anchor(get_uri("merchant/modal_form_broker"), "<i class='fa fa-plus-circle'></i> افزودن پذیرندگان", array("class" => "btn btn-default", "title" => "افزودن پذیرندگان"));
                ?>
            </div>-->
        </div>
        <div class="table-responsive">
            <table id="team_member-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        var visibleContact = false;
        if ("<?php echo $show_contact_info; ?>") {
            visibleContact = true;
        }

        var visibleDelete = false;
        if ("<?php echo $this->login_user->is_admin; ?>") {
            visibleDelete = true;
        }

        $("#team_member-table").appTable({
            source: '<?php echo_uri("merchant/agent_list/") ?>',
            order: [[1, "asc"]],
            columns: [
			    {title: "شناسه", "class": "text-center w100"},
                {title: "مشخصات پذیرنده", "class": "text-center w100"},
                {title: "نام پذیرنده", "class": "text-center w100"},
                {title: "استان", "class": "text-center w50"},
                {title: "شهر", "class": "text-center w50"},
                {title: "کارمزد", "class": "text-center w50"},
                {title: "وضعیت", "class": "text-center w50"}
            ],
            printColumns: combineCustomFieldsColumns([0, 1, 2, 3, 4], '<?php echo $custom_field_headers; ?>'),
            xlsColumns: combineCustomFieldsColumns([0, 1, 2, 3, 4], '<?php echo $custom_field_headers; ?>')

        });
    });
</script>    
