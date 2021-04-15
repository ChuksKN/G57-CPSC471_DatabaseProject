<?php 
  class Admin {
    // DB stuff
    private $conn;
    private $table =  'admin';

    // Employee Properties
    public $EmployeeID;
    public $Fname;
    public $Lname;
    public $DOB;
    public $Email;
    public $Address;
    public $PhoneNumber;
    public $Salary;
    public $Super_EID;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT *
                FROM employee NATURAL JOIN ' . $this->table;
      
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
                    FROM employee e NATURAL JOIN ' .$this->table. '
                    WHERE EmployeeID = ?
                    LIMIT 0,1';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Bind ID
          $stmt->bindParam(1, $this->EmployeeID);

          // Execute query
          $stmt->execute();

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
          $this->Fname = $row['Fname'];
          $this->Lname = $row['Lname'];
          $this->DOB = $row['DOB'];
          $this->Email = $row['Email'];
          $this->Address = $row['Address'];
          $this->PhoneNumber = $row['PhoneNumber'];
          $this->Salary = $row['Salary'];
          $this->Super_EID = $row['Super_EID'];
    }

    // Create Post
    public function create() {
          // Create query
          $query = 'INSERT INTO' . $this->table . ' SET EmployeeID = :EmployeeID';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->employee_eid = htmlspecialchars(strip_tags($this->EmployeeID));

          // Bind data
          $stmt->bindParam(':EmployeeID', $this->EmployeeID);

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
          $query = 'UPDATE employee
                    SET Fname = :Fname, Lname = :Lname, DOB = :DOB, Email = :Email, Salary = :Salary, Super_SSN = :Super_SSN
                    WHERE EmployeeID = :EmployeeID';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->Fname = htmlspecialchars(strip_tags($this->Fname));
          $this->Lname = htmlspecialchars(strip_tags($this->Lname));
          $this->DOB = htmlspecialchars(strip_tags($this->DOB));
          $this->Email = htmlspecialchars(strip_tags($this->Email));
          $this->Salary = htmlspecialchars(strip_tags($this->Salary));
          $this->Super_EID = htmlspecialchars(strip_tags($this->Super_EID));
          $this->EmployeeID = htmlspecialchars(strip_tags($this->EmployeeID));

          // Bind data
          $stmt->bindParam(':Fname', $this->Fname);
          $stmt->bindParam(':Lname', $this->Lname);
          $stmt->bindParam(':DOB', $this->DOB);
          $stmt->bindParam(':Email', $this->Email);
          $stmt->bindParam(':Salary', $this->Salary);
          $stmt->bindParam(':Super_SSN', $this->Super_EID);
          $stmt->bindParam(':EmployeeID', $this->EmployeeID);

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
          $query = 'DELETE FROM ' . $this->table . ' WHERE EmployeeID = :EmployeeID';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->EmployeeID = htmlspecialchars(strip_tags($this->EmployeeID));

          // Bind data
          $stmt->bindParam(':EmployeeID', $this->EmployeeID);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }
    
  }