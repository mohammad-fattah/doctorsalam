<div class="ant-row">
    <div id="one-step" class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24 ant-col-lg-6">
        <div class="siteRight insuranceinformation" style="margin-top:0 !important">
            <div class="text-center">
                <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24"></div>
            </div>
            <h3 class="title">اطلاعات وسیله نقلیه</h3>
            <div id="infotable" class="ant-col-sm-24 ant-col-md-24">
                <ul class="priceinfo">
                    <li><span class="price_name">نوع وسیله نقلیه</span><span class="price_number VehicleType">.......</span></li>
                    <li><span class="price_name">برند وسیله نقلیه</span><span class="price_number machine_name">.......</span></li>
                    <li><span class="price_name">مدل وسیله نقلیه</span><span class="price_number modeli_name">.......</span></li>
                    <li><span class="price_name">سال ساخت</span><span class="price_number sal_name"><?php echo $sal; ?></span></li>
                    <li><span class="price_name">درصد تخفیف ثالث</span><span class="price_number off_name">.......</span></li>
                    <li><span class="price_name">درصد تخفیف حوادث راننده</span><span class="price_number DriverDiscount">.......</span></li>
                    <li><span class="price_name">تاریخ انقضای بیمه‌نامه</span><span class="price_number datepicker">.......</span></li>
                    <li><span class="price_name">پوشش مالی</span><span class="price_number poshesh">.......</span></li>

                    <li><span class="price_name">شرکت بیمه</span><span class="price_number namecompany">.......</span></li>
                    <li><span class="price_name">مدت قرارداد</span><span class="price_number">12 ماه</span></li>
                    <li class="finalprice" style="font-size:14px"><span class="price_name" style="font-size:14px">مبلغ قابل پرداخت</span><span class="price_number tsalesprice" style="font-size:14px">در حال پردازش</span></li>
                    <li class="aghsatli"><span class="price_name">مبلغ پیش پرداخت</span><span class="price_number pish" style="float:left">در حال پردازش</span></li>
                    <li class="aghsatli"><span class="price_name">مبلغ هر چک</span><span class="price_number check" style="float:left">در حال پردازش</span></li>
                    <li class="aghsatli"><span class="price_name">تعداد اقساط</span><span class="price_number tcheck" style="float:left">در حال پردازش</span></li>
                </ul>
            </div>
        </div>
    </div>
	<div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24 ant-col-lg-18">
     <div id="block_payment" >
