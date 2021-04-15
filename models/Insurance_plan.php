<?php
class Insurance_plan
{
    // DB stuff
    private $conn;
    private $table = 'insurance_plan';

    // Part Properties
    public $VIN;
    public $PlanNumber;
    public $CoverageType;
    public $Cost;
    public $ExpirationDate;

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
                    WHERE VIN = :VIN, PlanNumber = :PlanNumber
                    LIMIT 0,1';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(':VIN', $this->VIN);
        $stmt->bindParam(':PlanNumber', $this->PlanNumber);

        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set properties
        $this->CoverageType = $row['CoverageType'];
        $this->Cost = $row['Cost'];
        $this->ExpirationDate = $row['ExpirationDate'];
    }

    // Create Post
    public function create()
    {
        // Create query
        $query = 'INSERT INTO ' . $this->table . ' SET VIN = :VIN, PlanNumber = :PlanNumber, CoverageType = :CoverageType, Cost = :Cost, ExpirationDate = :ExpirationDate';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->VIN = htmlspecialchars(strip_tags($this->VIN));
        $this->PlanNumber = htmlspecialchars(strip_tags($this->PlanNumber));
        $this->CoverageType = htmlspecialchars(strip_tags($this->CoverageType));
        $this->Cost = htmlspecialchars(strip_tags($this->Cost));
        $this->ExpirationDate = htmlspecialchars(strip_tags($this->ExpirationDate));

        // Bind data
        $stmt->bindParam(':VIN', $this->VIN);
        $stmt->bindParam(':PlanNumber', $this->PlanNumber);
        $stmt->bindParam(':CoverageType', $this->CoverageType);
        $stmt->bindParam(':Cost', $this->Cost);
        $stmt->bindParam(':ExpirationDate', $this->ExpirationDate);

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
                    SET CoverageType = :CoverageType, Cost = :Cost, ExpirationDate = :ExpirationDate
                    WHERE VIN = :VIN, PlanNumber = :PlanNumber';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->VIN = htmlspecialchars(strip_tags($this->VIN));
        $this->PlanNumber = htmlspecialchars(strip_tags($this->PlanNumber));
        $this->CoverageType = htmlspecialchars(strip_tags($this->CoverageType));
        $this->Cost = htmlspecialchars(strip_tags($this->Cost));
        $this->ExpirationDate = htmlspecialchars(strip_tags($this->ExpirationDate));

        // Bind data
        $stmt->bindParam(':VIN', $this->VIN);
        $stmt->bindParam(':PlanNumber', $this->PlanNumber);
        $stmt->bindParam(':CoverageType', $this->CoverageType);
        $stmt->bindParam(':Cost', $this->Cost);
        $stmt->bindParam(':ExpirationDate', $this->ExpirationDate);

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
        $query = 'DELETE FROM ' . $this->table . ' WHERE VIN = :VIN, PlanNumber = :PlanNumber';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->VIN = htmlspecialchars(strip_tags($this->VIN));
        $this->PlanNumber = htmlspecialchars(strip_tags($this->PlanNumber));

        // Bind data
        $stmt->bindParam(':VIN', $this->VIN);
        $stmt->bindParam(':PlanNumber', $this->PlanNumber);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }
}
