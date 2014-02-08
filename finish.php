<?php

$title = 'Vote';

include 'model/database.php';

session_start();

include 'common/header.php';

?>

</head>
<body>
  <div id="delimiter" style="text-align: center;">
    <h1 style="text-align: center;">You are about to cast your vote</h1>
   <div class="progress progress-striped">
     <div class="progress-bar"
          role="progressbar"
          aria-valuenow="60"
          aria-valuemin="0"
          aria-valuemax="100"
          style="width: 100%;">
     </div>
   </div>
   <p style="text-align: center;">100% Complete</p>

<?php

foreach ($_SESSION['voted'] as $vote)
{
    $position = $_SESSION['votes'][$vote['step']];
    $position = $db->query("SELECT * FROM position WHERE id=" . (int)$position[0]);
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

            echo '<b>' . ($order + 1) . '</b> ' . $ca['name'] . '<br />';
        }
    }
}

?>

  <button class="btn btn-success btn-lg" onclick="location.href='do-vote.php';" style="display: block; margin-left: auto; margin-right: auto;">Cast Vote</button>

</div>

<?php
    include 'common/footer.php';
