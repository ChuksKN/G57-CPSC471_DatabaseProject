<?php
class Handle_req
{
    // DB stuff
    private $conn;
    private $table = 'handle_req';

    // Part Properties
    public $EmployeeID;
    public $WorkOrderID;

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

    // Get Maintenance request under a certain technician
    public function read_under()
    {
        // Create query
        $query = 'SELECT *
                    FROM ' . $this->table . ' NATURAL JOIN Maintenance_req
                    WHERE EmployeeID = :EmployeeID';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(':EmployeeID', $this->EmployeeID);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    // Create Post
    public function create()
    {
        // Create query
        $query = 'INSERT INTO ' . $this->table . ' ';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->EmployeeID = htmlspecialchars(strip_tags($this->EmployeeID));
        $this->WorkOrderID = htmlspecialchars(strip_tags($this->WorkOrderID));

        // Bind data
        $stmt->bindParam(':EmployeeID', $this->EmployeeID);
        $stmt->bindParam(':WorkOrderID', $this->WorkOrderID);

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
        $query = 'DELETE FROM ' . $this->table . ' WHERE EmployeeID = :EmployeeID AND WorkOrderID = :WorkOrderID';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->EmployeeID = htmlspecialchars(strip_tags($this->EmployeeID));
        $this->WorkOrderID = htmlspecialchars(strip_tags($this->WorkOrderID));

        // Bind data
        $stmt->bindParam(':EmployeeID', $this->EmployeeID);
        $stmt->bindParam(':WorkOrderID', $this->WorkOrderID);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    public function delete_by_eid()
    {
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
    }
}