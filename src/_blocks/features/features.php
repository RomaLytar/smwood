<section class="features" id="features">
  <div class="wrap">
    <h2 class="title">Наши преимущества</h2>
    <ul class="features__list">
        <?php $equipment = new WP_Query(['post_type' => 'benefits', 'posts_per_page' => 3]); ?>
        <?php if ($equipment->have_posts()) : ?>
            <?php while($equipment->have_posts()) : $equipment->the_post(); ?>
                <li class="features__item">
                    <div class="features__item-img">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <h3 class="features__imte-title"><?= the_title() ?></h3>
                    <div class="features__item-descr">
                        <?= get_the_content() ?>
                    </div>
                </li>
            <?php endwhile; ?>
        <?php endif; ?>
    </ul>
  </div>
</section>
