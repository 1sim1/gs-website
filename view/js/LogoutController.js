//Logout utente - OK

$(document).ready(function () {
    $('#logout').off('click').on('click', onClickLogout);
});

onClickLogout = function(e) {
    e.preventDefault();
    $.ajax({
        url: '../../index.php/UserController/LogoutUser',
        type: "POST",
        success: onPostLogout,
        async: true,
        context: this,
        crossBrowser: "true"
    });
}

onPostLogout = function(response) {
    response = $.parseJSON(response);
    if (response.cod === 0) {
        alert(response.msg);
        window.location.href = 'home.php';
    } else {
        alert(response.msg);
    }
}