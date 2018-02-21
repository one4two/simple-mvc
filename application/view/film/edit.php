<h2>Это страница Film->edit() нашего сайта.</h2>
<p>Все что находится в этом боксе приходит из файла: 
	<span style="background-color: #f7f7f7;">/application/view/film/edit.php</span></p>
<!--
	* * * Добавить новый фильм * * *
	Массив $film который используется на этой странице приходит из
	файла-контроллера Film, метода edit();
-->
<div class="container">
	<h2>Редактирование фильма: </h2>
	<p>
		<span style="color: red">*</span> 
		<span style="font-size: 82%; color: gray;">
		Множественное редактирование Жанров, Стран и Режиссеров в данный момент пока не реализовано 
		в части Front-end. Таблицы БД отвечающие за это: <b>films_janres</b>, 
		<b>films_countries</b>, <b>films_producers</b>. 
		</span>
	</p>

	<form action="<?= URL ?>/?c=film&act=updateFilm" method="POST">
		<span>Название:
			<!-- 
				Чтобы редактировать фильм, нам нужен его ИД, поэтому сохраняем его в поле Input и прячем, 
				 для дальнейшего считывания 
		    -->
			<input type="hidden" name="film_id" value="<?= $film[0][0]['film_id']?>" />
			<input type="text" name="name" value="<?= $film[0][0]['film_name'] ?>" required />
		</span>
		<span>Жанр:
			<select name="s_janr">
				<!-- Выводим жанр выбраного фильма -->
				<option value="<?= $film[1][0]['janr_id']?>"><?= $film[1][0]['janr_name'] ?></option>
				<!-- а потом и все доступные -->
				<?php foreach($janres as $data): ?>
					<option value="<?= $data['janr_id']?>"><?= $data['janr_name'] ?></option>
				<?php endforeach; ?>				
			</select>
		</span>
		
		<span>Год выпуска:
			<input type="text" name="year" value="<?= $film[0][0]['year'] ?>" placeholder="2018-01-01" required />
		</span>
		
		<span>Страна:
			<select name="s_country">
				<option value="<?= $film[2][0]['country_id']?>"> <?= $film[2][0]['country_name']?> </option>
				<?php foreach($countries as $data): ?>
					<option value="<?= $data['country_id']?>"><?= $data['country_name'] ?></option>
				<?php endforeach; ?>				
			</select>
		</span>
		
		<span>Режиссёр:
			<select name="s_producer">
				<option value="<?= $film[3][0]['producer_id']?>"> <?= $film[3][0]['producer_name']?> </option>
				<?php foreach($producers as $data): ?>
					<option value="<?= $data['producer_id']?>"><?= $data['producer_name'] ?></option>
				<?php endforeach; ?>				
			</select>
		</span>
		
		<button onclick="location.href='<?= URL ?>/?c=film'" type="button" >Назад</button>
		<button type="submit" name="update" value="submited">Сохранить</button>
	</form>
	
</div>