<?php
class Maintenance_req
{
    // DB stuff
    private $conn;
    private $table = 'maintenance_req';

    // Part Properties
    public $WorkOrderID;
    public $WorkCost;
    public $Request_Date;

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
                    WHERE WorkOrderID = ?
                    LIMIT 0,1';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(':WorkOrderID', $this->WorkOrderID);

        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set properties
        $this->WorkCost = $row['WorkCost'];
        $this->Request_Date = $row['Request_Date'];
    }

    // Create Post
    public function create()
    {
        // Create query
        $query = 'INSERT INTO ' . $this->table . ' SET WorkOrderID = :WorkOrderID, WorkCost = :WorkCost, Request_Date = :Request_Date';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->WorkOrderID = htmlspecialchars(strip_tags($this->WorkOrderID));
        $this->WorkCost = htmlspecialchars(strip_tags($this->WorkCost));
        $this->Request_Date = htmlspecialchars(strip_tags($this->Request_Date));

        // Bind data
        $stmt->bindParam(':WorkOrderID', $this->WorkOrderID);
        $stmt->bindParam(':WorkCost', $this->WorkCost);
        $stmt->bindParam(':Request_Date', $this->Request_Date);

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
                    SET WorkCost = :WorkCost, Request_Date = :Request_Date
                    WHERE WorkOrderID = :WorkOrderID';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->WorkOrderID = htmlspecialchars(strip_tags($this->WorkOrderID));
        $this->WorkCost = htmlspecialchars(strip_tags($this->WorkCost));
        $this->Request_Date = htmlspecialchars(strip_tags($this->Request_Date));

        // Bind data
        $stmt->bindParam(':WorkOrderID', $this->WorkOrderID);
        $stmt->bindParam(':WorkCost', $this->WorkCost);
        $stmt->bindParam(':Request_Date', $this->Request_Date);

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
        $query = 'DELETE FROM ' . $this->table . ' WHERE WorkOrderID = :WorkOrderID';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->WorkOrderID = htmlspecialchars(strip_tags($this->WorkOrderID));

        // Bind data
        $stmt->bindParam(':WorkOrderID', $this->WorkOrderID);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }
}
