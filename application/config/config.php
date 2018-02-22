<?php	
	
	// путь до корня сайта
	define('ROOT',$_SERVER['DOCUMENT_ROOT']);
	
	// путь до директории public
	define('PUBLIC_FOLDER', ROOT .'/public/');
	
	// путь до директории application
	define('APP', ROOT . '/application/');
	
	define('URL_PROTOCOL', '//');
	define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
	define('URL_SUB_FOLDER', str_replace(PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));
	define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);
	
	// конфигурация базы данных
	define('DB_HOST','127.0.0.1');	
	define('DB_NAME','kinoteka');
	define('DB_USER','root');
	define('DB_PASS','');
	define('DB_CHARSET','utf8');
	
?>