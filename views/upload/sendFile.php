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
<script src="./js/copy.js"></script>

<div id="main-bg">
    <div class="share" id="share">
        <p class="success mb-4">Congratulation!</p>
        <p class="hint-sm ">Add a message to your link.</p>
        <form action="updateFileMSG" id="updateFileMSG" method="post">
            <div class="form-floating">
                <textarea class="form-control" id="fileMSG" name="fileMSG" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"><?php echo $fileData['message'] ?></textarea>
            </div>
        </form>
        <p class="hint-sm mb-1">Share your download link.</p>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="link" id="fileLink" value="<?php echo $actual_link ?>" aria-describedby="button-addon2">
            <button class="btn btn-outline-green" type="button" id="button-addon2" onclick="copyLink()">
                <div class="clipboard-icon"><?php echo file_get_contents("./images/icons/notepad.svg"); ?></div>
            </button>
        </div>

        <a href="home" id="new-upload" class="btn btn-gradient mt-2">New upload?</a>
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
            <div id="copytoast" class="toast align-items-center text-white bg-soft-green border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        Link copyed!
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
</div>