$(function() {
    if ($('textarea.tinymce').length > 0) {
        tinymce.init({
            selector: 'textarea.tinymce',
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
        });
    }
    if (navigator.userAgent.indexOf('Chrome') != -1) {
        $('input[type=date]').on('click', function(event) {
            if (!$(this).hasClass('webkit-cal')) {
                event.preventDefault();
            }
        });
    }
    $("button[bs-data-action='remove-entity']").on('click', function(e) {
        if (!confirm("Удалить запись?")) {
            e.preventDefault();
            return false;
        }
    });

    $('select').select2();

    if($('.input-caption-for-meta.new').length > 0) {
        $('.input-caption-for-meta').keyup(function(){
            var caption = $(this).val();
            $('.input-meta.meta-title').val(caption);
            $('.input-meta.meta-description').val(caption);
            $('.input-meta.meta-keywords').val(caption);    
        });
    }

});