<div id="main-bg">
    <div class="upload">
        <!-- File upload form -->
        <form id="uploadForm" enctype="multipart/form-data">
            <label>Choose File:</label>
            <input type="file" name="file" id="fileInput">
            <input type="submit" name="submit" value="UPLOAD" />
        </form>
        <!-- Progress bar -->
        <div class="progress">
            <div class="progress-bar"></div>
        </div>
        <!-- Display upload status -->
        <div id="uploadStatus"></div>
    </div>
</div>