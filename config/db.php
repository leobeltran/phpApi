<?php
  class TDabaBase {

    public $conn;

    private $host = "localhost";
    private $database = "prod";
    private $user = "prod";
    private $password = "pass";

    public function getConnection(){
      $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->database;
      $this->conn = new PDO($dsn, $this->user, $this->password);

      return $this->conn;
    }
  }
