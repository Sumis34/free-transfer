<?php
$name = bin2hex(random_bytes(4)) . "_" . time();
echo $name;