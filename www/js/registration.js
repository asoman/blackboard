

$(function () {
    var dialog, form,
            emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
            email = $("#email"),
            password = $("#password"),
            repeatpassword = $("#repeatrpassword"),
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
            updateTips("����� " + n + " ������ ���������� �� " +
                    min + " �� " + max + " ��������.");
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
        valid = valid && checkRegexp(email, emailRegex, "������: example@email.com");
        valid = valid && checkRegexp(password, /^([0-9a-zA-Z!#?~])+$/, "���������� ������� : A-Z a-z 0-9 +-*/=~!?");
        if (valid) {
//�������� ������ �� ������
            dialog.dialog("close");
        }
        return valid;
    }
    
    
    
    dialog = $("#dialog-form").dialog({
        autoOpen: true,
        height: 500,
        width: 600,
        modal: true,
        buttons: {
            "������� �������": addUser,
            "������": function () {
                dialog.dialog("close");
            },
            "��� ���� �������?": function () {
                form[ 0 ].reset();
                allFields.removeClass("ui-state-error");
                window.location.replace("/auth/login");
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
