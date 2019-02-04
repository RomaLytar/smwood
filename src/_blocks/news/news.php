<section class="news">
  <div class="wrap">
    <h2 class="title">Новости</h2>
    <ul class="news__list">

	    <?php $equipment = new WP_Query(['post_type' => 'news', 'posts_per_page' => 3]); ?>
	    <?php if ($equipment->have_posts()) : ?>
		    <?php while($equipment->have_posts()) : $equipment->the_post(); ?>
		    <?php $name_button = get_post_meta($post->ID, 'wpcf-learn-mo', true); ?>
            <li>
                <article class="news__item">
                    <a href="<?php the_permalink(); ?>" class="news__photo">
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?= the_title(); ?>">
                    </a>
                    <h3 class="news__item-title">
                        <a href="<?php the_permalink(); ?>"><?= the_title(); ?></a>
                    </h3>
                    <time class="news__item-date" datetime="2018-08-25"><?php the_time('j F Y'); ?></time>
                    <div class="news__descr">
					    <?= get_the_content(); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="news__link"><?= ($name_button == '') ? 'Подробнее' : $name_button ?></a>
                </article>
            </li>
	    <?php endwhile; ?>
            <?php if (  $equipment->max_num_pages > 1 ) : ?>
                <script>
                    var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                    var true_posts = '<?php echo serialize($equipment->query_vars); ?>';
                    var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                    var max_pages = '<?php echo $equipment->max_num_pages; ?>';
                </script>
             <button class="btn btn--bordered btn--big" id="true_loadmore">Больше новостей</button>
            <?php endif; ?>
	    <?php endif; ?>
    </ul>
  </div>
</section>
