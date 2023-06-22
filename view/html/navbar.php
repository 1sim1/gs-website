<?php
if(isset($_SESSION['userLoggedIn']) && $_SESSION['userLoggedIn']) {
  echo "<nav class='navbar navbar-expand-lg bg-body-tertiary'>
  <div class='container-fluid'>
    <a class='navbar-brand'>Menù</a>
    <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
      <span class='navbar-toggler-icon'></span>
    </button>
    <div class='collapse navbar-collapse' id='navbarNav'>
      <ul class='navbar-nav'>
        <li class='nav-item'>
          <a class='nav-link active' aria-current='page' href='./home.php'>Home</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' id='profile' href='./profile.php'>Area personale</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='./userList.php'>Lista Utenti</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' id='logout' href='#'>Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>";
} else {
  echo "<nav class='navbar navbar-expand-lg bg-body-tertiary'>
    <div class='container-fluid'>
     <a class='navbar-brand'>Menù</a>
     <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
       <span class='navbar-toggler-icon'></span>
      </button>
      <div class='collapse navbar-collapse' id='navbarNav'>
        <ul class='navbar-nav'>
         <li class='nav-item'>
            <a class='nav-link active' aria-current='page' href='./home.php'>Home</a>
         </li>
         <li class='nav-item'>
           <a class='nav-link' href='./login.php'>Login</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='./register.php'>Registrati</a>
         </li>
          <li class='nav-item'>
            <a class='nav-link' href='./userList.php'>Lista Utenti</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>";
}
?>
