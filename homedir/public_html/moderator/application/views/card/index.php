<div id="page-content" class="p20 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h4>کارتهای بانکی</h4>
			<div class="title-button-group">
                <?php echo modal_anchor(get_uri("card/add_card/"), "<i class='fa fa-plus-circle'></i> " . "افزودن کارت", array("class" => "btn btn-default", "title" => "کارتهای بانکی")); ?>
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
            source: '<?php echo_uri("card/all_transaction/".$this->login_user->user_key) ?>',
            columns: [
                {title: 'شناسه'},
                {title: 'تاریخ ثبت'},
                {title: 'شماره کارت'},
                {title: 'نام کارت'},
                {title: 'فعال / غیرفعال'},
                {title: 'وضعیت اتصال'},
                {title: 'نوع کارت'},
                {title: 'عملیات'}
            ],
            printColumns: [0, 1, 2, 3]
        });
    });
</script>