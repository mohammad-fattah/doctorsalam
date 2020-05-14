var loc = '';
var loc1 = '';
var level = '';
var des = $('#des').text();
if (!des) {
    des = 'شخص ثالث و بدنه';
}
var url = '/';

function changeLang() {
    var val = $('.changeLang').val();
    window.location = url + val;
}

function GetModel() {
    var e = jQuery("#car").val().split(",");
    jQuery("#model").html("<option value=''>لطفا منتظر بمانید ...</option>")
    loc = loc + "/" + e[0] + "/";
    jQuery("#des").html(des + e[0]);
    des = e[0];
    jQuery.getJSON("/webservice/modelr.php", {
        car: des
    }, function(e) {
        jQuery.each(e, function(e, l) {
            var a = "<option value=''>مدل را انتخاب کنید</option>",
                o = 0;

            for (o = 0; o < l.length; o++) a = a + '<option value="' + l[o].name + ',' + l[o].id + '">' + l[o].name + "</option>";
            jQuery("#model").html(a)
        })
    })
}

function GetModelBody() {
    var e = jQuery("#car1").val().split(",");
    jQuery("#model1").html("<option value=''>لطفا منتظر بمانید ...</option>")
    loc = loc + "/" + e[0] + "/";
    jQuery("#des").html(des + e[0]);
    des = e[0];
    jQuery.getJSON(url + "model", {
        car: des
    }, function(e) {
        jQuery.each(e, function(e, l) {
            var a = "<option value=''>مدل را انتخاب کنید</option>",
                o = 0;

            for (o = 0; o < l.length; o++) a = a + '<option value="' + l[o].name + ',' + l[o].id + '">' + l[o].name + "</option>";
            jQuery("#model1").html(a)
        })
    })
}
function motors() {
    var car = $('#motor').serialize();
	//alert(car)
    window.location.href ="/webservice/newurlmotor.php?" + car;
}
function thirdparty() {
	var property = $('#thirdparty').serialize();
    window.location.href = "/webservice/newurl.php?" + property;
}

function goToThirdParty(){
	var car=jQuery('#car').val();
	var takhfif=jQuery('#off').val();
	var sal=jQuery('#sal').val();
	var model=jQuery('#model').val();
	var datepicker=jQuery('.datepicker').val();
	model=model.split(',');
	window.location.href ="/insurance/thirdparty/" + car + "/" + model[1] + "/" + takhfif + "/"+ sal + "/" + datepicker;	
}

function carbody() {
    var car = $('#body').serialize();
    window.location.href = url + "webservice/newurlbody.php?" + car;
}

function fire() {
    var car = $('#fire').serialize();
    window.location.href = url + "webservice/newurlfire.php?" + car;
}

function earthquake() {
    var car = $('#earthquake').serialize();
    window.location.href = url + "webservice/newurlearthquake.php?" + car;
}

function steponesales() {
    var c = jQuery('#car').val();
    var m = jQuery('#model').val();
    if (!c) {
        jQuery("#car").addClass('error');
    }
    if (!m) {
        jQuery("#model").addClass('error');
    }
    if (c && m) {
        var e = jQuery("#model").val().split(",");
        des = des + " , " + e[0]
        jQuery("#des").html(des)
        jQuery(".car").css("display", "none")
        jQuery(".sal").css("display", "block")
        var level = ".model,.car"
    }
    setTimeout(function() {
        jQuery("#car").removeClass('error');
        jQuery("#model").removeClass('error');
    }, 1000)
}

function GetModelModel1() {
    var e = jQuery("#model1").val().split(",");
    var m = e[0].replace(' ', '_');
    loc1 = loc1 + "/" + m + "/" + e[1], des = des + " , " + e[0], jQuery("#des").html(des), jQuery(".car1").css("display", "none"), level = ".model1,.car1", jQuery(".sal2").css("display", "block")
}

function GetModelP() {
    var e = jQuery("#price").val().split(",");
    des = des + " , ساخت : " + e[0], loc = loc + "/" + e[0], jQuery("#des").html(des), level = ".sal"
}

