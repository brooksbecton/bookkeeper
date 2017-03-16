<?php 
include_once("../components/header/header.php");
include_once("assets/GoogleBooks.php");

if(isset($_GET['q'])){
    $q = $_GET['q'];
    $searcher = new GoogleBooks();
    $searcher->search_book_by_title($q);
}
else{
    $error_msg .= "No Search Title Given";
}

?>
<html>
  <div class="container">
     <?php if ($searcher->error_msg == ""): ?>
     <h1>Search results</h1>
     <?php $searcher->print_books(); ?>
     <?php else: ?>
     <h1>Error:</h1>
     <h3><?php echo $error_msg ?></h3>
     <?php endif ?>

     
  </div>
  <?php include_once("../components/footer/footer.php");?>
</html>