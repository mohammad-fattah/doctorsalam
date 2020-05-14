<div class="panel panel-default">
    <div class="tab-title clearfix">
        <h4>قرادادها</h4>
		<?php if($user_id){ ?>
		<div class="title-button-group">
			<?php
			   echo modal_anchor(get_uri("merchant/contract_modal_form/0/".$user_id), "<i class='fa fa-plus-circle'></i>&nbspافزودن قرارداد", array("class" => "btn btn-default", "title" => "افزودن قرارداد"));
			?>
		</div>
		<?php } ?>
	</div>
    <div class="table-responsive">
        <table id="project-table" class="display" cellspacing="0" width="100%">
        </table>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#project-table").appTable({
            source: '<?php echo_uri("merchant/all_contracts/" . $user_id) ?>',
            columns: [
                {title: 'ردیف', "class": "w50"},
                {title: 'شماره قراداد', "class": "w50"},
                <?php if(!$user_id){ ?>
					{title: 'پذیرنده', "class": "w50"},
				<?php } ?>
				{title: 'مدت قراداد', "class": "w50"},
                {title: 'تاریخ قرارداد', "class": "w10p", "iDataSort": 4},
                {title: '<?php echo lang("status") ?>', "class": "w10p"},
				{title: 'فایل', "class": "w10p"},
				<?php if($user_id){ ?>
					{title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
				<?php } ?>
            ],
            order: [[1, "desc"]],
            printColumns: combineCustomFieldsColumns( [0, 1, 2, 3, 5, 7, 8, 9], '<?php echo $custom_field_headers; ?>'),
            xlsColumns: combineCustomFieldsColumns( [0, 1, 2, 3, 5, 7, 8, 9], '<?php echo $custom_field_headers; ?>')
        });
    });
</script>