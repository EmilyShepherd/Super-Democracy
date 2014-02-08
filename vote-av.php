<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <style>
      .candidate {
        height: 100px;
      }

      .thumb {
          width: 100px;
          height: 100px;
          overflow: hidden;
          float: left;
      }

      .thumb img {
          width: 100px;
          height: 100px;
          margin: 0 0 0 0;
      }

      #delimiter
      {
        max-width:800px;
        margin-left:auto;
        margin-right:auto;
      }
    </style>

    <!-- Bootstrap -->
    <link href="resources/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div id="delimiter">
    <h1><?=$position['name']?></h1>

    <button onclick="window.location.href = 'vote.php?step=<?=$_GET['step'] + 1?>'" type="button" class="btn btn-default" style="float: right;">Skip</button>

    <p><?=$position['description']?></p>

    <h2>Candidates available for selection</h2>
    <div id="unselectedCandidates">
      <div class="panel-group" id="accordion1">
        <?php foreach ($candidates as $candidate) : ?>
          <div id="candidate<?=$candidate['id']?>" class="panel panel-default">
            <input type="hidden" name="candidate[<?=$candidate['id']?>]" value="" />
            <div class="panel-heading">
              <h4 class="panel-title candidate">
                <a id="moveable<?=$candidate['id']?>" data-toggle="collapse" data-parent="#accordion1" href="#collapse<?=$candidate['id']?>">
                  <div class="thumb">
                    <img src="thumbs/teddy.jpg">
                  </div>
                  <?=$candidate['name']?>
                </a>
                <button id="select<?=$candidate['id']?>" type="button" class="btn btn-default" style="float: right;" onclick="move(this, <?=$candidate['id']?>);">
                  Select
                </button>

                <button id="up<?=$candidate['id']?>" type="button" class="btn btn-success" style="float: right; display: none;" onclick="up(<?=$candidate['id']?>);">
                  <span class="glyphicon glyphicon-arrow-up"></span>
                </button>
                <button id="down<?=$candidate['id']?>" type="button" class="btn btn-danger" style="float: right; display: none;" onclick="down(<?=$candidate['id']?>);">
                  <span class="glyphicon glyphicon-arrow-down"></span>
                </button>
              </h4>
            </div>
            <div id="collapse<?=$candidate['id']?>" class="panel-collapse collapse">
              <div class="panel-body">
                <?=$candidate['pitch']?>
                <button onclick="return false;" style="float: right;" class="btn btn-primary" data-toggle="modal" data-target="#manifesto<?=$candidate['id']?>">
                  View Manifesto
                </button>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>

    <h2>Selected Candidates</h2>
    <form action="vote.php" method="post">
      <input type="hidden" name="step" value="<?=$_GET['step']?>" />

      <div id="selectedCandidates">
        Select candidates from the list above to begin ranking
        <div class="panel-group" id="accordion2">
        </div>
      </div>

      <input id="continue" type="submit" class="btn btn-primary" value="Continue" />
    </form>

    <?php foreach ($candidates as $candidate) : ?>
      <div class="modal fade" id="manifesto<?=$candidate['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">View Manifesto</h4>
            </div>
            <div class="modal-body">
              <?=$candidate['manifesto']?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach ?>

    <div class="progress">
      <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= (int)(($_GET['step']/count($_SESSION['votes']))*100) ?>%;">
        <span class="sr-only"><?= (int)(($_GET['step']/count($_SESSION['votes']))*100) ?>% Complete</span>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="resources/bootstrap/dist/js/bootstrap.min.js"></script>

    <script>
      function move(select, candidate) {
        if (select.picked) {
          $("#candidate" + candidate).appendTo("#accordion1");

          $("#movable" + candidate).data('parent', 'accordion1');

          $("#up" + candidate).hide();
          $("#down" + candidate).hide();

          select.picked = false;
          select.textContent = "Select";
        } else {
          $("#candidate" + candidate).appendTo("#accordion2");

          $("#movable" + candidate).data('parent', 'accordion2');

          $("#up" + candidate).show();
          $("#down" + candidate).show();

          select.picked = true;
          select.textContent = "Deselect";
        }

        update();
      }

      function update() {
        var inputs = document.getElementById("accordion2").getElementsByTagName("input");

        for (var i=0; i<inputs.length; i++) {
          var input = inputs[i];

          input.value = i;
        }

        var buttons = document.getElementById("accordion2").getElementsByTagName("button");

        var foundFirstUp = false;
        var lastDown = null;
        for (i=0; i<buttons.length; i++) {
          var button = buttons[i];

          if (!foundFirstUp && button.id.indexOf("up") === 0) {
            button.disabled = "disabled";
            foundFirstUp = true;
            continue;
          }

          if (button.id.indexOf("down") === 0) {
            lastDown = button;
          }

          button.disabled = "";
        }

        if (lastDown !== null) {
          lastDown.disabled = "disabled";
        }
      }

      function up(candidate) {
        $("#candidate" + candidate).after($("#candidate" + candidate).prev());

        update();
      }

      function down(candidate) {
        $("#candidate" + candidate).before($("#candidate" + candidate).next());

        update();
      }
    </script>
  </div>
  </body>
</html>
