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
    <h1><?=$position['name']?></h1>

    <p><?=$position['description']?></p>

    <h2>Candidates available for selection</h2>
    <div id="unselectedCandidates">
      <div class="panel-group" id="accordion1">
        <?php foreach ($candidates as $candidate) : ?>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title candidate">
                <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne">
                  <div class="thumb">
                    <img src="thumbs/teddy.jpg">
                  </div>
                  <?=$candidate['name']?>
                </a>
                <button type="button" class="btn btn-default" style="float: right;">Select</button>
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
              <div class="panel-body">
                <?=$candidate['pitch']?>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>

    <h2>Selected Candidates</h2>
    <div id="selectedCandidates">
      Select candidates from the list above to begin ranking
    </div>

    <button type="button" class="btn btn-primary">Continue</button>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="resources/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>
