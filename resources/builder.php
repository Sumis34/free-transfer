<?php
function build($page)
{
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
        <script src="js/table.js"></script>
        <script src="js/nav.js"></script>
        <script src="js/timer.js"></script>
        <script src="js/message.js"></script>
        <script src="js/tableSwitch.js"></script>
        <script src="js/selectPlayer.js"></script>
        <script src="js/header.js"></script>
        <script src="https://kit.fontawesome.com/c38bf06c9c.js" crossorigin="anonymous"></script>
        <link rel="shortcut icon" type="image/png" href="/images/favicon.png">
        <script src="/js/google.js"></script>
        <title>Free Transfer</title>
    </head>

    <body data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="55" tabindex="0">
        <header>
        </header>
        <main>
            <?php

            switch ($page) {
                case "insertFeedBack.php":
                    require_once './action/' . $page;
                    break;
                case "updateSpotlight.php":
                    require_once './action/' . $page;
                    break;

                case "deleteFeedBack.php":
                    require_once './action/' . $page;
                    break;

                case "uploadPB.php":
                    require_once './action/' . $page;
                    break;

                case "removePlayerData.php":
                    require_once './action/' . $page;
                    break;

                case "createDBBackup.php":
                    require_once './action/' . $page;
                    break;

                case "searchPlayer.php":
                    require_once './action/' . $page;
                    break;

                case "sendDiscordMsg.php":
                    require_once './action/' . $page;
                    break;

                case "clearPyLog.php":
                    require_once './action/' . $page;
                    break;

                default:
                    require_once './views/' . $page;
                    break;
            }
            ?>
        </main>
        <footer class="site-footer">
            <?php require_once 'footer.php'; ?>
        </footer>
    </body>

    </html>
<?php
}
?>