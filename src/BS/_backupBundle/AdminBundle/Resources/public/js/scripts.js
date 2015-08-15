function nc_scrollMenuFix() {
    var num = 90; //number of pixels before modifying styles
    $(window).bind('scroll', function () {
        if ($(window).scrollTop() > num) {
            $('#cbp-hsmenu-wrapper').addClass('fixed');
        } else {
            $('#cbp-hsmenu-wrapper').removeClass('fixed');
        }
    });
}
$(function () {
    nc_scrollMenuFix();
    $('.tabs').tab();
    $('.open-close-menu').bind('click', function () {
        if ($('.cbp-hsmenu > li:not(:first-child)').css('display') == 'none') {
            $(this).parents('nav').eq(0).addClass('menuIsOpenNow');
            $('.cbp-hsmenu > li:not(:first-child)').css({'display': 'block'});
        } else {
            $('.cbp-hsmenu > li:not(:first-child)').css({'display': 'none'});
            $(this).parents('nav').eq(0).removeClass('menuIsOpenNow');
        }
    });

    $("[data-toggle=popover]").popover({html: true});


    $('label[for="read_more"]').on('click', function () {
        if ($('#read_more').prop('checked')) {
            $('label[for="read_more"]').text("Читать далее");
        } else {
            $('label[for="read_more"]').text("Скрыть");
        }
    });


    $('label[for="read_more2"]').on('click', function () {
        if ($('#read_more2').prop('checked')) {
            $('label[for="read_more2"]').text("Читать далее");
        } else {
            $('label[for="read_more2"]').text("Скрыть");
        }
    });

    $('label[for="read_more3"]').on('click', function () {
        if ($('#read_more3').prop('checked')) {
            $('label[for="read_more3"]').text("Читать далее");
        } else {
            $('label[for="read_more3"]').text("Скрыть");
        }
    });

    if ($('#cbp-hsmenu-wrapper').length > 0) {
        var menu = new cbpHorizontalSlideOutMenu(document.getElementById('cbp-hsmenu-wrapper'));
    }


    if ($('.bxslider').length > 0) {
        $('.bxslider').bxSlider({
            slideWidth: 200,
            minSlides: 1,
            maxSlides: 5,
            slideMargin: 20,
        });
        setInterval(function(){
            $('.bx-viewport').css('height', '200px');    
        }, 100);
        
    }

    if ($("#completedSites .fancybox").length) {
        $("#completedSites .fancybox").fancybox({
            padding: 0,
            'width': "45%",
            'autoDimensions': false,
            beforeShow: function (links, index) {
                var src = (this.element).attr('src');
                $('#orderSite img#activeNowSiteItem').attr('src', src);
            }
        });
    } else {
        if ($('.fancybox').length > 0) {
            $(".fancybox").fancybox({
                afterShow: function(){
                    var type = this.element.attr('bs-action-type');
                    switch(type) {
                        case 'feedback':
                            prepareFeedbackForm(this.element);
                            break;
                        case 'order_advertising':
                            prepareOrderAdwerstingForm(this.element);
                            break;
                        case 'order_hosting':
                            prepareOrderHostingForm(this.element);
                            break;
                            break;
                        case 'order_domain':
                            prepareOrderDomainForm(this.element);
                            break;

                        default:
                            
                            break;
                    }
                },
                padding: 35
            });
        }
    }

    if ($(".portfolioListing").length) {
        $(".portfolioListing").quicksandpaginated({
            wrapper: ".portfolioListing",
            container: '.fn-portfolioCarrousel',
            containerWidth: 745,
            containerHeight: 800,
            thumbs: "article",
            hoverContainers: '.preview',
            filtersContainer: ".portfolio-filters",
            filters: "li",
            prev: ".carrousel_prev",
            next: ".carrousel_next",
            pageNumberContainer: ".portfolioCarrousel_nav",
            thumbsHeight: 174,
            thumbsWidth: 211,
            transitionSpeed: 0,
            callback: function (c) {
                c.trigger("complete");
                $('.portfolioCarrousel_nav ul li span').parent().addClass('pageActive');
            }
        });
        $('.portfolioCarrousel_nav ul li span').parent().addClass('pageActive');
        $(document).on('click', '.portfolioCarrousel_nav ul li', function () {
            $(this).find('a').trigger('click')
        });
    }




    // Select active calc type
    if($('.calc-type-item').length > 0){
        $('.calc-type-item').eq(0).prop('checked', true);
    }

    $('[bs-id="dontknow"]').click(function(){
        if($('.dontknow').hasClass('cbp-hsitem-open')){
            return false;
        }
        //$('.dontknow .cbp-hssubmenu').hide();
        //$('.dontknow .cbp-hssubmenu-small').hide();
       request($(this).attr('bs-action'), {}, {
           success: function(xhr){
               var tpl = '';
               if(xhr.length > 0){
                   $.each(xhr, function(key, obj){
                       tpl +=  "<li>"+obj.caption+"<br /><a href='"+obj.href+"'>"+obj.href+"</a>";
                   });
                   $('.dontknow ol').html(tpl);
                   //$('.dontknow .cbp-hssubmenu').show();
                   //$('.dontknow .cbp-hssubmenu-small').show();
               }
           }
       })
    });
    $("dl.faq dt, dl.faq-index dt").click(function() {
      var $this = $(this);
      var $dd = $(this).next();

      if ($this.hasClass('active')) {
        $this.removeClass('active');
        $dd.removeClass('active');
        $dd.hide(150);
      } else {
        $("dl.faq dt").removeClass('active');
        $("dl.faq dd").removeClass('active').hide(150);
        $this.addClass('active');
        $dd.addClass('active');
        $dd.show(150);
      }
      return false;
    });

    var activetab = 0;
    var $wmatt = $('.web-money-attestat');
    $wmatt.hide();
    var $tabs = $('.payment ul.tabs li');
    var $tabContent = $('.paytabs.tab-content');    
    var showTabContent = function(index){
      $tabContent.hide().css('opacity' , '0');
      $tabContent.filter("[data-index='"+index+"']").show().animate({'opacity' : '100'}, 1500);
      if (index ==0) {
        $wmatt.show().css('opacity', '0').animate({'opacity' : '100'}, 150);
      } else {
        $wmatt.hide();
      }
    }    
    $tabs.click(function(){
      $tabs.removeClass('active');
      activetab = parseInt($(this).attr('data-index'));
      $tabs.eq(activetab).addClass('active');
      showTabContent(activetab);
      return false;
    });
    $tabs.removeClass('active');
    $tabs.eq(activetab).addClass('active');
    showTabContent(activetab);

    $('.gotovie li a').click(function(){
      var $this = $(this);
      var id = $this.attr('href');
      $('.gotovie li').removeClass('active');
      $(this).parent().addClass('active');
      $(".tab-pane").removeClass('.active').hide();
      $(id).addClass('.active').show().css('opacity', '0').animate({'opacity' : '100'}, 150);
    });


    var hash = location.hash;
    if (hash == "" || hash == "#"){
        $('.gotovie li a').eq(0).parent().addClass('active');
        $(".tab-pane").eq(0).show().css('opacity', '0').animate({'opacity' : '100'}, 150);
    } else {
        $('.gotovie li').removeClass('active');
        $('a[href="' + hash + '"]').parent().addClass('active');
        $(".tab-pane").removeClass('.active').hide();
        $(hash).addClass('.active').show().css('opacity', '0').animate({'opacity' : '100'}, 150);
    }
});

