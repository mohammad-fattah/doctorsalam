<div class="box" style="margin-bottom:20px">
    <div class="box-content w200 text-center profile-image">
        <?php
        $url = "company";
        echo form_open(get_uri($url . "/save_profile_image/".$info->id), array("id" => "profile-image-form", "class" => "general-form", "role" => "form"));
        ?>
            <div class="file-upload btn mt0 p0" style="vertical-align: top;  margin-left: -50px;background-color:#fff">
                <span><i class="btn fa fa-camera" ></i></span> 
                <input id="profile_image_file" class="upload" name="profile_image_file" type="file" data-height="200" data-width="200" data-preview-container="#profile-image-preview" data-input-field="#profile_image" />
            </div>
            <input type="hidden" id="profile_image" name="profile_image" value=""  />
        <span class="avatar avatar-lg"><img id="profile-image-preview" style="border-radius:0" src="<?php echo $info->logo; ?>" alt="..."></span>
        <?php echo form_close(); ?>
    </div>
</div>