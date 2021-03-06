<?php
  include 'model/database.php';
  session_start();
  if(!$_POST)
  {
    echo "no POST, no candidate to add!";
    exit;
  }
  if(!isset($_SESSION['user_id']))
  {
    echo "no user logged in";
    exit;
  }
  $user_id = $_SESSION['user_id'];
  if(!isset($_POST['position']))
  {
    echo 'No position specified';
    exit;
  }
  if(!isset($_POST['legal']))
  {
    echo 'You must accept the T&C';
    exit;
  }
  $pos_elec = explode('_', $_POST['position']);
  if(isset($_POST['manifesto']))
  {
    $manifesto = $db->real_escape_string($_POST['manifesto']);
  }
  if(isset($_POST['pitch']))
  {
    $pitch = $db->real_escape_string($_POST['pitch']);
  }
  if(!isset($_POST['size']))
  {
    echo 'No shirt size!';
    exit;
  }
  $shirt_size = (int)$_POST['size'];
  if(!empty($_FILES['photo']['name']))
  {
    $file = $_FILES['photo']['tmp_name'];
    $extension = strtolower(pathinfo($_FILES['photo']['name'], 4));
    $target_path = "thumbs/candidate_" . md5_file($file) . '.' . $extension;
    echo $target_path;
    move_uploaded_file($file, $target_path);
    if(!in_array($extension, ['png', 'jpg', 'jpeg', 'gif']))
    {
      echo "Unsupported image extension!";
      exit;
    }
    $db->query
    (
      'UPDATE person SET image = "' . $target_path . '"' . ' WHERE `person`.`id` = ' . $user_id
    );
  }
  $db->query
  (
    'INSERT INTO candidate(person_id, position_id, election_id, manifesto, pitch) '
    . 'VALUES (' . (int)$user_id . ',' . (int)$pos_elec[0] . ',' . (int)$pos_elec[1] . ',"' . $manifesto . '","' . $pitch . '")'
  );
  $db->query
  (
    'UPDATE person SET `shirt_size` = ' . $shirt_size . ' WHERE `person`.`id` = ' . $user_id
  );
?>

<?php
$title = "Super Democracy";

include 'common/header.php';

include 'model/index.php';
?>
  </head>
  <body>
    <div id="delimiter">
      <header>
        <h1 style="text-align: center;">Super Democracy Elections</h1>
      </header>
      <h2>Thank you for your nomination</h2>
      <p>You have successfully nominated yourself for the SUSU elections!</p>
    </div>
  </body>
</html>