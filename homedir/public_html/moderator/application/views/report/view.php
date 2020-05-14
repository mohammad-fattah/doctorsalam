<?php $this->load->view("includes/cropbox"); ?>
<style>.general-form.white label{float:right}</style>
<div id="page-content" class="p220 clearfix">
    <div class="page-title clearfix no-border bg-off-white" style="margin-bottom:10px">
      <h1>
		گزارشات مالی
	 </h1>
    </div>

    <ul data-toggle="ajax-tab" class="nav nav-tabs" role="tablist">
        <li><a role="presentation" href="<?php echo_uri("report/sell_cash/"); ?>" data-target="#tab-sell-cash-info">فروش نقدی</a></li>
        <li><a role="presentation" href="<?php echo_uri("report/sell_credit/"); ?>" data-target="#tab-sell-credit-info">فروش اقساطی</a></li>
		<!--<li><a role="presentation" href="<?php echo_uri("report/request/"); ?>" data-target="#tab-request-info">درخواست اعتبار</a></li>-->
		<li><a role="presentation" href="<?php echo_uri("report/transfer/"); ?>" data-target="#tab-transfer-info">انتقال</a></li>
		<li><a role="presentation" href="<?php echo_uri("report/charge/"); ?>" data-target="#tab-charge-info">شارژ</a></li>
		<!--<li><a role="presentation" href="<?php echo_uri("merchant/contract/"); ?>" data-target="#tab-contract-info">قرارداد</a></li>-->
		<li><a role="presentation" href="<?php echo_uri("report/terminal/"); ?>" data-target="#tab-terminal-info">ترمینال</a></li>
		<li><a role="presentation" href="<?php echo_uri("report/discount/"); ?>" data-target="#tab-discount-info">تخفیف</a></li>
		<li><a role="presentation" href="<?php echo_uri("report/shop/"); ?>" data-target="#tab-shop-info">فروشگاه آنلاین</a></li>
		<li><a role="presentation" href="<?php echo_uri("report/cards/"); ?>" data-target="#tab-cards-info">کارت ها</a></li>
		
	</ul>

    <div class="tab-content" style="background-color:#fff">
        <div role="tabpanel" class="tab-pane fade active pl15 pr15 mb15" id="tab-timeline">
            <?php timeline_widget(array("limit" => 20, "offset" => 0, "is_first_load" => true, "user_id" => $user_info->id)); ?>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="tab-sell-cash-info"></div>
        <div role="tabpanel" class="tab-pane fade" id="tab-sell-credit-info"></div>
        <div role="tabpanel" class="tab-pane fade" id="tab-request-info"></div>
        <div role="tabpanel" class="tab-pane fade" id="tab-transfer-info"></div>
        <div role="tabpanel" class="tab-pane fade" id="tab-charge-info"></div>
        <div role="tabpanel" class="tab-pane fade" id="tab-contract-info"></div>
        <div role="tabpanel" class="tab-pane fade" id="tab-terminal-info"></div>
        <div role="tabpanel" class="tab-pane fade" id="tab-discount-info"></div>
        <div role="tabpanel" class="tab-pane fade" id="tab-shop-info"></div>
        <div role="tabpanel" class="tab-pane fade" id="tab-cards-info"></div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        
        var tab = "<?php echo $tab; ?>";
        if (tab === "general") {
            $("[data-target=#tab-general-info]").trigger("click");
        } else if (tab === "account") {
            $("[data-target=#tab-account-settings]").trigger("click");
        } else if (tab === "social") {
            $("[data-target=#tab-social-links]").trigger("click");
        } else if (tab === "job_info") {
            $("[data-target=#tab-job-info]").trigger("click");
        }

    });
</script>