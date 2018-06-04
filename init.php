<?php
/*
Plugin Name: WP BASIC CRUD PLUGIN
Description: This is a simple basic Create, Read, Update and Delete (CRUD) plugin for wordpress
Version: 1.0
Author: Jayson P. Leal
Author URI: https://www.linkedin.com/in/jayson-leal/
*/

//this is the function to create the Database					
function employeeDB_options_install() {

    global $wpdb;

    $table_name = $wpdb->prefix . "employee";
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $table_name (
            `id` int(10) NOT NULL,
            `firstname` varchar(100) CHARACTER SET utf8 NOT NULL,
            `middlename` varchar(100) CHARACTER SET utf8 NOT NULL,
            `lastname` varchar(100) CHARACTER SET utf8 NOT NULL,
            `birthday` date NOT NULL,
            `age` int(10) NOT NULL,
            `contact` int(15) NOT NULL,
            `address` varchar(100) CHARACTER SET utf8 NOT NULL,
            PRIMARY KEY (`id`)
          ) $charset_collate; ";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

// will run the install scripts upon plugin activation
register_activation_hook(__FILE__, 'employeeDB_options_install');

// function to add menu items
add_action('admin_menu','employee_record_modifymenu');

// function to add menu items detail
function employee_record_modifymenu() {
	
	//this is the main item for the menu
	add_menu_page('Employee List', //page title
	'Employee List', //menu title
	'manage_options', //capabilities
	'record_employee_list', //menu slug
	'record_employee_list' //function
	);
	
	//this submenu is hidden, however, we need to add it anyways
	//the parent slug of submenu page is the menu slug of the main item of the menu
	add_submenu_page(null, //parent slug
	'Add New Employee', //page title
	'Add New Employee', //menu title
	'manage_options', //capabilities
	'record_employee_create', //menu slug
	'record_employee_create'); //function
	
	//this submenu is hidden, however, we need to add it anyways
	//the parent slug of submenu page is the menu slug of the main item of the menu
	add_submenu_page(null, //parent slug
	'Update Employee Record', //page title
	'Update Employee Record', //menu title
	'manage_options', //capabilities
	'record_employee_update', //menu slug
	'record_employee_update'); //function
}

define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'employee-record-list.php');
require_once(ROOTDIR . 'employee-record-create.php');
require_once(ROOTDIR . 'employee-record-update.php');
