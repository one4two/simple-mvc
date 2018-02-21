<?php
	/* **********************************************	
	Простой MVC Framework на PHP		
	Данный файл является точкой входа приложения.	
	************************************************ */
	
	// подключаем файл конфигурации
	require_once($_SERVER["DOCUMENT_ROOT"] . '/application/config/config.php');
	
	// подключаем класс приложения (роутер) (APP - константа. Взят из файла config.php)
	require_once(APP . 'core/router.php');
	
	// подключаем базовый класс контроллера 
	require_once APP . 'core/controller.php';
	
	// создаем обьект приложения (роутер)
	$app = new Router;
?>
