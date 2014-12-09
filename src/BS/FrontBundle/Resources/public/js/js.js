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



    $('#lightGallery').lightGallery({
        // showThumbByDefault:true,
        // addClass:'showThumbByDefault',
        // cssEasing:'cubic-bezier(0.680, -0.550, 0.265, 1.550)',
        // closable:false,
        // enableTouch: false,
        // enableDrag: false,
        loop:true,
        speed:1500
    }); 
});