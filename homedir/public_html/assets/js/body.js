var i_body=0;
var coverage_percant = 0;
var coverage_price = 0;
var offs_percant = 0;
var offs_price = 0;
$(document).ready(function() {
	VehicleType();
	CoversBody();
	OffsBody();
    $('#price,#price_unproductive').number(true);
	isok=1;
	//GetBime();
	if (machine) {
        GetBime();
    } else {
		$('#CompareDiv').html('<div class="ant-row-flex ant-row-flex-middle itemList hasgift" style="background:#fff1f0;border:1px solid #ffa39e">' +
                    '<div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24 ant-col-lg-24">' +
                    '<div class="ant-progress ant-progress-line ant-progress-status-active ant-progress-small" style="height: 40px; line-height: 50px; text-align:center;">' +
                    'توجه! برای نمایش بسته های پیشنهادی بیمه بدنه ، اطلاعات مورد نیاز ( مشخص شده) را وارد نمایید.</div>' +
                    '</div></div>')
        $('.block_description').css('display', 'block');
    }
});
function badaneh() {
    price = $("#bPrice").val();
    if (price >= 500000 && price <= 10000000000) {
		isok=100;
        GetBime();
    }
}
function morecom(id) {
    var name = $('#morecome' + id).attr('name');
    $('.divcom').css('display', 'none')
    if (name == 'no') {
        $('#com' + id).css('display', 'block')
        $('#morecome' + id).attr('name', 'yes')
    } else {
        $('#com' + id).css('display', 'none')
        $('#morecome' + id).attr('name', 'no')
    }
}
function GetModel(){
 var t = $("#modeli").val();
 t=t.split(',');
 type=t[2];
}
function GetModelCar() {
    var selectBox = $("#car").val();
    des = selectBox;
    machine = selectBox;
    var k = '';
    $.getJSON("/webservice/modelr.php", {
        car: des
    }, function(result) {
        $.each(result, function(i, field) {
            var k = '<option>نوع خودرو را انتخاب کنید</option>';
            var b = 0;
            for (b = 0; b < field.length; b++) {
                k = k + '<option value="' + field[b]['name'] + ',' + field[b]['id'] + ',' + field[b]['type'] + ',' + field[b]['photo'] + '" >' + field[b]['name'] + '</option>';
            }
            $('#modeli').html(k)
        });
    });
}
function goToTwoLevel(avalprice,offprice, company) {
	var fullurl = window.location.href;
	var type = $("#VehicleType option:selected").text();
	var mach = $("#vehicleBrand option:selected").text();
    var mod = $("#vehicleModel option:selected").text();
    var s = $("#sal option:selected").text();
    var InOut = $("#InOut option:selected").text();
    var price = $("#price").val();
    var price_unproductive = $("#price_unproductive").val();
	$('.tsalesprice').html($.number(offprice) + ' تومان')
    $('.namecompany').html(company)
    $('.machine_name').html(mach)
    $('.modeli_name').html(mod)
    $('.sal_name').html(s)
    $('.VehicleType').html(type)
	
    var carusage = $("#VehicleType").val();
    if (username) {
		$.ajax({
         type: "GET",
         url: "/webservice/body/level1.php",
         data: "sal=" + s + "&machini=" + mach + "&modeli=" + mod + "&type=" + carusage + "&CashIinstallments=نقد&url=" + fullurl + '&salesPrice=' + offprice + "&company="+company+"&InOut="+InOut+"&price_unproductive="+price_unproductive+"&price="+price,
         success: function() {}
        })
        $('.divmain').css('display', 'none')
        $('.divpic').css('display', 'block')
    } else {
        $('#divlogin').css('display', 'flex')
    }
}

function GetOrder() {
    order = $("#order").val();
    GetBime();
}

function block_pic() {
    $('#block_pic').css('display', 'none')
    $('#block_address').css('display', 'block')
}

function back_pic() {
	window.scrollTo(0,0);
    $('.divpic').css('display', 'none')
    $('.divmain').css('display', 'block')
}

function block_address() {
    $('#block_address').css('display', 'none')
    $('#block_time').css('display', 'block')
}

function back_address() {
	window.scrollTo(0,0);
    $('#block_address').css('display', 'none')
    $('#block_pic').css('display', 'block')
}

