<?php

include 'model/database.php';

session_start();

define('AV',   0);
define('FPTP', 1);

$user = 1;
$candidates = array( );

if ($_POST)
{
    $_SESSION['voted'][$_POST['step']] = $_POST;

    if ((int)$_POST['step'] + 1 == count($_SESSION['votes']))
    {
        header('Location: finish.php');
    }
    else
    {
        header('Location: ?step=' . ((int)$_POST['step'] + 1));
    }

    exit;
}

if (!isset($_GET['step']) || !isset($_SESSION['votes'][$_GET['step']]))
{
    include 'vote-error.php';
    exit;
}
else
{
    $_GET['position'] = $_SESSION['votes'][$_GET['step']][0];
    $_GET['election'] = $_SESSION['votes'][$_GET['step']][1];

    $position = $db->query
    (
          'SELECT * FROM position '
        . 'WHERE id NOT IN '
        . '('
        .     'SELECT position_id FROM hasvoted '
        .     'WHERE election_id=' . (int)$_GET['election'] . ' '
        .     'AND person_id=' . $user
        . ') '
        . 'AND id=' . (int)$_GET['position']
    );

    if ($position = $position->fetch_assoc())
    {
        $cas = $db->query
        (
              'SELECT *, candidate.id as candidate_id FROM person, candidate '
            . 'WHERE position_id=' . $position['id'] . ' '
            . 'AND election_id=' . (int)$_GET['election'] . ' '
            . 'AND person_id=person.id '
            . 'ORDER BY person.id = 1, RAND()'
        );

        while ($candidate = $cas->fetch_assoc())
        {
            $candidate['id'] = $candidate['candidate_id'];
            $candidates[]    = $candidate;
        }

        $title = "Vote for " . $position['name'];

        include 'common/header.php';
?>
    <style>
    .candidate {
        height: 100px;
    }

    .thumb {
        width: 100px;
        height: 100px;
        overflow: hidden;
        float: left;
    }

    .thumb img {
        width: 100px;
        height: 100px;
        margin: 0 0 0 0;
    }

    .bigbutton
    {
      height: 100px;
      width: 130px;
    }

    .arrbutton
    {
      height: 100px;
      width: 50px;
    }
    </style>
<?php
    }
    else
    {
        include 'vote-error.php';
        exit;
    }
}
?>

</head>
<body>
  <div id="delimiter">
  <h1 style="text-align: center;"><?=$position['name']?></h1>
  <div class="progress progress-striped">
    <div class="progress-bar"
         role="progressbar"
         aria-valuenow="60"
         aria-valuemin="0"
         aria-valuemax="100"
         style="width: <?= (int)(($_GET['step']/count($_SESSION['votes']))*100) ?>%;">
    </div>
  </div>
  <p style="text-align: center;"><?= (int)(($_GET['step']/count($_SESSION['votes']))*100) ?>% Complete</p>

  <button onclick="window.location.href = 'vote.php?step=<?=$_GET['step'] + 1?>'" type="button" class="btn btn-default" style="float: right;">
    Skip
  </button>
  <p><?=$position['description']?></p>

<?php

switch ($position['voting'])
{
    case AV:
        include 'vote-av.php';
        break;

    case FPTP:
        include 'vote-fptp.php';
        break;

    include 'common/footer.php';
}
