<?php
require_once('database.php');

class Clients{

    public $clients = array();
    private $database;
    
    //Class constructor
    public function __construct(){
        $this->database = new Database();
    }

    //Function to list clients into an array
    public function listClients(){
        $mysql= $this->database->databaseConnect();
        $sql = 'SELECT * FROM client';
        $query = mysqli_query($mysql, $sql) or die(mysqli_connect_error());
        $this->database->databaseClose();

        while($row = mysqli_fetch_assoc($query)){
            $this->clients[] = $row;
        }
        //print_r($this->clients);

        return $this->clients;
    }
}
?>