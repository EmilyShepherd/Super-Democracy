<?php
    $title = "Nominate";

    include 'common/header.php'
?>
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
  </head>
  <body>
  
    <?php
      session_start();
    ?>
    <div id="delimiter">
      <header>
        <h1>Super Democracy Elections</h1>
      </header>
      <h2>Position</h2>
      <?php include 'model/nominate.php' ?>

      <form action="addcandidate.php" method="post" enctype="multipart/form-data">
        <p>I wish to nominate myself for the position of: <select name="position">
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
        <h2>Your photo</h2>
        <input type="file" name="photo" />
        <h2>Your T-shirt size</h2>
        <select name="size">
          <option value="1">Extra Small</option>
          <option value="2">Small</option>
          <option value="3">Medium</option>
          <option value="4">Large</option>
          <option value="5">Extra Large</option>
        </select>
        <h2>The small print</h2>
        <input type="checkbox" name="legal"> m8 yes
        <div class="button_list">
          <input type="submit" class="btn btn-primary" name="submit" value="Nominate" />
        </div>
      </form>

      <footer>
        <b>Such copyright, many rights reserved</b>
      </footer>
    </div>

<?php
    include 'common/footer.php'; ?>
