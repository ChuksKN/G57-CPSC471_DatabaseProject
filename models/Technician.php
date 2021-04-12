<?php 
  class Technician {
    // DB stuff
    private $conn;
    private $table = 'technician';

    // employee Properties
    public $EmployeeID;
    public $Fname;
    public $Lname;
    public $DOB;
    public $Email;
    public $Address;
    public $Salary;
    public $Super_EID;
    public $T_grade;

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

    public function read_under() {
      // Create query
      $query = 'SELECT *
                FROM employee NATURAL JOIN ' . $this->table . '
                WHERE Super_EID = ?';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->Super_EID);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Post
    public function read_single() {
          // Create query
          $query = 'SELECT *
                    FROM employee NATURAL JOIN ' . $this->table . '
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
          $this->T_grade = $row['T_grade'];
    }

    // Create Post
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . ' SET EmployeeID = :EmployeeID, T_grade = :T_grade';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->EmployeeID = htmlspecialchars(strip_tags($this->EmployeeID));
          $this->T_grade = htmlspecialchars(strip_tags($this->T_grade));


          // Bind data
          $stmt->bindParam(':EmployeeID', $this->EmployeeID);
          $stmt->bindParam(':T_grade', $this->T_grade);

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
                    SET T_grade = :T_grade
                    WHERE EmployeeID = :EmployeeID';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->T_grade = htmlspecialchars(strip_tags($this->T_grade));

          // Bind data
          $stmt->bindParam(':T_grade', $this->T_grade);

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