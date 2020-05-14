var coverage_percant = 0;
var coverage_price = 0;
var offs_percant = 0;
var offs_price = 0;
$(window).on('load', function() {
    GetBime();
    CoversFire();
    $('#price,#squer,#vtools,.totaltaahod').number(true);
    $('.more').on('click', function() {
        var name = $(this).attr('name');
        var nam = $(this).attr('date-name');
        if (name == 'no') {
            $(this).css('background-color', '#12a3c1').css('color', '#fff')
            $(this).attr('name', 'yes')
            poshesh[nam] = 1;
            if (nam == 0 || nam == 1 || nam == 2) {
                $('.posh' + nam).css('display', 'block')
            }
            GetBime();
        } else {
            $(this).css('background-color', '#fff').css('color', '#252525')
            $(this).attr('name', 'no')
            poshesh[nam] = 1;
            if (nam == 0 || nam == 1 || nam == 2) {
                $('.posh' + nam).css('display', 'none')
            }
            GetBime();
        }
    })
})

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

function goToTwoLevel(nprice, mprice, company) {
    var sque = squer;
    var price = vtools;
    var meter = $('#fprice').val();
    if (username) {
        $.ajax({
            type: "GET",
            url: "/webservice/fire/l1",
            data: "build=" + building + "&squer=" + sque + "&vtool=" + price + "&pp=" + nprice + "&poshesh=" + poshesh + "&meter=" + meter,
            success: function() {

            }
        })
        $('.divmain').css('display', 'none')
        $('.divpic').css('display', 'block')
        $('.tsalesprice').html($.number(nprice) + ' تومان ')
    } else {
        $('#divlogin').css('display', 'flex')
    }
}

function fprice1() {
    
    pricemeters = $("#fprice").val();
    vtools = $("#vtools").val();
    squer = $("#squer").val();
    if (pricemeters == '') {
        pricemeters = '1000000';
    }
    if (vtools == '') {
        vtools = '1';
    }
    if (squer == '') {
        squer = '1';
    }
    tprice = parseInt(pricemeters) * parseInt(squer);
    tprice = tprice + parseInt(vtools);
    var ttp = $.number(tprice);
    $(".totaltaahod").val(ttp);
    isok = true;
    GetBime();
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
    $('.divpic').css('display', 'none')
    $('.divmain').css('display', 'block')
}

function block_address() {
    var property = $('#property_build').serializeArray()
    var isok = true;
    var pro = '';
    $.each(property, function(i, field) {
        $('#' + field.name).css('border', '1px solid #f6f6f6')
        pro += ',' + field.name + ' : ' + field.value;
        if (field.value == '') {
            $('#' + field.name).css('border', '1px solid #f00')
            isok = false
        }
    });
    if (isok == true) {
        $.ajax({
            type: "GET",
            url: "/webservice/fire/l2",
            data: property,
            success: function(data) {}
        })
        $('#block_property').css('display', 'none')
        $('#block_address').css('display', 'block')
    }
}

function back_address() {
    $('#block_address').css('display', 'none')
    $('#block_pic').css('display', 'block')
}

function block_time() {
    $('.flname1').html($('#flname').val());
    $('.phone1').html($('#phone').val());
    $('.cellphone1').html($('#cellphone').val());
    $('.address1').html($('#city').val() + ' , ' + $('#address').val());
    var name = $('#flname').val();
    var phone = $('#phone').val();
    var cellphone = $('#cellphone').val();
    var address = $('#address').val();
    var city = $('#city').val();
    var f = 0;
    if (name && phone && cellphone && address && city) {
        f = 1;
    } else {
        f = 0;
        if (!name) {
            $('#flname').css('border-color', 'rgb(238, 111, 117)');
        } else {
            $('#flname').css('border-color', '#cacaca');
        }
        if (!phone) {
            $('#phone').css('border-color', 'rgb(238, 111, 117)');
        } else {
            $('#phone').css('border-color', '#cacaca');
        }
        if (!cellphone) {
            $('#cellphone').css('border-color', 'rgb(238, 111, 117)');
        } else {
            $('#cellphone').css('border-color', '#cacaca');
        }
        if (!address) {
            $('#address').css('border-color', 'rgb(238, 111, 117)');
        } else {
            $('#address').css('border-color', '#cacaca');
        }
        if (!city) {
            $('.divstate').css('border', '1px solid rgb(238, 111, 117)');
        } else {
            $('.divstate').css('border', '1px solid #d9d9d9');
        }
        window.scrollTo(0, 0);
    }
    if (f == '1') {
        var datai = $('#reciverForm').serialize();
        $.ajax({
            url: "/webservice/fire/l3",
            type: "GET",
            data: datai,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('#block_address').css('display', 'none');
                $('#block_payment').css('display', 'block')
                window.scrollTo(0, 0);
            }
        });
    } else {
        $('.banki').val('تایید و پرداخت');
    }

}

function back_time() {
    $('#block_time').css('display', 'none')
    $('#block_address').css('display', 'block')
}

function change_price() {
    GetBime();
}

