<?php
class owner
{

    //database connection 
    private $conn;
    // private $table_owner = "owners"; 

    //object props
    public $id; 
    // public $owner_name; 

    public function __construct($db) {
        $this->conn= $db; 
    }

    //get owners
    function read() {
        $query = "SELECT * FROM owner.id, owner.name FROM owner 
        JOIN pets ON owner.id = pets.owner.id 
        GROUP BY owner.id, owner.name
        ORDER BY owner.id;";

        $stmt = $this->conn->prepare($query);

        $stmt->execute(); 
        return $stmt; 


    }

    function create() {
 
    $query = "INSERT INTO owner (name) VALUES (:name) ";

    $stmt = $this->conn->prepare($query); 

    $this->name = htmlspecialchars(strip_tags($this->name)); 

    $this->bindParam(':name', $this->name); 

    if($stmt->execute()) {

    }

    $stmt->execute(); 
    return $stmt; 

    }

    function delete() {


    }
}

//routes enterd below -- delete, read, post