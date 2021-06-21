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
            <textarea type="text" id="fileMSG" name="fileMSG"><?php echo $fileData['message'] ?></textarea>
        </form>
        <p class="hint-sm mb-1">Share your download link.</p>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="link" id="fileLink" value="<?php echo $actual_link ?>" aria-describedby="button-addon2">
            <button class="btn btn-outline-green" type="button" id="button-addon2" onclick="copyLink()">
                <div class="clipboard-icon"><?php echo file_get_contents("./images/icons/notepad.svg"); ?></div>
            </button>
        </div>
        <a href="home" id="new-upload" class="btn btn-gradient mt-2">New upload?</a>
    </div>

    <button type="button" class="btn btn-primary" id="toastbtn">Initialize toast</button>

    <!-- Toast -->
    <div class="toast">
        <div class="toast-header">
            <strong class="mr-auto">Bootstrap</strong>
            <small>11 mins ago</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">
                <span>&times;</span>
            </button>
        </div>
        <div class="toast-body">
            Hello, world! This is a toast message.
        </div>
    </div>

    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>

    <div id="copytoast" class="toast align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Hello, world! This is a toast message.
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>