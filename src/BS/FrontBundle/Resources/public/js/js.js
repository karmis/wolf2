$(function () {
    $(".logo-image").hover(
        function () {
            $('.logo-image.color').stop().animate({"opacity": "1"}, 600);
        },
        function () {
            $('.logo-image.color').stop().animate({"opacity": "0"}, 100);
        });

//    $("img.lazy").lazyload();

    $('.bxslider').bxSlider({
        mode: 'fade',
        auto: false,
//        autoControls: true,
        nextText: "",
        prevText: "",
        pause: 2000,
        slideWidth: 450,
        responsive: false,
        adaptiveHeight: false,
        pager:false

    });


    $('.modalBXSlider').bxSlider({
      mode: 'fade',
      auto: true,
      autoControls: true,
      pause: 2000
    });


    var slider = $('#slider').leanSlider({
        directionNav: '#slider-direction-nav',
        controlNav: '#slider-control-nav'
    });

    $('#lightGallery').lightGallery({
        showThumbByDefault:true,
        addClass:'showThumbByDefault'
    }); 
});