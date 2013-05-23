<?php
/**
 * Commands to run for WP History
 */

$app->get('/console/download-all', function() {
	$versions = Wphistory\Dotorg::getAllVersions();

	foreach($versions as $version) :
		var_dump($version);
	endforeach;
});