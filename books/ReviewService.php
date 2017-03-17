<?php

require_once('../db/Database.php');

// ReviewService allows CRUD of Reviews from DB
class ReviewService extends Database{


    public function put($dateCreated, $reviewText, $authorId, $bookId){

        $stmt = $this->db->prepare("INSERT INTO reviews(dateCreated, reviewText, authorId, bookId) VALUES(:dateCreated, :reviewText, :authorId, :bookId)");
        $success = $stmt->execute( array(":dateCreated"=>$dateCreated, ":reviewText"=>$reviewText, ":authorId"=>$authorId, ":bookId"=>$bookId) );        

        return $success;

    }
}

?>