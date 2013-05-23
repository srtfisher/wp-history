<?php
namespace wphistory;
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
	 */
	public static function getAllVersions()
	{
		
	}
}