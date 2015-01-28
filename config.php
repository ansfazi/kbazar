<?php

/**
 * The base MySQL settings of Osclass
 */
define('MULTISITE', 0);

/** MySQL database name for Osclass */
define('DB_NAME', 'upetzqcs_bazar');

if ( $_SERVER['HTTP_HOST']  == 'kachehribazar.com'){
	/** MySQL database username */
	define('DB_USER', 'upetzqcs_zohaib');

	/** MySQL database password */
	define('DB_PASSWORD', 'imperial123');
	
	define('WEB_PATH', 'http://kachehribazar.com/');

}else{
	/** MySQL database username */
	define('DB_USER', 'root');

	/** MySQL database password */
	define('DB_PASSWORD', 'confiz');

	define('WEB_PATH', 'http://localhost/kbazar/');
}
	/** MySQL hostname */
	define('DB_HOST', 'localhost');


/** Database Table prefix */
define('DB_TABLE_PREFIX', 'z_');

define('REL_WEB_URL', '/');



?>