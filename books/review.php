<html>
<?php include_once("../components/header/header.php");?>
<?php include_once("assets/GoogleBooks.php");?>

<?php $gb = new GoogleBooks(); ?>
<link rel="stylesheet" href="css/review.css" >

<div class="container">
   <?php if($userInfo): ?>
        <?php
        if(isset($_GET['id'])){

            $bookId = $_GET['id'];

            //Pulls all book info and meta data
            $volumeData = $gb->get_book($bookId);
            $volume = $volumeData->volumeInfo;

            ?>
            <h1>Review</h1>
            <?php if(array_key_exists("title", $volume)){ ?>
                <h2>
                    <?php echo $volume->title ?>
                </h2>
            <?php }?>
            <textarea class="review-text" name="reviewText" form="review_form"></textarea>
            <form id="review_form" method="POST" action="review_process.php">
                <input type="hidden" name="bookId" value="<?php echo $bookId ?>" >
                <input type="submit" value="Submit">
            </form>

        <?php } 
        else {?>
            <h1>Error</h1>
            <h2>No Book Id Found</h2>
            <a href="search.php">Search a book?</a>
        <?php }?> 
    <?php else: ?>
        <h1>Error</h1>
        <h2>You must be logged in to review</h2>
        <button class="btn btn-login btn-outline-success my-2 my-sm-0">Sign In</button>

    <?php endif ?>

</div>
<?php include_once("../components/footer/footer.php");?>

</html>