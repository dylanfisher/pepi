<a href="<?php echo get_home_url(); ?>" rel="home" class="close-button single-post-close-button">&times;</a>

<div class="link-set__item link-set__item--primary">
  <h2 class="link-set__item__title">
    <?php the_title(); ?>
  </h2>
  <div class="link-set__item__label">
    <?php echo get_the_date( 'm.d.y' ); ?>
  </div>
</div>

<?php sandbox_image(); ?>

<div class="entry-content">
  <?php the_field( 'content' ); ?>
</div>
