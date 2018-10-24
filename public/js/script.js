var token = $('[name="_token"]').attr('value')
$("#regEmail1").click(function () {
    $("#regClient1").css("display", 'none')
    $("#regMail1").css("display", 'block')
})
$("#openModal1").on("click", function () {
    $("#regClient1").css("display", 'block')
    $("#regMail1").css("display", 'none')
})
$("#regEmail2").click(function () {
    $("#regClient2").css("display", 'none')
    $("#regMail2").css("display", 'block')
})
$("#openModal2").on("click", function () {
    $("#regClient2").css("display", 'block')
    $("#regMail2").css("display", 'none')
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
            for (var d in data) {
                $("#" + d + "regclient").parent().append(data[d])
            }
        }
    });
})
$("#logclientbut").click(function () {
    $.ajax({
        url: '/login/email',
        type: "POST",
        data: {
            '_token': token,
            'email': $('#emailloginclient').val(),
            'password': $('passwordloginclient').val(),
        },
        success: function (data) {
            for (var d in data) {
                $("#" + d + "loginclient").parent().append(data[d])
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
            console.log(data)
            for (var d in data) {
                $("#" + d + "regbis").parent().append(data[d])
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
            for (var d in data) {
                $("#" + d + "loginbis").parent().append(data[d])
            }
        }
    });
})
