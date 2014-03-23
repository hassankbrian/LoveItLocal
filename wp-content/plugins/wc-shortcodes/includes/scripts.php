<?php
if( ! function_exists('wc_shortcodes_scripts') ) :
	function wc_shortcodes_scripts() {
		$ver = WC_SHORTCODES_VERSION;

		if ( get_option( WC_SHORTCODES_PREFIX . 'enable_shortcode_css', true ) ) {
			wp_enqueue_style( 'wc-shortcodes-style', plugin_dir_url( __FILE__ ) . 'css/style.css', array( ), $ver );
		}

		if ( WC_SHORTCODES_FONT_AWESOME_ENABLED ) {
			wp_enqueue_style( 'wordpresscanvas-font-awesome', plugin_dir_url( __FILE__ ) . 'css/font-awesome.css', array( ), '3.2.1' );
		}

		wp_enqueue_script('jquery');
		wp_register_script( 'wc-shortcodes-tabs', plugin_dir_url( __FILE__ ) . 'js/tabs.js', array ( 'jquery', 'jquery-ui-tabs'), $ver, true );
		wp_register_script( 'wc-shortcodes-toggle', plugin_dir_url( __FILE__ ) . 'js/toggle.js', 'jquery', $ver, true );
		wp_register_script( 'wc-shortcodes-accordion', plugin_dir_url( __FILE__ ) . 'js/accordion.js', array ( 'jquery', 'jquery-ui-accordion'), $ver, true );
		wp_register_script( 'wc-shortcodes-prettify', plugin_dir_url( __FILE__ ) . 'js/prettify.js', array ( ), $ver, true );
		wp_register_script( 'wc-shortcodes-pre', plugin_dir_url( __FILE__ ) . 'js/pre.js', array ( 'jquery' ), $ver, true );
		wp_register_script( 'wc-shortcodes-googlemap',  plugin_dir_url( __FILE__ ) . 'js/googlemap.js', array('jquery'), $ver, true);
		wp_register_script( 'wc-shortcodes-googlemap-api', 'https://maps.googleapis.com/maps/api/js?sensor=false', array('jquery'), $ver, true);
		wp_register_script( 'wc-shortcodes-skillbar', plugin_dir_url( __FILE__ ) . 'js/skillbar.js', array ( 'jquery' ), $ver, true );
		wp_register_script( 'wc-shortcodes-fullwidth', plugin_dir_url( __FILE__ ) . 'js/fullwidth.js', array ( 'jquery' ), $ver, true );

		// slider
		wp_register_script( 'wordpresscanvas-rslides', plugin_dir_url( __FILE__ ) . 'js/responsiveslides.js', array ( 'jquery' ), '1.0', true );
		wp_register_script( 'wc-shortcodes-slider', plugin_dir_url( __FILE__ ) . 'js/slider.js', array ( 'jquery', 'wordpresscanvas-rslides' ), $ver, true );

		// isotope
		wp_register_script( 'wc-shortcodes-posts', plugin_dir_url( __FILE__ ) . 'js/posts.js', array ( 'jquery', 'wordpresscanvas-isotope' ), $ver, true );

		// countdown
		wp_register_script( 'wc-shortcodes-jquery-countdown-js', plugin_dir_url( __FILE__ ) . 'js/jquery.countdown.js', array ( 'jquery' ), $ver, true );
		wp_register_script( 'wc-shortcodes-countdown', plugin_dir_url( __FILE__ ) . 'js/countdown.js', array ( 'wc-shortcodes-jquery-countdown-js' ), $ver, true );

		// rsvp
		wp_register_script( 'wc-shortcodes-rsvp', plugin_dir_url( __FILE__ ) . 'js/rsvp.js', array ( 'jquery' ), $ver, true );

		$local = array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
		);

		wp_localize_script( 'wc-shortcodes-rsvp', 'WCShortcodes', $local );
		wp_enqueue_script( 'wc-shortcodes-rsvp' );
	}
	add_action('wp_enqueue_scripts', 'wc_shortcodes_scripts');
endif;
