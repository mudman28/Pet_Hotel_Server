<?php
class owner
{

    //database connection & table
    private $conn;
    private $table = "owners"; 

    //object props
    public $id; 
    public $owner_name; 

    public function __construct($db)
    {
        $this->conn= $db; 
    }

    //get products
    function fetch()
    {
        $query = "pet_hotel";
    }
}


function read() {
    
}


//routes enterd below -- delete, read, post