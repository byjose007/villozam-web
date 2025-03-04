<?php

    /**
     * For full documentation, please visit: http://docs.reduxframework.com/
     * For a more extensive sample-config file, you may look at:
     * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
    // This is your option name where all the Redux data is stored.
    $opt_name = "rd_data";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name' => 'rd_data',
        'use_cdn' => TRUE,
        'display_name' => 'TheFox',
        'display_version' => false,
        'page_slug' => 'TheFox_options',
        'page_title' => 'TheFox Options Panel',
        'save_defaults' => true,
        'update_notice' => true,
        'footer_text' => '<p>Don\'t forget to save</p>',
        'admin_bar' => TRUE,
        'menu_type' => 'submenu',
        'page_parent' => 'thefox-dashboard',
        'menu_title' => 'Options',
        'menu_icon' => ReduxFramework::$_url.'assets/img/thefox_menu.png',
        'allow_sub_menu' => true,
        'page_priority' => '1',
        'page_parent_post_type' => 'your_post_type',
        'customizer' => true,
        'default_mark' => '*',
        'class' => 'rd_theme_options_panel',
        'hints' =>
        array(
          'icon' => 'el-icon-question-sign',
          'icon_position' => 'right',
          'icon_size' => 'normal',
          'tip_style' =>
          array(
            'color' => 'light',
          ),
          'tip_position' =>
          array(
            'my' => 'top left',
            'at' => 'bottom right',
          ),
          'tip_effect' =>
          array(
            'show' =>
            array(
              'duration' => '500',
              'event' => 'mouseover',
            ),
            'hide' =>
            array(
              'duration' => '500',
              'event' => 'mouseleave unfocus',
            ),
          ),
        ),
        'output' => true,
        'output_tag' => true,
        'settings_api' => TRUE,
        'cdn_check_time' => '1440',
        'compiler' => true,
        'global_variable' => 'rd_data',
        'page_permissions' => 'manage_options',
        'show_import_export' => true,
        'database' => 'options',
        'transient_time' => '3600',
        'network_sites' => true,
      );
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$whitelist = array( '127.0.0.1', '::1' );
update_option( 'thefox_version', 3);
if(strpos($url,'staging') !== false || strpos($url,'temp') !== false || strpos($url,'dev') !== false || strpos($url,'www2') !== false || strpos($url,'development') !== false || strpos($url,'datasenter') !== false) {
  $staging_env = "is_staging";
  update_option( 'enable_full_version', 1);
}else{
  $staging_env = "is_live";
}
if(in_array( $_SERVER['REMOTE_ADDR'], $whitelist)){
  update_option( 'enable_full_version', 1);
}
function wpbs_check_status(){
  if (get_option( 'enable_full_version' )) {
    return true;
  }
}

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/tranmautritam.designer?_rdr',
        'title' => 'Like us on Facebook',
        'icon'  => 'el-icon-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'https://twitter.com/tranmautritam',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el-icon-twitter'
    );
    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'thefoxwp' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'thefoxwp' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'thefoxwp' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'thefoxwp' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'thefoxwp' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */



