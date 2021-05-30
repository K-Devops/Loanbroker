<?php
$user = 'root';
$pass = 'root';
$angebote = [];
$pdo = new PDO('mysql:host=127.0.0.1;port=8889;dbname=users', $user, $pass);
date_default_timezone_set("Europe/Berlin");

if (isset($_POST['id'])) {
    $userid = $_POST['id'];
    $offers = [];
    $sql = 'SELECT RID FROM requests where USERID =  ' . $userid;
    foreach ($pdo->query($sql) as $request) {
        foreach ($request as $RID => $value) {
            $offers[] = $value;
        }

    }
    $offers = array_unique($offers);

    $week = date("Ymd", strtotime($date . ' - 7 days'));
    foreach ($offers as $value) {
        $sql = 'SELECT * FROM offers join requests using (RID) WHERE RID = ' . $value . ' AND DATUM >=' . $week;
        foreach ($pdo->query($sql) as $offering) {

            $angebote[] = $offering;

        }
    }

    echo json_encode ($angebote);

} else {
    echo 'Die Tabelle wurde nicht geupdated';
}
