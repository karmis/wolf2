function whoisAction() {
    var elBusy = $('#whois-domain-form .zanyat');
    var elAvail = $('#whois-domain-form .svoboden');
    var elError = $('#whois-domain-form .error');
    var elBtn = $('#whois-domain-form .submit');
    var resEl = $('#whois-domain-form .result');
    elBusy.css({'visibility': 'hidden', 'opacity': 0});
    elAvail.css({'visibility': 'hidden', 'opacity': 0});
    elError.css({'visibility': 'hidden', 'opacity': 0});
    var domain = $('#domain-input-whois').val().toLowerCase();
    var route = $('#whois-domain-form').attr('bs-action-path'); 
    var msg = "";
    if (isDomain(domain)) {
        elBtn.button('loading');
        request(route, {name: punycode.toASCII(domain)}, {
            success: function (xhr) {
                if (xhr.status) {
                    switch (xhr.status) {
                        case 'available':
                            elAvail.css({'visibility': 'visible', 'opacity': 1});
                            elAvail.find('#orderDomainButton').attr('bs-form-value', domain);
                            resEl.removeClass('color-red').addClass('color-green');
                            resEl.text('Свободен');
                            break;
                        case 'busy':
                            elBusy.css({'visibility': 'visible', 'opacity': 1});
                            resEl.removeClass('color-green').addClass('color-red');
                            resEl.text('Занят');
                            break;
                        case 'error':
                            elError.css({'visibility': 'visible', 'opacity': 1});
                            resEl.removeClass('color-green').addClass('color-red');
                            resEl.text('Неверно');
                            break;
                    }
                }

                elBtn.button('reset');
            }
        });
    } else {
        elError.css({'visibility': 'visible', 'opacity': 1});
        resEl.removeClass('color-green').addClass('color-red');
        resEl.text('Неверно');
    }
}

$(function(){
    // Whois
    $('[bs-action="whois"]').click(function () {
        whoisAction();
    });

    // Whois Enter
    $('input#domain-input-whois').keyup(function (e) {
        if (e.which == 13) {
            e.preventDefault();
            whoisAction();
        }
    });
})