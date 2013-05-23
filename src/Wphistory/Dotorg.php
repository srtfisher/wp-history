<?php
namespace Wphistory;
use \Buzz\Browser;

class Dotorg {
	/**
	 * Retrieve latest full version
	 *
	 * x.x.x
	 * 
	 * @return string
	 */
	public static function retrieveCurrentVersion()
	{
		$browser = new Browser();
		$get = unserialize($browser->get('http://api.wordpress.org/core/version-check/1.6/')->getContent());
		
		return $get['offers'][0]['current'];
	}

	/**
	 * Get all versions
	 *
	 * @return array
	 * @param string releases/beta-rc/mu
	 */
	public static function getAllVersions($type = 'releases')
	{
		$browser = new Browser();
		$get = $browser->get('http://wordpress.org/download/release-archive/');

		if (! $get->isOk())
			die('error');

		require_once WP_HISTORY_BASE.'/src/Wphistory/HtmlDom.php';

		$tbNum = 0;
		if ($type == 'beta-rc')
			$tbNum = 1;
		elseif ($type == 'mu')
			$tbNum = 2;

		$dom = str_get_html($get->getContent());
		$table = $dom->find('table.widefat', $tbNum);
		$rows = $table->find('tr');
		$count = -1;

		$index = [];

		foreach ($rows as $row) :
			$count++;
			if ($count == 0) continue;

			$index[$count]['version'] = $row->find('td', 0)->innertext;
			$index[$count]['zip'] = 'http://wordpress.org/wordpress-'.$index[$count]['version'].'.zip';
			$index[$count]['tar'] = 'http://wordpress.org/wordpress-'.$index[$count]['version'].'.tar.gz';
		endforeach;

		return $index;

		//var_dump($table->innertext);
	}
}