<?php 
  class Parts {
    // DB stuff
    private $conn;
    private $table = 'parts';

    // Part Properties
    public $PartID;
    public $Part_Desc;
    public $PartName;
    public $Price;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT *
                FROM ' . $this->table;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    public function read_inventory() {
      // Create query
      $query = 'SELECT *
      FROM ' . $this->table.' 
      WHERE PartID NOT IN (SELECT DISTINCT u.PartID FROM part_used u)';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Create Post
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . ' SET PartID = :PartID, Part_Desc = :Part_Desc, PartName = :PartName, Price = :Price';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->PartID = htmlspecialchars(strip_tags($this->PartID));
          $this->Part_Desc = htmlspecialchars(strip_tags($this->Part_Desc));
          $this->PartName = htmlspecialchars(strip_tags($this->PartName));
          $this->Price = htmlspecialchars(strip_tags($this->Price));

          // Bind data
          $stmt->bindParam(':PartID', $this->PartID);
          $stmt->bindParam(':Part_Desc', $this->Part_Desc);
          $stmt->bindParam(':PartName', $this->PartName);
          $stmt->bindParam(':Price', $this->Price);
          // Execute query
          if($stmt->execute()) {
            return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Update Post
    public function update() {
          // Create query
          $query = 'UPDATE ' . $this->table . ' SET Part_Desc = :Part_Desc, PartName = :PartName, Price = :Price WHERE PartID = :PartID';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->PartID = htmlspecialchars(strip_tags($this->PartID));
          $this->Part_Desc = htmlspecialchars(strip_tags($this->Part_Desc));
          $this->PartName = htmlspecialchars(strip_tags($this->PartName));
          $this->Price = htmlspecialchars(strip_tags($this->Price));

          // Bind data
          $stmt->bindParam(':PartID', $this->PartID);
          $stmt->bindParam(':Part_Desc', $this->Part_Desc);
          $stmt->bindParam(':PartName', $this->PartName);
          $stmt->bindParam(':Price', $this->Price);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }

    // Delete Post
    public function delete() {

          // Create query
          $query = 'DELETE FROM ' . $this->table . ' WHERE PartID = :PartID';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->PartID = htmlspecialchars(strip_tags($this->PartID));

          // Bind data
          $stmt->bindParam(':PartID', $this->PartID);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }
    
  }