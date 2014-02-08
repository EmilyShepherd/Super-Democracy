<?php
    $title = "Super Democracy";

    include 'common/header.php';
?>
    <style>
      .pos_name
      {
        font-weight: bold;
      }

      img.thumb
      {
        float: left;
        margin-right: 5px;
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
    </style>
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
                    <img class="thumb" src="/images/position_<?= $position['id'] ?>.png" alt="<?= $position['name']?>"/>
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
        <b>Such copyright, many rights reserved</b>
      </footer>
    </div>
<?php
    include 'common/footer.php';
