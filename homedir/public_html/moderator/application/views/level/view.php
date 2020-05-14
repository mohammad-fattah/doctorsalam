<?php $this->load->view("includes/cropbox"); ?>
<style>.general-form.white label{float:right}</style>
<div id="page-content" class="p220 clearfix">
    <div class="page-title clearfix no-border bg-off-white" style="margin-bottom:10px">
      <h1>
        جزئیات پذیرنده - <?php echo $user_info->first_name.' '.$user_info->last_name; ?>  
      </h1>
    </div>

    <ul data-toggle="ajax-tab" class="nav nav-tabs" role="tablist">

        <?php if ($show_general_info) { ?>
            <li><a  role="presentation" href="<?php echo_uri("merchant/general_info/" . $user_info->id); ?>" data-target="#tab-general-info">مشخصات پذیرنده</a></li>
        <?php } ?>

        <?php if ($show_job_info) { ?>
            <li><a  role="presentation" href="<?php echo_uri("merchant/job_info/" . $user_info->id); ?>" data-target="#tab-job-info"> <?php echo lang('job_info'); ?></a></li>
        <?php } ?>
        <li><a role="presentation" href="<?php echo_uri("merchant/terminals_info/" . $user_info->id); ?>" data-target="#tab-terminals-info">ترمینال ها</a></li>
		<!--<li><a role="presentation" href="<?php echo_uri("merchant/projects_info/" . $user_info->id); ?>" data-target="#tab-projects-info">تسهیم</a></li>-->
        <?php if ($show_account_settings) { ?>
            <li><a role="presentation" href="<?php echo_uri("merchant/account_settings/" . $user_info->id); ?>" data-target="#tab-account-settings"> <?php echo lang('account_settings'); ?></a></li>
        <?php } ?>

        <?php if ($show_projects) { ?>
            <li><a role="presentation" href="<?php echo_uri("merchant/cash_info/" . $user_info->id); ?>" data-target="#tab-cash-info">تراکنش های نقدی</a></li>
			<li><a role="presentation" href="<?php echo_uri("merchant/credit_info/" . $user_info->id); ?>" data-target="#tab-credit-info">تراکنش های اقساطی</a></li>
        <?php } ?>  
		<li><a role="presentation" href="<?php echo_uri("merchant/product_info/" . $user_info->id); ?>" data-target="#tab-product-info">فروشگاه آنلاین</a></li>
		<!--<li><a role="presentation" href="<?php echo_uri("merchant/projects_info/" . $user_info->id); ?>" data-target="#tab-projects-info">نظرات اعضا</a></li>-->
    </ul>

    <div class="tab-content" style="background-color:#fff">
        <div role="tabpanel" class="tab-pane fade active pl15 pr15 mb15" id="tab-timeline">
            <?php timeline_widget(array("limit" => 20, "offset" => 0, "is_first_load" => true, "user_id" => $user_info->id)); ?>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="tab-general-info"></div>
        <div role="tabpanel" class="tab-pane fade" id="tab-product-info"></div>
        <div role="tabpanel" class="tab-pane fade" id="tab-job-info"></div>
        <div role="tabpanel" class="tab-pane fade" id="tab-terminals-info"></div>
        <div role="tabpanel" class="tab-pane fade" id="tab-account-settings"></div>
        <div role="tabpanel" class="tab-pane fade" id="tab-projects-info"></div>
        <div role="tabpanel" class="tab-pane fade" id="tab-cash-info"></div>
        <div role="tabpanel" class="tab-pane fade" id="tab-credit-info"></div>
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