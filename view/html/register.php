<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrati</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <h1>Registrati</h1>
  <?php include("./navbar.php"); ?>
  <h2>Completa il form sottostante e registrati</h2>
  <form id="form" method="POST">
    <div class="mb-3">
      <label for="name" class="form-label">Nome</label>
      <input type="text" class="form-control" id="name" placeholder="Inserisci qui il tuo nome..." required>
    </div>
    <div class="mb-3">
      <label for="surname" class="form-label">Cognome</label>
      <input type="text" class="form-control" id="surname" placeholder="Inserisci qui il tuo cognome..." required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">e-Mail</label>
      <input type="email" class="form-control" id="email" placeholder="Inserisci qui la tua e-Mail..." required>
    </div>
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" id="username" placeholder="Inserisci qui il tuo username..." required>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" placeholder="Inserisci qui la tua password..." required>
    </div>
    <button type="submit" class="btn btn-primary" id="register">Registrati</button>
  </form>
  <script src="../js/RegisterController.js"></script>
</body>

</html>