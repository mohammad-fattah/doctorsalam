<form action="javascript:;" id="off-form" class="general-form" role="form" method="post" accept-charset="utf-8">
 <div class="modal-body clearfix">
    <input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />
    <input type="hidden" name="type" value="<?php echo $type; ?>" />

    <div class="form-group">
        <label for="title" class=" col-md-3">متن اطلاعیه</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "title",
                "name" => "title",
                "value" => $model_info->title,
                "class" => "form-control",
                "placeholder" => "متن اطلاعیه",
                "autofocus" => true,
                "data-rule-required" => true,
                "data-msg-required" => lang("field_required"),
            ));
            ?>
        </div>
    </div>
	<div class="form-group">
        <label for="title" class=" col-md-3">متن دکمه</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "lowest_score",
                "name" => "lowest_score",
                "value" => $model_info->lowest_score,
                "class" => "form-control",
                "placeholder" => "متن دکمه",
                "autofocus" => true,
                "data-rule-required" => true,
                "data-msg-required" => lang("field_required"),
            ));
            ?>
        </div>
    </div>
	<div class="form-group">
        <label for="title" class=" col-md-3">آدرس (url)</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "url",
                "name" => "url",
                "value" => $model_info->url,
                "class" => "form-control",
                "placeholder" => "آدرس (url)",
                "autofocus" => true,
                "data-rule-required" => true,
                "data-msg-required" => lang("field_required"),
            ));
            ?>
        </div>
    </div>
    <div class="form-group">
        <label for="description" class=" col-md-3">تاریخ شروع</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "start_date",
                "name" => "start_date",
                "type" => "text",
                "value" => $model_info->start_date,
                "class" => "form-control",
                "placeholder" => "تاریخ شروع",
            ));
            ?>
        </div>
    </div>
	<div class="form-group">
        <label for="description" class=" col-md-3">تاریخ پایان</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "end_date",
                "name" => "end_date",
                "type" => "text",
                "value" => $model_info->end_date,
                "class" => "form-control",
                "placeholder" => "تاریخ پایان",
            ));
            ?>
        </div>
    </div>
	<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/persianDatepicker.min.js" type="text/javascript"></script>
    <script>$(document).ready(function() {$("#start_date,#end_date").persianDatepicker({autoClose: true});});</script>
    <script src="/assets/js/persian-date.min.js"></script>
    <script src="/assets/js/persian-datepicker.min.js"></script>
	
	 <div class="form-group">
        <label for="status" class=" col-md-3"><?php echo lang('status'); ?></label>
        <div class=" col-md-9">
            <?php
            echo form_radio(array(
                "id" => "status_active",
                "name" => "status",
                "data-msg-required" => lang("field_required"),
                    ), "1", ($model_info->status === "1") ? true : ($model_info->status !== "0") ? true : false);
            ?>
            <label for="status_active" class=""><?php echo lang('active'); ?></label>
			<br>
            <?php
            echo form_radio(array(
                "id" => "status_inactive",
                "name" => "status",
                "data-msg-required" => lang("field_required"),
                    ), "0", ($model_info->status === "0") ? true : false);
            ?>
            <label for="status_inactive" class=""><?php echo lang('inactive'); ?></label>
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> <?php echo lang('close'); ?></button>
    <button type="submit" class="btn btn-primary click"><span class="fa fa-check-circle"></span> <?php echo lang('save'); ?></button>
</div>
<?php echo form_close(); ?>
<script type="text/javascript">
    $(document).ready(function () {
	 $('.click').on('click',function(){
	   $.ajax({
		 type:"POST",
		 url:'lottery/save_lottery',
		 data:$('#off-form').serialize(),
		 success:function(){
		  location.reload();
		 }
	   })
	 })
    });
</script>   