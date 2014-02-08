<?php
$title = "Super Democracy";

include 'common/header.php';

include 'model/index.php';
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
        <h1 style="text-align: center;">Super Democracy Elections</h1>
      </header>

      <?php if (!$positions) : ?>
        <p style="text-align: center;">Sorry, there are no elections for you to vote for</p>
      <?php else : ?>
        <p style="text-align: center;">Which elections would you like to vote in?</p>

        <form action="startvote.php" method="post">
          <div class="panel-group" id="positions">
            <?php foreach ($positions as $position): ?>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title candidate">
                    <a class="pos_name" data-toggle="collapse" data-parent="#positions" href="#desc_<?= $position['id'] ?>_<?= $position['election_id'] ?>">
                      <?= $position['name']?>
                    </a>
                    <span style="float: right; position: relative; bottom: 3px;">
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
              <input type="reset" class="btn btn-default btn-lg" name="reset" value="Check all" style="float: right;" />
              <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Vote!" style="position: relative; left: 52px; display: block; margin-left: auto; margin-right: auto;" />
            </div>
          </div>
        </form>
      <?php endif ?>

    </div>
<?php
    include 'common/footer.php';
