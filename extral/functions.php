<?php

// Load translation files from your child theme instead of the parent theme
function my_child_theme_locale() {
    load_child_theme_textdomain( 'extra', get_stylesheet_directory() . '/lang' );
    load_child_theme_textdomain( 'et_builder', get_stylesheet_directory() . '/includes/builder/languages' );
}

add_action( 'after_setup_theme', 'my_child_theme_locale' );


//Initialize the update checker.
require 'theme-updates/theme-update-checker.php';
$example_update_checker = new ThemeUpdateChecker(
    'extral',
    'http://extral.arroba.digital/info.json'
);

//Override offset load image script as shown in https://www.elegantthemes.com/forum/viewtopic.php?f=191&t=563097&hilit=image+animation+late&start=10

function override_parent() {
	add_action('wp_enqueue_scripts','override_js');
}
	add_action ('after_setup_theme','override_parent');
function override_js() {
	wp_dequeue_script( 'et-builder-modules-script' );
	wp_enqueue_script( 'et-builder-modules-script', get_stylesheet_directory_uri() . '/scripts/scripts.min.js', array( 'jquery' ), $theme_version, true );
}

?>