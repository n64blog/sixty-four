<?php
  $authorFirstName = get_the_author_meta('first_name');
  $authorLastName = get_the_author_meta( 'last_name' );
  $authorBio = get_the_author_meta('description');
  $authorTwitter = get_the_author_meta('twitter');
  $authorInstagram = get_the_author_meta('instagram');
  $authorFacebook = get_the_author_meta('facebook');
?>

<div id="author-bio" class="author-bio">
  <figure class="author-bio__image">
    <?php echo get_avatar( get_the_author_meta( 'ID' ), 300 ); ?>
  </figure>
  <div class="author-bio__text">
    <h2><?php echo $authorFirstName; ?> <?php echo $authorLastName; ?></h2>
    <p><?php echo $authorBio; ?></p>
    <ul>
      <?php if ($authorTwitter) : ?>
        <li><a target="_blank" href="http://twitter.com/<?php echo $authorTwitter; ?>"><span class="icon icon--twitter">Twitter</span></a></li>
			<?php endif; ?>
      <?php if ($authorInstagram) : ?>
        <li><a target="_blank" href="<?php echo $authorInstagram; ?>"><span class="icon icon--instagram">Instagram</span></a></li>
			<?php endif; ?>
      <?php if ($authorFacebook) : ?>
        <li><a target="_blank" href="<?php echo $authorFacebook; ?>"><span class="icon icon--facebook">Facebook</span></a></li>
			<?php endif; ?>      
    </ul>
  </div>
</div>