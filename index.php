<?php

echo "Edit 15 User api finished";
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

create
curl --header "Content-Type: application/json" --request POST --data '{"fname":"Prop test","num":"1253698745"}' https://khushmayank.azurewebsites.net/api.php

read all
curl https://khushmayank.azurewebsites.net/api.php

delete
curl https://khushmayank.azurewebsites.net/api.php?num=1253698745
