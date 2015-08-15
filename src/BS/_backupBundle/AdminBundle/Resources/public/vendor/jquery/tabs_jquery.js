$(function () {
    var tabs_arr = $('#korpus label');
    $('#korpus label').first().find('.tab').addClass('active'),
    $('#korpus label').first().addClass('active');
    $('#korpus .tab').on('click', function () {
        $(this).addClass('active').parents().siblings(this).find('.tab').removeClass('active');
        tabs_arr.filter(this.hash).show()
            .addClass('active').siblings('#korpus label').removeClass('active');
    });

   
});


$(function () {
    var tabs_arr = $('#korpus2 label');
    $('#korpus2 label').first().find('.tab').addClass('active'),
    $('#korpus2 label').first().addClass('active');
    $('#korpus2 .tab').on('click', function () {
        $(this).addClass('active').parents().siblings(this).find('.tab').removeClass('active');
        tabs_arr.filter(this.hash).show()
            .addClass('active').siblings('#korpus2 label').removeClass('active');
    });

   
});