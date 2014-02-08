<?php

$title = 'Add Group';

include '../model/database.php';
include '../common/header.php';

if (isset($_POST['name']))
{
    $db->query('INSERT INTO `group`(`name`) VALUES(\'' . $db->real_escape_string($_POST['name']) . '\')');
}

?>

<h1 style="text-align: center;">Add Group</h1>

<form method="post">
  <b>Name Your Group:</b> <br />
  <input type="text" name="name" />

  <br /><br />

  <input type="submit" value="Create Group" />
</form>

<?php include '../common/footer.php';