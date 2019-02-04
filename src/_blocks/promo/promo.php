<section class="promo promo--big">
	<?php if ( have_posts() ){
		while ( have_posts() ){ the_post(); ?>
            <div class="wrap">
                <h1 class="promo__title"><?= get_the_title() ?></h1>
                <a href="#features" class="promo__link" data-slowly-link>Далее</a>
            </div>
            <div class="promo__img">
                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php get_the_title(); ?>">
            </div>
			<?php
		}
	} else {
		echo wpautop( 'Постов для вывода не найдено.' );
	}
	?>
</section>
