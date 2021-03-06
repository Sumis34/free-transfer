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
        <link rel="stylesheet" href="/transfer/css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
        <script src="https://kit.fontawesome.com/c38bf06c9c.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="/transfer/js/upload.js"></script>
        <link rel="shortcut icon" type="image/png" href="/transfer/images/favicon.png">
        <meta name="og:title" content="Free-Transfer"/>
        <meta name="og:type" content="website"/>
        <meta name="og:url" content="web.noekrebs.ch/transfer"/>
        <meta name="og:image" content="https://tenantor.com/wp-content/uploads/data_transfer.jpg"/>
        <meta name="og:site_name" content="Free-transfer"/>
        <meta name="og:description" content="A platform to share your files with others."/>
        <title>Free Transfer</title>
    </head>

    <body tabindex="0">
        <header>
        </header>
        <main>
            <?php

            switch ($page) {
                case "upload.php":
                    require_once './action/' . $page;
                    break;

                case "sendFile.php":
                    require_once './views/upload/' . $page;
                    break;

                case "updateFileMSG.php":
                    require_once './action/' . $page;
                    break;

                default:
                    require_once './views/' . $page;
                    break;
            }
            ?>
        </main>
        <footer>
        </footer>
    </body>

    </html>
<?php
}
?>