<?php 
  class Admin {
    // DB stuff
    private $conn;
    private $table =  'Admin';

    // Employee Properties
    public $employee_id;
    public $fname;
    public $lname;
    public $dob;
    public $email;
    public $address;
    public $salary;
    public $super_eid;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT *
                FROM Employee NATURAL JOIN ' . $this->table;
      
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
                    FROM Employee e NATURAL JOIN ' .$this->table. '
                    LIMIT 0,1';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Bind ID
          $stmt->bindParam(1, $this->employee_id);

          // Execute query
          $stmt->execute();

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
          $this->fname = $row['fname'];
          $this->lname = $row['lname'];
          $this->dob = $row['dob'];
          $this->email = $row['email'];
          $this->salary = $row['salary'];
          $this->super_eid = $row['super_eid'];
    }

    // Create Post
    public function create() {
          // Create query
          $query = 'INSERT INTO' . $this->table . ' SET employee_id = :employee_id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->employee_eid = htmlspecialchars(strip_tags($this->employee_id));

          // Bind data
          $stmt->bindParam(':employee_id', $this->employee_id);

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
          $query = 'UPDATE Employee
                    SET fname = :fname, lname = :lname, dob = :dob, email = :email, address = :address salary = :salary, super_eid = :super_eid
                    WHERE employee_id = :employee_id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->fname = htmlspecialchars(strip_tags($this->fname));
          $this->dname = htmlspecialchars(strip_tags($this->dname));
          $this->dob = htmlspecialchars(strip_tags($this->dob));
          $this->email = htmlspecialchars(strip_tags($this->email));
          $this->salary = htmlspecialchars(strip_tags($this->salary));
          $this->super_eid = htmlspecialchars(strip_tags($this->super_eid));

          // Bind data
          $stmt->bindParam(':fname', $this->fname);
          $stmt->bindParam(':lname', $this->lname);
          $stmt->bindParam(':dob', $this->dob);
          $stmt->bindParam(':email', $this->email);
          $stmt->bindParam(':salary', $this->salary);
          $stmt->bindParam(':super_eid', $this->super_eid);
          $stmt->bindParam(':employee_id', $this->employee_id);

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
          $query2 = 'DELETE FROM ' . $this->table . ' WHERE employee_id = :employee_id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->employee_id = htmlspecialchars(strip_tags($this->employee_id));

          // Bind data
          $stmt->bindParam(':employee_id', $this->employee_id);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }
    
  }
