<?php

    $title = "Add Position";

    include '../common/header.php';

    include '../model/database.php';

    if ($_POST)
    {
        $db->query('INSERT INTO `position`(`name`) VALUES(\'' . $db->real_escape_string($_POST['name']) . '\')');

        $id = $db->insert_id;

        foreach ($_POST['vote'] as $vote)
        {
            $db->query
            (
                  'INSERT INTO `position-vote`(position_id, group_id) '
                . 'VALUES(' . $id . ',' . (int)$vote . ')'
            );
        }

        foreach ($_POST['hold'] as $hold)
        {
            $db->query
            (
                  'INSERT INTO `position-eligable`(position_id, group_id) '
                . 'VALUES(' . $id . ',' . (int)$vote . ')'
            );
        }
    }

?>
    <style>
      .pos_name
      {
        font-weight: bold;
      }

      img.top
      {
        vertical-align:text-top;
      }

      /* For large checkboxes, should we choose to use them */
      .large
      {
        width: 30px;
        height: 30px;
      }

      div.button_list
      {
        padding-top:5px;
        padding-right:5px;
      }

      .manifesto
      {
        width:100%;
        min-height:100px;
      }

      .points
      {
        width:50%;
        padding-bottom:5px;
      }

      .points_field
      {
        width: 100%;
      }
    </style>

  </head>
  <body>
    <div id="delimiter">
      <header>
        <h1>Add a Position</h1>
      </header>

      <form action="add.php" method="post">
        <h2>Name</h2>
        <input type="text" name="name" />

<?php
    $groups = $db->query
    (
        'SELECT * FROM `group`'
    );

    $groups = $groups->fetch_all(MYSQLI_ASSOC);
?>

    <h2>Groups Eligible to Vote</h2>

    <select name="vote[]" multiple="multiple">
      <?php foreach ($groups as $group) : ?>
        <option value="<?=$group['id']?>'"><?=$group['name']?></option>
      <?php endforeach ?>
    </select>

    <h2>Groups Eligible to Hold the Position</h2>

    <select name="hold[]" multiple="multiple">
      <?php foreach ($groups as $group) : ?>
        <option value="<?=$group['id']?>'"><?=$group['name']?></option>
      <?php endforeach ?>
    </select>

        <input id="add" type="submit" class="btn btn-primary" value="Add Position" />
      </form>

    </div>
<?php
        include '../common/footer.php';
