<?php
/**
 * Commands to run for WP History
 */

$app->get('/console/download-all', function() {
	ignore_user_abort(TRUE);
	set_time_limit(60*10);

	$versions = Wphistory\Dotorg::getAllVersions();

	echo "Starting to download all files..".PHP_EOL;

	foreach($versions as $version) :
		echo "Starting to download ".$version['version'].PHP_EOL;

		if (! file_exists(WP_HISTORY_BASE.'/archives/'.$version['version'].'/'))mkdir(WP_HISTORY_BASE.'/archives/'.$version['version'].'/');

		if (! file_exists(WP_HISTORY_BASE.'/archives/'.$version['version'].'/'.$version['version'].'.zip'))
			file_put_contents(WP_HISTORY_BASE.'/archives/'.$version['version'].'/'.$version['version'].'.zip', fopen($version['zip'], 'r'));
		// unlink(WP_HISTORY_BASE.'/archive/'.$version['version'].'/'.$version['version'].'.zip');
		echo "Finished downloading ".$version['version'].PHP_EOL;
	endforeach;

	echo "Finished downloading all files!";
});

$app->get('/console/unzip-all', function()
{
	ignore_user_abort(TRUE);
	set_time_limit(60*10);

	$versions = Wphistory\Dotorg::getAllVersions();
	$archive_path = WP_HISTORY_BASE.'/archives/';
	$extracts_path = WP_HISTORY_BASE.'/extracts/';

	$versions = Wphistory\Dotorg::getAllVersions();

	foreach($versions as $version) :
		$zip = new ZipArchive;
		$res = $zip->open($archive_path.$version['version'].'/'.$version['version'].'.zip');

		if (! $res)
			die('Error working with '.$version['version']);

		echo "Starting ".$version['version'].PHP_EOL;

		// Delete it if it's there already!
		if (is_dir($extracts_path.$version['version'].'/'))
			rmdir($extracts_path.$version['version'].'/');

		$zip->extractTo($extracts_path.$version['version'].'/');
		$zip->close();

		echo "Finished extracting ".$version['version'].PHP_EOL;
	endforeach;

	echo "Finished all versions!";
});

$app->get('/console/install-all', function() {
	$versions = Wphistory\Dotorg::getAllVersions();
	
	// Load the installer
	require_once __DIR__.'/Installer.php';
	$extracts_path = WP_HISTORY_BASE.'/extracts/';

	foreach($versions as $version) :
		echo "Starting to install ".$version['version'].PHP_EOL;
		$installer = new Wphistory\Installer($extracts_path.$version['version'].'/', $version['version']);
		$installer->run();
		
	endforeach;
});