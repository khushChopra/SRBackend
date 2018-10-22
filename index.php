<?php

echo "Edit 12 trying on method segregation";
echo $_SERVER['REQUEST_METHOD'];

echo "\n";

switch ($method) {
  case 'GET':
    $sql = "GET"; break;echo $sql;
  case 'PUT':
    $sql = "PUT"; break;echo $sql;
  case 'POST':
    $sql = "POST"; break;echo $sql;
  case 'DELETE':
    $sql = "DELETE"; break;echo $sql;
}
