<div class="navbar-right">
    <ul class="nav navbar-nav outline-nav mt-15">
        <li>
            <a class="btn btn-flat btn-xs navbar-btn btn-pliro-secondary border-pliro-secondary" onclick="OpenModalChat()">
                <i class="icon-users2 position-left"></i>مشاوره پزشکی</a>
        </li>
		<?php if(!$username): ?>
        <li>
            <a class=" btn btn-flat btn-xs navbar-btn btn-pliro border-pliro" href="javascript:;" onclick="OpenmodalLogin('/')">
                <i class="icon-user-check position-left"></i>ورود / عضویت</a>
        </li>
		<?php else: ?>
		<li style="height: 50px; display: flex; justify-content: center; align-items: center;padding-left:10px">
		  <a onclick="javascript:" style="cursor:pointer;float:left;font-size:12px;padding:0" class="hidden-sm">
             <?php echo $first_name_user.' '.$last_name_user; ?>
          </a>
		  <a href="/logout" style="text-decoration:none;font-size:12px;float:left;padding-right:5px" class="hidden-sm">(خروج)</a>
		  <span style="width:0px;float:left;padding:0 5px" class="hidden-sm">|</span>
		  <a href="/profile" style="cursor:pointer;float:left;font-size:12px;padding-right:5px" class="hidden-sm">ناحیه کاربری</a>
		</li>
        <?php endif; ?>

    </ul>
</div>
<script>
    function OpenmodalLogin(ref) {
        $('#divlogin').css('display', 'flex')
        $('#RefLogin').val(ref)
    }
	function OpenModalChat(){
		$('#modal-chat').css('display', 'block')
	}
	function CloseModalChat(){
		$('#modal-chat').css('display', 'none')
	}
</script>
<div class="navbar-right mt-15" style="float:right !important">
    <ul class="nav navbar-nav text-bold">
        <li>
            <a class="text-white" href="/contact">
                <i class="icon-make-group visible-sm"></i>
                <span class="hidden-sm">تماس با ما</span>
            </a>
        </li>
        <li>
            <a class="text-white" href="/about">
                <i class="icon-make-group visible-sm"></i>
                <span class="hidden-sm">درباره <?php echo $site_name; ?></span>
            </a>
        </li>
        <li>
            <a class="text-white" href="/search/clinic">
                <i class="icon-lab visible-sm"></i>
                <span class="hidden-sm">مراکز پزشکی</span>
            </a>
        </li>
        <li>
            <a class="text-white" href="/search/doctor">
                <i class="icon-question4 visible-sm"></i>
                <span class="hidden-sm">پزشکان</span>
            </a>
        </li>
		<li>
            <a class="text-white" href="/">
                <i class="icon-question4 visible-sm"></i>
                <span class="hidden-sm">صفحه نخست</span>
            </a>
        </li>
    </ul>
</div>