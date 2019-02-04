<?php

include 'mod/settings.php';
include 'mod/customer_posts.php';

//Register menu
register_nav_menus(array(
    'top' => 'Меню хедер',
));

//li
add_filter( 'nav_menu_css_class', 'nav_css_filter' );
function nav_css_filter( $classes ){
	$classes['class'] = 'menu__item';
	return $classes;
}

//a
add_filter( 'nav_menu_link_attributes', 'nav_link_filter', 10, 4 );
function nav_link_filter( $atts, $item, $args, $depth ){
	$atts['class'] = 'menu__item-name';
	return $atts;
}

function true_loadmore_scripts() {
	wp_enqueue_script('jquery'); // скорее всего он уже будет подключен, это на всякий случай
	wp_enqueue_script( 'true_loadmore', get_stylesheet_directory_uri() . '/js/loadmore.js', array('jquery') );
}
//
add_action( 'wp_enqueue_scripts', 'true_loadmore_scripts' );


//ajax news

function true_load_posts(){
	$args = unserialize(stripslashes($_POST['query']));
	$args['paged'] = $_POST['page'] + 1; // следующая страница
	$args['post_status'] = 'publish';
	$args['post_type'] = 'news';
	$q = new WP_Query($args);
	if( $q->have_posts() ):
		while($q->have_posts()): $q->the_post();
	    $post_id = get_the_ID();
	    $name_button = get_post_meta($post_id, 'wpcf-learn-mo', true); ?>
            <li>
                <article class="news__item">
                    <a href="<?php the_permalink(); ?>" class="news__photo">
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?= the_title(); ?>">
                    </a>
                    <h3 class="news__item-title">
                        <a href="<?php the_permalink(); ?>"><?= the_title(); ?></a>
                    </h3>
                    <time class="news__item-date" datetime="<?= the_date('j Y'); ?>"><?= the_date('j F Y'); ?></time>
                    <div class="news__descr">
						<?= get_the_content(); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="news__link"><?= ($name_button == '') ? 'Подробнее' : $name_button ?></a>
                </article>
            </li>
		<?php
		endwhile;
	endif;
	wp_reset_postdata();
	die();
}

add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');


//breadcrumbs
function the_bloggood_ru_() {
	if (!is_front_page()) {
		echo '<ol class="breadcrumbs__list"><li><a href="';
		echo get_option('home');
		echo '">Главная </a></li>';
		if (is_category() || is_single()) {
//			echo '<li><a>';
//			echo wp_title();
//			echo '</li></a>';
			if (is_single()) {
				echo '<li><a>';
				echo the_title();
				echo '</a></li>';
			}
		} elseif (is_page()) {
			echo '<li><a>';
			echo the_title();
			echo '</a></li>';
		}
		echo "</a></li></ol>";
	}
	else {
		echo 'Главная';
	}
}