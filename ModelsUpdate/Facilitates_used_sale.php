<?php
  class Facilitates_used_sale {
    // DB stuff
    private $conn;
    private $table = 'used_car_sale';

    // Facilitates_new_sale Properties
    public $EmployeeID;
    public $CustomerID;
    public $VIN;
    public $USaleID;
    public $USaleDate;
    public $LPlateNo;
    public $PaymentMethod;

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
  public function read_single()
  {
    // Create query
    $query = 'SELECT *
                    FROM ' . $this->table . '
                    WHERE USaleID = ?
                    LIMIT 0,1';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind ID
    $stmt->bindParam(1, $this->USaleID);

    // Execute query
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Set properties
    $this->EmployeeID = $row['EmployeeID'];
    $this->CustomerID = $row['CustomerID'];
    $this->VIN = $row['VIN'];
    $this->USaleDate = $row['USaleDate'];
    $this->LPlateNo = $row['LPlateNo'];
    $this->PaymentMethod = $row['PaymentMethod'];
  }

    // Create Post
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . ' SET EmployeeID = :EmployeeID, CustomerID = :CustomerID, VIN = :VIN, USaleID = :USaleID, USaleDate = :USaleDate, RegistrationDetails = :RegistrationDetails, PaymentMethod = :PaymentMethod';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->EmployeeID = htmlspecialchars(strip_tags($this->EmployeeID));
          $this->CustomerID = htmlspecialchars(strip_tags($this->CustomerID));
          $this->VIN = htmlspecialchars(strip_tags($this->VIN));
          $this->USaleID = htmlspecialchars(strip_tags($this->USaleID));
          $this->USaleDate = htmlspecialchars(strip_tags($this->USaleDate));
          $this->LPlateNo = htmlspecialchars(strip_tags($this->LPlateNo));
          $this->PaymentMethod = htmlspecialchars(strip_tags($this->PaymentMethod));

          // Bind data
          $stmt->bindParam(':EmployeeID', $this->EmployeeID);
          $stmt->bindParam(':CustomerID', $this->CustomerID);
          $stmt->bindParam(':VIN', $this->VIN);
          $stmt->bindParam(':USaleID', $this->USaleID);
          $stmt->bindParam(':USaleDate', $this->USaleDate);
          $stmt->bindParam(':LPlateNo', $this->LPlateNo);
          $stmt->bindParam(':PaymentMethod', $this->PaymentMethod);

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
                    SET USaleID = :USaleID, USaleDate = :USaleDate, RegistrationDetails = :RegistrationDetails, PaymentMethod = :PaymentMethod
                    WHERE EmployeeID = :EmployeeID, CustomerID = :CustomerID, VIN = :VIN';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->EmployeeID = htmlspecialchars(strip_tags($this->EmployeeID));
          $this->CustomerID = htmlspecialchars(strip_tags($this->CustomerID));
          $this->VIN = htmlspecialchars(strip_tags($this->VIN));
          $this->USaleID = htmlspecialchars(strip_tags($this->USaleID));
          $this->USaleDate = htmlspecialchars(strip_tags($this->USaleDate));
          $this->LPlateNo = htmlspecialchars(strip_tags($this->LPlateNo));
          $this->PaymentMethod = htmlspecialchars(strip_tags($this->PaymentMethod));

          // Bind data
          $stmt->bindParam(':EmployeeID', $this->EmployeeID);
          $stmt->bindParam(':CustomerID', $this->CustomerID);
          $stmt->bindParam(':VIN', $this->VIN);
          $stmt->bindParam(':USaleID', $this->USaleID);
          $stmt->bindParam(':USaleDate', $this->USaleDate);
          $stmt->bindParam(':LPlateNo', $this->LPlateNo);
          $stmt->bindParam(':PaymentMethod', $this->PaymentMethod);
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
          $this->CustomerID = htmlspecialchars(strip_tags($this->CustomerID));
          $this->VIN = htmlspecialchars(strip_tags($this->VIN));

          // Bind data
          $stmt->bindParam(':EmployeeID', $this->EmployeeID);
          $stmt->bindParam(':CustomerID', $this->CustomerID);
          $stmt->bindParam(':VIN', $this->VIN);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }

  }
