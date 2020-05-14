<h4><i class="fa fa-wrench"></i> <?php echo lang("app_settings"); ?></h4>
<ul class="nav nav-tabs vertical" role="tablist" style="height:600px">
    <li role="presentation" class="<?php echo ($active_tab == 'roles') ? 'active' : ''; ?>"><a href="<?php echo_uri("roles"); ?>"><?php echo lang("roles"); ?></a></li>
    <li role="presentation" class="<?php echo ($active_tab == 'category') ? 'active' : ''; ?>"><a href="<?php echo_uri("merchant_category"); ?>">دسته</a></li>
</ul>