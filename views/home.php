<?php require_once './js/upload_js.php'; ?>
<script src="./js/upload_style.js"></script>
<div id="main-bg">
    <div class="upload" id="upload">
        <!-- File upload form -->
        <form id="uploadForm" enctype="multipart/form-data" method="post">
            <label for="fileInput" id="fileInput-label">
                <div class="add-file-button"><i class="fas fa-plus"></i></div>
            </label>
            <input type="file" name="file" id="fileInput" hidden>
        </form>
        <p class="hint">Click, to upload files</p>
    </div>
    <div class="social-links">
        <div class="row">
            <div class="col"><a href="youtube.com/channel/UCrMHiwrrOGY3sAtQV3KgZyA" target="_blank"><i class="fab fa-youtube"></i></a></div>
            <div class="col"><a href="https://www.instagram.com/noekrebs/" target="_blank"><i class="fab fa-instagram"></i></a></div>
        </div>
    </div>
</div>