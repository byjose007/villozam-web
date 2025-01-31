<?php

add_action( 'after_switch_theme',  'activation_redirect'  );
 function activation_redirect() {
		if ( current_user_can( 'switch_themes' ) ) {
			// Do not redirect if a migration is needed for thefox 5.0.0.
			header( 'Location:' . admin_url( 'admin.php?page=thefox-dashboard' ) );
		}
	}

function thefox_db_menu($position) {
    if (get_option( 'enable_full_version' )) {
      $tgma = TGM_Plugin_Activation::get_instance()->is_tgmpa_complete();
    }else{
      $tgma = false;
    }
        ob_start();?>
<div class="wrap wpbs-dashboard wpbs_DB-welcome wpbs-wrap <?php echo $position;?>">

<header class="wpbs_DB-header-main">
				<div class="wpbs_DB-header-main-container">
					<a class="wpbs_DB-logo" href="<?php echo esc_url(admin_url( 'admin.php?page=thefox-dashboard' )); ?>" aria-label="Link to wpbs dashboard">
						<div class="wpbs_DB-logo-image">
							<img src="<?php echo get_template_directory_uri('template_directory') . '/admin/redux-framework/assets/img/logo_dark.png'; ?>" alt="wpbs" width="130" height="37">
						</div>
					</a>
					<nav class="wpbs_DB-menu-main">
						<ul class="wpbs_DB-menu">
							<li class="wpbs_DB-menu-item wpbs_DB-menu-item-options"><a class="wpbs_DB-menu-item-link" href="<?php if(wpbs_check_status() == true){ echo esc_url(admin_url( 'admin.php?page=TheFox_options&tab=1' ));}else{ echo esc_url(admin_url( 'admin.php?page=TheFox_options&tab=24' )); } ?>"><span class="wpbs_DB-menu-item-text">Options</span></a>

							</li>
							<li class="wpbs_DB-menu-item wpbs_DB-menu-item-prebuilt-websites"><a class="wpbs_DB-menu-item-link" href="<?php if(wpbs_check_status() == true){ echo esc_url(admin_url( 'admin.php?page=TheFox_options&tab=25' ));}else{ echo esc_url(admin_url( 'admin.php?page=TheFox_options&tab=24' )); } ?>"><span class="wpbs_DB-menu-item-text">Templates</span></a>
              								<ul class="wpbs_DB-menu-sub wpbs_DB-menu-sub-templates">
              									<li class="wpbs_DB-menu-sub-item">
              										<a class="wpbs_DB-menu-sub-item-link" href="<?php if(wpbs_check_status() == true){ echo esc_url(admin_url( 'admin.php?page=TheFox_options&tab=25' ));}else{ echo esc_url(admin_url( 'admin.php?page=TheFox_options&tab=24' )); } ?>">
              											<div class="wpbs_DB-menu-sub-item-text">
              												<div class="wpbs_DB-menu-sub-item-label">Full Demos</div>
              												<div class="wpbs_DB-menu-sub-item-desc">Import full demo in 1 Click.</div>
              											</div>
              										</a>
              									</li>
              											<li class="wpbs_DB-menu-sub-item">
              			<a class="wpbs_DB-menu-sub-item-link" href="<?php if(wpbs_check_status() == true){ echo esc_url(admin_url( 'admin.php?page=single_page_installer' ));}else{ echo esc_url(admin_url( 'admin.php?page=TheFox_options&tab=24' )); } ?>">
              				<div class="wpbs_DB-menu-sub-item-text">
              					<div class="wpbs_DB-menu-sub-item-label">Single Pages</div>
              					<div class="wpbs_DB-menu-sub-item-desc">Select the pages / posts you want to import.</div>
              				</div>
              			</a>
              		</li>
              										</ul>
                                </li>
							<li class="wpbs_DB-menu-item wpbs_DB-menu-item-maintenance"><a class="wpbs_DB-menu-item-link" href="<?php if($tgma){ echo '#';}elseif(wpbs_check_status() == true){ echo esc_url(admin_url( 'admin.php?page=tgmpa-install-plugins' ));}else{ echo esc_url(admin_url( 'admin.php?page=TheFox_options&tab=24' )); } ?>"><span class="wpbs_DB-menu-item-text">Maintenance</span><span class="wpbs_DB-maintenance-counter"></span></a>
								<ul class="wpbs_DB-menu-sub wpbs_DB-menu-sub-maintenance">
									<li class="wpbs_DB-menu-sub-item wpbs_DB-menu-sub-item-plugins">
										<a class="wpbs_DB-menu-sub-item-link" href="<?php if($tgma){ echo '#';}elseif(wpbs_check_status() == true){ echo esc_url(admin_url( 'admin.php?page=tgmpa-install-plugins' ));}else{ echo esc_url(admin_url( 'admin.php?page=TheFox_options&tab=24' )); } ?>">
											<div class="wpbs_DB-menu-sub-item-text">
                        <?php if($tgma){ ?>
                          <div class="wpbs_DB-menu-sub-item-label">All plugins updated</div>
  												<div class="wpbs_DB-menu-sub-item-desc">Good job!</div>
                        <?php }else{ ?>
                          <div class="wpbs_DB-menu-sub-item-label">Install / Update Plugins</div>
  												<div class="wpbs_DB-menu-sub-item-desc">Manage plugins.</div>
                        <?php }?>
											</div>
										</a>
									</li>
									<li class="wpbs_DB-menu-sub-item wpbs_DB-menu-sub-item-support">
										<a class="wpbs_DB-menu-sub-item-link" target="_blank" href="https://tranmautritam.ticksy.com/">
											<div class="wpbs_DB-menu-sub-item-text">
												<div class="wpbs_DB-menu-sub-item-label">Support</div>
												<div class="wpbs_DB-menu-sub-item-desc">Contact our support team</div>
											</div>
										</a>
									</li>
									<li class="wpbs_DB-menu-sub-item wpbs_DB-menu-sub-item-documentation">
										<a class="wpbs_DB-menu-sub-item-link" target="_blank" href="https://thefoxwp.com/wp-content/themes/TheFox/includes/documentation/thefox_documentation.html">
											<div class="wpbs_DB-menu-sub-item-text">
												<div class="wpbs_DB-menu-sub-item-label">Documentation</div>
												<div class="wpbs_DB-menu-sub-item-desc">Read the theme documentation</div>
											</div>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</nav>
          <div>
            <span class="wpbs_DB-version"><span><?php echo esc_html( apply_filters( 'thefox_db_version', 'v' . esc_html( CESIS_VERSION ) ) ); ?></span>
              |
            </span>
            <?php if(wpbs_check_status() == true) { ?>
            <span class="wpbs_DB-version-label wpbs_DB-registered">Registered</span>
          <?php }else{?>
            <span class="wpbs_DB-version-label wpbs_DB-unregistered">unregistered</span>
          <?php }?>
          </div>
									</div>
			</header>
</div>
        <?php
        $output_string = ob_get_contents();
        ob_end_clean();
        echo $output_string;
    }


