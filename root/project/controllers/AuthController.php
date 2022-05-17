<?php
	namespace Project\Controllers;
	use \Core\Controller;
	use \Project\Models\Auth;
	
	class AuthController extends Controller
	{
		public function auth() {
			if(!empty($_SESSION["user"])){
				header("Location: /admin/");
			}
			$this->title = 'Авторизация';
			if(isset($_POST["auth"])) {
				$auth = (new Auth)->auth($_POST['login'],$_POST['password']);
				if(!empty($auth['login'])){
					// начинаем сессию при успешной авторизация, заносим данные авторизовашегося пользователя в $_SESSION["user"]
					$_SESSION["user"] = $auth;
					// и переходи на домашнюю страницу
					header("Location: /admin/");
				}
				// вывод неверно введеной формы
				return $this->render('auth/index',  ["h1" => "Ошибка!Неверно ввведен логин или пароль",]);
			}
			// окно без введения формы
			return $this->render('auth/index', ["h1" => $this->title]);
		}
	}