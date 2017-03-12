<?php 

class Database{

    protected $db = null;

    private $dbname = null;
    private $e = "";
    private $host = null;
    private $password = null;
    private $username = null;

    function __construct(){

        $this->host = getenv("HOST");
        $this->dbname = getenv("DBNAME");
        $this->username = getenv("USER");
        $this->password = getenv("PASSWORD");

        try {
            $this->db = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
        }
        catch(PDOException $e) {
            $this->e = $e->getMessage();
        }
    }

    function __destruct() {
        $this->db = null;
    }


}

?>