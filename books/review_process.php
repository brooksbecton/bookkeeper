<?php 
include_once("../components/header/header.php");
require_once('ReviewService.php');

$errorMsg = "";
$rs = new ReviewService();
$reviewed = False;

if(isset($_POST['reviewText'])){
    if(isset($_POST['bookId'])){
        $bookId = $_POST['bookId'];
        $dateCreated = date("Y-m-d H:i:s");
        $id = $userInfo["clientID"];
        $reviewText = $_POST['reviewText'];
        $rs->put($dateCreated, $reviewText, $id, $bookId);

        $reviewed = True;
    }
    else{
        $errorMsg +=  "<p>No Book Id</p>";
        $reviewed = False;

    }
}
else{
    $errorMsg +=  "<p>No Review Found</p>";
    $reviewed = False;

}
?>

<?php if($reviewed) {?>
          <h1>Success!</h1>
<?php } 
      else{ ?>
          <h1>Error!</h1>
          <h2><?php echo $errorMsg ?></h2>
<?php } ?>


<?php
include_once("../components/footer/footer.php");
?>