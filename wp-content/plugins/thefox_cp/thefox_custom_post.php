<?php


/*
Plugin Name: TheFox Custom Post
Plugin URI: http://thefoxwp.com/
Description: Plugin that will create a custom post type Portfolio / Staff / Partners for TheFox WordPress Theme.
Version: 3.1.1
Author: Tranmautritam's Team
Author URI: http://themeforest.net/user/tranmautritam
License: GPLv2
*/


// Register custom staff post
add_action('init', 'rd_staff_custom_init');
add_post_type_support( 'post', 'page-attributes' );
add_post_type_support( 'portfolio', 'page-attributes' );
add_post_type_support( 'staff', 'page-attributes' );
add_post_type_support( 'partners', 'page-attributes' );

function rd_staff_custom_init(){

	global $rd_data;
	if(isset($rd_data['rd_staff_slug'])){
		$staff_slug = $rd_data['rd_staff_slug'];
	}
	else {$staff_slug = "staff"; }

    $labels = array(
        'name' => _x('Staff', 'post type general name', 'thefoxwp'),
        'singular_name' => _x('Staff', 'post type singular name', 'thefoxwp'),
        'add_new' => _x('Add New', 'Staff' ,'thefoxwp'),
        'add_new_item' => __('Add New staff member', 'thefoxwp'),
        'edit_item' => __('Edit staff member', 'thefoxwp'),
        'new_item' => __('New staff member', 'thefoxwp'),
        'view_item' => __('View staff member', 'thefoxwp'),
        'search_items' => __('Search staff member', 'thefoxwp'),
        'not_found' => __('No staff member found', 'thefoxwp'),
        'not_found_in_trash' => __('No staff member found in Trash', 'thefoxwp'),
        'parent_item_colon' => '',
        'menu_name' => 'Staff Member'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array("slug" => $staff_slug ,'with_front' => false),
        'menu_position' => 5,
		    'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail')
    );
    register_post_type('Staff', $args);

	  // Initialize New Taxonomy Labels
	  $labels = array(
		'name' => _x( 'Groups', 'taxonomy general name', 'thefoxwp' ),
		'singular_name' => _x( 'Group', 'taxonomy singular name', 'thefoxwp' ),
		'search_items' =>  __( 'Search Groups', 'thefoxwp' ),
		'all_items' => __( 'All Groups', 'thefoxwp' ),
		'parent_item' => __( 'Parent Group', 'thefoxwp' ),
		'parent_item_colon' => __( 'Parent Group:', 'thefoxwp' ),
		'edit_item' => __( 'Edit Groups', 'thefoxwp' ),
		'update_item' => __( 'Update Group', 'thefoxwp' ),
		'add_new_item' => __( 'Add New Group', 'thefoxwp' ),
		'new_item_name' => __( 'New Group Name', 'thefoxwp' ),
	  );

     // Custom taxonomy for Project Tags
     register_taxonomy('staffgroups',array('staff'), array(
		'hierarchical' => true,
		'public' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'staff-group' ),
	  ));

	  // Initialize New Taxonomy Labels
	  $labels = array(
		'name' => _x( 'Filter Categories', 'taxonomy general name', 'thefoxwp' ),
		'singular_name' => _x( 'Filter Category', 'taxonomy singular name', 'thefoxwp' ),
		'search_items' =>  __( 'Search Filter Categories', 'thefoxwp' ),
		'all_items' => __( 'All Filter Categories', 'thefoxwp' ),
		'parent_item' => __( 'Parent Filter Category', 'thefoxwp' ),
		'parent_item_colon' => __( 'Parent Filter Category:', 'thefoxwp' ),
		'edit_item' => __( 'Edit Filter Categories', 'thefoxwp' ),
		'update_item' => __( 'Update Filter Category', 'thefoxwp' ),
		'add_new_item' => __( 'Add Filter Category', 'thefoxwp' ),
		'new_item_name' => __( 'New Filter Category', 'thefoxwp' ),
	  );

     // Custom taxonomy for Project Tags
     register_taxonomy('staffposition',array('staff'), array(
		'hierarchical' => true,
		'public' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'staff-position' ),
	  ));


}



