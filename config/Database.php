<?php 
  class Database 
  {
    // DB Params
    private $host = 'localhost';
    private $db_name = 'dealership_dp';
    private $username = 'root';
    private $password = '12345678';
    private $conn;

    // DB Connect
    public function connect() {
      $this->conn = null;

      try { 
        $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password, array(PDO::MYSQL_ATTR_FOUND_ROWS => true));
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
      }

      return $this->conn;
    }
  }