<?php

class Collection {
    // Database connection
    private $conn;
 
    // Database connection
    public function __construct($db) {
        $this -> conn = $db;
    }

    // DB QUERY
    public function selectAllCollection($idUser) {
        $query = ""; // WRITE YOUR SQL QUERY
        return $this -> conn -> execute($query, [ $idUser ]);      
    }
}