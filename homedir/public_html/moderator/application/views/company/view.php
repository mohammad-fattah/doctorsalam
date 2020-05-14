<?php $this->load->view("includes/cropbox"); ?>

<div id="page-content" class="p220 clearfix">
    <?php $this->load->view("company/profile_image_section"); ?>

    <ul data-toggle="ajax-tab" class="nav nav-tabs" role="tablist" style="display:flex;justify-content: space-between;">
       <li>
	    <a role="presentation" href="<?php echo_uri("company/general_info/".$info->id); ?>" data-target="#tab-general-info"><?php echo $info->name; ?></a>
	   </li>
    </ul>

    <div class="tab-content" style="background-color:#fff">
        
        <div role="tabpanel" class="tab-pane fade" id="tab-general-info"></div>
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