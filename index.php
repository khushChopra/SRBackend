<?php

echo "Helloa Khush!";

try {
    $conn = new PDO("sqlsrv:server = tcp:searchrescue.database.windows.net,1433; Database = searchrescue", "piyushchoudhary", "piyush@123");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo $conn;
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

