<div id="page-content" class="p220 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h1>پزشکان</h1>
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
            source: '<?php echo_uri("doctor/list_data/") ?>',
            order: [[1, "asc"]],
            columns: [
                {title: "ردیف", "class": "text-center w50"},
                {title: "نام پزشک", "class": "text-center w100"},
                {title: "شماره همراه", "class": "text-center w50"},
                {title: "کد ملی", "class": "text-center w50"},
                {title: "استان", "class": "text-center w50"},
                {title: "ایمیل", "class": "text-center w50"},
                {title: "وضعیت", "class": "text-center w50"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ]

        });
    });
</script>    
