/* 
 * ===============================================================
 * ON DOCUMENT READY
 * ===============================================================
 */
function initialise_document_ready_functions()
{
    // useful variables (used in other functions)
    var section_wrappers = get_all_section_wrappers_in_page(); // get all the section wrappers in the page
    var amount_of_pixels_as_buffer_between_sections = 0.25 * ($(window).height()); // used in update_active_sections_on_scroll();

    // set visible section to active
    update_active_sections_on_scroll(section_wrappers, amount_of_pixels_as_buffer_between_sections);

    // Sections Content Vertical Position
    sections_content_vertical_position();

    // Initialise General Links Click Events
    initialise_general_links_click_events();
    // Initialise Main Menu Links Click Events
    initialise_main_menu_click_events();

    // initialise hover effect - fade out inactive project grid items
    effect_fade_out_inactive_grid_items(); 

    // modify heights of .content-wrapper parents of elements with .max-height class set
    set_height_of_parent_content_wrappers();

    // initialise carousel
    $('#features-carousel').carousel({
      interval: 6000
    });

    // initialise form validation and submit functions 
    validate_and_submit_forms();

    // ------ On Opening Popups ------
    $('#common-modal').on('shown.bs.modal', function()
    {
        // initialise popup image gallery
        // - you can use the same functions below if you want to add a new Owl Carousel with different parameters (in this case call the carousel's unique ID instead)
        // - documentation for Owl Carousel: http://www.owlgraphic.com/owlcarousel/#how-to
        if ($('#common-modal .popup-image-gallery').length > 0)
        {
          // custom parameters for carousel (see Owl Carousel documentation for more info)
          $("#common-modal .popup-image-gallery").owlCarousel({
            autoPlay : 3000,
            stopOnHover : true,
            navigation: false,
            paginationSpeed : 1000,
            goToFirstSpeed : 2000,
            singleItem : true,
            lazyLoad : true,
            autoHeight : true,
            transitionStyle: "fade",
            afterLazyLoad : function() {
              position_modal_at_centre(); // position popup at the centre of the page 
            }
          }); 
        }

        if($("#common-modal .lightGalleryBlockInModal").length > 0){
            $('.lightGalleryBlockInModal').lightGallery({
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
        }

        // initialise popup alternate image gallery
        if ($('#common-modal .popup-alt-image-gallery').length > 0)
        {
          $("#common-modal .popup-alt-image-gallery").owlCarousel({
            autoPlay : false,
            items : 5,
            stopOnHover : true,
            navigation: true,
            paginationSpeed : 500,
            goToFirstSpeed : 2000,
            singleItem : false,
            lazyLoad : true,
            baseClass : 'hide-bullets',
            autoHeight : false,
            transitionStyle: "backSlide",
            afterLazyLoad : function() {
              position_modal_at_centre(); // position popup at the centre of the page 
            }
          }); 
        }
    });

    // ------ On Closing Popups ------
    $("#common-modal").on('hide.bs.modal', function()
    {
        // Destroy Owl Carousel image gallery when modal/popup is closed (it will be re-initialised again when popup is re-opened)
        if ($('#common-modal .popup-image-gallery').length > 0)
        {
          var carousel_initialised_data = $('#common-modal .popup-image-gallery, #common-modal .popup-alt-image-gallery').data('owlCarousel');
          carousel_initialised_data.destroy();
        }
    });
    // ------ END: Owl Carousel ------    

    // initialise WOW.js intro animations
    new WOW().init();

    /* 
     * ----------------------------------------------------------
     * ON WINDOW RESIZE
     * ----------------------------------------------------------
     */
    $(window).resize(function()
    { 

        // update variables already set in document.ready above
        amount_of_pixels_as_buffer_between_sections = 0.25 * ($(window).height()); // used in update_active_sections_on_scroll();

        // Sections Content Vertical Position
        if (!jQuery.browser.mobile) sections_content_vertical_position();

        // Main Menu Visiblity on Window Resize
        main_menu_visiblity_on_resize();

        // Set equal height to all carousel slides on small displays
        set_equal_height_to_all_carousel_slides_on_small_displays();

        // Position modal at the centre/middle of the page (if visible)
        position_modal_at_centre();

    });
    // end: on window resize

    /* 
     * ----------------------------------------------------------
     * ON WINDOW SCROLL
     * ----------------------------------------------------------
     */
    $(window).scroll(function()
    { 

        // Update Active Sections on Scroll (do not use function when menu link was clicked - as this already has a link to the scroll function) -- (do not fire function on mobile viewports)
        if (!$("#main-content").hasClass("same_page_link_in_action") && !jQuery.browser.mobile )
        {
            update_active_sections_on_scroll(section_wrappers, amount_of_pixels_as_buffer_between_sections);
        }

        // update scroll to top icon visibility
        go_to_top_visibility();

    });
    // end: on window scroll

}
// end: initialise_document_ready_functions()

$(document).ready(function()
{
    initialise_document_ready_functions();
});

 /* 
 * ===============================================================
 * ON WINDOW LOAD (after all elements were loaded)
 * ===============================================================
 */

function initialise_window_load_functions()
{
    // update variables already set in document.ready above
    amount_of_pixels_as_buffer_between_sections = 0.25 * ($(window).height()); // used in update_active_sections_on_scroll();

    // Set equal height to all carousel slides on small displays
    set_equal_height_to_all_carousel_slides_on_small_displays();

    // Sections Content Vertical Position (when not viewing on a mobile)
    if (!jQuery.browser.mobile || viewport().width > window.xs_screen_max) sections_content_vertical_position();

    // preload all section background images after all elements were loaded (when not viewing on a mobile)
    if (!jQuery.browser.mobile || viewport().width > window.xs_screen_max) preload_section_backgrounds();

    // Grid Items Clearfix
    if (!jQuery.browser.mobile || viewport().width > window.xs_screen_max) add_clear_items_to_fix_grid_items_different_heights_issue();

    // Load images after other elements are loaded
    load_images("lazy", true, true);

}
// end: initialise_window_load_functions()

$(window).load(function()
{
    initialise_window_load_functions();
});