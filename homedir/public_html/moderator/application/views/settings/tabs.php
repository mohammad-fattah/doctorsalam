<h4 style="padding-bottom: 10px; border-bottom: 1px solid #6bd0dc; color: #fff;"><i class="fa fa-wrench"></i> <?php echo lang("app_settings"); ?></h4>
<ul class="nav nav-tabs vertical" role="tablist">
    <li role="presentation" class="<?php echo ($active_tab == 'general') ? 'active' : ''; ?>"><a href="<?php echo_uri("settings/general"); ?>"><?php echo lang("general"); ?></a></li>
    <li role="presentation" class="<?php echo ($active_tab == 'email') ? 'active' : ''; ?>"><a href="<?php echo_uri("settings/email"); ?>"><?php echo lang("email"); ?></a></li>
    <!--<li role="presentation" class="<?php echo ($active_tab == 'roles') ? 'active' : ''; ?>"><a href="<?php echo_uri("roles"); ?>"><?php echo lang("roles"); ?></a></li>-->
    <li role="presentation" class="<?php echo ($active_tab == 'ip_restriction') ? 'active' : ''; ?>"><a href="<?php echo_uri("settings/ip_restriction"); ?>"><?php echo lang("ip_restriction"); ?></a></li>
    
	
    <!--<li role="presentation" class="<?php echo ($active_tab == 'payment_methods') ? 'active' : ''; ?>"><a href="<?php echo_uri("payment_methods"); ?>"><?php echo lang("payment_methods"); ?></a></li>
    <li role="presentation" class="<?php echo ($active_tab == 'modules') ? 'active' : ''; ?>"><a href="<?php echo_uri("settings/modules"); ?>"><?php echo lang("modules"); ?></a></li>-->
    
</ul>