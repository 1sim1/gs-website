//Crea la tabella e mostra tutti gli utenti salvati nel DB - OK

$(document).ready(function () {
    if ($('#usersList').length === 1) { //OK - se sei nella pagina con id usersList esegui quanto segue
        onClickShowAllUsers(); //OK - chiama la funzione sul controllo dell'id
    }
});

onClickShowAllUsers = function () {
    $.ajax({
        url: '../../index.php/UserController/AllUsers',
        type: "GET",
        success: onGetShowAllUsers,
        async: true,
        context: this,
        crossBrowser: "true"
    });
}
onGetShowAllUsers = function (response) {
    response = $.parseJSON(response);
    let tableUsersList = document.getElementById('tableUsersList');
    let headerUsersList = document.createElement('thead');
    let bodyTableUsersList = document.createElement('tbody');
    let headLength = 0;

    if (typeof response.dat[0] !== 'undefined' && response.dat[0] !== null) {
        headLength = Object.keys(response.dat[0]).length;
    } else {
        let paragraph = document.createElement('p');
        paragraph.innerHTML = response.msg;
        document.body.appendChild(paragraph);
    }

    let rowHead = document.createElement('tr');
    let counter = 0;
    for (let i = 0; i < (response.dat).length; i++) {
        let row = document.createElement('tr');
        
        Object.keys(response.dat[i]).forEach(element => {
            let column = document.createElement("td");
            let field = document.createTextNode(response.dat[i][element]);
            column.appendChild(field);
            row.appendChild(column);

            if (counter < headLength) {
                let th = document.createElement('th');
                let thField = document.createTextNode(element);
                th.appendChild(thField);
                rowHead.appendChild(th);
                counter++;
            }
        });
        bodyTableUsersList.appendChild(row);
    }

    headerUsersList.appendChild(rowHead);
    tableUsersList.appendChild(headerUsersList);
    tableUsersList.appendChild(bodyTableUsersList);
    document.body.appendChild(tableUsersList);
}
