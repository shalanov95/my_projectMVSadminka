<?php

namespace Project\Controllers;
    use \Project\Controllers\ClinicController ;
	
	class PersonalController extends ClinicController
	{
		public function __construct()
		{
			$this->title = "Персонал";
			$this->name = "Personal";
			$this->index = "personal/index";
			$this->yes = ["h1"=>$this->title, "no" => "запрос успешно отправлен!"];
			$this->no= ["h1"=>$this->title, "no" => "Ошибка, запись уже существует!"];
		}
	}