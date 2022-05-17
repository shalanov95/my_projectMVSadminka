<?php
	namespace Project\Controllers;
	use \Core\Controller;
	use \Project\Models\AddData;
	use \Project\Models\GetData;
	use \Project\Models\GetOne;
	use \Project\Models\DelData;
	use \Project\Models\UpData;
    use \Project\Models\Commun ;

	class ClinicController extends Controller
    {
        public function __construct()
		{
            
			$this->title = "Клиники";
			$this->name = "Clinic";
			$this->index = "clinic/index";
			$this->yes = ["h1"=>$this->title, "no" => "запрос успешно отправлен!"];
			$this->no = ["h1"=>$this->title, "no" => "Ошибка, запись уже существует!"];
		}
        public function manager() {
            if(empty($_SESSION["user"])){
                header("Location: /auth/");
            }
            $nameFun = $this->name ;
            // Просмотр списка клиник
            if(isset($_POST["get" . $this->name])) {
                $result = (New GetData)->$nameFun();
                return $this->render( $this->index, [ "h1"=>$this->title, "result" => $result, ]);
            }
            // Добавление клиники
            if(isset($_POST["add"])) {
                if(empty((New GetOne)->$nameFun($_POST))){	
                    (New AddData)->$nameFun($_POST);
                    return $this->render($this->index, $this->yes);
                }
                return $this->render( $this->index, $this->no);
            }
            // Редактировать клиники
            if(isset($_POST["up"])){
                (New UpData)->$nameFun($_POST);
                return $this->render($this->index, $this->yes);
            }
            // Удаление клиники
            if(isset($_POST["del"])){
                (New DelData)->$nameFun($_POST);
                return $this->render($this->index, $this->yes);
            }
            // Добавление специалиста
            if(isset($_POST["com"]) && !empty($_POST["idCli"]) && !empty($_POST["idPer"])){
                $nameFun = "com" . $nameFun;
                (New Commun)->$nameFun($_POST);
                return $this->render($this->index, $this->yes);
            }
            return $this->render( $this->index, [ "h1"=>$this->title,]);
        }
    }