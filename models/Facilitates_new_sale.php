<?php
class Facilitates_new_sale
{
  // DB stuff
  private $conn;
  private $table = 'car_sale';

  // Facilitates_new_sale Properties
  public $EmployeeID;
  public $CustomerID;
  public $VIN;
  public $SaleID;
  public $SaleDate;
  public $LPlateNo;
  public $RegistrationDetails;
  public $Method_of_Payment;

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
                    WHERE SaleID = ?
                    LIMIT 0,1';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind ID
    $stmt->bindParam(1, $this->SaleID);

    // Execute query
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Set properties
    $this->EmployeeID = $row['EmployeeID'];
    $this->CustomerID = $row['CustomerID'];
    $this->VIN = $row['VIN'];
    $this->SaleID = $row['SaleID'];
    $this->SaleDate = $row['SaleDate'];
    $this->LPlateNo = $row['LPlateNo'];
    $this->RegistrationDetails = $row['RegistrationDetails'];
    $this->Method_of_Payment = $row['Method_of_Payment'];
  }

  // Create Post
  public function create()
  {
    // Create query
    $query = 'INSERT INTO ' . $this->table . ' SET EmployeeID = :EmployeeID, CustomerID = :CustomerID, VIN = :VIN, SaleID = :SaleID, SaleDate = :SaleDate, LPlateNo = :LPlateNo, RegistrationDetails = :RegistrationDetails, Method_of_Payment = :Method_of_Payment';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->EmployeeID = htmlspecialchars(strip_tags($this->EmployeeID));
    $this->CustomerID = htmlspecialchars(strip_tags($this->CustomerID));
    $this->VIN = htmlspecialchars(strip_tags($this->VIN));
    $this->SaleID = htmlspecialchars(strip_tags($this->SaleID));
    $this->SaleDate = htmlspecialchars(strip_tags($this->SaleDate));
    $this->LPlateNo = htmlspecialchars(strip_tags($this->LPlateNo));
    $this->RegistrationDetails = htmlspecialchars(strip_tags($this->RegistrationDetails));
    $this->Method_of_Payment = htmlspecialchars(strip_tags($this->Method_of_Payment));

    // Bind data
    $stmt->bindParam(':EmployeeID', $this->EmployeeID);
    $stmt->bindParam(':CustomerID', $this->CustomerID);
    $stmt->bindParam(':VIN', $this->VIN);
    $stmt->bindParam(':SaleID', $this->SaleID);
    $stmt->bindParam(':SaleDate', $this->SaleDate);
    $stmt->bindParam(':LPlateNo', $this->LPlateNo);
    $stmt->bindParam(':RegistrationDetails', $this->RegistrationDetails);
    $stmt->bindParam(':Method_of_Payment', $this->Method_of_Payment);

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
                    SET EmployeeID = :EmployeeID, CustomerID = :CustomerID, VIN = :VIN, SaleDate = :SaleDate, LPlateNo = :LPlateNo, RegistrationDetails = :RegistrationDetails, Method_of_Payment = :Method_of_Payment
                    WHERE SaleID = :SaleID';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->EmployeeID = htmlspecialchars(strip_tags($this->EmployeeID));
    $this->CustomerID = htmlspecialchars(strip_tags($this->CustomerID));
    $this->VIN = htmlspecialchars(strip_tags($this->VIN));
    $this->SaleID = htmlspecialchars(strip_tags($this->SaleID));
    $this->SaleDate = htmlspecialchars(strip_tags($this->SaleDate));
    $this->LPlateNo = htmlspecialchars(strip_tags($this->LPlateNo));
    $this->RegistrationDetails = htmlspecialchars(strip_tags($this->RegistrationDetails));
    $this->Method_of_Payment = htmlspecialchars(strip_tags($this->Method_of_Payment));

    // Bind data
    $stmt->bindParam(':EmployeeID', $this->EmployeeID);
    $stmt->bindParam(':CustomerID', $this->CustomerID);
    $stmt->bindParam(':VIN', $this->VIN);
    $stmt->bindParam(':SaleID', $this->SaleID);
    $stmt->bindParam(':SaleDate', $this->SaleDate);
    $stmt->bindParam(':LPlateNo', $this->LPlateNo);
    $stmt->bindParam(':RegistrationDetails', $this->RegistrationDetails);
    $stmt->bindParam(':Method_of_Payment', $this->Method_of_Payment);

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
    $query = 'DELETE FROM ' . $this->table . ' WHERE SaleID = :SaleID';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->SaleID = htmlspecialchars(strip_tags($this->SaleID));

    // Bind data
    $stmt->bindParam(':SaleID', $this->SaleID);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }
}
