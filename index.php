<?php

echo "Edit 16 Form api first";
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
curl --header "Content-Type: application/json" --request POST --data '{"fname":"Prop test","num":"1253698745"}' https://khushmayank.azurewebsites.net/user.php

read all
curl https://khushmayank.azurewebsites.net/user.php

delete
curl https://khushmayank.azurewebsites.net/user.php?num=1253698745



create table form(
    fname varchar(50),
    num varchar(10),
    num_of_people int,
    min_age int,
    max_age int,
    disability varchar(10),
    injury varchar(10),
    symptoms varchar(70),
    foodwater_supply varchar(50),
    height_of_water varchar(30),
    access_area varchar(10),
    wind_intensity varchar(10),
    street_blocked varchar(10),
    reachibility varchar(10),
    lat float,
    log float,
    north varchar(max),
    south varchar(max),
    east varchar(max),
    west varchar(max)
);