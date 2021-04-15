<?php
class Employee
{
  // DB stuff
  private $conn;
  private $table = 'employee';

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
  public $errormsg = null;

  // Constructor with DB
  public function __construct($db)
  {
    $this->conn = $db;
  }

  // Get Posts
  public function read()
  {
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
  public function read_single()
  {
    // Create query
    $query = 'SELECT *
                    FROM ' . $this->table . '
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

  // Get VIN from Post
  public function check_id()
  {
    // Create query
    $query = 'SELECT *
                          FROM ' . $this->table . '
                          WHERE VIN = ?';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind ID
    $stmt->bindParam(1, $this->VIN);

    // Execute query
    $stmt->execute();

    return $stmt;
  }

  // Create Post
  public function create()
  {
    try {
      // Create query
      $query = 'INSERT INTO ' . $this->table . ' SET EmployeeID = :EmployeeID, Fname = :Fname, Lname = :Lname, DOB = :DOB, Email = :Email, Address = :Address, PhoneNumber = :PhoneNumber, Salary = :Salary, Super_EID = :Super_EID';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->EmployeeID = htmlspecialchars(strip_tags($this->EmployeeID));
      $this->Fname = htmlspecialchars(strip_tags($this->Fname));
      $this->Lname = htmlspecialchars(strip_tags($this->Lname));
      $this->DOB = htmlspecialchars(strip_tags($this->DOB));
      $this->Email = htmlspecialchars(strip_tags($this->Email));
      $this->Address = htmlspecialchars(strip_tags($this->Address));
      $this->PhoneNumber = htmlspecialchars(strip_tags($this->PhoneNumber));
      $this->Salary = htmlspecialchars(strip_tags($this->Salary));
      $this->Super_EID = htmlspecialchars(strip_tags($this->Super_EID));

      // Bind data
      $stmt->bindParam(':Fname', $this->EmployeeID);
      $stmt->bindParam(':Fname', $this->Fname);
      $stmt->bindParam(':Lname', $this->Lname);
      $stmt->bindParam(':DOB', $this->DOB);
      $stmt->bindParam(':Email', $this->Email);
      $stmt->bindParam(':Address', $this->Address);
      $stmt->bindParam(':PhoneNumber', $this->PhoneNumber);
      $stmt->bindParam(':Salary', $this->Salary);
      $stmt->bindParam(':Super_EID', $this->Super_EID);

      // Execute query
      if ($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    } catch (Exception $e) {
      $this->errormsg = $e->getMessage();
      return false;
    }
  }

  // Update Post
  public function update()
  {
    try {
      // Create query
      $query = 'UPDATE ' . $this->table . '
                    SET Fname = :Fname, Lname = :Lname, DOB = :DOB, Email = :Email, Address = :Address, PhoneNumber = :PhoneNumber, Salary = :Salary, Super_EID = :Super_EID
                    WHERE EmployeeID = :EmployeeID';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->Fname = htmlspecialchars(strip_tags($this->Fname));
      $this->Lname = htmlspecialchars(strip_tags($this->Lname));
      $this->DOB = htmlspecialchars(strip_tags($this->DOB));
      $this->Email = htmlspecialchars(strip_tags($this->Email));
      $this->Address = htmlspecialchars(strip_tags($this->Address));
      $this->PhoneNumber = htmlspecialchars(strip_tags($this->PhoneNumber));
      $this->Salary = htmlspecialchars(strip_tags($this->Salary));
      $this->Super_EID = htmlspecialchars(strip_tags($this->Super_EID));

      // Bind data
      $stmt->bindParam(':Fname', $this->Fname);
      $stmt->bindParam(':Lname', $this->Lname);
      $stmt->bindParam(':DOB', $this->DOB);
      $stmt->bindParam(':Email', $this->Email);
      $stmt->bindParam(':Address', $this->Address);
      $stmt->bindParam(':PhoneNumber', $this->PhoneNumber);
      $stmt->bindParam(':Salary', $this->Salary);
      $stmt->bindParam(':Super_EID', $this->Super_EID);
      $stmt->bindParam(':EmployeeID', $this->EmployeeID);

      // Execute query
      if ($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    } catch (Exception $e) {
      $this->errormsg = $e->getMessage();
      return false;
    }
  }

  // Delete Post
  public function delete()
  {
    try {
      // Create query
      $query = 'DELETE FROM ' . $this->table . ' WHERE EmployeeID = :EmployeeID';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->EmployeeID = htmlspecialchars(strip_tags($this->EmployeeID));

      // Bind data
      $stmt->bindParam(':EmployeeID', $this->EmployeeID);

      // Execute query
      if ($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    } catch (Exception $e) {
      $this->errormsg = $e->getMessage();
      return false;
    }
  }
}
