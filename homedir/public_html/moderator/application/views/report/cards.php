<div id="page-content" class="p220 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h1>کارت ها</h1>
        </div>
        <div class="table-responsive">
            <table id="cards-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        $("#cards-table").appTable({
            source: '<?php echo_uri("user_cards/categories_list_data/"); ?>',
            order: [[1, "dec"]],
            columns: [
				{title: 'نام بانک'},
                {title: 'نام کاربر'},
                {title: 'شماره کارت'},
                {title: 'وضعیت'},
                {title: 'نوع کارت'},

            ],
        });
    });
</script>    
