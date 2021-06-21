<?php

require_once './sql/executeSQL.php';
require_once './action/fileSizeSuffix.php';

$fileCode = $_SESSION['fileToGet'];

$result = executeSQL('getFileData', $fileCode, true);

$fileSuffix = explode(".", $result['file_name']);

if (!file_exists($result['file_path']))
    header('Location: /transfer/404');

$fileSuffix = end($fileSuffix);

$fileSize = formatSizeUnits(filesize($result['file_path']));

$fileIcon = "./images/icons/svg/" . $fileSuffix . ".svg";

if (!file_exists($fileIcon)) {
    $fileIcon = "../images/icons/file.svg";
} else
    $fileIcon = ".$fileIcon";

if (strlen($result['message']) > 0)
    $message = $result['message'];

else
    $message = "";
?>
<div id="main-bg">
    <div class="upload wide-box">
        <a href="<?php echo "." . $result['file_path']; ?>" download="<?php echo $result['file_name']; ?>" class="file-name">
            <div class="row">
                <div class="col-3" style="min-width: 58px;">
                    <img src="<?php echo $fileIcon ?>" alt="" width="25px" height="25px">
                    <p class="file-size"><?php echo $fileSize; ?></p>
                </div>
                <div class="col">
                    <p class="file-name"><?php echo $result['file_name']; ?></p>
                </div>
            </div>
        </a>
        <div class="message-bg">
            <p><?php echo $message; ?></p>
        </div>
        <p class="hint-sm">Click file name to download.</p>
        <a href="/transfer" class="btn btn-primary mt-4 btn-sm mt-2" id="home-button">Share files?<i class="fas fa-arrow-circle-left mr-1 ml-1 arrow-left" aria-hidden="true"></i></a>
    </div>
    <?php require_once 'socialmediaLinks.php'; ?>
</div>