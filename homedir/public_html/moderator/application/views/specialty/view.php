<?php $this->load->view("includes/cropbox"); ?>

<div id="page-content" class="p220 clearfix">
    <?php $this->load->view("specialty/profile_image_section"); ?>
    <div class="page-title clearfix no-border bg-off-white" style="margin-bottom:10px">
      <div class="row">
	      <div class="col-md-12" style="text-align:center;padding:20px">
			آیکون تخصص
		  </div>
		  
	  </div>
    </div>

    <ul data-toggle="ajax-tab" class="nav nav-tabs" role="tablist" style="display:flex;">
       <li>
	    <a role="presentation" href="<?php echo_uri("specialty/general_info/".$id); ?>" data-target="#tab-general-info">مشخصات تخصص</a>
	   </li>
       <li>
	    <a role="presentation" href="<?php echo_uri("specialty/insurance_parameter/".$id); ?>" data-target="#tab-param-info">زیر تخصص</a>
	   </li>
    </ul>

    <div class="tab-content" style="background-color:#fff">
        
        <div role="tabpanel" class="tab-pane fade" id="tab-general-info"></div>
        <div role="tabpanel" class="tab-pane fade" id="tab-param-info"></div>
        <div role="tabpanel" class="tab-pane fade" id="tab-document-info"></div>
        <div role="tabpanel" class="tab-pane fade" id="tab-price-info"></div>
        <div role="tabpanel" class="tab-pane fade" id="tab-payment-info"></div>
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

    });
</script>