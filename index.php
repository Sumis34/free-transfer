<?php
//Builder laden
include_once 'resources/builder.php';

//Session starten
session_start();


// Loads the secret file 
$json   = file_get_contents("./py/data/secret.json");
$secret = json_decode($json, true);

$DB_USERNAME         = $secret['db_username'];
$DB_PASSWORD         = $secret['db_password'];
$STEAM_API_KEY       = $secret['steam_api_key'];
$WEBHOOK_KEY_DISCORD = $secret['webhook_key_discord'];
$WEBHOOK_KEY_WEBSITE = $secret['webhook_key_website'];


// URL Array index, fÃ¼r live Server 1
$urlIndex = 2;

//Zeit setzen
if (empty($_SESSION['zeit'])) $_SESSION['zeit'] = date("H:i:s");

$tempGet = trim($_SERVER['REQUEST_URI'], '?');
$_SESSION['getID'] = explode('?', $tempGet);

$temp = $_SESSION['getID'][0];

if (!empty($_SESSION['getID'][1])) {
    $_SESSION['getID'] = explode('=', $_SESSION['getID'][1]);
}

$url = explode('/', $temp);
$url = array_slice($url, 1);

// base address is requested
if (count($url) == $urlIndex && $url[$urlIndex - 1] == "") {
    build('home.php');
} else if (count($url) == $urlIndex) {
    // subadress is requested
    $subDomain = strtolower($url[$urlIndex - 1]);

    switch ($subDomain) {
        case 'home':
            build('home.php');
            break;
        case 'insertfeedback':
            build("insertFeedBack.php");
            break;

        case 'player':
            if ($_SESSION['getID'][0] == "playerid") {
                build("playerPage.php");
            } elseif ($_SESSION['getID'][0] == "player") {
                build("playerSearch.php");
            } else {
                header("location: 404");
            }
            break;

        case 'compare':
            build("compare.php");
            break;

        case 'compareshow':
            build("compareShow.php");
            break;

        case 'logout':
            session_destroy();
            header("location: home");
            break;

        case 'login':
            build("login.php");
            break;

        case 'dashboard':
            if (isset($_SESSION['loggedIn'])) {
                build("dashboard.php");
            } else {
                build('login.php');
            }
            break;
        case 'controls':
            if (isset($_SESSION['loggedIn'])) {
                build("controls.php");
            } else {
                build('login.php');
            }
            break;

        case 'validatedash':
            build("validateDash.php");
            break;

        case 'updatespotlight':
            build("updateSpotlight.php");
            break;

        case 'deletefeedback':
            if (isset($_SESSION['loggedIn'])) {
                build("deleteFeedBack.php");
            } else {
                build('login.php');
            }
            break;
        case 'uploadpb':
            if (isset($_SESSION['loggedIn'])) {
                build("uploadPB.php");
            } else {
                build('login.php');
            }
            break;
        case 'rmplayerdata':
            if (isset($_SESSION['loggedIn'])) {
                build("removePlayerData.php");
            } else {
                build('login.php');
            }
            
            break;
        case 'searchplayer':
            build("searchPlayer.php");
            break;

        case 'clearpylog':
            if (isset($_SESSION['loggedIn'])) {
                build("clearPyLog.php");
            } else {
                build('login.php');
            }
            break;

        case 'createdbbackup':
            if (isset($_SESSION['loggedIn'])) {
                build("createDBBackup.php");
            } else {
                build('login.php');
            }
            break;

        case 'sendmsg':
            if ($_SESSION['getID'][0] == "key" && $_SESSION['getID'][1] == $GLOBALS['WEBHOOK_KEY_WEBSITE']) {
                build('sendDiscordMsg.php');
            } else {
                header("location: 404");
            }
            break;
            
        default:
            build('404.php');
            break;
    }
} else {
    build('404.php');
}