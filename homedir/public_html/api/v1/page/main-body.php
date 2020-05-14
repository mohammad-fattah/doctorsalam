<div class="ant-row">
    <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24 ant-col-lg-6">
        <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24">
            <form class="ant-form ant-form-vertical">
                <div class="ant-collapse" style="box-shadow:0 6px 8px 0 hsla(0,0%,64.3%,.21);border-style:none">
                    <div class="ant-collapse-item ant-collapse-item-active" data-step="1" data-intro="بر اساس مشخصاتی که در این قمست وارد می کنید , قیمت بیمه نامه شما مشخص می شود">
                        <div class="ant-collapse-header">کد تخفیف دارید ؟ </div>
                        <div class="ant-collapse-content ant-collapse-content-active" role="tabpanel">
                            <div class="ant-collapse-content-box">
                                <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24">
                                    <div class="ant-row-flex ant-row-flex-space-between">
                                        <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24">
                                            <div class="ant-row ant-form-item ant-form-no-margin">
                                                <div class="ant-form-item-label">
                                                    <label for="car_brand" class="ant-form-item-required">کد تخفیف را وارد کنید</label>
                                                </div>
                                                <div class="ant-form-item-control-wrapper">
                                                    <div class="ant-form-item-control has-feedback">
                                                        <input type="text" class="ant-select-selection ant-select-selection--single" id="inputcode" onkeyup="offcode()" maxlength="8" style="font-weight:100;padding-right:10px">
                                                        <div style="width:40px;text-align:center;color:#222;margin-top:0px;display:none;float:left" id="codeoff"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>

        <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24">
            <form class="ant-form ant-form-vertical">
                <div class="ant-collapse" style="box-shadow:0 6px 8px 0 hsla(0,0%,64.3%,.21);border-style:none">
                    <div class="ant-collapse-item ant-collapse-item-active" data-step="1" data-intro="بر اساس مشخصاتی که در این قمست وارد می کنید , قیمت بیمه نامه شما مشخص می شود">
                        <div class="ant-collapse-header">اطلاعات وسیله نقلیه<span style="float:left;width:25px;height:25px;background-image:url(/assets/img/ExpandMore-128.png);background-position:center;background-size:20px;" onclick="javascript:$('.div-vehicle').css('height','auto');return false;"></span> </div>
                        <div class="ant-collapse-content div-vehicle">
                            <div class="ant-collapse-content-box">

                                <div class="ant-row-flex ant-row-flex-space-between">
                                    <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24">
                                        <div class="ant-row ant-form-item ant-form-no-margin">
                                            <div class="ant-form-item-label">
                                                <label for="car_brand" class="ant-form-item-required" title="نوع وسیله نقلیه:">نوع وسیله نقلیه:</label>
                                            </div>
                                            <div class="ant-form-item-control-wrapper">
                                                <div class="ant-form-item-control has-feedback">
                                                    <select class="ant-select-selection ant-select-selection--single" name="VehicleType" id="VehicleType" onchange="VehicleBrand()">
                                                        <?php if($VehicleType): ?>
                                                            <option value="" selected>
                                                                <?php echo $VehicleType; ?>
                                                            </option>
                                                            <?php else: ?>
                                                                <option value="">نوع وسیله نقلیه</option>
                                                                <?php endif; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24">
                                        <div class="ant-row ant-form-item ant-form-no-margin">
                                            <div class="ant-form-item-label">
                                                <label for="car_model" class="ant-form-item-required">برند وسیله نقلیه :</label>
                                            </div>
                                            <div class="ant-form-item-control-wrapper">
                                                <div class="ant-form-item-control has-feedback ">
                                                    <select class="ant-select-selection ant-select-selection--single" name="vehicleBrand" id="vehicleBrand" onchange="VehicleModel()">
                                                        <?php if($machine): ?>
                                                            <option value="">
                                                                <?php echo $machine; ?>
                                                            </option>
                                                            <?php else: ?>
                                                                <option value="">برند وسیله نقلیه</option>
                                                                <?php endif; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24">
                                        <div class="ant-row ant-form-item ant-form-no-margin">
                                            <div class="ant-form-item-label">
                                                <label for="car_model" class="ant-form-item-required" title="مدل وسیله نقلیه:">مدل وسیله نقلیه:</label>
                                            </div>
                                            <div class="ant-form-item-control-wrapper">
                                                <div class="ant-form-item-control has-feedback ">
                                                    <select class="ant-select-selection ant-select-selection--single" name="vehicleModel" id="vehicleModel">
                                                        <?php if($NvehicleModel): ?>
                                                            <option value="<?php echo $NvehicleModel; ?>">
                                                                <?php echo str_replace('_',' ',$NewModel[0]); ?>
                                                            </option>
                                                            <?php else: ?>
                                                                <option value="">مدل وسیله نقلیه</option>
                                                                <?php endif; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24">
                                        <div class="ant-row ant-form-item ant-form-no-margin">
                                            <div class="ant-form-item-label">
                                                <label for="car_production_year" class="ant-form-item-required" title="سال ساخت:">سال ساخت:</label>
                                            </div>
                                            <div class="ant-form-item-control-wrapper">
                                                <div class="ant-form-item-control has-feedback ">
                                                    <select class="ant-select-selection ant-select-selection--single" id="sal" onchange="change_price()">
                                                        <option value="">سال ساخت</option>
                                                        <?php $salm=2019; ?>
                                                            <?php for($i=1398;$i>1350;$i--): ?>
                                                                <option value="<?php echo $i; ?>" <?php if($sal==$i): echo 'selected'; endif; ?> >
                                                                    <?php echo $i.' - '.$salm; ?>
                                                                </option>
                                                                <?php $salm--; ?>
                                                                    <?php endfor; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24">
                                        <div class="ant-row ant-form-item ant-form-no-margin">
                                            <div class="ant-form-item-label">
                                                <label for="car_production_year" class="ant-form-item-required">داخلی یا وارداتی:</label>
                                            </div>
                                            <div class="ant-form-item-control-wrapper">
                                                <div class="ant-form-item-control has-feedback ">
                                                    <select class="ant-select-selection ant-select-selection--single" id="InOut">
                                                        <option value="Internal" <?php if($InOut=='Internal' ): echo 'selected';endif; ?>>داخلی</option>
                                                        <option value="import" <?php if($InOut=='import' ): echo 'selected';endif; ?>>وارداتی</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24">
                                        <div class="ant-row ant-form-item ant-form-no-margin">
                                            <div class="ant-form-item-label">
                                                <label for="car_production_year" class="ant-form-item-required">ارزش وسیله نقلیه (تومان):</label>
                                            </div>
                                            <div class="ant-form-item-control-wrapper">
                                                <div class="ant-form-item-control has-feedback ">
                                                    <input type="text" value="<?php if($Price): echo $Price; endif; ?>" class="ant-select-selection ant-select-selection--single" id="price" onKeyUp="change_price()" style="padding-right:10px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24">
                                        <div class="ant-row ant-form-item ant-form-no-margin">
                                            <div class="ant-form-item-label">
                                                <label for="car_production_year" class="ant-form-item-required">ارزش لوازم غیرفابریک (تومان):</label>
                                            </div>
                                            <div class="ant-form-item-control-wrapper">
                                                <div class="ant-form-item-control has-feedback ">
                                                    <input type="text" value="0" style="padding-right:10px" class="ant-select-selection ant-select-selection--single" id="price_unproductive" onKeyUp="change_price()">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ant-collapse-item ant-collapse-item-active">
                        <div class="ant-collapse-header">تخفیف ها <span style="float:left;width:25px;height:25px;background-image:url(/assets/img/ExpandMore-128.png);background-position:center;background-size:20px;" onclick="javascript:$('.div-off').css('height','auto');return false;"></span></div>
                        <div class="ant-collapse-content div-off">
                            <div class="ant-collapse-content-box">
                                <div class="ant-row-flex ant-row-flex-space-between">
                                    <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24 ant-col-lg-24" id="OffsBody">
                                    </div>
                                    <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24">
                                        <div class="ant-row ant-form-item ant-form-no-margin">
                                            <div class="ant-form-item-label">
                                                <label for="car_production_year" class="ant-form-item-required">تخفیف عدم خسارت بیمه بدنه:</label>
                                            </div>
                                            <div class="ant-form-item-control-wrapper">
                                                <div class="ant-form-item-control has-feedback ">
                                                    <select class="ant-select-selection ant-select-selection--single" onchange="change_price()" id="body_damage">
                                                        <option value="0">با خسارت</option>
                                                        <option value="25">1 سال</option>
                                                        <option value="35">2 سال</option>
                                                        <option value="45">3 سال</option>
                                                        <option value="60">4 سال و بیشتر</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ant-collapse-item ant-collapse-item-active">
                        <div class="ant-collapse-header" role="tab" aria-expanded="true">پوشش ها<span style="float:left;width:25px;height:25px;background-image:url(/assets/img/ExpandMore-128.png);background-position:center;background-size:20px;" onclick="javascript:$('.div-poshesh').css('height','auto');return false;"></span></div>
                        <div class="ant-collapse-content div-poshesh">
                            <div class="ant-collapse-content-box">
                                <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24 ant-col-lg-24" id="CoversBody">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24 ant-col-lg-18">
        <div>
            <?php if($website_status=='off'): ?>
                <div style="background-color:#e20d21;height:50px;width:100%;display: flex; justify-content: center; line-height: 50px; color: #fff; font-size: 14px;">
                    <?php echo $message_off; ?>
                </div>
                <?php endif; ?>
                    <div class="sortBox">
                        <div class="ant-row">
                            <div class="ant-col-offset-24 ant-col-xs-24 ant-col-sm-24" style="float:left!important;margin-left:0;margin-top:8px">
                                <div class="bb-features" style="background: rgb(255, 255, 255);">
                                    <div class="ant-row-flex ant-row-flex-center ant-row-flex-middle" style="margin-left: -10px; margin-right: -10px;">
                                        <div class="" style="padding-left: 10px; padding-right: 10px;width:25%">
                                            <div class="feature">
                                                <!--<i class="selected"></i>-->
                                                <div style="width:25px;height:25px;background-color:#008a12;color:#fff;text-align:center;line-height:25px;margin:0 auto;border-radius:50%;margin-bottom:8px">1</div>
                                                <div style="font-size:12px;color:#008a12">انتخاب</div>
                                            </div>
                                        </div>
                                        <div class="" style="padding-left: 10px; padding-right: 10px;width:25%">
                                            <div class="feature">
                                                <div style="width:25px;height:25px;background-color:#737475;color:#fff;text-align:center;line-height:25px;margin:0 auto;border-radius:50%;margin-bottom:8px">2</div>
                                                <div style="font-size:12px">مشخصات</div>
                                            </div>
                                        </div>
                                        <div class="" style="padding-left: 10px; padding-right: 10px;width:25%">
                                            <div class="feature">
                                                <div style="width:25px;height:25px;background-color:#737475;color:#fff;text-align:center;line-height:25px;margin:0 auto;border-radius:50%;margin-bottom:8px">3</div>
                                                <div style="font-size:12px">ارسال</div>
                                            </div>
                                        </div>
                                        <div class="" style="padding-left: 10px; padding-right: 10px;width:25%">
                                            <div class="feature">
                                                <div style="width:25px;height:25px;background-color:#737475;color:#fff;text-align:center;line-height:25px;margin:0 auto;border-radius:50%;margin-bottom:8px">4</div>
                                                <div style="font-size:12px">پرداخت</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sortBox" style="background: <?php echo $theme_color; ?>;height:auto;line-height:28px;margin-bottom:0;">
                        <div class="bb-features" style="background: <?php echo $theme_color; ?>;padding:0;margin:0;color:#fff;text-align:center">
                            <?php echo $message_body; ?>
                        </div>
                    </div>
                    <div id="table-wrapper">
                        <div class="sortBox" style="padding:0" data-step="3" data-intro="مرتب سازی شرکت ها در این قسمت می باشد">
                            <div class="ant-row-flex ant-row-flex-middle itemList" style="flex-direction: row-reverse;padding:8px">
                                <div class="ant-col-xs-24 ant-col-sm-6 ant-col-md-6 ant-col-lg-6" style="text-align:center">
                                    <div class="ant-form-item-control has-feedback">
                                        <select class="ant-select-selection ant-select-selection--single" placeholder="مرتب سازی براساس" id="order_company" style="margin-top:5px" onchange="change_price()">
                                            <option value="">مرتب سازی براساس</option>
                                            <option value="low" selected>قیمت ( کم به زیاد )</option>
                                            <option value="tavangari">سطح توانگری ( زیاد به کم )</option>
                                            <option value="rezayat">رتبه رضایت مشتری</option>
                                            <option value="market">سهم بازار</option>
                                            <option value="khesarat">مراکز پرداخت خسارت</option>
                                            <option value="sayar">پرداخت خسارت سیار</option>
                                            <option value="pasokh">مدت زمان پاسخگویی به شکایت</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="ant-col-xs-24 ant-col-sm-6 ant-col-md-6 ant-col-lg-6 display-none" style="text-align:center">
                                    <span>اقساط<span style="padding:0 10px"> |</span> هدیه</span>
                                </div>
                                <div class="ant-col-xs-24 ant-col-sm-6 ant-col-md-6 ant-col-lg-6 display-none" style="text-align:center">سطح توانگری </div>
                                <div class="ant-col-xs-24 ant-col-sm-6 ant-col-md-6 ant-col-lg-6 display-none" style="text-align:center">شرکت بیمه </div>
                            </div>
                        </div>
                        <div class="spinner absolute-center" style="display: none;"></div>
                        <div id="table-body" class="ant-row">
                            <div id="CompareDiv">
                            </div>
                        </div>
                        <div class="ant-row block_description" style="display:<?php if($machine): ?>none;<?php else: ?>block;<?php endif; ?>">
                            <div class="box-soal">
                                <div class="tabBox">
                                    <ul class="tabs">
                                        <li style="width:100%"><a href="#tab1" style="background-color:#108ee9">درباره بیمه بدنه</a></li>
                                    </ul>
                                    <div class="tabContainer">
                                        <div id="tab1" class="tabContent">
                                            <?php $des='بیمه بدنه';include('api/v1/settings/detail-blog.php'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
</div>