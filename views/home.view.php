<?php
$page_settings = $this->page_settings;
$page_settings['content'] = parse_template('home');

try {
    echo parse_template('page', $page_settings);
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
