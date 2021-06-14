<?php
require_once './sql/startDB.php';
require_once './action/getClientIP.php';

$upload = 'err'; 
if(!empty($_FILES['file'])){

    // File upload configuration 
    $targetDir = "./uploads/"; 
    $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg', 'gif', 'wav', 'mp4');

    //file identifier
    $fileCode = bin2hex(random_bytes(16));

    $_SESSION['fileCode'] = $fileCode;

    //Generate random name
    $fileName = $fileCode . "_" . time();

    $tempName = basename($_FILES['file']['name']);

    $fileSuffix = explode(".", $tempName);

    $fileSuffix = end($fileSuffix);

    $fileName = $fileName. "." . $fileSuffix;

    $targetFilePath = $targetDir.$fileName;

    //Get source ip
    $ip = getClientIP();

    //Insert file info into db name

    $db = startDB();

    $sql = "INSERT INTO files (file_name, file_code, file_path, source) VALUES (?, ?, ?, ?);";

    // prepare and bind
    $stmt = $db->prepare($sql);
    $stmt->bind_param("ssss", $tempName, $fileCode, $targetFilePath, $ip);
    $stmt->execute();

    $db->close();
     
    // Check whether file type is valid 
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if(in_array($fileType, $allowTypes)){ 
        // Upload file to the server 
        if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)){ 
            $upload = 'ok'; 
        } 
    }
    
} 
echo $upload;

