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
    <h1>President</h1>

    <h2>Candidates available for selection</h2>
    <div id="unselectedCandidates">
      <div class="panel-group" id="accordion1">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title candidate">
              <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne">
                Doge 1
              </a>
              <button type="button" class="btn btn-default" style="float: right;">Select</button>
            </h4>
          </div>
          <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title candidate">
              <a data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo">
                Doge 2
              </a>
              <button type="button" class="btn btn-default" style="float: right;">Select</button>
            </h4>
          </div>
          <div id="collapseTwo" class="panel-collapse collapse">
            <div class="panel-body">
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title candidate">
              <a data-toggle="collapse" data-parent="#accordion1" href="#collapseThree">
                Doge 3
              </a>
              <button type="button" class="btn btn-default" style="float: right;">Select</button>
            </h4>
          </div>
          <div id="collapseThree" class="panel-collapse collapse">
            <div class="panel-body">
            </div>
          </div>
        </div>
      </div>
    </div>

    <h2>Selected Candidates</h2>
    <div id="selectedCandidates">
      <div class="panel-group" id="accordion2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title candidate">
              <a data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
                Doge 4
              </a>
              <div class="btn-group" style="float: right;">
                <button type="button" class="btn btn-default">
                  <span class="glyphicon glyphicon-arrow-up"></span>
                </button>
                <button type="button" class="btn btn-default">
                  <span class="glyphicon glyphicon-arrow-down"></span>
                </button>
              </div>
            </h4>
          </div>
          <div id="collapseFour" class="panel-collapse collapse in">
            <div class="panel-body">
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title candidate">
              <a data-toggle="collapse" data-parent="#accordion2" href="#collapseFive">
                Doge 5
              </a>
              <div class="btn-group" style="float: right;">
                <button type="button" class="btn btn-default">
                  <span class="glyphicon glyphicon-arrow-up"></span>
                </button>
                <button type="button" class="btn btn-default">
                  <span class="glyphicon glyphicon-arrow-down"></span>
                </button>
              </div>
            </h4>
          </div>
          <div id="collapseFive" class="panel-collapse collapse">
            <div class="panel-body">
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title candidate">
              <a data-toggle="collapse" data-parent="#accordion2" href="#collapseSix">
                Doge 6
              </a>
              <div class="btn-group" style="float: right;">
                <button type="button" class="btn btn-default">
                  <span class="glyphicon glyphicon-arrow-up"></span>
                </button>
                <button type="button" class="btn btn-default">
                  <span class="glyphicon glyphicon-arrow-down"></span>
                </button>
              </div>
            </h4>
          </div>
          <div id="collapseSix" class="panel-collapse collapse">
            <div class="panel-body">
            </div>
          </div>
        </div>
      </div>

      <button type="button" class="btn btn-primary">Continue</button>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="resources/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>
