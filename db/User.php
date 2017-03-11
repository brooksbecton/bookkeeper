<?php 

require_once("Database.php");

class User extends Database{

    public $user;

    public function __construct($userId){
        $this->user = $this->get($userId);
    }

    public function get($userId){
        $stmt = $db->prepare('SELECT * FROM users where id = :id');
        $stmt->execute( array(':id' => $userId) );
    }
    public function put($userId, $name, $email){
        $stmt = $db->prepare('INSERT INTO users VALUES(:id, :name, :email)');
        $stmt->execute( array(':id' => $userId, ':name' => $name, ':email' => $email) );        
    }
    public function update($userId){}
    public function delete($userId){}

    
}

?>