<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="fa fa-cog"></span>
        </button>
        <button id="sidebar-toggle" type="button" class="navbar-toggle"  data-target="#sidebar">
            <span class="sr-only">Toggle navigation</span>
            <span class="fa fa-bars"></span>
        </button>
        <a class="navbar-brand" style="font-size:12px;line-height:3" href="<?php echo_uri('dashboard'); ?>">سلام , <?php echo $this->login_user->first_name . " " . $this->login_user->last_name; ?> عزیز خوش آمدید</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
		    <?php if($this->login_user->user_type == 'staff'): ?>
		    <li class="pr15" style="padding:15px"><span style="float:left;padding:0 8px">بسته</span><div class="togglebutton" style="margin:0;float:left"><label><input class="website_status more" type="checkbox" <?php if(get_setting("website_status")=='on'): ?> name="on" checked="" <?php else: ?> name="off" <?php endif; ?>onclick="status_on_off('website_status')"><span class="toggle"></span></label></div><span style="float:left;padding:0 5px">باز</span></li>
			<?php endif; ?>
            <li class="pr15"><a href="<?php echo_uri('signin/sign_out'); ?>"><i class="fa fa-power-off mr10"></i></a></li>
        </ul>
    </div>
</nav>

<script type="text/javascript">
	function vaziatonoff(){
	  var switcher=$('.vaziatonoff').attr('name')
      if(switcher == 'off'){
	    $('.vaziatonoff').attr('name','on')
		$.ajax({
			type:'post',
			data:'status=on',
			url:'/api/v1/settings/website_status.php',
			success:function(msg){
			}
		})
      }else{ 
	    $('.vaziatonoff').attr('name','off')
		$.ajax({
			type:'post',
			data:'status=off',
			url:'/api/v1/settings/website_status.php',
			success:function(msg){
			}
		})
      }
	}
	function status_on_off(page){
	  var switcher=$('.'+page).attr('name')
      if(switcher == 'off'){
	    $('.'+page).attr('name','on')
		$.ajax({
			type:'post',
			data:'status=on&website_status='+page,
			url:'/api/v1/settings/website_status.php',
			success:function(msg){
			}
		})
      }else{ 
	    $('.'+page).attr('name','off')
		$.ajax({
			type:'post',
			data:'status=off&website_status='+page,
			url:'/api/v1/settings/website_status.php',
			success:function(msg){
			}
		})
      }
	}
</script>