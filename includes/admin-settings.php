<?php
// Admin settings page
add_action('admin_menu', function() {
    add_options_page('Auto Multilingual SEO Translator', 'SEO Translator', 'manage_options', 'seo-translator', function() {
        echo '<h1>Auto Multilingual SEO Translator</h1>';
    });
});