<?php
/**
 * ThemeVan Functions
 * @package VAN Framework
 * @since VAN Framework 1.0
 */
 
/* -----------------------------------------------------------------------------------------------------
Hi,there!
I must emphasize a point that please refrain from editing this file,
or you cannot smooth update in the future.
If you wanna customize your own functions,please add them in custom-functions.php in includes folder.
-------------------------------------------------------------------------------------------------------*/
$VAN=get_option('van');

/*-------------------------------------------------------
* The path to VAN Framework and theme specific functions
-------------------------------------------------------*/
$functions_path = get_template_directory() . '/functions/';
$admin_path = get_template_directory() . '/vanPanel/';
$includes_path = get_template_directory() . '/includes/';

/*The common functions and theme functions*/
require_once($functions_path."common-functions.php");   // Common functions
require_once($includes_path."theme-functions.php");          // Theme functions
require_once($includes_path."theme-init.php");               // Theme initialize

/*Admin functions and Van Panel*/
require_once($functions_path."admin-init.php");    // Admin init
require_once($functions_path."admin-functions.php");    // Admin functions
require_once($functions_path."shortcodes.php");    // Shortcodes
$current_user = wp_get_current_user();
if(is_admin()){require_once($admin_path."van-options.php"); }           // Theme options

require_once($includes_path."custom-functions.php");         // User custom functions
?>