<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once 'config/db.php';
include_once 'api/client.php';

$database = new TDabaBase();
$conn = $database->getConnection();
$client_handler = new TClient($conn);


// read and show all the clients
$stored = $client_handler->getAllFromDB();
$clientCount = $stored->rowCount();

$data = '';
$x = 1;

foreach ($stored as $client) {
  $data .= '{';
  $data .= '"client_id":"' . $client[0] . '",';
  $data .= '"name":"' . $client[1] . '",';
  $data .= '"email":"' . $client[2] . '",';
  $data .= '"address":"' . $client[3] . '",';
  $data .= '"phone":"' . $client[4] . '"';
  $data .= '}';

  $x++;
  if($x <= $clientCount) $data .= ',';
}

echo '{"clients": [' . $data . ']}';
