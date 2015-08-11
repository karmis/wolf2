function validatePhis(form) {
    var fio = form.find('input[name="fio_phis"]');
    var email = form.find('input[name="email_phis"]');
    var amount = form.find('input[name="amount_phis"]');
    var phone = form.find('input[name="tel_phis"]');
    var isErrors = false;
    if(!fio.val()){
        fio.addClass('red-border-for-input');
        isErrors = true;
    } else {
        fio.removeClass('red-border-for-input');
    }

    if(!email.val() || !isEmail(email.val())){
        email.addClass('red-border-for-input');
        isErrors = true;
    } else {
        email.removeClass('red-border-for-input');
    }

    if(!amount.val() || !$.isNumeric(amount.val())){
        amount.addClass('red-border-for-input');
        isErrors = true;
    } else {
        amount.removeClass('red-border-for-input');
    }

    if(!phone.val()){
        phone.addClass('red-border-for-input');
        isErrors = true;
    } else {
        phone.removeClass('red-border-for-input');
    }

    return isErrors?false:true;
}

function validateJur(form) {
    var fio = form.find('input[name="fio_jur"]');
    var email = form.find('input[name="email_jur"]');
    var amount = form.find('input[name="amount_jur"]');
    var phone = form.find('input[name="tel_jur"]');
    var organization = form.find('input[name="organization"]');
    var inn = form.find('input[name="inn"]');
    var ogrn = form.find('input[name="ogrn"]');
    var kpp = form.find('input[name="kpp"]');
    var bik = form.find('input[name="bik"]');
    var pc = form.find('input[name="pc"]');
    var ks = form.find('input[name="ks"]');
    var basis = form.find('input[name="basis"]');
    var legalAddress = form.find('input[name="legalAddress"]');
    var mailAddress = form.find('input[name="mailAddress"]');
    var isErrors = false;

    if(!inn.val() || !$.isNumeric(inn.val()) || !(inn.val().length == 10 || inn.val().length == 12)){
        inn.addClass('red-border-for-input');
        isErrors = true;
    } else {
        inn.removeClass('red-border-for-input');
    }

    if(!kpp.val() || !$.isNumeric(kpp.val()) || !(kpp.val().length == 9 || kpp.val().length == 10 || kpp.val() == 0)){
        kpp.addClass('red-border-for-input');
        isErrors = true;
    } else {
        kpp.removeClass('red-border-for-input');
    }

    if(!ogrn.val() || !$.isNumeric(ogrn.val()) || !(ogrn.val().length == 13 || ogrn.val().length == 15)){
        ogrn.addClass('red-border-for-input');
        isErrors = true;
    } else {
        ogrn.removeClass('red-border-for-input');
    }

    if(!pc.val() || !$.isNumeric(pc.val()) || !(pc.val().length == 20)){
        pc.addClass('red-border-for-input');
        isErrors = true;
    } else {
        pc.removeClass('red-border-for-input');
    }

    if(!ks.val() || !$.isNumeric(ks.val()) || !(ks.val().length == 20)){
        ks.addClass('red-border-for-input');
        isErrors = true;
    } else {
        ks.removeClass('red-border-for-input');
    }

    if(!fio.val()){
        fio.addClass('red-border-for-input');
        isErrors = true;
    } else {
        fio.removeClass('red-border-for-input');
    }

    if(!bik.val()){
        bik.addClass('red-border-for-input');
        isErrors = true;
    } else {
        bik.removeClass('red-border-for-input');
    }

    if(!organization.val()){
        organization.addClass('red-border-for-input');
        isErrors = true;
    } else {
        organization.removeClass('red-border-for-input');
    }

    if(!legalAddress.val()){
        legalAddress.addClass('red-border-for-input');
        isErrors = true;
    } else {
        legalAddress.removeClass('red-border-for-input');
    }

    if(!mailAddress.val()){
        mailAddress.addClass('red-border-for-input');
        isErrors = true;
    } else {
        mailAddress.removeClass('red-border-for-input');
    }

    if(!basis.val()){
        basis.addClass('red-border-for-input');
        isErrors = true;
    } else {
        basis.removeClass('red-border-for-input');
    }

    if(!email.val() || !isEmail(email.val())){
        email.addClass('red-border-for-input');
        isErrors = true;
    } else {
        email.removeClass('red-border-for-input');
    }

    if(!amount.val() || !$.isNumeric(amount.val())){
        amount.addClass('red-border-for-input');
        isErrors = true;
    } else {
        amount.removeClass('red-border-for-input');
    }

    if(!phone.val()){
        phone.addClass('red-border-for-input');
        isErrors = true;
    } else {
        phone.removeClass('red-border-for-input');
    }

    return isErrors?false:true;
}

