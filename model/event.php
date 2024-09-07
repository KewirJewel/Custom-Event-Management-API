<?php
class event{
  
    // database connection and table name
    private $conn;
    private $table_name = "events";
  
    // object properties
    public $id;
    public $title;
    public $description;
    public $location;
    public $created_at;
    public $updated_at;
    
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // create product
 function create(){
  
                // query to insert record
                $query = "INSERT INTO
                            " . $this-> events . "
                        SET
                            title=:title, location=:location, description=:description, updated_at=:update_at, created_at=:created_at";
            
                // prepare query
                $stmt = $this->conn->prepare($query);
            
                // sanitize
                $this->title=htmlspecialchars(strip_tags($this->title));
                $this->location=htmlspecialchars(strip_tags($this->location));
                $this->description=htmlspecialchars(strip_tags($this->description));
                $this->created_at=htmlspecialchars(strip_tags($this->created_at));
                $this->updated_at=htmlspecialchars(strip_tags($this->updated_at));
            
                // bind values
                $stmt->bindParam(":title", $this->title);
                $stmt->bindParam(":location", $this->location);
                $stmt->bindParam(":description", $this->description);
                $stmt->bindParam(":created_at", $this->created_at);
                $stmt->bindParam(":updated_at", $this->updated_at);
            
                // execute query
                if($stmt->execute()){
                    return true;
                }
            
                return false;
                
    }
    // update the product
   function update(){
  
                // update query
                $query = "UPDATE
                            " . $this->events . "
                        SET
                            title = :title,
                            location = :location,
                            description = :description
                        WHERE
                            id = :id";
            
                // prepare query statement
                $stmt = $this->conn->prepare($query);
            
                // sanitize
                $this->title=htmlspecialchars(strip_tags($this->title));
                $this->location=htmlspecialchars(strip_tags($this->location));
                $this->description=htmlspecialchars(strip_tags($this->description));
                $this->id=htmlspecialchars(strip_tags($this->id));
            
                // bind new values
                $stmt->bindParam(':name', $this->title);
                $stmt->bindParam(':location', $this->location);
                $stmt->bindParam(':description', $this->description);
                $stmt->bindParam(':id', $this->id);
            
                // execute the query
                if($stmt->execute()){
                    return true;
                }
            
                return false;
   }
       // delete the product
  function delete(){
        
            // delete query
            $query = "DELETE FROM " . $this->events . " WHERE id = ?";
        
            // prepare query
            $stmt = $this->conn->prepare($query);
        
            // sanitize
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            // bind id of record to delete
            $stmt->bindParam(1, $this->id);
        
            // execute query
            if($stmt->execute()){
                return true;
            }
        
            return false;
    }
}

