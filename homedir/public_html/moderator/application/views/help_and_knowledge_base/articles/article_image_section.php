<div class="box">
    <div class="box-content w200 text-center profile-image">
        <h3>آپلود تصویر شاخص</h3>

        <?php
        $url = "help";
        echo form_open(get_uri($url . "/save_article/" . $model_info->id), array("id" => "article-image-form", "class" => "general-form", "role" => "form"));
        ?>
        <?php if ($this->login_user->is_admin || $user_info->id === $this->login_user->id) { ?>
            <div class="file-upload btn mt0 p0" style="vertical-align: top;  margin-left: -50px;background-color:#fff">
                <span><i class="btn fa fa-camera" ></i></span> 
                <input id="article_image_file" class="upload" name="article_image_file" type="file" data-height="353" data-width="500" data-preview-container="#article-image-preview" data-input-field="#article_image" />
            </div>
            <input type="hidden" id="article_image" name="article_image" value=""  />
        <?php } ?>

        <span class="articleUploadImage articleUploadImage-lg">
            <?php $article_image_preview = get_article_avatar($user_info->image); ?>
            <img id="article-image-preview"  alt="..." src="<?php 
                    if($_FILE){
                        $articleImageUrl = site_url('files/article_image/').$this->upload->data('file_name');
                    }?>" onerror="this.src='<?php echo get_article_avatar($user_info->image); ?>';">
        </span>        
        <?php echo form_close(); ?>
    </div> 
</div>