<?php defined('SYSPATH') or die('No direct script access.');

class Depends
{
	protected static $paths = array(MODPATH);
	
	protected static $modules = array();
	
	public static function init(array $conf = NULL)
	{
		self::$modules = Kohana::modules();
		
		if($conf === NULL) return;
		
		if(isset($conf['paths']))
		{
			self::$paths = array_merge(self::$paths, $conf['paths']);
		}
	}
	
	public static function on($name)
	{
		if(isset($modules[$name])) return;
		
		foreach(self::$paths as $path)
		{
			if(is_dir($path.DS.$name))
			{
				$modules[$name] = $path.DS.$name;
				Kohana::modules($modules);
				break;
			}
		}
	}
}