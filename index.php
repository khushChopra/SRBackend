<?php

echo "Edit 14 User api done";
$method = $_SERVER['REQUEST_METHOD'];

echo "\n";

switch ($method) {
  case 'GET':
    $sql = "GET";echo $sql; break;
  case 'PUT':
    $sql = "PUT";echo $sql; break;
  case 'POST':
    $sql = "POST";echo $sql; break;
  case 'DELETE':
    $sql = "DELETE";echo $sql; break;
}
/*


curl --header "Content-Type: application/json" --request POST --data '{"fname":"Prop test","num":"1253698745"}' https://khushmayank.azurewebsites.net/api.php

curl https://khushmayank.azurewebsites.net/api.php

curl https://khushmayank.azurewebsites.net/api.php?num={num}

curl -X "DELETE" https://khushmayank.azurewebsites.net