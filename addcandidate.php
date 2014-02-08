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
  
  $db->query
  (
    'INSERT INTO candidate(person_id, position_id, election_id, manifesto, pitch) '
    . 'VALUES (' . (int)$user_id . ',' . (int)$pos_elec[0] . ',' . (int)$pos_elec[1] . ',"' . $manifesto . '","' . $pitch . '")'
  );
  echo $db->error;
  echo (int)$user_id . ',' . (int)$pos_elec[0] . ',' . (int)$pos_elec[1] . ',' . $manifesto . ',' . $pitch;
?>