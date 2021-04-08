<?php 
$user = "root";
$pass = 'YES';
session_start();
$pdo = new PDO('mysql:host=127.0.0.1:3307;dbname=users', $user, $pass);

include('login.php');
include('register.php');
?>


<!DOCTYPE html>
<html>

<head>
  <!--Sources-->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
</head>

<div class="container">
  <header
    class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">

    </a>
    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      <li><a href="index.php" class="nav-link px-2 link-secondary">Home</a></li>
      <li><a href="faq.php" class="nav-link px-2 link-dark">FAQs</a></li>
    </ul>

    <div class="col-md-3 text-end">
      <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
        data-bs-target="#loginmodal" >Login</button>
        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
        data-bs-target="#registermodal" >Registrieren</button>
    </div>
    <?php 
  
if(isset($errorMessage)) {
    echo $errorMessage;
    
}
?>
    <div class="modal" id="loginmodal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Loanbroaker Login</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!--LOGIN-->
            <form class="row g-3" action="?login=1"  method="post">
              <div class="col-auto">
                <label for="staticemail" class="visually-hidden">email</label>
                <input type="email" readonly class="form-control-plaintext" id="staticemail" value="Email">
              </div>
              <div class="col-auto">
                <label for="inputemail" class="visually-hidden">email</label>
                <input type="email" size="20" maxlength="250" class="form-control" id="inputemail" placeholder="Email" name="email">
              </div>
              <div class="col-auto">
                <label for="staticPasswort" class="visually-hidden">Passwort</label>
                <input type="text" readonly class="form-control-plaintext" id="staticPasswort" value="Passwort">
              </div>
              <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">Passwort</label>
                <input type="password" class="form-control" id="inputPassword2" placeholder="Passwort" name="passwort">
              </div>
              <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Login</button><br>
                <a style="font-size: x-small;" href="#">Passwort vergessen?</a>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <?php
if($showFormular) {
?>
    <div class="modal" id="registermodal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Loanbroaker Registrierung</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
             <!--REGISTRIEREN-->
            <form class="row g-3" action="?register=1" method="post">
            <div class="col-auto">
                <label for="registerusername" class="visually-hidden">Vorname</label>
                <input type="text" readonly class="form-control-plaintext" id="registerusername" value="Vorname">
              </div>
              <div class="col-auto">
                <label for="inputfirstname" class="visually-hidden">Vorname</label>
                <input type="text" class="form-control" id="inputfirstname" placeholder="Vorname" name="vorname">
              </div>
              <div class="col-auto">
                <label for="registersecdname" class="visually-hidden">Nachname</label>
                <input type="text" readonly class="form-control-plaintext" id="registersecdname" value="Nachname">
              </div>
              <div class="col-auto">
                <label for="inputscdname" class="visually-hidden">Vorname</label>
                <input type="text" class="form-control" id="inputscdname" placeholder="Nachname" name="nachname">
              </div>
              <div class="col-auto">
                <label for="registeremail" class="visually-hidden">Email</label>
                <input type="email" size="20" maxlength="250" readonly class="form-control-plaintext" id="registeremail" value="Email">
              </div>
              <div class="col-auto">
                <label for="inputUsername" class="visually-hidden">Email</label>
                <input type="email" size="20" maxlength="250"class="form-control" id="inputemail2" placeholder="Email" name="email">
              </div>
              <div class="col-auto">
                <label for="registerPasswort" class="visually-hidden">Passwort</label>
                <input type="text" readonly class="form-control-plaintext" id="registerPasswort" value="Passwort">
              </div>
              <div class="col-auto">
                <label for="inputPasswordfirst" class="visually-hidden">Passwort</label>
                <input type="password" class="form-control" id="inputPasswordfirst" placeholder="Passwort" name="passwort">
              </div>
              <div class="col-auto">
                <label for="staticPasswortwhd" class="visually-hidden">Passwort wiederholen</label>
                <input type="text" readonly class="form-control-plaintext" id="staticPasswortwhd" value="Passwort bestätigen">
              </div>
              <div class="col-auto">
                <label for="inputPasswordscd" class="visually-hidden">Passwort</label>
                <input type="password" class="form-control" id="inputPasswordscd" placeholder="Passwort" name="passwort2">
              </div>
              <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Jetzt registrieren</button>
              </div>
              
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </header>
</div>
<?php
} //Ende von if($showFormular)
?>
<body class="container">
  <div class="row">
    <div class="col-4"><img src="img/hirsch.png"></div>
    <div class="col-8" style="padding-top: 6em; margin-left: -5em;">
      <h1>Willkommen</h1>
      <p>Mit dem Loanbroaker haben Sie die Möglichkeit bei verfügbaren Banken einen Kredit anzufragen und das für Sie
        beste Angebot zu bekommen.</p>
      <p>
        Registrieren Sie sich jetzt und fragen Sie heute noch nach einem Kredit.
      </p>
    </div>
  </div>

</body>
<!--ENDE BODY-->

<footer class="footer">
  <div class="row"> <div class="col-6 col-md-6"> <p>Diese Seite wurde zu Testzwecken für das Projekt <strong>Loanbroaker Business Integration</strong>
      erstellt.<br>Als Projekt für ein Modul der <a
        href="https://www.hs-furtwangen.de/">Hochschule Furtwangen.</a></p></div>
    
    <div class="col-6 col-md-4"><h5>Gruppenmitglieder</h5>
    <ul>
      <li>
        <a>Luisa Buderer</a>
      <li><a>Emel Nachname</a></li>
      <li><a>Fabiana Kariegus</a></li>
      </li>
    </ul></div>
   <div class="col-6 col-md-2"><div class="upper"><a href="#">Back to top</a></div></div>
  </div>
</footer>
<script src="bootstrap/js/bootstrap.min.js" rel="stylesheet"></script>

</html>