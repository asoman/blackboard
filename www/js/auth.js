

$(function () {
    var dialog, form,
            emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
            email = $("#email"),
            password = $("#password"),
            allFields = $([]).add(email).add(password),
            tips = $(".validateTips");
    function updateTips(t) {
        tips
                .text(t)
                .addClass("ui-state-highlight");
        setTimeout(function () {
            tips.removeClass("ui-state-highlight", 1500);
        }, 500);
    }
    function checkLength(o, n, min, max) {
        if (o.val().length > max || o.val().length < min) {
            o.addClass("ui-state-error");
            updateTips("Length of " + n + " must be between " +
                    min + " and " + max + ".");
            return false;
        } else {
            return true;
        }
    }
    function checkRegexp(o, regexp, n) {
        if (!(regexp.test(o.val()))) {
            o.addClass("ui-state-error");
            updateTips(n);
            return false;
        } else {
            return true;
        }
    }
    function addUser() {
        var valid = true;
        allFields.removeClass("ui-state-error");
        valid = valid && checkLength(email, "email", 6, 80);
        valid = valid && checkLength(password, "password", 5, 16);
        valid = valid && checkRegexp(email, emailRegex, "Пример: example@email.com");
        valid = valid && checkRegexp(password, /^([0-9a-zA-Z!?~])+$/, "Допустимые символы : A-Z a-z 0-9 ~!?");
        if (valid) {
//Отправка данных на сервер
            dialog.dialog("close");
        }
        return valid;
    }
    
    
    
    dialog = $("#dialog-form").dialog({
        autoOpen: false,
        height: 350,
        width: 500,
        modal: true,
        buttons: {
            "Create an account": addUser,
            Cancel: function () {
                dialog.dialog("close");
                window.location.replace("/");
            }
        },
        close: function () {
            form[ 0 ].reset();
            allFields.removeClass("ui-state-error");
        }
    });



    form = dialog.find("form").on("submit", function (event) {
        event.preventDefault();
        addUser();
    });


        $( window ).load(function()  {
        dialog.dialog("open");
    });
});
