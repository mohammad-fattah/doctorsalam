<?php echo form_open(get_uri("time/add_time/$user_key"), array("id" => "team_member-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    <input type="hidden" name="idaddress" value="<?php echo $id; ?>" >
    <div class="tab-content mt15">
		<div class="form-group">
		  <div class=" col-md-12">
			<label for="area" class=" col-md-3">منطقه</label>
			<div class=" col-md-9">
				<?php
				echo form_input(array(
					"id" => "area",
					"name" => "area",
					"value" => $model_info->area,
					"class" => "form-control",
					"placeholder" => "منطقه",
					"data-rule-required" => true,
					"data-msg-required" => lang("field_required"),
				));
				?>
			</div>
		   </div>
		</div>
		<div class="form-group">
        <label for="description" class=" col-md-3">تقویم</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "end_date",
                "name" => "end_date",
                "type" => "text",
                "value" => $model_info->end_date,
                "class" => "form-control",
                "placeholder" => "تقویم",
            ));
            ?>
        </div>
        </div>
		<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/persianDatepicker.min.js" type="text/javascript"></script>
    <script>$(document).ready(function() {$("#start_date,#end_date").persianDatepicker({autoClose: true});});</script>
    <script src="/assets/js/persian-date.min.js"></script>
    <script src="/assets/js/persian-datepicker.min.js"></script>
</div>
<div class="modal-footer">
    <button class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> <?php echo lang('close'); ?></button>
    <button id="form-submit" type="button" class="btn btn-primary "><span class="fa fa-check-circle"></span> <?php echo lang('save'); ?></button>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">
    $(document).ready(function() {
        $("#team_member-form").appForm({
            onSuccess: function(result) {
                if (result.success) {
                    $("#cover-table").appTable({newData: result.data, dataId: result.id});
                }
            }
        });

        $("#team_member-form .select2").select2();

        $("#form-submit").click(function() {
            $("#team_member-form").trigger('submit');
        });
    });
</script>