<?php 
  class Customer {
    // DB stuff
    private $conn;
    private $table = 'Customer';

    // Employee Properties
    public $customer_id;
    public $cname;
    public $c_dob;
    public $credit_score;
    public $drivers_license;
    public $phone;

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
                    WHERE customer_id = ?
                    LIMIT 0,1';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Bind ID
          $stmt->bindParam(1, $this->customer_id);

          // Execute query
          $stmt->execute();

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
          $this->cname = $row['cname'];
          $this->c_dob = $row['c_dob'];
          $this->credit_score = $row['credit_score'];
          $this->drivers_license = $row['drivers_license'];
          $this->phone = $row['phone'];
    }

    // Create Post
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . ' SET cname = :cname, c_dob = :c_dob, credit_score = :credit_score, drivers_license = :drivers_license, phone = :phone';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->cname = htmlspecialchars(strip_tags($this->cname));
          $this->c_dob = htmlspecialchars(strip_tags($this->c_dob));
          $this->credit_score = htmlspecialchars(strip_tags($this->credit_score));
          $this->drivers_license = htmlspecialchars(strip_tags($this->drivers_license));
          $this->phone = htmlspecialchars(strip_tags($this->phone));

          // Bind data
          $stmt->bindParam(':cname', $this->cname);
          $stmt->bindParam(':c_dob', $this->c_dob);
          $stmt->bindParam(':credit_score', $this->credit_score);
          $stmt->bindParam(':drivers_license', $this->drivers_license);
          $stmt->bindParam(':phone', $this->phone);

          // Execute query
          if($stmt->execute()) {
            return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Update Post
    public function update() {
          // Create query
          $query = 'UPDATE ' . $this->table . '
                    SET cname = :cname, c_dob = :c_dob, credit_score = :credit_score, drivers_license = :drivers_license, phone = :phone, salary = :salary, super_eid = :super_eid
                    WHERE customer_id = :customer_id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->cname = htmlspecialchars(strip_tags($this->cname));
          $this->dname = htmlspecialchars(strip_tags($this->c_dob));
          $this->credit_score = htmlspecialchars(strip_tags($this->credit_score));
          $this->drivers_license = htmlspecialchars(strip_tags($this->drivers_license));
          $this->phone = htmlspecialchars(strip_tags($this->phone));

          // Bind data
          $stmt->bindParam(':fname', $this->fname);
          $stmt->bindParam(':c_dob', $this->c_dob);
          $stmt->bindParam(':credit_score', $this->credit_score);
          $stmt->bindParam(':drivers_license', $this->drivers_license);
          $stmt->bindParam(':phone', $this->phone);
          $stmt->bindParam(':salary', $this->salary);
          $stmt->bindParam(':customer_id', $this->customer_id);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }

    // Delete Post
    public function delete() {

          // Create query
          $query2 = 'DELETE FROM ' . $this->table . ' WHERE customer_id = :customer_id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->customer_id = htmlspecialchars(strip_tags($this->customer_id));

          // Bind data
          $stmt->bindParam(':customer_id', $this->customer_id);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }
    
  }