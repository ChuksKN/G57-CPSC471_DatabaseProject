<?php
class Make_req
{
    // DB stuff
    private $conn;
    private $table = 'make_req';

    // Part Properties
    public $CustomerID;
    public $WorkOrderID;
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
                    WHERE CustomerID = :CustomerID, WorkOrderID = :WorkOrderID
                    LIMIT 0,1';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(':CustomerID', $this->CustomerID);
        $stmt->bindParam(':WorkOrderID', $this->WorkOrderID);

        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set properties

    }

    // Create Post
    public function create()
    { 
        try{
                // Create query
            $query = 'INSERT INTO ' . $this->table . ' ';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->CustomerID = htmlspecialchars(strip_tags($this->CustomerID));
            $this->WorkOrderID = htmlspecialchars(strip_tags($this->WorkOrderID));

            // Bind data
            $stmt->bindParam(':CustomerID', $this->CustomerID);
            $stmt->bindParam(':WorkOrderID', $this->WorkOrderID);

            // Execute query
            if ($stmt->execute()) {
                if($stmt->rowCount()==0){
                  $this->errormsg = 'No row was effected. Invalid entry.';
                  return false;
                }
              return true;
              }

            // Print error if something goes wrong
            printf("Error: %s.\n", $stmt->error);

            return false;

            }catch(Exception $e){
                $this->errormsg = $e->getMessage();
                return false;
            }
        
    }

    // Update Post
    public function update()
    {
        try{
                // Create query
            $query = 'UPDATE ' . $this->table . '
            SET 
            WHERE ';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->CustomerID = htmlspecialchars(strip_tags($this->CustomerID));
            $this->WorkOrderID = htmlspecialchars(strip_tags($this->WorkOrderID));

            // Bind data
            $stmt->bindParam(':CustomerID', $this->CustomerID);
            $stmt->bindParam(':WorkOrderID', $this->WorkOrderID);

            // Execute query
            if ($stmt->execute()) {
                if($stmt->rowCount() == 0)
                {
                    $this->errormsg = 'No row was effected. Entry may be invalid.';
                    return false;
                }
                return true;
            }

            // Print error if something goes wrong
            printf("Error: %s.\n", $stmt->error);

            return false;

        }catch(Exception $e){
            $this->errormsg = $e->getMessage();
            return false;
        }
                    
    }

    // Delete Post
    public function delete()
    {
        try{
                // Create query
            $query = 'DELETE FROM ' . $this->table . ' WHERE CustomerID = :CustomerID, WorkOrderID = :WorkOrderID';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->CustomerID = htmlspecialchars(strip_tags($this->CustomerID));
            $this->WorkOrderID = htmlspecialchars(strip_tags($this->WorkOrderID));

            // Bind data
            $stmt->bindParam(':CustomerID', $this->CustomerID);
            $stmt->bindParam(':WorkOrderID', $this->WorkOrderID);

            // Execute query
            if ($stmt->execute()) {
                if($stmt->rowCount() == 0)
                {
                    $this->errormsg = 'No row was effected. Entry may be invalid.';
                    return false;
                }
                return true;
            }

            // Print error if something goes wrong
            printf("Error: %s.\n", $stmt->error);

            return false;
        }catch(Exception $e){
            $this->errormsg = $e->getMessage();
            return false;
        }

        }
        
}
