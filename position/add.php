<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add a Position</title>

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
    <link href="../resources/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

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
        <h1>Add a Position</h1>
      </header>

      <?php include '../model/index.php' ?>

      <form action="add.php" method="post">
        <h2>Name</h2>
        <input type="text" name="name" />

        <h2>Groups Eligible to Vote</h2>

        <h2>Groups Eligible to Hold the Position</h2>

      </form>

      <footer>
        <b>Such copyright, many rights reserved</b>
      </footer>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../resources/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>
