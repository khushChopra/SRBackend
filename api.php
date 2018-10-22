<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$connectionInfo = array("UID" => "piyushchoudhary@khushmayankdb", "pwd" => "piyush@123", "Database" => "kmdb", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:khushmayankdb.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);


$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'),true);


// inserting takes in json and inserts it into the users table
$tsql1= "insert into users values('".$input->fname."','".$input->num."')";
$insertReview = sqlsrv_query($conn, $tsql);


//    to get all users back in json
$tsql= "SELECT *
        FROM users
        ";
$getResults= sqlsrv_query($conn, $tsql);
if ($getResults == FALSE)
    echo (sqlsrv_errors());
$products_arr=array();
$products_arr["records"]=array();
while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
	$temp = array(
		"fname" =>$row['fname'],
		"num" =>$row['num']
	);
	array_push($products_arr["records"], $temp);
}
http_response_code(200);
echo json_encode($products_arr);
?>