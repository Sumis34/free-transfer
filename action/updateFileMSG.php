<?php

require_once './sql/startDB.php';

//Insert file msg into db

$fileCode = $_SESSION['fileCode'];

print_r($_POST);

$msg = $_POST['fileMSG'];

$_SESSION['fileMSG'] = $msg;

$db = startDB();

$sql = "UPDATE files SET message = ? WHERE file_code = ?";

// prepare and bind
$stmt = $db->prepare($sql);
$stmt->bind_param("ss", $msg, $fileCode);
$stmt->execute();

$db->close();


header('Location: share');
