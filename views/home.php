<?php require_once './js/upload_js.php';?>
<script src="./js/upload_style.js"></script>
<div id="main-bg">
    <div class="upload">
        <!-- File upload form -->
        <form id="uploadForm" enctype="multipart/form-data">
            <label>Choose File:</label>
            <input type="file" name="file" id="fileInput">
        </form>
        <!-- Progress bar -->
        <div class="progress">
            <div class="progress-bar"></div>
        </div>
        <!-- Display upload status -->
        <div id="uploadStatus"></div>
    </div>
</div>