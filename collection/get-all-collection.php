<?php
// Import request config and object
require_once '../config/get-setup.php';
require_once '../objects/collection.php';
$collection = new Collection($db);

// Retrieve query string parameters
$idUser = $_GET['idUser'];
 
// API logic and results
$stmt = $collection -> selectAllCollection($idUser);
$data = $db -> fetchAll($stmt);

if (isset($idUser)) {
    if (count($data) > 0) {
        // Okay response, return json data
        http_response_code(200);
        $values = $data;
        $db -> toJson($values);
    } else {
        // No data available
        http_response_code(404);
        $db -> toJson(array("message" => "No collection found."));
    }
} else {
    // Error
    http_response_code(400);
    $db -> toJson(array("message" => "Unable to get collection. Input data is incomplete."));
}