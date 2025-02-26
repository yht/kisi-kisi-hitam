<?php
/**
 *	@package WordPress
 *	@subpackage kisi-kisi-hitam
 */
define("CDNURL", "https://raw.githubusercontent.com/yht/kisi-kisi-hitam/master/");

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Primary - Index',
		'before_widget' => '<div id="%1$s" class="widgetContainer %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgetTitle">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => 'Primary - Post',
		'before_widget' => '<div id="%1$s" class="widgetContainer %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgetTitle">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => 'Secondary - Shared',
		'before_widget' => '<div id="%1$s" class="widgetContainer %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgetTitle">',
		'after_title' => '</h3>'
	));
};

add_filter('comments_template', 'legacy_comments');
	function legacy_comments($file) {
	if(!function_exists('wp_list_comments')) : // WP 2.7-only check
	$file = TEMPLATEPATH . '/legacy.comments.php';
	endif;
	return $file;
};

wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', false, '1', 'all');
wp_register_script('functions', get_template_directory_uri() . '/js/functions.js', array(), '1.0.0',
                   array('strategy'  => 'defer', ) );
?>
