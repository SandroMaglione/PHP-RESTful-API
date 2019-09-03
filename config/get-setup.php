<?php

// Required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json; charset=UTF-8");

if (!($_SERVER['REQUEST_METHOD'] === 'GET')) {
    http_response_code(405);
    echo json_encode(array("message" => "Request method not allowed."));
    exit();
}
// Include database and object files
require_once '../config/database.php';
 
// Instantiate database and initialize object
$db = new Database();