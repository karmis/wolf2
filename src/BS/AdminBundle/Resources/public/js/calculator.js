
////////////  САЙТ-ВИЗИТКА  //////////////
function podschet1() {
	// debugger;
    $('label[for="site_vizitka_gotoviy"]').on('click', function() {
        $('#site_vizitka_mini').prop("checked", 1);
    });
    $('label[for="site_vizitka_individualniy"]').click(function(e) {
		$('#site_vizitka_rashirenniy').prop("checked", 1);
    });
    var cena = 0;
    var skidka = 0;
    if ($('#site_vizitka_gotoviy').prop("checked")) {
        $('#site_vizitka_mini').prop("disabled", 0);
        $('#site_vizitka_mini').removeClass("blocked");
        $('#site_vizitka_standart').prop("disabled", 0);
        $('#site_vizitka_standart').removeClass("blocked");
        $('#site_vizitka_rashirenniy').prop("disabled", 1);
        $('#site_vizitka_rashirenniy').addClass("blocked");
    }
    if ($('#site_vizitka_individualniy').prop("checked")) {
        $('#site_vizitka_mini').prop("disabled", 1);
        $('#site_vizitka_mini').addClass("blocked");
        $('#site_vizitka_standart').prop("disabled", 1);
        $('#site_vizitka_standart').addClass("blocked");

        
        $('#site_vizitka_rashirenniy').removeClass("blocked");
        $('#site_vizitka_rashirenniy').prop('disabled', false);
    }
    if ($('#site_vizitka_razrabotka_logotipa').prop("checked")) {
        cena += 4990;
    } //разработка логотипа

    if ($('#site_vizitka_razrabotka_bannerov').prop("checked") && ($('#site_vizitka_k').val() == 1 || $('#site_vizitka_k').val() == 2)) {
        cena += 690 * $('#site_vizitka_k').val();
    } //разработка баннеров (1,2 шт)
    if ($('#site_vizitka_razrabotka_bannerov').prop("checked") && $('#site_vizitka_k').val() >= 3) {
        cena += 590 * $('#site_vizitka_k').val();
    } //разработка баннеров (от 3 шт)
    if ($('#site_vizitka_gotoviy').prop("checked") && $('#site_vizitka_mini').prop("checked")) {
        cena += 2390;
        skidka = 50; //готовый мини
        $('#site_vizitka_gotoviy_mini_dop').removeClass("hidden");
        $('#site_vizitka_gotoviy_standart_dop').addClass("hidden");
        $('#site_vizitka_gotoviy_rashireniy_dop').addClass("hidden");
        $('#site_vizitka_individualniy_rashireniy_dop').addClass("hidden");
    }
    if ($('#site_vizitka_gotoviy').prop("checked") && $('#site_vizitka_standart').prop("checked")) {
        cena += 4950;
        skidka = 50; //готовый стандарт
        $('#site_vizitka_gotoviy_mini_dop').addClass("hidden");
        $('#site_vizitka_gotoviy_standart_dop').removeClass("hidden");
        $('#site_vizitka_gotoviy_rashireniy_dop').addClass("hidden");
        $('#site_vizitka_individualniy_rashireniy_dop').addClass("hidden");
    }
    if ($('#site_vizitka_gotoviy').prop("checked") && $('#site_vizitka_rashirenniy').prop("checked")) {
        cena += 9990;
        skidka = 50; //готовый расширенный
        $('#site_vizitka_gotoviy_mini_dop').addClass("hidden");
        $('#site_vizitka_gotoviy_standart_dop').addClass("hidden");
        $('#site_vizitka_gotoviy_rashireniy_dop').removeClass("hidden");
        $('#site_vizitka_individualniy_rashireniy_dop').addClass("hidden");
    }
    if ($('#site_vizitka_individualniy').prop("checked") && $('#site_vizitka_rashirenniy').prop("checked")) {
        cena += 33900;
        skidka = 20; //индивидуальный расширенный
        $('#site_vizitka_gotoviy_mini_dop').addClass("hidden");
        $('#site_vizitka_gotoviy_standart_dop').addClass("hidden");
        $('#site_vizitka_gotoviy_rashireniy_dop').addClass("hidden");
        $('#site_vizitka_individualniy_rashireniy_dop').removeClass("hidden");
    }
    if ($('#site_vizitka_copyright').prop("checked")) {
        cena += 590 * $('#site_vizitka_k2').val();
    } //копирайтинг
    $('#site_vizitka_skidka').text(skidka);
    if ($('#site_vizitka_checkbox_skidka').prop("checked") == 0) {
        skidka = 0;
    }
    skidka = cena * skidka / 100;
    cena -= Math.round(skidka);
    cena = Number.prototype.toFixed.call(parseFloat(cena) || 0, 0).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1 ");
    $('#site_vizitka_cena').text(cena);
}
////////////  ИНТЕРНЕТ-МАГАЗИН  //////////////
function podschet2() {
    $('label[for="internet-magazin_gotoviy"]').on('click', function() {
        $('#internet-magazin_katalog_bez_korzini').prop("checked", 1);
    });
    $('label[for="internet-magazin_individualniy"]').on('click', function() {
        $('#internet-magazin_katalog_bez_korzini').prop("checked", 0);
        $('#internet-magazin_katalog_s_korzinoy').prop("checked", 0);
    });
    var cena = 0;
    var skidka = 0;
    if ($('#internet-magazin_gotoviy').prop("checked")) {
        $('#internet-magazin_katalog_s_korzinoy').prop("disabled", 0);
        $('#internet-magazin_katalog_s_korzinoy').removeClass("blocked");
        $('#internet-magazin_katalog_bez_korzini').prop("disabled", 0);
        $('#internet-magazin_katalog_bez_korzini').removeClass("blocked");
    }
    if ($('#internet-magazin_individualniy').prop("checked")) {
        $('#internet-magazin_katalog_bez_korzini').prop("disabled", 1);
        $('#internet-magazin_katalog_bez_korzini').addClass("blocked");
        $('#internet-magazin_katalog_s_korzinoy').prop("disabled", 1);
        $('#internet-magazin_katalog_s_korzinoy').addClass("blocked");
    }
    if ($('#internet-magazin_razrabotka_logotipa').prop("checked")) {
        cena += 4990;
    } //разработка логотипа
    if ($('#internet-magazin_razrabotka_bannerov').prop("checked") && ($('#internet-magazin_k').val() == 1 || $('#internet-magazin_k').val() == 2)) {
        cena += 690 * $('#internet-magazin_k').val();
    } //разработка баннеров (1,2 шт)
    if ($('#internet-magazin_razrabotka_bannerov').prop("checked") && $('#internet-magazin_k').val() >= 3) {
        cena += 590 * $('#internet-magazin_k').val();
    } //разработка баннеров (от 3 шт)
    if ($('#internet-magazin_gotoviy').prop("checked") && $('#internet-magazin_katalog_bez_korzini').prop("checked")) {
        cena += 14950;
        skidka = 30; //готовый каталог без корзины
        $('#internet-magazin_gotoviy_katalog_bez_korzini_dop').removeClass("hidden");
        $('#internet-magazin_gotoviy_katalog_s_korzinoy_dop').addClass("hidden");
        $('#internet-magazin_individualniy_dop').addClass("hidden");
    }
    if ($('#internet-magazin_gotoviy').prop("checked") && $('#internet-magazin_katalog_s_korzinoy').prop("checked")) {
        cena += 19990;
        skidka = 30; //готовый каталог с корзиной
        $('#internet-magazin_gotoviy_katalog_bez_korzini_dop').addClass("hidden");
        $('#internet-magazin_gotoviy_katalog_s_korzinoy_dop').removeClass("hidden");
        $('#internet-magazin_individualniy_dop').addClass("hidden");
    }
    if ($('#internet-magazin_individualniy').prop("checked")) {
        cena += 51950;
        skidka = 20; //индивидуальный
        $('#internet-magazin_gotoviy_katalog_bez_korzini_dop').addClass("hidden");
        $('#internet-magazin_gotoviy_katalog_s_korzinoy_dop').addClass("hidden");
        $('#internet-magazin_individualniy_dop').removeClass("hidden");
    }
    if ($('#internet-magazin_copyright').prop("checked")) {
        cena += 590 * $('#internet-magazin_k2').val();
    } //копирайтинг
    $('#internet-magazin_skidka').text(skidka);
    if ($('#internet-magazin_checkbox_skidka').prop("checked") == 0) {
        skidka = 0
    }
    skidka = cena * skidka / 100;
    cena -= Math.round(skidka);
    cena = Number.prototype.toFixed.call(parseFloat(cena) || 0, 0).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1 ");
    $('#internet-magazin_cena').text(cena);
}
////////////  КОРПОРАТИВНЫЙ САЙТ  //////////////
function podschet3() {
    var cena = 0;
    var skidka = 0;
    if ($('#korparativniy-site_gotoviy').prop("checked")) {
        $('#korparativniy-site_standart').prop("disabled", 0);
        $('#korparativniy-site_standart').removeClass("blocked");
        $('#korparativniy-site_standart').prop("checked", 1);
        $('#korparativniy-site_rashireniy').prop("disabled", 1);
        $('#korparativniy-site_rashireniy').addClass("blocked");
        $('#korparativniy-site_rashireniy').prop("checked", 0);
    }
    if ($('#korparativniy-site_individualniy').prop("checked")) {
        $('#korparativniy-site_standart').prop("disabled", 1);
        $('#korparativniy-site_standart').addClass("blocked");
        $('#korparativniy-site_standart').prop("checked", 0);
        $('#korparativniy-site_rashireniy').prop("disabled", 0);
        $('#korparativniy-site_rashireniy').removeClass("blocked");
        $('#korparativniy-site_rashireniy').prop("checked", 1);
    }
    if ($('#korparativniy-site_razrabotka_logotipa').prop("checked")) {
        cena += 4990;
    } //разработка логотипа
    if ($('#korparativniy-site_razrabotka_bannerov').prop("checked") && ($('#korparativniy-site_k').val() == 1 || $('#korparativniy-site_k').val() == 2)) {
        cena += 690 * $('#korparativniy-site_k').val();
    } //разработка баннеров (1,2 шт)
    if ($('#korparativniy-site_razrabotka_bannerov').prop("checked") && $('#korparativniy-site_k').val() >= 3) {
        cena += 590 * $('#korparativniy-site_k').val();
    } //разработка баннеров (от 3 шт)
    if ($('#korparativniy-site_gotoviy').prop("checked") && $('#korparativniy-site_standart').prop("checked")) {
        cena += 11950;
        skidka = 30; //готовый стандарт
        $('#korparativniy-site_gotoviy_standart_dop').removeClass("hidden");
        $('#korparativniy-site_individualniy_dop').addClass("hidden");
        $('.korparativniy-site_dizayn').text("готовый");
        $('.korparativniy-site_kompl').text("/ стандарт");
    }
    if ($('#korparativniy-site_individualniy').prop("checked") && $('#korparativniy-site_rashireniy').prop("checked")) {
        cena += 45300;
        skidka = 20; //индивидуальный расширенный
        $('#korparativniy-site_gotoviy_standart_dop').addClass("hidden");
        $('#korparativniy-site_individualniy_dop').removeClass("hidden");
    }
    if ($('#korparativniy-site_copyright').prop("checked")) {
        cena += 590 * $('#korparativniy-site_k2').val();
    } //копирайтинг
    $('#korparativniy-site_skidka').text(skidka);
    if ($('#korparativniy-site_checkbox_skidka').prop("checked") == 0) {
        skidka = 0
    }
    skidka = cena * skidka / 100;
    cena -= Math.round(skidka);
    cena = Number.prototype.toFixed.call(parseFloat(cena) || 0, 0).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1 ");
    $('#korparativniy-site_cena').text(cena);
}
////////////  LANDING-PAGE  //////////////
function podschet4() {
    var cena = 0;
    var skidka = 0;
    if ($('#landing-page_gotoviy').prop("checked")) {
        cena += 3950;
        skidka = 50; //готовый
        $('#landing-page_gotoviy_dop').removeClass("hidden");
        $('#landing-page_individualniy_dop').addClass("hidden");
    }
    if ($('#landing-page_individualniy').prop("checked")) {
        cena += 24950;
        skidka = 20; //индивидуальный
        $('#landing-page_gotoviy_dop').addClass("hidden");
        $('#landing-page_individualniy_dop').removeClass("hidden");
    }
    if ($('#landing-page_razrabotka_logotipa').prop("checked")) {
        cena += 4990;
    } //разработка логотипа
    if ($('#landing-page_razrabotka_bannerov').prop("checked") && ($('#landing-page_k').val() == 1 || $('#landing-page_k').val() == 2)) {
        cena += 690 * $('#landing-page_k').val();
    } //разработка баннеров (1,2 шт)
    if ($('#landing-page_razrabotka_bannerov').prop("checked") && $('#landing-page_k').val() >= 3) {
        cena += 590 * $('#landing-page_k').val();
    } //разработка баннеров (от 3 шт)
    $('#landing-page_skidka').text(skidka);
    if ($('#landing-page_checkbox_skidka').prop("checked") == 0) {
        skidka = 0
    }
    skidka = cena * skidka / 100;
    cena -= Math.round(skidka);
    cena = Number.prototype.toFixed.call(parseFloat(cena) || 0, 0).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1 ");
    $('#landing-page_cena').text(cena);
}

