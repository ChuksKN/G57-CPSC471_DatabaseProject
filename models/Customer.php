<?php 
  class Customer {
    // DB stuff
    private $conn;
    private $table = 'customer';

    // customer Properties
    public $CustomerID;
    public $CName;
    public $C_DOB;
    public $Credit_Score;
    public $Drivers_License;
    public $PhoneNo;
    public $errormsg = null;

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
                    WHERE CustomerID = ?
                    LIMIT 0,1';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Bind ID
          $stmt->bindParam(1, $this->CustomerID);

          // Execute query
          $stmt->execute();

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
          $this->CName = $row['CName'];
          $this->C_DOB = $row['C_DOB'];
          $this->Credit_Score = $row['Credit_Score'];
          $this->Drivers_License = $row['Drivers_License'];
          $this->PhoneNo = $row['PhoneNo'];
    }

    // Create Post
    public function create() {
      try{
          // Create query
          $query = 'INSERT INTO ' . $this->table . ' SET CustomerID = :CustomerID, CName = :CName, C_DOB = :C_DOB, Credit_Score = :Credit_Score, Drivers_License = :Drivers_License, PhoneNo = :PhoneNo';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->CustomerID = htmlspecialchars(strip_tags($this->CustomerID));
          $this->CName = htmlspecialchars(strip_tags($this->CName));
          $this->C_DOB = htmlspecialchars(strip_tags($this->C_DOB));
          $this->Credit_Score = htmlspecialchars(strip_tags($this->Credit_Score));
          $this->Drivers_License = htmlspecialchars(strip_tags($this->Drivers_License));
          $this->PhoneNo = htmlspecialchars(strip_tags($this->PhoneNo));

          // Bind data
          $stmt->bindParam(':CustomerID', $this->CustomerID);
          $stmt->bindParam(':CName', $this->CName);
          $stmt->bindParam(':C_DOB', $this->C_DOB);
          $stmt->bindParam(':Credit_Score', $this->Credit_Score);
          $stmt->bindParam(':Drivers_License', $this->Drivers_License);
          $stmt->bindParam(':PhoneNo', $this->PhoneNo);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
      }
      catch(Exception $e){
        $this->errormsg = $e->getMessage();
        return false;
      }
    }

    // Update Post
    public function update() {
        try{
          // Create query
          $query = 'UPDATE ' . $this->table . '
                    SET CName = :CName, C_DOB = :C_DOB, Credit_Score = :Credit_Score, Drivers_License = :Drivers_License, PhoneNo = :PhoneNo
                    WHERE CustomerID = :CustomerID';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->CName = htmlspecialchars(strip_tags($this->CName));
          $this->dname = htmlspecialchars(strip_tags($this->C_DOB));
          $this->Credit_Score = htmlspecialchars(strip_tags($this->Credit_Score));
          $this->Drivers_License = htmlspecialchars(strip_tags($this->Drivers_License));
          $this->PhoneNo = htmlspecialchars(strip_tags($this->PhoneNo));
          $this->CustomerID = htmlspecialchars(strip_tags($this->CustomerID));

          // Bind data
          $stmt->bindParam(':CName', $this->fname);
          $stmt->bindParam(':C_DOB', $this->C_DOB);
          $stmt->bindParam(':Credit_Score', $this->Credit_Score);
          $stmt->bindParam(':Drivers_License', $this->Drivers_License);
          $stmt->bindParam(':PhoneNo', $this->PhoneNo);
          $stmt->bindParam(':CustomerID', $this->CustomerID);

          // Execute query
          if($stmt->execute()) {
            if($stmt->rowCount() == 0)
                {
                    $this->errormsg = 'No row was effected. CustomerID may be invalid.';
                    return false;
                }
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
        }
        catch(Exception $e){
          $this->errormsg = $e->getMessage();
          return false;
        }
    }

    // Delete Post
    public function delete() {

      try{
          // Create query
          $query = 'DELETE FROM ' . $this->table . ' WHERE CustomerID = :CustomerID';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->CustomerID = htmlspecialchars(strip_tags($this->CustomerID));

          // Bind data
          $stmt->bindParam(':CustomerID', $this->CustomerID);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
      }
      catch(Exception $e){
        $this->errormsg = $e->getMessage();
        return false;
      }
    }
    
  }