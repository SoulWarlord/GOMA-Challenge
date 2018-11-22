<?php
/**
 * @author: André Lascas
 * @version: 1.0
 *
 */

/**
 * Class to connect and close connection to the desired database
 */
class Database{
    private $connection;
    private $server_name = "localhost";
    private $username = "root";
    private $password = "mysql";
    private $database = "goma";

    /**
     * Class constructor
     */
    public function __construct(){
    }
    /**
     * Function to connect to the desired database
     */
    public function databaseConnect(){
        $this->connection = mysqli_connect($this->server_name, $this->username, $this->password, $this->database);
        mysqli_set_charset($this->connection, "utf-8");

        if(!$this->connection){
            die("Connection failed: ". mysqli_connect_error());
        }
        mysqli_select_db($this->connection, $this->database);
        return $this->connection;
    }

    /**
     * Function to close the database connection
     */
    public function databaseClose(){
        mysqli_close($this->connection);
    }

}
?>