<?php

Class config {
	public static function get($path){
		$config = $GLOBALS['config'];
		$path = explode('/',$path);
		foreach($path as $bit){
			$config = $config[$bit];
		}
		return $config;
	}
}


?>