function GetBime() {
    var backi = '',
        backii = '';
    var salesPrice = 0;
    var numsales = 0;
    var aval = 0;
    var z = 0;
    var order = $('#order_company').val();
    if (!order) {
        order = 'low';
    }
    if (isok) {
		var Coverage_Val = $(".CoverageVal").val();
        $('#CompareDiv').html('<div style="width:100%;height:200px;background-image:url(/assets/img/dots_3.gif);background-position:center center;background-repeat:no-repeat;background-size:100px;margin-bottom:20px;background-color:#fff"></div>');
        $.getJSON('/api/price/fire?metraj=' + squer + '&pmetraj=' + pricemeters + '&vtools=' + vtools + '&poshesh=' + poshesh.toString() + '&order_company=dana&orderi=' + order+'&type=residential&coveragepercant='+coverage_percant+'&coverageprice='+coverage_price+'&offspercant='+offs_percant+'&offsprice='+offs_percant+'&CoverageVal='+Coverage_Val, function(result) {
            var is_result='no',t='';
            $.each(result, function(i, field) {
				 if(field['tariff']){
				   //var offprice=field['tariff'].split(',').join('');
				   var offprice=field['tariff'];
				 }
				 if(field['aval']){
                   var avalprice=field['aval'].split(',').join('');
				 }
				 /*if(offcode){
                  var codeoff=offcode.split('#');
				 }*/
				 
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
						
						if(field['cash_body'] != 0){
						 padd='padding:0;';
						 btnCashIinstallments='<button onClick="goToTwoLevel(&apos;' + avalprice + '&apos;,&apos;' + offprice + '&apos;,&apos;' + field['company_name'] + '&apos;)" data-toggle="modal" type="button" class="ant-btn btn-order-new ant-btn-lg" data-step="2" data-intro="برای سفارش بیمه نامه , از اینجا اقدام کنید"><i class="anticon anticon-shopping-cart"></i><span style="font-size:14px">سفارش نقدی</span></button>';
					   }
					   if(field['credit_body'] != 0){
						 btnAghsat = '<button onClick="goToTwoAghsat(&apos;2&apos;,&apos;' + avalprice + '&apos;,&apos;' + offprice + '&apos;,&apos;' + field['company_name'] + '&apos;,&apos;&apos;)" data-toggle="modal" type="button" class="ant-btn btn-order-new ant-btn-lg" style="margin-top:10px"><i class="anticon anticon-shopping-cart"></i><span style="font-size:14px">خرید اقساطی</span></button>';
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
						
				 /*if(takhfifcode > 0){
				   var newprice=parseInt(offprice)-parseInt(takhfifcode);
                   price = $.number(parseInt(newprice)+parseInt(gg)) + " تومان ";
				 }else{
				   price = $.number(parseInt(offprice)+parseInt(gg)) + " تومان "; 
				 }*/
						
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
        var t = '<div class="ant-row-flex ant-row-flex-middle itemList hasgift" style="background:#fff1f0;border:1px solid #ffa39e">' +
            '<div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24 ant-col-lg-24">' +
            '<div class="ant-progress ant-progress-line ant-progress-status-active ant-progress-small" style="height: 40px; line-height: 50px; text-align:center;">' +
            'توجه! برای نمایش بسته های پیشنهادی بیمه آتش سوزی ، اطلاعات مورد نیاز ( مشخص شده) را وارد نمایید.</div>' +
            '</div></div>'
        $('#CompareDiv').html(t);
    }
}
function coverage(value,type,i){
 var switcher=$('#switch'+i).attr('name')
 if(type == 'percentage'){
   if(switcher == 'no'){
    coverage_percant = parseFloat(coverage_percant) + parseFloat(value);
	$('#switch'+i).attr('name','yes')
   }else{
	coverage_percant = parseFloat(coverage_percant) - parseFloat(value); 
	$('#switch'+i).attr('name','no')
   }
 }else{
   if(switcher == 'no'){
    coverage_price = parseFloat(coverage_price) + parseFloat(value);
	$('#switch'+i).attr('name','yes')
   }else{
	coverage_price = parseFloat(coverage_price) - parseFloat(value);
    $('#switch'+i).attr('name','no')	
   }	
 }
 GetBime();
}
function CoverageBtn(){
  var switcher=$('#switch20').attr('name')
  if(switcher == 'no'){
	$('#switch20').attr('name','yes')
    $('.CoverageBtn').css('display','block')
  }else{
	$('#switch20').attr('name','no')
	$('.CoverageBtn').css('display','none') 
  }
}
function CoversFire() {
    $.getJSON("/api/v1/settings/CoversFire", function(e) {
        var a = "";
        var i = 0;
        $.each(e, function(e, l) {
			a = a + '<div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24"><div class="ant-row ant-form-item ant-form-no-margin"><div class="ant-form-item-control-wrapper"><div class="ant-form-item-control"><span id="cover_theft_by_break" style="float:left"><input type="checkbox" id="switch'+i+'" class="more" name="no" data-off="'+l.value+'" data-type="'+l.type+'" onclick="coverage(&apos;'+l.value+'&apos;,&apos;'+l.type+'&apos;,&apos;'+i+'&apos;)" style="margin:0;padding:0"/><label class="label" for="switch'+i+'">Toggle</label></span><label>'+l.name+'</label></div></div></div></div>';
			i++;
        })
        $("#CoversFire").html(a)
    })
}