class thefox_dashboard {

    /**
     * Autoload method
     * @return void
     */
    public function __construct() {
        add_action( 'admin_menu', array(&$this, 'register_thefox_menu') );
    }

    /**
     * Register Menu
     * @return void
     */
    public function register_thefox_menu() {
        add_menu_page(__( 'Thefox', 'thefoxwp' ), __( 'TheFox', 'thefoxwp' ), 'manage_options', 'thefox-dashboard', __CLASS__ .'::thefox_db_callback', get_template_directory_uri('template_directory') . '/admin/redux-framework/assets/img/thefox_menu.png',3
        );
        add_submenu_page('thefox-dashboard', __( 'Dashboard', 'thefoxwp' ), __( 'Thefox Dashboard', 'thefoxwp' ), 'manage_options', 'thefox-dashboard' );
    }


    /**
     * Render submenu
     * @return void
     */
    public static function thefox_db_callback() {
        ob_start();

        thefox_db_menu("wpbs-main-db");?>

        <div class="wpbs_DB-welcome-wrapper wpbs-dashboard wpbs-wrap">
				<section class="wpbs_DB-card wpbs_DB-welcome-setup">
		    <div class="wpbs_DB-welcome-container">
				<div class="wpbs_DB-welcome-intro">
					<h1 class="wpbs_DB-welcome-heading wpbs_DB-white-text">Welcome To Thefox!</h1>
					<p class="wpbs_DB-welcome-text wpbs_DB-white-text">
            <?php if(wpbs_check_status() == true) { ?>
            Thefox is installed and ready for use! Get started and build an Awesome website. We hope you enjoy it!
            <?php }else{?>
            Thefox is installed but need to be activated! Click <a href="<?php echo esc_url(admin_url( 'admin.php?page=TheFox_options&tab=24' )); ?>">here</a> to register your copy of Thefox.
            <?php }?>
          </p>
				</div>
					<div class="wpbs_DB-welcome-image-container">
					<img class="wpbs_DB-welcome-image" src="<?php echo get_template_directory_uri('template_directory') . '/admin/redux-framework/assets/img/welcome.png'; ?>" alt="Welcome Image" >
				</div>
			</div>

			<div class="wpbs_DB-setup">
				<h2 class="wpbs_DB-setup-heading">Setup Your Website</h2>
				<p class="wpbs_DB-setup-text">Easily setup your website with 3 little steps.</p>

        <?php if(wpbs_check_status() == true) { ?>
				<a class="wpbs_DB-setup-step wpbs_DB-step-one wpbs_DB-nolink" href="#" aria-label="Link to product registration">
					<div class="wpbs_DB-setup-step-info">
						<h3 class="wpbs_DB-setup-step-heading">Registration Complete</h3>
						<p class="wpbs_DB-setup-step-text wpbs_DB-card-text-small">Thank you for registering Thefox.<br>We really appreciate your support.</p>
					</div>
					<div class="wpbs_DB-setup-step-icon fa-check2">
          <img src="<?php echo get_template_directory_uri('template_directory') . '/admin/redux-framework/assets/img/i-verified.png'; ?>" alt="Verified Icon"></div>
				</a>
        <?php }else{?>

        <a class="wpbs_DB-setup-step wpbs_DB-step-one" href="<?php echo esc_url(admin_url( 'admin.php?page=TheFox_options&tab=24' )); ?>" aria-label="Link to product registration">
          <div class="wpbs_DB-setup-step-info">
            <h3 class="wpbs_DB-setup-step-heading">Register Your Product</h3>
            <p class="wpbs_DB-setup-step-text wpbs_DB-card-text-small">Enter your License Key from the options panel to register the copy of Thefox.</p>
          </div>
          <div class="wpbs_DB-setup-step-icon fa-unlock-alt">
            <img src="<?php echo get_template_directory_uri('template_directory') . '/admin/redux-framework/assets/img/i-unlock.png'; ?>" alt="Unlock Icon">
          </div>
        </a>
        <?php } ?>

				<a class="wpbs_DB-setup-step wpbs_DB-step-two" href="<?php echo esc_url(admin_url( 'admin.php?page=TheFox_options&tab=25' )); ?>" aria-label="Link to demos">
					<div class="wpbs_DB-setup-step-info">
						<h3 class="wpbs_DB-setup-step-heading">Select A Prebuilt Website</h3>
						<p class="wpbs_DB-setup-step-text wpbs_DB-card-text-small">One-click import one of our professionally designed, prebuilt websites.</p>
					</div>
					<div class="wpbs_DB-setup-step-icon fa-webpage">
            <img src="<?php echo get_template_directory_uri('template_directory') . '/admin/redux-framework/assets/img/i-demos.png'; ?>" alt="Demos Icon">
          </div>
				</a>

				<a class="wpbs_DB-setup-step wpbs_DB-step-three" href="<?php echo esc_url(admin_url( 'admin.php?page=TheFox_options&tab=1' )); ?>" aria-label="Edit Options">
					<div class="wpbs_DB-setup-step-info">
						<h3 class="wpbs_DB-setup-step-heading wpbs_DB-white-text">Customize Your Site</h3>
						<p class="wpbs_DB-setup-step-text wpbs_DB-card-text-small wpbs_DB-white-text">Edit the website settings, upload your logo and change the options to customize your site.</p>
					</div>
					<div class="wpbs_DB-setup-step-icon fa-ruler">
            <img src="<?php echo get_template_directory_uri('template_directory') . '/admin/redux-framework/assets/img/i-edit.png'; ?>" alt="Edit Icon">
          </div>
				</a>
			</div>
					</section>

		<section class="wpbs_DB-card wpbs_DB-welcome-ads">
			<h2 class="wpbs_DB-card-heading-with-badge wpbs_DB-welcome-partners-heading">
				<span class="wpbs_DB-card-heading-text wpbs_DB-welcome-partners-heading-text">Thefox Integrations</span>
				<span class="wpbs_DB-card-heading-badge wpbs_DB-welcome-partners-heading-badge">
					<i class="fa-diamond"></i>
					<span class="wpbs_DB-card-heading-badge-text">Premium Additions</span>
				</span>
			</h2>

			<div class="wpbs_DB-card-grid">

				<div class="wpbs_DB-card-notice wpbs_DB-welcome-partners-uavc">
					<p class="wpbs_DB-card-notice-heading-image">
						<a href="https://tinyurl.com/thefoxdbuavc" class="wpbs_DB-imgae-link" target="_blank" rel="noopener noreferrer">
							<img src="<?php echo get_template_directory_uri('template_directory') . '/admin/redux-framework/assets/img/uavc-large.png'; ?>" alt="Ultimate Addons for Visual Composer">
						</a>
					</p>
					<div class="wpbs_DB-card-notice-heading">
						<h3>Ultimate Addons for Visual Composer</h3>
					</div>
					<p class="wpbs_DB-card-notice-content">
						Ultimate Addons for Visual Composer includes impressive 225+ templates, 390+ blocks, and a lifetime license of the Visual Composer Premium ($ 149 ) Theme Builder</p>
					<p class="wpbs_DB-card-notice-content">
						<a href="https://tinyurl.com/thefoxdbuavc" class="wpbs_DB-promo-btn" target="_blank" rel="noopener noreferrer">First 1000 Licenses only</a>
					</p>
				</div>

				<div class="wpbs_DB-card-notice wpbs_DB-welcome-partners-hubspot">
					<p class="wpbs_DB-card-notice-heading-image">
						<a href="https://hubs.to/3d2cpD" class="wpbs_DB-imgae-link" target="_blank" rel="noopener noreferrer">
							<img src="<?php echo get_template_directory_uri('template_directory') . '/admin/redux-framework/assets/img/hubspot-large.png'; ?>" alt="HubSpot Logo">
						</a>
					</p>
					<div class="wpbs_DB-card-notice-heading">
						<h3>CRM, Marketing &amp; Sales</h3>
					</div>
					<p class="wpbs_DB-card-notice-content">
						HubSpot is a full stack of software for marketing, sales, and customer service — with a completely free CRM at its core. Try their 14-day Free Trial!					</p>
					<p class="wpbs_DB-card-notice-content">
						<a href="https://hubs.to/3d2cpD" class="wpbs_DB-promo-btn" target="_blank" rel="noopener noreferrer">Marketing</a>
					</p>
				</div>

				<div class="wpbs_DB-card-notice wpbs_DB-welcome-partners-wpml">
					<p class="wpbs_DB-card-notice-heading-image">
						<a href="https://wpml.org/?aid=86713&affiliate_key=m1MVRCmC20A7" class="wpbs_DB-imgae-link" target="_blank" rel="noopener noreferrer">
							<img src="<?php echo get_template_directory_uri('template_directory') . '/admin/redux-framework/assets/img/wpml-large.png'; ?>" alt="WPML Logo" >
						</a>
					</p>
					<div class="wpbs_DB-card-notice-heading">
						<h3>Multilingual Sites</h3>
					</div>
					<p class="wpbs_DB-card-notice-content">
						WPML makes it easy to build multilingual sites and run them. It's powerful enough for corporate sites, yet simple for blogs.					</p>
					<p class="wpbs_DB-card-notice-content">
						<a href="https://wpml.org/?aid=86713&affiliate_key=m1MVRCmC20A7" class="wpbs_DB-promo-btn" target="_blank" rel="noopener noreferrer">WP Multilingual</a>
					</p>
				</div>

			</div>
		</section>
				<section class="wpbs_DB-card wpbs_DB-welcome-ads">
			<h2 class="wpbs_DB-card-heading-with-badge wpbs_DB-welcome-resources-heading">
				<span class="wpbs_DB-card-heading-text wpbs_DB-welcome-resources-heading-text">Thefox Resources</span>
				<span class="wpbs_DB-card-heading-badge wpbs_DB-welcome-resources-heading-badge">
					<i class="fa-star2"></i>
					<span class="wpbs_DB-card-heading-badge-text">Recommended</span>
				</span>
			</h2>

			<div class="wpbs_DB-card-grid">
								<div class="wpbs_DB-card-notice wpbs_DB-welcome-resources-license" data-sale="Sale">
					<p class="wpbs_DB-card-notice-heading-image">
						<a href="https://themeforest.net/item/cesis-responsive-multipurpose-wordpress-theme/21736436?ref=tranmautritam" class="wpbs_DB-imgae-link" target="_blank" rel="noopener noreferrer">
							<img src="<?php echo get_template_directory_uri('template_directory') . '/admin/redux-framework/assets/img/cesis-large.png'; ?>" alt="Thefox Logo">
						</a>
					</p>
					<div class="wpbs_DB-card-notice-heading">
						<h3>Try Cesis Theme</h3>
					</div>
					<p class="wpbs_DB-card-notice-content">
						Try our new powerful theme Cesis to use for your next project. Streamline the way you work and save time with Cesis.</p>
					<p class="wpbs_DB-card-notice-content">
						<a href="https://themeforest.net/item/cesis-responsive-multipurpose-wordpress-theme/21736436?ref=tranmautritam" class="wpbs_DB-promo-btn" target="_blank" rel="noopener noreferrer"><span class="wpbs_DB-buy-now-button-text">Only $60 - Buy Now</span></a>
					</p>
				</div>

				<div class="wpbs_DB-card-notice wpbs_DB-welcome-resources-hosting wpbs_DB-sale" data-sale="Discount">
					<p class="wpbs_DB-card-notice-heading-image">
						<a href="https://kinsta.com/?kaid=XGDHDYXQKNFO" class="wpbs_DB-imgae-link" target="_blank" rel="noopener noreferrer">
							<img src="<?php echo get_template_directory_uri('template_directory') . '/admin/redux-framework/assets/img/kinsta-large.png'; ?>" alt="kinsta Logo">
						</a>
					</p>
					<div class="wpbs_DB-card-notice-heading">
						<h3>Kinsta Hosting</h3>
					</div>
					<p class="wpbs_DB-card-notice-content">
						Premium managed WordPress hosting, powered by Google Cloud. Lightning-fast load times!<br>2 months free with yearly plan!
          </p>
					<p class="wpbs_DB-card-notice-content">
						<a href="https://kinsta.com/?kaid=XGDHDYXQKNFO" class="wpbs_DB-promo-btn" target="_blank" rel="noopener noreferrer">Get Special Offer</a>
					</p>
				</div>

				<div class="wpbs_DB-card-notice wpbs_DB-welcome-resources-customization">
					<p class="wpbs_DB-card-notice-heading-image">
						<a href="https://wpbuilders.co/request-service/" class="wpbs_DB-imgae-link" target="_blank" rel="noopener noreferrer">
							<img src="<?php echo get_template_directory_uri('template_directory') . '/admin/redux-framework/assets/img/wpbuilders-large.png'; ?>" alt="WPbuilders Logo">
						</a>
					</p>
					<div class="wpbs_DB-card-notice-heading">
						<h3>WordPress Customization</h3>
					</div>
					<p class="wpbs_DB-card-notice-content">
						 We work with WPbuilders, who offer amazing customization services. They can handle customizations of any size, from small tweaks to large-scale projects.
          </p>
					<p class="wpbs_DB-card-notice-content">
						<a href="https://wpbuilders.co/request-service/" class="wpbs_DB-promo-btn" target="_blank" rel="noopener noreferrer">Get Free Quote</a>
					</p>
				</div>
			</div>
		</section>

			</div>
        <?php
        $output_string = ob_get_contents();
        ob_end_clean();
        echo $output_string;
    }

}

new thefox_dashboard();
