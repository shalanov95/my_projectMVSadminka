<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/project/webroot/tailwind.min.css" rel="stylesheet">
    <title><?= $title ?></title>
</head>
<body>
	<header>
	<h1 class="text-3xl text-white bg-blue-300 px-4 ">"Поликлиника"</h1>
	<?php if (isset($_SESSION["user"])): ?>
		<div class="text-2xl bg-blue-300 px-4 pb-4  flex flex-wrap ">
			<a href="/admin/" class=" text-blue-900 bg-white   pb-8 hover:bg-blue-100">Администраторы приложения</a>
			<a href="/clinic/" class=" text-blue-900 bg-white px-8 hover:bg-blue-100">Поликлиники </a>
			<a href="/personal/" class=" text-blue-900 bg-white px-8 hover:bg-blue-100">Специалисты</a>
			<form method="POST">
			<button name="exit" class="bg-blue-500 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded" type="submit">
            	Выход
        	</button>
			</form>
		</div>
	<?php endif ?>
	</header>
		<?= $content ?>
	<footer>
	</footer>
</body>
</html>
