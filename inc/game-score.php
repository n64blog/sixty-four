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
  <h2>Verdict</h2>
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
  <p class="scoring-policy">N64 Today's reviews focus on whether a game is still enjoyable to play today. As a result, they do not factor a game’s development history, impact or legacy into the final score. Find out more about the <a href="https://n64today.com/game-review-scoring-system/">review scoring system</a>. </p>
</div>
