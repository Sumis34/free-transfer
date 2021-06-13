<?php

function startDB()
{
    $db = new mysqli(
        "localhost",
        $GLOBALS['DB_USERNAME'],
        $GLOBALS['DB_PASSWORD'],
        "db_stats"
    );
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    return $db;
}
