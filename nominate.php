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
      
      /* For large checkboxes, should we choose to use them */
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
      
      .manifesto
      {
        width:100%;
        min-height:100px;
      }
      
      .points
      {
        width:50%;
        padding-bottom:5px;
      }
      
      .points_field
      {
        width: 100%;
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
      <h2>Position</h2>
      <?php include 'model/index.php' ?>
      
      <form action="addcandidate.php" method="post">
        <p>I wish to nominate myself for the position of: <select>
          <?php foreach ($positions as $position): ?>
            <option value="<?=$position['id']?>_<?=$position['election_id']?>"><?=$position['name']?></option>
          <?php endforeach ?>
        </select></p>
        <h2>Your manifesto</h2>
        <textarea name="manifesto" class="manifesto">Enter text here...</textarea>
        <h2>Your 30-second pitch</h2>
        <textarea name="pitch" class="manifesto">Enter text here...</textarea>
        <h2>Your key points</h2>
        <div class="points_container">
          <div class="points"><input class="points_field" name="points[]" type="text" value="" /></div>
          <div class="points"><input class="points_field" name="points[]" type="text" value="" /></div>
          <div class="points"><input class="points_field" name="points[]" type="text" value="" /></div>
          <div class="points"><input class="points_field" name="points[]" type="text" value="" /></div>
          <div class="points"><input class="points_field" name="points[]" type="text" value="" /></div>
          <div class="points"><input class="points_field" name="points[]" type="text" value="" /></div>
          <div class="points"><input class="points_field" name="points[]" type="text" value="" /></div>
          <div class="points"><input class="points_field" name="points[]" type="text" value="" /></div>
          <div class="points"><input class="points_field" name="points[]" type="text" value="" /></div>
          <div class="points"><input class="points_field" name="points[]" type="text" value="" /></div>
        </div>
        <h2>The small print</h2>
        <input type="checkbox" name="vote_in[]" value="legal"> m8 yes
        <div class="button_list">
          <input type="submit" class="btn btn-primary" name="submit" value="Nominate" />
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