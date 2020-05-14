<div id="page-content" class="p20 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h1>سفارشات</h1>
            <div class="title-button-group">
                <?php
                if ($can_create_projects) {
                    echo modal_anchor(get_uri("projects/modal_form"), "<i class='fa fa-plus-circle'></i> " . lang('add_project'), array("class" => "btn btn-default", "title" => lang('add_project')));
                }
                ?>
            </div>
        </div>
        <div class="table-responsive">
            <table id="project-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>
<?php
 if(isset($_GET['insure'])){
	 $insure=$_GET['insure'];
 }else{
	 $insure="";
 }
?>
<script type="text/javascript">
    $(document).ready(function () {
        var optionVisibility = false;
        if ("<?php echo ($can_edit_projects || $can_delete_projects); ?>") {
            optionVisibility = true;
        }
        $("#project-table").appTable({
			
            source: '<?php echo_uri("projects/list_data_new/".$insure) ?>',
            radioButtons: [{text: 'تکمیل نشده', name: "status", value: "open", isChecked: true},{text: 'پرداخت شده', name: "status", value: "peyment", isChecked: false},{text: 'ارجاع داده شده', name: "status", value: "erja", isChecked: false}, {text: 'در حال صدور', name: "status", value: "sodor", isChecked: false}, {text: 'صادره شده', name: "status", value: "sader", isChecked: false}, {text: 'تحویل داده شده', name: "status", value: "tahvil", isChecked: false},{text: '<?php echo lang("completed") ?>', name: "status", value: "completed", isChecked: false},{text: '<?php echo lang("canceled") ?>', name: "status", value: "canceled", isChecked: false}],
            /*filterDropdown: [{name: "project_label", class: "w200", options: <?php echo $project_labels_dropdown; ?>}],*/
            /*singleDatepicker: [{name: "deadline", defaultText: "<?php echo lang('deadline') ?>",
                    options: [
                        {value: "گرفتن قیمت", text: "<?php //echo lang('expired') ?>گرفتن قیمت"},
                        {value: "وارد کردن مشخصات", text: "وارد کردن مشخصات"},
                        {value: "آپلود تصویر", text: "آپلود تصویر"}
                    ]}],*/
            columns: [
                {title: '<?php echo lang("id") ?>', "class": "w50"},
                {title: '<?php echo lang("title") ?>'},
                {title: '<?php //echo lang("client") ?>نام مشتری', "class": "w10p"},
                {visible: optionVisibility, title: '<?php echo lang("price") ?>', "class": "w10p"},
                {visible: false, searchable: false},
                {title: '<?php //echo lang("start_date") ?>تاریخ', "class": "w10p", "iDataSort": 4},
                {visible: false, searchable: false},
                {title: '<?php echo lang("deadline") ?>', "class": "w10p", "iDataSort": 6},
                {title: '<?php //echo lang("progress") ?>نقد / اقساط', "class": "w10p"},
                {title: '<?php echo lang("status") ?>', "class": "w10p"},
                {visible: optionVisibility, title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
            order: [[1, "desc"]],
            printColumns: combineCustomFieldsColumns([0, 1, 2, 3, 5, 7, 8, 9], '<?php echo $custom_field_headers; ?>'),
            xlsColumns: combineCustomFieldsColumns([0, 1, 2, 3, 5, 7, 8, 9], '<?php echo $custom_field_headers; ?>')
        });
    });
</script>