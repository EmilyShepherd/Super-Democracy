<?php

include 'database.php';

$elections = $db->query
(
      'SELECT * FROM election '
    . 'WHERE nomination_start < NOW() AND NOW() < nomination_end '
    . ''
);
$user = 1;

$positions = array( );

while ($election = $elections->fetch_assoc())
{
    $pos = $db->query
    (
          'SELECT * FROM `election-position`, position '
        . 'WHERE position_id = position.id'
    );

    echo $db->error;

    while ($position = $pos->fetch_assoc())
    {
        $position['election_id'] = $election['id'];
        $positions[]             = $position;
    }
}
