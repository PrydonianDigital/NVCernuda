<?php

	//Theme Support
	if ( ! isset( $content_width ) )
		$content_width = 743;
	function nv_cernuda()  {
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
		add_theme_support( 'title-tag' );
		add_image_size( 'portfoliothumb', 800, 550 );
		add_image_size( 'blogthumb', 228, 152 );
		show_admin_bar(false);
	}
	add_action( 'after_setup_theme', 'nv_cernuda' );

	// Register Style
	function nvc_css() {
		wp_register_style( 'nvcernuda', get_template_directory_uri() . '/css/nvcernuda.css', false, '1.0.0-beta6' );
		wp_enqueue_style( 'grid' );
		wp_enqueue_style( 'nvcernuda' );
	}
	add_action( 'wp_enqueue_scripts', 'nvc_css' );

	// Register JS
	function nvc_js() {
		wp_enqueue_script( 'fontawesome', 'https://use.fontawesome.com/bfa003177d.js', false, '4.7.0', false );
		wp_enqueue_script( 'nvcernuda', get_template_directory_uri() . '/js/nvcernuda.js', false, '3.2.1', true );
		wp_enqueue_script( 'fontawesome' );
		wp_enqueue_script( 'nvcernuda' );
	}
	add_action( 'wp_enqueue_scripts', 'nvc_js' );

	// Register Navigation Menus
	function nvc_menus() {
		$locations = array(
			'header' => __( 'Header Menu', 'nvc' ),
			'footer' => __( 'Footer Menu', 'nvc' ),
		);
		register_nav_menus( $locations );
	}
	add_action( 'init', 'nvc_menus' );

	function nvc_sidebars() {
		$args = array(
			'id'			=> 'home',
			'class'		 => 'menu vertical',
			'name'		  => __( 'Home Widgets', 'nvc' ),
			'before_title'  => '<h5>',
			'after_title'   => '</h5>',
		);
		register_sidebar( $args );
		$args = array(
			'id'			=> 'footer1',
			'class'		 => 'menu vertical',
			'name'		  => __( 'Footer Widgets 1', 'nvc' ),
			'before_title'  => '<h5>',
			'after_title'   => '</h5>',
		);
		register_sidebar( $args );
		$args = array(
			'id'			=> 'footer2',
			'class'		 => 'menu vertical',
			'name'		  => __( 'Footer Widgets 2', 'nvc' ),
			'before_title'  => '<h5>',
			'after_title'   => '</h5>',
		);
		register_sidebar( $args );
		$args = array(
			'id'			=> 'footer3',
			'class'		 => 'menu vertical',
			'name'		  => __( 'Footer Widgets 3', 'nvc' ),
			'before_title'  => '<h5>',
			'after_title'   => '</h5>',
		);
		register_sidebar( $args );
	}
	add_action( 'widgets_init', 'nvc_sidebars' );

