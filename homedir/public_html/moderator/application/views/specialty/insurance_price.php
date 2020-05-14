<div id="page-content" class="p220 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <img src="<?php echo $pic; ?>" style="width:30px;margin:10px;float:right" />
			<h1 style="padding-right:0"><?php echo "نرخ دهی ".$insurance; ?></h1>
			
            <div class="title-button-group">
                <?php
                  echo modal_anchor(get_uri("price/price_modal_form/".$staff_id), "<i class='fa fa-plus-circle'></i> افزودن قیمت", array("class" => "btn btn-default", "title" => "افزودن قیمت"));
                ?>
            </div>
        </div>
        <div class="table-responsive">
            <table id="price-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        $("#price-table").appTable({
            source: '<?php echo_uri("price/list_data/".$staff_id); ?>',
            columns: [
                {title: "ردیف", "class": "text-center w50"},
                {title: "شرکت بیمه", "class": "text-center w50"},
				{title: "نوع", "class": "text-center w100"},
				{title: "ضریب پایه", "class": "text-center w50"},
				{title: "نرخ", "class": "text-center w50"},
				{title: '<i class="fa fa-bars"></i>', "class": "text-center option w50"}
            ],
        });
    });
</script>    
