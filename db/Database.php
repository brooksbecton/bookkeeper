<?php 

class Database{

    protected $db = null;

    private $host = null;
    private $dbname = null;
    private $username = null;
    private $password = null;

    function __construct(){

        $this->host = getenv("HOST");
        $this->dbname = getenv("DBNAME");
        $this->username = getenv("USERNAME");
        $this->username = getenv("PASSWORD");

        try {
        # MS SQL Server and Sybase with PDO_DBLIB
        $db = new PDO("mssql:host=$host;dbname=$dbname, $username, $password");
        $db = new PDO("sybase:host=$host;dbname=$dbname, $username, $password");
        
        # MySQL with PDO_MYSQL
        $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        
        # SQLite Database
        $db = new PDO("sqlite:my/database/path/database.db");
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

}

?>