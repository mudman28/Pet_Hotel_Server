<?php
class owner
{

    //database connection 
    private $conn;
    // private $table_owner = "owners"; 

    //object props
    public $id; 
    public $owner_name; 

    public function __construct($db) {
        $this->conn= $db; 
    }

    //get products
    function read() {
        $query = "SELET * FROM " . $this->table_owner . ";";

        $stmt = $this->conn->prepare($query);

        $stmt->execute(); 
        return $stmt; 


    }

    function create() {

    }

    function delete() {


    }
}

//routes enterd below -- delete, read, post