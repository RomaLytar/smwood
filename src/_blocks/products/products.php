<section class="products products--page">
  <div class="wrap">
    <h2 class="title products__title">Наша продукция</h2>
    <ul class="products__list">
	    <?php $equipment = new WP_Query(['post_type' => 'products', 'posts_per_page' => 9]); ?>
	    <?php if ($equipment->have_posts()) : ?>
		    <?php while($equipment->have_posts()) : $equipment->the_post(); ?>
			    <?php $price = get_post_meta($post->ID, 'wpcf-price', true); ?>
			    <?php $name_button = get_post_meta($post->ID, 'wpcf-name-button', true); ?>
                <li class="products__item">
                    <a href="<?php the_permalink(); ?>" class="products__img">
                        <img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title() ?>">
                    </a>
                    <div class="products__item-info">
                        <h3 class="products__item-title"><a href="<?php the_permalink(); ?>"><? the_title() ?> </a></h3>
                        <p class="products__item-price"><?= $price; ?></p>
                        <a data-popup-link="order" class="btn btn--orange products__item-btn"><?= ($name_button == '') ? 'Заказать' : $name_button ?></a>
                    </div>
                </li>
		    <?php endwhile; ?>
	    <?php endif; ?>
    </ul>
  </div>
</section>
