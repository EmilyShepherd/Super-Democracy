<?php

include 'model/database.php';

session_start();

foreach ($_SESSION['voted'] as $vote)
{
    $position = $_SESSION['votes'][$vote['step']];
    $position = $db->query("SELECT * FROM position WHERE id=" . $position[0]);

    if ($position = $position->fetch_assoc())
    {
        switch($position['voting'])
        {
            case 0:
                if (!isset($vote['candidate']) || !is_array($vote['candidate']))
                {
                    break;
                }

                $expecting = 0;
                asort($vote['candidate']);

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
                              'INSERT INTO votes(candidate_id, round, time) '
                            . 'VALUES (' . (int)$ca . ',' . (int)$position . ', NOW())'
                        );
                    }
                }
                break;

            case 1:
                $db->query
                (
                      'INSERT INTO votes(candidate_id, round, time) '
                    . 'VALUES (' . (int)$vote['vote'] . ', 0, NOW())'
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
