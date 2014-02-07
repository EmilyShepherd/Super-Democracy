<?php

include 'database.php';

$elections = $db->query
(
      'SELECT * FROM election '
    . 'WHERE start < NOW() AND NOW() < end '
    . ''
);
$user = 1;

$positions = array( );

while ($election = $elections->fetch_assoc())
{
    $pos = $db->query
    (
          'SELECT * FROM position '
        . 'WHERE id NOT IN '
        . '('
        .     'SELECT position_id FROM hasvoted '
        .     'WHERE election_id=' . $election['id'] . ' '
        .     'AND person_id=' . $user
        . ')'
    );

    while ($position = $pos->fetch_assoc())
    {
        $positions[] = $position;
    }
}
