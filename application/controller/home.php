<?php

	/* ***************************
	Контроллер станицы Home
	**************************** */
	
	class Home extends Controller {
		
		public function index() {
			
			// подгружаем Виды для заданого Экшн
			require APP . 'view/_template/header.php';
			require APP . 'view/home/index.php';
			require APP . 'view/_template/footer.php';
			
		}	

		public function actionOne() {
			
			// подгружаем Виды для заданого Экшн
			require APP . 'view/_template/header.php';
			require APP . 'view/home/actionOne.php';
			require APP . 'view/_template/footer.php';
		}	

		public function actionTwo() {
			
			// подгружаем Виды для заданого Экшн
			require APP . 'view/_template/header.php';
			require APP . 'view/home/actionTwo.php';
			require APP . 'view/_template/footer.php';			
		}			
	}		
?>