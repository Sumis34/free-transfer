<?php
//Builder laden
include_once 'resources/builder.php';

//Session starten
session_start();

// Loads the secret file 
$json   = file_get_contents("./datenbank_connector/secret.json");
$secret = json_decode($json, true);

$DB_USERNAME = $secret['db_username'];
$DB_PASSWORD = $secret['db_password'];

// URL Array index, fÃ¼r live Server 1
$urlIndex = 2;


$tempGet = trim($_SERVER['REQUEST_URI'], '?');
$_SESSION['getID'] = explode('?', $tempGet);

$temp = $_SESSION['getID'][0];

if (!empty($_SESSION['getID'][1])) {
    $_SESSION['getID'] = explode('=', $_SESSION['getID'][1]);
}

$url = explode('/', $temp);
$url = array_slice($url, 1);

$_SESSION['testUrl'] = $url;

// base address is requested
if (count($url) == $urlIndex && $url[$urlIndex - 1] == "") {
    build('home.php');
} else if (count($url) >= $urlIndex) {
    // subadress is requested
    $subDomain = strtolower($url[$urlIndex - 1]);

    switch ($subDomain) {
        case 'home':
            build('home.php');
            break;

        case 'upload':
            build('upload.php');
            break;

        case 'share':
            build('sendFile.php');
            break;

        case 'file':
            //If a file hash is given forward to the download page
            if (isset($url[$urlIndex]) && $url[$urlIndex] != "") {
                $_SESSION['fileToGet'] = $url[$urlIndex];
                build('download.php');
            } else {
                $_SESSION['fileToGet'] = "";
                build('404.php');
            }
            break;

        default:
            build('404.php');
            break;
    }
} else {
    build('404.php');
}
