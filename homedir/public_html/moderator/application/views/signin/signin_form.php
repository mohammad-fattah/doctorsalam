<div class="col col-4 offset-4">
 <div class="card has-back">
  <div class="row inverse">
   <?php echo form_open("signin", array("id" => "signin-form", "class" => "general-form", "role" => "form")); ?>
    <div class="col col-12" style="border:none">
        <div id="login" style="padding-top:20px">
		    <input type="hidden" value="<?php echo $_GET['redirect']; ?>" name="redirect" />
            <div class="group">
                <label for="username" class="label"><?php echo lang('phone'); ?></label>
                <?php
            echo form_input(array(
                "id" => "email",
                "name" => "email",
                "class" => "input",
                "placeholder" => lang('phone'),
                "autofocus" => true,
                "data-rule-required" => false,
                "data-msg-required" => lang("field_required"),
            ));
            ?>
            </div>
            <div class="group">
                <label for="password" class="label">رمز عبور</label>
                <?php
            echo form_password(array(
                "id" => "password",
                "name" => "password",
                "class" => "input",
                "placeholder" => lang('password'),
                "data-rule-required" => true,
                "data-msg-required" => lang("field_required")
            ));
            ?>
            </div>
            <div class="group">
                <button type="submit" name="submit" class="button button-success"><span>ورود به حساب</span></button>
            </div>
			
			<?php if (validation_errors()) { ?>
			    
                <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <?php echo validation_errors(); ?>
                </div>
            <?php } ?>
            
        </div>
    </div>
    <?php echo form_close(); ?>
       </div>
      </div>
     </div>                                       