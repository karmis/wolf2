function prepareOrderHostingForm(el)
{
    var form = $('form[bs-form-type="order_hosting"]');
    var sbmt = $('form[bs-form-type="order_hosting"] #submitOrderHostingFormBtn');
    form.find('input[name="ref"]').val(document.location.href);
    form.find('input[name="ref_description"]').val(el.attr('bs-form-description'));
    form.find('input[name="ref_value"]').val(el.attr('bs-form-value'));
    form.find('#modalHostingTariff').text(el.attr('bs-form-value'));
    if(el.attr('bs-form-success') && el.attr('bs-form-success').length > 0){
        sbmt.attr('bs-form-success', el.attr('bs-form-success'));
    }
    
    if(el.attr('bs-form-error') && el.attr('bs-form-error').length > 0){
        sbmt.attr('bs-form-error', el.attr('bs-form-error'));
    }
}

$('form[bs-form-type="order_hosting"]').on('submit', function (e) {
    e.preventDefault();
    var form = $(this);
    var sbmt = $(this).find('#submitOrderHostingFormBtn');
    var data = form.serialize();
    var route = form.attr('bs-action-path'); 
    sbmt.button('loading'); 
    request(route, data, {
        success: function (xhr) {
            sbmt.button('reset');
            $('.btn-podrobnee').button('reset');
            if (xhr.answer == 'ok') {
                alertify.success(sbmt.attr('bs-form-success'));
                
            }
            $.fancybox.close();
        }, error: function () {
            sbmt.button('reset');
            $('.btn-podrobnee').button('reset');
            $.fancybox.close();
            alertify.error(sbmt.attr('bs-form-error'));
        }
    }, 'post');
});