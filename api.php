<?php
$connectionInfo = array("UID" => "piyushchoudhary@khushmayankdb", "pwd" => "piyush@123", "Database" => "kmdb", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:khushmayankdb.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
$tsql= "SELECT *
        FROM users
        ";
$getResults= sqlsrv_query($conn, $tsql);
echo ("Reading data from table" . PHP_EOL);
if ($getResults == FALSE)
    echo (sqlsrv_errors());
while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
 echo ($row['fname'] . " " . $row['num'] . "<br>");
}
//sqlsrv_free_stmt($getResults);
//sqlsrv_close($conn);
?>