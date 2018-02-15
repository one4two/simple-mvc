<!DOCTYPE html>
<html>
	<head>
		<title>MVC Simple</title>
		<meta charset="utf-8" />
		<link href="<?php echo URL; ?>/css/mystyle.css" rel="stylesheet" />
	</head>
<body>
	<!-- Шапка сайта -->
	<header>
		<p style="padding: 10px 0 10px; margin: 0px;">Header сайта. Путь: <i>/application/view/_template/header.php</i></p>
		<nav class="nav-main">
			<a href="<?= URL ?>">Главная</a>
			<a href="<?= URL ?>/?c=home&act=actionOne">actionOne</a>
			<a href="<?= URL ?>/?c=home&act=actionTwo">actionTwo</a>
			<a href="<?= URL ?>/?c=news">Новости</a>
		</nav`>		
	</header>
	
	<main class="content">
	