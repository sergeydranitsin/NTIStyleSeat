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
if ($("#regclient").length) {
    console.log(JSON.parse($('#regclient').text()))
    $('#modal-client').addClass('uk-open')
    $('#modal-client').css("display", "block")
    $("#regClient1").css("display", 'none')
    $("#regMail1").css("display", 'block')
}
if ($("#logincl").length) {
    console.log(JSON.parse($('#logincl').text()))
    $('#modal-client').addClass('uk-open')
    $('#modal-client').css("display", "block")
    $('#clientlogin').addClass('uk-active')
    $('#clientsignup').removeClass('uk-active')
    $('#loginclient').addClass('uk-active')
    $('#signupclient').removeClass('uk-active')
    $('#loginclient').prop('aria-expanded', 'true')
    $('#signupclient').prop('aria-expanded', 'true')
    $("#regClient1").css("display", 'block')
    $("#regMail1").css("display", 'none')
}
