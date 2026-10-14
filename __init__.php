<?php

/*
 * Plugin Name: Hyyan WooCommerce Polylang Integration (Taisa Digital fork)
 * Plugin URI: https://github.com/TaisaDigital/woo-poly-integration/
 * Description: Unofficial maintained fork with SQL injection hardening and a PHP 8 NumberFormatter fix.
 * Author: Taisa - Raquel Garcia Arevalo
 * Author URI: https://www.taisadigital.com
 * Text Domain: woo-poly-integration
 * Domain Path: /languages
 * GitHub Plugin URI: TaisaDigital/woo-poly-integration
 * Update URI: https://github.com/TaisaDigital/woo-poly-integration
 * License: MIT License
 * Version: 1.5.2
 * Requires At Least: 5.4
 * Tested Up To: 5.7.1
 * WC requires at least: 4.0.0
 * WC tested up to: 5.3.0
 * Requires PHP: 7.0
 */

/**
 * This file is part of the hyyan/woo-poly-integration plugin.
 * (c) Hyyan Abo Fakher <hyyanaf@gmail.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
if (!defined('ABSPATH')) {
    exit('restricted access');
}

define('Hyyan_WPI_DIR', __FILE__);
define('Hyyan_WPI_URL', plugin_dir_url(__FILE__));

require_once ABSPATH . 'wp-admin/includes/plugin.php';
require_once __DIR__ . '/vendor/class.settings-api.php';
require_once __DIR__ . '/src/Hyyan/WPI/Autoloader.php';

/* register the autoloader */
new Hyyan\WPI\Autoloader(__DIR__ . '/src/');

/* bootstrap the plugin */
new Hyyan\WPI\Plugin();


/*
 * called when plugin is activated in settings, plugins
 */
function onActivate() {
	update_option( 'wpi_wcpagecheck_passed', false );
	update_option( 'hyyan-wpi-flash-messages', '' );
}

register_activation_hook( __FILE__, 'onActivate' );

