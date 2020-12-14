<?php 

//Enqueue scripts and styles
 
function landy_base_theme_scripts() {

	wp_enqueue_style( 'landy-base-theme-bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css' );
	//wp_enqueue_style( 'landy_base_scss', get_stylesheet_directory_uri() . '/css/style.css' );  
	wp_enqueue_style( 'landy-base-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'landy-base-theme-style', 'rtl', 'replace' );

    wp_enqueue_script( 'landy-base-theme-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'landy-base-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'landy-base-theme-main-js', get_stylesheet_directory_uri() . '/js/main.js', array( 'jquery' ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'landy_base_theme_scripts' );


// ACF Custom Admin Title

function my_layout_title($title, $field, $layout, $i) {
	if($value = get_sub_field('layout_title')) {
		return $value;
	} else {
		foreach($layout['sub_fields'] as $sub) {
			if($sub['name'] == 'layout_title') {
				$key = $sub['key'];
				if(array_key_exists($i, $field['value']) && $value = $field['value'][$i][$key])
					return $value;
			}
		}
	}
	return $title;
}
add_filter('acf/fields/flexible_content/layout_title', 'my_layout_title', 10, 4);


