<?php

$title = 'Vote';

include 'model/database.php';

session_start();

include 'common/header.php';

?>

</head>
<body>
  <div id="delimiter">
    <h1 style="text-align: center;">You are about to cast your vote</h1>

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

        echo '<h3>' . $position['name'] . '</h3>';
        echo '<p>' . $ca['name'] . '</p>';
    }
    elseif (isset($vote['candidate']))
    {
        asort($vote['candidate']);

        echo '<h3>' . $position['name'] . '</h3>';

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

  <button class="btn btn-success btn-lg" onclick="location.href='do-vote.php';">Cast Vote</button>

</div>

<?php
    include 'common/footer.php';
