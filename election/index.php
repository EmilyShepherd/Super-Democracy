<?php

include '../model/database.php';

define('AV',   0);
define('FPTP', 1);

$election = (int) $_GET['election'];

$title = "Election " . $election;

include '../common/header.php';

?>
    <script src="/resources/chart.js/Chart.js"></script>
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
            $personVotes = array();
            $personName = array();

            $round = 1;

            while (true) {

                if ($round === 1) {
                    $roundPrefs = $db->query
                    (
                        'SELECT COUNT(*) AS votes, person.name, vote_id, candidate_id FROM '
                      . 'av, candidate, person WHERE av.candidate_id = candidate.id '
                      . 'AND candidate.person_id = person.id AND '
                      . 'candidate.position_id = ' . $position_id . ' AND '
                      . 'candidate.election_id = ' . $election . ' AND '
                      . 'pref = ' . ($round - 1) . ' GROUP BY candidate_id ORDER BY votes DESC'
                    );

                    echo($db->error);

                    $roundPrefs = $roundPrefs->fetch_all(MYSQLI_ASSOC);

                    if (count($roundPrefs) === 0) {
                        echo("No candidates");
                        break;
                    }

                    foreach ($roundPrefs as $candidate) {
                        $personVotes[(int) $candidate['candidate_id']] = (int) $candidate['votes'];
                        $personName[(int) $candidate['candidate_id']] = $candidate['name'];
                    }
                } else {
                    $roundPrefs = $db->query
                    (
                        'SELECT COUNT(*) AS votes, person.name, vote_id, candidate_id FROM '
                      . 'av, candidate, person WHERE av.candidate_id = candidate.id '
                      . 'AND candidate.person_id = person.id AND '
                      . 'candidate.position_id = ' . $position_id . ' AND '
                      . 'candidate.election_id = ' . $election . ' AND '
                      . 'candidate_id = ' . $bottomCandidate . ' AND '
                      . 'pref = ' . ($round - 1) . ' GROUP BY candidate_id ORDER BY votes DESC'
                    );

                    echo($db->error);

                    $roundPrefs = $roundPrefs->fetch_all(MYSQLI_ASSOC);

                    if (count($roundPrefs) == 1) {
                        echo("Only one candidate remains");
                        break;
                    }
                }

                foreach ($personVotes as $id => $votes) {
                    $name = $personName[$id];

                    echo($name . " " . $votes . "<br>");
                }

                if (count($roundPrefs) === 1) {
                    echo("No contest");
                    break;
                }

?>
                <canvas id='round<?=$round?>' width='400' height='400' style="float: right;"></canvas>
                <script>
                (function() {
                  var ctx = document.getElementById("round<?=$round?>").getContext("2d");
                  var data = {
                    labels: <?=json_encode(array_values($personName))?>,
                    datasets: [
                      {
                        fillColor: "rgba(151,187,205,0.5)",
                        strokeColor: "rgba(151,187,205,1)",
                        data: <?=json_encode(array_values($personVotes))?>
                      }
                    ]
                  }

                  new Chart(ctx).Bar(data,{
                    scaleOverride: true,
                    scaleSteps: 3,
                    scaleStepWidth: 1,
                    scaleStartValue: 0,
                  });
                })();
                </script>
<?php

                // Eliminate someone
                $bottomCandidate = end(array_keys($personVotes));

                echo('<br>' . $personName[$bottomCandidate] . ' is eliminated <br>');

                unset($personName[$bottomCandidate]);
                unset($personVotes[$bottomCandidate]);

                $votesTransfered = false;
                foreach ($roundPrefs as $vote) {
                    $votes = (int) $candidate['votes'];
                    $id = (int) $candidate['candidate_id'];

                    if (!array_key_exists($id, $personVotes)) {
                        continue;
                    }

                    $personVotes[$id] += $votes;

                    echo($votes . " transfered to " . $personName[$id] . "<br>");

                    $votesTransfered = true;
                }

                if (!$votesTransfered) {
                    echo("<br>No votes transfered<br><br>");
                }

                foreach ($personVotes as $id => $votes) {
                    $name = $personName[$id];

                    echo($name . " " . $votes . "<br>");
                }
                echo("<br>");

                // Check if the end conditions have been reached

                $totalVotes = array_sum($personVotes);
                $topVoted = array_keys($personVotes)[0];
                $topVotedVotes = $personVotes[$topVoted];
                arsort($personVotes);

                if ($topVotedVotes > ($totalVotes / 2) + 1) {
                    echo($personName[$topVoted] . " recieved more than half + 1 of the votes, so they are elected");
                    break;
                } else {
                    echo($personName[$topVoted] . " did not recieve more than half + 1 of the votes, so the election goes to rounds");
                }
                echo("<br><br>");

                $round++;
            }
        }
    }
?>
    </div>
<?php
include '../common/footer.php';
