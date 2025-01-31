<?php

// INCLUDE THIS BEFORE you load your ReduxFramework object config file.


// You may replace $redux_opt_name with a string if you wish. If you do so, change loader.php
// as well as all the instances below.
$redux_opt_name = "rd_data";


// Example of how metaboxes can work with custom post types
add_action('init', 'create_post_type');
function create_post_type()
{
    register_post_type('acme_product', array(
        'labels' => array(
            'name' => __('Metaboxes', 'redux-framework-demo'),
            'singular_name' => __('Metabox', 'redux-framework-demo')
        ),
        'public' => true,
        'has_archive' => true
    ));
}


// The loader will load all of the extensions automatically based on your $redux_opt_name
require_once(dirname(__FILE__) . '/loader.php');