function paymentPhis(el, form, isReceipt) {
    if (true !== validatePhis(form)) {
        alertify.error("Форма заполнена неверно. <br />Проверьте правильность заполнения полей!");
        return false;
    }
    $(el).button('loading');
    form.find('input').prop('readonly', 'readonly');
    var data = form.serialize();
    request(form.attr('bs-action-path'), data, {
        success: function(xhr) {
            if(isReceipt){
                $(el).button('reset');
                alertify.success("Квитанциия успешно создана.");
                var downloadEl = "<a href='"+xhr.uri+"' target='_blank' class='print' id='downloadRecieptLink'>Скачать</a>";
                form.find('#phis_reciept_wrap').html(downloadEl);
            } else {
                alertify.success("Оплата зарегистрирвоана в системе. <br /> Через несколько секунд вы будете перенаправлены на платежный сервис");
                var realForm = $('form#realPaymentForm');
                var amount = $('#payment_form #amount_phis').val();
                realForm.find('input#mnt_amount').val(amount);
                setTimeout(function(){
                    form.find('input').prop('readonly', null);
                    $(el).button('reset');
                    realForm.submit();

                }, 3000);
            }
        },
        error: function() {
            $(el).button('reset');
            form.find('input').prop('readonly', null);
            if(isReceipt){
                alertify.error("Невозможно создать квитанцию в настоящий момент. Попробуйте позже.");
            } else {
                alertify.error("Оплата в настоящий момент невозможна. Попробуйте позже.");
            }
        }
    });
}

function paymentJur(el, form) {
    if (true !== validateJur(form)) {
        alertify.error("Форма заполнена неверно. <br />Проверьте правильность заполнения полей!");
        return false;
    }
    $(el).button('loading');
    form.find('input').prop('readonly', 'readonly');
    var data = form.serialize();
    request(form.attr('bs-action-path'), data, {
        success: function(xhr) {
            $(el).button('reset');
            form.find('input').prop('readonly', null);
            alertify.success("Квитанциия успешно создана.");
            var downloadEl = "<a href='"+xhr.uri+"' target='_blank' class='btn yuri' id='downloadRecieptLink'>Скачать</a>";
            form.find('#payment_jur_wrap').html(downloadEl);
        },
        error: function() {
            $(el).button('reset');
            form.find('input').prop('readonly', null);
            alertify.error("Невозможно создать квитанцию в настоящий момент. Попробуйте позже.");
        }
    });
}


function calcCommissionPhis(amount) {
    if(amount && $.isNumeric(amount)){
        var amount = parseFloat(amount);
        var amountWithCommission = (amount + (amount*0.033));
    } else {
        var amount = amountWithCommission = 0;
    }

    $('#payment_phis_commission_bank').text(amountWithCommission); // 3.3
    $('#payment_phis_commission_reciept').text(amount);
}

function calcCommissionJur(amount) {
    if(amount && $.isNumeric(amount)){
        $('#payment_jur_commission').text(amount);
    }
}

