var BS = {
    hrefs:{},
    Utils: {

    },
    Forms: {
        Collection: {}
    },
    Temp: {
        Forms: {
            Collection: {
                common: {
                    items: {}
                }
            }
        }
    }
};
// FORMS
// Add/Remove collection field //
// Only this call
BS.Forms.Collection.init = function (arr, settings) {
//    BS.Temp.Forms.Collection.common.items = {};
    if (!settings) {
        var setting = {};
    }
    var defSettings = {
        remove: true,
        add: true
    };

    var sett = $.extend(true, defSettings, settings);
    var aL = arr.length;
    for (var i = aL - 1; i >= 0; i--) {
        var id = arr[i].substr(1);
        var current = BS.Temp.Forms.Collection.common.items[id] = {};

        current.holder = $(arr[i]);
        if (sett.remove === true) {
            current.holder.find('li').each(function () {
                BS.Forms.Collection.remove($(this));
            });
        }

        if (sett.add === true) {
            current.addLink = $('<a class="btn btn-success" href="#" >Добавить</a>').attr('id', "add_link_" + id);
            current.newLinkLi = $('<li></li>').append(current.addLink);
            current.holder.append(current.newLinkLi);
            current.holder.data('index', current.holder.find(':input').length);
        }

    }

    BS.Forms.Collection.add(BS.Temp.Forms.Collection.common.items);
}

BS.Forms.Collection.remove = function ($tagFormLi) {
    var $removeFormA = $('<a class="btn btn-danger btn-sm" href="#">Удалить</a>');
//    debugger;
    $tagFormLi.append($removeFormA);
//    $tagFormLi.insertAfter($removeFormA);
    $removeFormA.on('click', function (e) {
        e.preventDefault();
        $tagFormLi.remove();
    });
}

BS.Forms.Collection.add = function (items) {
    $.each(items, function (key, current) {
        current.addLink.on('click', function (e) {
            e.preventDefault();
            var prototype = current.holder.data('prototype');
            var index = current.holder.data('index');
            var newForm = prototype.replace(/__name__/g, index);
            current.holder.data('index', index + 1);
            $neForm = $(newForm);
            BS.Forms.Collection.remove($neForm);
            current.newLinkLi.before($neForm);
        });
    });
}

// Translit
BS.Utils.translit = function(word){
    var answer = ""
        , a = {};

    a["Ё"]="YO";a["Й"]="I";a["Ц"]="TS";a["У"]="U";a["К"]="K";a["Е"]="E";a["Н"]="N";a["Г"]="G";a["Ш"]="SH";a["Щ"]="SCH";a["З"]="Z";a["Х"]="H";a["Ъ"]="_";
    a["ё"]="yo";a["й"]="i";a["ц"]="ts";a["у"]="u";a["к"]="k";a["е"]="e";a["н"]="n";a["г"]="g";a["ш"]="sh";a["щ"]="sch";a["з"]="z";a["х"]="h";a["ъ"]="_";
    a["Ф"]="F";a["Ы"]="I";a["В"]="V";a["А"]="a";a["П"]="P";a["Р"]="R";a["О"]="O";a["Л"]="L";a["Д"]="D";a["Ж"]="ZH";a["Э"]="E";
    a["ф"]="f";a["ы"]="i";a["в"]="v";a["а"]="a";a["п"]="p";a["р"]="r";a["о"]="o";a["л"]="l";a["д"]="d";a["ж"]="zh";a["э"]="e";
    a["Я"]="Ya";a["Ч"]="CH";a["С"]="S";a["М"]="M";a["И"]="I";a["Т"]="T";a["Ь"]="_";a["Б"]="B";a["Ю"]="YU";
    a["я"]="ya";a["ч"]="ch";a["с"]="s";a["м"]="m";a["и"]="i";a["т"]="t";a["ь"]="_";a["б"]="b";a["ю"]="yu";a[" "]="_";

    for (i in word){
        if (word.hasOwnProperty(i)) {
            if (a[word[i]] === undefined){
                answer += word[i];
            } else {
                answer += a[word[i]];
            }
        }
    }
    return answer.toLowerCase();
}