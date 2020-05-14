function payment_continute() {
    $('#login-button').click();
    return false;
}

var pre_tax_price, tax_cost, delivery_cost;
var on_purchase_discount_amount = 0;
var discountable_remaining_price = 0;
var account_use = 0;
var income_use = 0;
$(document).ready(function($) {
    $('#id_account_order_payment').on('change', function() {
        if ($('#id_account_order_payment').is(':checked')) {
            $('.wallet_li').addClass('active');
        } else {
            $('.wallet_li').removeClass('active');
        }
    });
    $('#id_inviter_credit').on('change', function() {
        if ($('#id_inviter_credit').is(':checked')) {
            $('.inviter_credit_li').addClass('active');
        } else {
            $('.inviter_credit_li').removeClass('active');
        }
    });
    $('.item-discount').click(function() {
        $('#discount_span').text('0');
        $("#id_credit").val($("#id_credit option:first").val());
        on_purchase_discount_amount = 0;
        update_price()
        $(this).toggleClass('active');
        $('.discountcodeform').fadeToggle();
        $('.item-voucher').removeClass('active');
        $('.voucherform').hide();
    })
    $('.item-voucher').click(function() {

        $('#id_discount_code').val('');

        $('#discount_span').text('0');
        on_purchase_discount_amount = 0;
        update_price()

        $(this).toggleClass('active');
        $('.voucherform').fadeToggle();
        $('.item-discount').removeClass('active');
        $('.discountcodeform').hide();
    })
    $('#paymentway input').on('change', function() {
        if ($('input[name=payment_way]:checked', '#paymentway').val() == 'pose') {

            $('#final_payment').html('تایید نهایی')

            $('.online').removeClass('active');
            $('.cardtocard').removeClass('active');
            $('.homeway').addClass('active');
            $('.cardtocardform').fadeOut();
        } else if ($('input[name=payment_way]:checked', '#paymentway').val() == 'online') {
            $('#final_payment').html('تایید نهایی و پرداخت')
            $('.homeway').removeClass('active');
            $('.cardtocard').removeClass('active');
            $('.online').addClass('active');
            $('.cardtocardform').fadeOut();
        } else if ($('input[name=payment_way]:checked', '#paymentway').val() == 'card') {
            $('#final_payment').html('تایید نهایی و پرداخت')

            $('.online').removeClass('active');
            $('.homeway').removeClass('active');
            $('.cardtocard').addClass('active');
            $('.cardtocardform').fadeIn();
        }
    });

    $('#id_payment_way').change(function() {
        if ($('#id_payment_way').val() == 'card') {
            $('#id_offline_tracking_code').show()
        } else {
            $('#id_offline_tracking_code').hide()
        }
    });

    $('#terms_agreement').change(function() {
        if ($('#terms_agreement').is(':checked')) {
            $(".terms_agreement").hide();
            $("#final_payment").prop('disabled', false);

        } else {
            $(".terms_agreement").show();
            $("#final_payment").prop('disabled', true);
        }
    })
    $('#final_payment').click(function() {
        window.location.href = "/api/pay/send.php";
    })
    $('#back_payment').click(function() {

    })
});

$('select#id_credit').on('change', function() {
    do_promotion()
})