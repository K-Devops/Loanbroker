<?php
$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll

 if(isset($_GET['register'])) {
    $error = false;
    $vorname = $_POST['vorname'];
    $nachname = $_POST['nachname'];
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];
    $passwort2 = $_POST['passwort2'];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
        $error = true;
    }     
    if(strlen($passwort) == 0) {
        echo 'Bitte ein Passwort angeben<br>';
        $error = true;
    }
    if($passwort != $passwort2) {
        echo 'Die Passwörter müssen übereinstimmen<br>';
        $error = true;
    }
    
    //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
    if(!$error) { 
        $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $result = $statement->execute(array('email' => $email));
        $user = $statement->fetch();
        
        if($user !== false) {
            echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
            $error = true;
        }    
    }
    
    //Keine Fehler, wir können den Nutzer registrieren
    if(!$error) {    
        $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
        
        $statement = $pdo->prepare("INSERT INTO users (vorname, nachname, email, passwort) VALUES (:vorname, :nachname, :email, :passwort)");
        $result = $statement->execute(array('vorname'=> $vorname, 'nachname'=> $nachname, 'email' => $email, 'passwort' => $passwort_hash));
        
        if($result) {        
            echo 'Du wurdest erfolgreich registriert.';
            $showFormular = false;
        } else {
            echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
        }
    } 
}?>