<nav class="menu" data-menu>
  <button type="button" class="menu__toggle" data-menu-btn>
    Menu
    <span class="menu__toggle-line menu__toggle-line--1"></span>
    <span class="menu__toggle-line menu__toggle-line--2"></span>
    <span class="menu__toggle-line menu__toggle-line--3"></span>
  </button>
  <div class="menu__list-wrap">
      <nav class="menu" data-menu>
		  <?php wp_nav_menu(array(
			  'theme_location'  => '',
			  'menu'            => 'ul',
			  'menu_class'      => 'menu__list',
			  'menu_id'         => 'menu-heder_menu',
			  'echo'            => true,
			  'fallback_cb'     => 'wp_page_menu',
			  'before'          => '',
			  'after'           => '',
			  'link_before'     => '',
			  'link_after'      => '',
			  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			  'depth'           => 0,
			  'walker'          => ''
		  ));
		  ?>
      </nav>
    </ul>
  </div>
</nav>
