// Обертка для асинхронных запросов
function request(url, data, callbacks, method) {
    if (!callbacks) {
        callbacks = {};
    }

    if (!callbacks.success) {
        callbacks.success = function () {
        };
    }

    if (!callbacks.error) {
        callbacks.error = function () {
        };
    }
    $.ajax({
        url: url,
        data: data || {},
        method: method || 'post',
        success: function (xhr) {
            callbacks.success(xhr);
        },
        error: function (xhr) {
            callbacks.error(xhr);
        }
    })
}

function isDomain(domain) {
    var patt = new RegExp(/^[a-zа-я0-9]+([\-\.]{1}[a-zа-я0-9]+)*\.[a-zа-я\-]{2,5}(:[0-9]{1,5})?$/i);
    if (patt.test(domain)) {
        return true;
    }
    return false;
}

function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

function lg(val){
    console.log(val);
}

