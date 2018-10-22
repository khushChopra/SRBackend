<?php
$serverName = "sqlsrv:server = tcp:khushmayankdb.database.windows.net,1433";
$connectionOptions = array(
    "Database" => "kmdb",
    "Uid" => "piyushchoudhary",
    "PWD" => "piyush@123"
);
//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

echo($conn);
$tsql= "SELECT *
        FROM users
        ";
$getResults= sqlsrv_query($conn, $tsql);
echo ("Reading data from table" . PHP_EOL);
if ($getResults == FALSE)
    echo (sqlsrv_errors());
while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
 echo ($row['fname'] . " " . $row['num'] . PHP_EOL);
}
echo("Chala?")
sqlsrv_free_stmt($getResults);
?>