function portfolio() {

	$labels = array(
		'name'                  => _x( 'Portfolio', 'Post Type General Name', 'nvc' ),
		'singular_name'         => _x( 'Portfolio', 'Post Type Singular Name', 'nvc' ),
		'menu_name'             => __( 'Portfolio', 'nvc' ),
		'name_admin_bar'        => __( 'Portfolio', 'nvc' ),
		'archives'              => __( 'Portfolio Archives', 'nvc' ),
		'attributes'            => __( 'Portfolio Attributes', 'nvc' ),
		'parent_item_colon'     => __( 'Parent Item:', 'nvc' ),
		'all_items'             => __( 'All Portfolio Items', 'nvc' ),
		'add_new_item'          => __( 'Add New Portfolio Item', 'nvc' ),
		'add_new'               => __( 'Add New', 'nvc' ),
		'new_item'              => __( 'New Portfolio', 'nvc' ),
		'edit_item'             => __( 'Edit Portfolio Item', 'nvc' ),
		'update_item'           => __( 'Update Portfolio', 'nvc' ),
		'view_item'             => __( 'View Portfolio', 'nvc' ),
		'view_items'            => __( 'View Items', 'nvc' ),
		'search_items'          => __( 'Search Item', 'nvc' ),
		'not_found'             => __( 'Not found', 'nvc' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'nvc' ),
		'featured_image'        => __( 'Featured Image', 'nvc' ),
		'set_featured_image'    => __( 'Set featured image', 'nvc' ),
		'remove_featured_image' => __( 'Remove featured image', 'nvc' ),
		'use_featured_image'    => __( 'Use as featured image', 'nvc' ),
		'insert_into_item'      => __( 'Insert into item', 'nvc' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'nvc' ),
		'items_list'            => __( 'Items list', 'nvc' ),
		'items_list_navigation' => __( 'Items list navigation', 'nvc' ),
		'filter_items_list'     => __( 'Filter items list', 'nvc' ),
	);
	$args = array(
		'label'                 => __( 'Portfolio', 'nvc' ),
		'description'           => __( 'Portfolio', 'nvc' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'page-attributes', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'menu_icon'				=> 'dashicons-portfolio'
	);
	register_post_type( 'portfolio', $args );

}
add_action( 'init', 'portfolio', 0 );

	function foundation_pagination( $p = 2 ) {
		if ( is_singular() ) return;
		global $wp_query, $paged;
		$max_page = $wp_query->max_num_pages;
		if ( $max_page == 1 ) return;
		if ( empty( $paged ) ) $paged = 1;
		if ( $paged > $p + 1 ) p_link( 1, 'First' );
		if ( $paged > $p + 2 ) echo '<li class="unavailable"><a href="#">&hellip;</a></li>';
		for( $i = $paged - $p; $i <= $paged + $p; $i++ ) { // Middle pages
				if ( $i > 0 && $i <= $max_page ) $i == $paged ? print "<li class='current'><a href='#'>{$i}</a></li> " : p_link( $i );
		}
		if ( $paged < $max_page - $p - 1 ) echo '<li class="unavailable"><a href="#">&hellip;</a></li>';
		if ( $paged < $max_page - $p ) p_link( $max_page, 'Last' );
	}
	function p_link( $i, $title = '' ) {
		if ( $title == '' ) $title = "Page {$i}";
		echo "<li><a href='", esc_html( get_pagenum_link( $i ) ), "' title='{$title}'>{$i}</a></li> ";
	}

	function nvc_theme_customiser( $wp_customize ) {

		$wp_customize->add_panel( 'nvc_schema', array(
			'priority'			=> 30,
			'theme_supports'	=> '',
			'title'				=> 'Theme Options',
			'capability'		=> 'edit_theme_options',
		) );

		$wp_customize->add_section( 'nvc_schema_section' , array(
			'title'				=> 'Colours',
			'priority'			=> 30,
			'description'		=> 'This section controls The colours of the header, nav bar and bottom section).',
			'panel'				=> 'nvc_schema',
		) );
		$wp_customize->add_setting( 'nvc_header_link', array('default' => '#2ba6cb') );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nvc_header_link', array(
			'label'				=> 'Header Link Colour',
			'section'			=> 'nvc_schema_section',
			'settings'			=> 'nvc_header_link',
		) ) );
		$wp_customize->add_setting( 'nvc_link_hover', array('default' => '#258faf') );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nvc_header_link_hover', array(
			'label'				=> 'Header Link Hover Colour',
			'section'			=> 'nvc_schema_section',
			'settings'			=> 'nvc_link_hover',
		) ) );
		$wp_customize->add_setting( 'nvc_header_link_hover', array('default' => '#2C3840') );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nvc_nav', array(
			'label'				=> 'Nav',
			'section'			=> 'nvc_schema_section',
			'settings'			=> 'nvc_header_link_hover',
		) ) );
		$wp_customize->add_setting( 'nvc_footer', array('default' => '#4a4a4a') );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nvc_footer', array(
			'label'				=> 'Footer',
			'section'			=> 'nvc_schema_section',
			'settings'			=> 'nvc_footer',
		) ) );
		$wp_customize->add_setting( 'nvc_footertext', array('default' => '#ffffff') );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nvc_footertext', array(
			'label'				=> 'Footer Text',
			'section'			=> 'nvc_schema_section',
			'settings'			=> 'nvc_footertext',
		) ) );
		$wp_customize->add_setting( 'nvc_link', array('default' => '#2ba6cb') );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nvc_link', array(
			'label'				=> 'Link Colour',
			'section'			=> 'nvc_schema_section',
			'settings'			=> 'nvc_link',
		) ) );
		$wp_customize->add_setting( 'nvc_link_hover', array('default' => '#258faf') );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nvc_link_hover', array(
			'label'				=> 'Link Hover Colour',
			'section'			=> 'nvc_schema_section',
			'settings'			=> 'nvc_link_hover',
		) ) );
	}
	add_action( 'customize_register', 'nvc_theme_customiser' );

	add_action( 'init', 'jp_remove_excerpt_share' );

	function jp_remove_excerpt_share() {
		if ( has_filter( 'the_excerpt', 'sharing_display' ) ) {
			remove_filter( 'the_excerpt', 'sharing_display', 19 );
		}
	}

	function SoN_Articles_Search_Widget() {
		register_widget( 'SoN_Articles_Search' );
	}
	add_action( 'widgets_init', 'SoN_Articles_Search_Widget' );
	class SoN_Articles_Search extends WP_Widget {
		function __construct() {
			$widget_ops = array( 'classname' => 'widget_author', 'description' => __( 'Site Search', 'son' ) );
			parent::__construct( 'SoN_Articles_Search', __( 'NVC Search', 'son' ), $widget_ops );
		}
		function widget( $args, $instance) {
			$title = apply_filters( 'widget_title', $instance['title']);
		?>
		<li class="widget" itemscope itemtype="http://schema.org/WebSite">
		<meta itemprop="url" content="<?php echo bloginfo('url'); ?>"/>
		<h5><?php echo $title; ?></h5>
		<form role="search" method="get" class="searchform group" action="<?php echo home_url( '/' ); ?>" itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction">
			<meta itemprop="target" content="<?php echo bloginfo('url'); ?>?s={s}"/>
			<div class="input-group">
				<input itemprop="query-input" class="input-group-field" type="text" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="s">
				<input type="submit" class="button" value="Search">
			</div>
		</form>
		</li>
		<?php
		}

		function form( $instance ) {
			if ( isset( $instance[ 'title' ] ) ) {
				$title = $instance[ 'title' ];
			} else {
				$title = __( 'Search', 'son' );
			}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
		}
		function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['SoN_Search'] = $new_instance['SoN_Search'];
			return $instance;
		}
	}

	add_action( 'dashboard_glance_items', 'my_add_cpt_to_dashboard' );
	function my_add_cpt_to_dashboard() {
		$showTaxonomies = 1;
		if ($showTaxonomies) {
			$taxonomies = get_taxonomies( array( '_builtin' => false ), 'objects' );
			foreach ( $taxonomies as $taxonomy ) {
				$num_terms	= wp_count_terms( $taxonomy->name );
				$num = number_format_i18n( $num_terms );
				$text = _n( $taxonomy->labels->singular_name, $taxonomy->labels->name, $num_terms );
				$associated_post_type = $taxonomy->object_type;
				if ( current_user_can( 'manage_categories' ) ) {
					$output = '<a href="edit-tags.php?taxonomy=' . $taxonomy->name . '&post_type=' . $associated_post_type[0] . '">' . $num . ' ' . $text .'</a>';
				}
				echo '<li class="taxonomy-count">' . $output . ' </li>';
			}
		}
		// Custom post types counts
		$post_types = get_post_types( array( '_builtin' => false ), 'objects' );
		foreach ( $post_types as $post_type ) {
			if($post_type->show_in_menu==false) {
				continue;
			}
			$num_posts = wp_count_posts( $post_type->name );
			$num = number_format_i18n( $num_posts->publish );
			$text = _n( $post_type->labels->singular_name, $post_type->labels->name, $num_posts->publish );
			if ( current_user_can( 'edit_posts' ) ) {
				$output = '<a href="edit.php?post_type=' . $post_type->name . '">' . $num . ' ' . $text . '</a>';
			}
			echo '<li class="page-count ' . $post_type->name . '-count">' . $output . '</td>';
		}
	}

	function add_menu_icons_styles(){

		echo '<style>
		#adminmenu #menu-posts-carousel div.wp-menu-image:before, #dashboard_right_now .portfolio-count a:before {
			content: "\f322";
		}
		#adminmenu #menu-posts-people div.wp-menu-image:before, #dashboard_right_now .feedback-count a:before {
			content: "\f175";
		}
		</style>';

	}
	add_action( 'admin_head', 'add_menu_icons_styles' );