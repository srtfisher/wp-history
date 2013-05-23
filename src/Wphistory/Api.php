<?php
/**
 * API Actions
 */

$app->get('/api/current-version', function() use ($app) {

	$response = $app->response();
	$response['Content-Type'] = 'application/json';
	$response->body(json_encode([
		'version' => Wphistory\Dotorg::retrieveCurrentVersion(),
		'url' => 'http://wordpress.org/latest.zip',
	]));
});

$app->get('/api/all-versions', function() use ($app) {
	$response = $app->response();
	$response['Content-Type'] = 'application/json';
	$response->body(json_encode(Wphistory\Dotorg::getAllVersions()));
});