<script>
function printData()
{
   var divToPrint=document.getElementById("printData");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('.PrinterBtn').on('click',function(){
printData();
})
</script>
    <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24 ant-col-lg-24" style="margin-bottom:10px;padding:0">
        <button type="button" class="ant-btn orderpagebtn orderbackbtn ant-btn-primary ant-btn-lg" onClick="back_payment()" style="float: right;"><i class="anticon anticon-arrow-right"></i><span>بازگشت به صفحه قبل</span></button>
        <button type="button" class="ant-btn orderpagebtn ordersubmitbtn ant-btn-primary ant-btn-lg PrinterBtn" style="float: left;"><span>چاپ پیش فاکتور</span><i class="anticon anticon-printer"></i></button>
    </div>
    <div class="sortBox" style="clear:both">
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
                                <div style="width:25px;height:25px;background-color:#008a12;color:#fff;text-align:center;line-height:25px;margin:0 auto;border-radius:50%;margin-bottom:8px">2</div>
                                <div style="font-size:12px;color:#008a12">مشخصات</div>
                            </div>
                        </div>
                        <div class="" style="padding-left: 10px; padding-right: 10px;width:25%">
                            <div class="feature">
                                <div style="width:25px;height:25px;background-color:#008a12;color:#fff;text-align:center;line-height:25px;margin:0 auto;border-radius:50%;margin-bottom:8px">3</div>
                                <div style="font-size:12px;color:#008a12">ارسال</div>
                            </div>
                        </div>
                        <div class="" style="padding-left: 10px; padding-right: 10px;width:25%">
                            <div class="feature">
                                <div style="width:25px;height:25px;background-color:#008a12;color:#fff;text-align:center;line-height:25px;margin:0 auto;border-radius:50%;margin-bottom:8px">4</div>
                                <div style="font-size:12px;color:#008a12">پرداخت</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-12">

        <div class="content mb-0 no-rounded-bottom" id="printData" style="margin-top:0">

            <h3 class="invoice_payment_title" style="font-size:14px;text-align:center">پیش فاکتور بیمه شخص ثالث</h3>
            <table class="items table table-bordered " style="margin-top:10px;">
                <thead>
                    <tr>
                        <th>فروشنده</th>
                        <th>شماره تماس</th>
                        <th>کد پیگیری</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <?php echo $site_name; ?>
                        </th>
                        <th>
                            <?php echo $support_phone; ?>
                        </th>
                        <th>
                            <?php echo $factor; ?>
                        </th>
                    </tr>

                    <tr>
                        <th colspan="4">
                            <?php echo $company_address; ?>
                        </th>
                    </tr>
                </tbody>
            </table>

            <table class="items table table-bordered " style="margin-top:10px;">
                <thead>
                    <tr>
                        <th>نام و نام خانوادگی</th>
                        <th>تلفن همراه</th>
                        <th>تلفن</th>
                    </tr>
                </thead>
                <tbody class="print-table-mobile-info-car">

                    <tr>

                        <th class="flname1">
                            ---------
                        </th>
                        <th class="phone1">
                            ---------
                        </th>
                        <th class="cellphone1">
                            ---------
                        </th>
                    </tr>

                    <tr>
                        <th scope="thead">آدرس : </th>
                        <td colspan="5" class="address1">---------</td>
                    </tr>

                    <tr>
                        <th scope="thead">شرکت بیمه:</th>
                        <td colspan="5" class="namecompany">---------</td>
                    </tr>
                </tbody>
            </table>

            <table class="items table table-bordered table-information thirdparty-table">
                <thead>
                    <tr>
                        <th>وسیله نقلیه</th>
                        <th>مدت قرارداد</th>
                        <th>تخفیف بیمه ثالث</th>
                        <th>بیمه‌نامه قبلی</th>
                        <th>پوشش های انتخاب شده</th>

                    </tr>
                </thead>
                <tbody class="print-table-mobile-info-car">

                    <tr>

                        <th>
                            <span class="machine_name"></span> ,
                            <span class="modeli_name"></span>
                            <span class="sal_name"></span>
                        </th>
                        <th>
                            12 ماه
                        </th>
                        <th class="off_name">
                            ----------
                        </th>
                        <th> تاریخ انقضای بیمه نامه قبلی: <span class="datepicker">----------</span>
                        </th>

                        <th class="text-right">
                            پوشش مالی: <span class="poshesh"></span>
                            <br> پوشش سرنشین: 360,000,000 تومان
                            <br> پوشش راننده: 270,000,000 تومان
                            <br>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-lg-12 col-md-12">
        <div class="content m-0 no-rounded-top">
            <div class="row no-print">
                <div class="col-md-12" style="width:100%">
                    <div class="payment_way">
                        <span>نحوه‌ی پرداخت</span>
                        <div id="paymentway">
                            <ul class="payment_items">
                                <li class="online active">
                                    <label for="id_payment_way_0">
                                        <i class="onlineicon"></i>
                                        <span style="font-size:12px;margin:10px auto;width:100%">درگاه پرداخت (آنلاین)</span>
                                        <input type="radio" name="payment_way" value="online" required="" id="id_payment_way_0" checked="checked">
                                    </label>
                                    <i class="fas fa-check-circle"></i>
                                </li>
                                <!--<li class="cash">
                                        <label for="id_payment_way_1">
                                            <i class="cashicon"></i>
											<span style="font-size:12px;margin:10px auto;width:100%">نقدی</span>
                                            <input type="radio" name="payment_way" value="cash" required="" id="id_payment_way_1">
                                        </label>
                                        <i class="fas fa-check-circle"></i>
                                    </li>
                                    <li class="card">
                                        <label for="id_payment_way_2">
                                            <i class="carticon"></i>
											<span style="font-size:12px;margin:10px auto;width:100%">کارت به کارت</span>
                                            <input type="radio" name="payment_way" value="card" required="" id="id_payment_way_2"> 
										</label>
                                        <i class="fas fa-check-circle"></i>
                                    </li>
									<li class="pos">
                                        <label for="id_payment_way_3">
                                            <i class="poseicon"></i>
											<span style="font-size:12px;margin:10px auto;width:100%">دستگاه پوز</span>
                                            <input type="radio" name="payment_way" value="pos" required="" id="id_payment_way_3"> 
										</label>
                                        <i class="fas fa-check-circle"></i>
                                    </li>-->

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div style="margin-top: 20px;clear:both" class="text-center">
                <label class="alert alert-success terms_agreementBox w-100 clearfix d-flex align-items-center no-print" style="padding-bottom:25px" role="alert">
                    <div>
                        <input type="checkbox" id="terms_agreement"> بدینوسیله صحت اطلاعات فوق را تایید میکنم و
                        <a href="/faq" target="_blank" class="alert-link">شرایط و قوانین <?php echo $site_name; ?></a> را میپذیرم.
                    </div>
                </label>

                <button class="btn btn-final-payment" role="button" type="button" id="final_payment" disabled="">تایید نهایی و پرداخت</button>

            </div>

        </div>

    </div>

    <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24 ant-col-lg-24">
        <button type="button" class="ant-btn orderpagebtn orderbackbtn ant-btn-primary ant-btn-lg" onClick="back_payment()" style="float: right;"><i class="anticon anticon-arrow-right"></i><span>بازگشت به صفحه قبل</span></button>
        <!--banki-->
    </div>
</div>


</div>
</div>