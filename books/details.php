<html>
<?php 
include_once("../components/header/header.php");
include_once("assets/GoogleBooks.php");

$gb = new GoogleBooks();

?>
<link rel="stylesheet" href="css/details.css" >
<div class="container">
    <?php 
    if(isset($_GET['id'])){
        $bookId = $_GET['id'];
        
        //Pulls all book info and meta data
        $volumeData = $gb->get_book($bookId);
        $volume = $volumeData->volumeInfo;

    ?>
        <div class="row">
            <div class="col-3">
                    <?php if(array_key_exists("imageLinks", $volume) && array_key_exists("title", $volume)){ ?>
                        <img class="book-thumbnail center" src="<?php echo $volume->imageLinks->thumbnail ?>" alt="<?php $volume->title ?>">
                    <?php } ?>

                    <div>
                        <a href="review.php?id=<?php echo $bookId ?>">
                            <button class="btn btn-primary justify-content-center center" type="button">Review</button>
                        </a>
                    </div>
            </div>
            <div class="col-9">
            <?php if(array_key_exists("title", $volume)){ ?>
                <h1>
                    <?php echo $volume->title ?>
                </h1>
            <?php }?>
            <?php if(array_key_exists("subtitle", $volume)){ ?>
                <h2>
                    <?php echo $volume->subtitle ?>
                </h2>
            <?php } ?>

            <?php if(array_key_exists("authors", $volume)){ ?>
                <p>
                    <?php $gb->print_authors($volume);?>
                </p>
            <?php } ?>
            <h3>Description</h3>
            <?php if(array_key_exists("description", $volume)){ ?>
                <p>
                    <?php echo $volume->description ?>
                </p>
            <?php } ?>
            </div>
        </div>

    <?php }
    else {?>
        <h1>Error</h1>
        <h2>No Book Id Found</h2>
        <a href="search.php">Search a book?</a>
    <?php } ?> 

</div>
<?php include_once("../components/footer/footer.php");?>

</html>
