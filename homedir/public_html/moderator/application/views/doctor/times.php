<div id="page-content" class="p220 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h1>زمان ها</h1>
            <div class="title-button-group">
                <?php
				 if($this->login_user->user_type !== 'broker' || $this->login_user->user_type !== 'agent')
                  echo modal_anchor(get_uri("doctor/time_form/$id"), "<i class='fa fa-plus-circle'></i> افزودن زمان", array("class" => "btn btn-default", "title" => "افزودن زمان"));
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
            source: '<?php echo_uri("doctor/list_data_times/$id") ?>',
            order: [[1, "asc"]],
            columns: [
                {title: "ردیف", "class": "text-center w50"},
                {title: "تاریخ", "class": "text-center w100"},
                {title: "ساعت", "class": "text-center w50"},
                {title: "توضیحات", "class": "text-center w50"},
                {title: "قیمت (تومان)", "class": "text-center w50"},
                {title: "تماس اینترنتی", "class": "text-center w50"},
                {title: "نحوه پرداخت", "class": "text-center w50"},
                {title: "وضعیت", "class": "text-center w50"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w50"}
            ],
            printColumns: combineCustomFieldsColumns([0, 1, 2, 3, 4]),
            xlsColumns: combineCustomFieldsColumns([0, 1, 2, 3, 4])

        });
    });
</script>    
