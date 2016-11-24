<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once 'config/db.php';
include_once 'api/client.php';

$database = new TDabaBase();
$conn = $database->getConnection();
$client_handler = new TClient($conn);

$data = json_decode(file_get_contents("php://input"));

$client_handler->name = $data->name;
$client_handler->email = $data->email;
$client_handler->address = $data->address;
$client_handler->phone = $data->phone;
$client_handler->client_id = $data->client_id;

$client_handler->update();
