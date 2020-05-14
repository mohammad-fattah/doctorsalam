<div id="page-content" class="p20 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h4>سفارشات</h4>
			<?php if($this->login_user->user_type !== 'broker'): ?>
			<form style="float: left;" method="post" action="<?php echo base_url(); ?>order/action">
             <input type="submit" name="export" class="btn btn-success" value="خروجی اکسل" />
             <input type="hidden"  value="reminder">
            </form>
			<?php endif; ?>
        </div>
        <div class="table-responsive">
            <table id="category-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#category-table").appTable({
            source: '<?php echo_uri("bimitek/all_transaction/") ?>',
			filterDropdown: [{name: "status", class: "w200", options: <?php echo $order_status_dropdown; ?>},{name: "insure_type", class: "w150", options: <?php echo $company_dropdown; ?>}],
            columns: [
                {title: 'ردیف', "class": "text-center option w50"},
                {title: 'نوع', "class": "text-center option w50"},
                {title: 'تاریخ خرید', "class": "text-center option w100"},
                {title: 'قیمت', "class": "text-center option w50"},
                {title: 'نام کاربر', "class": "text-center option w50"},
                {title: 'نقد/اقساط', "class": "text-center option w50"},
                {title: 'وضعیت', "class": "text-center option w50"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w50"}
            ],
        });
    });
</script>