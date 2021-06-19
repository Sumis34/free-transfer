<?php
require_once './sql/executeSQL.php';

$fileCode = $_SESSION['fileCode'];

$fileData = executeSQL('getFileData', $fileCode, true);
//For live server remove transfer 
// like this: (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/file/$fileCode";

//This link is the download link the user gets
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/transfer/file/$fileCode";
?>
<script src="./js/fileMSG.js"></script>
<div id="main-bg">
    <div class="share" id="share">
        <p style="color:#28A74B;" class="success">File has uploaded successfully!</p>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="link" id="fileLink" value="<?php echo $actual_link ?>" aria-describedby="button-addon2">
            <button class="btn btn-outline-primary" type="button" id="button-addon2" onclick="copyLink()">Button</button>
        </div>
        <form action="updateFileMSG" id="updateFileMSG" method="post">
            <textarea type="text" id="fileMSG" name="fileMSG"><?php echo $fileData['message'] ?></textarea>
        </form>
        <a href="home " class="btn btn-primary">home</a>
    </div>
</div>