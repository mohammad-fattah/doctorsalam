function payment_continute(){return $("#login-button").click(),!1}var pre_tax_price,tax_cost,delivery_cost,on_purchase_discount_amount=0,discountable_remaining_price=0,account_use=0,income_use=0;$(document).ready(function(e){e("#id_account_order_payment").on("change",function(){e("#id_account_order_payment").is(":checked")?e(".wallet_li").addClass("active"):e(".wallet_li").removeClass("active")}),e("#id_inviter_credit").on("change",function(){e("#id_inviter_credit").is(":checked")?e(".inviter_credit_li").addClass("active"):e(".inviter_credit_li").removeClass("active")}),e(".item-discount").click(function(){e("#discount_span").text("0"),e("#id_credit").val(e("#id_credit option:first").val()),on_purchase_discount_amount=0,update_price(),e(this).toggleClass("active"),e(".discountcodeform").fadeToggle(),e(".item-voucher").removeClass("active"),e(".voucherform").hide()}),e(".item-voucher").click(function(){e("#id_discount_code").val(""),e("#discount_span").text("0"),on_purchase_discount_amount=0,update_price(),e(this).toggleClass("active"),e(".voucherform").fadeToggle(),e(".item-discount").removeClass("active"),e(".discountcodeform").hide()}),e("#paymentway input").on("change",function(){"pos"==e("input[name=payment_way]:checked","#paymentway").val()?(e(".online").removeClass("active"),e(".cash").removeClass("active"),e(".card").removeClass("active"),e(".pos").addClass("active")):"online"==e("input[name=payment_way]:checked","#paymentway").val()?(e("#final_payment").html("تایید نهایی و پرداخت"),e(".card").removeClass("active"),e(".cash").removeClass("active"),e(".pos").removeClass("active"),e(".online").addClass("active")):"card"==e("input[name=payment_way]:checked","#paymentway").val()?(e("#final_payment").html("تایید نهایی و پرداخت"),e(".online").removeClass("active"),e(".cash").removeClass("active"),e(".pos").removeClass("active"),e(".card").addClass("active")):"cash"==e("input[name=payment_way]:checked","#paymentway").val()&&(e("#final_payment").html("تایید نهایی و پرداخت"),e(".online").removeClass("active"),e(".card").removeClass("active"),e(".pos").removeClass("active"),e(".cash").addClass("active"))}),e("#id_payment_way").change(function(){"card"==e("#id_payment_way").val()?e("#id_offline_tracking_code").show():e("#id_offline_tracking_code").hide()}),e("#terms_agreement").change(function(){e("#terms_agreement").is(":checked")?(e(".terms_agreement").hide(),e("#final_payment").prop("disabled",!1)):(e(".terms_agreement").show(),e("#final_payment").prop("disabled",!0))}),e("#final_payment").click(function(){e("#terms_agreement").is(":checked")?window.location.href="/api/pay/send.php":e(".terms_agreement").show()}),e("#back_payment").click(function(){})}),$("select#id_credit").on("change",function(){do_promotion()});