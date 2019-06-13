<?php 

class Database
{
    // database credetials
    private $host = "localhost";
    private $dbname = "pet_hotel";
    private $dbuser = "roach"; 
    private $dbpass = "";
    public $conn; 

    //database connection
    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("pgsql:host=$this->host;dbname=$this->dbname", $this->dbuser, $this->dbpass); 

        } catch (PDOException $event) {
            echo "Error : " .$event->getMessage() . "<br/>"; 
            die(); 
        }

        return $this->conn; 
    }

}


