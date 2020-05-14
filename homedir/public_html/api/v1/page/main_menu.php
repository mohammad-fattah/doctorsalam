<style>@media (max-width: 767px){.logo12 img{height:28px!important}.logo12{margin-top:15px!important}}</style>
<div style="width:100%;height:80px">
    <div class="container">
        <ul >
            <li class="logo12" style="float:right;list-style:none;margin-top:5px"><a href="/"><img src="<?php echo $site_logo; ?>" style="height:55px" alt=""></a></li>
            <li style="float:left;margin-left:0px;top:5px;min-height: 40px;display: inline-block;text-align: center;width:auto;border-radius: 5px;height:40px;position:absolute;left:0">
                <div class="small-when-mobile call-link">
                    <div style="float: left;line-height:30px">
                        <svg class="cal-svg" xmlns="http://www.w3.org/2000/svg" width="30" height="34" style="padding-top: 7px">
                            <path fill="#ffffff" fill-rule="evenodd" d="M16 22.621l-3.521-6.795c-.007.004-1.974.97-2.064 1.011-2.24 1.086-6.799-7.82-4.609-8.994l2.082-1.026-3.492-6.817-2.106 1.039c-1.639.855-2.313 2.666-2.289 4.916.075 6.948 6.809 18.071 12.309 18.045.541-.003 1.07-.113 1.58-.346.121-.055 2.102-1.029 2.11-1.033zm-2.5-13.621c.828 0 1.5.672 1.5 1.5s-.672 1.5-1.5 1.5-1.5-.672-1.5-1.5.672-1.5 1.5-1.5zm9 0c.828 0 1.5.672 1.5 1.5s-.672 1.5-1.5 1.5-1.5-.672-1.5-1.5.672-1.5 1.5-1.5zm-4.5 0c.828 0 1.5.672 1.5 1.5s-.672 1.5-1.5 1.5-1.5-.672-1.5-1.5.672-1.5 1.5-1.5z"></path>
                        </svg>
                    </div>
                    <div style="float: right; padding-top:4px;line-height:30px">
                        <a href="tel:<?php echo $phone_site;  ?>" style="color:#fff"><span id="remove-in-mini-mobile" style="padding-left: 10px;">مشاوره</span><span><?php echo $phone_site;  ?></span></a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<script>
    function OpenmodalLogin(ref) {
        $('#divlogin').css('display', 'flex')
        $('#RefLogin').val(ref)
    }
</script>
<div class="main_menu">
    <div class="container" style="padding:0 15px">
        <ul>
            <li><a href="/">صفحه نخست</a></li>
            <?php echo $topmenu; ?>
                <!--<li><a href="/companies">شرکت های بیمه</a></li>-->
                <li><a href="/club">باشگاه مشتریان</a></li>
                <li><a href="/about">درباره ما</a></li>
                <li><a href="/contact">تماس با ما</a></li>
                <span id="userinfo">
                 <?php if(!$username): ?>
				 <li style="float:left;margin:0px;padding:0;top:10px;font-size: 14px;min-height: 40px;display: inline-block;text-decoration: none;line-height: 40px;text-align: center;">
                    <a href="javascript:;" onclick="OpenmodalLogin('/')" style="color:#0f2d63;cursor:pointer;font-weight:100">ورود | عضویت</a>
                 </li>
				 <?php else: ?>
				  <a href="/panel" style="cursor:pointer;float:left;font-size:12px;color:#333;padding-right:5px">ناحیه کاربری</a><span style="width:0px;float:left;color:#333;padding:0 5px">|</span><a href="/logout" style="text-decoration:none;font-size:12px;float:left;color:#333;padding-right:5px">(خروج)</a>
                <a onclick="javascript:" style="cursor:pointer;float:left;color:#333;font-size:12px;padding:0">
                    <?php echo $first_name.' '.$last_name; ?>
                </a>
                <?php endif; ?>
                    </span>
        </ul>
    </div>
    <div class="button btnMobile">
        <ul class="navAul">
            <li><a href="/">صفحه نخست</a></li>
            <?php echo $c; ?>
            <li><a href="/club">باشگاه مشتریان</a></li>
            <li><a href="/about">درباره ما</a></li>
            <li><a href="/contact">تماس با ما</a></li>
        </ul>
    </div>

</div>