function block_time() {
    $('.flname1').html($('#flname').val());
    $('.phone1').html($('#phone').val());
    $('.cellphone1').html($('#cellphone').val());
    $('.address1').html($('#city').val() + ' , ' + $('#address').val());
	var name=$('#flname').val();
	var phone=$('#phone').val();
	var cellphone=$('#cellphone').val();
	var address=$('#address').val();
	var city=$('#city').val();
	var f = 0;
	if(name && phone && cellphone && address && city){
		f=1;
	}else{
		f=0;
		if(!name){$('#flname').css('border-color','rgb(238, 111, 117)');}else{$('#flname').css('border-color','#cacaca');}
		if(!phone){$('#phone').css('border-color','rgb(238, 111, 117)');}else{$('#phone').css('border-color','#cacaca');}
		if(!cellphone){$('#cellphone').css('border-color','rgb(238, 111, 117)');}else{$('#cellphone').css('border-color','#cacaca');}
		if(!address){$('#address').css('border-color','rgb(238, 111, 117)');}else{$('#address').css('border-color','#cacaca');}
		if(!city){$('.divstate').css('border','1px solid rgb(238, 111, 117)');}else{$('.divstate').css('border','1px solid #d9d9d9');}
	}
    if (f == '1') {
        var datai = $('#reciverForm').serialize();
        $.ajax({
            url: "/webservice/body/level2.php",
            type: "GET",
            data: datai,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
			    $('#block_address').css('display', 'none');
                $('#block_payment').css('display', 'block')
            }
        });
    }
    window.scrollTo(0,0);
}

