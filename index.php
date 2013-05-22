<?php
/**
 * WordPress History
 *
 * A simple way to look back at some things from the past
 * and see how WordPress evolved over the years.
 * 
 * @package wp-history
 * @author Sean Fisher <hi@seanfisher.co>
 */
if (! file_exists('vendor/autoload.php'))
	die('Please run composer install');

// Load composer
require 'vendor/autoload.php';

define('WP_HISTORY_BASE', __DIR__);

// Application Start
$app = new \Slim\Slim();
$app->get('/hello/:name', function ($name) {
    echo "Hello, $name";
});
$app->run();