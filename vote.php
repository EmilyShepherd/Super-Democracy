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

if (!isset($_GET['step']))
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
            . 'AND person_id=person.id'
        );

        while ($candidate = $cas->fetch_assoc())
        {
            $candidate['id'] = $candidate['candidate_id'];
            $candidates[]    = $candidate;
        }

        $title = "Vote for " . $position;

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

    #delimiter
    {
        max-width:800px;
        margin-left:auto;
        margin-right:auto;
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

switch ($position['voting'])
{
    case AV:
        include 'vote-av.php';
        exit;

    case FPTP:
        include 'vote-fptp.php';
        exit;
}
