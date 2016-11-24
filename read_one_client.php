<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once 'config/db.php';
include_once 'api/client.php';

$database = new TDabaBase();
$conn = $database->getConnection();
$client_handler = new TClient($conn);

$getdata = json_decode(file_get_contents("php://input"));
$client_handler->client_id = $getdata->client_id;

$client = $client_handler->getOneById();

$data = '{';
$data .= '"client_id":"' . $client[0] . '",';
$data .= '"name":"' . $client[1] . '",';
$data .= '"email":"' . $client[2] . '",';
$data .= '"address":"' . $client[3] . '",';
$data .= '"phone":"' . $client[4] . '"';
$data .= '}';

echo $data;
