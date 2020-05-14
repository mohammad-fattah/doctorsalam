<div class="modal-body clearfix" style="text-align:center;">
<h4>تخفیف <b><?php echo $model_info->value." ".$type; ?></b> از <b><?php echo $merchant->job_title; ?></b></h4>
<div style="border:dashed 1px orange; width:100%;border-right:none;border-left:none;"><h2><I><?php echo $model_info->code; ?></I></h2></div>
<br/>
<small><span style="color:lightblue">آدرس پذیرنده :</span> <?php echo $merchant->address; ?></small><br/>
<small><span style="color:lightblue">تاریخ انقضا : </span> <?php echo $model_info->expire_date; ?></small>
</div>