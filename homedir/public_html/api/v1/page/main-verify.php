<div class="ant-row">
    <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24 ant-col-lg-24" >
        <div>
		    <div class="sortBox">
                <div class="ant-row">
                    <div class="ant-col-offset-24 ant-col-xs-24 ant-col-sm-24" style="float:left!important;margin-left:0;margin-top:8px">
                       <div class="bb-features" style="background: rgb(255, 255, 255);">
					    <div class="ant-row-flex ant-row-flex-center ant-row-flex-middle" style="margin-left: -10px; margin-right: -10px;">
						 <div class="" style="padding-left: 10px; padding-right: 10px;width:25%">
						  <div class="feature">
						   <i class="delivery"></i>
						   <div style="font-size:12px">صدور 24ساعته</div>
						  </div>
						 </div>
						 <div class="" style="padding-left: 10px; padding-right: 10px;width:25%"><div class="feature"><i class="installment"></i><div style="font-size:12px">خرید قسطی</div></div></div><div class="" style="padding-left: 10px; padding-right: 10px;width:25%"><div class="feature"><i class="freedelivery"></i><div style="font-size:12px">ارسال رایگان</div></div></div><div class="" style="padding-left: 10px; padding-right: 10px;width:25%"><div class="feature"><i class="onlinebuy"></i><div style="font-size:12px">پرداخت در محل</div></div></div></div></div>
                    </div>
                </div>
            </div>
			<?php
			$s=1;
$factor=$_SESSION['orderbimi'];
include_once('webservice/confi.php');
if ($_POST['ResCode'] == '0') {
	//--پرداخت در بانک باموفقیت بوده
	include_once('api/pay/lib/nusoap.php');
	$client = new nusoap_client('https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl');
	$namespace='http://interfaces.core.sw.bps.com/';

	$terminalId		= "3712787";					// Terminal ID
$userName		= "bim8455";					// Username
$userPassword	= "87609731";
	$orderId 				= $_POST['SaleOrderId'];		// Order ID
	
	$verifySaleOrderId 		= $_POST['SaleOrderId'];
	$verifySaleReferenceId 	= $_POST['SaleReferenceId'];
			
	$parameters = array(
		'terminalId' => $terminalId,
		'userName' => $userName,
		'userPassword' => $userPassword,
		'orderId' => $orderId,
		'saleOrderId' => $verifySaleOrderId,
		'saleReferenceId' => $verifySaleReferenceId);
	// Call the SOAP method
	$result = $client->call('bpVerifyRequest', $parameters, $namespace);
	if($result == 0) {
		//-- وریفای به درستی انجام شد٬ درخواست واریز وجه
		// Call the SOAP method
		$result = $client->call('bpSettleRequest', $parameters, $namespace);
		if($result == 0) {
			//-- تمام مراحل پرداخت به درستی انجام شد.
			//-- آماده کردن خروجی
			$mysqli->query("update `order` set status='پرداخت صورتحساب' where factor='$factor'");
			$s=1;
		} else {
			//-- در درخواست واریز وجه مشکل به وجود آمد. درخواست بازگشت وجه داده شود.
			$client->call('bpReversalRequest', $parameters, $namespace);			
			//echo 'Error : '. $result;
			$mysqli->query("update `order` set status='پرداخت غیرموفق صورتحساب' where factor='$factor'");
		    $s=0;
		}
	} else {
		//-- وریفای به مشکل خورد٬ نمایش پیغام خطا و بازگشت زدن مبلغ
		$client->call('bpReversalRequest', $parameters, $namespace);
		//echo 'Error : '. $result;
		$mysqli->query("update `order` set status='پرداخت غیرموفق صورتحساب' where factor='$factor'");
		$s=0;
	}
} else {
	//-- پرداخت با خطا همراه بوده
	//echo 'Error : '. $_POST['ResCode'];
	$mysqli->query("update `order` set status='پرداخت غیرموفق صورتحساب' where factor='$factor'");
	$s=0;
}
			
					 if($s==0):
            ?>
			<div class="sortBox" style="background: #ef2222;">
                <div class="ant-row">
                    <div class="ant-col-offset-24 ant-col-xs-24 ant-col-sm-24">
                       <div class="bb-features" style="background:transparent;">
					    <div  style="text-align:center;color:#fff">
						 پرداخت وجه با خطا مواجه شده است . در صورت مشکل با پشتیبان سایت تماس بگیرید .
						</div>
					   </div>
                    </div>
                </div>
            </div>
			<?php 
			 else:
			?>
			<div class="sortBox" style="background: #6cc509;">
                <div class="ant-row">
                    <div class="ant-col-offset-24 ant-col-xs-24 ant-col-sm-24">
                       <div class="bb-features" style="background:transparent;">
					    <div  style="text-align:center;color:#fff">
						 صورتحساب با موفقیت پرداخت شده . 
						</div>
					   </div>
                    </div>
                </div>
            </div>
			<?php endif; ?>

			<div id="table-wrapper">
                <div id="table-body" class="ant-row">
                    <div id="block_payment" >


    <div class="col-lg-12 col-md-12">

        <div class="content mb-0 no-rounded-bottom" style="margin-top:0">

            <h3 class="invoice_payment_title" style="font-size:14px;text-align:center">فاکتور بیمه شخص ثالث</h3>
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
                            <?php echo $address; ?>
                        </th>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>

                </div>
            </div>
        </div>
    </div>
</div>