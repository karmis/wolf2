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
        pager:false,
		onSlideBefore: function($slideElement){
			$(window).resize();
		}

    });


    $('.modalBXSlider').bxSlider({
      mode: 'fade',
      auto: true,
      autoControls: true,
      pause: 2000,
      onSlideBefore: function(){
      	$(window).resize();
      }
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

    $(".lazy").recliner({
        attrib: "data-src", // selector for attribute containing the media src
        throttle: 800,      // millisecond interval at which to process events
        threshold: 2000,     // scroll distance from element before its loaded
        live: true          // auto bind lazy loading to ajax loaded elements
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
$(window).load(function() {

	$('#main-content').show(2000);
});