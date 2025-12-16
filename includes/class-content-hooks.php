<?php
class ContentHooks {
    public function __construct() {
        add_filter('the_content', [$this, 'translate_content']);
    }

    public function translate_content($content) {
        return $content; // Mock implementation
    }
}