<?php
class Database {
    // Database connection parameters
    private $host = 'localhost';     
    private $username = 'root';       
    private $password = 'mysql';      
    private $database = 'final'; 
    public $connection;               

    public function __construct() {
        try {
            // Creating a new PDO instance to connect to the MySQL database
            $this->connection = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->database, $this->username, $this->password);

            // Setting the PDO error mode to exception, which throws exceptions on error
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    // Method to return the database connection
    public function getConnection() {
        return $this->connection; 
    }

}
?>