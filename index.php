<?php

echo "Edit 13 User api done";
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
