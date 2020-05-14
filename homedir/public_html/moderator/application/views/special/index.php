<div id="page-content" class="p20 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h4>فروش ویژه</h4>
			<div class="title-button-group">
                <?php 
				 //if ($this->login_user->is_admin) {
					echo modal_anchor(get_uri("special/category_modal_form/"), "<i class='fa fa-plus-circle'></i> " . "افزودن فروش ویژه", array("class" => "btn btn-default", "title" => "افزودن فروش ویژه"));
				 //}	
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
            source: '<?php echo_uri("special/categories_list_data/" . $type) ?>',
            columns: [
                {title: 'نام محصول'},
                {title: 'تاریخ شروع'},
                {title: 'تاریخ پایان'},
                {title: 'تخفیف'},
                {title: 'وضعیت'},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
            printColumns: [0, 1, 2, 3]
        });
    });
</script>