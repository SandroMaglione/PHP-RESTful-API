<?php

// Required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
if (!($_SERVER['REQUEST_METHOD'] === 'DELETE')) {
    http_response_code(405);
    echo json_encode(array("message" => "Request method not allowed."));
    exit();
}
// Include database and object files
require_once '../config/database.php';
 
// Instantiate database and initialize object
$db = new Database();