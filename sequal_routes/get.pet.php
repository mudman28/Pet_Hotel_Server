
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
        SELECT * FROM pet
EOF;

    $ret = pg_query($db, $sql);
    if(!$ret) {
        echo pg_last_error($db);
        exit;
    } 
    while($row = pg_fetch_row($ret)) {
        echo "id = ". $row[0] . "\n";
        echo "name = ". $row[1] ."\n";
        echo "breed = ". $row[2] ."\n";
        echo "color = ". $row[3] ."\n";
        echo "is_checked_in = ". $row[4] ."\n";
        echo "owner_id = ". $row[5] ."\n\n";
    }
    echo "Operation received pet information\n";
    pg_close($db);
?>