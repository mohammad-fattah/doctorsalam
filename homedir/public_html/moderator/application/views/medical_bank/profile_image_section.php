<div class="box">
    <div class="box-content w200 text-center profile-image">
        <?php
        $url = "clients";

        //set url
        if ($user_info->user_type === "client") {
            $url = "clients";
        }
        echo form_open(get_uri($url . "/save_profile_image/" . $user_info->id), array("id" => "profile-image-form", "class" => "general-form", "role" => "form"));
        ?>
        <?php if ($this->login_user->is_admin || $user_info->id === $this->login_user->id) { ?>
            <div class="file-upload btn mt0 p0" style="vertical-align: top;  margin-left: -50px;background-color:#fff">
                <span><i class="btn fa fa-camera" ></i></span> 
                <input id="profile_image_file" class="upload" name="profile_image_file" type="file" data-height="200" data-width="200" data-preview-container="#profile-image-preview" data-input-field="#profile_image" />
            </div>
            <input type="hidden" id="profile_image" name="profile_image" value=""  />
        <?php } ?>
        <span class="avatar avatar-lg"><img id="profile-image-preview" src="<?php echo get_avatar($user_info->image); ?>" alt="..."></span>
        <?php echo form_close(); ?>
    </div> 
</div>