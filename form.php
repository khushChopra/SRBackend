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
  	if($_GET['num']){
  		$tsql2= "delete from form where num = '".$_GET['num']."'";
		$insertReview = sqlsrv_query($conn, $tsql2);
		break;
  	}
  	$tsql= "SELECT * FROM form";
	$getResults= sqlsrv_query($conn, $tsql);
	if ($getResults == FALSE)
	    echo (sqlsrv_errors());
	$products_arr=array();
	$products_arr["forms"]=array();
	while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
		$temp = array(
			"fname" =>$row['fname'],
			"num" =>$row['num'],
    		"num_of_people" =>$row['num_of_people'],
    		"min_age"  =>$row['min_age'],
    		"max_age"  =>$row['max_age'],
    		"disability" =>$row['disability'],
    		"injury"  =>$row['injury'],
    		"symptoms"  =>$row['symptoms'],
    		"foodwater_supply" =>$row['foodwater_supply'],
    		"height_of_water" =>$row['height_of_water'],
    		"access_area"  =>$row['access_area'],
    		"wind_intensity"  =>$row['wind_intensity'],
    		"street_blocked"  =>$row['street_blocked'],
    		"reachibility"  =>$row['reachibility'],
    		"lat"  =>$row['lat'],
    		"log"  =>$row['log'],
    		"north" =>$row['north'],
    		"south" =>$row['south'],
    		"east" =>$row['east'],
    		"west" =>$row['west'],
		);
		array_push($products_arr["forms"], $temp);
	}
	http_response_code(200);
	echo json_encode($products_arr);
	break;
  case 'POST':
    $tsql1= "insert into form values(".
    	"'".$input['fname']."',".
    	"'".$input['num']."',"
    	$input['num_of_people'].",".
    	$input['min_age'].",".
    	$input['max_age'].",".

    	"'".$input['disability']."',".
    	"'".$input['injury']."',".
    	"'".$input['symptoms']."',".
    	"'".$input['foodwater_supply']."',".
    	"'".$input['height_of_water']."',".
    	"'".$input['access_area']."',".
    	"'".$input['wind_intensity']."',".
    	"'".$input['street_blocked']."',".
    	"'".$input['reachibility']."',".


    	$input['lat'].",".
    	$input['log'].",".

    	"'".$input['north']."',".
    	"'".$input['south']."',".
    	"'".$input['east']."',".
    	"'".$input['west']."'".
        ")";




	$insertReview = sqlsrv_query($conn, $tsql1);
	break;
  case 'DELETE':
    
}

?>