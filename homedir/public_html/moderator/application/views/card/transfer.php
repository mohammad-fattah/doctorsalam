<?php 
 foreach ($extant as $team_member) {
  $count_extant=$team_member->extant;
 }
?>

<div id="page-content" class="p20 clearfix" style="display:flex;flex-direction:column">
    <div class="panel panel-default col-md-6 col-sm-6" style="margin: 0 auto;background-color:#fff;">
        <div class="page-title clearfix">
            <h4 style="text-align:center;width:100%">موجودی کیف پول شما : <?php echo number_format($count_extant); ?> تومان</h4>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-6">
                <div class="panel panel-default  text-center " style="background-color:#fff;">
                    <?php echo form_open(get_uri("wallet/do_transfer"), array("id" => "team-form", "class" => "general-form", "role" => "form")); ?>
				    <input type="hidden" name="for" value="انتقال"> 
				    <input type="hidden" name="count_extant" value="<?php echo $count_extant; ?>" />
                    <div class="panel-body">
                        <div>حداقل مبلغ قابل انتقال ۵۰,۰۰۰ تومان و حداکثر مبلغ به اندازه موجودی کیف پولتان است.</div>
                        <div style="color:#c0392b!important;margin-top:20px">دقت داشته باشید که مبلغ، پس از انتقال، قابل استرداد نمی‌باشد.</div>
                        <div class="p15">
                            <input type="text" name="phone" value="" id="phone" class="form-control" placeholder="شماره همراه" autofocus="1" data-rule-required="1" data-msg-required="این فیلد مورد نیاز است." aria-required="true" style="background-color:#ebeff2;width:100%;margin-top:20px">
                            <input type="text" name="cost" value="" id="cost" class="form-control" placeholder="مبلغ به تومان" autofocus="1" data-rule-required="1" data-msg-required="این فیلد مورد نیاز است." aria-required="true" style="background-color:#ebeff2;width:100%;margin-top:20px">
                        </div>
                    </div>
                    <div class="panel-footer p15 no-border" style="background-color:#fff;margin-top:0">
                        <input type="submit" class="btn btn-xs btn-info" style="width:100%;font-size:14px" value="انتقال وجه">
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default col-md-6 col-sm-6" style="margin: 0 auto;background-color:#fff;margin-top:20px">
        <div class="page-title clearfix">
            <h4 style="text-align:center;width:100%">شرایط انتقال</h4>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-6">
                <div class="panel panel-default" style="background-color:#fff;">
                    <div class="panel-body">
                        <div>
                            <ul style="line-height:30px">
                                <li>زمان انتقال حساب از ساعت ۷ صبح تا ۱۵/۳۰ دقیقه همان روز است.</li>
                                <li>حداکثر تعداد انتقال در هر روز ۳ مرتبه است.</li>
                                <li>بین هر دو انتقال متوالی باید حداقل ۲ ساعت فاصله زمانی وجود داشته باشد.</li>
                                <li>حداکثر مبلغ قابل انتقال در هر بار انتقال، حداکثر ۳۰,۰۰۰,۰۰۰ تومان است.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>