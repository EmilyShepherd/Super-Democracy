<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <style>
      .position {
        font-weight: bold;
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
    <header>
	  <h1>Super Democracy Elections</h1>
	</header>
	<h2>Which elections would you like to vote in?</h2>
    <?php include 'model/index.php' ?>

	<div class="panel-group" id="positions">
      <form action="" method="post">
        <?php foreach ($positions as $position): ?>	
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title candidate">
                <a class data-toggle="collapse" data-parent="#positions" href="#desc_<?= $position['id'] ?>">
                  <?= $position['name']?>
                </a>
                <div style="float: right;">
                  <input type="checkbox" name="vote_in[]" value="<?=  $position['id']?>_<?= $position['election_id'] ?>">
                </div>
              </h4>
            </div>
	        <div id="desc_<?= $position['id'] ?>" class="panel-collapse collapse">
              <div class="panel-body">
		        <?= $position['description']?>
              </div>
            </div>
          </div>
        <?php endforeach ?>
  	  </form>
	</div>
	
	<footer>
	  <h4>Such copyright, many rights reserved</h3>
	</footer>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="resources/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>