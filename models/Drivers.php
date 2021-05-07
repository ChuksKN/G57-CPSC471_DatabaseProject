<?php 
  class Drivers {
    // DB stuff
    private $conn;
    private $table = 'drivers';

    // Employee Properties
    public $VIN;
    public $PlanNumber;
    public $DriverName;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT *
                FROM ' . $this->table;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Post
    public function read_single() {
          // Create query
          $query = 'SELECT *
                    FROM ' . $this->table . '
                    WHERE VIN = :VIN, PlanNumber = :PlanNumber';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Bind ID
          $stmt->bindParam(':VIN', $this->VIN);
          $stmt->bindParam(':PlanNumber', $this->PlanNumber);

          // Execute query
          $stmt->execute();

          return $stmt;
    }

    // Create Post
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . ' SET VIN = :VIN, PlanNumber = :PlanNumber, DriverName = :DriverName';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->VIN = htmlspecialchars(strip_tags($this->VIN));
          $this->PlanNumber = htmlspecialchars(strip_tags($this->PlanNumber));
          $this->DriverName = htmlspecialchars(strip_tags($this->DriverName));

          // Bind data
          $stmt->bindParam(':VIN', $this->VIN);
          $stmt->bindParam(':PlanNumber', $this->PlanNumber);
          $stmt->bindParam(':DriverName', $this->DriverName);

          // Execute query
          if($stmt->execute()) {
            return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }
    
  }