<?php

class Database {
    // Database credentials
    // ADD HERE YOU DATABASE CREDENTIALS
    private $host = "";
    private $db_name = "";
    private $username = "";
    private $password = "";
    private $charset = "";

    public $conn;
 
    public function __construct() {
        $this -> conn = null;
 
        try {
            $this -> conn = new PDO("mysql:host=" . $this -> host . ";dbname=" . $this -> db_name . ";charset=" . $this -> charset, $this -> username, $this -> password, $this -> pdoSettings());
        } catch (\PDOException $e) {
            throw new \PDOException($e -> getMessage(), (int) $e -> getCode());
        }
    }


    // PDO all main methods
    
    private function prepare($query) {
        return $this -> conn -> prepare($query);
    }

    public function execute($query, $dataArray) {
        $stmt = $this -> prepare($query);
        $stmt -> execute($dataArray);
        return $stmt;
    }

    public function executeUpdate($query, $dataArray) {
        $stmt = $this -> prepare($query);
        if ($stmt -> execute($dataArray)) {
            return true;
        }

        return false;
    }

    public function fetchComplete($query, $dataArray) {
        return ( $this -> execute($query, $dataArray) ) -> fetch();
    }

    public function fetchAllComplete($query, $dataArray) {
        return ( $this -> execute($query, $dataArray) ) -> fetchAll();
    }
    
    public function fetchAllUniqueComplete($query, $dataArray) {
        return ( $this -> execute($query, $dataArray) ) -> fetchAll(PDO::FETCH_UNIQUE);
    }

    public function fetch($stmt) {
        return $stmt -> fetch();
    }

    public function fetchAll($stmt) {
        return $stmt -> fetchAll();
    }
    
    public function fetchAllUnique($stmt) {
        return $stmt -> fetchAll(PDO::FETCH_UNIQUE);
    }

    public function toJson($array) {
        echo json_encode($array);
    }

    public function cleanParameters($parameters) {
        foreach ($parameters as $value) {
            $value = htmlspecialchars(strip_tags($value));
        }

        return $parameters;
    }

    private function pdoSettings() {
        return [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
    }
}