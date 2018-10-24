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
            'phone': $('#phoneregclient').val(),
            'email': $('#emailregclient').val(),
            'first_name': $('#first_nameregclient').val(),
            'second_name': $('#second_nameregclient').val(),
            'password': $('#passwordregclient').val(),
            'password_confirmation': $('#password_confirmationregclient').val(),
        },
        success: function (data) {
            for (var d in data['error']) {
                $("#" + d + "regclient").parent().append(data['error'][d][0])
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
            for (var d in data['error']) {
                $("#" + d + "loginclient").parent().append(data['error'][d][0])
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
            'phone': $('#phoneregbis').val(),
            'email': $('#emailregcbis').val(),
            'first_name': $('#first_nameregbis').val(),
            'second_name': $('#second_nameregbis').val(),
            'password': $('#passwordloginbis').val(),
            'password_confirmation': $('#password_confirmationregbis').val(),
        },
        success: function (data) {
            for (var d in data['error']) {
                $("#" + d + "regbis").parent().append(data['error'][d][0])
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
            for (var d in data['error']) {
                $("#" + d + "loginbis").parent().append(data['error'][d][0])
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
            if (!data['errors']) {
                $("#sendlinkrec1").css("display", 'none')
                $("#sendletterclient").css("display", 'block')
            }
            for (var d in data['errors'])
                $("#resetpassclient").parent().append(data['errors'][d][0])
        }
    });
})
