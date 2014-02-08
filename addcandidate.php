<?php
  include 'model/database.php';
  session_start();
  if(!$_POST)
  {
    echo "no POST, no candidate to add!";
    exit;
  }
  if(!$_SESSION['user_id'])
  {
    echo "no user logged in";
    exit;
  }
  $user_id = $_SESSION['user_id'];
  $pos_elec = explode('_', $_POST['position']);
  $manifesto = $db->real_escape_string($_POST['manifesto']);
  $pitch = $db->real_escape_string($_POST['pitch']);
  $shirt_size = (int)$_POST['size'];
  $file = $_FILES['photo']['tmp_name'];
  $extension = pathinfo($_FILES['photo']['name'], 4);
  $target_path = "thumbs/candidate_" . md5_file($file) . '.' . $extension;
  echo $target_path;
  move_uploaded_file($file, $target_path);
  $db->query
  (
    'INSERT INTO candidate(person_id, position_id, election_id, manifesto, pitch) '
    . 'VALUES (' . (int)$user_id . ',' . (int)$pos_elec[0] . ',' . (int)$pos_elec[1] . ',"' . $manifesto . '","' . $pitch . '")'
  );
  $db->query
  (
    'UPDATE person SET image = "' . $target_path . '", `shirt_size` = ' . $shirt_size . ' WHERE `person`.`id` = ' . $user_id
  );
  echo $db->error;
  echo (int)$user_id . ',' . (int)$pos_elec[0] . ',' . (int)$pos_elec[1] . ',' . $manifesto . ',' . $pitch . ',' . $shirt_size;
?>