<?php
class Database{
    private $connection;
    private $server_name = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "goma";

    //Class constructor
    public function __construct(){
    }

    //Function to connect the desired database
    public function database_connect(){
        $this->connection = mysql_connect($this->server_name, $this->username, $this->password);
        mysql_set_charset('utf-8', $this->connection);

        if(!$this->connection){
            die("Connection failed: ", mysql_error());
        }
        mysql_select_db($this->database, $this->connection);
    }

    //Function to close the database connection
    public function database_close(){
        mysql_close($this->connection);
    }

}


?>