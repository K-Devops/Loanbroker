<?php

$user = 'root';
$pass = 'root';
$userinfo = [];

$response;

session_start();

$pdo = new PDO('mysql:host=127.0.0.1;port=8889;dbname=users', $user, $pass);

if (!isset($_SESSION['userid'])) {
    die('Bitte zuerst <a href="login.php">einloggen</a>');
}

//Abfrage der Nutzer ID vom Login
$userid = $_SESSION['userid'];

$sql = 'SELECT * FROM users where id =  ' . $userid;
foreach ($pdo->query($sql) as $user) {
    $userinfo = (["customer" => ["id" => $userid,
        "Vorname" => $user['vorname'],
        "Nachname" => $user['nachname'],
        "email" => $user['email'],
        "Schufa" => $user['Soznr']],

    ]);

}

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
    <a class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
<?php echo "User Nr:" . $userid; ?>
    </a>


    <div class="col-md-3 text-end">
      <a type="button" class="btn btn-outline-secondary" href="logout.php"> Logout </a>
    </div>
  </header>
</div>

<body class="container">
  <div class="row" >
    <div class="col-4"><img src="img/hirsch.png"></div>

    <div class="col-8" style="padding-top: 6em; margin-left: -5em;">
      <h1> Mein persönlicher Broker</h1>

      <p>Mit dem Loanbroaker haben Sie die Möglichkeit bei verfügbaren Banken einen Kredit anzufragen und das für Sie
        beste Angebot zu bekommen.</p>
      <p>
        Um ein geeignetes Angebot für Sie zu finden, brauchen Wir einige wenige Informationen.</br>
        Bitte füllen Sie das Formular vollständig aus, um eine Anfrage abzusenden.
      </p>
      <p>Sobald ein passendes Angebot für Sie eintrifft, können Sie es hier unter ihren Nachrichten ansehen. </p>
    </div>
  </div>
  <div class="row" style= "margin-top:5em">
    <div class="col-sm-5 col-md-6"></div>
    <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0" ><h3>Kreditanfrage aufgeben</h3></div>
  </div>

  <div class="row" >
    <div class="col-sm-6 col-md-5 col-lg-6"></div>
    <div class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0" >
        <form action="?request=1" method="post">
            <div class="row" style="margin-top:1em">
            <div class="col-6 col-sm-3">
            <label>Laufzeit:</label>
            </div>
            <div class="col-6 col-sm-3">
            <input class="form-control" style="width:10em;" type="number"placeholder="12 Monate" name="laufzeit" max="36">
            </div>
            </div>
            <div class="row" style="margin-top:1em">
            <div class="col-6 col-sm-3">
            <label>Kreditsumme:</label>
            </div>
            <div class="col-6 col-sm-3">
            <input class="form-control" style="width:10em;" type="number"placeholder="1000 €" name="summe">
            </div>
            </div>
            <div class="row" style="margin-top:1em">
            <div class="col-6 col-sm-3">
            </div>
            <div class="col-6 col-sm-3" >
            <input class="btn btn-outline-primary" type="submit" value="Anfragen">
            </div>
            </div>
    </form></div>
  <div class="row" style= "margin-top:5em">
  <h3>Eingegangene Angebote</h3>
  <span class="border border-1"> <div class="col-4" style="padding:2em">
  
     
  


<!--ENDE BODY-->



<?php

// sendet die Daten nach der Eingabe und dem Absenden an die REST_API im JSON format.
if (isset($_GET["request"])) {
    $laufzeit = $_POST['laufzeit'];
    $summe = $_POST['summe'];
    $array = ['request' => ['laufzeit' => $laufzeit, 'summe' => $summe]];
    $userinfo = array_merge($userinfo, $array);
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_PORT => "8081",
        CURLOPT_URL => "http://127.0.0.1:8081/api",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
//CURLOPT_COOKIE, session_name() . '=' . session_id(),
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($userinfo),
        CURLOPT_HTTPHEADER => [

            "accept: application/json",
            "content-type: application/json",
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        //echo $response;
        $responsevalues = json_decode($response);

        
        echo "Guten Tag Herr ".'<b>'. $responsevalues->customer->Vorname . " " .$responsevalues->customer->Nachname .'</b>' .  " es liegt ein Angebot für Sie vor zu den von Ihnen gewünschten Positionen: ".'</br>';
        echo "Einer Laufzeit von " . '<b>'. $responsevalues->request->laufzeit . '</b>'." Monaten ". '</br>';
        echo "und einer Summe von " .'<b>'. $responsevalues->request->summe . '</b>'. " €".'</br>';
        echo "zu einem Zinsatz von " .'<b>'. round( $responsevalues->customer->Schufa, 2) . '</b>'.  "%".'</br>';

      

 
        

       
        
    }

}
?>

</div></span>
 </div>

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
</footer>
<script src="bootstrap/js/bootstrap.min.js" rel="stylesheet"></script>

</html>