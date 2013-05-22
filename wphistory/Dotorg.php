<?php
namespace wphistory;
use \Buzz\Browser;

class Dotorg {
	public static function retrieveCurrentVersion()
	{
		$browser = new Browser();
		$get = unserialize($browser->get('http://api.wordpress.org/core/version-check/1.6/')->getContent());
		
		return $get['offers'][0]['current'];
	}
}