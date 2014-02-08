<?php

$title = 'Add an Election';

include '../model/database.php';
include '../common/header.php';

$positions = $db->query('SELECT * FROM position');

if ($_POST)
{
    $db->query
    (
          'INSERT INTO election'
        . '('
        .     '`name`,'
        .     '`nomination_start`,'
        .     '`nomination_end`,'
        .     '`vote_start`,'
        .     '`vote_end`'
        . ') '
        . 'VALUES'
        . '('
        .     '\'' . $db->real_escape_string($_POST['name'])                  . '\','
        .     '\'' . $db->real_escape_string($_POST['nominations-starttime']) . '\','
        .     '\'' . $db->real_escape_string($_POST['nominations-endtime'])   . '\','
        .     '\'' . $db->real_escape_string($_POST['voting-starttime'])      . '\','
        .     '\'' . $db->real_escape_string($_POST['voting-endtime'])        . '\''
        . ')'
    );

    $id = $db->insert_id;

    foreach ($_POST['positions'] as $pos)
    {
        $db->query('INSERT INTO `election-position` VALUES(' . $id . ',' . (int)$pos . ')');
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
      
      #delimiter
      {
        max-width:800px;
        margin-left:auto;
        margin-right:auto;
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

    <!-- Bootstrap -->
    <link href="../resources/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>
    <div id="delimiter">
      <header>
        <h1>Add an Election</h1>
      </header>

      <form action="add.php" method="post">
        <h2>Name</h2>
        <input type="text" name="name" />

        <h2>Nominations</h2>
        Start Time: <input type="datetime-local" name="nominations-starttime">
        End Time: <input type="datetime-local" name="nominations-endtime">

        <h2>Voting</h2>
        Start Time: <input type="datetime-local" name="voting-starttime">
        End Time: <input type="datetime-local" name="voting-endtime">

        <h2>Positions</h2>
        <select name="positions[]" multiple="multiple">
          <?php while ($position = $positions->fetch_assoc()) : ?>
            <option value="<?=$position['id']?>">
              <?=$position['name']?>
            </option>
          <?php endwhile ?>
        </select>

      </form>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../resources/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>
