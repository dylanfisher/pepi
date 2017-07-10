<div class="link-set__item">
  <a href="<?php the_permalink(); ?>" class="blank-link">
    <h2 class="link-set__item__title">
      <?php the_title(); ?>
    </h2>
    <div class="link-set__item__label">
      <?php echo get_the_date( 'm.d.y' ); ?>
    </div>
  </a>
</div>
