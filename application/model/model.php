<?php
	class Model {
		
		public function __construct($conn) {
			$this->conn = $conn;
		}	
		
		// 
		public function getAllNews() {
			$qry = $this->conn->query("select title, text from articles");
			return $qry->fetchAll(MYSQLI_ASSOC);
		}
	}		
?>