<?php
	/* **********************************************
	
	Довольно любопытная и очень простая
	реализация паттерна MVC. 
	Думаю будет интересно студентам и начинающим разработчикам.
	
	Данный файл является точкой входа приложения.	
	************************************************ */
	
	// подключаем файл конфигурации
	require_once($_SERVER["DOCUMENT_ROOT"] . '/application/config/config.php');
	
	// подключаем класс приложения (APP - константа. Взят из файла config.php)
	require_once(APP . 'core/application.php');
	
	// пока подключаем все ручками. 
	require_once APP . 'core/controller.php';
	
	
	// создаем обьект приложения (роутер)
	$app = new Application;
?>