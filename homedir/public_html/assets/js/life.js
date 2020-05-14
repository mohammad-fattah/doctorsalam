var i_body=0;
var coverage_percant = 0;
var coverage_price = 0;
var offs_percant = 0;
var offs_price = 0;
$(window).on('load', function() {
	CoversLife();
    GetBime();
})
$(document).ready(function() {
    $('#price').number(true);
    $('.more').on('click', function() {
        var name = $(this).attr('name');
        var nam = $(this).attr('date-name');
        if (name == 'no') {
            $(this).css('background-color', '#12a3c1').css('color', '#fff')
            $(this).attr('name', 'yes')
            poshesh[nam] = 1;
            GetBime();
        } else {
            $(this).css('background-color', '#fff').css('color', '#252525')
            $(this).attr('name', 'no')
            poshesh[nam] = 0;
            GetBime();
        }
    })
});

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

function goToTwoLevel(nprice, mprice) {
    var fullurl = window.location.href;
    if (username) {
        $.ajax({
            type: "GET",
            url: "/webservice/life/l1.php",
            data: "url=" + fullurl,
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

function change_price() {
    isok = 1;
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
    $('#block_address').css('display', 'none')
    $('#block_time').css('display', 'block')
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
            url: "/webservice/fire/l3.php",
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

function GetBime() {
    var backi = '',
        backii = '';
    var salesPrice = 0;
    var numsales = 0;
    var aval = 0;
    var z = 0;
	var price=$('.price').val();
	var per_death=$('.per_death').val();
    if (isok > 0) {
        $('#CompareDiv').html('<div style="width:100%;height:200px;background-image:url(/assets/img/dots_3.gif);background-position:center center;background-repeat:no-repeat;background-size:100px;margin-bottom:20px;background-color:#fff"></div>');
        
		$.getJSON('/api/price/life.php?type=child&price=' + price + '&modat=' + modat + '&poshesh=' + poshesh.toString() + '&orderi=low&order_company=dana&perdeath='+per_death, function(result) {
            var t = '';
            var is_result = 'no';
            $.each(result, function(i, field) {
                is_result = 'ok';
                var ff = field['tariff'];
                var tarif = ff + " تومان ";
                aval = $.number(field['aval']) + ' تومان';
                var offl = $.number(field['off']);
                var payeh = $.number(parseInt(field['aval']) + parseInt(field['off']));
                var bimehshee = $.number(Math.floor((salesPrice * (parseInt(field['darsad']))) / 100));
                badane = $.number((parseInt(field['tariff']) / 10000));
                badanePrice = parseInt(field['tariff']);
                badane = badane + " امتیاز ";
                var darsadi = '';
                var porforosh = '';
                var btnAghsat = '';
                var btnCashIinstallments = '';
                var priceOne = '';
                var padd = 'padding-top:20px;';
                if (field['company_url_name'] == 'dana') {
                    padd = 'padding:0;';
                    btnCashIinstallments = '<button onClick="goToTwoLevel(&apos;' + field['aval'] + '&apos;,&apos;' + field['company_name'] + '&apos;)" data-toggle="modal" type="button" class="ant-btn btn-order-new ant-btn-lg"><i class="anticon anticon-shopping-cart"></i><span> سفارش</span></button>';
                }

                var star = '<ul class="ant-rate ant-rate-disabled" tabindex="-1">'
                for (var i = 0; i < field['solvency_level']; i++) {
                    star = star + '<li class="ant-rate-star ant-rate-star-full"><div class="ant-rate-star-first"><i class="anticon anticon-star"></i></div><div class="ant-rate-star-second"><i class="anticon anticon-star"></i></div></li>';
                }
                for (var j = field['solvency_level']; i < 5; i++) {
                    star = star + '<li class="ant-rate-star ant-rate-star-zero"><div class="ant-rate-star-first"><i class="anticon anticon-star"></i></div><div class="ant-rate-star-second"><i class="anticon anticon-star"></i></div></li>';
                }
                star = star + '</ul>';
                t = t + '<div class="ant-row-flex ant-row-flex-middle itemList hasgift">' + darsadi + porforosh +
                    '<div class="ant-col-xs-24 ant-col-sm-6 ant-col-md-6 ant-col-lg-6">' +
                    ' <a><img id="LogoImg" width="70" src="' + field['logo'] + '"></a>' +
                    '</div>' +
                    '<div class="ant-col-xs-24 ant-col-sm-6 ant-col-md-6 ant-col-lg-6">' +
                    '<div class="ant-progress ant-progress-line ant-progress-status-active ant-progress-small" style="padding-top:20px;font-size:12px">' + star + '</div>' +
                    '</div>' +
                    '<div class="ant-col-xs-24 ant-col-sm-6 ant-col-md-6 ant-col-lg-6">' +
                    '<div class="ant-progress ant-progress-line ant-progress-status-active ant-progress-small" style="padding-top:20px">'+field['price_die']+'</div>' +
                    '</div>' +
                    '<div class="ant-col-xs-24 ant-col-sm-6 ant-col-md-6 ant-col-lg-6">' +
                    '<div class="ant-btn" style="width:100%;border-style:none;' + padd + ';text-align: left; margin-left: 0; padding-left: 0;"><span style="font-weight:100;color:#0f2d63;font-size:12px">ارزش بازخرید : </span><span style="font-weight:600;color:#0f2d63;font-size:15px">' + aval + ' </span></div>' + btnCashIinstallments + '</div>' +
                    '<div class="clearfix" style="height:12px;width:100%"></div>' +
                    '<div class="slideUpDow morecome" style="left:30px" id="morecome' + z + '" name="no" onclick="morecom(' + z + ');">اطلاعات بیشتر</div>' +
                    '</div>';
                t = t + '<div class="subBoxList col-md-12 divcom" id="com' + z + '"><div class="ant-row"><div class="ant-col-xs-24 ant-col-sm-12">حق بیمه پرداختی سالانه :<span style="float:left"><span style="float:left">' + payeh + ' تومان</span></span></div><div class="ant-col-xs-24 ant-col-sm-12">جمع : <span style="float:left">' + payeh + ' تومان</span></div><div class="ant-col-xs-24 ant-col-sm-12">پوششهای اضافی : <span style="float:left">' + payeh + ' تومان</span></div><div class="ant-col-xs-24 ant-col-sm-12">عمر و تامین آتیه : <span><span style="float:left">' + payeh + ' تومان</span></span></div><div class="ant-col-xs-24 ant-col-sm-12">حادثه : <span style="float:left">' + field['price_die'] + '</span></div><div class="ant-col-xs-24 ant-col-sm-12">نقص عضو حادثه : <span style="float:left">' + payeh + ' تومان</span></div><div class="ant-col-xs-24 ant-col-sm-12">ازکار افتادگی به هر علت : <span style="float:left">' + payeh + ' تومان</span></div><div class="ant-col-xs-24 ant-col-sm-12">بیماری خاص : <span style="float:left">' + payeh + ' تومان</span></div><div class="ant-col-xs-24 ant-col-sm-12">سرمایه فوت : <span style="float:left">' + payeh + ' تومان</span></div><div class="ant-col-xs-24 ant-col-sm-12">هزینه پزشکی : <span style="float:left">' + payeh + ' تومان</span></div><div class="clearfix ant-col-xs-24 ant-col-sm-12"></div></div></div>';
                z = z + 1;
                $('#CompareDiv').html(t);
            });
            if (is_result == 'no') {
                var tt = '<div class="ant-row-flex ant-row-flex-middle itemList hasgift" style="background:#fff1f0;border:1px solid #ffa39e">' +
                    '<div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24 ant-col-lg-24">' +
                    '<div class="ant-progress ant-progress-line ant-progress-status-active ant-progress-small" style="height: 40px; line-height: 50px; text-align:center;">' +
                    'توجه! برای نمایش بسته های پیشنهادی بیمه عمر ، اطلاعات مورد نیاز ( مشخص شده) را وارد نمایید.</div>' +
                    '</div></div>';
                $('#CompareDiv').html(tt);
            }
        });
    } else {
        var tt = '<div class="ant-row-flex ant-row-flex-middle itemList hasgift" style="background:#fff1f0;border:1px solid #ffa39e">' +
            '<div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24 ant-col-lg-24">' +
            '<div class="ant-progress ant-progress-line ant-progress-status-active ant-progress-small" style="height: 40px; line-height: 50px; text-align:center;">' +
            'توجه! برای نمایش بسته های پیشنهادی بیمه عمر ، اطلاعات مورد نیاز ( مشخص شده) را وارد نمایید.</div>' +
            '</div></div>';
        $('#CompareDiv').html(tt);
    }
}
function CoversLife() {
    $.getJSON("/api/v1/settings/CoversLife", function(e) {
        var a = "";
        $.each(e, function(e, l) {
            a = a + '<div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24"><div class="ant-row ant-form-item ant-form-no-margin"><div class="ant-form-item-control-wrapper"><div class="ant-form-item-control"><span id="cover_theft_by_break" style="float:left"><input type="checkbox" id="switch'+i_body+'" class="more" name="no" data-off="'+l.value+'" data-type="'+l.type+'" onclick="coverage(&apos;'+l.value+'&apos;,&apos;'+l.type+'&apos;,&apos;'+i_body+'&apos;)" style="margin:0;padding:0"/><label class="label" for="switch'+i_body+'">Toggle</label></span><label>'+l.name+'</label></div></div></div></div>';
			i_body++;
        })
        $("#CoversLife").html(a)
    })
}