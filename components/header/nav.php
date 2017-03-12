<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Book Keeper</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">      
        <a class="nav-link" href="books/index.php">Books</a>
      </li>
    </ul>
   <?php if(!$userInfo): ?>
     <button class="btn btn-login btn-outline-success my-2 my-sm-0">Sign In</button>
     
   <?php else: ?>
     <button class="btn btn-logout my-2 my-sm-0">Log Out</button>
   <?php endif ?>

  </div>
</nav>