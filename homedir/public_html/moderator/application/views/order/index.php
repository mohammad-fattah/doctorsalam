<div id="page-content" class="p20 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h4>سفارشات</h4>
			<!--<form style="float: left;" method="post" action="<?php echo base_url(); ?>order/action">
             <input type="submit" name="export" class="btn btn-success" value="خروجی اکسل" />
             <input type="hidden"  value="reminder">
            </form>-->
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
            source: '<?php echo_uri("order/all_transaction/") ?>',
            columns: [
                {title: 'ردیف', "class": "text-center option w50"},
                {title: 'نوبت', "class": "text-center option w50"},
                {title: 'قیمت', "class": "text-center option w50"},
                {title: 'نام بیمار', "class": "text-center option w50"},
                {title: 'نام پزشک', "class": "text-center option w50"},
                {title: 'نحوه پرداخت', "class": "text-center option w50"},
                {title: 'وضعیت', "class": "text-center option w50"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w50"}
            ],
        });
    });
</script>