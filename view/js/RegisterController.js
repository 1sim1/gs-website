//Aggiunta di un utente - OK

$(document).ready(function () {
    $('#register').off('click').on('click', onClickRegister); //OK
});

onClickRegister = function (e) {
    e.preventDefault();
    let name = document.getElementById('name').value.trim();
    let surname = document.getElementById('surname').value.trim();
    let email = document.getElementById('email').value.trim();
    let username = document.getElementById('username').value.trim();
    let password = document.getElementById('password').value.trim();
    let dati = {
        'name': name,
        'surname': surname,
        'email': email,
        'username': username,
        'password': password
    };

    $.ajax({
        url: '../../index.php/UserController/AddUser',
        type: "POST",
        success: onPostAddUser,
        async: true,
        context: this,
        crossBrowser: "true",
        data: dati
    });
}
onPostAddUser = function (response) {
    response = $.parseJSON(response);
    if (response.cod === 0) {
        alert(response.msg);
        window.location.href = 'home.php';
    } else {
        alert(response.msg);
    }
}