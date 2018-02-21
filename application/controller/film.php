<?php

class Film extends Controller {
	
	// базовый метод класса
	public function index() {
		$films = $this->model->getAllFilms();	
		$janres = $this->model->getAllJanres();
		$countries = $this->model->getAllCountries();
		$producers = $this->model->getAllProducers();
		/*
		echo '<pre>';
		var_dump($table);
		echo '</pre>';
		*/
		require APP . 'view/_template/header.php';
		require APP . 'view/Film/index.php';
		require APP . 'view/_template/footer.php';
		
	}
	
	// Экшн (метод) добавляет фильм используя массив $_POST
	public function addFilm() {
		
		// проверяем нажата ли кнопка
		if(isset($_POST["add_film"])) {
			/*
				echo '<pre>';
				var_dump($_POST);
				echo '</pre>';
			*/
			// да, нажата
			$this->model->addFilm($_POST["name"], $_POST["s_janr"], $_POST["year"], $_POST["s_country"], $_POST["s_producer"]);			
		}
		
		// направляемся назад в любом случае
		header('location: ' . URL . '/?c=film');
	}		
	
	// Экшн (метод) удаляет запись из БД по ID фильма 
	public function deleteFilm($film_id) {		
		//var_dump($film_id); Если это разкоментировать, то не сработает перенаправление 'header'
		if(isset($film_id)) {
			// удалили фильм 
			$this->model->deleteFilm($film_id);			
		}
		// и возвращаемся назад
		header('location: ' . URL . '/?c=film');
	}
		
	// Экшн(метод) отображает страницу редактирования Фильма
	public function editFilm($film_id) {
		$film = $this->model->getOneFilm($film_id);
		/*
		echo '<pre>';
		var_dump($film);
		echo '</pre>';
		*/
		$janres = $this->model->getAllJanres();
		$countries = $this->model->getAllCountries();
		$producers = $this->model->getAllProducers();
		
		// подгружаем Виды
		require APP . 'view/_template/header.php';
		require APP . 'view/film/edit.php';
		require APP . 'view/_template/footer.php';
	}
	
	// Экшн (метод) редактирует фильм используя массив $_POST
	public function updateFilm() {
		/*
		echo '<pre>';
		var_dump($_POST);
		echo '</pre>';
		*/
		if(isset($_POST['update'])) {			
			$this->model->updateFilm($_POST['film_id'], $_POST['name'], $_POST['year'], $_POST['s_janr'], $_POST['s_country'], $_POST['s_producer']);
		}
		header('Location:' . URL . '/?c=film');
	}
}

?>