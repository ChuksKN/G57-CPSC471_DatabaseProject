<?php
class Part_used
{
    // DB stuff
    private $conn;
    private $table = 'part_used';

    // Part Properties
    public $PartID;
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

    // Create Post
    public function create()
    {
        // Create query
        $query = 'INSERT INTO ' . $this->table . ' SET PartID = :PartID, WorkOrderID = :WorkOrderID';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->PartID = htmlspecialchars(strip_tags($this->PartID));
        $this->WorkOrderID = htmlspecialchars(strip_tags($this->WorkOrderID));

        // Bind data
        $stmt->bindParam(':PartID', $this->PartID);
        $stmt->bindParam(':WorkOrderID', $this->WorkOrderID);

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
                    SET WorkOrderID = :WorkOrderID
                    WHERE PartID = :PartID';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->PartID = htmlspecialchars(strip_tags($this->PartID));
        $this->WorkOrderID = htmlspecialchars(strip_tags($this->WorkOrderID));

        // Bind data
        $stmt->bindParam(':PartID', $this->PartID);
        $stmt->bindParam(':WorkOrderID', $this->WorkOrderID);

        // Execute query
        if ($stmt->execute()) {
            if($stmt->rowCount() == 0)
                {
                    $this->errormsg = 'No row was effected. WorkOrderID and/or PartID may be invalid.';
                    return false;
                }
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
        $query = 'DELETE FROM ' . $this->table . ' WHERE PartID = :PartID';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->PartID = htmlspecialchars(strip_tags($this->PartID));

        // Bind data
        $stmt->bindParam(':PartID', $this->PartID);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }
}