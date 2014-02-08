<?php

include 'model/database.php';

define('AV', 0);
define('FPTP', 1);

session_start();

foreach ($_SESSION['voted'] as $vote)
{
    $position = $_SESSION['votes'][$vote['step']];
    $position = $db->query("SELECT * FROM position WHERE id=" . $position[0]);

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

                foreach ($vote['candidate'] as $ca => $position)
                {
                    if ($expecting++ != $position)
                    {
                        //ERR
                    }
                    else
                    {
                        $db->query
                        (
                              'INSERT INTO av(vote_id, candidate_id, pref, time) '
                            . 'VALUES (' . $id . ',' . (int)$ca . ',' . (int)$position . ', NOW())'
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
    }
}

$title = "Vote Success";

include 'common/header.php';

?>
<div id="delimiter">
<h1>Success!</h1>
</div>

<?php
    include 'common/footer.php';