function GetModelP1() {
    var e = jQuery("#sal1").val().split(",");
    des = des + " , ساخت : " + e[0], loc1 = loc1 + "/" + e[0], jQuery("#des").html(des), level = ".sal1";
    jQuery("#pricebadane").attr("disabled", false)
}

function addpriceCar() {
    var e = jQuery("#takhfif1").val();
    jQuery("#des").html(des + " , ارزش خودرو : " + e + ' تومان ')
}

function GetModelT() {
    var c = jQuery('#sal').val();
    var m = jQuery('#takhfif').val();
    if (!c) {
        jQuery("#price").addClass('error');
    }
    if (!m) {
        jQuery("#takhfif").addClass('error');
    }
    setTimeout(function() {
        jQuery("#price").removeClass('error');
        jQuery("#takhfif").removeClass('error');
    }, 1000)
    if (c && m) {
        des = des + " , تخفیف : " + m
        jQuery("#des").html(des)
        jQuery(".sal").css("display", "none")
        level = ".takhfif"
        jQuery(".datee").css("display", "block")
        //jQuery("#pricesales").attr("disabled", !1)
    }
}

function GetModelD1() {
    var e = jQuery("#takhfif1").val();
    var m = jQuery('#sal1').val();
    if (!e) {
        jQuery("#takhfif1").addClass('error');
    }
    if (!m) {
        jQuery("#sal1").addClass('error');
    }
    setTimeout(function() {
        jQuery("#takhfif1").removeClass('error');
        jQuery("#sal1").removeClass('error');
    }, 1000)
    if (!e || !m) {

    } else {
        window.location.href = url + "insurance/carbody/" + loc1 + "/" + e;
    }
}

function GetPrice() {
    var takhasos = jQuery("#takhasos").val();
    //var expertise = jQuery("#expertise").val();
    //var m = expertise.replace(/\s/g, "_");
    var engagement = jQuery("#engagement").val();
    if (!takhasos || !engagement) {
        if (!takhasos) {
            jQuery("#takhasos").addClass('error')
        }
        //if(!expertise){jQuery("#expertise").addClass('error')} 
        if (!engagement) {
            jQuery("#engagement").addClass('error')
        }
        setTimeout(function() {
            jQuery("#takhasos").removeClass('error');
            //jQuery("#expertise").removeClass('error');	 
            jQuery("#engagement").removeClass('error');
        }, 1000)
    } else {
        window.location.href = url + "insurance/life/" + takhasos + "/" + engagement;
    }
}

function GetPricePet() {
    var animal = jQuery("#animal").val();
    var age = jQuery("#age").val();

    if (!animal || !age) {
        if (!animal) {
            jQuery("#animal").addClass('error')
        }
        if (!expertise) {
            jQuery("#age").addClass('error')
        }
        setTimeout(function() {
            jQuery("#animal").removeClass('error');
            jQuery("#age").removeClass('error');
        }, 1000)
    } else {
        window.location.href = url + "insurance/pet/" + animal + "/" + age;
    }
}

function GetPriceTravel() {
    var animal = jQuery("#maghsad").val();
    var age = jQuery("#modat").val();

    if (!animal || !age) {
        if (!animal) {
            jQuery("#maghsad").addClass('error')
        }
        if (!expertise) {
            jQuery("#modat").addClass('error')
        }
        setTimeout(function() {
            jQuery("#maghsad").removeClass('error');
            jQuery("#modat").removeClass('error');
        }, 1000)
    } else {
        window.location.href = url + "insurance/travel/" + animal + "/" + age;
    }
}

function GetPriceMotor() {
    var animal = jQuery("#maghsad").val();
    var age = jQuery("#modat").val();

    if (!animal || !age) {
        if (!animal) {
            jQuery("#maghsad").addClass('error')
        }
        if (!expertise) {
            jQuery("#modat").addClass('error')
        }
        setTimeout(function() {
            jQuery("#maghsad").removeClass('error');
            jQuery("#modat").removeClass('error');
        }, 1000)
    } else {
        window.location.href = url + "insurance/motor/" + animal + "/" + age;
    }
}

