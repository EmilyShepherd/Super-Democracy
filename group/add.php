<?php

$title = 'Add Group';

include '../model/database.php';
include '../common/header.php';

if (isset($_POST['name']))
{
    $db->query('INSERT INTO `group`(`name`) VALUES(\'' . $db->real_escape_string($_POST['name']) . '\')');
}

?>

<div id="delimiter" style="text-align: center;">
<h1 style="text-align: center;">Add Group</h1>

<p>Groups are used to manage permissions within the SUSU voting system,
groups can be given access to positions such that the group members can stand and/or vote for those positions.</p>

<form method="post">
  <h2>Name Your Group:</h2>
  <input type="text" name="name" />

  <br />
  <br />
  <input class="btn btn-primary btn-lg" type="submit" value="Create Group" />
</form>
</div>

<?php include '../common/footer.php';
