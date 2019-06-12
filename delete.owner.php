<?php 
    $host = "host = localhost";
    $port = "port = 5432";
    $dbname = "dbname = pet_hotel";

    $db = pg_connect( "$host $port $dbname");
    if(!db){
        echo "Error : Unable to open database\n";
    } else {
        echo "Opened database successfully\n";
    }

    $sql =<<<EOF
    DELETE FROM owner WHERE ID=$1;
EOF;
    $ret = pg_query($db, $sql);
    if(!$ret) {
        echo pg_last_error($db);
        exit;
    } else {
        echo "Operation deleted owner\n";
    }
    $sql =<<<EOF
    SELECT * FROM owner
EOF;

    $ret = pg_query($db, $sql);
    if(!$ret) {
        echo pg_last_error($db);
        exit;
    } 
    while($row = pg_fetch_row($ret)) {
        echo "id = ". $row[0] . "\n";
        echo "name = ". $row[1] ."\n\n";
    }
        echo "Operation received owner information\n";
    pg_close($db);
?>