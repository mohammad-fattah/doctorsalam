<?php $this->load->view("includes/cropbox"); ?>
<div id="page-content" class="p220 clearfix">
    <?php $this->load->view("clinic/profile_image_section"); ?>
    <div class="page-title clearfix no-border bg-off-white" style="margin:10px 0">
      <div class="row" style="text-align:center">
	      <div class="col-md-12">
			<h1 style="text-align:center;width:100%">
		     <?php echo $user_info->first_name.' '.$user_info->last_name; ?>  
			</h1>
		  </div>
	  </div>
    </div>

    <ul data-toggle="ajax-tab" class="nav nav-tabs" role="tablist" style="justify-content:start;display:flex">
       <li><a  role="presentation" href="<?php echo_uri("clinic/general_info/".$user_key); ?>" data-target="#tab-general-info">مشخصات مرکز</a></li>
       <li><a role="presentation" href="<?php echo_uri("clinic/doctor/" . $user_key); ?>" data-target="#tab-doctor-info">پزشکان</a></li>
    </ul>

    <div class="tab-content" style="background-color:#fff">
        
        <div role="tabpanel" class="tab-pane fade" id="tab-general-info"></div>
        <div role="tabpanel" class="tab-pane fade" id="tab-doctor-info"></div>
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