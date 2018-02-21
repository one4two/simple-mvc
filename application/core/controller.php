<?php

/* ****************************
	Базовый класс контроллера.
	От него будут наследоватся
	все созданные контроллеры 
   ************************* */

class Controller {
	
	// тут будет хранится идентификатор соединения
	public $conn  = null;
	
	// тут будет хранится модель
	public $model = null;
	
	// б.к.
	public function __construct() {
		$this->createDatabaseConn();
		$this->loadModel();
	}
	
	// создание соединения
	private function createDatabaseConn() {
		$this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if($this->conn->connect_errno) {
			echo "<b>Can't connect to Database:</b> " . $this->conn->connect_error;
		}		
	}
	
	// загрузка модели
	public function loadModel() {
		require APP . 'model/model.php';
		$this->model = new Model($this->conn);
		//var_dump($this->model);
	}		
}	
?>