Redux::setSection( $opt_name, array(
                'title'     => __('General Settings', 'thefoxwp'),
                'class'      => 'redux-sm-p',
                'desc'      => __('Welcome to TheFox theme options panel! Have fun customizing the theme!', 'thefoxwp'),
                'icon'      => 'el-icon-edit',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields'    => array(


                    array(
                        'id'        => 'rd_logo',
                        'type'      => 'media',
						'url'      => true,
                        'title'     => __('Dark Logo upload', 'thefoxwp'),
                        'desc'      => __('Dark Logo', 'thefoxwp'),
                        'subtitle'  => __('Use big logo for retina ready display', 'thefoxwp'),
						'default'  => array(
							'url'=>''
					    ),
                    ),
                    array(
                        'id'        => 'rd_white_logo',
                        'type'      => 'media',
						'url'      => true,
                        'title'     => __('Light Logo upload', 'thefoxwp'),
                        'desc'      => __('Upload a logo that will be use when the header is transparent', 'thefoxwp'),
                        'subtitle'  => __('Will be use when transparent header', 'thefoxwp'),
						'default'  => array(
							'url'=>''
					    ),
                    ),
                    array(
                        'id'        => 'rd_logo_width',
                        'type'      => 'text',
                        'title'     => __('Logo width', 'thefoxwp'),
                        'subtitle'  => __('Don\'t include "px" in the string. e.g. 150', 'thefoxwp'),
                        'desc'      => __('Set your logo size, ', 'thefoxwp'),
                        'validate'  => 'numeric',
                        'default'   => '155',
                    ),
					array(
                        'id'        => 'rd_mobile_logo',
                        'type'      => 'media',
						'url'      => true,
                        'title'     => __('Mobile Dark Logo upload', 'thefoxwp'),
                        'desc'      => __('Mobile Dark Logo', 'thefoxwp'),
                        'subtitle'  => __('If you want to use a different logo when view from Tablet or Mobile ( optional )', 'thefoxwp'),
						'default'  => array(
							'url'=>''
					    ),
                    ),
                    array(
                        'id'        => 'rd_mobile_white_logo',
                        'type'      => 'media',
						'url'      => true,
                        'title'     => __('Mobile Light Logo upload', 'thefoxwp'),
                        'desc'      => __('Mobile Light Logo (used when transparent header)', 'thefoxwp'),
                        'subtitle'  => __('If you want to use a different logo when view from Tablet or Mobile ( optional )', 'thefoxwp'),
						'default'  => array(
							'url'=>''
					    ),
                    ),
                    array(
                        'id'        => 'rd_custom_favicon',
                        'type'      => 'media',
						'url'      => true,
                        'title'     => __('Favicon upload', 'thefoxwp'),
                        'desc'      => __('upload favicon', 'thefoxwp'),
                        'subtitle'  => __('Upload a 32px x 32px Png/Gif/Ico image that will represent your website\'s favicon.', 'thefoxwp'),
						'default'  => array(
							'url'=>'http://thefoxwp.com/wp-content/uploads/2015/03/favicon2.png'
					    ),
                    ),
                    array(
                        'id'        => 'rd_responsive',
                        'type'      => 'switch',
                        'title'     => __('Enable Responsive Design', 'thefoxwp'),
                        'subtitle'  => __('This adjusts the layout of the website depending on the screen size/device.', 'thefoxwp'),
                        'default'   => true,
                    ),
                    array(
                        'id'        => 'rd_smooth_scroll',
                        'type'      => 'switch',
                        'title'     => __('Smooth Scrolling', 'thefoxwp'),
                        'subtitle'  => __('Toggle whether or not to enable the smooth scrolling effect.', 'thefoxwp'),
                        'default'   => true,
                    ),
                    array(
                        'id'        => 'rd_tnfly',
                        'type'      => 'switch',
                        'title'     => __('Enable On fly thumbnail generation', 'thefoxwp'),
                        'subtitle'  => __('Disable if you have trouble loading medias.', 'thefoxwp'),
                        'default'   => true,
                    ),
                    array(
                        'id'        => 'rd_feedburner',
                        'type'      => 'text',
                        'title'     => __('FeedBurner URL', 'thefoxwp'),
                        'subtitle'  => __('Enter your full FeedBurner URL (or any other preferred feed URL) if you wish to use FeedBurner over the standard WordPress Feed e.g. http://feeds.feedburner.com/yoururlhere', 'thefoxwp'),
                        'desc'      => __('This is must be an url.', 'thefoxwp'),
                        'validate'  => 'url',
                        'default'   => '',
                        'text_hint' => array(
                           'title'     => '',
                           'content'   => 'Please enter a valid <strong>URL</strong> in this field.'
                       )
                    ),

          array(
            'id'        => 'rd_block_editor',
            'type'      => 'button_set',
            'title'     => __('Use Block editor instead of WordPress Widgets?', 'thefoxwp'),
            'subtitle'  => __('Select yes If you want to use the new block editor or use the default widgets.', 'thefoxwp'),
            'options' => array(
              'yes' =>  __('Yes', 'thefoxwp'),
              'no' =>  __('No', 'thefoxwp'),
            ),
            'default' => 'no'
          ),

                ),
            ));


            Redux::setSection( $opt_name, array(
                'icon'      => 'el-icon-edit',
                'title'     => __('Styling Options', 'thefoxwp'),
                'class'      => 'redux-sm-p',
                'fields'    => array(


                    array(
                        'id'        => 'rd_boxed',
                        'type'      => 'switch',
                        'title'     => __('Enable Boxed layout?', 'thefoxwp'),
                        'subtitle'  => __('Turn on to use boxed layout.', 'thefoxwp'),
                        'default'   => false,
                    ),
                    array(
                        'id'        => 'rd_topmargin',
                        'type'      => 'text',
                        'required'  => array('rd_boxed', '=', '1'),
                        'title'     => __('Boxed layout margin', 'thefoxwp'),
                        'subtitle'  => __('Set the margin for the boxed layout. e.g. 60', 'thefoxwp'),
                        'desc'      => __('Optional. ', 'thefoxwp'),
                        'validate'  => 'numeric',
                        'default'   => '0',
                    ),
                    array(
                        'id'        => 'rd_background',
                        'type'      => 'background',
                        'required'  => array('rd_boxed', '=', '1'),
                        'output'    => array('body'),
                        'title'     => __('Body Background', 'thefoxwp'),
                        'subtitle'  => __('Select the Body background color or Image.', 'thefoxwp'),
                        'default'   => '#34495e',
                    ),
                    array(
                        'id'        => 'rd_custom_css',
                        'type'      => 'ace_editor',
                        'title'     => __('Custom CSS', 'thefoxwp'),
                        'subtitle'  => __('Paste your CSS code here.', 'thefoxwp'),
                        'mode'      => 'css',
                        'theme'     => 'monokai',
                        'desc'      => '',
                        'default'   => ""
                    ),


                )
            ));


			 Redux::setSection( $opt_name, array(
                'icon'      => 'el-icon-cog',
                'title'     => __('Color Preset', 'thefoxwp'),
                'class'      => 'redux-sm-p',
                'fields'    => array(


              array(
			    'id'       => 'opt-presets-color',
			    'type'     => 'image_select',
			    'presets'  => true,
			    'title'    => __('Color Preset', 'thefoxwp'),
			    'subtitle' => __('Select the color you want to use for the theme.', 'thefoxwp'),
			    'options'  => array(
			        // Array of preset options
		        'color_default'      => array(
		            'alt'   => 'Default',
		            'img'   => ReduxFramework::$_url.'assets/img/color_default.jpg',
		            'presets'   => array(
		                'rd_current_menu_color'     => '#1abc9c',
                		'rd_topbar_hl_color'    => '#1abc9c',
                		'rd_topbar_topborder_color'    => '#1abc9c',
                		'rd_drop_hl_color' => '#1abc9c',
                		'rd_mb_hl' => '#1abc9c',
                		'rd_content_hl_color' => '#1abc9c',
                		'rd_drop_hl_color' => '#1abc9c',
                		'rd_footer_hl_color' => '#1abc9c',
                		'rd_footer_hover_color' => '#1abc9c',
                		'rd_footer_bar_hl_color' => '#1abc9c',



						'rd_drop_hover_color'     => '#29d9c2',
						'rd_content_hover_color'     => '#29d9c2',


						'rd_content_alt_hl_color'     => '#21c2f8',
						'rd_content_alt_hover_color'     => '#46d1ff',


						'rd_footer_bg_color'     => '#1a1c27',
						'rd_footer_heading_color'     => '#ffffff',
						'rd_footer_text_color'     => '#a1b1bc',
						'rd_footer_border_color'     => '#243240',


						'rd_footer_bar_bg_color'     => '#222533',
						'rd_footer_bar_heading_color'     => '#ffffff',
						'rd_footer_bar_text_color'     => '#a1b1bc',
						'rd_footer_bar_hover_color'     => '#ffffff',
						'rd_footer_bar_border_color'     => '#282b39',


            		)
        			),'color_trending'      => array(
		            'alt'   => 'Trending',
		            'img'   => ReduxFramework::$_url.'assets/img/color_trending.jpg',
		            'presets'   => array(
		                'rd_current_menu_color'     => '#04bfbf',
                		'rd_topbar_hl_color'    => '#04bfbf',
                		'rd_topbar_topborder_color'    => '#04bfbf',
                		'rd_drop_hl_color' => '#04bfbf',
                		'rd_mb_hl' => '#04bfbf',
                		'rd_content_hl_color' => '#04bfbf',
                		'rd_drop_hl_color' => '#04bfbf',
                		'rd_footer_hl_color' => '#04bfbf',
                		'rd_footer_hover_color' => '#ffffff',
                		'rd_footer_bar_hl_color' => '#04bfbf',



						'rd_drop_hover_color'     => '#21e6f8',
						'rd_content_hover_color'     => '#21e6f8',


						'rd_content_alt_hl_color'     => '#04bfbf',
						'rd_content_alt_hover_color'     => '#13d7d7',



						'rd_footer_bg_color'     => '#2f2933',
						'rd_footer_heading_color'     => '#ffffff',
						'rd_footer_text_color'     => '#a1b1bc',
						'rd_footer_border_color'     => '#2f2933',


						'rd_footer_bar_bg_color'     => '#231f26',
						'rd_footer_bar_heading_color'     => '#ffffff',
						'rd_footer_bar_text_color'     => '#a1b1bc',
						'rd_footer_bar_hover_color'     => '#ffffff',
						'rd_footer_bar_border_color'     => '#282b39',




            		)
        			),'color_business_demo'      => array(
		            'alt'   => 'Business',
		            'img'   => ReduxFramework::$_url.'assets/img/color_business.jpg',
		            'presets'   => array(
		                'rd_current_menu_color'     => '#4285f4',
                		'rd_topbar_hl_color'    => '#4285f4',
                		'rd_topbar_topborder_color'    => '#4285f4',
                		'rd_drop_hl_color' => '#4285f4',
                		'rd_mb_hl' => '#4285f4',
                		'rd_content_hl_color' => '#4285f4',
                		'rd_drop_hl_color' => '#4285f4',
                		'rd_footer_hl_color' => '#ffffff',
                		'rd_footer_hover_color' => '#4285f4',
                		'rd_footer_bar_hl_color' => '#ffffff',
						'rd_content_alt_hl_color'     => '#4285f4',


						'rd_drop_hover_color'     => '#4ed9fe',
						'rd_content_hover_color'     => '#4ed9fe',
						'rd_content_alt_hover_color'     => '#4ed9fe',


						'rd_footer_bg_color'     => '#242427',
						'rd_footer_heading_color'     => '#ffffff',
						'rd_footer_text_color'     => '#999999',
						'rd_footer_border_color'     => '#242427',


						'rd_footer_bar_bg_color'     => '#1a1a1d',
						'rd_footer_bar_heading_color'     => '#ffffff',
						'rd_footer_bar_text_color'     => '#666666',
						'rd_footer_bar_hover_color'     => '#ffffff',
						'rd_footer_bar_border_color'     => '#1a1a1d',
						 'rd_content_heading_color' => '#333333',
						 'rd_content_text_color'=> '#575757',


            		)
        			),'color_lightblue'      => array(
		            'alt'   => 'LightBlue',
		            'img'   => ReduxFramework::$_url.'assets/img/color_lightblue.jpg',
		            'presets'   => array(
		                'rd_current_menu_color'     => '#21c2f8',
                		'rd_topbar_hl_color'    => '#21c2f8',
                		'rd_topbar_topborder_color'    => '#21c2f8',
                		'rd_drop_hl_color' => '#21c2f8',
                		'rd_mb_hl' => '#21c2f8',
                		'rd_content_hl_color' => '#21c2f8',
                		'rd_drop_hl_color' => '#21c2f8',
                		'rd_footer_hl_color' => '#21c2f8',
                		'rd_footer_hover_color' => '#21c2f8',
                		'rd_footer_bar_hl_color' => '#21c2f8',



						'rd_drop_hover_color'     => '#21e6f8',
						'rd_content_hover_color'     => '#21e6f8',


						'rd_content_alt_hl_color'     => '#21c2f8',
						'rd_content_alt_hover_color'     => '#21e6f8',



						'rd_footer_bg_color'     => '#2f383d',
						'rd_footer_heading_color'     => '#ffffff',
						'rd_footer_text_color'     => '#a1b1bc',
						'rd_footer_border_color'     => '#465259',


						'rd_footer_bar_bg_color'     => '#21262a',
						'rd_footer_bar_heading_color'     => '#ffffff',
						'rd_footer_bar_text_color'     => '#a1b1bc',
						'rd_footer_bar_hover_color'     => '#ffffff',
						'rd_footer_bar_border_color'     => '#21262a',




            		)
        			),'color_businessblue'      => array(
		            'alt'   => 'BusinessBlue',
		            'img'   => ReduxFramework::$_url.'assets/img/color_businessblue.jpg',
		            'presets'   => array(
		                'rd_current_menu_color'     => '#288bd0',
                		'rd_topbar_hl_color'    => '#288bd0',
                		'rd_topbar_topborder_color'    => '#288bd0',
                		'rd_drop_hl_color' => '#288bd0',
                		'rd_mb_hl' => '#288bd0',
                		'rd_content_hl_color' => '#288bd0',
                		'rd_drop_hl_color' => '#288bd0',
                		'rd_footer_hl_color' => '#288bd0',
                		'rd_footer_hover_color' => '#288bd0',
                		'rd_footer_bar_hl_color' => '#288bd0',
						'rd_content_alt_hl_color'     => '#288bd0',


						'rd_drop_hover_color'     => '#2396e6',
						'rd_content_hover_color'     => '#2396e6',
						'rd_content_alt_hover_color'     => '#2396e6',


						'rd_footer_bg_color'     => '#232323',
						'rd_footer_heading_color'     => '#ffffff',
						'rd_footer_text_color'     => '#DDDDDD',
						'rd_footer_border_color'     => '#3A3A3A',


						'rd_footer_bar_bg_color'     => '#1A1A1A',
						'rd_footer_bar_heading_color'     => '#ffffff',
						'rd_footer_bar_text_color'     => '#DDDDDD',
						'rd_footer_bar_hover_color'     => '#ffffff',
						'rd_footer_bar_border_color'     => '#1A1A1A',


            		)
        			),'color_red'      => array(
		            'alt'   => 'Red',
		            'img'   => ReduxFramework::$_url.'assets/img/color_red.jpg',
		            'presets'   => array(
		                'rd_current_menu_color'     => '#FF4539',
                		'rd_topbar_hl_color'    => '#FF4539',
                		'rd_topbar_topborder_color'    => '#FF4539',
                		'rd_drop_hl_color' => '#FF4539',
                		'rd_mb_hl' => '#FF4539',
                		'rd_content_hl_color' => '#FF4539',
                		'rd_drop_hl_color' => '#FF4539',
                		'rd_footer_hl_color' => '#FF4539',
                		'rd_footer_hover_color' => '#FF4539',
                		'rd_footer_bar_hl_color' => '#FF4539',
						'rd_content_alt_hl_color'     => '#FF4539',


						'rd_drop_hover_color'     => '#ff5e54',
						'rd_content_hover_color'     => '#ff5e54',
						'rd_content_alt_hover_color'     => '#ff5e54',


						'rd_footer_bg_color'     => '#232323',
						'rd_footer_heading_color'     => '#ffffff',
						'rd_footer_text_color'     => '#DDDDDD',
						'rd_footer_border_color'     => '#3A3A3A',


						'rd_footer_bar_bg_color'     => '#1A1A1A',
						'rd_footer_bar_heading_color'     => '#ffffff',
						'rd_footer_bar_text_color'     => '#DDDDDD',
						'rd_footer_bar_hover_color'     => '#ffffff',
						'rd_footer_bar_border_color'     => '#1A1A1A',


            		)
        			),'color_orange'      => array(
		            'alt'   => 'Orange',
		            'img'   => ReduxFramework::$_url.'assets/img/color_orange.jpg',
		            'presets'   => array(
		                'rd_current_menu_color'     => '#ff881e',
                		'rd_topbar_hl_color'    => '#ff881e',
                		'rd_topbar_topborder_color'    => '#ff881e',
                		'rd_drop_hl_color' => '#ff881e',
                		'rd_mb_hl' => '#ff881e',
                		'rd_content_hl_color' => '#ff881e',
                		'rd_drop_hl_color' => '#ff881e',
                		'rd_footer_hl_color' => '#ff881e',
                		'rd_footer_hover_color' => '#ff881e',
                		'rd_footer_bar_hl_color' => '#ff881e',
						'rd_content_alt_hl_color'     => '#ff881e',


						'rd_drop_hover_color'     => '#ff9d1e',
						'rd_content_hover_color'     => '#ff9d1e',
						'rd_content_alt_hover_color'     => '#ff9d1e',


						'rd_footer_bg_color'     => '#232323',
						'rd_footer_heading_color'     => '#ffffff',
						'rd_footer_text_color'     => '#DDDDDD',
						'rd_footer_border_color'     => '#3A3A3A',


						'rd_footer_bar_bg_color'     => '#1A1A1A',
						'rd_footer_bar_heading_color'     => '#ffffff',
						'rd_footer_bar_text_color'     => '#DDDDDD',
						'rd_footer_bar_hover_color'     => '#ffffff',
						'rd_footer_bar_border_color'     => '#1A1A1A',


            		)
        			),'color_orangeyellow'      => array(
		            'alt'   => 'Orange yellow',
		            'img'   => ReduxFramework::$_url.'assets/img/color_orangeyellow.jpg',
		            'presets'   => array(
		                'rd_current_menu_color'     => '#FCB614',
                		'rd_topbar_hl_color'    => '#FCB614',
                		'rd_topbar_topborder_color'    => '#FCB614',
                		'rd_drop_hl_color' => '#FCB614',
                		'rd_mb_hl' => '#FCB614',
                		'rd_content_hl_color' => '#FCB614',
                		'rd_drop_hl_color' => '#FCB614',
                		'rd_footer_hl_color' => '#FCB614',
                		'rd_footer_hover_color' => '#FCB614',
                		'rd_footer_bar_hl_color' => '#FCB614',
						'rd_content_alt_hl_color'     => '#FCB614',


						'rd_drop_hover_color'     => '#fcd914',
						'rd_content_hover_color'     => '#fcd914',
						'rd_content_alt_hover_color'     => '#fcd914',


						'rd_footer_bg_color'     => '#232323',
						'rd_footer_heading_color'     => '#ffffff',
						'rd_footer_text_color'     => '#DDDDDD',
						'rd_footer_border_color'     => '#3A3A3A',


						'rd_footer_bar_bg_color'     => '#1A1A1A',
						'rd_footer_bar_heading_color'     => '#ffffff',
						'rd_footer_bar_text_color'     => '#DDDDDD',
						'rd_footer_bar_hover_color'     => '#ffffff',
						'rd_footer_bar_border_color'     => '#1A1A1A',


            		)
        			),'color_green'      => array(
		            'alt'   => 'Green',
		            'img'   => ReduxFramework::$_url.'assets/img/color_green.jpg',
		            'presets'   => array(
		                'rd_current_menu_color'     => '#93ca44',
                		'rd_topbar_hl_color'    => '#93ca44',
                		'rd_topbar_topborder_color'    => '#93ca44',
                		'rd_drop_hl_color' => '#93ca44',
                		'rd_mb_hl' => '#93ca44',
                		'rd_content_hl_color' => '#93ca44',
                		'rd_drop_hl_color' => '#93ca44',
                		'rd_footer_hl_color' => '#93ca44',
                		'rd_footer_hover_color' => '#93ca44',
                		'rd_footer_bar_hl_color' => '#93ca44',
						'rd_content_alt_hl_color'     => '#93ca44',


						'rd_drop_hover_color'     => '#a8de5b',
						'rd_content_hover_color'     => '#a8de5b',
						'rd_content_alt_hover_color'     => '#a8de5b',


						'rd_footer_bg_color'     => '#232323',
						'rd_footer_heading_color'     => '#ffffff',
						'rd_footer_text_color'     => '#DDDDDD',
						'rd_footer_border_color'     => '#3A3A3A',


						'rd_footer_bar_bg_color'     => '#1A1A1A',
						'rd_footer_bar_heading_color'     => '#ffffff',
						'rd_footer_bar_text_color'     => '#DDDDDD',
						'rd_footer_bar_hover_color'     => '#ffffff',
						'rd_footer_bar_border_color'     => '#1A1A1A',


            		)
        			),'color_violet'      => array(
		            'alt'   => 'Violet',
		            'img'   => ReduxFramework::$_url.'assets/img/color_violet.jpg',
		            'presets'   => array(
		                'rd_current_menu_color'     => '#423FAE',
                		'rd_topbar_hl_color'    => '#423FAE',
                		'rd_topbar_topborder_color'    => '#423FAE',
                		'rd_drop_hl_color' => '#423FAE',
                		'rd_mb_hl' => '#423FAE',
                		'rd_content_hl_color' => '#423FAE',
                		'rd_drop_hl_color' => '#423FAE',
                		'rd_footer_hl_color' => '#423FAE',
                		'rd_footer_hover_color' => '#423FAE',
                		'rd_footer_bar_hl_color' => '#423FAE',
						'rd_content_alt_hl_color'     => '#423FAE',


						'rd_drop_hover_color'     => '#5257DF',
						'rd_content_hover_color'     => '#5257DF',
						'rd_content_alt_hover_color'     => '#5257DF',


						'rd_footer_bg_color'     => '#1f2224',
						'rd_footer_heading_color'     => '#ffffff',
						'rd_footer_text_color'     => '#DDDDDD',
						'rd_footer_border_color'     => '#38353F',


						'rd_footer_bar_bg_color'     => '#131314',
						'rd_footer_bar_heading_color'     => '#ffffff',
						'rd_footer_bar_text_color'     => '#DDDDDD',
						'rd_footer_bar_hover_color'     => '#ffffff',
						'rd_footer_bar_border_color'     => '#131314',


            		)
        			),'color_paleorange'      => array(
		            'alt'   => 'Pale Orange/Blue',
		            'img'   => ReduxFramework::$_url.'assets/img/color_paleorange.jpg',
		            'presets'   => array(
		                'rd_current_menu_color'     => '#FF8C74',
                		'rd_topbar_hl_color'    => '#FF8C74',
                		'rd_topbar_topborder_color'    => '#FF8C74',
                		'rd_drop_hl_color' => '#FF8C74',
                		'rd_mb_hl' => '#FF8C74',
                		'rd_content_hl_color' => '#FF8C74',
                		'rd_drop_hl_color' => '#FF8C74',
                		'rd_footer_hl_color' => '#FF8C74',
                		'rd_footer_hover_color' => '#FF8C74',
                		'rd_footer_bar_hl_color' => '#FF8C74',
						'rd_content_alt_hl_color'     => '#FF8C74',


						'rd_drop_hover_color'     => '#81CFE0',
						'rd_content_hover_color'     => '#81CFE0',
						'rd_content_alt_hover_color'     => '#81CFE0',


						'rd_footer_bg_color'     => '#232323',
						'rd_footer_heading_color'     => '#ffffff',
						'rd_footer_text_color'     => '#DDDDDD',
						'rd_footer_border_color'     => '#3A3A3A',


						'rd_footer_bar_bg_color'     => '#1A1A1A',
						'rd_footer_bar_heading_color'     => '#ffffff',
						'rd_footer_bar_text_color'     => '#DDDDDD',
						'rd_footer_bar_hover_color'     => '#ffffff',
						'rd_footer_bar_border_color'     => '#1A1A1A',


            		)
        			),'color_palered'      => array(
		            'alt'   => 'Pale Red/Blue',
		            'img'   => ReduxFramework::$_url.'assets/img/color_palered.jpg',
		            'presets'   => array(
		                'rd_current_menu_color'     => '#FD727D',
                		'rd_topbar_hl_color'    => '#FD727D',
                		'rd_topbar_topborder_color'    => '#FD727D',
                		'rd_drop_hl_color' => '#FD727D',
                		'rd_mb_hl' => '#FD727D',
                		'rd_content_hl_color' => '#FD727D',
                		'rd_drop_hl_color' => '#FD727D',
                		'rd_footer_hl_color' => '#FD727D',
                		'rd_footer_hover_color' => '#FD727D',
                		'rd_footer_bar_hl_color' => '#FD727D',
						'rd_content_alt_hl_color'     => '#FD727D',


						'rd_drop_hover_color'     => '#52DBEB',
						'rd_content_hover_color'     => '#52DBEB',
						'rd_content_alt_hover_color'     => '#52DBEB',


						'rd_footer_bg_color'     => '#232323',
						'rd_footer_heading_color'     => '#ffffff',
						'rd_footer_text_color'     => '#DDDDDD',
						'rd_footer_border_color'     => '#3A3A3A',


						'rd_footer_bar_bg_color'     => '#1A1A1A',
						'rd_footer_bar_heading_color'     => '#ffffff',
						'rd_footer_bar_text_color'     => '#DDDDDD',
						'rd_footer_bar_hover_color'     => '#ffffff',
						'rd_footer_bar_border_color'     => '#1A1A1A',


            		)
        			),
					),
					),
				)
			));


            Redux::setSection( $opt_name, array(
                'icon'      => 'el-icon-font',
                'title'     => __('Typography', 'thefoxwp'),
                'class'      => 'redux-sm-p',
                'fields'    => array(


              array(
                  'id'       => 'rd_custom_fonts_uploader',
                  'type'     => 'custom_fonts',
                  'title'    => __('Custom fonts.', 'thefoxwp'),
                  'subtitle'  => __('Upload the zip file that contains the font files of your font.', 'thefoxwp'),
              ),
                    array(
                        'id'        => 'rd_custom_font',
                        'type'      => 'switch',
                        'title'     => __('Use Custom fonts for body?', 'thefoxwp'),
                        'subtitle'  => __('Turn on to use custom fonts for the theme main text.', 'thefoxwp'),
                        'default'   => false,
                    ),
                    array(
                        'id'        => 'rd_body_font',
                        'type'      => 'typography',
                        'required'  => array('rd_custom_font', '=', '1'),
                        'title'     => __('Body font', 'thefoxwp'),
                        'subtitle'  => __('Specify the Body font properties.', 'thefoxwp'),
                        'google'    => true,
                        'color' => false,
                        'default'   => array(
                            'font-size'     => '14px',
                            'font-family'   => 'Lato',
                            'font-weight'   => 'Normal',
                            'line-height'   => '24px',
                        ),
                    ),

                    array(
                        'id'        => 'rd_custom_menu_font',
                        'type'      => 'switch',
                        'title'     => __('Use Custom fonts for Menu / Header?', 'thefoxwp'),
                        'subtitle'  => __('Turn on to use custom fonts for the theme Menu / Header.', 'thefoxwp'),
                        'default'   => false,
                    ),
                    array(
                        'id'        => 'rd_menu_font',
                        'type'      => 'typography',
                        'required'  => array('rd_custom_menu_font', '=', '1'),
                        'title'     => __('Menu / Header font', 'thefoxwp'),
                        'subtitle'  => __('Specify the Navigation / Header font properties.', 'thefoxwp'),
                        'google'    => true,
                        'color' => false,
                        'default'   => array(
                            'font-size'     => '14px',
                            'font-family'   => 'Lato',
                            'font-weight'   => '400',
                            'line-height'   => '24px',
                        ),
                    ),
                    array(
                        'id'        => 'rd_dropdown_font',
                        'type'      => 'typography',
                        'required'  => array('rd_custom_menu_font', '=', '1'),
                        'title'     => __('Menu dropdown font', 'thefoxwp'),
                        'subtitle'  => __('Specify the Menu drop down font properties.', 'thefoxwp'),
                        'google'    => true,
                        'color' => false,
                        'default'   => array(
                            'font-size'     => '13px',
                            'font-family'   => 'Lato',
                            'font-weight'   => '400',
                            'line-height'   => '14px',
                        ),
                    ),
                          array(
                              'id'        => 'rd_custom_title_font',
                              'type'      => 'switch',
                              'title'     => __('Use Custom fonts for title?', 'thefoxwp'),
                              'subtitle'  => __('Turn on to use custom fonts for the theme Title.', 'thefoxwp'),
                              'default'   => false,
                          ),
                          array(
                              'id'        => 'rd_title_font',
                              'type'      => 'typography',
                              'required'  => array('rd_custom_title_font', '=', '1'),
                              'title'     => __('Title font', 'thefoxwp'),
                              'subtitle'  => __('Specify the Title', 'thefoxwp'),
                              'google'    => true,
                              'color' => false,
                              'default'   => array(
                                  'font-size'     => '24px',
                                  'font-family'   => 'Lato',
                                  'font-weight'   => 'Normal',
                                  'line-height'   => '34px',
                              ),
                          ),
					array(
                        'id'        => 'rd_custom_heading_font',
                        'type'      => 'switch',
                        'title'     => __('Use Custom fonts for Headings?', 'thefoxwp'),
                        'subtitle'  => __('Turn on to use custom fonts for the theme Headings.', 'thefoxwp'),
                        'default'   => false,
                    ),
                    array(
                        'id'        => 'rd_h1_font',
                        'type'      => 'typography',
                        'required'  => array('rd_custom_heading_font', '=', '1'),
                        'title'     => __('Heading 1 font', 'thefoxwp'),
                        'subtitle'  => __('Specify the Heading 1 ( h1 ) font properties.', 'thefoxwp'),
                        'google'    => true,
            					  'color' => false,
                        'default'   => array(
                            'font-size'     => '34px',
                            'font-family'   => 'Lato',
                            'font-weight'   => '700',
                            'line-height'   => '42px',
                        ),
                    ),
                    array(
                        'id'        => 'rd_h2_font',
                        'type'      => 'typography',
                        'required'  => array('rd_custom_heading_font', '=', '1'),
                        'title'     => __('Heading 2 font', 'thefoxwp'),
                        'subtitle'  => __('Specify the Heading 2 ( h2 ) font properties.', 'thefoxwp'),
                        'google'    => true,
                        'color' => false,
                        'default'   => array(
                            'font-size'     => '24px',
                            'font-family'   => 'Lato',
                            'font-weight'   => '700',
                            'line-height'   => '36px',
                        ),
                    ),
                    array(
                        'id'        => 'rd_h3_font',
                        'type'      => 'typography',
                        'required'  => array('rd_custom_heading_font', '=', '1'),
                        'title'     => __('Heading 3 font', 'thefoxwp'),
                        'subtitle'  => __('Specify the Heading 3 ( h3 ) font properties.', 'thefoxwp'),
                        'google'    => true,
                        'color' => false,
                        'default'   => array(
                            'font-size'     => '20px',
                            'font-family'   => 'Lato',
                            'font-weight'   => '700',
                            'line-height'   => '24px',
                        ),
                    ),
                    array(
                        'id'        => 'rd_h4_font',
                        'type'      => 'typography',
                        'required'  => array('rd_custom_heading_font', '=', '1'),
                        'title'     => __('Heading 4 font', 'thefoxwp'),
                        'subtitle'  => __('Specify the Heading 4 ( h4 ) font properties.', 'thefoxwp'),
                        'google'    => true,
                        'color' => false,
                        'default'   => array(
                            'font-size'     => '18px',
                            'font-family'   => 'Lato',
                            'font-weight'   => '700',
                            'line-height'   => '24px',
                        ),
                    ),
                    array(
                        'id'        => 'rd_h5_font',
                        'type'      => 'typography',
                        'required'  => array('rd_custom_heading_font', '=', '1'),
                        'title'     => __('Heading 5 font', 'thefoxwp'),
                        'subtitle'  => __('Specify the Heading 5 ( h5 ) font properties.', 'thefoxwp'),
                        'google'    => true,
                        'color' => false,
                        'default'   => array(
                            'font-size'     => '16px',

                            'font-family'   => 'Lato',
                            'font-weight'   => '400',
                            'line-height'   => '24px',
                        ),
                    ),
                    array(
                        'id'        => 'rd_h6_font',
                        'type'      => 'typography',
                        'required'  => array('rd_custom_heading_font', '=', '1'),
                        'title'     => __('Heading 6 font', 'thefoxwp'),
                        'subtitle'  => __('Specify the Heading 6 ( h6 ) font properties.', 'thefoxwp'),
                        'google'    => true,
                        'color' => false,
                        'default'   => array(
                            'font-size'     => '14px',
                            'font-family'   => 'Lato',
                            'font-weight'   => '300',
                            'line-height'   => '24px',
                        ),
                    ),



                )
            ));

				 Redux::setSection( $opt_name, array(
                'icon'      => 'el-icon-brush',
                'title'     => __('Header styling', 'thefoxwp'),
                'class'      => 'redux-sm-p',
                'fields'    => array(



                    array(
                        'id'        => 'rd-notice-idea-header',
                        'type'      => 'info',
						'icon' => 'el-icon-idea',
                        'title'     => __('PRESET OPTIONS', 'thefoxwp'),
                        'desc'      => __('If you just want to use a preset design check the tab "Header Preset".', 'thefoxwp')
                    ),

					array(
                        'id'        => 'rd_logo_color',
                        'type'      => 'select',
                        'title'     => __('Select the logo to use', 'thefoxwp'),
                        'subtitle'  => __('Select if you want to use dark logo or light logo ( need to be uploaded )', 'thefoxwp'),


                        //Must provide key => value pairs for select options
                        'options'   => array(
                            'dark_logo_selected' => 'Dark Logo',
                            'light_logo_selected' => 'Light logo',
                        ),
                        'default'   => 'dark_logo_selected'
                    ),

                    array(
                        'id'        => 'rd_nav_type',
                        'type'      => 'select',
                        'title'     => __('Header layout', 'thefoxwp'),
                        'subtitle'  => __('Select the header layout', 'thefoxwp'),


                        //Must provide key => value pairs for select options
                        'options'   => array(
                            'nav_type_1' => 'type 1',
                            'nav_type_2' => 'type 2',
                            'nav_type_3' => 'type 3',
                            'nav_type_4' => 'type 4',
                            'nav_type_5' => 'type 5',
                            'nav_type_6' => 'type 6',
                            'nav_type_7' => 'type 7',
                            'nav_type_8' => 'type 8',
                            'nav_type_9' => 'type 9',
                            'nav_type_10' => 'type 10',
                            'nav_type_11' => 'type 11',
                            'nav_type_12' => 'type 12',
                            'nav_type_13' => 'type 13',
                            'nav_type_14' => 'type 14',
                            'nav_type_15' => 'type 15',
                            'nav_type_16' => 'type 16',
                            'nav_type_17' => 'type 17',
                            'nav_type_18' => 'type 18',
                            'nav_type_19' => 'Left Navigation',
                            'nav_type_19_f' => 'Left Navigation Fixed',
                            'nav_type_9_c' => 'Centered Logo',
                        ),
                        'default'   => 'nav_type_1'
                    ),
					array(
                        'id'        => 'rd_header_width',
                        'type'     => 'button_set',
                        'title'     => __('Make full width header?', 'thefoxwp'),
                        'subtitle'  => __('Select if you want the header to take all the space available.', 'thefoxwp'),
                        'options' => array(
					        'yes' => 'Yes',
					        'no' => 'No'
					     ),
					    'default' => 'no'


					),
					array(
                        'id'        => 'rd_header_sticky',
                        'type'     => 'button_set',
                        'title'     => __('Use Sticky Header?', 'thefoxwp'),
                        'subtitle'  => __('Select if you want to header to be fix at the top of the page when you scroll down.', 'thefoxwp'),
                        'options' => array(
					        'yes' => 'Yes',
					        'no' => 'No'
					     ),
					    'default' => 'yes'


					),
					array(
                        'id'        => 'rd_header_shrink',
                        'type'     => 'button_set',
                        'title'     => __('Shrink header when scroll down?', 'thefoxwp'),
                        'subtitle'  => __('Select if you want to shrink the header when you scroll down.', 'thefoxwp'),
                        'options' => array(
					        'yes' => 'Yes',
					        'no' => 'No'
					     ),
					    'default' => 'yes'


					),
					array(
                        'id'        => 'rd_header_bg_color',
                        'type'      => 'color',
                        'title'     => __('Header Background Color', 'thefoxwp'),
                        'subtitle'  => __('Pick a background color for the Header (default: #ffffff).', 'thefoxwp'),
                        'default'   => '#ffffff',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_transparent_header_bg_color',
                        'type'      => 'color_rgba',
                        'title'     => __('Transparent Header Background Color', 'thefoxwp'),
                        'subtitle'  => __('Pick a background color for the transparent Header ( use transparent color ).', 'thefoxwp'),
                        'default'   => array(
        					'color'     => '#ffffff',
        					'alpha'     => '0'
   						),
                    ),
					array(
                        'id'        => 'rd_menu_color',
                        'type'      => 'color',
                        'title'     => __('Menu Text Color', 'thefoxwp'),
                        'subtitle'  => __('Menu text color (default: #a1b1bc).', 'thefoxwp'),
                        'default'   => '#a1b1bc',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_transparent_header_menu_color',
                        'type'      => 'color_rgba',
                        'title'     => __('Transparent Header Menu Color', 'thefoxwp'),
                        'subtitle'  => __('Pick a color for the transparent Header Menu color ( use transparent color ).', 'thefoxwp'),
                        'default'   => array(
        					'color'     => '#ffffff',
        					'alpha'     => '0.85'
   						),
                    ),
					array(
                        'id'        => 'rd_menu_bg_color',
                        'type'      => 'color',
                        'title'     => __('Menu background Color', 'thefoxwp'),
                        'subtitle'  => __('Menu background color (default: #ffffff).', 'thefoxwp'),
                        'default'   => '#ffffff',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_current_menu_color',
                        'type'      => 'color',
                        'title'     => __('Current Menu Text Color', 'thefoxwp'),
                        'subtitle'  => __('Current Menu text color (default: #1abc9c).', 'thefoxwp'),
                        'default'   => '#1abc9c',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_current_menu_bg_color',
                        'type'      => 'color',
                        'title'     => __('Current Menu background Color', 'thefoxwp'),
                        'subtitle'  => __('Current Menu background color (default: #ffffff).', 'thefoxwp'),
                        'default'   => '#ffffff',

                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_header_border_color',
                        'type'      => 'color',
                        'title'     => __('Header border Color', 'thefoxwp'),
                        'subtitle'  => __('Header border color (default: #ecf0f1 ).', 'thefoxwp'),
                        'default'   => '#ecf0f1',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_left_header_border_color',
                        'type'      => 'color',
                        'title'     => __('Left Navigation\'s right border Color', 'thefoxwp'),
                        'subtitle'  => __('Border that show on the right of the Left Navigation (default: #ecf0f1 ).', 'thefoxwp'),
						'required'  => array(
    						array('rd_nav_type','contains','19'),
						),
                        'default'   => '#ecf0f1',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_transparent_header_border_color',
                        'type'      => 'color_rgba',
                        'title'     => __('Transparent Header border Color', 'thefoxwp'),
                        'subtitle'  => __('Pick a color for the transparent Header border ( use transparent color ).', 'thefoxwp'),
                        'default'   => array(
        					'color'     => '#ffffff',
        					'alpha'     => '0.25'
   						),
                    ),
					array(
                        'id'        => 'rd_header_search',
                        'type'     => 'button_set',
                        'title'     => __('Display "Search" icon in the header?', 'thefoxwp'),
                        'subtitle'  => __('Turn on to display the Search icon.', 'thefoxwp'),
                        'options' => array(
					        'yes' => 'Yes',
					        'no' => 'No'
					     ),
					    'default' => 'no'
					),
					array(
                        'id'        => 'rd_header_socials',
                        'type'     => 'button_set',
						'required'  => array(
    						array('rd_nav_type','contains','19'),
						),
                        'title'     => __('Display Socials icon in the header?', 'thefoxwp'),
                        'subtitle'  => __('Turn on to display the Socials icon.', 'thefoxwp'),
                        'options' => array(
					        'yes' => 'Yes',
					        'no' => 'No'
					     ),
					    'default' => 'no'
					),
                    array(
                        'id'        => 'rd-notice-critical-header',
                        'type'      => 'info',
                        'notice'    => true,
						'required'  => array(
    						array('rd_nav_type','not_contain','19'),
						),
						'icon' => 'el-icon-warning-sign',
                        'style'     => 'critical',
                        'title'     => __('WooCommerce Options.', 'thefoxwp'),
                        'desc'      => __('The following options will are only available if you are using WooCommerce.', 'thefoxwp')
                    ),
					array(
                        'id'        => 'rd_header_cart',
                        'type'     => 'button_set',
                        'title'     => __('Display Cart icon in the header?', 'thefoxwp'),
						'required'  => array(
    						array('rd_nav_type','not_contain','19'),
						),
                        'subtitle'  => __('Turn on to display the Woocommerce my cart icon.', 'thefoxwp'),
                        'options' => array(
					        'yes' => 'Yes',
					        'no' => 'No'
					     ),
					    'default' => 'no'


					),

                )
            ));



			 Redux::setSection( $opt_name, array(
                'icon'      => 'el-icon-cog',
                'title'     => __('Header Preset', 'thefoxwp'),
                'class'      => 'redux-sm-p',
                'fields'    => array(


              array(
			    'id'       => 'opt-presets',
			    'type'     => 'image_select',
			    'presets'  => true,
			    'title'    => __('Header Preset', 'thefoxwp'),
			    'subtitle' => __('Select the design you want to use.', 'thefoxwp'),
			    'default'  => 0,

			    'options'  => array(
			        // Array of preset options
		        '1'      => array(
		            'alt'   => 'Preset 1',
		            'img'   => ReduxFramework::$_url.'assets/img/header_01.jpg',
		            'presets'   => array(
						'rd_logo_color' => 'dark_logo_selected',
		                'rd_nav_type'     => 'nav_type_3',
                		'rd_header_bg_color'    => '#ffffff',
                		'rd_menu_color' => '#a1b1bc',
						'rd_menu_bg_color'     => '#ffffff',
                		'rd_current_menu_color'    => '#1abc9c',
                		'rd_current_menu_bg_color' => '#ffffff',
                		'rd_header_border_color'    => '#ecf0f1',
                		'rd_header_search' => 'yes',
						'rd_header_cart'     => 'no',
                		'rd_topbar'    => 'no',
                		'rd_topbar_type' => 'topbar_type_1',
                		'rd_topbar_bg_color'    => '#ffffff',
                		'rd_topbar_text_color' => '#a1b1bc',
						'rd_topbar_textalt_color'     => '#2c3e50',
                		'rd_topbar_hl_color'    => '#1abc9c',
                		'rd_topbar_border_color' => '#ebebeb',
                		'rd_topbar_topborder_color'    => '#1abc9c',
                		'rd_topbar_phone' => 'no',
						'rd_topbar_mail'     => 'no',
                		'rd_topbar_news'    => 'no',
                		'rd_topbar_icon' => 'yes',
                		'rd_topbar_icon_pos'    => 'right',
                		'rd_topbar_menu' => 'no',
						'rd_topbar_cart'     => 'yes',
                		'rd_topbar_login'    => 'no',
                		'rd_topbar_login_type' => 'no',
                		'rd_topbar_wpml'    => 'yes',
            		)
        			),'2'      => array(
		            'alt'   => 'Preset 2',
		            'img'   => ReduxFramework::$_url.'assets/img/header_02.jpg',
		            'presets'   => array(
						'rd_logo_color' => 'dark_logo_selected',
		                'rd_nav_type'     => 'nav_type_2',
                		'rd_header_bg_color'    => '#ffffff',
                		'rd_menu_color' => '#a1b1bc',
						'rd_menu_bg_color'     => '#ffffff',
                		'rd_current_menu_color'    => '#1abc9c',
                		'rd_current_menu_bg_color' => '#ffffff',
                		'rd_header_border_color'    => '#ecedee',
                		'rd_header_search' => 'yes',
						'rd_header_cart'     => 'no',
                		'rd_topbar'    => 'yes',
                		'rd_topbar_type' => 'topbar_type_1',
                		'rd_topbar_bg_color'    => '#ffffff',
                		'rd_topbar_text_color' => '#a1b1bc',
						'rd_topbar_textalt_color'     => '#2c3e50',
                		'rd_topbar_hl_color'    => '#1abc9c',
                		'rd_topbar_border_color' => '#ebebeb',
                		'rd_topbar_topborder_color'    => '#1abc9c',
                		'rd_topbar_phone' => 'no',
						'rd_topbar_mail'     => 'no',
                		'rd_topbar_news'    => 'no',
                		'rd_topbar_icon' => 'yes',
                		'rd_topbar_icon_pos'    => 'right',
                		'rd_topbar_menu' => 'no',
						'rd_topbar_cart'     => 'yes',
                		'rd_topbar_login'    => 'no',
                		'rd_topbar_login_type' => 'no',
                		'rd_topbar_wpml'    => 'yes',
            		)
        			),'3'      => array(
		            'alt'   => 'Preset 3',
		            'img'   => ReduxFramework::$_url.'assets/img/header_03.jpg',
		            'presets'   => array(
						'rd_logo_color' => 'dark_logo_selected',
		                'rd_nav_type'     => 'nav_type_4',
                		'rd_header_bg_color'    => '#ffffff',
                		'rd_menu_color' => '#34495e',
						'rd_menu_bg_color'     => '#ffffff',
                		'rd_current_menu_color'    => '#1abc9c',
                		'rd_current_menu_bg_color' => '#ffffff',
                		'rd_header_border_color'    => '#ecf0f1',
                		'rd_header_search' => 'no',
						'rd_header_cart'     => 'no',
                		'rd_topbar'    => 'yes',
                		'rd_topbar_type' => 'topbar_type_5',
                		'rd_topbar_bg_color'    => '#ffffff',
                		'rd_topbar_text_color' => '#a1b1bc',
						'rd_topbar_textalt_color'     => '#2c3e50',
                		'rd_topbar_hl_color'    => '#1abc9c',
                		'rd_topbar_border_color' => '#ebebeb',
                		'rd_topbar_topborder_color'    => '#1abc9c',
                		'rd_topbar_phone' => 'no',
						'rd_topbar_mail'     => 'no',
                		'rd_topbar_news'    => 'yes',
                		'rd_topbar_icon' => 'no',
                		'rd_topbar_icon_pos'    => 'left',
                		'rd_topbar_menu' => 'no',
						'rd_topbar_cart'     => 'no',
                		'rd_topbar_login'    => 'yes',
                		'rd_topbar_login_type' => 'type1',
                		'rd_topbar_wpml'    => 'yes',
            		)
        			),'4'      => array(
		            'alt'   => 'Preset 4',
		            'img'   => ReduxFramework::$_url.'assets/img/header_04.jpg',
		            'presets'   => array(
						'rd_logo_color' => 'dark_logo_selected',
		                'rd_nav_type'     => 'nav_type_6',
                		'rd_header_bg_color'    => '#ffffff',
                		'rd_menu_color' => '#2c3e50',
						'rd_menu_bg_color'     => '#ffffff',
                		'rd_current_menu_color'    => '#1abc9c',
                		'rd_current_menu_bg_color' => '#ffffff',
                		'rd_header_border_color'    => '#ecf0f1',
                		'rd_header_search' => 'yes',
						'rd_header_cart'     => 'yes',
                		'rd_topbar'    => 'yes',
                		'rd_topbar_type' => 'topbar_type_4',
                		'rd_topbar_bg_color'    => '#a1b1bc',
                		'rd_topbar_text_color' => '#ffffff',
						'rd_topbar_textalt_color'     => '#ffffff',
                		'rd_topbar_hl_color'    => '#1abc9c',
                		'rd_topbar_border_color' => '#8798a3',
                		'rd_topbar_topborder_color'    => '#8798a3',
                		'rd_topbar_phone' => 'no',
						'rd_topbar_mail'     => 'no',
                		'rd_topbar_news'    => 'no',
                		'rd_topbar_icon' => 'yes',
                		'rd_topbar_icon_pos'    => 'left',
                		'rd_topbar_menu' => 'no',
						'rd_topbar_cart'     => 'no',
                		'rd_topbar_login'    => 'yes',
                		'rd_topbar_login_type' => 'type2',
                		'rd_topbar_wpml'    => 'no',
            		)
        			),'5'      => array(
		            'alt'   => 'Preset 5',
		            'img'   => ReduxFramework::$_url.'assets/img/header_05.jpg',
		            'presets'   => array(
						'rd_logo_color' => 'dark_logo_selected',
		                'rd_nav_type'     => 'nav_type_5',
                		'rd_header_bg_color'    => '#ffffff',
                		'rd_menu_color' => '#a1b1bc',
						'rd_menu_bg_color'     => '#ffffff',
                		'rd_current_menu_color'    => '#1abc9c',
                		'rd_current_menu_bg_color' => '#ffffff',
                		'rd_header_border_color'    => '#ecf0f1',
                		'rd_header_search' => 'yes',
						'rd_header_cart'     => 'yes',
                		'rd_topbar'    => 'yes',
                		'rd_topbar_type' => 'topbar_type_1',
                		'rd_topbar_bg_color'    => '#1a1c27',
                		'rd_topbar_text_color' => '#a1b1bc',
						'rd_topbar_textalt_color'     => '#ffffff',
                		'rd_topbar_hl_color'    => '#1abc9c',
                		'rd_topbar_border_color' => '#26303e',
                		'rd_topbar_topborder_color'    => '#26303e',
                		'rd_topbar_phone' => 'yes',
						'rd_topbar_mail'     => 'yes',
                		'rd_topbar_news'    => 'no',
                		'rd_topbar_icon' => 'yes',
                		'rd_topbar_icon_pos'    => 'right',
                		'rd_topbar_menu' => 'no',
						'rd_topbar_cart'     => 'no',
                		'rd_topbar_login'    => 'no',
                		'rd_topbar_login_type' => 'no',
                		'rd_topbar_wpml'    => 'yes',
            		)
        			),'6'      => array(
		            'alt'   => 'Preset 6',
		            'img'   => ReduxFramework::$_url.'assets/img/header_06.jpg',
		            'presets'   => array(
						'rd_logo_color' => 'dark_logo_selected',
		                'rd_nav_type'     => 'nav_type_8',
                		'rd_header_bg_color'    => '#ffffff',
                		'rd_menu_color' => '#2c3e50',
						'rd_menu_bg_color'     => '#ffffff',
                		'rd_current_menu_color'    => '#1abc9c',
                		'rd_current_menu_bg_color' => '#ffffff',
                		'rd_header_border_color'    => '#a0a6ad',
                		'rd_header_search' => 'yes',
						'rd_header_cart'     => 'no',
                		'rd_topbar'    => 'yes',
                		'rd_topbar_type' => 'topbar_type_3',
                		'rd_topbar_bg_color'    => '#2c3e50',
                		'rd_topbar_text_color' => '#ffffff',
						'rd_topbar_textalt_color'     => '#ffffff',
                		'rd_topbar_hl_color'    => '#1abc9c',
                		'rd_topbar_border_color' => '#2c3e50',
                		'rd_topbar_topborder_color'    => '#2c3e50',
                		'rd_topbar_phone' => 'no',
						'rd_topbar_mail'     => 'no',
                		'rd_topbar_news'    => 'no',
                		'rd_topbar_icon' => 'yes',
                		'rd_topbar_icon_pos'    => 'right',
                		'rd_topbar_menu' => 'no',
						'rd_topbar_cart'     => 'yes',
                		'rd_topbar_login'    => 'no',
                		'rd_topbar_login_type' => 'no',
                		'rd_topbar_wpml'    => 'yes',
            		)
        			),'7'      => array(
		            'alt'   => 'Preset 7',
		            'img'   => ReduxFramework::$_url.'assets/img/header_07.jpg',
		            'presets'   => array(

						'rd_logo_color' => 'light_logo_selected',
		                'rd_nav_type'     => 'nav_type_9',
                		'rd_header_bg_color'    => '#222533',
                		'rd_menu_color' => '#ffffff',
						'rd_menu_bg_color'     => '#222533',
                		'rd_current_menu_color'    => '#1abc9c',
                		'rd_current_menu_bg_color' => '#ffffff',
                		'rd_header_border_color'    => '#222533',
                		'rd_header_search' => 'no',
						'rd_header_cart'     => 'yes',
                		'rd_topbar'    => 'no',
                		'rd_topbar_type' => 'topbar_type_1',
                		'rd_topbar_bg_color'    => '#ffffff',
                		'rd_topbar_text_color' => '#a1b1bc',
						'rd_topbar_textalt_color'     => '#2c3e50',
                		'rd_topbar_hl_color'    => '#1abc9c',
                		'rd_topbar_border_color' => '#ebebeb',
                		'rd_topbar_topborder_color'    => '#1abc9c',
                		'rd_topbar_phone' => 'yes',
						'rd_topbar_mail'     => 'yes',
                		'rd_topbar_news'    => 'yes',
                		'rd_topbar_icon' => 'yes',
                		'rd_topbar_icon_pos'    => 'right',
                		'rd_topbar_menu' => 'no',
						'rd_topbar_cart'     => 'no',
                		'rd_topbar_login'    => 'no',
                		'rd_topbar_login_type' => 'no',
                		'rd_topbar_wpml'    => 'no',
            		)
        			),'8'      => array(
		            'alt'   => 'Preset 8',
		            'img'   => ReduxFramework::$_url.'assets/img/header_08.jpg',
		            'presets'   => array(
						'rd_logo_color' => 'light_logo_selected',
		                'rd_nav_type'     => 'nav_type_12',
                		'rd_header_bg_color'    => '#717782',
                		'rd_menu_color' => '#ffffff',
						'rd_menu_bg_color'     => '#717782',
                		'rd_current_menu_color'    => '#ffffff',
                		'rd_current_menu_bg_color' => '#717782',
                		'rd_header_border_color'    => '#717782',
                		'rd_header_search' => 'yes',
						'rd_header_cart'     => 'no',
                		'rd_topbar'    => 'no',
                		'rd_topbar_type' => 'topbar_type_1',
                		'rd_topbar_bg_color'    => '#ffffff',
                		'rd_topbar_text_color' => '#a1b1bc',
						'rd_topbar_textalt_color'     => '#2c3e50',
                		'rd_topbar_hl_color'    => '#1abc9c',
                		'rd_topbar_border_color' => '#ebebeb',
                		'rd_topbar_topborder_color'    => '#1abc9c',
                		'rd_topbar_phone' => 'yes',
						'rd_topbar_mail'     => 'yes',
                		'rd_topbar_news'    => 'yes',
                		'rd_topbar_icon' => 'yes',
                		'rd_topbar_icon_pos'    => 'right',
                		'rd_topbar_menu' => 'no',
						'rd_topbar_cart'     => 'no',
                		'rd_topbar_login'    => 'no',
                		'rd_topbar_login_type' => 'no',
                		'rd_topbar_wpml'    => 'no',
            		)
        			),'9'      => array(
		            'alt'   => 'Preset 9',
		            'img'   => ReduxFramework::$_url.'assets/img/header_09.jpg',
		            'presets'   => array(
						'rd_logo_color' => 'light_logo_selected',
		                'rd_nav_type'     => 'nav_type_11',
                		'rd_header_bg_color'    => '#3e3f48',
                		'rd_menu_color' => '#ffffff',
						'rd_menu_bg_color'     => '#3e3f48',
                		'rd_current_menu_color'    => '#ffffff',
                		'rd_current_menu_bg_color' => '#3e3f48',
                		'rd_header_border_color'    => '#3e3f48',
                		'rd_header_search' => 'yes',
						'rd_header_cart'     => 'no',
                		'rd_topbar'    => 'no',
                		'rd_topbar_type' => 'topbar_type_1',
                		'rd_topbar_bg_color'    => '#ffffff',
                		'rd_topbar_text_color' => '#a1b1bc',
						'rd_topbar_textalt_color'     => '#2c3e50',
                		'rd_topbar_hl_color'    => '#1abc9c',
                		'rd_topbar_border_color' => '#ebebeb',
                		'rd_topbar_topborder_color'    => '#1abc9c',
                		'rd_topbar_phone' => 'yes',
						'rd_topbar_mail'     => 'yes',
                		'rd_topbar_news'    => 'yes',
                		'rd_topbar_icon' => 'yes',
                		'rd_topbar_icon_pos'    => 'right',
                		'rd_topbar_menu' => 'no',
						'rd_topbar_cart'     => 'no',
                		'rd_topbar_login'    => 'no',
                		'rd_topbar_login_type' => 'no',
                		'rd_topbar_wpml'    => 'no',
            		)
        			),'10'      => array(
		            'alt'   => 'Preset 10',
		            'img'   => ReduxFramework::$_url.'assets/img/header_10.jpg',
		            'presets'   => array(
						'rd_logo_color' => 'light_logo_selected',
		                'rd_nav_type'     => 'nav_type_10',
                		'rd_header_bg_color'    => '#1a1c27',
                		'rd_menu_color' => '#ffffff',
						'rd_menu_bg_color'     => '#1a1c27',
                		'rd_current_menu_color'    => '#1abc9c',
                		'rd_current_menu_bg_color' => '#1a1c27',
                		'rd_header_border_color'    => '#1a1c27',
                		'rd_header_search' => 'no',
						'rd_header_cart'     => 'no',
                		'rd_topbar'    => 'yes',
                		'rd_topbar_type' => 'topbar_type_3',
                		'rd_topbar_bg_color'    => '#222533',
                		'rd_topbar_text_color' => '#a1b1bc',
						'rd_topbar_textalt_color'     => '#2c3e50',
                		'rd_topbar_hl_color'    => '#ffffff',
                		'rd_topbar_border_color' => '#222533',
                		'rd_topbar_topborder_color'    => '#222533',
                		'rd_topbar_phone' => 'no',
						'rd_topbar_mail'     => 'no',
                		'rd_topbar_news'    => 'no',
                		'rd_topbar_icon' => 'yes',
                		'rd_topbar_icon_pos'    => 'left',
                		'rd_topbar_menu' => 'yes',
						'rd_topbar_cart'     => 'no',
                		'rd_topbar_login'    => 'no',
                		'rd_topbar_login_type' => 'no',
                		'rd_topbar_wpml'    => 'no',
            		)
        			),'11'      => array(
		            'alt'   => 'Preset 11',
		            'img'   => ReduxFramework::$_url.'assets/img/header_11.jpg',
		            'presets'   => array(
						'rd_logo_color' => 'light_logo_selected',
		                'rd_nav_type'     => 'nav_type_15',
                		'rd_header_bg_color'    => '#222533',
                		'rd_menu_color' => '#a1b1bc',
						'rd_menu_bg_color'     => '#222533',
                		'rd_current_menu_color'    => '#ffffff',
                		'rd_current_menu_bg_color' => '#222533',
                		'rd_header_border_color'    => '#323a48',
                		'rd_header_search' => 'yes',
						'rd_header_cart'     => 'yes',
                		'rd_topbar'    => 'yes',
                		'rd_topbar_type' => 'topbar_type_3',
                		'rd_topbar_bg_color'    => '#1a1c27',
                		'rd_topbar_text_color' => '#a1b1bc',
						'rd_topbar_textalt_color'     => '#a1b1bc',
                		'rd_topbar_hl_color'    => '#1abc9c',
                		'rd_topbar_border_color' => '#1a1c27',
                		'rd_topbar_topborder_color'    => '#1a1c27',
                		'rd_topbar_phone' => 'no',
						'rd_topbar_mail'     => 'no',
                		'rd_topbar_news'    => 'no',
                		'rd_topbar_icon' => 'no',
                		'rd_topbar_icon_pos'    => 'right',
                		'rd_topbar_menu' => 'yes',
						'rd_topbar_cart'     => 'no',
                		'rd_topbar_login'    => 'no',
                		'rd_topbar_login_type' => 'no',
                		'rd_topbar_wpml'    => 'yes',
            		)
        			),'12'      => array(
		            'alt'   => 'Preset 12',
		            'img'   => ReduxFramework::$_url.'assets/img/header_12.jpg',
		            'presets'   => array(
						'rd_logo_color' => 'light_logo_selected',
		                'rd_nav_type'     => 'nav_type_17',
                		'rd_header_bg_color'    => '#1a1c27',
                		'rd_menu_color' => '#ffffff',
						'rd_menu_bg_color'     => '#222533',
                		'rd_current_menu_color'    => '#1abc9c',
                		'rd_current_menu_bg_color' => '#222533',
                		'rd_header_border_color'    => '#2c3042',
                		'rd_header_search' => 'yes',
						'rd_header_cart'     => 'yes',
                		'rd_topbar'    => 'no',
                		'rd_topbar_type' => 'topbar_type_2',
                		'rd_topbar_bg_color'    => '#202937',
                		'rd_topbar_text_color' => '#a1b1bc',
						'rd_topbar_textalt_color'     => '#a1b1bc',
                		'rd_topbar_hl_color'    => '#1abc9c',
                		'rd_topbar_border_color' => '#202937',
                		'rd_topbar_topborder_color'    => '#17222d',
                		'rd_topbar_phone' => 'yes',
						'rd_topbar_mail'     => 'yes',
                		'rd_topbar_news'    => 'no',
                		'rd_topbar_icon' => 'no',
                		'rd_topbar_icon_pos'    => 'right',
                		'rd_topbar_menu' => 'no',
						'rd_topbar_cart'     => 'no',
                		'rd_topbar_login'    => 'no',
                		'rd_topbar_login_type' => 'no',
                		'rd_topbar_wpml'    => 'yes',
            		)
        			),'13'      => array(
		            'alt'   => 'Preset 13',
		            'img'   => ReduxFramework::$_url.'assets/img/header_13.jpg',
		            'presets'   => array(
						'rd_logo_color' => 'light_logo_selected',
		                'rd_nav_type'     => 'nav_type_16',
                		'rd_header_bg_color'    => '#1a1c27',
                		'rd_menu_color' => '#ffffff',
						'rd_menu_bg_color'     => '#222533',
                		'rd_current_menu_color'    => '#1abc9c',
                		'rd_current_menu_bg_color' => '#222533',
                		'rd_header_border_color'    => '#292c3d',
                		'rd_header_search' => 'yes',
						'rd_header_cart'     => 'yes',
                		'rd_topbar'    => 'no',
                		'rd_topbar_type' => 'topbar_type_2',
                		'rd_topbar_bg_color'    => '#202937',
                		'rd_topbar_text_color' => '#a1b1bc',
						'rd_topbar_textalt_color'     => '#a1b1bc',
                		'rd_topbar_hl_color'    => '#1abc9c',
                		'rd_topbar_border_color' => '#202937',
                		'rd_topbar_topborder_color'    => '#17222d',
                		'rd_topbar_phone' => 'yes',
						'rd_topbar_mail'     => 'yes',
                		'rd_topbar_news'    => 'no',
                		'rd_topbar_icon' => 'no',
                		'rd_topbar_icon_pos'    => 'right',
                		'rd_topbar_menu' => 'no',
						'rd_topbar_cart'     => 'no',
                		'rd_topbar_login'    => 'no',
                		'rd_topbar_login_type' => 'no',
                		'rd_topbar_wpml'    => 'yes',
            		)
        			),'14'      => array(
		            'alt'   => 'Preset 14',
		            'img'   => ReduxFramework::$_url.'assets/img/header_14.jpg',
		            'presets'   => array(
						'rd_logo_color' => 'light_logo_selected',
		                'rd_nav_type'     => 'nav_type_18',
                		'rd_header_bg_color'    => '#18202b',
                		'rd_menu_color' => '#ffffff',
						'rd_menu_bg_color'     => '#202b38',
                		'rd_current_menu_color'    => '#1abc9c',
                		'rd_current_menu_bg_color' => '#202b38',
                		'rd_header_border_color'    => '#202937',
                		'rd_header_search' => 'yes',
						'rd_header_cart'     => 'yes',
                		'rd_topbar'    => 'yes',
                		'rd_topbar_type' => 'topbar_type_2',
                		'rd_topbar_bg_color'    => '#202937',
                		'rd_topbar_text_color' => '#a1b1bc',
						'rd_topbar_textalt_color'     => '#a1b1bc',
                		'rd_topbar_hl_color'    => '#1abc9c',
                		'rd_topbar_border_color' => '#314354',
                		'rd_topbar_topborder_color'    => '#17222d',
                		'rd_topbar_phone' => 'yes',
						'rd_topbar_mail'     => 'yes',
                		'rd_topbar_news'    => 'no',
                		'rd_topbar_icon' => 'yes',
                		'rd_topbar_icon_pos'    => 'right',
                		'rd_topbar_menu' => 'no',
						'rd_topbar_cart'     => 'no',
                		'rd_topbar_login'    => 'no',
                		'rd_topbar_login_type' => 'no',
                		'rd_topbar_wpml'    => 'yes',
            		)
        			),
		    		),
					),
				)
			));


				 Redux::setSection( $opt_name, array(
                'icon'      => 'el-icon-brush',
                'title'     => __('Top bar styling', 'thefoxwp'),
                'class'      => 'redux-sm-p',
                'fields'    => array(
                    array(
                        'id'        => 'rd-notice-info',
                        'type'      => 'info',
						'icon' => 'el-icon-info-sign',
                        'title'     => __('TOP BAR.', 'thefoxwp'),
                        'desc'      => __('If you\'d like to use an additional Bar on the top of the header please see settings below.', 'thefoxwp')
                    ),
					array(
                        'id'        => 'rd_topbar',
                        'type'      => 'button_set',
                        'title'     => __('Use Header Top Bar?', 'thefoxwp'),
                        'subtitle'  => __('If you want to have a bar on the top of the header select yes.', 'thefoxwp'),
                        'options' => array(
					        'yes' => 'Yes',
					        'no' => 'No',
					     ),
					    'default' => 'no'
					),
					array(
                        'id'        => 'rd_topbar_type',
                        'type'      => 'select',
                        'required'  => array('rd_topbar', '=', 'yes'),
                        'title'     => __('Topbar style', 'thefoxwp'),
                        'subtitle'  => __('Select the topbar style', 'thefoxwp'),


                        //Must provide key => value pairs for select options
                        'options'   => array(
                            'topbar_type_1' => 'Border between elements, No top Border',
                            'topbar_type_2' => 'Border between elements, Top Border',
                            'topbar_type_3' => 'No Border between elements, No top Border',
                            'topbar_type_4' => 'No Border between elements, Top Border',
                            'topbar_type_5' => 'Thin bar Border between elements, Top/Bottom Border',
                        ),
                        'default'   => 'topbar_type_5'
                    ),
					array(
                        'id'        => 'rd_topbar_bg_color',
                        'type'      => 'color',
                        'required'  => array('rd_topbar', '=', 'yes'),
                        'title'     => __('Top bar Background Color', 'thefoxwp'),
                        'subtitle'  => __('Pick a background color for the Top bar (default: #ffffff).', 'thefoxwp'),
                        'default'   => '#ffffff',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_topbar_text_color',
                        'type'      => 'color',
                        'required'  => array('rd_topbar', '=', 'yes'),
                        'title'     => __('Top bar Text Color', 'thefoxwp'),
                        'subtitle'  => __('Top text color (default: #a1b1bc).', 'thefoxwp'),
                        'default'   => '#a1b1bc',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_topbar_textalt_color',
                        'type'      => 'color',
                        'required'  => array('rd_topbar', '=', 'yes'),
                        'title'     => __('Top bar Second text color', 'thefoxwp'),
                        'subtitle'  => __('Will be used for bold text ( maybe a darker color can be the trick || default: #2c3e50).', 'thefoxwp'),
                        'default'   => '#2c3e50',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_topbar_hl_color',
                        'type'      => 'color',
                        'required'  => array('rd_topbar', '=', 'yes'),
                        'title'     => __('Top bar Highlight Color', 'thefoxwp'),
                        'subtitle'  => __('Select the highlight color (default: #1abc9c).', 'thefoxwp'),
                        'default'   => '#1abc9c',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_topbar_border_color',
                        'type'      => 'color',
                        'required'  => array('rd_topbar', '=', 'yes'),
                        'title'     => __('Top bar border Color', 'thefoxwp'),
                        'subtitle'  => __('Top bar border color (default: #ebebeb).', 'thefoxwp'),
                        'default'   => '#ebebeb',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_topbar_topborder_color',
                        'type'      => 'color',
                        'required'  => array('rd_topbar', '=', 'yes'),
                        'title'     => __('Top bar TOP border Color', 'thefoxwp'),
                        'subtitle'  => __('Top bar TOP border color (default: #1abc9c).', 'thefoxwp'),
                        'default'   => '#1abc9c',
                        'validate'  => 'color',
                    ),
					array(
					    'id'    => 'topbarinfo_warning',
					    'type'  => 'info',
					    'title' => __('TOP BAR CONTENT', 'thefoxwp'),
						'icon' => 'el-icon-warning-sign',
                        'required'  => array('rd_topbar', '=', 'yes'),
					    'style' => 'warning',
					    'desc'  => __('Too much content in the Top bar will make it looks awful, make sure to not put to much information in the top bar ( e.g : Social icons + Phone text + Email = Clean and good result ||| Bad example : Additional Menu + Social Icon + Phone Text + Email + Login / Register button = BAD RESULT)', 'thefoxwp')
),
					array(
                        'id'        => 'rd_topbar_phone',
                        'type'     => 'button_set',
                        'required'  => array( 'rd_topbar', '=', 'yes') ,
                        'title'     => __('Display phone number in the top bar?', 'thefoxwp'),
                        'subtitle'  => __('To display the phone number field in the top bar select yes', 'thefoxwp'),
                        'options' => array(
					        'yes' => 'Yes',
					        'no' => 'No'
					     ),
					    'default' => 'no'
					),
                    array(
                        'id'        => 'rd_topbar_phone_text',
                        'type'      => 'textarea',
                        'required'  => array( 'rd_topbar_phone', '=', 'yes') ,
                        'title'     => __('Enter your phone number', 'thefoxwp'),
                        'subtitle'  => __('Text to display next to the phone icon.', 'thefoxwp'),

                        'validate'  => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
                        'default'   => 'Call us: 1.777.77.777'
                    ),
					array(
                        'id'        => 'rd_topbar_mail',
                        'type'     => 'button_set',
                        'required'  => array( 'rd_topbar', '=', 'yes') ,
                        'title'     => __('Display email in the top bar?', 'thefoxwp'),
                        'subtitle'  => __('To display the email field in the top bar select yes', 'thefoxwp'),
                        'options' => array(
					        'yes' => 'Yes',
					        'no' => 'No'
					     ),
					    'default' => 'no'
					),
                    array(
                        'id'        => 'rd_topbar_mail_text',
                        'type'      => 'textarea',
                        'required'  => array( 'rd_topbar_mail', '=', 'yes') ,
                        'title'     => __('Enter your email', 'thefoxwp'),
                        'subtitle'  => __('enter your mail adress', 'thefoxwp'),

                        'validate'  => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
                        'default'   => 'hello@thefox.com.vn'
                    ),
					array(
                        'id'        => 'rd_topbar_news',
                        'type'     => 'button_set',
                        'required'  => array( 'rd_topbar', '=', 'yes') ,
                        'title'     => __('Display news text in the top bar?', 'thefoxwp'),
                        'subtitle'  => __('To display the news field in the top bar select yes', 'thefoxwp'),
                        'options' => array(
					        'yes' => 'Yes',
					        'no' => 'No'
					     ),
					    'default' => 'no'
					),
                    array(
                        'id'        => 'rd_topbar_news_text',
                        'type'      => 'textarea',
                        'required'  => array( 'rd_topbar_news', '=', 'yes') ,
                        'title'     => __('Enter some text to display in the top bar', 'thefoxwp'),
                        'subtitle'  => __('Text to display next to the news icon.', 'thefoxwp'),

                        'validate'  => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
                        'default'   => '<strong>Latest news:</strong> TheFox is the Best Theme on Themeforest'
                    ),
					array(
                        'id'        => 'rd_topbar_icon',
                        'type'      => 'button_set',
                        'required'  => array('rd_topbar', '=', 'yes'),
                        'title'     => __('Display social icon?', 'thefoxwp'),
                        'subtitle'  => __('Turn on to display social Icon.', 'thefoxwp'),
                        'options' => array(
					        'yes' => 'Yes',
					        'no' => 'No',
					     ),
					    'default' => 'no'
					),
					array(
					    'id'       => 'rd_topbar_icon_pos',
					    'type'     => 'button_set',
                        'required'  => array('rd_topbar_icon', '=', 'yes'),
					    'title'    => __('Icon position', 'thefoxwp'),
					    'subtitle' => __('Select the icon position', 'thefoxwp'),

					    //Must provide key => value pairs for options
					    'options' => array(
					        'left' => 'Left',
					        'right' => 'Right'
					     ),
					    'default' => 'right'
					),
					array(
                        'id'        => 'rd_topbar_menu',
                        'type'     => 'button_set',
                        'required'  => array( 'rd_topbar', '=', 'yes') ,
                        'title'     => __('Display an additional menu in the top bar?', 'thefoxwp'),
                        'subtitle'  => __('If you want to use an additional menu in the top bar select yes', 'thefoxwp'),
                        'options' => array(
					        'yes' => 'Yes',
					        'no' => 'No'
					     ),
					    'default' => 'no'
					),
                    array(
                        'id'        => 'rd-notice-critical',
                        'type'      => 'info',
                        'notice'    => true,
                        'style'     => 'critical',
                        'required'  => array('rd_topbar', '=', 'yes'),
                        'title'     => __('WooCommerce Options.', 'thefoxwp'),
                        'desc'      => __('The following options are only available if you are using WooCommerce.', 'thefoxwp')
                    ),
					array(
                        'id'        => 'rd_topbar_cart',
                        'type'     => 'button_set',
                        'required'  => array(  array('rd_header_cart', '=', 'no'), array('rd_topbar', '=', 'yes') ),
                        'title'     => __('Display Cart Icon in the top bar?', 'thefoxwp'),
                        'subtitle'  => __('Turn on to display the Woocommerce my cart icon.', 'thefoxwp'),
                        'options' => array(
					        'yes' => 'Yes',
					        'no' => 'No'
					     ),
					    'default' => 'no'
					),
					array(
                        'id'        => 'rd_topbar_cart_text',
                        'type'      => 'button_set',
                        'required'  => array('rd_topbar_cart', '=', 'yes'),
                        'title'     => __('Make Cart Text Uppercase?', 'thefoxwp'),
                        'subtitle'  => __('If you want to make the Cart Text Uppercase select yes.', 'thefoxwp'),
                        'options' => array(
					        'yes' => 'Yes',
					        'no' => 'No',
					     ),
					    'default' => 'yes'
					),
					array(
                        'id'        => 'rd_topbar_cart_type',
                        'type'      => 'select',
                        'required'  => array('rd_topbar_cart', '=', 'yes'),
                        'title'     => __('Cart Icon style', 'thefoxwp'),
                        'subtitle'  => __('Select the cart icon style', 'thefoxwp'),


                        //Must provide key => value pairs for select options
                        'options'   => array(
                            '' => 'Text and Icon only',
                            'tbi-with-border' => 'With Thin border',
                            'tbi-with-bg' => 'With Background',
                        ),
                        'default'   => ''
                    ),
					array(
                        'id'        => 'rd_topbar_login',
                        'type'     => 'button_set',
                        'required'  => array('rd_topbar', '=', 'yes'),
                        'title'     => __('Display "Login / Register" button?', 'thefoxwp'),
                        'subtitle'  => __('Turn on to display the login / register button.', 'thefoxwp'),
                        'options' => array(
					        'yes' => 'Yes',
					        'no' => 'No'
					     ),
					    'default' => 'no'
					),
					array(
					    'id'       => 'rd_topbar_login_type',
					    'type'     => 'image_select',
                        'required'  => array('rd_topbar_login', '=', 'yes'),
					    'title'    => __('Button style', 'thefoxwp'),
					    'subtitle' => __('Select the style of the button', 'thefoxwp'),
					    'options'  => array(
						'type1'      => array(
				        'alt'   => 'Type 1',
			            'img'   => ReduxFramework::$_url.'assets/img/login_btn_1.jpg'
				        ),
				        'type2'      => array(
			            'alt'   => 'Type 2',
			            'img'   => ReduxFramework::$_url.'assets/img/login_btn_2.jpg'
				        )
								    ),
						    'default' => 'type1'
						),
                    array(
                        'id'        => 'rd-notice-critical_2',
                        'type'      => 'info',
                        'notice'    => true,
                        'style'     => 'critical',
                        'required'  => array('rd_topbar', '=', 'yes'),
                        'title'     => __('WMPL Options.', 'thefoxwp'),
                        'desc'      => __('The following options are only available if you are using WPML plugin.', 'thefoxwp')
                    ),
					array(
                        'id'        => 'rd_topbar_wpml',
                        'type'     => 'button_set',
                        'required'  => array( 'rd_topbar', '=', 'yes') ,
                        'title'     => __('Display "Choose language" in the top bar?', 'thefoxwp'),
                        'subtitle'  => __('Turn on to display the Choose language dropdown in the top bar.', 'thefoxwp'),
                        'options' => array(
					        'yes' => 'Yes',
					        'no' => 'No'
					     ),
					    'default' => 'no'
					),

                )
            ));

			Redux::setSection( $opt_name, array(
                'icon'      => 'el-icon-brush',
                'title'     => __('Dropdown styling', 'thefoxwp'),
                'class'      => 'redux-sm-p',
                'fields'    => array(



                    array(
                        'id'        => 'rd_drop_bg_color',
                        'type'      => 'color',
                        'title'     => __('Dropdown Background Color', 'thefoxwp'),
                        'subtitle'  => __('Background color for dropdown (default: #ffffff).', 'thefoxwp'),
                        'default'   => '#ffffff',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_drop_heading_color',
                        'type'      => 'color',
                        'title'     => __('Dropdown Heading Color', 'thefoxwp'),
                        'subtitle'  => __('Dropdown Heading color (default: #2c3e50).', 'thefoxwp'),
                        'default'   => '#2c3e50',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_drop_text_color',
                        'type'      => 'color',
                        'title'     => __('Dropdown Text Color', 'thefoxwp'),
                        'subtitle'  => __('Dropdown text color (default: #ffffff).', 'thefoxwp'),
                        'default'   => '#a1b1bc',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_drop_hl_color',
                        'type'      => 'color',
                        'title'     => __('Dropdown highlight color', 'thefoxwp'),
                        'subtitle'  => __('Dropdown highlight color (default: #1abc9c).', 'thefoxwp'),
                        'default'   => '#1abc9c',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_drop_hover_color',
                        'type'      => 'color',
                        'title'     => __('Hover color for dark element', 'thefoxwp'),
                        'subtitle'  => __('Dropdown hover color (default: #29d9c2).', 'thefoxwp'),
                        'default'   => '#29d9c2',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_drop_light_hover_color',
                        'type'      => 'color',
                        'title'     => __('Hover color for light element', 'thefoxwp'),
                        'subtitle'  => __('Dropdown light hover color (default: #222533).', 'thefoxwp'),
                        'default'   => '#222533',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_drop_border_color',
                        'type'      => 'color',
                        'title'     => __('Dropdown border color', 'thefoxwp'),
                        'subtitle'  => __('Dropdown border color (default: #ecf0f1).', 'thefoxwp'),
                        'default'   => '#ecf0f1',
                        'validate'  => 'color',
                    ),

                )
            ));






			Redux::setSection( $opt_name, array(
                'icon'      => 'el-icon-brush',
                'title'     => __('Mobile Menu styling', 'thefoxwp'),
                'class'      => 'redux-sm-p',
                'fields'    => array(



					array(
                        'id'        => 'rd_mb_search',
                        'type'     => 'button_set',
                        'title'     => __('Display "Search" field in the Mobile menu?', 'thefoxwp'),
                        'subtitle'  => __('Turn on to display the Search field.', 'thefoxwp'),
                        'options' => array(
					        'yes' => 'Yes',
					        'no' => 'No'
					     ),
					    'default' => 'no'
					),
					array(
                        'id'        => 'rd_mb_text',
                        'type'      => 'color',
                        'title'     => __('Mobile Menu Text color', 'thefoxwp'),
                        'subtitle'  => __('Color for the Text(default: #ffffff).', 'thefoxwp'),
                        'default'   => '#ffffff',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_mb_hl',
                        'type'      => 'color',
                        'title'     => __('Mobile Menu Highlight color', 'thefoxwp'),
                        'subtitle'  => __('Mobile Menu Highlight color (default: #1abc9c).', 'thefoxwp'),
                        'default'   => '#1abc9c',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_mb_icon',
                        'type'      => 'color',
                        'title'     => __('Mobile Menu Icon color', 'thefoxwp'),
                        'subtitle'  => __('Mobile Menu Icon color (default: #5a5d6b).', 'thefoxwp'),
                        'default'   => '#5a5d6b',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_mb_bg',
                        'type'      => 'color',
                        'title'     => __('Mobile Menu Background Color', 'thefoxwp'),
                        'subtitle'  => __('Mobile Menu Background Color (default: #222533).', 'thefoxwp'),
                        'default'   => '#222533',
                        'validate'  => 'color',
                    ),
                    array(
                        'id'        => 'rd_mb_current',
                        'type'      => 'color',
                        'title'     => __('Current page Background Color', 'thefoxwp'),
                        'subtitle'  => __('Background color for current page (default: #191b26).', 'thefoxwp'),
                        'default'   => '#191b26',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_mb_submenu',
                        'type'      => 'color',
                        'title'     => __('Submenu page Background Color', 'thefoxwp'),
                        'subtitle'  => __('Background color for the submenu page(default: #2e3244).', 'thefoxwp'),
                        'default'   => '#2e3244',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_mb_submenu_icon',
                        'type'      => 'color',
                        'title'     => __('Mobile Sub Menu Icon color', 'thefoxwp'),
                        'subtitle'  => __('Mobile Sub Menu Icon color (default: #5d637d).', 'thefoxwp'),
                        'default'   => '#5d637d',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_mb_sub_submenu',
                        'type'      => 'color',
                        'title'     => __('Sub-Submenu page Background Color', 'thefoxwp'),
                        'subtitle'  => __('Background color for the Sub-submenu page(default: #35384d).', 'thefoxwp'),
                        'default'   => '#35384d',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_mb_sub_submenu_text',
                        'type'      => 'color',
                        'title'     => __('Sub-Submenu Text Color', 'thefoxwp'),
                        'subtitle'  => __('Text color for the Sub-submenu page(default: #69708f).', 'thefoxwp'),
                        'default'   => '#69708f',
                        'validate'  => 'color',
                    ),

                )
            ));




			 Redux::setSection( $opt_name, array(
                'icon'      => 'el-icon-brush',
                'title'     => __('Title styling', 'thefoxwp'),
                'class'      => 'redux-sm-p',
                'fields'    => array(




                    array(
                        'id'        => 'rd_title_background',
                        'type'      => 'background',
                        'output'    => array('.page_title_ctn'),
                        'title'     => __('Title Background Color / Image', 'thefoxwp'),
                        'subtitle'  => __('Select the Title background color or Image.', 'thefoxwp'),
                        'default'   => '#f9fafb',
                    ),
					array(
                        'id'        => 'rd_title_color',
                        'type'      => 'color',
                        'title'     => __('Title Text Color', 'thefoxwp'),
                        'subtitle'  => __('Title text color (default: #2c3e50).', 'thefoxwp'),
                        'default'   => '#2c3e50',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_title_border',
                        'type'      => 'color',
                        'title'     => __('Title border color', 'thefoxwp'),
                        'subtitle'  => __('Title Border color (default: #ecf0f1).', 'thefoxwp'),
                        'default'   => '#ecf0f1',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_breadcrumbs_color',
                        'type'      => 'color',
                        'title'     => __('Breadcrumbs Color', 'thefoxwp'),
                        'subtitle'  => __('Breadcrumbs text color (default: #a1b1bc).', 'thefoxwp'),
                        'default'   => '#a1b1bc',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_breadbtn_bg_color',
                        'type'      => 'color',
                        'title'     => __('Breadcrumbs button background Color', 'thefoxwp'),
                        'subtitle'  => __('Breadcrumbs button background color (default: #ffffff).', 'thefoxwp'),
                        'default'   => '#ffffff',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_breadbtn_text_color',
                        'type'      => 'color',
                        'title'     => __('Breadcrumbs button text and border Color', 'thefoxwp'),
                        'subtitle'  => __('Breadcrumbs button text and border color (default: #a1b1bc).', 'thefoxwp'),
                        'default'   => '#a1b1bc',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_breadcrumbs',
                        'type'      => 'switch',
                        'title'     => __('Show breadcrumbs?', 'thefoxwp'),
                        'subtitle'  => __('Turn on to show the breadcrumbs in the title.', 'thefoxwp'),
                        'default'   => true,
                    ),

                )
            ));


			Redux::setSection( $opt_name, array(
                'icon'      => 'el-icon-brush',
                'title'     => __('Main content styling', 'thefoxwp'),
                'class'      => 'redux-sm-p',
                'fields'    => array(



                    array(
                        'id'        => 'rd_content_bg_color',
                        'type'      => 'color',
                        'title'     => __('Main content Background Color', 'thefoxwp'),
                        'subtitle'  => __('Background color for the Main content (default: #ffffff).', 'thefoxwp'),
                        'default'   => '#ffffff',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_content_heading_color',
                        'type'      => 'color',
                        'title'     => __('Main content Heading Color', 'thefoxwp'),
                        'subtitle'  => __('Main content Heading color (default: #2c3e50).', 'thefoxwp'),
                        'default'   => '#2c3e50',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_content_text_color',
                        'type'      => 'color',
                        'title'     => __('Main content Text Color', 'thefoxwp'),
                        'subtitle'  => __('Main content text color (default: #ffffff).', 'thefoxwp'),
                        'default'   => '#a1b1bc',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_content_hl_color',
                        'type'      => 'color',
                        'title'     => __('Main content highlight color', 'thefoxwp'),
                        'subtitle'  => __('Main content highlight color (default: #1abc9c).', 'thefoxwp'),
                        'default'   => '#1abc9c',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_content_hover_color',
                        'type'      => 'color',
                        'title'     => __('Hover color for dark element', 'thefoxwp'),
                        'subtitle'  => __('Main content hover color (default: #29d9c2).', 'thefoxwp'),
                        'default'   => '#29d9c2',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_content_light_hover_color',
                        'type'      => 'color',
                        'title'     => __('Hover color for light element', 'thefoxwp'),
                        'subtitle'  => __('Main content light hover color (default: #222533).', 'thefoxwp'),
                        'default'   => '#222533',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_content_border_color',
                        'type'      => 'color',
                        'title'     => __('Main content border color', 'thefoxwp'),
                        'subtitle'  => __('Main content border color (default: #ecf0f1).', 'thefoxwp'),
                        'default'   => '#ecf0f1',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_content_grey_color',
                        'type'      => 'color',
                        'title'     => __('Main content grey field color', 'thefoxwp'),
                        'subtitle'  => __('Grey field background color (default: #f9fafb).', 'thefoxwp'),
                        'default'   => '#f9fafb',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_content_alt_bg_color',
                        'type'      => 'color',
                        'title'     => __('Alternative Background Color', 'thefoxwp'),
                        'subtitle'  => __('Alternative Background color for the elements e.g icon box, tab etc.. (default: #ffffff).', 'thefoxwp'),
                        'default'   => '#ffffff',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_content_alt_heading_color',
                        'type'      => 'color',
                        'title'     => __('Alternative Heading Color', 'thefoxwp'),
                        'subtitle'  => __('Alternative Main content Heading color for elements e.g icon box, tab etc..(default: #2c3e50).', 'thefoxwp'),
                        'default'   => '#2c3e50',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_content_alt_text_color',
                        'type'      => 'color',
                        'title'     => __('Alternative Text Color', 'thefoxwp'),
                        'subtitle'  => __('Alternative text color (default: #ffffff).', 'thefoxwp'),
                        'default'   => '#a1b1bc',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_content_alt_hl_color',
                        'type'      => 'color',
                        'title'     => __('Alternative highlight color', 'thefoxwp'),
                        'subtitle'  => __('Alternative highlight color (default: #21c2f8).', 'thefoxwp'),
                        'default'   => '#21c2f8',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_content_alt_hover_color',
                        'type'      => 'color',
                        'title'     => __('Alternative hover color for dark element', 'thefoxwp'),
                        'subtitle'  => __('Alternative hover color (default: #46d1ff).', 'thefoxwp'),
                        'default'   => '#46d1ff',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_content_alt_light_hover_color',
                        'type'      => 'color',
                        'title'     => __('Alternative hover color for light element', 'thefoxwp'),
                        'subtitle'  => __('Alternative hover color (default: #222533).', 'thefoxwp'),
                        'default'   => '#222533',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_content_alt_border_color',
                        'type'      => 'color',
                        'title'     => __('Alternative border color', 'thefoxwp'),
                        'subtitle'  => __('Alternative border color (default: #eceef0).', 'thefoxwp'),
                        'default'   => '#eceef0',
                        'validate'  => 'color',
                    ),

                )
            ));



			Redux::setSection( $opt_name, array(
                'icon'      => 'el-icon-brush',
                'title'     => __('Footer styling', 'thefoxwp'),
                'class'      => 'redux-sm-p',
                'fields'    => array(



					array(
                        'id'        => 'rd_footer',
                        'type'      => 'button_set',
                        'title'     => __('Show Footer?', 'thefoxwp'),
                        'subtitle'  => __('Turn on to show the Footer.', 'thefoxwp'),
                        'options' => array(
					        'yes' => 'Yes',
					        'no' => 'No',
					     ),
					    'default' => 'yes'
					),


                    array(
                        'id'        => 'rd_footer_col',
                        'type'      => 'select',
                        'required'  => array('rd_footer', '=', 'yes'),
                        'title'     => __('Footer columns number', 'thefoxwp'),
                        'subtitle'  => __('Select the Footer number of columns', 'thefoxwp'),


                        //Must provide key => value pairs for select options
                        'options'   => array(
                            'footer_1_col' => '1 column',
                            'footer_2_col' => '2 columns',
                            'footer_3_col' => '3 columns',
                            'footer_4_col' => '4 columns',
                        ),
                        'default'   => 'footer_4_col'
                    ),

                    array(
                        'id'        => 'rd_footer_type',
                        'type'      => 'select',
                        'required'  => array('rd_footer', '=', 'yes'),
                        'title'     => __('Footer style', 'thefoxwp'),
                        'subtitle'  => __('Select the Footer style', 'thefoxwp'),


                        //Must provide key => value pairs for select options
                        'options'   => array(
                            'footer_type_1' => 'type 1',
                            'footer_type_2' => 'type 2',
                            'footer_type_3' => 'type 3',
                            'footer_type_4' => 'type 4',
                            'footer_type_5' => 'type 5',
                            'footer_type_6' => 'type 6',
                            'footer_type_7' => 'type 7',
                            'footer_type_8' => 'type 8',
                            'footer_type_9' => 'type 9',
                            'footer_type_10' => 'type 10',
                            'footer_type_11' => 'type 11',
                            'footer_type_12' => 'type 12',
                        ),
                        'default'   => 'footer_type_1'
                    ),
                    array(
                        'id'        => 'rd_footer_bg_color',
                        'type'      => 'color',
                        'required'  => array('rd_footer', '=', 'yes'),
                        'title'     => __('Footer Background Color', 'thefoxwp'),
                        'subtitle'  => __('Background color for the Footer (default: #1a1c27).', 'thefoxwp'),
                        'default'   => '#1a1c27',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_footer_heading_color',
                        'type'      => 'color',
                        'required'  => array('rd_footer', '=', 'yes'),
                        'title'     => __('Footer Heading Color', 'thefoxwp'),
                        'subtitle'  => __('Footer Heading color (default: #ffffff).', 'thefoxwp'),
                        'default'   => '#ffffff',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_footer_text_color',
                        'type'      => 'color',
                        'required'  => array('rd_footer', '=', 'yes'),
                        'title'     => __('Footer Text Color', 'thefoxwp'),
                        'subtitle'  => __('Footer text color (default: #a1b1bc).', 'thefoxwp'),
                        'default'   => '#a1b1bc',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_footer_hl_color',
                        'type'      => 'color',
                        'required'  => array('rd_footer', '=', 'yes'),
                        'title'     => __('Footer highlight color', 'thefoxwp'),
                        'subtitle'  => __('Footer highlight color (default: #1abc9c).', 'thefoxwp'),
                        'default'   => '#1abc9c',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_footer_hover_color',
                        'type'      => 'color',
                        'required'  => array('rd_footer', '=', 'yes'),
                        'title'     => __('Footer hover color', 'thefoxwp'),
                        'subtitle'  => __('Footer hover color (default: #1abc9c).', 'thefoxwp'),
                        'default'   => '#1abc9c',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_footer_border_color',
                        'type'      => 'color',
                        'required'  => array('rd_footer', '=', 'yes'),
                        'title'     => __('Footer border color', 'thefoxwp'),
                        'subtitle'  => __('Footer border color (default: #243240).', 'thefoxwp'),
                        'default'   => '#243240',
                        'validate'  => 'color',
                    ),
                    array(
                        'id'        => 'rd-notice-info',
                        'type'      => 'info',
                        'notice'    => true,
                        'style'     => 'info',
                        'title'     => __('Footer under bar.', 'thefoxwp'),
                        'desc'      => __('If you\'d like to use an under Bar for the Footer please see settings below.', 'thefoxwp')
                    ),


					array(
                        'id'        => 'rd_footer_bar',
                        'type'      => 'button_set',
						'title'     => __('Use Under Bar', 'thefoxwp'),
                        'subtitle'  => __('Turn ON to use an under bar.', 'thefoxwp'),
                        'options' => array(
					        'yes' => 'Yes',
					        'no' => 'No',
					     ),
					    'default' => 'yes'
					),
					array(
                        'id'        => 'rd_footer_html',
                        'type'      => 'button_set',
                        'required'  => array('rd_footer_bar', '=', 'yes'),
						'title'     => __('Show custom text ?', 'thefoxwp'),
                        'subtitle'  => __('Select Yes to show your custom text in the under bar.', 'thefoxwp'),
                        'options' => array(
					        'yes' => 'Yes',
					        'no' => 'No',
					     ),
					    'default' => 'yes'
					),
					array(
                        'id'        => 'rd_footer_html_pos',
                        'type'      => 'button_set',
                        'required'  => array(  array('rd_footer_bar', '=', 'yes'), array('rd_footer_html', '=', 'yes') ),
						'title'     => __('Custom text position', 'thefoxwp'),
                        'subtitle'  => __('Select Custom text position.', 'thefoxwp'),
                        'options' => array(
					        'f_message_left' => 'Left',
					        'f_message_right' => 'Right',
					     ),
					    'default' => 'f_message_left'
					),
                    array(
                        'id'        => 'rd_footer_message',
                        'type'      => 'textarea',
                        'required'  => array(  array('rd_footer_bar', '=', 'yes'), array('rd_footer_html', '=', 'yes') ),
                        'title'     => __('Text to display in footer under bar', 'thefoxwp'),
                        'subtitle'  => __('write your copyright information or anything you\'d like.', 'thefoxwp'),

                        'validate'  => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
                        'default'   => 'Copyright 2015 <a href="http://themeforest.net/user/tranmautritam?ref=tranmautritam" target="_blank">Tranmautritam\'s team</a>   |   All Rights Reserved'
                    ),
					array(
                        'id'        => 'rd_footer_social',
                        'type'      => 'button_set',
                        'required'  => array('rd_footer_bar', '=', 'yes'),
						'title'     => __('Show Social icons in the bar?', 'thefoxwp'),
                        'subtitle'  => __('Select Yes to show the social icons in the bar.', 'thefoxwp'),
                        'options' => array(
					        'yes' => 'Yes',
					        'no' => 'No',
					     ),
					    'default' => 'yes'
					),
					array(
                        'id'        => 'rd_footer_social_pos',
                        'type'      => 'button_set',
                        'required'  => array(  array('rd_footer_bar', '=', 'yes'), array('rd_footer_social', '=', 'yes') ),
						'title'     => __('Social Icons positions', 'thefoxwp'),
                        'subtitle'  => __('Select the socials icon positions.', 'thefoxwp'),
                        'options' => array(
					        'f_si_left' => 'Left',
					        'f_si_right' => 'Right',
					     ),
					    'default' => 'f_si_right'
					),
					array(
                        'id'        => 'rd_footer_social_type',
                        'type'      => 'select',
                        'required'  => array(  array('rd_footer_bar', '=', 'yes'), array('rd_footer_social', '=', 'yes') ),
						'title'     => __('Social Icons style', 'thefoxwp'),
                        'subtitle'  => __('Select the socials icon style.', 'thefoxwp'),
                        'options' => array(
					        'f_si_type1' => 'Icons only',
					        'f_si_type2' => 'Icons with colored background',
					     ),
					    'default' => 'f_si_type1'
					),
					array(
                        'id'        => 'rd_footer_menu',
                        'type'      => 'button_set',
                        'required'  => array('rd_footer_bar', '=', 'yes'),
						'title'     => __('Show menu in the bar?', 'thefoxwp'),
                        'subtitle'  => __('Select Yes to show the menu in the bar.', 'thefoxwp'),
                        'options' => array(
					        'yes' => 'Yes',
					        'no' => 'No',
					     ),
					    'default' => 'yes'
					),
					array(
                        'id'        => 'rd_footer_menu_pos',
                        'type'      => 'button_set',
                        'required'  => array(  array('rd_footer_bar', '=', 'yes'), array('rd_footer_menu', '=', 'yes') ),
						'title'     => __('Menu position', 'thefoxwp'),
                        'subtitle'  => __('Select the menu position.', 'thefoxwp'),
                        'options' => array(
					        'f_menu_left' => 'Left',
					        'f_menu_right' => 'Right',
					     ),
					    'default' => 'f_menu_left'
					),
					array(
                        'id'        => 'rd_footer_menu_type',
                        'type'      => 'select',
                        'required'  => array(  array('rd_footer_bar', '=', 'yes'), array('rd_footer_menu', '=', 'yes') ),
						'title'     => __('Menu style', 'thefoxwp'),
                        'subtitle'  => __('Select Menu style.', 'thefoxwp'),
                        'options' => array(
					        'm_normal' => 'Normal',
					        'm_uppercase' => 'Uppercase',
					        'm_normal_bold' => 'Normal / Bold ',
					        'm_uppercase_bold' => 'Uppercase / Bold ',
					     ),
					    'default' => 'm_normal'
					),
                    array(
                        'id'        => 'rd_footer_bar_bg_color',
                        'type'      => 'color',
                        'required'  => array('rd_footer_bar', '=', 'yes'),
                        'title'     => __('Under bar Background Color', 'thefoxwp'),
                        'subtitle'  => __('Background color for the under bar (default: #222533).', 'thefoxwp'),
                        'default'   => '#222533',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_footer_bar_heading_color',
                        'type'      => 'color',
                        'required'  => array('rd_footer_bar', '=', 'yes'),
                        'title'     => __('Under bar Heading Color', 'thefoxwp'),
                        'subtitle'  => __('Under bar Heading color (default: #ffffff).', 'thefoxwp'),
                        'default'   => '#ffffff',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_footer_bar_text_color',
                        'type'      => 'color',
                        'required'  => array('rd_footer_bar', '=', 'yes'),
                        'title'     => __('Under bar Text Color', 'thefoxwp'),
                        'subtitle'  => __('Under bar text color (default: #a1b1bc).', 'thefoxwp'),
                        'default'   => '#a1b1bc',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_footer_bar_hl_color',
                        'type'      => 'color',
                        'required'  => array('rd_footer_bar', '=', 'yes'),
                        'title'     => __('Under bar highlight color', 'thefoxwp'),
                        'subtitle'  => __('Under bar highlight color (default: #1abc9c).', 'thefoxwp'),
                        'default'   => '#1abc9c',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_footer_bar_hover_color',
                        'type'      => 'color',
                        'required'  => array('rd_footer_bar', '=', 'yes'),
                        'title'     => __('Under bar hover color', 'thefoxwp'),
                        'subtitle'  => __('Under bar hover color (default: #ffffff).', 'thefoxwp'),
                        'default'   => '#ffffff',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_footer_bar_border_color',
                        'type'      => 'color',
                        'required'  => array('rd_footer_bar', '=', 'yes'),
                        'title'     => __('Under bar border color', 'thefoxwp'),
                        'subtitle'  => __('Under bar border color (default: #282b39).', 'thefoxwp'),
                        'default'   => '#282b39',
                        'validate'  => 'color',
                    ),

                )
            ));



            Redux::setSection( $opt_name, array(
                'icon'      => 'el-icon-th',
                'title'     => __('Blog options', 'thefoxwp'),
                'class'      => 'redux-sm-p',
                'fields'    => array(


					array(
                        'id'        => 'rd_blog_title',
                        'type'      => 'text',
                        'title'     => __('Category / Tag page name', 'thefoxwp'),
                        'subtitle'  => __('Leave blank to use the translation string.', 'thefoxwp'),

                        'default'   => '',
//                        'text_hint' => array(
//                            'title'     => '',
//                            'content'   => 'Please enter a valid <strong>URL</strong> in this field.'
//                        )
                    ),
					array(
                        'id'        => 'rd_blog_design_type',
                        'type'      => 'select',
						'title'     => __('Single post design type', 'thefoxwp'),
                        'subtitle'  => __('Select single post design type.', 'thefoxwp'),
                        'options' => array(
					        'classic' => 'Classic',
					        'business' => 'Business',
					     ),
					    'default' => 'classic'
					),
					array(
                        'id'        => 'rd_blog_single_sidebar',
                        'type'      => 'select',
						'title'     => __('Remove Sidebar for all the single post page?', 'thefoxwp'),
                        'subtitle'  => __('Select if you want to remove the sidebar from all single blog posts.', 'thefoxwp'),
                        'options' => array(
					        'no' => 'No',
					        'yes' => 'Yes',
					     ),
					    'default' => 'no'
					),
					array(
                        'id'        => 'rd_blog_single_nav',
                        'type'      => 'select',
						'title'     => __('Hide Navigation for all Single post?', 'thefoxwp'),
                        'subtitle'  => __('Select if you want to hide the Navigation on all blog posts.', 'thefoxwp'),
                        'options' => array(
					        'no' => 'No',
					        'yes' => 'Yes',
					     ),
					    'default' => 'no'
					),
					array(
                        'id'        => 'rd_blog_single_share',
                        'type'      => 'select',
						'title'     => __('Hide Share buttons for all Single post?', 'thefoxwp'),
                        'subtitle'  => __('Select if you want to hide the share buttons on all blog posts.', 'thefoxwp'),
                        'options' => array(
					        'no' => 'No',
					        'yes' => 'Yes',
					     ),
					    'default' => 'no'
					),
					array(
                        'id'        => 'rd_blog_single_author',
                        'type'      => 'select',
						'title'     => __('Hide Author biography for all Single post?', 'thefoxwp'),
                        'subtitle'  => __('Select if you want to hide Author biography on all blog posts.', 'thefoxwp'),
                        'options' => array(
					        'no' => 'No',
					        'yes' => 'Yes',
					     ),
					    'default' => 'no'
					),
					array(
                        'id'        => 'rd_blog_single_related',
                        'type'      => 'select',
						'title'     => __('Hide Related Posts for all Single post?', 'thefoxwp'),
                        'subtitle'  => __('Select if you want to hide the related post on all blog posts.', 'thefoxwp'),
                        'options' => array(
					        'no' => 'No',
					        'yes' => 'Yes',
					     ),
					    'default' => 'no'
					),
					array(
                        'id'        => 'rd_blog_sidebar',
                        'type'      => 'button_set',
						'title'     => __('Show Sidebar for tags, category, etc pages?', 'thefoxwp'),
                        'subtitle'  => __('Select Yes to show the Sidebar.', 'thefoxwp'),
                        'options' => array(
					        'yes' => 'Yes',
					        'no' => 'No',
					     ),
					    'default' => 'yes'
					),


                )
            ));


 Redux::setSection( $opt_name, array(
                'icon'      => 'el-icon-th',
                'title'     => __('Sidebar options', 'thefoxwp'),
                'class'      => 'redux-sm-p',
                'fields'    => array(

					array(
                        'id'        => 'rd_sidebar_style',
                        'type'      => 'select',
						'title'     => __('Sidebar Style', 'thefoxwp'),
                        'subtitle'  => __('Select the Sidebar style.', 'thefoxwp'),
                        'options' => array(
					        '' => 'Default',
					        'business_sb' => 'Business ( with background )',
					     ),
					    'default' => 'yes'
					),

                    array(
                        'id'        => 'rd_sidebar_bg_color',
                        'type'      => 'color',
                        'required'  => array('rd_sidebar_style', '=', 'business_sb'),
                        'title'     => __('Sidebar background Color', 'thefoxwp'),
                        'subtitle'  => __('Background color for the sidebar (default: #f7f7f7).', 'thefoxwp'),
                        'default'   => '#f7f7f7',
                        'validate'  => 'color',
                    ),
                    array(
                        'id'        => 'rd_sidebar_alt_bg_color',
                        'type'      => 'color',
                        'required'  => array('rd_sidebar_style', '=', 'business_sb'),
                        'title'     => __('Sidebar alternative background color ( for field etc )', 'thefoxwp'),
                        'subtitle'  => __('Alternative Background color for Sidebar (default: #fffff).', 'thefoxwp'),
                        'default'   => '#ffffff',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_sidebar_heading_color',
                        'type'      => 'color',
                        'required'  => array('rd_sidebar_style', '=', 'business_sb'),
                        'title'     => __('Sidebar Heading Color', 'thefoxwp'),
                        'subtitle'  => __('Sidebar Heading color (default: #333333).', 'thefoxwp'),
                        'default'   => '#333333',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_sidebar_text_color',
                        'type'      => 'color',
                        'required'  => array('rd_sidebar_style', '=', 'business_sb'),
                        'title'     => __('Sidebar Text Color', 'thefoxwp'),
                        'subtitle'  => __('Sidebar text color (default: #999999).', 'thefoxwp'),
                        'default'   => '#999999',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_sidebar_hover_color',
                        'type'      => 'color',
                        'required'  => array('rd_sidebar_style', '=', 'business_sb'),
                        'title'     => __('Sidebar hover color', 'thefoxwp'),
                        'subtitle'  => __('Sidebar hover color (default: #4285f4).', 'thefoxwp'),
                        'default'   => '#4285f4',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_sidebar_border_color',
                        'type'      => 'color',
                        'required'  => array('rd_sidebar_style', '=', 'business_sb'),
                        'title'     => __('Sidebar border color', 'thefoxwp'),
                        'subtitle'  => __('Sidebar border color (default: #ebebeb).', 'thefoxwp'),
                        'default'   => '#ebebeb',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_sidebarbar_hl_color',
                        'type'      => 'color',
                        'required'  => array('rd_sidebar_style', '=', 'business_sb'),
                        'title'     => __('Widget Under bar highlight color', 'thefoxwp'),
                        'subtitle'  => __('Widget Under bar highlight color (default: #00f0ff).', 'thefoxwp'),
                        'default'   => '#00f0ff',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_sidebarbar_althl_color',
                        'type'      => 'color',
                        'required'  => array('rd_sidebar_style', '=', 'business_sb'),
                        'title'     => __('Widget Under bar second highlight color', 'thefoxwp'),
                        'subtitle'  => __('Widget Under bar highlight color (default: #ebacfd).', 'thefoxwp'),
                        'default'   => '#ebacfd',
                        'validate'  => 'color',
                    ),


                )
            ));

            Redux::setSection( $opt_name, array(
                'icon'      => 'el-icon-th',
                'title'     => __('Portfolio options', 'thefoxwp'),
                'class'      => 'redux-sm-p',
                'fields'    => array(
                    array(
                        'id'        => 'rd_bc_portlink',
                        'type'      => 'text',
                        'title'     => __('URL to your Main Portfolio Page', 'thefoxwp'),
                        'subtitle'  => __('This must be a URL.', 'thefoxwp'),
                        'desc'      => __('Put the URL of your Portfolio page.', 'thefoxwp'),
                        'validate'  => 'url',
                        'default'   => '',
//                        'text_hint' => array(
//                            'title'     => '',
//                            'content'   => 'Please enter a valid <strong>URL</strong> in this field.'
//                        )
                    ),
					array(
                        'id'        => 'rd_bc_porttext',
                        'type'      => 'text',
                        'title'     => __('Portfolio breadcrumbs name', 'thefoxwp'),
                        'subtitle'  => __('Insert the title for the portfolio breadcrumbs.', 'thefoxwp'),

                        'default'   => 'Portfolio',
//                        'text_hint' => array(
//                            'title'     => '',
//                            'content'   => 'Please enter a valid <strong>URL</strong> in this field.'
//                        )
                    ),
					array(
                        'id'        => 'rd_port_slug',
                        'type'      => 'text',
                        'title'     => __('Custom Slug', 'thefoxwp'),
                        'subtitle'  => __('If you want your portfolio post type to have a custom slug in the url, please enter it here. .', 'thefoxwp'),
                        'desc'      => __('You will still have to refresh your permalinks after saving this!
This is done by going to Settings > Permalinks and clicking save.', 'thefoxwp'),
                        'validate'  => 'str_replace',
						'str'       => array(
                            'search'        => ' ',
                            'replacement'   => '-'
                        ),
                        'default'   => 'project',
                    ),

                )
            ));




            Redux::setSection( $opt_name, array(
                'icon'      => 'el-icon-th',
                'title'     => __('Staff options', 'thefoxwp'),
                'class'      => 'redux-sm-p',
                'fields'    => array(
                    array(
                        'id'        => 'rd_bc_stafflink',
                        'type'      => 'text',
                        'title'     => __('URL to your Main Staff Page', 'thefoxwp'),
                        'subtitle'  => __('This must be a URL.', 'thefoxwp'),
                        'desc'      => __('Put the URL of your Staff page.', 'thefoxwp'),
                        'validate'  => 'url',
                        'default'   => '',
//                        'text_hint' => array(
//                            'title'     => '',
//                            'content'   => 'Please enter a valid <strong>URL</strong> in this field.'
//                        )
                    ),
					array(
                        'id'        => 'rd_bc_stafftext',
                        'type'      => 'text',
                        'title'     => __('Staff breadcrumbs name', 'thefoxwp'),
                        'subtitle'  => __('Insert the title for the Staff breadcrumbs.', 'thefoxwp'),

                        'default'   => 'Staff',
//                        'text_hint' => array(
//                            'title'     => '',
//                            'content'   => 'Please enter a valid <strong>URL</strong> in this field.'
//                        )
                    ),
					array(
                        'id'        => 'rd_staff_slug',
                        'type'      => 'text',
                        'title'     => __('Custom Slug', 'thefoxwp'),
                        'subtitle'  => __('If you want your staff post type to have a custom slug in the url, please enter it here. .', 'thefoxwp'),
                        'desc'      => __('You will still have to refresh your permalinks after saving this!
This is done by going to Settings > Permalinks and clicking save.', 'thefoxwp'),
                        'validate'  => 'str_replace',
						'str'       => array(
                            'search'        => ' ',
                            'replacement'   => '-'
                        ),
                        'default'   => 'staff',
                    ),

                )
            ));


            Redux::setSection( $opt_name, array(
                'icon'      => 'el-icon-shopping-cart-sign',
                'title'     => __('WooCommerce options', 'thefoxwp'),
                'class'      => 'redux-sm-p',
                'fields'    => array(
					array(
                        'id'        => 'rd_shop_design',
                        'type'      => 'select',
                        'title'     => __('Shop Item design', 'thefoxwp'),
                        'subtitle'  => __('Select the Shop Item design', 'thefoxwp'),


                        //Must provide key => value pairs for select options
                        'options'   => array(
                            'classic' => 'Classic',
                            'trending' => 'Trending',
                        ),
                        'default'   => 'classic'
                    ),
					array(
                        'id'        => 'rd_shop_columns',
                        'type'      => 'select',
                        'title'     => __('Shop page layout', 'thefoxwp'),
                        'subtitle'  => __('Select the number of columns for the shop page', 'thefoxwp'),


                        //Must provide key => value pairs for select options
                        'options'   => array(
                            '2' => '2',
                            '3' => '3',
                            '4' => '4'
                        ),
                        'default'   => '3'
                    ),
                    array(
                        'id'        => 'rd_shop_item_per_page',
                        'type'      => 'text',
                        'title'     => __('Item per page', 'thefoxwp'),
                        'subtitle'  => __('Choose the number of item to show per page. e.g 12', 'thefoxwp'),

                        'validate'  => 'numeric',
                        'default'   => '12',
                    ),
					array(
                        'id'        => 'rd_bc_shoplink',
                        'type'      => 'text',
                        'title'     => __('URL to your Main Shop Page', 'thefoxwp'),
                        'subtitle'  => __('This must be a URL.', 'thefoxwp'),
                        'desc'      => __('Put the URL of your Shop page.', 'thefoxwp'),
                        'validate'  => 'url',
                        'default'   => '',
//                        'text_hint' => array(
//                            'title'     => '',
//                            'content'   => 'Please enter a valid <strong>URL</strong> in this field.'
//                        )
                    ),
					array(
                        'id'        => 'rd_bc_shoptext',
                        'type'      => 'text',
                        'title'     => __('Shop breadcrumbs name', 'thefoxwp'),
                        'subtitle'  => __('Insert the title for the Shop breadcrumbs.', 'thefoxwp'),

                        'default'   => 'Shop',
//                        'text_hint' => array(
//                            'title'     => '',
//                            'content'   => 'Please enter a valid <strong>URL</strong> in this field.'
//                        )
                    ),

                )
            ));

            Redux::setSection( $opt_name, array(
                'icon'      => 'el-icon-repeat',
                'title'     => __('Page Loader', 'thefoxwp'),
                'class'      => 'redux-sm-p',
                'fields'    => array(
					array(
                        'id'        => 'rd_loader',
                        'type'      => 'button_set',
                        'title'     => __('Use Page Pre-Loader?', 'thefoxwp'),
                        'subtitle'  => __('If you want to use a pre-loader for the page select yes.', 'thefoxwp'),
                        'options' => array(
					        'yes' => 'Yes',
					        'no' => 'No',
					     ),
					    'default' => 'yes'
					),
					array(
                        'id'        => 'rd_loader_style',
                        'type'      => 'button_set',
						'required'  => array('rd_loader', '=', 'yes'),
                        'title'     => __('Select the Loader main color', 'thefoxwp'),
                        'subtitle'  => __('Select If you want to use the Light or Dark Style for the Loader.', 'thefoxwp'),
                        'options' => array(
					        'white_loader' => 'Light',
					        'dark_loader' => 'Dark',
					     ),
					    'default' => 'white_loader'
					),

					array(
                        'id'        => 'rd_loader_type',
                        'type'      => 'button_set',
						'required'  => array('rd_loader', '=', 'yes'),
                        'title'     => __('Select the Loader type ( Design )', 'thefoxwp'),
                        'subtitle'  => __('Select If you want to use the Simple Design (small) or Complex Design (big).', 'thefoxwp'),
                        'options' => array(
					        'simple_loader' => 'Simple',
					        'complex_loader' => 'Complex',
					     ),
					    'default' => 'complex_loader'
					),
					array(
                        'id'        => 'rd_loader_bar_first_color',
						'required'  => array('rd_loader', '=', 'yes'),
                        'type'      => 'color',
                        'title'     => __('Loading bar first color', 'thefoxwp'),
                        'subtitle'  => __('Loading bar first color.', 'thefoxwp'),
                        'default'   => '#21c2f8',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_loader_bar_second_color',
						'required'  => array('rd_loader', '=', 'yes'),
                        'type'      => 'color',
                        'title'     => __('Loading bar second color', 'thefoxwp'),
                        'subtitle'  => __('Loading bar second color.', 'thefoxwp'),
                        'default'   => '#13d4ae',
                        'validate'  => 'color',
                    ),
                    array(
                        'id'        => 'rd_loader_logo',
						'required'  => array('rd_loader_type', '=', 'complex_loader'),
                        'type'      => 'media',
						'url'      => true,
                        'title'     => __('Loader Logo upload', 'thefoxwp'),

                        'subtitle'  => __('Use big logo for retina ready display', 'thefoxwp'),
						'default'  => array(
							'url'=>'http://thefoxwp.com/wp-content/uploads/2015/03/thefox-logo2.png'
					    ),
                    ),
					array(
                        'id'        => 'rd_loader_sb_first_color',
						'required'  => array('rd_loader_type', '=', 'complex_loader'),
                        'type'      => 'color',
                        'title'     => __('Spinning bar first color', 'thefoxwp'),
                        'subtitle'  => __('Spinning bar first color.', 'thefoxwp'),
                        'default'   => '#1abc9c',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_loader_sb_second_color',
						'required'  => array('rd_loader_type', '=', 'complex_loader'),
                        'type'      => 'color',
                        'title'     => __('Spinning bar second color', 'thefoxwp'),
                        'subtitle'  => __('Spinning bar second color (for gradient).', 'thefoxwp'),
                        'default'   => '#34C0BF',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_loader_sb_third_color',
						'required'  => array('rd_loader_type', '=', 'complex_loader'),
                        'type'      => 'color',
                        'title'     => __('Spinning bar third color', 'thefoxwp'),
                        'subtitle'  => __('Spinning bar third color (for gradient).', 'thefoxwp'),
                        'default'   => '#4DC4E2',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_loader_sb_ball_color',
						'required'  => array('rd_loader_type', '=', 'complex_loader'),
                        'type'      => 'color',
                        'title'     => __('Spinning bar ball color', 'thefoxwp'),
                        'subtitle'  => __('Spinning bar ball color.', 'thefoxwp'),
                        'default'   => '#21C2F8',
                        'validate'  => 'color',
                    ),

                )
            ));

            Redux::setSection( $opt_name, array(
                'icon'      => 'el-icon-remove-circle',
                'title'     => __('Page 404 options', 'thefoxwp'),
                'class'      => 'redux-sm-p',
                'fields'    => array(
                    array(
                        'id'        => 'rd_error_title',
                        'type'      => 'text',
                        'title'     => __('Page 404 Title', 'thefoxwp'),
                        'subtitle'  => __('Insert the 404 page Title', 'thefoxwp'),

                        'default'   => 'Page Not Found',
                    ),
					array(
                        'id'        => 'rd_error_text',
                        'type'      => 'text',
                        'title'     => __('Page 404 Error Text', 'thefoxwp'),
                        'subtitle'  => __('Insert the Error text to show', 'thefoxwp'),

                        'default'   => 'Oops, This Page Could Not Be Found!',
                    ),
					array(
                        'id'        => 'rd_error_subtext',
                        'type'      => 'text',
                        'title'     => __('Page 404 Error Sub-Text', 'thefoxwp'),
                        'subtitle'  => __('Insert the second Error text to show', 'thefoxwp'),

                        'default'   => 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.',
                    ),
                    array(
                        'id'        => 'rd_error_img',
                        'type'      => 'media',
						'url'      => true,
                        'title'     => __('Page 404 image', 'thefoxwp'),
                        'desc'      => __('Upload an Image if you want to replace the Page 404 default image', 'thefoxwp'),
                        'subtitle'  => __('Will be to replace the 404 image', 'thefoxwp'),
						'default'  => array(
							'url'=>''
					    ),
                    ),

                )
            ));



            Redux::setSection( $opt_name, array(
                'icon'      => 'el-icon-time',
                'title'     => __('Coming Soon Page', 'thefoxwp'),
                'class'      => 'redux-sm-p',
                'fields'    => array(
					array(
                        'id'        => 'rd_csp_style',
                        'type'      => 'button_set',
                        'title'     => __('Select the Coming Soon Page Style ( Design )', 'thefoxwp'),
                        'subtitle'  => __('Select If you want to use the Light or Dark Style for the coming soon page.', 'thefoxwp'),
                        'options' => array(
					        'white_csp' => 'Light',
					        'dark_csp' => 'Dark',
					     ),
					    'default' => 'white_csp'
					),
					array(
                        'id'        => 'rd_csp_first_color',
                        'type'      => 'color',
                        'title'     => __('Loading bar first color', 'thefoxwp'),
                        'subtitle'  => __('Loading spining bar first color.', 'thefoxwp'),
                        'default'   => '#1abc9c',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_csp_second_color',
                        'type'      => 'color',
                        'title'     => __('Loading bar second color', 'thefoxwp'),
                        'subtitle'  => __('Loading Spinning bar second color (for gradient).', 'thefoxwp'),
                        'default'   => '#34C0BF',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_csp_third_color',
                        'type'      => 'color',
                        'title'     => __('Loading bar third color', 'thefoxwp'),
                        'subtitle'  => __('Loading Spinning bar third color (for gradient).', 'thefoxwp'),
                        'default'   => '#4DC4E2',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_csp_ball_color',
                        'type'      => 'color',
                        'title'     => __('Loading bar ball color', 'thefoxwp'),
                        'subtitle'  => __('Loading Spinning bar ball color.', 'thefoxwp'),
                        'default'   => '#21C2F8',
                        'validate'  => 'color',
                    ),
                    array(
                        'id'        => 'rd_csp_logo',
                        'type'      => 'media',
						'url'      => true,
                        'title'     => __('Coming Soon Page Logo upload', 'thefoxwp'),

                        'subtitle'  => __('Use big logo for retina ready display', 'thefoxwp'),
						'default'  => array(
							'url'=>'http://thefoxwp.com/wp-content/uploads/2015/03/thefox-logo2.png'
					    ),
                    ),
					array(
                        'id'        => 'rd_csp_text',
                        'type'      => 'text',
                        'title'     => __('Coming Soon Page Text', 'thefoxwp'),
                        'subtitle'  => __('Insert the text to show on the coming soon page', 'thefoxwp'),

                        'default'   => 'we are coming soon',
                    ),
					array(
                        'id'        => 'rd_csp_date',
                        'type'      => 'text',
                        'title'     => __('Date', 'thefoxwp'),
                        'subtitle'  => __('Format yyyy-mm-dd ( eg. 2016-04-16 )', 'thefoxwp'),
                        'desc'      => __('Insert the Release Date ( format yyyy-mm-dd, eg. 2016-04-16 )', 'thefoxwp'),
                        'default'   => '2016-04-16',
                    ),
					array(
                        'id'        => 'rd_csp_days',
                        'type'      => 'text',
                        'title'     => __('Text For Days', 'thefoxwp'),
                        'subtitle'  => __('Insert the text to use for the Days counter', 'thefoxwp'),

                        'default'   => 'Days',
                    ),
					array(
                        'id'        => 'rd_csp_days_color',
                        'type'      => 'color',
                        'title'     => __('Days Counter Bar color', 'thefoxwp'),
                        'subtitle'  => __('Days Bar Color.', 'thefoxwp'),
                        'default'   => '#21c2f8',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_csp_hours',
                        'type'      => 'text',
                        'title'     => __('Text For Hours', 'thefoxwp'),
                        'subtitle'  => __('Insert the text to use for the Hours counter', 'thefoxwp'),

                        'default'   => 'Hours',
                    ),
					array(
                        'id'        => 'rd_csp_hours_color',
                        'type'      => 'color',
                        'title'     => __('Hours Counter Bar color', 'thefoxwp'),
                        'subtitle'  => __('Hours Bar Color.', 'thefoxwp'),
                        'default'   => '#f28776',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_csp_minutes',
                        'type'      => 'text',
                        'title'     => __('Text For Minutes', 'thefoxwp'),
                        'subtitle'  => __('Insert the text to use for the Minutes counter', 'thefoxwp'),

                        'default'   => 'Minutes',
                    ),
					array(
                        'id'        => 'rd_csp_minutes_color',
                        'type'      => 'color',
                        'title'     => __('Minutes Counter Bar color', 'thefoxwp'),
                        'subtitle'  => __('Minutes Bar Color.', 'thefoxwp'),
                        'default'   => '#9674ed',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_csp_seconds',
                        'type'      => 'text',
                        'title'     => __('Text For Seconds', 'thefoxwp'),
                        'subtitle'  => __('Insert the text to use for the Seconds counter', 'thefoxwp'),

                        'default'   => 'Seconds',
                    ),
					array(
                        'id'        => 'rd_csp_seconds_color',
                        'type'      => 'color',
                        'title'     => __('Seconds Counter Bar color', 'thefoxwp'),
                        'subtitle'  => __('Seconds Bar Color.', 'thefoxwp'),
                        'default'   => '#facc43',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'rd_csp_mail',
                        'type'      => 'button_set',
                        'title'     => __('Use Mail Form?', 'thefoxwp'),
                        'subtitle'  => __('If you want to use a Mail form to let user register their email.', 'thefoxwp'),
                        'options' => array(
					        'yes' => 'Yes',
					        'no' => 'No',
					     ),
					    'default' => 'yes'
					),
                    array(
                        'id'        => 'rd_csp_mail_adress',
						'required'  => array('rd_csp_mail', '=', 'yes'),
                        'type'      => 'text',
                        'title'     => __('Email', 'thefoxwp'),
                        'desc'      => __('Put the email adress that will receive mail from the form', 'thefoxwp'),
                        'subtitle'  => __('Put your email', 'thefoxwp'),
                        'default'   => 'willreceivemails@gmail.com',
                    ),
                    array(
                        'id'        => 'rd_csp_mail_subject',
						'required'  => array('rd_csp_mail', '=', 'yes'),
                        'type'      => 'text',
                        'title'     => __('Email Subject', 'thefoxwp'),
                        'desc'      => __('Put the email Suject (e.g Email From Coming Soon Page )', 'thefoxwp'),
                        'subtitle'  => __('Email Subject ( Title of the mail coming to your mail box )', 'thefoxwp'),
                        'default'   => 'Mail From Coming Soon Page',
                    ),
                    array(
                        'id'        => 'rd_csp_mail_placeholder',
						'required'  => array('rd_csp_mail', '=', 'yes'),
                        'type'      => 'text',
                        'title'     => __('Form Placeholder', 'thefoxwp'),
                        'desc'      => __('Put the text user will see before enter their email', 'thefoxwp'),
                        'subtitle'  => __('Form Place Holder', 'thefoxwp'),
                        'default'   => 'Enter your email and we will contact you when ready',
                    ),

                )
            ));



            Redux::setSection( $opt_name, array(
                'icon'      => 'el-icon-globe',
                'title'     => __('Social Media', 'thefoxwp'),
                'class'      => 'redux-sm-p',
                'fields'    => array(
                    array(
                        'id'        => 'rd_facebook_link',
                        'type'      => 'text',
                        'title'     => __('Facebook URL', 'thefoxwp'),
                        'subtitle'  => __('Please enter in your Facebook URL.', 'thefoxwp'),

                        'validate'  => 'url',
                        'default'   => '',
//                        'text_hint' => array(
//                            'title'     => '',
//                            'content'   => 'Please enter a valid <strong>URL</strong> in this field.'
//                        )
                    ),
					array(
                        'id'        => 'rd_twitter_link',
                        'type'      => 'text',
                        'title'     => __('Twitter URL', 'thefoxwp'),
                        'subtitle'  => __('Please enter in your Twitter URL.', 'thefoxwp'),

                        'validate'  => 'url',
                        'default'   => '',
//                        'text_hint' => array(
//                            'title'     => '',
//                            'content'   => 'Please enter a valid <strong>URL</strong> in this field.'
//                        )
                    ),
					array(
                        'id'        => 'rd_googleplus_link',
                        'type'      => 'text',
                        'title'     => __('Google+ URL', 'thefoxwp'),
                        'subtitle'  => __('Please enter in your Google+ URL.', 'thefoxwp'),

                        'validate'  => 'url',
                        'default'   => '',
//                        'text_hint' => array(
//                            'title'     => '',
//                            'content'   => 'Please enter a valid <strong>URL</strong> in this field.'
//                        )
                    ),
					array(
                        'id'        => 'rd_vimeo_link',
                        'type'      => 'text',
                        'title'     => __('Vimeo URL', 'thefoxwp'),
                        'subtitle'  => __('Please enter in your Vimeo URL.', 'thefoxwp'),

                        'validate'  => 'url',
                        'default'   => '',
//                        'text_hint' => array(
//                            'title'     => '',
//                            'content'   => 'Please enter a valid <strong>URL</strong> in this field.'
//                        )
                    ),
					array(
                        'id'        => 'rd_lin_link',
                        'type'      => 'text',
                        'title'     => __('Linkedin URL', 'thefoxwp'),
                        'subtitle'  => __('Please enter in your Linkedin URL.', 'thefoxwp'),

                        'validate'  => 'url',
                        'default'   => '',
//                        'text_hint' => array(
//                            'title'     => '',
//                            'content'   => 'Please enter a valid <strong>URL</strong> in this field.'
//                        )
                    ),
					array(
                        'id'        => 'rd_tumblr_link',
                        'type'      => 'text',
                        'title'     => __('Tumblr URL', 'thefoxwp'),
                        'subtitle'  => __('Please enter in your Tumblr URL.', 'thefoxwp'),

                        'validate'  => 'url',
                        'default'   => '',
//                        'text_hint' => array(
//                            'title'     => '',
//                            'content'   => 'Please enter a valid <strong>URL</strong> in this field.'
//                        )
                    ),
					array(
                        'id'        => 'rd_pinterest_link',
                        'type'      => 'text',
                        'title'     => __('Pinterest URL', 'thefoxwp'),
                        'subtitle'  => __('Please enter in your Pinterest URL.', 'thefoxwp'),

                        'validate'  => 'url',
                        'default'   => '',
//                        'text_hint' => array(
//                            'title'     => '',
//                            'content'   => 'Please enter a valid <strong>URL</strong> in this field.'
//                        )
                    ),
					array(
                        'id'        => 'rd_skype_link',
                        'type'      => 'text',
                        'title'     => __('Skype ID', 'thefoxwp'),
                        'subtitle'  => __('Enter your skype ID.', 'thefoxwp'),
                        'default'   => '',
//                        'text_hint' => array(
//                            'title'     => '',
//                            'content'   => 'Please enter a valid <strong>URL</strong> in this field.'
//                        )
                    ),
					array(
                        'id'        => 'rd_dribbble_link',
                        'type'      => 'text',
                        'title'     => __('Dribbble URL', 'thefoxwp'),
                        'subtitle'  => __('Please enter in your Dribbble URL.', 'thefoxwp'),

                        'validate'  => 'url',
                        'default'   => '',
//                        'text_hint' => array(
//                            'title'     => '',
//                            'content'   => 'Please enter a valid <strong>URL</strong> in this field.'
//                        )
                    ),
					array(
                        'id'        => 'rd_yt_link',
                        'type'      => 'text',
                        'title'     => __('Youtube URL', 'thefoxwp'),
                        'subtitle'  => __('Please enter in your Youtube URL.', 'thefoxwp'),

                        'validate'  => 'url',
                        'default'   => '',
//                        'text_hint' => array(
//                            'title'     => '',
//                            'content'   => 'Please enter a valid <strong>URL</strong> in this field.'
//                        )
                    ),
					array(
                        'id'        => 'rd_behance_link',
                        'type'      => 'text',
                        'title'     => __('Behance URL', 'thefoxwp'),
                        'subtitle'  => __('Please enter in your Behance URL.', 'thefoxwp'),

                        'validate'  => 'url',
                        'default'   => '',
//                        'text_hint' => array(
//                            'title'     => '',
//                            'content'   => 'Please enter a valid <strong>URL</strong> in this field.'
//                        )
                    ),
					array(
                        'id'        => 'rd_flickr_link',
                        'type'      => 'text',
                        'title'     => __('Flickr URL', 'thefoxwp'),
                        'subtitle'  => __('Please enter in your Flickr URL.', 'thefoxwp'),

                        'validate'  => 'url',
                        'default'   => '',
//                        'text_hint' => array(
//                            'title'     => '',
//                            'content'   => 'Please enter a valid <strong>URL</strong> in this field.'
//                        )
                    ),
					array(
                        'id'        => 'rd_instagram_link',
                        'type'      => 'text',
                        'title'     => __('Instagram URL', 'thefoxwp'),
                        'subtitle'  => __('Please enter in your Instagram URL.', 'thefoxwp'),

                        'validate'  => 'url',
                        'default'   => '',
//                        'text_hint' => array(
//                            'title'     => '',
//                            'content'   => 'Please enter a valid <strong>URL</strong> in this field.'
//                        )
                    ),
					array(
                        'id'        => 'rd_da_link',
                        'type'      => 'text',
                        'title'     => __('Deviant Art URL', 'thefoxwp'),
                        'subtitle'  => __('Please enter in your Deviant Art URL.', 'thefoxwp'),

                        'validate'  => 'url',
                        'default'   => '',
//                        'text_hint' => array(
//                            'title'     => '',
//                            'content'   => 'Please enter a valid <strong>URL</strong> in this field.'
//                        )
                    ),
					array(
                        'id'        => 'rd_digg_link',
                        'type'      => 'text',
                        'title'     => __('Digg URL', 'thefoxwp'),
                        'subtitle'  => __('Please enter in your Digg URL.', 'thefoxwp'),

                        'validate'  => 'url',
                        'default'   => '',
//                        'text_hint' => array(
//                            'title'     => '',
//                            'content'   => 'Please enter a valid <strong>URL</strong> in this field.'
//                        )
                    ),
					array(
                        'id'        => 'rd_reddit_link',
                        'type'      => 'text',
                        'title'     => __('Reddit URL', 'thefoxwp'),
                        'subtitle'  => __('Please enter in your Reddit URL.', 'thefoxwp'),

                        'validate'  => 'url',
                        'default'   => '',
//                        'text_hint' => array(
//                            'title'     => '',
//                            'content'   => 'Please enter a valid <strong>URL</strong> in this field.'
//                        )
                    ),
					array(
                        'id'        => 'rd_xing_link',
                        'type'      => 'text',
                        'title'     => __('Xing URL', 'thefoxwp'),
                        'subtitle'  => __('Please enter your Xing URL.', 'thefoxwp'),
                        'default'   => '',

                        'validate'  => 'url',
//                        'text_hint' => array(
//                            'title'     => '',
//                            'content'   => 'Please enter a valid <strong>URL</strong> in this field.'
//                        )
                    ),
					array(
                        'id'        => 'rd_vk_link',
                        'type'      => 'text',
                        'title'     => __('VK URL', 'thefoxwp'),
                        'subtitle'  => __('Please enter in your Vk URL.', 'thefoxwp'),


                        'validate'  => 'url',
                        'default'   => '',
//                        'text_hint' => array(
//                            'title'     => '',
//                            'content'   => 'Please enter a valid <strong>URL</strong> in this field.'
//                        )
                    ),
                )
            ));

        Redux::setSection( $opt_name, array(
            'title'      => __( 'Translation settings', 'thefoxwp' ),
            'desc'       => __( 'How to translate the theme', 'thefoxwp' ),
            'id'         => 'tt-translation',
            'subsection' => false,
            'fields'     => array(
                array(
                  'id'   => 'info_wpml',
                  'type' => 'info',
                  'desc' => __('If you want to make a multilanguage website we recommend <a href="https://wpml.org/?aid=86713&affiliate_key=m1MVRCmC20A7">WPML</a> .', 'thefoxwp')
                ),
                array(
                    'id'   => 'info_poedit',
                    'type' => 'info',
                    'desc' => __('If just need to translate the theme use <a href="https://tranmautritam.ticksy.com/article/14989">Poedit</a> .', 'thefoxwp')
                ),
            )
        ) );
        Redux::setSection( $opt_name, array(
            'title'      => __( 'Optimization settings', 'thefoxwp' ),
            'desc'       => __( 'How to Optimize the theme', 'thefoxwp' ),
            'id'         => 'tt-optimization',
            'subsection' => false,
            'fields'     => array(
                array(
                  'id'   => 'info_autoptimize',
                  'type' => 'info',
                  'desc' => __('Using Autoptimize : <a href="https://wpbuilders.co/how-to-speed-up-your-wordpress-site-with-autoptimize/?utm_source=Thefox&utm_medium=banner&utm_campaign=thefox_optimize">Speed up your site with the free plugin Autoptimize</a> .', 'cesis')
                ),
                array(
                    'id'   => 'info_hosting',
                    'type' => 'info',
                    'desc' => __('Double your web site loading speed with a <a href="https://wpbuilders.co/the-best-web-hosting-services/#utm_source=Thefox&utm_medium=banner&utm_campaign=thefox_hosting">Better web hosting</a> .', 'cesis')
                ),
            )
        ) );

                                      if($staging_env !== "is_staging"){
                                        if(!in_array( $_SERVER['REMOTE_ADDR'], $whitelist)){
                                            Redux::setSection( $opt_name, array(
                                                'title'      => __( 'License', 'thefoxwp' ),
                                                'desc'       => __( 'Register Thefox', 'thefoxwp' ),
                                                'id'         => 'tlm',
                                                'heading'    => '',
                                                'icon'       => 'el-lock-alt',
                                                'icon_class' => 'el-icon-large',
                                                'class'      => 'redux-tlm-class',
                                                'customizer' => false,
                                                'fields'     => array(
                                                    array(
                                                        'id'         => 'redux_tlm',
                                                        'type'       => 'tlm',
                                                        'full_width' => true,
                                                    ),
                                                    array(
                                                        'id'    => 'verification_status',
                                                        'type'  => 'info',
                                                        'style' => 'warning',
                                                        'desc'  => __('The license is not verified.', 'thefoxwp')
                                                    ),
                                                ),


                                            ) );
                                        }
                                      }
