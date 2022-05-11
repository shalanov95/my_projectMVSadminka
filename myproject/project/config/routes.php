<?php
	use \Core\Route;
	
	return [
		new Route('/hello/', 'hello', 'index'), // роут для приветственной страницы, проверяющий подключениние к БД
		new Route('/clinic/:id', 'clinic', 'manager'),
	];
	
