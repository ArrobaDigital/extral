<?php

// Load translation files from your child theme instead of the parent theme
function my_child_theme_locale() {
    load_child_theme_textdomain( 'extra', get_stylesheet_directory() . '/lang' );
    load_child_theme_textdomain( 'et_builder', get_stylesheet_directory() . '/includes/builder/languages' );
}

add_action( 'after_setup_theme', 'my_child_theme_locale' );


//Initialize the update checker.
require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/ArrobaDigital/extral',
	__FILE__,
	'extral'
);

//Optional: If you're using a private repository, specify the access token like this:
// $myUpdateChecker->setAuthentication('your-token-here');

//Optional: Set the branch that contains the stable release.
// $myUpdateChecker->setBranch('stable-branch-name');

?>