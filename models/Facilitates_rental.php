<?php
class Facilitates_rental
{
  // DB stuff
  private $conn;
  private $table = 'car_rental';

  // Facilitates_new_sale Properties
  public $EmployeeID;
  public $CustomerID;
  public $VIN;
  public $RentalID;
  public $LPlateNo;
  public $RentalDetails;
  public $PaymentMethod;
  public $StartDate;
  public $ReturnDate;

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
                    WHERE RentalID = ?
                    LIMIT 0,1';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind ID
    $stmt->bindParam(1, $this->RentalID);

    // Execute query
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Set properties
    $this->EmployeeID = $row['EmployeeID'];
    $this->CustomerID = $row['CustomerID'];
    $this->VIN = $row['VIN'];
    $this->StartDate = $row['StartDate'];
    $this->ReturnDate = $row['ReturnDate'];
    $this->LPlateNo = $row['LPlateNo'];
    $this->RentalDetails = $row['RentalDetails'];
    $this->PaymentMethod = $row['PaymentMethod'];
  }

  // Create Post
  public function create()
  {
    // Create query
    $query = 'INSERT INTO ' . $this->table . ' SET EmployeeID = :EmployeeID, CustomerID = :CustomerID, VIN = :VIN, RentalID = :RentalID, StartDate = :StartDate, ReturnDate = :ReturnDate, LPlateNo = :LPlateNo, RentalDetails = :RentalDetails, PaymentMethod = :PaymentMethod';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->EmployeeID = htmlspecialchars(strip_tags($this->EmployeeID));
    $this->CustomerID = htmlspecialchars(strip_tags($this->CustomerID));
    $this->VIN = htmlspecialchars(strip_tags($this->VIN));
    $this->RentalID = htmlspecialchars(strip_tags($this->RentalID));
    $this->StartDate = htmlspecialchars(strip_tags($this->StartDate));
    $this->ReturnDate = htmlspecialchars(strip_tags($this->ReturnDate));
    $this->LPlateNo = htmlspecialchars(strip_tags($this->LPlateNo));
    $this->RentalDetails = htmlspecialchars(strip_tags($this->RentalDetails));
    $this->PaymentMethod = htmlspecialchars(strip_tags($this->PaymentMethod));

    // Bind data
    $stmt->bindParam(':EmployeeID', $this->EmployeeID);
    $stmt->bindParam(':CustomerID', $this->CustomerID);
    $stmt->bindParam(':VIN', $this->VIN);
    $stmt->bindParam(':RentalID', $this->RentalID);
    $stmt->bindParam(':StartDate', $this->StartDate);
    $stmt->bindParam(':ReturnDate', $this->ReturnDate);
    $stmt->bindParam(':LPlateNo', $this->LPlateNo);
    $stmt->bindParam(':RentalDetails', $this->RentalDetails);
    $stmt->bindParam(':PaymentMethod', $this->PaymentMethod);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }

  // Update Post
  public function update()
  {
    // Create query
    $query = 'UPDATE ' . $this->table . '
                    SET EmployeeID = :EmployeeID, CustomerID = :CustomerID, VIN = :VIN, StartDate = :StartDate, ReturnDate = :ReturnDate, RentalDetails = :RentalDetails, LPlateNo = :LPlateNo, PaymentMethod = :PaymentMethod
                    WHERE RentalID = :RentalID';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->EmployeeID = htmlspecialchars(strip_tags($this->EmployeeID));
    $this->CustomerID = htmlspecialchars(strip_tags($this->CustomerID));
    $this->VIN = htmlspecialchars(strip_tags($this->VIN));
    $this->RentalID = htmlspecialchars(strip_tags($this->RentalID));
    $this->StartDate = htmlspecialchars(strip_tags($this->StartDate));
    $this->ReturnDate = htmlspecialchars(strip_tags($this->ReturnDate));
    $this->LPlateNo = htmlspecialchars(strip_tags($this->LPlateNo));
    $this->RentalDetails = htmlspecialchars(strip_tags($this->RentalDetails));
    $this->PaymentMethod = htmlspecialchars(strip_tags($this->PaymentMethod));

    // Bind data
    $stmt->bindParam(':EmployeeID', $this->EmployeeID);
    $stmt->bindParam(':CustomerID', $this->CustomerID);
    $stmt->bindParam(':VIN', $this->VIN);
    $stmt->bindParam(':RentalID', $this->RentalID);
    $stmt->bindParam(':StartDate', $this->StartDate);
    $stmt->bindParam(':ReturnDate', $this->ReturnDate);
    $stmt->bindParam(':LPlateNo', $this->LPlateNo);
    $stmt->bindParam(':RentalDetails', $this->RentalDetails);
    $stmt->bindParam(':PaymentMethod', $this->PaymentMethod);
    $stmt->bindParam(':EmployeeID', $this->EmployeeID);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }

  // Delete Post
  public function delete()
  {

    // Create query
    $query = 'DELETE FROM ' . $this->table . ' WHERE EmployeeID = :EmployeeID, CustomerID = :CustomerID, VIN = :VIN';

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
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }
}
