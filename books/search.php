<html>
  <?php include_once("../components/header/header.php");?>
  <div class="container">
     <h1>Search Books</h1>
     <form method="GET" action="results.php">
         <input type="text" name="q" placeholder="Book Title">
         <input type="submit" value="Search">
     </form>
  </div>
  <?php include_once("../components/footer/footer.php");?>
</html>