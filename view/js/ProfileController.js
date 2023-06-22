//Modifica dati utente già registrato - OK

$(document).ready(function () {
    $('#salva').off('click').on('click', onClickUpdateUser); //Aggiorna solo una volta l'utente
});


onClickUpdateUser = function(e) {
    e.preventDefault();
    let name = document.getElementById('updated_name').value.trim();
    let surname = document.getElementById('updated_surname').value.trim();
    let email = document.getElementById('updated_email').value.trim();
    let username = document.getElementById('updated_username').value.trim();
    let password = document.getElementById('updated_password').value.trim();

    let updateFormElements = [name, surname, email, username, password];
    let labelEmptyFields = ['emptyName', 'emptySurname', 'emptyEmail', 'emptyUsername', 'emptyPassword'];

    for (let index = 0; index < updateFormElements.length; index++) {
        const element = updateFormElements[index];
        let foundEmptyField;
        if(element === '') {
            document.getElementById(labelEmptyFields[index]).style.display = 'block';
            foundEmptyField = true;
        }
        if(foundEmptyField) {
            return;
        }
    }

    let dati = {
        'name': name,
        'surname': surname,
        'email': email,
        'username': username,
        'password': password
    };

    $.ajax({
        url: '../../index.php/UserController/UpdateUser',
        type: "POST",
        success: onPostUpdatedUser,
        async: true,
        context: this,
        crossBrowser: "true",
        data: dati
    });
}

onPostUpdatedUser = function(response) {
    response = $.parseJSON(response);
    if(response.cod === 0) {
        alert(response.msg);
        window.location.href = 'profile.php';
    } else {
        alert(response.msg);
    }
}