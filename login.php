<html>
  <head>
  </head>
  <body>
    <?php session_start();
    if ($_POST)
    {
      $_SESSION['user_id'] = $_POST['user_id'];
      echo "thanks m8 you are now " . $_SESSION['user_id'];
      exit;
    }?>
    <form action="login.php" method="post">
      <input type="text" name="user_id" value="1" />
      <input type="submit" name="submit" value="log in" />
    </form>
  </body>
</html>