<?php
namespace Wphistory;

/**
 * Install a Version of WordPress
 *
 * @package wphistory
 */
class Installer {
	private $path;
	private $version;

	public function __construct($path, $version)
	{
		$this->path = $path;
		$this->version = $version;
	}

	/**
	 * Install the program
	 * 
	 * @return void
	 */
	public function run()
	{
		$this->fixPath();
	}

	private function copyConfig()
	{

	}

	/**
	 * @param string
	 */
	private function patchPath($append = '')
	{
		return \WP_HISTORY_BASE.'/version-patches/'.$append;
	}

	/**
	 * Fix the path of this install
	 *
	 * @return void
	 */
	private function fixPath()
	{
		$folderName = 'wordpress';

		switch($this->version) :
			case '1.0-platinum' :
			case '1.0.1-miles' :
			case '1.0.2' :
				$folderName = 'wordpress-'.$this->version;
				break;

			case '1.0.2-blakey' :
				$folderName = 'wordpress-1.0.2';
				break;
		endswitch;

		$curPath = $this->path.'/'.$folderName.'/';
		
		if (! file_exists($curPath))
			return;

		$finalPath = $this->path;

		exec('mv '.$curPath.'* '.$finalPath.' && rm -rf '.$curPath);
	}
}