function GetPriceFire() {
    var e = jQuery("#building").val(),
        l = jQuery("#squer").val(),
        a = jQuery("#vtools").val();
    if (!e || !l || !a) {
        if (!e) {
            jQuery("#building").addClass('error');
        }
        if (!l) {
            jQuery("#squer").addClass('error');
        }
        if (!a) {
            jQuery("#vtools").addClass('error');
        }
        setTimeout(function() {
            jQuery("#building").removeClass('error');
            jQuery("#squer").removeClass('error');
            jQuery("#vtools").removeClass('error');
        }, 1000)
    } else {
        window.location.href = url + "insurance/fire/" + e + "/" + l + "/" + a
    }
}

function steponebadane() {
    var c = jQuery('#car1').val();
    var m = jQuery('#model1').val();
    if (!c) {
        jQuery("#car1").addClass('error');
    }
    if (!m) {
        jQuery("#model1").addClass('error');
    }
    setTimeout(function() {
        jQuery("#car1").removeClass('error');
        jQuery("#model1").removeClass('error');
    }, 1000)
}

function steptwosales() {
    var c = jQuery('#sal').val();
    var m = jQuery('#takhfif').val();
    if (!c) {
        jQuery("#price").addClass('error');
    }
    if (!m) {
        jQuery("#takhfif").addClass('error');
    }
    setTimeout(function() {
        jQuery("#price").removeClass('error');
        jQuery("#takhfif").removeClass('error');
    }, 1000)
}

function addbuilding() {
    var e = 'نوع ساختمان : ' + jQuery("#building").val();
    if (jQuery("#squer").val()) {
        e = e + " , متراژ : " + jQuery("#squer").val() + " مترمربع ";
    }
    if (jQuery("#vtools").val()) {
        e = e + " , ارزش اثاثیه : " + jQuery("#vtools").val() + " تومان ";
    }
    jQuery("#des").html(e)
}

function login() {
    jQuery("#errorLogin").css("display", "none");
    var e = jQuery("#user_password").val(),
        l = jQuery("#user_email").val();
    jQuery.getJSON(url + "webservice/login.php", {
        pass: e,
        user: l
    }, function(e) {
        jQuery.each(e, function(e, l) {
            if (l.length > 0) {
                jQuery(".success").css("display", "none");
                var a = '<a onclick="javascript:" style="cursor:pointer;float:right;font-size:13px">' + l[0].company_name + ' <a href="' + url + 'logout" style="text-decoration:none;font-size:13px;float:right;width:45px">(خروج)</a></a><span style="float:right;color:#fff">|</span><a href="panel" style="cursor:pointer;float:right;font-size:12px">ناحیه کاربری</a>';
                jQuery(".desci").html(a);
                jQuery("#hrefpanel").attr("href", url + "panel");

            } else jQuery("#errorLogin").css("display", "block")
        })
    })
}

function reminder() {
    var e = jQuery("#remind_bime").val(),
        l = jQuery("#rdate").val(),
        n = jQuery("#remind_name").val(),
        a = jQuery("#remind_phone").val(),
        o = jQuery("#remind_state").val(),
        s = jQuery("#remind_city").val();
    jQuery.getJSON(url + "webservice/reminder.php", {
        name: n,
        phone: a,
        state: o,
        city: s,
        bime: e,
        date: l
    }, function(e) {



    }), jQuery("#reminder").html("یادآور بیمه شما با موفقیت ثبت شد")
    //$.getJSON(url+"webservice/sms/src/remember.php",{n1:n,p1:a}, function() {alert('') });
    setTimeout(function() {
        jQuery("#reminder").html("ثبت بیمه")
    }, 5000);
}

function beforLevel() {
    ".model,.car" == level && (jQuery(".sal").css("display", "none"), jQuery(".model,.car").css("display", "block")), ".sal" == level && (level = ".model,.car", jQuery(".takhfif").css("display", "none"), jQuery(".sal").css("display", "block")), ".takhfif" == level && (level = ".sal", jQuery(".datee").css("display", "none"), jQuery(".takhfif").css("display", "block"))
}