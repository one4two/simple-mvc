<h2>Это страница Film->index() нашего сайта.</h2>
<p>Все что находится в этом боксе приходит из файла: 
	<span style="background-color: #f7f7f7;">/application/view/film/index.php</span>
</p>
<!--
	* * * Добавить новый фильм (Форма) * * *
-->
<div class="container">
	<h4>Добавить новый фильм</h4>
	<p>
		<span style="color: red">*</span> 
		<span style="font-size: 82%; color: gray;">
		База спроектирована таким образом что для определеннго фильма допустимо иметь несколько жанров, стран и продюссеров,
		но в данный момент эта возможность не реализована в части Front-end. Таблицы БД отвечающие за это: <b>films_janres</b>, 
		<b>films_countries</b>, <b>films_producers</b>. 
		</span>
	</p>
	<form action="?c=film&act=addFilm" method="POST">
		<span>Название: <input type="text" placeholder=". . ." name="name" required /></span>
		<!-- 
			Все данные которые используются на этой странице приходят
			из файла-контроллера Film, метод index()
			application/controller/film.php
		-->
		<span>Жанр: 
			<select name="s_janr">
				<?php foreach($janres as $data): ?>
					<option value="<?= $data['janr_id']?>"><?= $data['janr_name'] ?></option>
				<?php endforeach ?>
				
			</select>
		</span>
		
		<span>Год выпуска: <input type="text" name="year" placeholder="2021-12-31" required /></span>
		
		<span>Страна: 
			<select name="s_country">
				<?php foreach($countries as $data): ?>
					<option value="<?= $data['country_id']?>"><?= $data['country_name'] ?></option>
				<?php endforeach ?>
			</select>
		</span>
		
		<span>Режиссёр: 
			<select name="s_producer">
				<?php foreach($producers as $data): ?>
					<option value="<?= $data['producer_id']?>"><?= $data['producer_name'] ?></option>
				<?php endforeach ?>
			</select>
		</span>
		
		<button style="" type="submit" name="add_film" value="submited">Добавить</button>
	</form>
</div>
<!-- 
	* * * Таблица с фильмами * * *
-->
<div class="container">	
		<table>
			<thead style="background-color: #ddd">
				<tr>
					<th>Название фильма</th>
					<th>Жанр</th>
					<th>Год выпуска</th>	
					<th>Страна</th>
					<th>Режиссёр</th>
				</tr>
			</thead>
			<tbody class="tfilm">				
				<tr>
					<td><?= $films[0]['film_name']?></td>
					<td><?= $films[0]['Janres']?></td>
					<td><?= $films[0]['year']?></td>					
					<td><?= $films[0]['Countries']?></td>
					<td><?= $films[0]['Producers']?></td>					
				</tr>
				<?php if(isset($films[0])) unset($films[0]); ?>
				<?php foreach($films as $data): ?>
				<tr>					
					<td><?= $data['film_name']?></td>
					<td><?= $data['Janres']?></td>
					<td><?= $data['year']?></td>					
					<td><?= $data['Countries']?></td>
					<td><?= $data['Producers']?></td>
					<td class="td_delete"><a href="?c=film&act=deleteFilm&p=<?= (int)$data['film_id'] ?>">удалить</a></td>
					<td class="td_delete"> | </td>
					<td class="td_delete"><a href="?c=film&act=editFilm&p=<?= (int)$data['film_id'] ?>">редактировать</a></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>	
</div>

