

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
        valid = valid && checkRegexp(email, emailRegex, "� Email ���������� ������.");
        valid = valid && checkRegexp(password, /^([0-9a-zA-Z!#?~])+$/, "������ �������� ����������� �������.");
        if (valid) {
//�������� ������ �� ������
            dialog.dialog("close");
        }
        return valid;
    }
    
    
    
    dialog = $("#dialog-form").dialog({
        autoOpen: true,
        height: 350,
        width: 500,
        modal: true,
        buttons: {
            "�����": addUser,
            "������": function () {
                dialog.dialog("close");
            },
            "�����������": function () {
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
