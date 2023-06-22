//Login utente - OK

$(document).ready(function () {
    $('#login').off('click').on('click', onClickLogin); //TO-DO
});

onClickLogin = function (e) {
    e.preventDefault();
    let username = document.getElementById('username').value.trim();
    let password = document.getElementById('password').value.trim();
    let dati = {
        'username': username,
        'password': password
    };

    $.ajax({
        url: '../../index.php/UserController/LoginUser/' + username,
        type: "POST",
        success: onPostLogin,
        async: true,
        context: this,
        crossBrowser: "true",
        data: dati
    });
}
onPostLogin = function (response) {
    response = $.parseJSON(response);
    if (response.cod === 0) {
        alert('Login effettuato con l\'utenza ' + response.dat.username);
        window.location.href = 'home.php';
    } else {
        alert(response.msg);
    }
}