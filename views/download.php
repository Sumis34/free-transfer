<?php

require_once './sql/executeSQL.php';

$fileCode = $_SESSION['fileToGet'];

$result = executeSQL('getFileData', $fileCode, true);


?>

<div id="main-bg">
    <div class="upload">
        <a href="<?php echo "." .$result['file_path'];?>" download="<?php echo $result['file_name'];?>"><?php echo $result['file_name'];?></a>
    </div>
</div>


