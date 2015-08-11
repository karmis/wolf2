
$(function() {
    if($('.left-menu-sites .tbody').length > 0) {
        // $('.left-menu-sites .tbody a').click(function(){
        //     $('.left-menu-sites .tbody').removeClass('active');
        //     $(this).parent().addClass('active');
        //     return true;
        // });
        // $(document).on('click', '.left-menu-sites .tbody', function(){
        //     debugger;
        //     $(this).find('a').trigger('click');
        // })
        // $('.left-menu-sites .tbody').on('click', function(){
        //     debugger;
        //     $(this).find('a').trigger('click');
        //     return true;
        // });
    }
debugger;
    if ($(".fancybox").length) {
        $(".fancybox").fancybox({
            padding: 0,
            'width': "50%",
            'autoDimensions': false,
            beforeShow: function(links, index) {
                var src = (this.element).attr('src');
                $('#orderSite img#activeNowSiteItem').attr('src', src);
            },
            afterShow: function(){
                var customHtml = '<div id="content-wrapper-bottom-facnybox">'+
                '<div class="row">'+
                    '<div class="col-md-6 col-sm-12 col-xs-12" id="content-wrapper-text">'+
                        'Заказать такой сайт за <span>11 950 руб</span>. <br>'+
                        '(или за <span>8 365 руб</span>. при заказе продвижения)'+
                    '</div>'+
                    '<div class="col-md-6 col-sm-12 col-xs-12">'+
                        '<div class="row">'+
                            '<div class="col-md-6 col-sm-12 col-xs-12">'+
                                '<div id="demoSiteBtn">'+
                                    '<a href="#" title="Демо" class="orderSiteBtn">Посмотреть демо</a>'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-3 col-sm-12 col-xs-12">'+
                                '<div id="orderSiteBtn">'+
                                    '<a href="#" title="Заказать" class="btn-podrobnee">Заказать сейчас</a>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>';
            $('.fancybox-wrap .fancybox-title-float-wrap').addClass('customForSecondBlock').html(customHtml);
            }
        });
    }
    if ($(".bxslider").length) {
        $('.bxslider').bxSlider({
            slideWidth: 200,
            minSlides: 1,
            maxSlides: 5,
            slideMargin: 20
        });
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
            callback: function(c) {
                c.trigger("complete");
                $('.portfolioCarrousel_nav ul li span').parent().addClass('pageActive');
            }
        });
        $('.portfolioCarrousel_nav ul li span').parent().addClass('pageActive');
        $(document).on('click', '.portfolioCarrousel_nav ul li', function() {
            $(this).find('a').trigger('click')
        });
    }
});