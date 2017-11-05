<?php

  // Convert Score into words
  $score = get_field('game_review_score', false, false);

  if ($score < 26) {
      $score = 'bad';
  } elseif ($score < 50) {
      $score = 'flawed';
  } elseif ($score < 74) {
      $score = 'good';
  } else {
      $score = 'great';
  }

  // Convert the good and bad into an array spliting at the End of Line
  $the_good = get_field('game_review_the_good', false, false);
  $the_bad = get_field('game_review_the_bad', false, false);

  $the_good = explode(PHP_EOL, $the_good);
  $the_bad = explode(PHP_EOL, $the_bad);

?>

<div class="score">
  <div class="wrapper">
  	<div class="grid">
  		<div class="grid__col grid__col--8-of-12">
        <h2>Our verdict</h2>
        <h3 class="score__title"><?php echo $score ?></h3>
        <div class="score__bar score__bar--<?php echo $score ?>"></div>
        <div class="breakdown">
          <div class="breakdown__the-good">
            <ul>
              <?php
                foreach($the_good as $good) {
                  echo '<li>' . $good . '</li>';
                } ?>
            </ul>
          </div>
          <div class="breakdown__the-bad">
            <ul>
              <?php
                foreach($the_bad as $bad) {
                  echo '<li>' . $bad . '</li>';
                } ?>
            </ul>
          </div>
        </div>
        <p>To learn more about how review N64 games see our <a href="http://n64today.com/our-game-review-scoring-system-explained">review scoring system page</a>. Because we focus on whether a game is still enjoyable to play today, we try to avoid discussing a game’s development history, impact or legacy in our reviews.</p>
      </div>
  	</div>
  </div>
</div>
