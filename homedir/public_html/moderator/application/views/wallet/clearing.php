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
				  <?php echo form_open(get_uri("wallet/minus_charge"), array("id" => "team-form", "class" => "general-form", "role" => "form")); ?>
				    <input type="hidden" name="for" value="تسویه" />
                    <div class="panel-body">
                        <div>حداقل مبلغ ۵۰,۰۰۰ تومان است</div>
                        <div class="p15">
                            <input type="text" name="price" value="" id="price" class="form-control" placeholder="مبلغ به تومان" autofocus="1" style="background-color:#ebeff2;width:100%;margin-top:20px">
                        </div>
                    </div>
                    <div class="panel-footer p15 no-border" style="background-color:#fff;margin-top:0">
						<button class="btn btn-xs btn-info" type="submit" style="width:100%;font-size:14px;height:45px">درخواست تسویه</button>
                    </div>
				  <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
	
	<div class="panel panel-default col-md-6 col-sm-6" style="margin: 0 auto;background-color:#fff;margin-top:20px">
        <div class="page-title clearfix">
            <h4 style="text-align:center;width:100%">شرایط تسویه</h4>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-6">
                <div class="panel panel-default" style="background-color:#fff;">
                    <div class="panel-body">
                        <div>
						 <ul style="line-height:30px">
            <li>زمان تسویه حساب از ساعت ۷ صبح تا ۱۵/۳۰ دقیقه همان روز است.</li>
            <li>حداکثر تعداد تسویه در هر روز ۲ مرتبه است.</li>
            <li>بین هر دو درخواست تسویه متوالی باید حداقل ۳ ساعت فاصله زمانی وجود داشته باشد.</li>
            <li>حداکثر مبلغ قابل درخواست در هر بار تسویه، حداکثر 30,000,000 تومان است.</li>
            <li class="text-danger">تسویه شتابی - شاپرکی (شبا) در روزهای تعطیل غیر فعال می&zwnj;باشد.</li>
            <li class="text-info">درآمد حاصل از فروش درگاه&zwnj;های اینترنتی پس از ۲۴ ساعت قابل برداشت خواهد بود.</li>
          </ul>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>