<?php
	namespace Project\Controllers;
	use \Project\Controllers\ClinicController ;
	
	class AdminController extends ClinicController
	{
		public function __construct()
		{
			$this->title = "Администраторы";
			$this->name = "Admin";
			$this->index = "admin/index";
			$this->yes = ["h1"=>$this->title, "no" => "запрос успешно отправлен!"];
			$this->no= ["h1"=>$this->title, "no" => "Ошибка, запись уже существует!"];
		}
	}