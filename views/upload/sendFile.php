<?php
$fileCode = $_SESSION['fileCode'];

//For live server remove transfer 
// like this: (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/file/$fileCode";

//This link is the download link the user gets
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/transfer/file/$fileCode";
?>
<script src="./js/fileMSG.js"></script>
<div id="main-bg">
    <div class="share" id="share">
        <p style="color:#28A74B;" class="success">File has uploaded successfully!</p> <input type="text" name="link" value="<?php echo $actual_link ?>"></input>
        <form action="updateFileMSG" id="updateFileMSG" method="post">
            <textarea type="text" id="fileMSG" name="fileMSG" value="<?php echo ""?>"></textarea>
        </form>
        <a href="home " class="btn btn-primary">home</a>
    </div>
</div>