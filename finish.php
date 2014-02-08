<?php

include 'model/database.php';

session_start();

include 'common/header.php';

?>

<h1>You are about to cast your vote</h1>

<?php

foreach ($_SESSION['voted'] as $vote)
{
    $position = $_SESSION['votes'][$vote['step']];
    $position = $db->query("SELECT * FROM position WHERE id=" . $position[0]);
    $position = $position->fetch_assoc();

    if (isset($vote['vote']))
    {
        $ca = $db->query
        (
              'SELECT * FROM person,candidate '
            . 'WHERE candidate.id=' . (int)$vote['vote'] . ' '
            . 'AND person_id=person.id'
        )->fetch_assoc();

        echo '<h2>' . $position['name'] . '</h2>';
        echo '<p>' . $ca['name'] . '</p>';
    }
    elseif (isset($vote['candidate']))
    {
        asort($vote['candidate']);

        echo '<h2>' . $position['name'] . '</h2>';

        foreach ($vote['candidate'] as $ca => $order)
        {
            $ca = $db->query
            (
                  'SELECT * FROM person,candidate '
                . 'WHERE candidate.id=' . (int)$ca . ' '
                . 'AND person_id=person.id'
            )->fetch_assoc();

            echo $order . ': ' . $ca['name'] . '<br />';
        }
    }
}

?>

<button onclick="location.href='do-vote.php';">Cast Vote</button>

<?php
    include 'common/footer.php';
