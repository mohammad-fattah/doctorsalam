<style>.wrapper{box-shadow:none}</style>
<div class="content" style="max-width:100%">
                <section class="courses" style="background:#fff;padding-top:0px;height:60px;">
                    <div class="linked-accounts">
                        <div class="accounts" style="height:60px">
						   <div style="width:25%;float:right;font-size:12px;padding-top:20px;height:60px;background-image:url(https://bimiline.com/assets/img/uploadLoaderBg.gif);
						    background-size:35px" class="active">
						    <span style="color:#0ccc0c;font-size:13px">انتخاب بیمه</span>
                            <a style="margin:0;padding:0;padding-left:20px;position:absolute;opacity:1">
							 <img src="https://bimiline.com/assets/img/Green-Tick-PNG-File.png" style="width:30px" />
							</a>
                           </div>
						   <div style="width:25%;float:right;font-size:12px;padding-top:20px;height:60px;background-image:url(https://bimiline.com/assets/img/uploadLoaderBg.gif);
						    background-size:35px" class="active">
						    <span style="color:#0ccc0c;font-size:13px">اطلاعات خودرو</span>
                            <a style="margin:0;padding:0;padding-left:20px;position:absolute;opacity:1">
							 <img src="https://bimiline.com/assets/img/Green-Tick-PNG-File.png" style="width:30px" />
							</a>
                           </div>
						   <div style="width:25%;float:right;font-size:12px;padding-top:20px;height:60px;background-image:url(https://bimiline.com/assets/img/uploadLoaderBg.gif);
						    background-size:35px" class="active">
						    <span style="color:#0ccc0c;font-size:13px">مشخصات تحویل گیرنده</span>
                            <a style="margin:0;padding:0;padding-left:20px;position:absolute;opacity:1">
							 <img src="https://bimiline.com/assets/img/Green-Tick-PNG-File.png" style="width:30px" />
							</a>
                           </div>
						   <div style="width:25%;float:right;font-size:12px;padding-top:20px;height:60px;background-image:url(https://bimiline.com/assets/img/uploadLoaderBg.gif);
						    background-size:35px" class="active selected">
						    <span style="color:#0ccc0c;font-size:13px">پرداخت</span>
                            <a style="margin:0;padding:0;padding-left:20px;position:absolute;opacity:1">
							 <img src="https://bimiline.com/assets/img/Green-Tick-PNG-File.png" style="width:30px" />
							</a>
                           </div>
                        </div>
                    </div>
                </section>
                <!---page two--->
                <section class="myinfo my-purchased-insurances" style="margin:0;height:200px">
				   <div style="width:calc(100% - 60px);text-align:right;margin:20px auto;background: #fff;padding: 0px 10px;border: 1px solid #ccc;border-radius: 5px;box-shadow: 0px 2px 2px rgba(24,24,24,0.1);height:170px;font-size:13px;line-height:50px">
<?php
$factor=$_SESSION['orderbimi'];
include_once('webservice/confi.php');
if ($_POST['ResCode'] == '0') {
	//--پرداخت در بانک باموفقیت بوده
	include_once('lib/nusoap.php');
	$client = new nusoap_client('https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl');
	$namespace='http://interfaces.core.sw.bps.com/';

	$terminalId				= "2872140";					// Terminal ID
	$userName				= "88814862";					// Username
	$userPassword			= "78648790";					// Password
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
			$mysqli->query("update `order` set deadline='پرداخت با موفقیت' where factor='$factor'");
			echo 'پرداخت با موفقیت صورت پذیرفت';
		} else {
			//-- در درخواست واریز وجه مشکل به وجود آمد. درخواست بازگشت وجه داده شود.
			$client->call('bpReversalRequest', $parameters, $namespace);			
			//echo 'Error : '. $result;
			$mysqli->query("update `order` set deadline='در واریز وجه مشکلی پیش امده است' where factor='$factor'");
		    echo 'در واریز وجه مشکلی پیش امده است';
		}
	} else {
		//-- وریفای به مشکل خورد٬ نمایش پیغام خطا و بازگشت زدن مبلغ
		$client->call('bpReversalRequest', $parameters, $namespace);
		//echo 'Error : '. $result;
		$mysqli->query("update `order` set deadline='در پرداخت مشکلی پیش آمده' where factor='$factor'");
		echo 'در پرداخت مشکلی پیش آمده , لطفا دوباره تلاش کنید';
	}
} else {
	//-- پرداخت با خطا همراه بوده
	//echo 'Error : '. $_POST['ResCode'];
	$mysqli->query("update `order` set deadline='پرداخت با خطا همراه بوده' where factor='$factor'");
	echo 'پرداخت با خطا همراه بوده';
}
?>
				   </div>
                </section>
                
            </div>