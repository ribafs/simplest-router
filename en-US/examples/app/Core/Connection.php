<?php
namespace Core;

/**
* PDO Singleton Class v.1.0
*
* @author Ademílson F. Tonato
* @link https://twitter.com/ftonato
*
*/
class Connection {
	protected static $instance;
	protected function __construct() {}
	public static function getInstance() {
	    if(empty(self::$instance)) {
		    try {
			    self::$instance = new \PDO('mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME, DB_USER, DB_PASS);
			    self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);  
                self::$instance->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
			    self::$instance->query('SET NAMES utf8');
			    self::$instance->query('SET CHARACTER SET utf8');
		    } catch(PDOException $error) {
			    echo $error->getMessage();
		    }
	    }

	    return self::$instance;
	}

	public static function setCharsetEncoding() {
		if (self::$instance == null) {
			self::connect();
		}

		self::$instance->exec(
			"SET NAMES 'utf8';
			SET character_set_connection=utf8;
			SET character_set_client=utf8;
			SET character_set_results=utf8");
	}
}
// https://gist.github.com/ftonato/2973a55baf8eef6795a48804dcdb71dd

