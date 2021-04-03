<?php 
  class Technician {
    // DB stuff
    private $conn;
    private $table = 'Technician';

    // Employee Properties
    public $employee_id;
    public $fname;
    public $lname;
    public $dob;
    public $email;
    public $address;
    public $salary;
    public $super_eid;
    public $t_grade;

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
                    FROM Employee e NATURAL JOIN ' . $this->table .
                    'WHERE e.employee_id = ?
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
          $this->t_grade = $row['t_grade'];
    }

    // Create Post
    public function create() {
          // Create query
          $query = 'INSERT INTO' . $this->table . ' SET employee_id = :employee_id, t_grade = :t_grade';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->employee_id = htmlspecialchars(strip_tags($this->employee_id));
          $this->t_grade = htmlspecialchars(strip_tags($this->t_grade));


          // Bind data
          $stmt->bindParam(':employee_id', $this->employee_id);
          $stmt->bindParam(':t_grade', $this->t_grade);

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
                    SET t_grade = :t_grade
                    WHERE employee_id = :employee_id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->t_grade = htmlspecialchars(strip_tags($this->t_grade));

          // Bind data
          $stmt->bindParam(':t_grade', $this->t_grade);

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