// Register custom sponsor post
add_action('init', 'rd_partners_custom_init');

function rd_partners_custom_init(){
    $labels = array(
        'name' => _x('Partners', 'post type general name', 'thefoxwp'),
        'singular_name' => _x('Partner', 'post type singular name', 'thefoxwp'),
        'add_new' => _x('Add New', 'partner', 'thefoxwp'),
        'add_new_item' => __('Add New Partner', 'thefoxwp'),
        'edit_item' => __('Edit Partner', 'thefoxwp'),
        'new_item' => __('New Partner', 'thefoxwp'),
        'view_item' => __('View Partner', 'thefoxwp'),
        'search_items' => __('Search Partners', 'thefoxwp'),
        'not_found' => __('No partners found', 'thefoxwp'),
        'not_found_in_trash' => __('No partners found in Trash', 'thefoxwp'),
        'parent_item_colon' => '',
        'menu_name' => 'Partners'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array("slug" => "partners" ,'with_front' => false),
        'menu_position' => 5,
        'supports' => array('title','thumbnail')
	);
    register_post_type('partners', $args);

	  // Initialize New Taxonomy Labels
	  $labels = array(
		'name' => _x( 'Groups', 'taxonomy general name', 'thefoxwp' ),
		'singular_name' => _x( 'Group', 'taxonomy singular name', 'thefoxwp' ),
		'search_items' =>  __( 'Search Groups', 'thefoxwp' ),
		'all_items' => __( 'All Groups', 'thefoxwp' ),
		'parent_item' => __( 'Parent Group', 'thefoxwp' ),
		'parent_item_colon' => __( 'Parent Group:', 'thefoxwp' ),
		'edit_item' => __( 'Edit Groups', 'thefoxwp' ),
		'update_item' => __( 'Update Group', 'thefoxwp' ),
		'add_new_item' => __( 'Add New Group', 'thefoxwp' ),
		'new_item_name' => __( 'New Group Name', 'thefoxwp' ),
	  );

     // Custom taxonomy for Project Tags
     register_taxonomy('groups',array('partners'), array(
		'hierarchical' => true,
		'public' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'partners-group' ),
	  ));
	}


	// Custom Messages - rd_project_updated_messages
	add_filter('post_updated_messages', 'rd_partner_updated_messages');

	function rd_partner_updated_messages( $messages ) {
	  global $post, $post_ID;
	  $messages['partners'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Partner updated. <a href="%s">View partner</a>','thefoxwp'), esc_url( get_permalink($post_ID) ) ),
		2 => __('Custom field updated.','thefoxwp'),
		3 => __('Custom field deleted.','thefoxwp'),
		4 => __('Partner updated.','thefoxwp'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Partner restored to revision from %s','thefoxwp'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Partner published. <a href="%s">View partner</a>','thefoxwp'), esc_url( get_permalink($post_ID) ) ),
		7 => __('Partner saved.','thefoxwp'),
		8 => sprintf( __('Partner submitted. <a target="_blank" href="%s">Preview partner</a>','thefoxwp'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		9 => sprintf( __('Partner scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview partner</a>','thefoxwp'),
		// translators: Publish box date format, see http://php.net/date
		  date_i18n( __( 'M j, Y @ G:i' ,'thefoxwp'), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
		10 => sprintf( __('Partner draft updated. <a target="_blank" href="%s">Preview partner</a>','thefoxwp'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	  );
	  return $messages;
	}

	/*--- #end SECTION - rd_project_updated_messages ---*/
	/*--- Portfolio tags meta box ---*/

	add_action('admin_init','rd_partners_meta_init');

	function rd_partners_meta_init()
	{
		// add a meta box for wordpress 'project' type
		add_meta_box('partners_meta', 'Project Infos', 'rd_partners_meta_setup', 'Group', 'side', 'low');
		// add a callback function to save any data a user enters in
		add_action('save_post','rd_partners_meta_save');
	}

	function rd_partners_meta_setup(){
		global $post;
		?>
	  	<div class="partners_meta_control">
	    <label>URL</label>
	    <p>
	      <input type="text" name="_url" value="<?php echo get_post_meta($post->ID,'_url',TRUE); ?>" style="width: 100%;" />
	    </p>
	  </div>
	  <?php
		// create for validation
			echo '<input type="hidden" name="meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
		}

	function rd_partners_meta_save($post_id)
	{
		// check nonce
		if (!isset($_POST['meta_noncename']) || !wp_verify_nonce($_POST['meta_noncename'], __FILE__)) {
		return $post_id;
		}
		// check capabilities
		if ('post' == $_POST['post_type']) {
		if (!current_user_can('edit_post', $post_id)) {
		return $post_id;
		}
		} elseif (!current_user_can('edit_page', $post_id)) {
		return $post_id;
		}
		// exit on autosave
		if (defined('DOING_AUTOSAVE') == DOING_AUTOSAVE) {
		return $post_id;
		}
		if(isset($_POST['_url']))
		{
			update_post_meta($post_id, '_url', $_POST['_url']);

		} else {
			delete_post_meta($post_id, '_url');
		}
	}


// Register custom portfolio post
add_action('init', 'rd_portfolio_custom_init');

function rd_portfolio_custom_init(){

	global $rd_data;
	if(isset($rd_data['rd_port_slug'])){
		$port_slug = $rd_data['rd_port_slug'];
	}
	else {$port_slug = "project"; }


	$labels = array(
		'name' => _x('Portfolio', 'post type general name', 'thefoxwp'),
		'singular_name' => _x('Project', 'post type singular name', 'thefoxwp'),
		'add_new' => _x('Add New', 'Project', 'thefoxwp'),
		'add_new_item' => __('Add New Project', 'thefoxwp'),
		'edit_item' => __('Edit Project', 'thefoxwp'),
		'new_item' => __('New Project', 'thefoxwp'),
		'view_item' => __('View Project', 'thefoxwp'),
		'search_items' => __('Search Projects', 'thefoxwp'),
		'not_found' =>  __('No projects found', 'thefoxwp'),
		'not_found_in_trash' => __('No projects found in Trash', 'thefoxwp'),
		'parent_item_colon' => '',
		'menu_name' => 'Portfolio'
	  );

	 $args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array ("slug" => $port_slug ,'with_front' => false),
		'menu_position' => 5,
    'show_in_rest' => true,
		'supports' => array('title','editor','thumbnail','comments')
	  );
	  register_post_type('portfolio',$args);

	  // Initialize New Taxonomy Labels
	  $labels = array(
		'name' => _x( 'Category', 'Category general name', 'thefoxwp' ),
		'singular_name' => _x( 'Category', 'taxonomy singular name', 'thefoxwp' ),
		'search_items' =>  __( 'Search Category', 'thefoxwp' ),
		'all_items' => __( 'All Categories', 'thefoxwp' ),
		'parent_item' => __( 'Parent Category', 'thefoxwp' ),
		'parent_item_colon' => __( 'Parent Category:', 'thefoxwp' ),
		'edit_item' => __( 'Edit Category', 'thefoxwp' ),
		'update_item' => __( 'Update Category', 'thefoxwp' ),
		'add_new_item' => __( 'Add New Category', 'thefoxwp' ),
		'new_item_name' => __( 'New Category Name', 'thefoxwp' ),
	  );

     // Custom taxonomy for Project Tags
     register_taxonomy('catportfolio',array('portfolio'), array(
		'hierarchical' => true,
		'public' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'cat-portifolio' ),
	  ));


	  // Initialize New Taxonomy Labels
	  $labels = array(
		'name' => _x( 'Tags', 'taxonomy general name', 'thefoxwp' ),
		'singular_name' => _x( 'Tag', 'taxonomy singular name', 'thefoxwp' ),
		'search_items' =>  __( 'Search Types', 'thefoxwp' ),
		'all_items' => __( 'All Tags', 'thefoxwp' ),
		'parent_item' => __( 'Parent Tag', 'thefoxwp' ),
		'parent_item_colon' => __( 'Parent Tag:', 'thefoxwp' ),
		'edit_item' => __( 'Edit Tags', 'thefoxwp' ),
		'update_item' => __( 'Update Tag', 'thefoxwp' ),
		'add_new_item' => __( 'Add New Tag', 'thefoxwp' ),
		'new_item_name' => __( 'New Tag Name', 'thefoxwp' ),
	  );

     // Custom taxonomy for Project Tags
     register_taxonomy('tagportfolio',array('portfolio'), array(
		'hierarchical' => true,
		'public' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'tag-portifolio' ),
	  ));
	}


	// Custom Messages - rd_project_updated_messages
	add_filter('post_updated_messages', 'rd_project_updated_messages');

	function rd_project_updated_messages( $messages ) {
	  global $post, $post_ID;
	  $messages['project'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Project updated. <a href="%s">View project</a>','thefoxwp'), esc_url( get_permalink($post_ID) ) ),
		2 => __('Custom field updated.','thefoxwp'),
		3 => __('Custom field deleted.','thefoxwp'),
		4 => __('Project updated.','thefoxwp'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Project restored to revision from %s','thefoxwp'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Project published. <a href="%s">View project</a>','thefoxwp'), esc_url( get_permalink($post_ID) ) ),
		7 => __('Project saved.','thefoxwp'),
		8 => sprintf( __('Project submitted. <a target="_blank" href="%s">Preview project</a>','thefoxwp'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		9 => sprintf( __('Project scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview project</a>','thefoxwp'),
		// translators: Publish box date format, see http://php.net/date
		  date_i18n( __( 'M j, Y @ G:i' ,'thefoxwp'), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
		10 => sprintf( __('Project draft updated. <a target="_blank" href="%s">Preview project</a>','thefoxwp'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	  );
	  return $messages;
	}

	/*--- #end SECTION - rd_project_updated_messages ---*/
	/*--- Portfolio tags meta box ---*/

	add_action('admin_init','rd_portfolio_meta_init');

	function rd_portfolio_meta_init()
	{
		// add a meta box for wordpress 'project' type
		add_meta_box('portfolio_meta', 'Project Infos', 'rd_portfolio_meta_setup', 'project', 'side', 'low');
		// add a callback function to save any data a user enters in
		add_action('save_post','rd_portfolio_meta_save');
	}

	function rd_portfolio_meta_setup(){
		global $post;
		?>
	  	<div class="portfolio_meta_control">
	    <label>URL</label>
	    <p>
	      <input type="text" name="_url" value="<?php echo get_post_meta($post->ID,'_url',TRUE); ?>" style="width: 100%;" />
	    </p>
	  </div>
	  <?php
		// create for validation
			echo '<input type="hidden" name="meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
		}

	function rd_portfolio_meta_save($post_id)
	{
		// check nonce
		if (!isset($_POST['meta_noncename']) || !wp_verify_nonce($_POST['meta_noncename'], __FILE__)) {
		return $post_id;
		}
		// check capabilities
		if ('post' == $_POST['post_type']) {
		if (!current_user_can('edit_post', $post_id)) {
		return $post_id;
		}
		} elseif (!current_user_can('edit_page', $post_id)) {
		return $post_id;
		}
		// exit on autosave
		if (defined('DOING_AUTOSAVE') == DOING_AUTOSAVE) {
		return $post_id;
		}
		if(isset($_POST['_url']))
		{
			update_post_meta($post_id, '_url', $_POST['_url']);

		} else {
			delete_post_meta($post_id, '_url');
		}
	}



/**

 * Register the price table post type

 */

function siteorigin_pricetable_register(){

	register_post_type('pricetable',array(

		'labels' => array(

			'name' => __('Price Tables', 'thefoxwp'),

			'singular_name' => __('Price Table', 'thefoxwp'),

			'add_new' => __('Add New', 'book', 'thefoxwp'),

			'add_new_item' => __('Add New Price Table', 'thefoxwp'),

			'edit_item' => __('Edit Price Table', 'thefoxwp'),

			'new_item' => __('New Price Table', 'thefoxwp'),

			'all_items' => __('All Price Tables', 'thefoxwp'),

			'view_item' => __('View Price Table', 'thefoxwp'),

			'search_items' => __('Search Price Tables', 'thefoxwp'),

			'not_found' =>  __('No Price Tables found', 'thefoxwp'),

		),

		'public' => true,

		'has_archive' => false,

		'supports' => array( 'title', 'revisions', 'thumbnail',),

		'menu_icon' => get_template_directory_uri().'/includes/pricetable/images/icon.png', __FILE__

	));

}

add_action( 'init', 'siteorigin_pricetable_register');


add_action( 'after_setup_theme', 'siteorigin_pricetable_register' );
add_action( 'after_setup_theme', 'rd_portfolio_custom_init' );
add_action('after_setup_theme', 'rd_partners_custom_init');
add_action('after_setup_theme', 'rd_staff_custom_init');


if ( ! class_exists( 'Simple_Page_Ordering' ) ) :

	class Simple_Page_Ordering {

		/**
		 * Handles initializing this class and returning the singleton instance after it's been cached.
		 *
		 * @return null|Simple_page_Ordering
		 */
		public static function get_instance() {
			// Store the instance locally to avoid private static replication
			static $instance = null;

			if ( null === $instance ) {
				$instance = new self();
				self::_add_actions();
			}

			return $instance;
		}

		/**
		 * An empty constructor
		 *
		 * Purposely do nothing here
		 */
		public function __construct() {}

		/**
		 * Handles registering hooks that initialize this plugin.
		 */
		public static function _add_actions() {
			add_action( 'load-edit.php', array( __CLASS__, 'load_edit_screen' ) );
			add_action( 'wp_ajax_simple_page_ordering', array( __CLASS__, 'ajax_simple_page_ordering' ) );
			add_action( 'plugins_loaded', array( __CLASS__, 'load_textdomain' ) );
		}

		/**
		 * Loads the plugin textdomain
		 */
		public static function load_textdomain() {
			load_plugin_textdomain( 'simple-page-ordering', false, dirname( plugin_basename( __FILE__ ) ) . '/localization/' );
		}

		/**
		 * Load up page ordering scripts for the edit screen
		 */
		public static function load_edit_screen() {
			$screen    = get_current_screen();
			$post_type = $screen->post_type;

			// is post type sortable?
			$sortable = ( post_type_supports( $post_type, 'page-attributes' ) || is_post_type_hierarchical( $post_type ) );        // check permission
			if ( ! $sortable = apply_filters( 'simple_page_ordering_is_sortable', $sortable, $post_type ) ) {
				return;
			}

			// does user have the right to manage these post objects?
			if ( ! self::check_edit_others_caps( $post_type ) ) {
				return;
			}

			add_filter( 'views_' . $screen->id, array(
				__CLASS__,
				'sort_by_order_link',
			) );        // add view by menu order to views
			add_action( 'wp', array( __CLASS__, 'wp' ) );
			add_action( 'admin_head', array( __CLASS__, 'admin_head' ) );
		}

		/**
		 * when we load up our posts query, if we're actually sorting by menu order, initialize sorting scripts
		 */
		public static function wp() {
			$orderby = get_query_var( 'orderby' );
			if ( ( is_string( $orderby ) && 0 === strpos( $orderby, 'menu_order' ) ) || ( isset( $orderby['menu_order'] ) && 'ASC' === $orderby['menu_order'] ) ) {
				$script_name = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/assets/js/src/simple-page-ordering.js' : '/assets/js/simple-page-ordering.min.js';
				wp_enqueue_script( 'simple-page-ordering', plugins_url( $script_name, __FILE__ ), array( 'jquery-ui-sortable' ), '2.1', true );
				wp_enqueue_style( 'simple-page-ordering', plugins_url( '/assets/css/simple-page-ordering.css', __FILE__ ) );
			}
		}

		/**
		 * Add page ordering help to the help tab
		 */
		public static function admin_head() {
			$screen = get_current_screen();
			$screen->add_help_tab( array(
				'id'      => 'simple_page_ordering_help_tab',
				'title'   => 'Simple Page Ordering',
				'content' => '<p>' . __( 'To reposition an item, simply drag and drop the row by "clicking and holding" it anywhere (outside of the links and form controls) and moving it to its new position.', 'simple-page-ordering' ) . '</p>',
			) );
		}

		public static function ajax_simple_page_ordering() {
			// check and make sure we have what we need
			if ( empty( $_POST['id'] ) || ( ! isset( $_POST['previd'] ) && ! isset( $_POST['nextid'] ) ) ) {
				die( - 1 );
			}

			// real post?
			if ( ! $post = get_post( $_POST['id'] ) ) {
				die( - 1 );
			}

			// does user have the right to manage these post objects?
			if ( ! self::check_edit_others_caps( $post->post_type ) ) {
				die( - 1 );
			}

			// badly written plug-in hooks for save post can break things
			if ( ! defined( 'WP_DEBUG' ) || ! WP_DEBUG ) {
				error_reporting( 0 );
			}

			global $wp_version;

			$previd   = empty( $_POST['previd'] ) ? false : (int) $_POST['previd'];
			$nextid   = empty( $_POST['nextid'] ) ? false : (int) $_POST['nextid'];
			$start    = empty( $_POST['start'] ) ? 1 : (int) $_POST['start'];
			$excluded = empty( $_POST['excluded'] ) ? array( $post->ID ) : array_filter( (array) json_decode( $_POST['excluded'] ), 'intval' );

			$new_pos     = array(); // store new positions for ajax
			$return_data = new stdClass;

			do_action( 'simple_page_ordering_pre_order_posts', $post, $start );

			// attempt to get the intended parent... if either sibling has a matching parent ID, use that
			$parent_id        = $post->post_parent;
			$next_post_parent = $nextid ? wp_get_post_parent_id( $nextid ) : false;
			if ( $previd == $next_post_parent ) {    // if the preceding post is the parent of the next post, move it inside
				$parent_id = $next_post_parent;
			} elseif ( $next_post_parent !== $parent_id ) {  // otherwise, if the next post's parent isn't the same as our parent, we need to study
				$prev_post_parent = $previd ? wp_get_post_parent_id( $previd ) : false;
				if ( $prev_post_parent !== $parent_id ) {    // if the previous post is not our parent now, make it so!
					$parent_id = ( false !== $prev_post_parent ) ? $prev_post_parent : $next_post_parent;
				}
			}
			// if the next post's parent isn't our parent, it might as well be false (irrelevant to our query)
			if ( $next_post_parent !== $parent_id ) {
				$nextid = false;
			}

			$max_sortable_posts = (int) apply_filters( 'simple_page_ordering_limit', 50 );    // should reliably be able to do about 50 at a time
			if ( $max_sortable_posts < 5 ) {    // don't be ridiculous!
				$max_sortable_posts = 50;
			}

			// we need to handle all post stati, except trash (in case of custom stati)
			$post_stati = get_post_stati( array(
				'show_in_admin_all_list' => true,
			) );

			$siblings_query = array(
				'depth'                  => 1,
				'posts_per_page'         => $max_sortable_posts,
				'post_type'              => $post->post_type,
				'post_status'            => $post_stati,
				'post_parent'            => $parent_id,
				'orderby'                => array(
					'menu_order' => 'ASC',
					'title'      => 'ASC',
				),
				'post__not_in'           => $excluded,
				'update_post_term_cache' => false,
				'update_post_meta_cache' => false,
				'suppress_filters'       => true,
				'ignore_sticky_posts'    => true,
			);
			if ( version_compare( $wp_version, '4.0', '<' ) ) {
				$siblings_query['orderby'] = 'menu_order title';
				$siblings_query['order']   = 'ASC';
			}
			$siblings = new WP_Query( $siblings_query ); // fetch all the siblings (relative ordering)

			// don't waste overhead of revisions on a menu order change (especially since they can't *all* be rolled back at once)
			remove_action( 'pre_post_update', 'wp_save_post_revision' );

			foreach ( $siblings->posts as $sibling ) :

				// don't handle the actual post
				if ( $sibling->ID === $post->ID ) {
					continue;
				}

				// if this is the post that comes after our repositioned post, set our repositioned post position and increment menu order
				if ( $nextid === $sibling->ID ) {
					wp_update_post( array(
						'ID'          => $post->ID,
						'menu_order'  => $start,
						'post_parent' => $parent_id,
					) );
					$ancestors            = get_post_ancestors( $post->ID );
					$new_pos[ $post->ID ] = array(
						'menu_order'  => $start,
						'post_parent' => $parent_id,
						'depth'       => count( $ancestors ),
					);
					$start ++;
				}

				// if repositioned post has been set, and new items are already in the right order, we can stop
				if ( isset( $new_pos[ $post->ID ] ) && $sibling->menu_order >= $start ) {
					$return_data->next = false;
					break;
				}

				// set the menu order of the current sibling and increment the menu order
				if ( $sibling->menu_order != $start ) {
					wp_update_post( array(
						'ID'         => $sibling->ID,
						'menu_order' => $start,
					) );
				}
				$new_pos[ $sibling->ID ] = $start;
				$start ++;

				if ( ! $nextid && $previd == $sibling->ID ) {
					wp_update_post( array(
						'ID'          => $post->ID,
						'menu_order'  => $start,
						'post_parent' => $parent_id,
					) );
					$ancestors            = get_post_ancestors( $post->ID );
					$new_pos[ $post->ID ] = array(
						'menu_order'  => $start,
						'post_parent' => $parent_id,
						'depth'       => count( $ancestors ),
					);
					$start ++;
				}

			endforeach;

			// max per request
			if ( ! isset( $return_data->next ) && $siblings->max_num_pages > 1 ) {
				$return_data->next = array(
					'id'       => $post->ID,
					'previd'   => $previd,
					'nextid'   => $nextid,
					'start'    => $start,
					'excluded' => array_merge( array_keys( $new_pos ), $excluded ),
				);
			} else {
				$return_data->next = false;
			}

			do_action( 'simple_page_ordering_ordered_posts', $post, $new_pos );

			if ( ! $return_data->next ) {
				// if the moved post has children, we need to refresh the page (unless we're continuing)
				$children = new WP_Query(
					array(
						'posts_per_page'         => 1,
						'post_type'              => $post->post_type,
						'post_status'            => $post_stati,
						'post_parent'            => $post->ID,
						'fields'                 => 'ids',
						'update_post_term_cache' => false,
						'update_post_meta_cache' => false,
						'ignore_sticky'          => true,
						'no_found_rows'          => true,
					)
				);

				if ( $children->have_posts() ) {
					die( 'children' );
				}
			}

			$return_data->new_pos = $new_pos;
			die( json_encode( $return_data ) );
		}

		/**
		 * Append a sort by order link to the post actions
		 *
		 * @param array $views
		 *
		 * @return array
		 */
		public static function sort_by_order_link( $views ) {
			$class        = ( get_query_var( 'orderby' ) == 'menu_order title' ) ? 'current' : '';
			$query_string = remove_query_arg( array( 'orderby', 'order' ) );
			if ( ! is_post_type_hierarchical( get_post_type() ) ) {
				$query_string = add_query_arg( 'orderby', 'menu_order title', $query_string );
				$query_string = add_query_arg( 'order', 'asc', $query_string );
			}
			$views['byorder'] = sprintf( '<a href="%s" class="%s">%s</a>', esc_url( $query_string ), $class, __( 'Sort by Order', 'simple-page-ordering' ) );

			return $views;
		}

		/**
		 * Checks to see if the current user has the capability to "edit others" for a post type
		 *
		 * @param string $post_type Post type name
		 *
		 * @return bool True or false
		 */
		private static function check_edit_others_caps( $post_type ) {
			$post_type_object = get_post_type_object( $post_type );
			$edit_others_cap  = empty( $post_type_object ) ? 'edit_others_' . $post_type . 's' : $post_type_object->cap->edit_others_posts;

			return apply_filters( 'simple_page_ordering_edit_rights', current_user_can( $edit_others_cap ), $post_type );
		}
	}

	Simple_Page_Ordering::get_instance();

endif;
