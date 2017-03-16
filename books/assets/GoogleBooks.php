<?php
class GoogleBooks{

    public $books;
    public $error_msg = "";

    protected $qUrl = "https://www.googleapis.com/books/v1/volumes?q=";
    protected $apiKey;

    function __construct(){
        $this->apiKey = getenv("GOOGLE_BOOKS_KEY");
    }

    function get_book($id){
        
    }

    function print_books(){
        //contains the books and their info
        $this->books = $this->books->items;

        echo "<ul>";
        foreach($this->books as $r){
            $volume = $r->volumeInfo;
            $bookId = $r->id;
            echo "<li>";
            echo "<a href='details.php?id=" . $bookId . "'>" . $volume->title . "</a>";
            //Lists volume authors if availible
            if(array_key_exists("authors", $volume)){
                echo " by ";
                $i = 0;
                $len = count($volume->authors);
                foreach($volume->authors as $author){
                    if(++$i != $len){
                        echo $author . ", ";
                    }
                    else{
                        echo $author;
                    }
                }
            }
            echo "</li>";
        }
        echo "</ul>";
    }

    function process_title($title){
        $processed_title = "";
        $title = explode(" ", $title);

        foreach($title as $t){
            $processed_title .= $t . "+";
        }

        rtrim($processed_title, "+");
        return $processed_title;
    }

    function search_book_by_title($title){
        $title = $this->process_title($title);
        $results = file_get_contents($this->qUrl . $title . "&key=" . $this->apiKey);
        $results = json_decode($results);
        $this->books = $results;
    }
}
?>