<?php

include 'model/database.php';

define('AV',   0);
define('FPTP', 1);

$user = 1;
$candidates = array( );

if (!isset($_GET['election']) || !isset($_GET['position']))
{
    include 'vote-error.php';
    exit;
}
else
{
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
        //var_dump($position);

        $cas = $db->query
        (
              'SELECT * FROM candidate, person '
            . 'WHERE position_id=' . $position['id'] . ' '
            . 'AND election_id=' . (int)$_GET['election'] . ' '
            . 'AND person_id=person.id'
        );

        while ($candidate = $cas->fetch_assoc())
        {
            $candidates[] = $candidate;
        }
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