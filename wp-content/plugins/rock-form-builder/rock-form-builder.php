<?php
/*
Plugin Name: Rock Form Builder
Plugin URI: http://rockthemes.net
Description: Rock Form Builder is a powerful form builder plugin. You can make your own forms by using our drag-n-drop interface.
Version: 2.0
Author: Rockthemes
Author URI: http://themeforest.net/user/XanderRock
License: CC BY-NC-ND 3.0
License URI: http://creativecommons.org/licenses/by-nc-nd/3.0/

THE WORK (AS DEFINED BELOW) IS PROVIDED UNDER THE TERMS OF THIS CREATIVE COMMONS PUBLIC LICENSE ("CCPL" OR "LICENSE"). 
THE WORK IS PROTECTED BY COPYRIGHT AND/OR OTHER APPLICABLE LAW. ANY USE OF THE WORK OTHER THAN AS AUTHORIZED UNDER 
THIS LICENSE OR COPYRIGHT LAW IS PROHIBITED.

BY EXERCISING ANY RIGHTS TO THE WORK PROVIDED HERE, YOU ACCEPT AND AGREE TO BE BOUND BY THE TERMS OF THIS LICENSE. 
TO THE EXTENT THIS LICENSE MAY BE CONSIDERED TO BE A CONTRACT, THE LICENSOR GRANTS YOU THE RIGHTS CONTAINED HERE IN 
CONSIDERATION OF YOUR ACCEPTANCE OF SUCH TERMS AND CONDITIONS.
*/

/*
**
**	Rock Form Builder will be named as "RFB" in constants
**
**	Rock Form Builder will be named as "rockthemes_fb_" before functions
**
*/




/*
**	Define Constants
**
**	Constants will be used for variable that will not be changing.
*/


/*	Default URL of the plugin */
define('RFB_URI',plugins_url('',(__FILE__)));

/*	Default URL of the plugin */
define('RFB_DIR',plugin_dir_path(__FILE__));

/*	Check if we use rockthemes themes for style and compatibility	*/
define('ROCKTHEMES_THEME_ACTIVE', get_option('rockthemes_theme_active',false));

if(!defined('RFB_DEBUG')):
/*	Is developer mode on*/
	define('RFB_DEBUG',true);
endif;


/*
**	Global variables
*/
$rock_form_builder_options = array(
	'user_can'				=>	'manage_options',
);



/*
**	Include required files
**	
**	$rfb_prefix 		:	rock_form_builder_;	For inside functions
**	$rfb_file_prefix	:	rock-form-builder-;	For files
*/
$rfb_prefix			=	'rock_form_builder_';
$rfb_file_prefix 	=	'rock-form-builder-';

//An array to hold every file name without prefix
$file_names = array(
	'admin-ui',
	'import-export',
	'general-settings',
	'predefined-lists',
	'frontend',
	'functions',
);

/*Include Files*/
foreach($file_names as $file){
	include(RFB_DIR.'libs/'.$rfb_file_prefix.$file.'.php');	
}


?>