<?php session_start() ?>
<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Area personale <?php echo $_SESSION['username'] ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script src="../js/ProfileController.js"></script>
  <script src="../js/LogoutController.js"></script>
</head>

<body>
  <h1>Area personale <?php echo $_SESSION['username'] ?></h1>
  <?php include("./navbar.php"); ?>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Cognome</th>
        <th scope="col">eMail</th>
        <th scope="col">Username</th>
        <th scope="col">Password</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $_SESSION['name'] ?></td>
        <td><?php echo $_SESSION['surname'] ?></td>
        <td><?php echo $_SESSION['email'] ?></td>
        <td><?php echo $_SESSION['username'] ?></td>
        <td><?php echo $_SESSION['password'] ?></td>
      </tr>
    </tbody>
  </table>
  <br>
  <h2>Compila il form sottostante per aggiornare i dati di <?php echo $_SESSION['username'] ?></h2>
  <br>
  <form id="updateUserForm" method="POST">
    <div class="mb-3">
      <label for="name" class="form-label">Nome nuovo</label>
      <input type="text" class="form-control" id="updated_name" placeholder="Inserisci qui il tuo nuovo nome..." required>
      <label for="name" id="emptyName" class="form-label" style="display:none; color:red;">Campo da valorizzare</label>
    </div>
    <div class="mb-3">
      <label for="surname" class="form-label">Cognome nuovo</label>
      <input type="text" class="form-control" id="updated_surname" placeholder="Inserisci qui il tuo nuovo cognome..." required>
      <label for="surname" id="emptySurname" class="form-label" style="display:none; color:red;">Campo da valorizzare</label>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">e-Mail nuova</label>
      <input type="email" class="form-control" id="updated_email" placeholder="Inserisci qui la tua nuova e-Mail..." required>
      <label for="email" id="emptyEmail" class="form-label" style="display:none; color:red;">Campo da valorizzare</label>
    </div>
    <div class="mb-3">
      <label for="username" class="form-label">Username nuovo</label>
      <input type="text" class="form-control" id="updated_username" placeholder="Inserisci qui il tuo nuovo username..." required>
      <label for="username" id="emptyUsername" class="form-label" style="display:none; color:red;">Campo da valorizzare</label>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password nuova</label>
      <input type="password" class="form-control" id="updated_password" placeholder="Inserisci qui la tua nuova password..." required>
      <label for="password" id="emptyPassword" class="form-label" style="display:none; color:red;">Campo da valorizzare</label>
    </div>
  </form>
  <!-- Button trigger modal -->
  <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Aggiorna utente
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma aggiornamento utente</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Vuoi salvare gli aggiornamenti effettuati?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
          <button type="button" id="salva" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Salva</button>
        </div>
      </div>
    </div>
  </div>

</body>

</html>