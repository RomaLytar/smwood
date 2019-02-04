<?php

/* Отключаем админ панель для всех пользователей. */
show_admin_bar(false);

add_theme_support( 'post-thumbnails' );

/**
 * Включаем возможность загрузки SVG через админ панель
 */
function my_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml'; // поддержка SVG
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);

function my_more_options()
{
//phone
    add_settings_field('phone_first', 'Телефон компани (первый)', 'display_phone_first', 'general');
    register_setting('general', 'my_phone_first');

    add_settings_field('phone_second', 'Телефон компани (второй) ', 'display_phone_second', 'general');
    register_setting('general', 'my_phone_second');

    add_settings_field('phone_second_mob', 'Телефон компани (второй "для вызова") ', 'display_phone_second_mob', 'general');
    register_setting('general', 'my_phone_second_mob');

    add_settings_field('phone_first_mob', 'Телефон компани (первый "для вызова") ', 'display_phone_first_mob', 'general');
    register_setting('general', 'my_phone_first_mob');


}

add_action('admin_init', 'my_more_options');

//phone
function display_phone_first_mob()
{
	echo "<input type='text' class='regular-text' name='my_phone_first_mob' value='" . esc_attr(get_option('my_phone_first_mob')) . "'>";
}

function display_phone_second_mob()
{
	echo "<input type='text' class='regular-text' name='my_phone_second_mob' value='" . esc_attr(get_option('my_phone_second_mob')) . "'>";
}

function display_phone_first()
{
     echo "<input type='text' class='regular-text' name='my_phone_first' value='" . esc_attr(get_option('my_phone_first')) . "'>";
}
function display_phone_second()
{
    echo "<input type='text' class='regular-text' name='my_phone_second' value='" . esc_attr(get_option('my_phone_second')) . "'>";
}

## удаляет сообщение о новой версии WordPress у всех пользователей кроме администратора
if( is_admin() && ! current_user_can('manage_options') ){
	add_action('init', function(){  remove_action( 'init', 'wp_version_check' );  }, 2 );
	add_filter('pre_option_update_core', '__return_null');
}

## Добавляет миниатюры записи в таблицу записей в админке
if(1){
	add_action('init', 'add_post_thumbs_in_post_list_table', 20 );
	function add_post_thumbs_in_post_list_table(){
		// проверим какие записи поддерживают миниатюры
		$supports = get_theme_support('post-thumbnails');

		// $ptype_names = array('post','page'); // указывает типы для которых нужна колонка отдельно

		// Определяем типы записей автоматически
		if( ! isset($ptype_names) ){
			if( $supports === true ){
				$ptype_names = get_post_types(array( 'public'=>true ), 'names');
				$ptype_names = array_diff( $ptype_names, array('attachment') );
			}
			// для отдельных типов записей
			elseif( is_array($supports) ){
				$ptype_names = $supports[0];
			}
		}

		// добавляем фильтры для всех найденных типов записей
		foreach( $ptype_names as $ptype ){
			add_filter( "manage_{$ptype}_posts_columns", 'add_thumb_column' );
			add_action( "manage_{$ptype}_posts_custom_column", 'add_thumb_value', 10, 2 );
		}
	}

	// добавим колонку
	function add_thumb_column( $columns ){
		// подправим ширину колонки через css
		add_action('admin_notices', function(){
			echo '
			<style>
				.column-thumbnail{ width:80px; text-align:center; }
			</style>';
		});

		$num = 1; // после какой по счету колонки вставлять новые

		$new_columns = array( 'thumbnail' => __('Thumbnail') );

		return array_slice( $columns, 0, $num ) + $new_columns + array_slice( $columns, $num );
	}

	// заполним колонку
	function add_thumb_value( $colname, $post_id ){
		if( 'thumbnail' == $colname ){
			$width  = $height = 45;

			// миниатюра
			if( $thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true ) ){
				$thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
			}
			// из галереи...
			elseif( $attachments = get_children( array(
				'post_parent'    => $post_id,
				'post_mime_type' => 'image',
				'post_type'      => 'attachment',
				'numberposts'    => 1,
				'order'          => 'DESC',
			) ) ){
				$attach = array_shift( $attachments );
				$thumb = wp_get_attachment_image( $attach->ID, array($width, $height), true );
			}

			echo empty($thumb) ? ' ' : $thumb;
		}
	}
}