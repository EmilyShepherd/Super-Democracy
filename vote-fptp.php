
    <form action="vote.php" method="post">
      <input type="hidden" name="step" value="<?=$_GET['step']?>" />

      <div class="panel-group" id="accordion1">
        <?php foreach ($candidates as $candidate) : ?>
          <div id="candidate<?=$candidate['id']?>" class="panel panel-default">
            <div class="panel-heading" onclick="document.getElementById('moveable<?=$candidate['id']?>').click();" style="cursor: pointer">
              <h4 class="panel-title candidate">
                <a id="moveable<?=$candidate['id']?>" data-toggle="collapse" data-parent="#accordion1" href="#collapse<?=$candidate['id']?>">
                  <div class="thumb">
                      <?php
                        include 'model/database.php';
                        $thumb = $db->query
                        (
                          'SELECT image FROM person WHERE person.id = ' . (int)$candidate['person_id']
                        );
                        $thumb = $thumb->fetch_assoc();
                        if(!empty($thumb['image'])):
                      ?>
                    <img src="<?=$thumb['image']?>" alt="<?=$candidate['name']?>">
                      <?php else: ?>
                    <img src="/thumbs/no-icon.jpg" alt="<?=$candidate['name']?>">
                      <?php endif ?>
                  </div>
                  <?=$candidate['name']?>
                </a>
                <input name="vote" value="<?=$candidate['id']?>" type="radio" style="float: right;" onclick="event.cancelBubble = true;">
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

      <input id="continue" type="submit" class="btn btn-primary btn-lg" value="Continue" style="display: block; margin-left: auto; margin-right: auto;" />
    </form>

    <script>
      document.getElementById('continue').onclick = function () {
        var atLeastOneIsChecked = $('input:radio').is(':checked');

        if (!atLeastOneIsChecked) {
          $('#noCandidateSelected').show();
          return false;
        } else {
          return true;
        }
      };
    </script>
    </div>
