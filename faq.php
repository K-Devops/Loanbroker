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
        data-bs-target="#loginmodal">Login</button>
      <a type="button" class="btn btn-outline-secondary" href="register.html">Registrieren</a>
    </div>

    <div class="modal" id="loginmodal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="row g-3">
              <div class="col-auto">
                <label for="staticUsername" class="visually-hidden">Username</label>
                <input type="text" readonly class="form-control-plaintext" id="staticUsername" value="Username">
              </div>
              <div class="col-auto">
                <label for="inputUsername" class="visually-hidden">Username</label>
                <input type="password" class="form-control" id="inputUsername" placeholder="Username">
              </div>
              <div class="col-auto">
                <label for="staticPasswort" class="visually-hidden">Passwort</label>
                <input type="text" readonly class="form-control-plaintext" id="staticPasswort" value="Passwort">
              </div>
              <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">Passwort</label>
                <input type="password" class="form-control" id="inputPassword2" placeholder="Passwort">
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
  </header>
</div>
<body class="container">
    <!--Hier Content-->
  
  </body>
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
    
  
    <div>
      
    </div>
    <div >
     
  
  
    </div>
    
  </footer>
  <script src="bootstrap/js/bootstrap.min.js" rel="stylesheet"></script>
</html>