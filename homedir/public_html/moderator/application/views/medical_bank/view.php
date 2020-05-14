<?php $this->load->view("includes/cropbox"); ?>
<div id="page-content" class="p220 clearfix">
    <?php $this->load->view("doctor/profile_image_section"); ?>
    <div class="page-title clearfix no-border bg-off-white" style="margin:10px 0">
      <div class="row" style="text-align:center">
	      <div class="col-md-12">
			<h1 style="text-align:center;width:100%">
		     <?php echo $user_info->first_name.' '.$user_info->last_name; ?>  
			</h1>
			<button type="button" class="btn  btn-primary v-btn v-btn--block theme--light" style="margin:0 auto;padding:0px 20px;margin-bottom:20px"><a href="/moderator/doctor/times/<?php echo $id; ?>" style="color:#fff"><div class="v-btn__content"><span>مدیریت زمان ها</span></div></a></button>
		  </div>
	  </div>
    </div>

    <ul data-toggle="ajax-tab" class="nav nav-tabs" role="tablist" style="justify-content: space-between;display:flex">
       <li><a  role="presentation" href="<?php echo_uri("doctor/general_info/".$user_key); ?>" data-target="#tab-general-info">مشخصات پزشک</a></li>
       <li><a role="presentation" href="<?php echo_uri("doctor/account_settings/".$user_key); ?>" data-target="#tab-account-settings"> <?php echo lang('account_settings'); ?></a></li>
       <li><a role="presentation" href="<?php echo_uri("doctor/order/".$user_key); ?>" data-target="#tab-cash-info"><?php echo lang('orders'); ?></a></li>
	   <li><a role="presentation" href="<?php echo_uri("doctor/address/" . $user_key); ?>" data-target="#tab-address-info">آدرس ها</a></li>
	   <li><a role="presentation" href="<?php echo_uri("doctor/chat/" . $user_key); ?>" data-target="#tab-chat-info">نظرات کاربران</a></li>
	   <li><a role="presentation" href="<?php echo_uri("doctor/discount/".$user_key); ?>" data-target="#tab-discount-info">کارمزد</a></li>
	   <li><a role="presentation" href="<?php echo_uri("doctor/wallet/" . $user_key); ?>" data-target="#tab-transaction-info">مالی</a></li>
       <li><a role="presentation" href="<?php echo_uri("doctor/card/" . $user_key); ?>" data-target="#tab-cards-info">کارت / حساب</a></li>
    </ul>

    <div class="tab-content" style="background-color:#fff">
        
        <div role="tabpanel" class="tab-pane fade" id="tab-general-info"></div>
		<div role="tabpanel" class="tab-pane fade" id="tab-account-settings"></div>
		<div role="tabpanel" class="tab-pane fade" id="tab-cash-info"></div>
		<div role="tabpanel" class="tab-pane fade" id="tab-discount-info"></div>
        <div role="tabpanel" class="tab-pane fade" id="tab-cards-info"></div>
        <div role="tabpanel" class="tab-pane fade" id="tab-wallet-info"></div>
        <div role="tabpanel" class="tab-pane fade" id="tab-transaction-info"></div>
        <div role="tabpanel" class="tab-pane fade" id="tab-chat-info"></div>
        <div role="tabpanel" class="tab-pane fade" id="tab-address-info"></div>
        <div role="tabpanel" class="tab-pane fade" id="tab-time-info"></div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $(".upload").change(function () {
            if (typeof FileReader == 'function') {
                showCropBox(this);
            } else {
                $("#profile-image-form").submit();
            }
        });
        $("#profile_image").change(function () {
            $("#profile-image-form").submit();
        });


        $("#profile-image-form").appForm({
            isModal: false,
            beforeAjaxSubmit: function (data) {
                $.each(data, function (index, obj) {
                    if (obj.name === "profile_image") {
                        var profile_image = replaceAll(":", "~", data[index]["value"]);
                        data[index]["value"] = profile_image;
                    }
                });
            },
            onSuccess: function (result) {
                if (typeof FileReader == 'function') {
                    appAlert.success(result.message, {duration: 10000});
                } else {
                    location.reload();
                }
            }
        });

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