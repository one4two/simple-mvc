<?php

class News extends Controller {
	
	public function __construct() {
		//$this->getAllNews;
	}		
	
	public function index() {
		require APP . 'view/_template/header.php';
		require APP . 'view/news/index.php';
		require APP . 'view/_template/footer.php';
	}
	
	// данные метод возвращает все записи из таблицы новости
	public function getAllNews() {
		
	}
}

?>