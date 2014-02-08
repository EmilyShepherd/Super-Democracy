<?php

include '../model/database.php';

define('AV',   0);
define('FPTP', 1);

$election = (int) $_GET['election'];

$title = "Election " . $election;

include '../common/header.php';

?>
</head>
<body>
    <div id="delimiter">
    <h1>Election <?=$election?></h1>
<?php
    $positions = $db->query
    (
        'SELECT position.id, position.name, position.voting FROM '
      . 'election, candidate, position WHERE candidate.election_id = ' . $election . ' AND '
      . 'candidate.position_id = position.id GROUP BY name'
    );

    while ($position = $positions->fetch_assoc()) {
?>
    <h2><?=$position['name']?></h2>
<?php
        $position_id = (int) $position['id'];

        if (((int) $position['voting']) == FPTP) {
            $candidates = $db->query
            (
                'SELECT COUNT(*) as votes, person.name FROM '
              . 'fptp, person, candidate WHERE '
              . 'fptp.candidate_id = candidate.id AND '
              . 'candidate.person_id = person.id AND '
              . 'candidate_id IN '
                  . '(SELECT id FROM candidate WHERE election_id = ' . $election . ' AND '
                  . 'position_id = ' . $position_id . ') '
              . 'GROUP BY candidate_id ORDER BY votes'
            );

            while ($candidate = $candidates->fetch_assoc()) {
                $votes = $candidate['votes'];
                $name = $candidate['name'];

                ?>

                    <?=$name?> <?=$votes?>

                <?php
            }
        } else {
            echo("AV");
        }

    }




?>

    </div>
<?php
include '../common/footer.php';
