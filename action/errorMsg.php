<?php

function errorMsg($msg)
{
    $invalide = true;
    $_SESSION['error'] = $msg;
    return $invalide;
}

function msgBox()
{
    $error = "";
    $success = "";
    if (!empty($_SESSION['error'])) {
        $error = $_SESSION['error'];
?>
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none'">&times;</span>
            <P class="text-center"><strong><?php echo $error;
                                            $_SESSION['error'] = ""; ?></strong></P>
        </div>
    <?php
    } elseif (!empty($_SESSION['success'])) {
        $success = $_SESSION['success'];
    ?>
        <div class="alert success">
            <span class="closebtn" onclick="this.parentElement.style.display='none'">&times;</span>
            <P class="text-center"><strong><?php echo $success;
                                            $_SESSION['success'] = ""; ?></strong></P>
        </div>
<?php
    }
}
