

$(function () {
    var dialog, form,
            emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
            email = $("#email"),
            password = $("#password"),
            allFields = $([]).add(email).add(password),
            remember = $("#remember"),
            tips = $(".validateTips");
            remember.button();
    function updateTips(t) {
        tips
                .text(t)
                .addClass("ui-state-highlight");
        setTimeout(function () {
            tips.removeClass("ui-state-highlight", 1500);
        }, 500);
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
        valid = valid && checkRegexp(email, emailRegex, "В Email содержится ошибка.");
        valid = valid && checkRegexp(password, /^([0-9a-zA-Z!#?~])+$/, "Пароль содержит запрещённые символы.");
        if (valid) {
            $.post("ajax.php", { request: "login", mail: email.val(), password: password.val(), remember: remember.prop("checked")},function(data){
  alert("Data Loaded: " + data );
});
            //dialog.dialog("close");
            
           
        }
        return valid;
    }
    
    
    
    dialog = $("#dialog-form").dialog({
        autoOpen: true,
        height: 400,
        width: 600,
        modal: true,
        buttons: {
            "Войти": addUser,
            "Отмена": function () {
                dialog.dialog("close");
            },
            "Регистрация": function () {
                form[ 0 ].reset();
                allFields.removeClass("ui-state-error");
                window.location.replace("/auth/register");
            }
        },
        close: function () {
            form[ 0 ].reset();
            allFields.removeClass("ui-state-error");
            window.location.replace("/");
        }
    });



    form = dialog.find("form").on("submit", function (event) {
        event.preventDefault();
        addUser();
    });

    
});
