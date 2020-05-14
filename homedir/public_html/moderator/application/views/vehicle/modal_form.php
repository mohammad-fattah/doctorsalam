<?php echo form_open(get_uri("vehicle/save"), array("id" => "team-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    <input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />
    <div class="form-group">
        <label for="title" class=" col-md-3">نام وسیله نقلیه</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "title",
                "name" => "title",
                "value" => $model_info->name,
                "class" => "form-control",
                "placeholder" => "نام وسیله نقلیه",
                "autofocus" => true,
                "data-rule-required" => true,
                "data-msg-required" => lang("field_required"),
            ));
            ?>
        </div>
    </div>
    
    <div class="form-group">
        <label for="title" class=" col-md-3">نوع وسیله نقلیه</label>
        <div class=" col-md-9">
            <?php
             echo form_dropdown(
               "show_background_image_in_signin_page", array(
                "personal" => "شخصی",
                "motor" => "موتور سیکلت",
                "personal,taxiin,taxiout,agancy" => "تاکسی درون شهری",
                "personal,taxiin,taxiout,agancy" => "تاکسی برون شهری",
                "personal,taxiin,taxiout,agancy" => "آژانس",
                "truck" => "بارکش",
                "autocar" => "اتوکار",
               ), get_setting('show_background_image_in_signin_page'), "class='select2 mini'"
             );
           ?>
        </div>
    </div>
    
    <table id="team-table"></table>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> <?php echo lang('close'); ?></button>
    <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span> <?php echo lang('save'); ?></button>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">
    $(document).ready(function() {
        $("#team-form").appForm({
            onSuccess: function(result) {
                $("#team-table").appTable({newData: result.data, dataId: result.id});
            }
        });
    $("#team_members_dropdown").select2({
            multiple: true,
            data: <?php echo ($members_dropdown); ?>
        });
        
        $("#team-form .select2").select2();
        $("#title").focus();
    });
</script>    