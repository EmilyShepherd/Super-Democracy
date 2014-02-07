<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Super Democracy!</title>

    <style>
      .pos_name
      {
        font-weight: bold;
      }
      
      img.top
      {
        vertical-align:text-top;
      }
      
      <!-- For large checkboxes, should we choose to use them -->
      .large
      {
        width: 30px;
        height: 30px;
      }
      
      div.button_list
      {
        padding-top:5px;
        padding-right:5px;
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
      <header>
        <h1>Super Democracy Elections</h1>
      </header>
      <h2>Which elections would you like to vote in?</h2>
      <?php include 'model/index.php' ?>
      
      <form action="startvote.php" method="post">
        <div class="panel-group" id="positions">       
          <?php foreach ($positions as $position): ?>    
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title candidate">
                  <a class="pos_name" data-toggle="collapse" data-parent="#positions" href="#desc_<?= $position['id'] ?>_<?= $position['election_id'] ?>">
                    <?= $position['name']?>
                  </a>
                  <span style="float: right;">
                    Vote in this election? <input type="checkbox" name="vote_in[]" value="<?=  $position['id']?>_<?= $position['election_id'] ?>" checked>
                  </span>
                </h4>
              </div>
              <div id="desc_<?= $position['id'] ?>_<?= $position['election_id'] ?>" class="panel-collapse collapse">
                <div class="panel-body">
                  <p class="description">
                    <img class="top" src="/images/position_<?= $position['id'] ?>.png" alt="<?= $position['name']?>"/>
                    <?= $position['description']?>
                  </p>
                </div>
              </div>
            </div>
          <?php endforeach ?>
          <div class="button_list">
            <input type="submit" class="btn btn-primary" name="submit" value="Vote!" />
            <input type="reset" class="btn btn-default" name="reset" value="Check all" />
          </div>
        </div>
      </form>
    
      <footer>
        <h4>Such copyright, many rights reserved</h3>
      </footer>
    </div>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="resources/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>