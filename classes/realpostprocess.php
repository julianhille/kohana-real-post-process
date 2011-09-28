<?php



class realpostprocess {

	private static $objects;

	public static function add_object (&$object) {
		self::$objects[] = $object;
	}


}