<?php

function executeSQL($query_name, $parameter = "", $single_result = false)
{   
    include_once './sql/startDB.php';
    
    $db = startDB();

    // dies if db connection failed
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // loads the content of the given query
    $raw_query = file_get_contents("./sql/queries/" . $query_name . ".sql");

    // replaces all occurrences of the replacement steamid with the given parameter
    $query = str_replace("2b82f2976213e308", $parameter, $raw_query);

    // executes the query
    $result = $db->query($query);

    // array for each row of the db
    $rows = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($rows, $row);
        }
    }

    // closes the connection to the db
    $db->close();

    // no result will allways return false
    if (count($rows) == 0)
        return false;
    // if the single result parameter is passed with true the first element will be returned
    elseif (count($rows) == 1 && $single_result)
        return $rows[0];
    // otherwise the whole array of rows will be returned
    else
        return $rows;
}
