<?php 

require_once("Database.php");

class User extends Database{

    public $user;

    public function __construct(){
        parent::__construct();
    }

    public function get($userId){
        $stmt = $this->db->prepare('SELECT * FROM users where id = :id');
        $success = $stmt->execute( array(':id' => $userId) );

        return $stmt->fetch();
    }

    public function put($userId, $name, $email){
        $stmt = $this->db->prepare('INSERT INTO users (id, name, email) VALUES(:id, :name, :email)');
        $success = $stmt->execute( array(':id' => $userId, ':name' => $name, ':email' => $email) );        

        return $success;
    }

    public function updateEmail($userId, $email){
        $stmt = $this->db->prepare('UPDATE users SET email = :email WHERE id = :id');
        $success = $stmt->execute( array(':id' => $userId, ':email' => $email) );          

        return $success;
    }

    public function updateName($userId, $name){
        $stmt = $this->db->prepare('UPDATE users SET name = :name WHERE id = :id');
        $success = $stmt->execute( array(':id' => $userId, ':name' => $name) );          

        return $success;
    }

    public function delete($userId){
        $stmt = $this->db->prepare('DELETE FROM users WHERE id = :id');
        $success = $stmt->execute( array(':id' => $userId) );           

        return $success;
    }

}

?>