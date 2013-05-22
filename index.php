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

// LESS -> CSS
$less = new lessc;
$less->checkedCompile(WP_HISTORY_BASE.'/less/application.less', WP_HISTORY_BASE.'/css/application.css');

// Application Start
$app = new \Slim\Slim();
$app->get('/', function() {
	$j = new Jade\Jade();
	$title = 'TITLEEE';
	echo $j->render(WP_HISTORY_BASE.'/views/index.jade.php');
});

// Download a version
$app->get('/:version/download', function($version) {
	die('download');
});

// View a version
$app->get('/:version', function($version) {
	$j = new Jade\Jade();
	$title = 'TITLEEE';
	echo $j->render(WP_HISTORY_BASE.'/views/v.jade.php');
});

$app->run();