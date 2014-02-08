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

    <p><?=$position['description']?></p>

    <form action="vote-fptp.php" method="post">
      <input name="election" type="hidden" value="<?=$_GET["election"]?>">
      <input name="position" type="hidden" value="<?=$_GET["position"]?>">

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

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="resources/bootstrap/dist/js/bootstrap.min.js"></script>

    <script>
      $('#continue').click(function () {
        var atLeastOneIsChecked = $('input:radio').is(':checked');

        if (!atLeastOneIsChecked) {
          $('#noCandidateSelected').show();
          return false;
        } else {
          return true;
        }
      });
    </script>
  </div>
  </body>
</html>
