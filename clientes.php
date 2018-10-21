<?php
/**
 * @author: André Lascas
 * @version: 1.0
 *
 */
require_once('database.php');

/**
 * Class to get desired data from a given database and store it in an array
 */
class Clients{

    public $clients = array();
    public $last_registers = array();
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

        return $this->clients;
    }

    //Function to list the last 3 registered clients
    public function last3Registers(){
        $mysql= $this->database->databaseConnect();
        $sql = 'SELECT * FROM (
            SELECT * FROM client ORDER BY id DESC LIMIT 3
          ) as r ORDER BY name';
        $query = mysqli_query($mysql, $sql) or die(mysqli_connect_error());
        $this->database->databaseClose();

        while($row = mysqli_fetch_assoc($query)){
            $this->last_registers[] = $row;
        }

        return $this->last_registers;
    }
}
?>