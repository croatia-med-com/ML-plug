<?php
class SeoOutput {
    public function generate_hreflang_tags() {
        return '<link rel="alternate" hreflang="en" href="/" />';
    }

    public function generate_canonical_url() {
        return '<link rel="canonical" href="/" />';
    }
}