<div id="page-content" class="p20 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h4>مالی</h4>
			<div class="title-button-group">
                <?php
                  echo modal_anchor(get_uri("doctor/modal_form"), "<i class='fa fa-plus-circle'></i> شارژ کیف پول مستقیم", array("class" => "btn btn-default", "title" => "شارژ کیف پول مستقیم"));
				  
				  echo modal_anchor(get_uri("doctor/modal_form"), "<i class='fa fa-plus-circle'></i> شارژ کیف پول بیمیتک", array("class" => "btn btn-default", "title" => "شارژ کیف پول بیمیتک"));
                ?>
            </div>
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
            source: '<?php echo_uri("doctor/all_transaction_wallet/".$user_key) ?>',
            columns: [
                {title: 'شناسه'},
                {title: 'مورد استفاده'},
                {title: 'تاریخ'},
                {title: 'مبلغ'},
                {title: 'باقیمانده'},
                {title: 'نوع'},
                {title: 'وضعیت'}
            ],
            printColumns: [0, 1, 2, 3]
        });
    });
</script>