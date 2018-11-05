document.addEventListener("DOMContentLoaded", function () {
    var token = $('[name="_token"]').attr('value')
    $("#regEmail1").click(function () {
        $("#regClient1").css("display", 'none')
        $("#regMail1").css("display", 'block')
    })
    $("#openModal1").on("click", function () {
        $("#regClient1").css("display", 'block')
        $("#regMail1").css("display", 'none')
        $("#sendlinkrec1").css("display", 'none')
        $("#sendletterclient").css("display", 'none')
    })
    $("#regEmail2").click(function () {
        $("#regClient2").css("display", 'none')
        $("#regMail2").css("display", 'block')
    })
    $("#openModal2").on("click", function () {
        $("#regClient2").css("display", 'block')
        $("#regMail2").css("display", 'none')
        $("#sendlinkrec2").css("display", 'none')
        $("#sendletterbis").css("display", 'none')
    })
    $("#forgotpassbis").click(function () {
        $("#regClient2").css("display", 'none')
        $("#sendlinkrec2").css("display", 'block')
    })
    $("#forgotpassclient").click(function () {
        $("#regClient1").css("display", 'none')
        $("#sendlinkrec1").css("display", 'block')
    })
    $("#regclientbut").click(function () {
        $.ajax({
            url: '/register_client',
            type: "POST",
            data: {
                '_token': token,
                'mobile_phone': $('#mobile_phoneregclient').val(),
                'email': $('#emailregclient').val(),
                'first_name': $('#first_nameregclient').val(),
                'second_name': $('#second_nameregclient').val(),
                'password': $('#passwordregclient').val(),
                'password_confirmation': $('#password_confirmationregclient').val(),
            },
            success: function (data) {
                clearFieldRegist("regclient")
                for (var d in data['error']) {
                    $("#" + d + "regclient").parent().append("<div style='color:red;margin-top:3px;margin-bottom:12px;font-weight: bold'>" + data['error'][d][0] + "</div>")
                }
                if (data['success']) {
                    location.reload()
                }
            }
        });
    })
    $("#loginclientbut").click(function () {
        console.log($('passwordloginclient').val())
        $.ajax({
            url: '/login/email',
            type: "POST",
            data: {
                '_token': token,
                'email': $('#emailloginclient').val(),
                'password': $('#passwordloginclient').val(),
            },
            success: function (data) {
                clearFieldLogin("loginclient")
                for (var d in data['error']) {
                    $("#" + d + "loginclient").parent().append("<div style='color:red;margin-top:3px;margin-bottom:12px;font-weight: bold'>" + data['error'][d][0] + "</div>")
                }
                if (data['success']) {
                    location.reload()
                }
            }
        });
    })
    $("#regbisbut").click(function () {
        $.ajax({
            url: '/register_business',
            type: "POST",
            data: {
                '_token': token,
                'mobile_phone': $('#mobile_phoneregbis').val(),
                'email': $('#emailregbis').val(),
                'first_name': $('#first_nameregbis').val(),
                'second_name': $('#second_nameregbis').val(),
                'password': $('#passwordregbis').val(),
                'password_confirmation': $('#password_confirmationregbis').val(),
            },
            success: function (data) {
                clearFieldRegist("regbis")
                for (var d in data['error']) {
                    $("#" + d + "regbis").parent().append("<div style='color:red;margin-top:3px;margin-bottom:12px;font-weight: bold'>" + data['error'][d][0] + "</div>")
                }
                if (data['success']) {
                    location.reload()
                }
            }
        });
    })
    $("#loginbisbut").click(function () {
        $.ajax({
            url: '/login/email',
            type: "POST",
            data: {
                '_token': token,
                'email': $('#emailloginbis').val(),
                'password': $('#passwordloginbis').val(),
            },
            success: function (data) {
                clearFieldLogin("loginbis")
                for (var d in data['error']) {
                    $("#" + d + "loginbis").parent().append("<div style='color:red;margin-top:3px;margin-bottom:12px;font-weight: bold'>" + data['error'][d][0] + "</div>")
                }
                if (data['success']) {
                    location.reload()
                }
            }
        });
    })
    $("#sendlinkrecclient").click(function () {
        $.ajax({
            url: 'password/email',
            type: "POST",
            data: {
                '_token': token,
                'email': $('#resetpassclient').val(),
            },
            success: function (data) {
                $("#sendlinkrec1").css("display", 'none')
                $("#sendletterclient").css("display", 'block')
            },
            error: function (error) {
                $('#resetpassclient').next().remove()
                $("#resetpassclient").parent().append("<div style='color:red;margin-top:3px;margin-bottom:12px;font-weight: bold'>" + error.responseJSON.errors['email'][0] + "</div>")
            }
        });
    })
    $("#sendlinkrecbis").click(function () {
        $.ajax({
            url: 'password/email',
            type: "POST",
            data: {
                '_token': token,
                'email': $('#resetpassclient').val(),
            },
            success: function (data) {
                $("#sendlinkrec2").css("display", 'none')
                $("#sendletterbis").css("display", 'block')
            },
            error: function (error) {
                $('#resetpassbis').next().remove()
                $("#resetpassbis").parent().append("<div style='color:red;margin-top:3px;margin-bottom:12px;font-weight: bold'>" + error.responseJSON.errors['email'][0] + "</div>")
            }
        });
    })
})

function clearFieldRegist(prefix) {
    var data = ["mobile_phone", "email", "first_name", "second_name", "password", "password_confirmation"]
    for (var i = 0; i < data.length; i++)
        $("#" + data[i] + prefix).next().remove()
}

function clearFieldLogin(prefix) {
    var data = ["password", "email"]
    for (var i = 0; i < data.length; i++)
        $("#" + data[i] + prefix).next().remove()

}
