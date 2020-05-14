<div class="col col-4 offset-4">
    <div class="card">
        <div class="row inverse">
            <div class="col col-12">
                <?php echo form_open("signin/send_reset_password_mail", array("id" => "request-password-form", "class" => "general-form", "role" => "form")); ?>
				  <div class="group">
                    <label for="mobile" class="label">شماره موبایل</label>
                    <input id="mobile" name="mobile" type="text" dir="ltr" class="input">
                  </div>
				  <button class="button btn-success btn-full btn-primary" type="submit">بازیابی کلمه عبور</button>
                <?php echo form_close(); ?>
				<br>
                <br> <a href="/signin" class="">حساب کاربری دارید؟ وارد شوید</a></div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#request-password-form").appForm({
            isModal: false,
            onSubmit: function () {
                appLoader.show();
                $("#request-password-form").find('[type="submit"]').attr('disabled', 'disabled');
            },
            onSuccess: function (result) {
                appLoader.hide();
                appAlert.success(result.message, {container: '.panel-body', animate: false});
                $("#request-password-form").remove();
            },
            onError: function (result) {
                $("#request-password-form").find('[type="submit"]').removeAttr('disabled');
                appLoader.hide();
                appAlert.error(result.message, {container: '.panel-body', animate: false});
                return false;
            }
        });
    });
</script>