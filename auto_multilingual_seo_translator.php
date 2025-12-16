<?php
// Plugin Name: Auto Multilingual SEO Translator
// Description: Enhances multilingual SEO with a flag-based language switcher.
// Version: 1.1.0
// Author: Croatia Med Com

add_action('wp_footer', 'render_flag_language_switcher');
function render_flag_language_switcher() {
    $available_languages = [
        'en' => 'English',
        'fr' => 'French',
        'de' => 'German',
        'es' => 'Spanish'
    ];

    $flag_position = get_option('flag_switcher_position', 'bottom-right');
    $flag_size = get_option('flag_switcher_size', 'medium');

    echo '<div class="flag-language-switcher" style="position:' . esc_attr($flag_position) . ';">';
    foreach ($available_languages as $lang_code => $lang_name) {
        $flag_url = plugin_dir_url(__FILE__) . 'flags/' . $lang_code . '.png';
        echo '<a href="?lang=' . esc_attr($lang_code) . '">';
        echo '<img src="' . esc_url($flag_url) . '" alt="' . esc_attr($lang_name) . '" class="flag-size-' . esc_attr($flag_size) . '">';
        echo '</a>';
    }
    echo '</div>';
}

add_action('admin_menu', 'flag_switcher_settings_menu');
function flag_switcher_settings_menu() {
    add_options_page('Flag Switcher Settings', 'Flag Switcher', 'manage_options', 'flag-switcher-settings', 'flag_switcher_settings_page');
}

function flag_switcher_settings_page() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        update_option('flag_switcher_position', sanitize_text_field($_POST['flag_switcher_position']));
        update_option('flag_switcher_size', sanitize_text_field($_POST['flag_switcher_size']));
    }

    $current_position = get_option('flag_switcher_position', 'bottom-right');
    $current_size = get_option('flag_switcher_size', 'medium');
    ?>
    <div class="wrap">
        <h1>Flag Switcher Settings</h1>
        <form method="POST">
            <label for="flag_switcher_position">Position:</label>
            <select id="flag_switcher_position" name="flag_switcher_position">
                <option value="top-left" <?php selected($current_position, 'top-left'); ?>>Top Left</option>
                <option value="top-right" <?php selected($current_position, 'top-right'); ?>>Top Right</option>
                <option value="bottom-left" <?php selected($current_position, 'bottom-left'); ?>>Bottom Left</option>
                <option value="bottom-right" <?php selected($current_position, 'bottom-right'); ?>>Bottom Right</option>
            </select>

            <label for="flag_switcher_size">Size:</label>
            <select id="flag_switcher_size" name="flag_switcher_size">
                <option value="small" <?php selected($current_size, 'small'); ?>>Small</option>
                <option value="medium" <?php selected($current_size, 'medium'); ?>>Medium</option>
                <option value="large" <?php selected($current_size, 'large'); ?>>Large</option>
            </select>

            <?php submit_button('Save Settings'); ?>
        </form>
    </div>
    <?php
}
?>