function podschet() {
    if ($('form[name="site_vizitka"]').length == 1) {
        podschet1();
    }
    if ($('form[name="internet-magazin"]').length == 1) {
        podschet2();
    }
    if ($('form[name="korparativniy-site"]').length == 1) {
        podschet3();
    }
    if ($('form[name="landing-page"]').length == 1) {
        podschet4();
    }
}

$(function(){
	podschet();
	$('form[bs-form-type="calculator_order"]').on('submit', function (e) {
	    e.preventDefault();
	    $('.btn-podrobnee').button('loading');
	    var form = $(this);
	    var sbmt = $(this).find('#submit');
	    form.find('input[bs-id="form-reference"]').val(document.location.href);
	    form.find('input[bs-id="form-calc-price"]').val(form.find("[name='cena']").text());
	    var data = form.serialize();
	    var route = form.attr('bs-action-path');  
	    request(route, data, {
	        success: function (xhr) {
	            $('.btn-podrobnee').button('reset');
	            if (xhr.responseJSON && xhr.responseJSON.answer == 'ok') {
	                alertify.success(sbmt.attr('bs-form-success'));
	                
	            }
	            $.fancybox.close();
	        }, error: function () {
	            $('.btn-podrobnee').button('reset');
	            $.fancybox.close();
	            alertify.error(sbmt.attr('bs-form-error'));
	        }
	    }, 'post');
	});
	
    if ($('#calculate').length == 1) {
        var offset = $(".forma_zakaza").offset();
        var topPadding = $('#calculate').offset().top;        
        $(window).scroll(function () {
    //        debugger;
            var scroolL = $(this).scrollTop();
            topPadding = $('#calculate').offset().top;     
           
            /*if (scroolL <= (topPadding+ $('#calculate').height())) {
                if (scroolL > (offset.top - topPadding)) {
                    console.log('marginTop' +  ((scroolL-topPadding) + 2500+ 2048));
                    $(".forma_zakaza").stop().animate({marginTop: (scroolL-topPadding) + 2500+2048});
                }
                else {
                    console.log('marginTop' + 0);
                    $(".forma_zakaza").stop().animate({marginTop: 0});
                }
            }*/ 
            scroolL+=20;  
            
            if (scroolL > topPadding + $('#calculate').height() - $(".forma_zakaza").height() ) {
                console.log('MAX');
                $(".forma_zakaza").stop().animate({marginTop: $('#calculate').height() - $(".forma_zakaza").height()}, 200);
            }
            else if (scroolL > topPadding ) {
                $(".forma_zakaza").stop().animate({marginTop: scroolL - topPadding }, 200);
            }
            else {
                $(".forma_zakaza").stop().animate({marginTop: 0}, 200);
            }
        });
    }


	$('form[name="site_vizitka"] *').click(podschet1);
	$('form[name="internet-magazin"] *').on('click', podschet2);
	$('form[name="korparativniy-site"] *').on('click', podschet3);
	$('form[name="landing-page"] *').on('click', podschet4);

	$('input#site_vizitka_k').change(function(){
	    $(this).parent().find('input#site_vizitka_razrabotka_bannerov').prop('checked', true);
		podschet1();
	});
	$('input#internet-magazin_k').change(function(){
	    $(this).parent().find('input#internet-magazin_razrabotka_bannerov').prop('checked', true);
	    podschet2();
	});
	$('input#korparativniy-site_k').change(function(){
	    $(this).parent().find('input#korparativniy-site_razrabotka_bannerov').prop('checked', true);
	    podschet3();
	});
	$('input#landing-page_razrabotka_bannerov').change(function(){
	    $(this).parent().find('input#landing-page_k').prop('checked', true);
	    podschet4();
	});

	$('input#site_vizitka_k2').change(function(){
	    $(this).parent().find('input#korparativniy-site_copyright').prop('checked', true);
	    podschet1();
	});
	$('input#internet-magazin_k2').change(function(){
	    $(this).parent().find('input#korparativniy-site_copyright').prop('checked', true);
	    podschet2();
	});
	$('input#korparativniy-site_k2').change(function(){
	    $(this).parent().find('input#korparativniy-site_copyright').prop('checked', true);
	    podschet3();
	});



});
