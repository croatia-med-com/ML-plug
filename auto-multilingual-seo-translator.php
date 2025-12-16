<?php
/**
 * Plugin Name: Auto Multilingual SEO Translator
 * Description: Automatically translates website content for SEO optimization.
 * Version: 1.0
 * Author: Croatia Med Com
 */

// Initialize plugin functionality
define('AUTO_MLT_PLUGIN_PATH', plugin_dir_path(__FILE__));

// Includes
require_once AUTO_MLT_PLUGIN_PATH . 'includes/class-translation-engine.php';
require_once AUTO_MLT_PLUGIN_PATH . 'includes/class-cache-layer.php';
require_once AUTO_MLT_PLUGIN_PATH . 'includes/class-language-detection.php';
require_once AUTO_MLT_PLUGIN_PATH . 'includes/class-content-hooks.php';
require_once AUTO_MLT_PLUGIN_PATH . 'includes/class-seo-output.php';
require_once AUTO_MLT_PLUGIN_PATH . 'includes/admin-settings.php';

// Activation hook to set up rewrite rules
register_activation_hook(__FILE__, function() {
    flush_rewrite_rules();
});

// Deactivation hook to clean up rewrite rules
register_deactivation_hook(__FILE__, function() {
    flush_rewrite_rules();
});