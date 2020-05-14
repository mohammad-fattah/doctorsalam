var $imageupload;

function IsCodemeli(c) {
    var e, o, r = 0;
    if (c.length < 10) return !1;
    if (10 == c.length) {
        if ("1111111111" == c || "0000000000" == c || "2222222222" == c || "3333333333" == c || "4444444444" == c || "5555555555" == c || "7777777777" == c || "8888888888" == c || "9999999999" == c) return !1
    } else if ("0" == c.charAt(0) && "0" == c.charAt(1) && "0" == c.charAt(2) && "0" == c.charAt(3) && "0" == c.charAt(4) && "0" == c.charAt(5) && "0" == c.charAt(6)) return !1;
    for (o = parseInt(c.charAt(9)), i = 1; i <= 9; i++) r += parseInt(c.charAt(i - 1) * (11 - i));
    return (e = parseInt(r % 11)) < 2 && e == o || 2 < e && o == 11 - e
}
$(document).ready(function(c) {
    var r = 0,
        s = 0,
        a = 0,
        l = 0,
        p = 0,
        t = 0,
        n = 0;
    $("#imgcar").on("change", function(c) {
        $("#onepic").html("در حال آپلود ....");
        var e = $("#uploadForm")[0],
            o = new FormData(e);
        c.preventDefault(), $.ajax({
            url: "/webservice/insurance/upload.php",
            type: "POST",
            data: o,
            contentType: !1,
            cache: !1,
            processData: !1,
            success: function(c) {
                $("#onepic").html(c), "آپلود با موفقیت انجام شد" == c && ($("#onepic").css("color", "#41cc2d"), r = 1, $(".blockpic1").css("border-color", "#41cc2d"), $(".plus1").css("color", "#41cc2d"))
            }
        })
    }), 
	   $(".backcompare").on("click", function(c) {
        $(".info").css("display", "none")
    }), $(".btnupload").on("click", function(c) {
        $(".errorPic").html("");
        var e = IsCodemeli($("#melli_code").val());
        if ($("#melli_code").css("border-color", "#d9d9d9"), 1 == e) {
            var o = $("#InsuranceProfile").serialize();
            "1" == r && "1" == s && "1" == a ? ($.ajax({
                url: "/webservice/insurance/uploadok.php",
                type: "GET",
                data: o,
                contentType: !1,
                cache: !1,
                processData: !1
            }), $("#block_pic").css("display", "none"), $("#block_address").css("display", "block"), window.scrollTo(0, 0)) : (window.scrollTo(0, 0), $(".errorPic").html("تمام تصاویر را آپلود نمایید"), "1" != r && ($(".blockpic1").css("border-color", "#ee6f75"), $("#onepic").css("color", "#ee6f75"), $(".plus1").css("color", "#ee6f75")), "1" != s && ($(".blockpic2").css("border-color", "#ee6f75"), $("#twopic").css("color", "#ee6f75"), $(".plus2").css("color", "#ee6f75")), "1" != a && ($(".blockpic3").css("border-color", "#ee6f75"), $("#threepic").css("color", "#ee6f75"), $(".plus3").css("color", "#ee6f75")), "1" != n && ($(".blockpic4").css("border-color", "#ee6f75"), $("#fourpic").css("color", "#ee6f75"), $(".plus4").css("color", "#ee6f75")))
	} else {
	  if($("#melli_code").val()){
		$("#melli_code").css("border-color", "#ee6f75"), $(".errorPic").html("کد ملی وارد شده اشتباه است")
	  }else{
		$("#melli_code").css("border-color", "#ee6f75"), $(".errorPic").html("کد ملی را وارد کنید")  
	  }
	}
    })

	$(".btnuploadcheck").on("click", function(c) {
        $(".errorPic").html(" "), "1" == l && "1" == p && "1" == t ? ($.ajax({
            url: "/webservice/insurance/uploadcheckok.php",
            type: "POST",
            contentType: !1,
            cache: !1,
            processData: !1
        }), $("#block_aghsat").css("display", "none"), $("#block_pic").css("display", "block")) : ($(".errorPic").html("تمام تصاویر را آپلود نمایید"), "1" != l && ($(".blockpic4").css("border-color", "#ee6f75"), $("#onepic4").css("color", "#ee6f75"), $(".plus4").css("color", "#ee6f75")), "1" != p && ($(".blockpic5").css("border-color", "#ee6f75"), $("#twopic5").css("color", "#ee6f75"), $(".plus5").css("color", "#ee6f75")), "1" != t && ($(".blockpic6").css("border-color", "#ee6f75"), $("#threepic6").css("color", "#ee6f75"), $(".plus6").css("color", "#ee6f75")))
    })
});