function back_time() {
    $('#block_time').css('display', 'none')
    $('#block_address').css('display', 'block')
}
function change_price(){
  isok=1;
  GetBime();
}
function GetBime() {
    var backi = '',
        backii = '';
    var salesPrice = 0;
    var numsales = 0;
    var aval = 0;
    var z = 0;
    if (isok > 0) {
		$('.block_description').css('display','none');
		if($('#vehicleModel').val()){
	      var model=$('#vehicleModel').val().split(',');
		}
        var year=$('#sal').val();
        var offcode=$('#codeoffhidden').val();
        var takhfif=$('#takhfif').val();
        var carusage=$('#VehicleType').val();
        var order=$('#order').val();
        var body_damage=$('#body_damage').val();
        var zero_device=$('#zero_device').val();
        var price=$('#price').val();
        var sal=$('#sal').val();
        var price_unproductive=$('#price_unproductive').val();
		if(!order){
		 order='low';	
		}
	    ss=year;
		oo=takhfif;
	    var b = 0,z = 0,dirkard='',roz_dirkard=0,price_payeh=0,takhfifcode=0,gg=0;
        $('#CompareDiv').html('<div style="width:100%;height:200px;background-image:url(/assets/img/dots_3.gif);background-position:center center;background-repeat:no-repeat;background-size:100px;margin-bottom:20px;background-color:#fff"></div>');
		//alert('/api/price/body.php?price='+price+'&price_unproductive='+price_unproductive+'&type='+type+'&poshesh='+poshesh+'&orderi=low&order_company=dana&year='+sal+'&coveragepercant='+coverage_percant+'&coverageprice='+coverage_price+'&offspercant='+offs_percant+'&offsprice='+offs_percant+'&bodydamage='+body_damage)
		$.getJSON('/api/price/body.php?price='+price+'&price_unproductive='+price_unproductive+'&type='+type+'&poshesh='+poshesh+'&orderi=low&order_company=dana&year='+sal+'&coveragepercant='+coverage_percant+'&coverageprice='+coverage_price+'&offspercant='+offs_percant+'&offsprice='+offs_percant+'&bodydamage='+body_damage, function(result) {
			var is_result='no',t='';
            $.each(result, function(i, field) {
				 if(field['tariff']){
				   //var offprice=field['tariff'].split(',').join('');
				   var offprice=field['tariff'];
				 }
				 if(field['aval']){
                   var avalprice=field['aval'].split(',').join('');
				 }
				 if(offcode){
                  var codeoff=offcode.split('#');
				 }
				 var darsadi = '';
				    is_result='ok';
                    var ff = field['tariff'];
                    var tarif = ff + " تومان ";
					    var np=parseInt(field['price']);
                        aval = $.number(np) + ' تومان';
						var off_price=parseInt(field['price'])-((parseInt(field['price']) * parseInt(field['off']))/100);
						gg=parseInt(field['price'])-((parseInt(field['price']) * parseInt(field['off']))/100);
                        off_price = $.number(Math.floor(parseInt(off_price)));
						
                        var darsadi = '';
                        var porforosh = '';
                        var btnAghsat = '';
                        var btnCashIinstallments = '';
                        var priceOne = '';
						var HasGift = '<i aria-label="icon: close" class="anticon anticon-close" style="padding-right:30px"></i>';
                        var padd = 'padding-top:20px;';
                        var agsati = field['aghsat'].split(',');
						if(field['off'] > 0){
				         darsadi = '<div class="DiscountBox" style="right:10px"><div class="giftdiscount"><span>' + field['off'] + '% تخفیف</span></div></div>';
						  priceOne= '<span style="text-decoration:line-through;float:right;color: #ec0909;font-weight:600;font-size:13px">'+$.number(field['price'])+ " تومان </span>";
						  aval= off_price + ' تومان';
				        }
						if (website_status == 'on') {
						 if(field['cash_body'] != 0){
						  padd='padding:0;';
						  btnCashIinstallments='<button onClick="goToTwoLevel(&apos;' + avalprice + '&apos;,&apos;' + offprice + '&apos;,&apos;' + field['company_name'] + '&apos;)" data-toggle="modal" type="button" class="ant-btn btn-order-new ant-btn-lg" data-step="2" data-intro="برای سفارش بیمه نامه , از اینجا اقدام کنید"><i class="anticon anticon-shopping-cart"></i><span style="font-size:14px">سفارش نقدی</span></button>';
					     }
					     if(field['credit_body'] != 0){
						  btnAghsat = '<button onClick="goToTwoAghsat(&apos;2&apos;,&apos;' + avalprice + '&apos;,&apos;' + offprice + '&apos;,&apos;' + field['company_name'] + '&apos;,&apos;&apos;)" data-toggle="modal" type="button" class="ant-btn btn-order-new ant-btn-lg" style="margin-top:10px"><i class="anticon anticon-shopping-cart"></i><span style="font-size:14px">خرید اقساطی</span></button>';
					     }
					    }
					   if(field['has_gift']){
						 HasGift = '<i aria-label="icon: close" class="anticon anticon-check" title="'+field['has_gift']+'" style="padding-right:30px"></i>';
					   }else{
						 HasGift = '<i aria-label="icon: close" class="anticon anticon-close" style="padding-right:30px"></i>';  
					   }
                        var star = '<ul class="ant-rate ant-rate-disabled" tabindex="-1">'
                        for (var i = 0; i < field['solvency_level']; i++) {
                            star = star + '<li class="ant-rate-star ant-rate-star-full"><div class="ant-rate-star-first"><i class="anticon anticon-star"></i></div><div class="ant-rate-star-second"><i class="anticon anticon-star"></i></div></li>';
                        }
                        for (var j = field['solvency_level']; i < 5; i++) {
                            star = star + '<li class="ant-rate-star ant-rate-star-zero"><div class="ant-rate-star-first"><i class="anticon anticon-star"></i></div><div class="ant-rate-star-second"><i class="anticon anticon-star"></i></div></li>';
                        }
                        star = star + '</ul>';
						
				 if(takhfifcode > 0){
				   var newprice=parseInt(offprice)-parseInt(takhfifcode);
                   price = $.number(parseInt(newprice)+parseInt(gg)) + " تومان ";
				 }else{
				   price = $.number(parseInt(offprice)+parseInt(gg)) + " تومان "; 
				 }
						
						
                        t = t + '<div class="ant-row-flex ant-row-flex-middle itemList hasgift">' + darsadi +
                            '<div class="ant-col-xs-24 ant-col-sm-6 ant-col-md-6 ant-col-lg-6">' +
                            ' <a><img id="LogoImg" width="70" src="' + field['logo'] + '"></a>' +
                            '</div>' +
                            '<div class="ant-col-xs-24 ant-col-sm-6 ant-col-md-6 ant-col-lg-6">' +
                            '<div class="ant-progress ant-progress-line ant-progress-status-active ant-progress-small" style="padding-top:20px;font-size:12px">'+star+'</div>' +
                            '</div>' +
                            '<div class="ant-col-xs-24 ant-col-sm-6 ant-col-md-6 ant-col-lg-6">' +
                            '<div class="ant-progress ant-progress-line ant-progress-status-active ant-progress-small" style="padding-top:20px"><i aria-label="icon: close" class="anticon anticon-close"></i>'+HasGift+'</div>' +
                            '</div>' +
                            '<div class="ant-col-xs-24 ant-col-sm-6 ant-col-md-6 ant-col-lg-6">' +
                            '<div style="width:100%;border-style:none;' + padd + ';text-align: left; margin-left: 0; padding-left: 0;margin-bottom:10px">' + priceOne + '<span style="font-weight:600;color:#0f2d63;font-size:15px">' + aval + ' </span></div>' + btnCashIinstallments + btnAghsat + '</div>' +
                            '<div class="clearfix" style="height:12px;width:100%"></div>' +
                            '<div class="slideUpDow morecome" style="left:30px" id="morecome' + z + '" name="no" onclick="morecom(' + z + ');">اطلاعات بیشتر</div>' +
                            '</div>';
                        t = t + '<div class="subBoxList col-md-12 divcom" id="com' + z + '"><div class="ant-row"><div class="ant-col-xs-24 ant-col-sm-12">سهم از بازار : ' + field['market'] + ' درصد</div><div class="ant-col-xs-24 ant-col-sm-12">پرداخت خسارت سیار : <span>' + field['saiar'] + '</span></div><div class="ant-col-xs-24 ant-col-sm-12">رضایت مشتری (رتبه) : ' + field['rezayat'] + '</div><div class="ant-col-xs-24 ant-col-sm-12">تعداد مراکز پرداخت خسارت : ' + field['claim_center_num'] + '</div><div class="ant-col-xs-24 ant-col-sm-12">مدت زمان پاسخگویی به شکایات : ' + field['pasokh'] + ' روز</div><div class="ant-col-xs-24 ant-col-sm-12">سطح توانگری مالی : ' + star + '</div><div class="clearfix ant-col-xs-24 ant-col-sm-12"></div></div></div>';
                        z = z + 1;
                $('#CompareDiv').html(t);
            });
			if(is_result=='no'){
			  t = '<div class="ant-row-flex ant-row-flex-middle itemList hasgift" style="background:#fff1f0;border:1px solid #ffa39e">' +
                    '<div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24 ant-col-lg-24">' +
                    '<div class="ant-progress ant-progress-line ant-progress-status-active ant-progress-small" style="height: 40px; line-height: 50px; text-align:center;">' +
                    'نتیجه ای یافت نشد !</div>' +
                    '</div></div>';
              $('#CompareDiv').html(t);
			}
        });
    } else {
        t = '<div class="ant-row-flex ant-row-flex-middle itemList hasgift" style="background:#fff1f0;border:1px solid #ffa39e">' +
                    '<div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24 ant-col-lg-24">' +
                    '<div class="ant-progress ant-progress-line ant-progress-status-active ant-progress-small" style="height: 40px; line-height: 50px; text-align:center;">' +
                    'توجه! برای نمایش بسته های پیشنهادی بیمه بدنه ، اطلاعات مورد نیاز ( مشخص شده) را وارد نمایید.</div>' +
                    '</div></div>';
        $('#CompareDiv').html(t);   
    }
}

