<html>
  <?php include_once("components/header/header.php");?>
  <div class="container">
    <?php if(!$userInfo): ?>
    <h1>Error</h1>
    <h3>You must be signed in</h3>
    <?php else: ?>

    <h1>Profile</h1>
    <h3><?php echo $userInfo["email"] ?></h3>

    <?php endif ?>
  </div>
  <?php include_once("components/footer/footer.php");?>
</html>