<?php
class CarOwner
{
    // DB stuff
    private $conn;
    private $table = 'car_owner';

    // Part Properties
    public $CustomerID;
    public $RegistrationInfo;
    public $LPlateNumber;
    public $VIN;

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
        $this->RegistrationInfo = $row['RegistrationInfo'];
        $this->LPlateNumber = $row['LPlateNumber'];
        $this->VIN = $row['VIN'];
    }

    // Create Post
    public function create()
    {
        // Create query
        $query = 'INSERT INTO ' . $this->table . ' SET CustomerID = :CustomerID, RegistrationInfo = :RegistrationInfo, LPlateNumber = :LPlateNumber, VIN = :VIN';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->CustomerID = htmlspecialchars(strip_tags($this->CustomerID));
        $this->RegistrationInfo = htmlspecialchars(strip_tags($this->RegistrationInfo));
        $this->LPlateNumber = htmlspecialchars(strip_tags($this->LPlateNumber));
        $this->VIN = htmlspecialchars(strip_tags($this->VIN));

        // Bind data
        $stmt->bindParam(':CustomerID', $this->CustomerID);
        $stmt->bindParam(':RegistrationInfo', $this->RegistrationInfo);
        $stmt->bindParam(':LPlateNumber', $this->LPlateNumber);
        $stmt->bindParam(':VIN', $this->VIN);

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
                    SET RegistrationInfo = :RegistrationInfo, LPlateNumber = :LPlateNumber, VIN = :VIN
                    WHERE CustomerID = :CustomerID';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->CustomerID = htmlspecialchars(strip_tags($this->CustomerID));
        $this->RegistrationInfo = htmlspecialchars(strip_tags($this->RegistrationInfo));
        $this->LPlateNumber = htmlspecialchars(strip_tags($this->LPlateNumber));
        $this->VIN = htmlspecialchars(strip_tags($this->VIN));

        // Bind data
        $stmt->bindParam(':CustomerID', $this->CustomerID);
        $stmt->bindParam(':RegistrationInfo', $this->RegistrationInfo);
        $stmt->bindParam(':LPlateNumber', $this->LPlateNumber);
        $stmt->bindParam(':VIN', $this->VIN);

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
        $query = 'DELETE FROM ' . $this->table . ' WHERE CustomerID = :CustomerID';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->CustomerID = htmlspecialchars(strip_tags($this->CustomerID));

        // Bind data
        $stmt->bindParam(':CustomerID', $this->CustomerID);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }
}
