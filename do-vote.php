<?php

include 'model/database.php';

define('AV', 0);
define('FPTP', 1);

session_start();

if (!isset($_SESSION['voted']))
{
    header('Location: /');
}

$user = $_SESSION['user_id'];

$db->begin_transaction();
$db->autocommit(false);

foreach ($_SESSION['voted'] as $vote)
{
    $position = $_SESSION['votes'][$vote['step']];
    $election = (int)$position[1];
    $position = $db->query
    (
          'SELECT * FROM `election-position`, position '
        . 'WHERE position_id = position.id '
        . 'AND position.id=' . (int)$position[0] . ' '
        . 'AND id NOT IN '
        . '('
        .     'SELECT position_id FROM hasvoted '
        .     'WHERE election_id=' . $election . ' '
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

    if ($position = $position->fetch_assoc())
    {
        switch($position['voting'])
        {
            case AV:
                if (!isset($vote['candidate']) || !is_array($vote['candidate']))
                {
                    break;
                }

                $expecting = 0;
                asort($vote['candidate']);

                $db->query('INSERT INTO voteids VALUES(0)');
                $id = $db->insert_id;

                foreach ($vote['candidate'] as $ca => $order)
                {
                    if ($expecting++ != $order)
                    {
                        //ERR
                    }
                    else
                    {
                        $db->query
                        (
                              'INSERT INTO av(vote_id, candidate_id, pref, time) '
                            . 'VALUES (' . $id . ',' . (int)$ca . ',' . (int)$order . ', NOW())'
                        );
                    }
                }
                break;

            case FPTP:
                $db->query
                (
                      'INSERT INTO fptp(candidate_id, time) '
                    . 'VALUES (' . (int)$vote['vote'] . ', NOW())'
                );
        }

        $db->query('INSERT INTO hasvoted VALUES(0, ' . $election . ',' . $position['id'] . ',' . $user . ')');
    }
}

$db->commit();
unset($_SESSION['votes']);
unset($_SESSION['voted']);

$title = "Vote Success";

include 'common/header.php';

?>
<div id="delimiter" style="text-align: center;">
  <h1>Success!</h1>
  <p>Your vote has been anonymously recorded</p>
</div>

<?php
    include 'common/footer.php';
