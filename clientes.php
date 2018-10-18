<?php
class Clients{

    require_once('database.php');
    public $clientes = array();
    
    //Class constructor
    public function __construct(){
        $this->database = new Database();
    }

    //Function to list clients into an array
    public function listClients(){
        $this->database->database_connect();
        $sql = 'SELECT * FROM cliente';
        $query = mysql_query($sql) or die(mysql_error());
        $this->database->database_close();

        while($row = mysql_fetch_array($query)){
            $this->clientes = $row;
        }
    }

}








?>