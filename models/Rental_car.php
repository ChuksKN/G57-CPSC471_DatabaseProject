<?php
class Rental_car
{
    // DB stuff
    private $conn;
    private $table = 'rental_car';

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
    public $LPlateNo;
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
        $this->LPlateNo = $row['LPlateNo'];
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

    // Create Post
    public function create()
    {
        try{// Create query
            $query = 'INSERT INTO ' . $this->table . ' SET VIN = :VIN, LPlateNo = :LPlateNo';
    
            // Prepare statement
            $stmt = $this->conn->prepare($query);
    
            // Clean data
            $this->VIN = htmlspecialchars(strip_tags($this->VIN));
            $this->LPlateNo = htmlspecialchars(strip_tags($this->LPlateNo));
    
            // Bind data
            $stmt->bindParam(':VIN', $this->VIN);
            $stmt->bindParam(':LPlateNo', $this->LPlateNo);
    
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
        try{ // Create query
            $query = 'UPDATE car
                        SET Manufacturer = :Manufacturer, Make = :Make, `Year` = :`Year`, Engine = :Engine, `Output` = :`Output`, No_of_doors = :No_of_doors, Fuel_tank_cap = :Fuel_tank_cap, Transmission = :Transmission, Terrain = :Terrain, 
                        Seating_capacity = :Seating_capacity, Torque = :Torque, Region = :Region, DRL = :DRL
                        WHERE VIN = :VIN';
    
            // Prepare statement
            $stmt = $this->conn->prepare($query);
    
            // Clean data
            $this->Manufacturer = htmlspecialchars(strip_tags($this->Manufacturer));
            $this->Make = htmlspecialchars(strip_tags($this->Make));
            $this->Year = htmlspecialchars(strip_tags($this->Year));
            $this->Engine = htmlspecialchars(strip_tags($this->Engine));
            $this->Output = htmlspecialchars(strip_tags($this->Output));
            $this->No_of_doors = htmlspecialchars(strip_tags($this->No_of_doors));
            $this->Fuel_tank_cap = htmlspecialchars(strip_tags($this->Fuel_tank_cap));
            $this->Transmission = htmlspecialchars(strip_tags($this->Transmission));
            $this->Terrain = htmlspecialchars(strip_tags($this->Terrain));
            $this->Seating_capacity = htmlspecialchars(strip_tags($this->Seating_capacity));
            $this->Torque = htmlspecialchars(strip_tags($this->Torque));
            $this->Region = htmlspecialchars(strip_tags($this->Region));
            $this->DRL = htmlspecialchars(strip_tags($this->DRL));
    
            // Bind data
            $stmt->bindParam(':VIN', $this->VIN);
            $stmt->bindParam(':Manufacturer', $this->Manufacturer);
            $stmt->bindParam(':Make', $this->Make);
            $stmt->bindParam(':Year', $this->Year);
            $stmt->bindParam(':Engine', $this->Engine);
            $stmt->bindParam(':Output', $this->Output);
            $stmt->bindParam(':No_of_doors', $this->No_of_doors);
            $stmt->bindParam(':Fuel_tank_cap', $this->Fuel_tank_cap);
            $stmt->bindParam(':Transmission', $this->Transmission);
            $stmt->bindParam(':Terrain', $this->Terrain);
            $stmt->bindParam(':Seating_capacity', $this->Seating_capacity);
            $stmt->bindParam(':Torque', $this->Torque);
            $stmt->bindParam(':Region', $this->Region);
            $stmt->bindParam(':DRL', $this->DRL);
    
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
            $query = 'DELETE FROM ' . $this->table . ' WHERE VIN = :VIN, LPlateNo = :LPlateNo';
    
            // Prepare statement
            $stmt = $this->conn->prepare($query);
    
            // Clean data
            $this->VIN = htmlspecialchars(strip_tags($this->VIN));
            $this->LPlateNo = htmlspecialchars(strip_tags($this->LPlateNo));
    
            // Bind data
            $stmt->bindParam(':VIN', $this->VIN);
            $stmt->bindParam(':LPlateNo', $this->LPlateNo);
    
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
