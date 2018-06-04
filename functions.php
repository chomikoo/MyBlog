<?php
$functions_path = get_template_directory() . '/functions/';

require $functions_path . 'functions-cleanup.php';
require $functions_path . 'functions-admin.php' ;

require $functions_path . 'functions-enqueue.php' ;
require $functions_path . 'theme-support.php' ;


require $functions_path . 'functions-cpt.php' ;
require $functions_path . 'functions-base.php' ;
require $functions_path . 'functions-menus.php' ;
// require $functions_path . 'functions-widgets.php' ;
// require $functions_path . 'functions-shortcodes.php' ;
// require $functions_path . 'functions-assets.php' ;
// require $functions_path . 'functions-mylib.php' ;

// vendors

require $functions_path . 'vendors/class-wp-bootstrap-navwalker.php' ;

