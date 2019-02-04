<section class="application">
  <div class="wrap">
    <h2 class="title">Где применяется</h2>
    <div class="application__list-wrap">
      <div class="application__list" data-application>
	      <?php $equipment = new WP_Query(['post_type' => 'application', 'posts_per_page' => 5]); ?>
	      <?php if ($equipment->have_posts()) : ?>
		      <?php while($equipment->have_posts()) : $equipment->the_post(); ?>
            <div class="application__item">
              <div class="application__img">
                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?= the_title(); ?>">
              </div>
              <h3 class="application__item-title"><?= the_title(); ?> </h3>
            </div>
		      <?php endwhile; ?>
	      <?php endif; ?>
      </div>
    </div>
  </div>
</section>
