<?php include 'model/vote.php' ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <style>
      .candidate {
        height: 50px;
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

    <div class="panel-group" id="accordion1">
      <?php foreach ($candidates as $candidate) : ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title candidate">
              <a data-toggle="collapse" data-parent="#accordion1" href="#collapse<?=$candidate['id']?>">
                <?=$candidate['name']?>
              </a>
              <input type="radio" style="float: right;">
            </h4>
          </div>
          <div id="collapse<?=$candidate['id']?>" class="panel-collapse collapse in">
            <div class="panel-body">
              <?=$candidate['pitch']?>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>

    <button type="button" class="btn btn-primary">Continue</button>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="resources/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>