$(function() {
    var form = $('#payment_form');
    var postEqYuri = form.find('input#postEqYuri');
    var phisAmount = form.find('input#amount_phis');
    var jurAmount = form.find('input#amount_jur');
    
    form.find('input.phone-number').mask("+9(999)999-99-99");
    
    calcCommissionPhis(phisAmount.val());
    calcCommissionJur(jurAmount.val());
    phisAmount.keyup(function(){
        calcCommissionPhis($(this).val());

    });

    jurAmount.keyup(function(){
        calcCommissionJur($(this).val());

    });

    postEqYuri.change(function(){
        if(postEqYuri.prop('checked') == true){
            $('#mailAddress').val($('#legalAddress').val());
        }
    });

    $("[bs-action-type='payment']").click(function(e) {
        e.preventDefault();
        var paymentType = $(this).attr('payment-type');
        form.find('input[name="payment_type"]').val(paymentType);
        if (paymentType == 'payment_phis') {
            paymentPhis($(this), form, false);
        } else if (paymentType == 'payment_jur') {
            paymentJur($(this), form);
        } else if (paymentType == 'phis_reciept') {
            form.find('input[name="with_reciept"]').val(1);
            paymentPhis($(this), form, true);
            form.find('input[name="with_reciept"]').val(0);
        }
    });
    // // Обрабокта формы оплаты
    // $('#receipt_comission_val_individual').text($('#amount').val());
    // $('form#individual_form_payment #mnt_amount_individual').val(parseFloat($('#amount').val()) + parseFloat($('#amount').val())*0.033);
    // $('#receipt_comission_val_individual_bank').text(parseFloat($('#amount').val()) + parseFloat($('#amount').val())*0.033);
    // $('#individual_form_payment #amount').keyup(function(){
    //     $('form#individual_form_payment #mnt_amount_individual').val(parseFloat($('#amount').val()) + parseFloat($('#amount').val())*0.033);
    //     $('#receipt_comission_val_individual').text($(this).val());
    //     $('#receipt_comission_val_individual_bank').text(parseFloat($('#amount').val()) + parseFloat($('#amount').val())*0.033);
    // });
    // $('#postEqYuri').change(function(){
    //     if($('#postEqYuri').prop('checked') == true){
    //         $('#mailAddress').val($('#legalAddress').val());
    //     }
    // });
    // // Оплата через банк физ лицом
    // $('#individual_form_payment #individual_submit').on('click', function() {
    //     var errors = false;
    //     $(this).button('loading');
    //     $.each($('#individual_form_payment').find('input'), function(key, el){
    //         if($.trim($(el).val()).length == 0){
    //             errors = true;
    //         }
    //     });
    //     if(errors === true){
    //         $(this).button('reset');
    //         alert('Все поля обязательны для заполнения');
    //         return false;
    //     }
    //     $('form#individual_form_payment #mnt_amount_individual').val(parseFloat($('#receipt_comission_val_individual_bank').text()));
    //     $.ajax({
    //         url: $('#individual_form_payment').attr('bs-action'),
    //         type: 'post',
    //         data: $('#individual_form_payment').serialize(),
    //         // async: false,
    //         success: function(data) {
    //             $(this).button('reset');
    //             $('#individual_form_payment').submit();
    //         },
    //         error: function() {
    //             $(this).button('reset');
    //             // alert('Произошла ошибка при проведение платежа. ');
    //         }
    //     });
    // });
    // // Квитанции на оплату(физ)
    // $('#print_receipts_individual').click(function(){
    //     var errors = false;
    //     // validate
    //     $.each($('#individual_form_payment').find('input'), function(key, el){
    //         if($.trim($(el).val()).length == 0){
    //             errors = true;
    //         }
    //     });
    //     if(errors === true){
    //         alert('Все поля обязательны для заполнения');
    //         return false;
    //     }
    //     var url = $(this).attr('bs-form-action');
    //     request(url, $('form#individual_form_payment').serialize(), {
    //         success: function(data){
    //             $(this).button('reset');
    //             $('#print_receipts_individual').attr('href', data.responseJSON.uri);
    //             $('#print_receipts_individual').attr('target', '_blank');
    //             $('#print_receipts_individual').text('Скачать');
    //         }
    //     });
    // });
    // // Квитанции на оплату(юр)
    // $('#legal_form_payment #legal_submit').on('click', function() {
    //     $(this).button('loading');
    //     var errors = false;
    //     $.each($('#legal_form_payment').find('input'), function(key, el){
    //         if($.trim($(el).val()).length == 0){
    //             errors = true;
    //         }
    //     });
    //     if(errors === true){
    //         $(this).button('reset');
    //         alert('Все поля обязательны для заполнения');
    //         return false;
    //     }
    //     $.ajax({
    //         url: $('#legal_form_payment').attr('bs-action'),
    //         type: 'post',
    //         data: $('#legal_form_payment').serialize(),
    //         // async: false,
    //         success: function(data) {
    //             $(this).button('reset');
    //             $('#legal_submit').attr('href', data.uri);
    //             $('#legal_submit').attr('target', '_blank');
    //             $('#legal_submit').text('Скачать счет');
    //         },
    //         error: function() {
    //             $(this).button('reset');
    //             // alert('Произошла ошибка при проведение платежа. ');
    //         }
    //     });
    // });
})