function VehicleType() {
    jQuery("#VehicleType").html("<option value=''>لطفا منتظر بمانید ...</option>")
    jQuery.getJSON("/api/car/CarType", {
        type: 'body'
    }, function(e) {
        var a = "<option value=''>نوع وسیله نقلیه</option>",
            o = 0;
        jQuery.each(e, function(e, l) {
            if (l.type == Vehicle_Type) {
                a = a + '<option value="' + l.type + '" selected>' + l.title + "</option>";
            } else {
                a = a + '<option value="' + l.type + '">' + l.title + "</option>";
            }
        })
        jQuery("#VehicleType").html(a)
		VehicleBrand()
    })
}

function VehicleBrand() {
    var vehicleType = $('#VehicleType').val()
    jQuery("#vehicleBrand").html("<option value=''>لطفا منتظر بمانید ...</option>")
    jQuery.getJSON("/api/car/CarList", {
		name:vehicleType,
		type:'body'
    }, function(e) {
        var a = "<option value=''>برند وسیله نقلیه</option>",
            o = 0;
        jQuery.each(e, function(e, l) {
            if (l.name == machine) {
                a = a + '<option value="' + l.name + '" selected>' + l.name + "</option>";
            } else {
                a = a + '<option value="' + l.name + '">' + l.name + "</option>";
            }
        })
        jQuery("#vehicleBrand").html(a)
    })
}

