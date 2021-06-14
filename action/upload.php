<?php

$upload = 'err'; 
if(!empty($_FILES['file'])){

    // File upload configuration 
    $targetDir = "./uploads/"; 
    $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg', 'gif', 'wav');

    //Generate random name
    $fileName = bin2hex(random_bytes(4)) . "_" . time();

    $tempName = basename($_FILES['file']['name']);

    $fileSuffix = explode(".", $tempName);

    $fileSuffix = end($fileSuffix);

    $targetFilePath = $targetDir.$fileName. "." . $fileSuffix; 
     
    // Check whether file type is valid 
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    echo "File Name " . $targetFilePath;
    echo "<br> Type" . $fileType;

    if(in_array($fileType, $allowTypes)){ 
        // Upload file to the server 
        if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)){ 
            $upload = 'ok'; 
        } 
    }
    $_SESSION['executed']++;
} 
echo "<br>" . $upload;
echo $_SESSION['executed'];
