<?php
/*
  Plugin Name: WP-AppKit Addon Test
  Description: WP-AppKit addon basic example, to make tests or use as bootstrap.
  Version: 1.0.0
 */

if ( !class_exists( 'WpAppKitAddonTest' ) ) {

    class WpAppKitAddonTest {

        const name = 'WP-AppKit Addon Test';
        const slug = 'wpak-addon-test';

        /**
         * Define hooks used by the addon
         */
        public static function hooks() {
            add_filter( 'wpak_addons', array( __CLASS__, 'wpak_register_addon' ) );
        }

        /**
         * Register WP-AppKit addon
         */
        public static function wpak_register_addon( $available_addons ) {
            $addon = new WpakAddon( self::name, self::slug );
            $addon->set_location( __FILE__ );

            //Add JS file to be loaded before app initialization:
            $addon->add_js( 'js/wpak-addon-test.js', 'init' );
            
            //Add JS file to be loaded before app theme initialization:
            //$addon->add_js( 'js/wpak-addon-test.js', 'theme', 'before' );
            
            //Add JS file to be loaded after app theme initialization:
            //$addon->add_js( 'js/wpak-addon-test.js', 'theme', 'after' );

            $available_addons[] = $addon;

            return $available_addons;
        }


    }

    WpAppKitAddonTest::hooks();
}
