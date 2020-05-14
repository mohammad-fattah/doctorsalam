<div id="page-content" class="p20 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h4>زونکن</h4>
			<div class="title-button-group">
              <?php
			   if($this->login_user->user_type !== 'broker')
				echo modal_anchor(get_uri("archive/modal_form"), "<i class='fa fa-plus-circle'></i> افزودن زونکن", array("class" => "btn btn-default", "title" => "افزودن زونکن")); ?>
            </div>
        </div>
        <div class="table-responsive">
            <table id="reminder-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#reminder-table").appTable({
            source: '<?php echo_uri("archive/list_data/") ?>',
            columns: [
                {title: 'نام', "class": "text-center option w100"},
                {title: 'رنگ', "class": "text-center option w50"},
                {title: 'سال', "class": "text-center option w50"},
                {title: 'توضیحات', "class": "text-center option w100"},
                {title: 'وضعیت', "class": "text-center option w50"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w50"}
            ],
            printColumns: [0, 1, 2, 3]
        });
    });
</script>