<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$connectionInfo = array("UID" => "piyushchoudhary@khushmayankdb", "pwd" => "piyush@123", "Database" => "kmdb", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:khushmayankdb.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);


$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'),true);


switch ($method) {
  case 'GET':
  	if($_GET['id']){
  		$tsql2= "delete from noti where id = '".$_GET['id']."'";
		$insertReview = sqlsrv_query($conn, $tsql2);
		break;
  	}
  	$tsql= "SELECT * FROM noti";
	$getResults= sqlsrv_query($conn, $tsql);
	if ($getResults == FALSE)
	    echo (sqlsrv_errors());
	$products_arr=array();
	$products_arr["forms"]=array();
	while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
		$temp = array(
			"id" =>$row['id'],
			"title" =>$row['title'],
    		"body" =>$row['body']
		);
		array_push($products_arr["forms"], $temp);
	}
	http_response_code(200);
	echo json_encode($products_arr);
	break;
  case 'POST':
    $tsql1= "insert into noti values(".
    	"'".$input['id']."',".
    	"'".$input['title']."',".
    	"'".$input['body']."'".
        ")";


	$insertReview = sqlsrv_query($conn, $tsql1);
	break;
  case 'DELETE':
    
}

?>