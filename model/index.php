<?php

include 'database.php';

$elections = $db->query
(
      'SELECT * FROM election '
    . 'WHERE vote_start < NOW() AND NOW() < vote_end '
    . ''
);
$user = 1;

$positions = array( );

while ($election = $elections->fetch_assoc())
{
    $pos = $db->query
    (
          'SELECT * FROM `election-position`, position '
        . 'WHERE position_id = position.id '
        . 'AND id NOT IN '
        . '('
        .     'SELECT position_id FROM hasvoted '
        .     'WHERE election_id=' . $election['id'] . ' '
        .     'AND person_id=' . $user
        . ') '
        . 'AND id IN '
        . '('
        .     'SELECT position_id FROM `position-vote`,`group`,`group-person` '
        .     'WHERE `position-vote`.group_id=group.id '
        .     'AND `group-person`.group_id=group.id '
        .     'AND exclude=0 '
        .     'AND person_id=' . (int)$user
        . ')'
        . 'AND id NOT IN '
        . '('
        .     'SELECT position_id FROM `position-vote`,`group`,`group-person` '
        .     'WHERE `position-vote`.group_id=group.id '
        .     'AND `group-person`.group_id=group.id '
        .     'AND exclude=1 '
        .     'AND person_id=' . (int)$user
        . ')'
    );

    echo $db->error;

    while ($position = $pos->fetch_assoc())
    {
        $position['election_id'] = $election['id'];
        $positions[]             = $position;
    }
}
