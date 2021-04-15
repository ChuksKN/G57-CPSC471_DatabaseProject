<?php
class Used_car
{
    // DB stuff
    private $conn;
    private $table = 'used_car';

    // Part Properties
    public $VIN;
    public $Manufacturer;
    public $Make;
    public $Year;
    public $Engine;
    public $Output;
    public $No_of_doors;
    public $Fuel_tank_cap;
    public $Transmission;
    public $Terrain;
    public $Seating_capacity;
    public $Torque;
    public $Region;
    public $DRL;
    public $DistanceTravelled;
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
                FROM car NATURAL JOIN ' . $this->table;

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
                    FROM car NATURAL JOIN ' . $this->table . '
                    WHERE VIN = :VIN
                    LIMIT 0,1';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(':VIN', $this->VIN);

        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set properties
        $this->DistanceTravelled = $row['DistanceTravelled'];
        $this->Manufacturer = $row['Manufacturer'];
        $this->Make = $row['Make'];
        $this->Year = $row['Year'];
        $this->Engine = $row['Engine'];
        $this->Output = $row['Output'];
        $this->No_of_doors = $row['No_of_doors'];
        $this->Fuel_tank_cap = $row['Fuel_tank_cap'];
        $this->Transmission = $row['Transmission'];
        $this->Terrain = $row['Terrain'];
        $this->Seating_capacity = $row['Seating_capacity'];
        $this->Torque = $row['Torque'];
        $this->Region = $row['Region'];
        $this->DRL = $row['DRL'];
    }

    // Get VIN from Post
    public function check_vin()
    { 
        try{// Create query
        $query = 'SELECT *
                          FROM car NATURAL JOIN ' . $this->table . '
                          WHERE VIN = ?';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->VIN);

        // Execute query
        $stmt->execute();

        return $stmt;

    }catch(Exception $e){
        $this->errormsg = $e->getMessage();
        return false;
    }
        
    }

    // Create Post
    public function create()
    {
        try{// Create query
            $query = 'INSERT INTO ' . $this->table . ' SET VIN = :VIN';
    
            // Prepare statement
            $stmt = $this->conn->prepare($query);
    
            // Clean data
            $this->VIN = htmlspecialchars(strip_tags($this->VIN));
    
            // Bind data
            $stmt->bindParam(':VIN', $this->VIN);
    
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
        try{// Create query
            $query = 'UPDATE ' . $this->table . '
                        SET DistanceTravelled = :DistanceTravelled
                        WHERE VIN = :VIN';
    
            // Prepare statement
            $stmt = $this->conn->prepare($query);
    
            // Clean data
            $this->VIN = htmlspecialchars(strip_tags($this->VIN));
            $this->DistanceTravelled = htmlspecialchars(strip_tags($this->DistanceTravelled));
    
            // Bind data
            $stmt->bindParam(':VIN', $this->VIN);
            $stmt->bindParam(':DistanceTravelled', $this->DistanceTravelled);
    
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

    // Delete Post
    public function delete()
    {
        try{// Create query
            $query = 'DELETE FROM ' . $this->table . ' WHERE VIN = :VIN';
    
            // Prepare statement
            $stmt = $this->conn->prepare($query);
    
            // Clean data
            $this->VIN = htmlspecialchars(strip_tags($this->VIN));
    
            // Bind data
            $stmt->bindParam(':VIN', $this->VIN);
    
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
        
}
