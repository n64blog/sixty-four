<?php $boxart = get_field('game_box_art'); ?>

<?php	if( !empty($boxart) ): ?>
	<img class="game-box-art" src="<?php echo $boxart['url']; ?>" alt="<?php echo $boxart['alt']; ?>" />
<?php endif; ?>

<section class="game-meta">

  <?php if( get_field('game_developed_by') ): ?>
    <h5>Developed by</h5>
    <p><?php the_field('game_developed_by'); ?></p>
  <?php endif; ?>

  <?php if( get_field('game_published_by') ): ?>
    <h5>Published by</h5>
    <p><?php the_field('game_published_by'); ?></p>
  <?php endif; ?>


  <h5>Released</h5>
  <ul>
    <?php

    // get raw date
    $date_jpn = get_field('jpn_release_date', false, false);
    $date_us = get_field('us_release_date', false, false);
    $date_eu = get_field('eu_release_date', false, false);

    // make date object to convert format
    $date_jpn = new DateTime($date_jpn);
    $date_us= new DateTime($date_us);
    $date_eu = new DateTime($date_eu);

    ?>

    <?php if( get_field('us_release_date') ): ?>
      <li><?php echo $date_us->format('Y'); ?></li>
    <?php endif; ?>

  </ul>

  <?php if( get_field('game_genre') ): ?>
    <h5>Genre</h5>
    <p><?php the_field('game_genre'); ?></p>
  <?php endif; ?>

  <?php if( get_field('game_players') ): ?>
    <h5>Players</h5>
    <p><?php the_field('game_players'); ?></p>
  <?php endif; ?>

  <?php if( get_field('game_cartridge_size') ): ?>
    <h5>Cartridge Size</h5>
    <?php $megabits = get_field('game_cartridge_size', false, false); ?>
    <p><?php the_field('game_cartridge_size'); ?>MB <small>(<?php echo ($megabits * 8) ?> megabits)</small></p>
  <?php endif; ?>

  <?php if( get_field('game_rumble_pak') ): ?>
    <div class="game-meta__pak-info">
      <?php get_template_part('images/icon', 'rumble-pak'); ?>
      <p>Rumble Pak <br>compatible</p>
    </div>
  <?php endif; ?>

  <?php if( get_field('game_controller_pak') ): ?>
    <div class="game-meta__pak-info">
      <?php get_template_part('images/icon', 'memory-pak'); ?>
      <p>Controller Pak <br>compatible</p>
    </div>
  <?php endif; ?>

  <?php if( get_field('game_expansion_pak_optional') ): ?>
    <div class="game-meta__pak-info">
      <?php get_template_part('images/icon', 'expansion-pak'); ?>
      <p>Expansion Pak <br>optional</p>
    </div>
  <?php endif; ?>

  <?php if( get_field('game_expansion_pak_required') ): ?>
    <div class="game-meta__pak-info">
      <?php get_template_part('images/icon', 'expansion-pak'); ?>
      <p>Expansion Pak <br>required</p>
    </div>
  <?php endif; ?>

  <?php if( get_field('game_transfer_pak') ): ?>
    <div class="game-meta__pak-info">
      <?php get_template_part('images/icon', 'transfer-pak'); ?>
      <p>Transfer Pak <br>compatible</p>
    </div>
  <?php endif; ?>

</section>
