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
  	
  	$tsql= "select * from imgt where num = '".$_GET['num']."'";
	$getResults= sqlsrv_query($conn, $tsql);
	if ($getResults == FALSE)
	    echo (sqlsrv_errors());
	$products_arr=array();
	while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
		$temp = array(
			"num" =>$row['num'],
    		"north" =>$row['north'],
    		"south"  =>$row['south'],
    		"east"  =>$row['east'],
    		"west" =>$row['west']
		);
        http_response_code(200);
        echo json_encode($temp);
	}
	
	break;
}

?>