function VehicleModel() {
    var VehicleModel = $('#vehicleBrand').val()
    jQuery("#vehicleModel").html("<option value=''>لطفا منتظر بمانید ...</option>")
    jQuery.getJSON("/api/car/CarModel", {
        car: VehicleModel
    }, function(e) {
        var a = "<option value=''>مدل وسیله نقلیه</option>",
            o = 0;
        jQuery.each(e, function(e, l) {
            a = a + '<option value="' + l.name + ',' + l.type + ',' + l.id + '">' + l.name + "</option>";
        })
        jQuery("#vehicleModel").html(a)
    })
}
function coverage(value,type,i){
 var switcher=$('#switch'+i).attr('name')
 if(type == 'percentage'){
   if(switcher == 'no'){
    coverage_percant = parseInt(coverage_percant) + parseInt(value);
	$('#switch'+i).attr('name','yes')
   }else{
	coverage_percant = parseInt(coverage_percant) - parseInt(value); 
	$('#switch'+i).attr('name','no')
   }
 }else{
   if(switcher == 'no'){
    coverage_price = parseInt(coverage_price) + parseInt(value);
	$('#switch'+i).attr('name','yes')
   }else{
	coverage_price = parseInt(coverage_price) - parseInt(value);
    $('#switch'+i).attr('name','no')	
   }	
 }
 GetBime();
}
function offs(value,type,i){
 var switcher=$('#switch'+i).attr('name')
 if(type == 'percentage'){
   if(switcher == 'no'){
    offs_percant = parseInt(offs_percant) + parseInt(value);
	$('#switch'+i).attr('name','yes')
   }else{
	offs_percant = parseInt(offs_percant) - parseInt(value); 
	$('#switch'+i).attr('name','no')
   }
 }else{
   if(switcher == 'no'){
    offs_price = parseInt(offs_price) + parseInt(value);
	$('#switch'+i).attr('name','yes')
   }else{
	offs_price = parseInt(offs_price) - parseInt(value);
    $('#switch'+i).attr('name','no')	
   }	
 }
 GetBime();
}
function CoversBody() {
    $.getJSON("/api/v1/settings/CoversBody", function(e) {
        var a = "";
        $.each(e, function(e, l) {
            a = a + '<div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24"><div class="ant-row ant-form-item ant-form-no-margin"><div class="ant-form-item-control-wrapper"><div class="ant-form-item-control"><span id="cover_theft_by_break" style="float:left"><input type="checkbox" id="switch'+i_body+'" class="more" name="no" data-off="'+l.value+'" data-type="'+l.type+'" onclick="coverage(&apos;'+l.value+'&apos;,&apos;'+l.type+'&apos;,&apos;'+i_body+'&apos;)" style="margin:0;padding:0"/><label class="label" for="switch'+i_body+'">Toggle</label></span><label>'+l.name+'</label></div></div></div></div>';
			i_body++;
        })
        $("#CoversBody").html(a)
    })
}
function OffsBody() {
    $.getJSON("/api/v1/settings/OffsBody", function(e) {
        var a = "";
        $.each(e, function(e, l) {
            a = a + '<div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24"><div class="ant-row ant-form-item ant-form-no-margin"><div class="ant-form-item-control-wrapper"><div class="ant-form-item-control"><span id="cover_theft_by_break" style="float:left"><input type="checkbox" id="switch'+i_body+'" class="more" name="no" data-off="'+l.value+'" data-type="'+l.type+'" onclick="offs(&apos;'+l.value+'&apos;,&apos;'+l.type+'&apos;,&apos;'+i_body+'&apos;)" style="margin:0;padding:0"/><label class="label" for="switch'+i_body+'">Toggle</label></span><label>'+l.name+'</label></div></div></div></div>';
			i_body++;
        })
        $("#OffsBody").html(a)
    })
}

function offcode() {
    $('#codeoff').css('display', 'block').html('<div style="background-image:url(/assets/img/dots_3.gif);height:30px;width:30px;background-size:40px;background-position:center;margin: 0 auto;"></div>')
    var offcode = $('#inputcode').val();
    $.getJSON("/webservice/offcode", {
        code: offcode,
        type: 'thirdparty'
    }, function(e) {
        $.each(e, function(e, l) {
            if (l.status == 200) {
                $('#codeoffhidden').val(l.price + '#' + l.price_type);
                $('#inputcode').prop('disabled', 'disabled')
                $('#codeoff').html('<i aria-label="icon: close" class="anticon anticon-close" style="color:#0c0;padding-top:8px"></i>');
                change_price();
            } else {
                $('#codeoff').html('<i aria-label="icon: close" class="anticon anticon-close" style="color:#e00;padding-top:8px"></i>');
            }
        })
    })
}