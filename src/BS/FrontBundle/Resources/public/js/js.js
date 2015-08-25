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


    $('.lightGalleryBlock').lightGallery({
        showThumbByDefault:true,
        // addClass:'showThumbByDefault',
        cssEasing:'cubic-bezier(0.680, -0.550, 0.265, 1.550)',
        closable:true,
        enableTouch: true,
        enableDrag: true,
        lang: {
         allPhotos: 'Все фотографии'
        },
        loop:false,
        speed:1500
    });


    $('#feedBackForm').submit(function(e){
        e.preventDefault();
        var url = $(this).attr('bs-action');
        var data = $(this).serialize();

        $.ajax({
            url: url,
            data: data,
            dataType: 'json',
            type: 'post',
            success: function(xhr){
                debugger;
            },

        });
    });
});