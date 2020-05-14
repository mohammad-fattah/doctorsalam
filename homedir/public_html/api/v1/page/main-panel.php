<div class="ant-row" >
    <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24 ant-col-lg-6">
        <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24">
            <form class="ant-form ant-form-vertical">
                <div class="ant-collapse" style="box-shadow: 0 6px 8px 0 hsla(0,0%,64.3%,.21);border-style: none;">
                    <div class="ant-collapse-item ant-collapse-item-active" role="tablist">
                        <div class="ant-collapse-header" role="tab" aria-expanded="true">اطلاعات پروفایل کاربری</div>
                        <div class="ant-collapse-content ant-collapse-content-active">
                            <div class="ant-collapse-content-box">
                                <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24" style="padding-bottom:20px">
                                    <div class="menuright">
                                        <ul class="ant-menu ant-menu-dark ant-menu-root ant-menu-inline" tabindex="0" style="width: 256px;">
                                            <li class="ant-menu-item ant-menu-item-selected" onclick="javascript:$('.myinfo').css('display','none');$('.ant-menu-item').removeClass('ant-menu-item-selected');$('.personalinfo').css('display','block');$(this).addClass('ant-menu-item-selected');" style="padding-left: 24px;"><i class="anticon anticon-user"></i>مشخصات فردی</li>
                                            <li class="ant-menu-item" onclick="javascript:$('.myinfo').css('display','none');$('.ant-menu-item').removeClass('ant-menu-item-selected');$('.my-purchased-insurances').css('display','block');$(this).addClass('ant-menu-item-selected');" style="padding-left: 24px;"><i class="anticon anticon-shopping-cart"></i> سفارش های من</li>
                                            <li class="ant-menu-item" onclick="javascript:$('.myinfo').css('display','none');$('.ant-menu-item').removeClass('ant-menu-item-selected');$('.reminder').css('display','block');$(this).addClass('ant-menu-item-selected');" style="padding-left: 24px;"><i class="anticon anticon-bell"></i>یادآورهای ثبت شده </li>
                                            <li class="ant-menu-item addbrokerli" onclick="javascript:$('.myinfo').css('display','none');$('.ant-menu-item').removeClass('ant-menu-item-selected');$('.addbroker').css('display','block');$(this).addClass('ant-menu-item-selected');" style="padding-left: 24px;display:none"><i class="lnr lnr-diamond" style="margin-left: 10px;"></i>درخواست بازاریابی </li>
                                            <li class="ant-menu-item moarefli" onclick="javascript:$('.myinfo').css('display','none');$('.ant-menu-item').removeClass('ant-menu-item-selected');$('.moaref').css('display','block');$(this).addClass('ant-menu-item-selected');" style="padding-left: 24px;display:none"><i class="lnr lnr-diamond" style="margin-left: 10px;"></i>معرفی و کسب درآمد </li>
                                            <li class="ant-menu-item bonli" onclick="javascript:$('.myinfo').css('display','none');$('.ant-menu-item').removeClass('ant-menu-item-selected');$('.bon').css('display','block');$(this).addClass('ant-menu-item-selected');" style="padding-left: 24px;display:none"><i class="anticon anticon-wallet"></i> درآمد و بن های خرید </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>

	<div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24 ant-col-lg-18" style="opacity: 1;">
        <div>
            <div class="sortBox">
                <div class="ant-row">
                    <div class="ant-col-offset-12 ant-col-xs-12 ant-col-sm-24" style="float:left!important;margin-left:0;margin-top:20px;text-align:center">
                        <section class="myinfo personalinfo" style="display:block;margin-top: 20px;">
                            <div class="righti">
                                <p style="font-weight:bold;text-align:right;font-size:16px">مشخصات فردی</p>
                                <form class="user-form" id="reciverForm" method="post" action="javascript:" style="direction:rtl;font-size:12px;text-align:right;line-height:30px">
                                    <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-12">
                                        نام :
                                        <input class="form-control bb-select" type="text" name="name" id="namei" style="height:50px" placeholder="نام" tabindex="1" autofocus value="<?php echo $first_name; ?>">
                                    </div>
                                    <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-12">
                                        نام خانوادگی :
                                        <input class="form-control bb-select" type="text" name="famel" id="famel" style="height:50px" placeholder="نام خانوادگی" tabindex="1" autofocus value="<?php echo $last_name; ?>">
                                    </div>
                                    <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-12">
                                        تاریخ تولد :
                                        <input class="form-control bb-select " type="text" name="birthday" id="birthday" style="height:50px" placeholder="تاریخ تولد" tabindex="2" autofocus value="<?php echo $birthday_user; ?>">
                                    </div>
                                    <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-12">
                                        شماره تلفن همراه :
                                        <input class="form-control bb-select" type="text" name="cellphone" id="cellphone" style="height:50px" placeholder="شماره تلفن همراه" maxLength="12" disabled value="<?php echo $phone_user; ?>">
                                    </div>
									<div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-12">
                                        کد ملی :
                                        <input class="form-control bb-select" type="text" name="melli_code" id="melli_code" style="height:50px" placeholder="کد ملی" maxLength="10" value="<?php echo $melli_code; ?>">
                                    </div>
                                    <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-12">
                                        ایمیل :
                                        <input class="form-control bb-select" type="text" name="email" id="email" style="height:50px" placeholder="ایمیل" tabindex="4" value="<?php echo $email_user; ?>">
                                    </div>
                                    <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-12">
                                        کد پستی :
                                        <input class="form-control bb-select" type="text" name="postalcode" id="postalcode" style="height:50px" placeholder="کد پستی" maxLength="10" value="<?php echo $postalcode_user; ?>">
                                    </div>
                                    <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-12">
                                        شغل :
                                        <input class="form-control bb-select" type="text" name="job" id="job" style="height:50px" placeholder="شغل" tabindex="4" value="<?php echo $job_user; ?>">
                                    </div>
                                    <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-12">
                                        استان محل سکونت :
                                        <select class="form-control bb-select" type="text" name="state" id="state" style="height:50px" placeholder="استان" tabindex="5">
                                            <option value="<?php echo $state_user; ?>">
                                                <?php echo $state_user; ?>
                                            </option>
                                            <option>تهران</option>
                                            <option>گیلان</option>
                                            <option>آذربایجان شرقی</option>
                                            <option>خوزستان</option>
                                            <option>فارس</option>
                                            <option>اصفهان</option>
                                            <option>خراسان رضوی</option>
                                            <option>قزوین</option>
                                            <option>سمنان</option>
                                            <option>قم</option>
                                            <option>مرکزی</option>
                                            <option>زنجان</option>
                                            <option>مازندران</option>
                                            <option>گلستان</option>
                                            <option>اردبیل</option>
                                            <option>آذربایجان غربی</option>
                                            <option>همدان</option>
                                            <option>کردستان</option>
                                            <option>کرمانشاه</option>
                                            <option>لرستان</option>
                                            <option>بوشهر</option>
                                            <option>کرمان</option>
                                            <option>هرمزگان</option>
                                            <option>چهارمحال و بختیاری</option>
                                            <option>یزد</option>
                                            <option>سیستان و بلوچستان</option>
                                            <option>ایلام</option>
                                            <option>کهگلویه و بویراحمد</option>
                                            <option>خراسان شمالی</option>
                                            <option>خراسان جنوبی</option>
                                            <option>البرز</option>
                                        </select>
                                    </div>
                                    <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24">
                                        آدرس :
                                        <input class="form-control bb-select" type="text" name="address" id="address" style="height:50px" placeholder="آدرس" tabindex="6" value="<?php echo $address_user; ?>">
                                    </div>
                                    <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-6">
                                        <input type="submit" class="ant-btn btn-order-new ant-btn-lg banki" style="line-height:5px;height:45px" onclick="edit()" value="ویرایش" tabindex="7">
                                    </div>
                            </div>
                            </form>
                        </section>
                        <section class="myinfo my-purchased-insurances" style="display:none;margin:0 5px">
                            <div class="report-info-table table-orderinfo">
                                <table class="report-info-table">
                                    <tbody id="sellbime">

                                    </tbody>
                                </table>
                            </div>
                        </section>
                        <section class="myinfo incomplete-insurances" style="display:none;margin:0 5px">
                            <div class="wrapper" style="padding:0;height:40px;padding-top:10px;background:#fff;-webkit-box-shadow: 0 1px 2px 0 rgba(0,0,0,.1);margin: 5px 0;">
                                <a href=""></a>
                            </div>
                            <div class="wrapper" style="padding:0;height:40px;padding-top:10px;background:#fff;-webkit-box-shadow: 0 1px 2px 0 rgba(0,0,0,.1);margin: 5px 0;">

                                <div class="lessons">
                                    <div class="lesson locked content" style="max-width:100%">
                                        <div class="video-thumb" style="top:5px">
                                            <h3 style="text-align:right;font-size:14px;direction:rtl;margin-right:10px">
										  <div class="tooltip tooltip--gram" data-type="gram">
							               <div class="tooltip__trigger" role="tooltip" aria-describedby="info-gram">
								            <span class="tooltip__trigger-text" style="text-align:center">شرکت بیمه</span>
							               </div>
						                  </div>
									    </h3>
                                        </div>
                                        <div class="tarif">
                                            <h3 style="text-align:center;font-size:14px;direction:rtl">
										  <div class="tooltip tooltip--gram" data-type="gram">
							               <div class="tooltip__trigger" role="tooltip" aria-describedby="info-gram">
								            <span class="tooltip__trigger-text" style="text-align:center">نوع بیمه</span>
							               </div>
						                  </div>
									    </h3>
                                        </div>
                                        <div class="stari">
                                            <h3 style="text-align:center;font-size:14px;direction:rtl">
										  <div class="tooltip tooltip--gram" data-type="gram">
							               <div class="tooltip__trigger" role="tooltip" aria-describedby="info-gram">
								            <span class="tooltip__trigger-text" style="text-align:center">عنوان
											</span>
							               </div>
						                  </div>
									    </h3>
                                        </div>
                                        <div class="claim">
                                            <h3 style="text-align:center;font-size:14px;direction:rtl">
										  <div class="tooltip tooltip--gram" data-type="gram">
							               <div class="tooltip__trigger" role="tooltip" aria-describedby="info-gram">
								            <span class="tooltip__trigger-text" style="text-align:center">قیمت
											</span>
							               </div>
						                  </div>
										 </h3>
                                        </div>
                                        <div class="branches">
                                            <h3 style="text-align:center;font-size:14px;direction:rtl">
										  <div class="tooltip tooltip--gram" data-type="gram">
							               <div class="tooltip__trigger" role="tooltip" aria-describedby="info-gram">
								            <span class="tooltip__trigger-text" style="text-align:center">وضعیت
											</span>
							               </div>
						                  </div>
									    </h3>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div id="orderbime" style="width:100%">
                                <!------->
                                <!------->
                            </div>
                        </section>
                        <section class="myinfo reminder" style="display:none;margin:0 5px">
                            <div class="info-content">
                                <h1 class="title">یادآوری های ثبت شده</h1>
                                <div class="ant-row" style="margin-bottom: 10px;">

                                </div>
                                <div class="report-info-table table-orderinfo">
                                    <table class="report-info-table">
                                        <tbody id="rememberbime">

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </section>
                        <section class="myinfo addbroker" style="display:none;margin:0 5px">
                            <div class="info-content" style="padding-bottom:20px">
                                <h1 class="title">درخواست بازاریابی</h1>
                                <div class="report-info-table" style="text-align:right">
                                    <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24">با هر دعوت از دوستان 10,000 تومان درآمد کسب کنید. با به اشتراک گذاشتن لینک زیر، 15,000 تومان اعتبار خرید به دوستانی که تا حالا از
                                        <?php echo $site_name; ?> خرید نکرده&zwnj;اند، هدیه بدهید. به ازای هر یک از دوستان شما که از طریق این لینک ثبت نام و سفارش بیمه ثالث خود را ثبت کنند، 10,000 تومان به درآمد شما افزوده می شود. شما می توانید درآمد خود را نقدا دریافت کنید یا با 5 درصد اعتبار هدیه بیشتر از
                                            <?php echo $site_name; ?> بیمه سفارش دهید.
                                                <br>در صورتیکه موعد تمدید بیمه دوستان شما نرسیده، با ثبت یادآور توسط آن&zwnj;ها، اعتبار به حساب شما و شخص معرفی شده اضافه می&zwnj;شود و در صورت خرید، این اعتبار برای شما فعال شده و قابل استفاده می&zwnj;شود.</div>
                                    <div>
                                        <div>برای مشاهده لینک معرفی خود ابتدا از قسمت اطلاعات فردی نسبت به کامل کردن اطلاعات مورد نیاز اقدام فرمایید.</div>
                                        <div> </div>
                                    </div>
                                </div>
                            </div>

                            <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24">
                                <div class="ant-row-flex ant-row-flex-space-around ant-row-flex-middle">
                                    <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24" style="margin-top: 10px; margin-bottom: 10px;">
                                        <div class="socialshare">
                                            <div class="ant-row referral-linkbox">
                                                <div>لینک معرفی:
                                                    <div class="referral-link"><a id="refref">......</a></div>
                                                </div>
                                                <button type="button" onclick="addbroker()" class="ant-btn ant-btn-primary"><span>درخواست بازاریابی</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </section>
                        <section class="myinfo moaref" style="display:none;margin:0 5px">
                            <div class="info-content" style="padding-bottom:20px">
                                <h1 class="title">چطوری با <?php echo $site_name; ?> کسب درآمد کنیم؟</h1>
                                <div class="report-info-table" style="text-align:right">
                                    <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24">با هر دعوت از دوستان 10,000 تومان درآمد کسب کنید. با به اشتراک گذاشتن لینک زیر، 15,000 تومان اعتبار خرید به دوستانی که تا حالا از
                                        <?php echo $site_name; ?> خرید نکرده&zwnj;اند، هدیه بدهید. به ازای هر یک از دوستان شما که از طریق این لینک ثبت نام و سفارش بیمه ثالث خود را ثبت کنند، 10,000 تومان به درآمد شما افزوده می شود. شما می توانید درآمد خود را نقدا دریافت کنید یا با 5 درصد اعتبار هدیه بیشتر از
                                            <?php echo $site_name; ?> بیمه سفارش دهید.
                                                <br>در صورتیکه موعد تمدید بیمه دوستان شما نرسیده، با ثبت یادآور توسط آن&zwnj;ها، اعتبار به حساب شما و شخص معرفی شده اضافه می&zwnj;شود و در صورت خرید، این اعتبار برای شما فعال شده و قابل استفاده می&zwnj;شود.</div>
                                    <div>
                                        <div>برای مشاهده لینک معرفی خود ابتدا از قسمت اطلاعات فردی نسبت به کامل کردن اطلاعات مورد نیاز اقدام فرمایید.</div>
                                        <div> </div>
                                    </div>
                                </div>
                            </div>

                            <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24">
                                <div class="ant-row-flex ant-row-flex-space-around ant-row-flex-middle">
                                    <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24" style="margin-top: 10px; margin-bottom: 10px;">
                                        <div class="socialshare">
                                            <div class="ant-row referral-linkbox">
                                                <div>لینک معرفی:
                                                    <div class="referral-link"><a id="refref">......</a></div>
                                                </div>
                                                <button type="button" class="ant-btn ant-btn-primary"><span>کپی لینک</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </section>
                        <section class="myinfo bon" style="display:none;margin:0 5px">
                            <div class="info-content">
                                <div class="ant-divider ant-divider-horizontal ant-divider-with-text"><span class="ant-divider-inner-text">درآمد قابل برداشت</span></div>
                                <div class="report-info-table">
                                    <table class="report-info-table ">
                                        <tbody>
                                            <tr>
                                                <td><span>ردیف</span></td>
                                                <td><span>مبلغ</span></td>
                                                <td><span>قابل استفاده </span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="ant-row">
                                    <div class="ant-col-xs-24 ant-col-sm-8 ant-col-md-5" style="margin-top: 20px; margin-bottom: 20px;"></div>
                                </div>
                                <div class="ant-row">
                                    <div class="ant-col-xs-24 ant-col-sm-8 ant-col-md-5">
                                        <button type="button" class="ant-btn ant-btn-primary" style="width: 100%;"><i class="anticon anticon-credit-card"></i><span>نقد کردن درآمد</span></button>
                                    </div>
                                </div>
                                <div class="ant-row">
                                    <div class="ant-col-xs-24 ant-col-sm-8 ant-col-md-5" style="margin-top: 20px; margin-bottom: 20px;"></div>
                                </div>
                                <div class="ant-row">
                                    <br>
                                    <h1 class="title">لیست درخواست های نقد کردن درآمد</h1>
                                    <div class="report-info-table table-orderinfo">
                                        <table class="report-info-table ">
                                            <tbody>
                                                <tr>
                                                    <td><span></span></td>
                                                    <td><span>مبلغ</span></td>
                                                    <td><span>وضعیت درخواست</span></td>
                                                    <td><span>تاریخ درخواست</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="report-info-table responsive-orderinfo order-items"></div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {

        $.getJSON("/webservice/sellbime.php", function(result) {
            var c = '<tr><td><span>نوع سفارش</span></td><td><span>شرکت بیمه</span></td><td><span>نوع خرید</span></td><td><span>وضعیت سفارش</span></td><td><span>تاریخ ایجاد</span></td><td><span>کد رهگیری</span></td><td><span>نام بیمه گذار</span></td></tr>';
            $.each(result, function(i, field) {
                var b = 0;
                for (b = 0; b < field.length; b++) {
                    var ff = $.number(parseInt(field[b]['price']));
                    var tarif = ff + " تومان ";
                    var str = field[b]['description'];
                    if (str.length > 10) str = str.substring(0, 60) + ' ... ';
                    c = c + '<tr><td><span>' + field[b]["title"] + '</span></td><td><span>' + field[b]["company"] + '</span></td><td><span>' + field[b]["CashIinstallments"] + '</span></td><td><span>' + field[b]["status"] + '</span></td><td><span>' + field[b]["created_date"] + '</span></td><td><span>' + field[b]["factor"] + '</span></td><td><span>' + field[b]["name"] + '</span></td></tr>';
                }
                $('#sellbime').html(c)
            });
        });
        $.getJSON("/webservice/rememberbime.php", function(result) {
            $.each(result, function(i, field) {
                var b = 0;
                var c = '<tr> <td><span>ردیف</span></td> <td><span>نوع یادآور</span></td><td><span>تاریخ سر رسید</span></td> <td><span>شماره تماس</span></td><td><span></span></td> </tr>';
                for (b = 0; b < field.length; b++) {
                    c = c + '<tr><td><span>' + b + '</span></td><td><span>' + field[b]['type'] + '</span></td><td><span>' + field[b]['data'] + '</span></td><td><span>' + field[b]['phone'] + '</span></td><td><span><div class="" style="padding: 10px;"><button type="button" class="ant-btn btn-danger" onclick="deleteR(' + field[b]['id'] + ');"><span>حذف</span></button></div></span></td></tr>';
                }
                $('#rememberbime').html(c)
            });
        });

    });

    function edit() {

        var n = $('#namei').val()
        var f = $('#famel').val()
        var c = $('#state').val()
        var b = $('#birthday').val()
        var a = $('#address').val()
        var e = $('#email').val()
        var post = $('#postalcode').val()
        var job = $('#job').val()
        var mellicode = $('#melli_code').val()
        $('.banki').val('در حال پردازش ...')
        $.getJSON("/webservice/editprofile", {
            name: n,
			last_name:f,
            state: c,
            birthday: b,
            address: a,
            email: e,
            postal: post,
            melli_code: mellicode,
            jobs: job
        }, function(result) {});
        $('.banki').val('با موفقیت انجام شد')		
    }

    function addbroker() {
        $.getJSON("/webservice/requestbroker.php", function(result) {});
    }

    function deletei(id) {
        swal({
            title: "آیا از حذف این مورد مطمین هستید ؟",
            icon: "warning",
            button: "بله",
        }).then((willDelete) => {
            if (willDelete) {
                swal("با موفقیت حذف شد", {
                    icon: "success",
                    button: "بستن",
                });
                $.getJSON("/webservice/deletebime.php", {
                    idp: id
                }, function(result) {});
                $.getJSON("/webservice/sellbime.php", function(result) {
                    var c = '<tr><td><span>نوع سفارش</span></td><td><span>شرکت بیمه</span></td><td><span>نوع خرید</span></td><td><span>وضعیت سفارش</span></td><td><span>تاریخ ایجاد</span></td><td><span>کد رهگیری</span></td><td><span>نام بیمه گذار</span></td></tr>';
                    $.each(result, function(i, field) {
                        var b = 0;
                        for (b = 0; b < field.length; b++) {
                            var ff = $.number(parseInt(field[b]['price']));
                            var tarif = ff + " تومان ";
                            var str = field[b]['description'];
                            if (str.length > 10) str = str.substring(0, 60) + ' ... ';
                            if (field[b]["status"] == 'completed') {
                                var status = 'تکمیل شده';
                            } else if (field[b]["status"] == 'open') {
                                var status = 'سفارش باز';
                            }
                            c = c + '<tr><td><span>' + field[b]["title"] + '</span></td><td><span>' + field[b]["com_name"] + '</span></td><td><span>' + field[b]["CashIinstallments"] + '</span></td><td><span>' + status + '</span></td><td><span>' + field[b]["created_date"] + '</span></td><td><span>' + field[b]["factor"] + '</span></td><td><span>' + field[b]["name"] + '</span></td></tr>';
                        }
                        $('#sellbime').html(c)
                    });
                });

            }
        });
    }

    function deleteR(id) {
        swal({
            title: "آیا از حذف این مورد مطمین هستید ؟",
            icon: "warning",
            button: "بله",
        }).then((willDelete) => {
            if (willDelete) {
                swal("با موفقیت حذف شد", {
                    icon: "success",
                    button: "بستن",
                });
                $.getJSON("/webservice/deleteremember.php", {
                    idp: id
                }, function(result) {});
                $.getJSON("/webservice/rememberbime.php", function(result) {
                    $.each(result, function(i, field) {
                        var b = 0;
                        var c = '';
                        var str = field[b]['description'];
                        if (str.length > 10) str = str.substring(0, 60) + ' ... ';
                        for (b = 0; b < field.length; b++) {
                            c = c + '<div class="wrapper" style="padding:0;background-color:#fff"><div class="lessons"><a class="item" style="height:80px;background:#fff"><div class="lesson locked content" style="max-width:100%"><div class="tarif"><h3 class="complete" style="text-align:center;font-size:14px;direction:rtl;">' + str + '</h3></div><div class="stari"><h3 class="complete" style="text-align:center;font-size:13px;direction:rtl;"><span>' + field[b]['created_at'] + '</span></h3></div><div class=" view-course btnorder" onclick="deleteR(' + field[b]['id'] + ');">حذف</div></div></a></div></div>';
                        }
                        $('#rememberbime').html(c)
                    });
                });

            }
        });
    }
</script>
<style>
    ..swal-title {
        font-size: 15px
    }
</style>