<?php
	class Model {
		
		public function __construct($conn) {
			// тут пока так...
			$this->conn = $conn or die("Error");
		}	
		
		/* Получает все фильмы и данные о них, используя все таблицы
		   Нам нужно получить Жанры, Страны и Режиссёров одной строкой для каждого из них.
		   Для этого используем mysql функцию GROUP_CONCAT
		*/
		public function getAllFilms() {
			$qry = "select Films.film_id, Films.film_name, Films.year, 
						GROUP_CONCAT(DISTINCT Janres.janr_name SEPARATOR ', ') AS Janres, 
						GROUP_CONCAT(DISTINCT Countries.country_name SEPARATOR ', ') AS Countries,
						GROUP_CONCAT(DISTINCT Producers.producer_name SEPARATOR ', ') AS Producers
							from Films
								LEFT JOIN Films_Janres ON Films.film_id = Films_Janres.film_id
								LEFT JOIN Janres ON Films_Janres.janre_id = Janres.janr_id
								LEFT JOIN Films_Countries ON Films.film_id = Films_Countries.film_id
								LEFT JOIN Countries ON Countries.country_id = Films_Countries.country_id 
								LEFT JOIN Films_Producers ON Films.film_id = Films_Producers.film_id
								LEFT JOIN Producers ON Producers.producer_id = Films_Producers.producer_id
							GROUP BY Films.film_id; ";				
			$result = $this->conn->query($qry);
			//var_dump($qry);
			//var_dump($this->conn);
			return $result->fetch_all(MYSQLI_ASSOC);			
		}
		
		// возвращает список всех жанров из таблицы Janres
		public function getAllJanres() {
			$qry = "select * from Janres ORDER BY janr_name";
			$result = $this->conn->query($qry);
			return $result->fetch_all(MYSQLI_ASSOC);
		}
		
		// возвращает список всех стран из таблицы Countries
		public function getAllCountries() {
			$qry = "select * from Countries ORDER BY country_name";
			$result = $this->conn->query($qry);
			return $result->fetch_all(MYSQLI_ASSOC);
		}
		
		// возвращает список всех продюсеров из таблицы Producers
		public function getAllProducers() {
			$qry = "select * from Producers ORDER BY producer_name";
			$result = $this->conn->query($qry);
			return $result->fetch_all(MYSQLI_ASSOC);
		}
				
		/* возвращает данные об одном фильме используя его ID 
		   (фильм, дата, жанр и т.д.) используя все таблицы
		*/
		public function getOneFilm($film_id) {
			$film = array(); // массив для хранения извлеченных данных
			$temp; // результат выполненого запроса
			
			// Формируем сам массив, начиная с таблицы Films
			$temp = $this->conn->query("SELECT * FROM Films where $film_id = film_id");
			// добавляем в массив
			$film[] = $temp->fetch_all(MYSQLI_ASSOC);
			
			// запрашываем жанры заданого фильма 
			$temp = $this->conn->query("SELECT Janres.janr_id, Janres.janr_name FROM Janres 
											JOIN films_janres ON films_janres.janre_id = Janres.janr_id
											JOIN Films ON Films.film_id = films_janres.film_id
												WHERE Films.film_id = $film_id;");
			// добавляем в массив
			$film[] = $temp->fetch_all(MYSQLI_ASSOC);
			
			// запрашываем страны заданого фильма 
			$temp = $this->conn->query("SELECT Countries.country_id, Countries.country_name FROM Countries 
											JOIN films_countries ON films_countries.country_id = Countries.country_id
											JOIN Films ON Films.film_id = films_countries.film_id
												WHERE Films.film_id = $film_id;");				
			// добавляем в массив
			$film[] = $temp->fetch_all(MYSQLI_ASSOC);
			
			// запрашываем режиссёров заданого фильма 
			$temp = $this->conn->query("SELECT Producers.producer_id, Producers.producer_name FROM Producers
											JOIN films_producers ON films_producers.producer_id = Producers.producer_id
											JOIN Films ON Films.film_id = films_producers.film_id
												WHERE Films.film_id = $film_id;");												
			// добавляем в массив
			$film[] = $temp->fetch_all(MYSQLI_ASSOC);
			return $film;
		}

		// добавляет фильм используя данные из формы
		public function addFilm($name, $janr, $year, $country, $producer) {
			//var_dump('Name: ' . $name . '<br/>');			
			$qry = "INSERT INTO Films VALUES(null, '$name', '$year')";			
			$this->conn->query($qry);
			$last_id = $this->conn->insert_id;
			
			$this->conn->query("INSERT INTO Films_Janres SET film_id = '$last_id', janre_id = '$janr';");
			$this->conn->query("INSERT INTO Films_Countries SET film_id = '$last_id', country_id = '$country';");
			$this->conn->query("INSERT INTO Films_Producers SET film_id = '$last_id', producer_id = '$producer';");
			//var_dump('Last ID: ' . $last_id);
		}
		
		/* удаляет фильм по его ID, в том числе удаляются и записи из других таблиц
		   которые имеют отношение к данному фильму (Жанры, Страны и тд). Данные эффект 
		   достугнут с помощью инструкции ON DELETE CASCADE, для внешних ключей 
		*/
		public function deleteFilm($id) {
				$qry = "DELETE FROM Films WHERE film_id = $id";
				$this->conn->query($qry);
				//return;			
		}
		
		public function updateFilm($film_id, $name, $year, $janr, $country, $producer) {
			/*
			$qry = "UPDATE Films SET Films.film_name = '$name', Films.year = '$year' WHERE Films.film_id = $film_id";
			$qry = "UPDATE films_janres SET janre_id = $janr WHERE film_id = '$film_id'";
			$qry = "UPDATE films_countries SET country_id = $country WHERE film_id = '$film_id'";
			$qry = "UPDATE films_producers SET producer_id = $producer WHERE film_id = '$film_id'";
			*/
			$qry = "
				UPDATE Films, films_janres, films_countries, films_producers
					SET Films.film_name = '$name', Films.year = '$year',
						films_janres.janre_id = $janr,
						films_countries.country_id = $country,
						films_producers.producer_id = $producer
					WHERE Films.film_id = $film_id
						AND films_janres.film_id = $film_id
						AND films_countries.film_id = $film_id
						AND films_producers.film_id = $film_id;
				";
			$this->conn->query($qry);
			
		}
	}		
?>