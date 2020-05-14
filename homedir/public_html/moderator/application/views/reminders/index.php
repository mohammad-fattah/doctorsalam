<div id="page-content" class="p20 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h4>سررسید تخصص ها</h4>
			<div class="title-button-group">
              <?php
			   if($this->login_user->user_type !== 'broker')
				echo modal_anchor(get_uri("reminders/reminder_modal_form"), "<i class='fa fa-plus-circle'></i> افزودن یادآور", array("class" => "btn btn-default", "title" => "افزودن یادآور")); ?>
            </div>
			<?php if($this->login_user->user_type !== 'broker'): ?>
			<form style="float: left;" method="post" action="<?php echo base_url(); ?>reminders/action">
             <input type="submit" name="export" class="btn btn-success" value="خروجی اکسل" />
             <input type="hidden"  value="reminder">
            </form>
			<?php endif; ?>
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
            source: '<?php echo_uri("reminders/reminder_list_data/") ?>',
            columns: [
                {title: 'آیکون', "class": "text-center option w100"},
                {title: 'شرکت بیمه', "class": "text-center option w100"},
                {title: 'نام کاربر', "class": "text-center option w100"},
                {title: 'نوع تخصص', "class": "text-center option w100"},
				{title: 'تاریخ', "class": "option w100"},
                {title: 'وضعیت', "class": "text-center option w100"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
            printColumns: [0, 1, 2, 3]
        });
    });
</script>