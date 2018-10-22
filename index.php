<?php

echo "Edit 12 trying on method segregation";
echo $_SERVER['REQUEST_METHOD'];

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
