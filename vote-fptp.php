  </head>
  <body>
    <div id="delimiter">
    <h1><?=$position['name']?></h1>

    <button onclick="window.location.href = 'vote.php?step=<?=$_GET['step'] + 1?>'" type="button" class="btn btn-default" style="float: right;">Skip</button>
    <p><?=$position['description']?></p>

    <form action="vote.php" method="post">
      <input type="hidden" name="step" value="<?=$_GET['step']?>" />

      <div class="panel-group" id="accordion1">
        <?php foreach ($candidates as $candidate) : ?>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title candidate">
                <a data-toggle="collapse" data-parent="#accordion1" href="#collapse<?=$candidate['id']?>">
                  <div class="thumb">
                    <img src="thumbs/teddy.jpg">
                  </div>
                  <?=$candidate['name']?>
                </a>
                <input name="vote" value="<?=$candidate['id']?>" type="radio" style="float: right;">
              </h4>
            </div>
            <div id="collapse<?=$candidate['id']?>" class="panel-collapse collapse">
              <div class="panel-body">
                <?=$candidate['pitch']?>
                <br>
                <button onclick="return false;" style="float: right;"  class="btn btn-primary" data-toggle="modal" data-target="#manifesto<?=$candidate['id']?>">
                  View Manifesto
                </button>
              </div>
            </div>
          </div>
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
      </div>

      <p id="noCandidateSelected" style="display: none;" class="bg-danger">Please select one candidate</p>

      <input id="continue" type="submit" class="btn btn-primary" value="Continue" />
    </form>

    <div class="progress">
      <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= (int)(($_GET['step']/count($_SESSION['votes']))*100) ?>%;">
        <span class="sr-only"><?= (int)(($_GET['step']/count($_SESSION['votes']))*100) ?>% Complete</span>
      </div>
    </div>

    <script>
      document.getElementById('continue').onclick = function () {
        var atLeastOneIsChecked = $('input:radio').is(':checked');

        if (!atLeastOneIsChecked) {
          $('#noCandidateSelected').show();
          return false;
        } else {
          return true;
        }
      };
    </script>
