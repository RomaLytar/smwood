<?php
//benefits
add_action('init', 'benefits');
function benefits(){
    register_post_type('benefits', array(
        'public' => true,
        'supports' => array ('title','editor','thumbnail','custom-fields','revisions'),
        'menu_position' => 10,
        'menu_icon' => 'dashicons-chart-area',
        'labels' => array(
        'name' => 'Преимущества',
        'all_items' => 'Все преимущества',
        'add_new' => 'Добавить запись',
        'add_new_item' => 'Новая запись',
        'edit_item'  => 'Редактировать запись',
        'new_item'           => 'Новое преимущество', // текст новой записи
        'view_item'          => 'Смотреть преимущество', // для просмотра записи этого типа.
        'search_items'       => 'Искать преимущество', // для поиска по этим типам записи
        'not_found'          => 'Не добавлено не одного преимущества', // если в результате поиска ничего не было найдено
        ),
    ));
}

//products
add_action('init', 'products');
function products(){
    register_post_type('products', array(
        'public' => true,
        'supports' => array ('title','editor','thumbnail','custom-fields','revisions'),
        'menu_position' => 10,
        'menu_icon' => 'dashicons-cart',
        'labels' => array(
            'name' => 'Продукция',
            'all_items' => 'Вся продукция',
            'add_new' => 'Добавить продукцию',
            'add_new_item' => 'Новая продукция',
            'edit_item'  => 'Редактировать продукцию',
            'new_item'           => 'Новая продукция', // текст новой записи
            'view_item'          => 'Смотреть продукцию', // для просмотра записи этого типа.
            'search_items'       => 'Искать продукцию', // для поиска по этим типам записи
            'not_found'          => 'Не добавлено не одной продукции', // если в результате поиска ничего не было найдено
        ),
    ));
}

//application
add_action('init', 'application');
function application(){
    register_post_type('application', array(
        'public' => true,
        'supports' => array ('title','editor','thumbnail','custom-fields','revisions'),
        'menu_position' => 10,
        'menu_icon' => 'dashicons-text',
        'labels' => array(
            'name' => 'Применение',
            'all_items' => 'Все записи',
            'add_new' => 'Добавить запись',
            'add_new_item' => 'Новая запись',
            'edit_item'  => 'Редактировать запись',
            'new_item'           => 'Новая запись', // текст новой записи
            'view_item'          => 'Смотреть записи', // для просмотра записи этого типа.
            'search_items'       => 'Искать запись', // для поиска по этим типам записи
            'not_found'          => 'Не добавлено не одной записи', // если в результате поиска ничего не было найдено
        ),
    ));
}
//news
add_action('init', 'news');
function news(){
    register_post_type('news', array(
        'public' => true,
        'supports' => array ('title','editor','thumbnail','custom-fields','revisions'),
        'menu_position' => 10,
        'menu_icon' => 'dashicons-welcome-add-page',
        'labels' => array(
            'name' => 'Новости',
            'all_items' => 'Все новости',
            'add_new' => 'Добавить новость',
            'add_new_item' => 'Новая запись',
            'edit_item'  => 'Редактировать новость',
            'new_item'           => 'Новая запись', // текст новой записи
            'view_item'          => 'Смотреть новость', // для просмотра записи этого типа.
            'search_items'       => 'Искать новость', // для поиска по этим типам записи
            'not_found'          => 'Не добавлено не одной новости', // если в результате поиска ничего не было найдено
        ),
    ));
}