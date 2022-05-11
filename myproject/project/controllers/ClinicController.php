<?php
namespace Project\Controllers;
	use \Core\Controller;
	use \Project\Models\Auth;
    use \Project\Models\AdminsManager;
    use \Project\Models\ClinicManager;
	
	class ClinicController extends Controller{

        public function manager($params){
            session_start();
            $session = isset($_SESSION["user"]);
            if(isset($_POST["exit"]))
            {
            //при нажатие выхода уничтожаем сессию и открываем авторизацию
                $this->title = 'Авторизация';
                session_unset();
                session_destroy();
                return $this->render('auth/auth', ["h1" => $this->title]);
            }
        //действия на странице авторизации /clinic/auth/
            if($params["id"] == "auth"){
                $cook = (isset($_COOKIE["login"])) ? $_COOKIE["login"] : false;
                if($session){
                    $this->title = 'Успешная авторизация';
                    return $this->render('auth/index', ["h1" => "Главная страница", "result" => (" Здравствуйте, " . $_SESSION["user"]["login"])]);
                }
                $this->title = 'Авторизация';
                if(isset($_POST["auth"])) {
                    $auth = (new Auth)->auth($_POST['login'],$_POST['password']);
                    if(!empty($auth['login'])){
                        // создаем куки и начинаем сессию при успешной авторизация, заносим данные авторизовашегося пользователя в $_SESSION["user"]
                        // и переходи на приветственную страницу
                        setcookie("login",$auth['login'], time()+60*60*24*7);
                        $_SESSION["user"] = $auth;
                        return $this->render('auth/index', ["result" => (" Здравствуйте, " . $auth['login'])]);
                    }
                    // вывод неверно введеной формы
                    return $this->render('auth/auth',  ["cook"=>$cook, "h1" => "Ошибка!Неверно ввведен логин или пароль",]);
                }
                // окно без введения формы
             return $this->render('auth/auth', ["cook"=>$cook,"h1" => $this->title]);
            }
        // действия на странице lдобавления администраторов
            if($params["id"] == "home"){
                if(!$session){
                    header("Location: /clinic/auth/");
             }
                $this->title = "главная страница";
                return $this->render('home/index', [ "h1"=>$this->title]);

            }
        // действия на странице администраторов доступной только пользователями с session["rights"] == "root"
            if($params["id"] == "admins"){
                if(!($_SESSION["user"]["rights"] == "root")){
                    header("Location: /clinic/auth/");
                }
                $admins = new  AdminsManager;
                if(isset($_POST)) {
                    $this->title = "Администраторы";
                    if(isset($_POST['getAll'])){
                        //вызываем селект всех админов
                    $result = $admins->getAll();
                    return $this->render('admins/index', [ "h1"=>$this->title, "result" => $result, ]);
                    }
                    if(isset($_POST['getOne']) && !empty($_POST['idAdmin'])){
                        //вызываем селект одного админа
                        $admin = $admins->getOne($_POST['idAdmin']);
                        if(!empty($admin)){
                            $result = [$admin];
                            return $this->render('admins/index', [ "h1"=>$this->title, "result" => $result, ]);
                        }
                        $no = "Администратора с таким id несуществует";
                        return $this->render('admins/index', [ "h1"=>$this->title, "no" => $no, ]);
                    }
                }
                // Добавление нового администратора
                if(isset($_POST['setOne']) && !empty($_POST['setLogin']) &&!empty($_POST['setPassword']) &&!empty($_POST['setRight']))
                    {
                        // проверка уникальности логина
                        If(!$admins->issetLogin($_POST['setLogin'])){
                            $admin = $admins->setOne($_POST['setLogin'], $_POST['setPassword'], $_POST['setRight']);
                            return $this->render('admins/index', [ "h1"=>$this->title, "no" => "Успешно добавлен!" ]);
                        }
                        return $this->render('admins/index', [ "h1"=>$this->title, "no" => "Отмена, администратор с таким логином уже существует!" ]);
                    }
                if(isset($_POST['delOne']) && !empty($_POST['delAdmin']))
                {
                    // проверка уникальности логина
                    If($admins->issetLogin($_POST['delAdmin'])){
                        $admin = $admins->delOne($_POST['delAdmin']);
                        return $this->render('admins/index', [ "h1"=>$this->title, "no" => "Успешно удален!" ]);
                    }
                    return $this->render('admins/index', [ "h1"=>$this->title, "no" => "Отмена, администратора с таким лоигном не существует!" ]);
                }
                return $this->render('admins/index', [ "h1"=>$this->title]);
            }
        // действия на странице клиник и персонала
        if($params["id"] == "clinic") {
            if(!($_SESSION["user"])){
                header("Location: /clinic/auth/");
            }
            $this->title = "Клиники";
            $clinicManager = new ClinicManager;
            $clinicsNames = $clinicManager->getAllClinic();
            If(isset($_POST["getAllPer"])){
            //выводим информацию о всех работниках конкрентой клиники
                $idClinic = stristr($_POST["clinicName"], " - ", true);
                $result = $clinicManager-> getAllPers($idClinic);
                if(!empty($result))
                {
                    return $this->render('clinic/index', ["clinics" => $clinicsNames, "result" => $result]);
                }
            }
            If(isset($_POST["getAllCli"])){
                //выводим информацию о всех клиниках
                $clinicsAll=$clinicManager->getAllClinic();
                return $this->render('clinic/index', ["clinics" => $clinicsNames, "clinicsAll" => $clinicsAll]);

            }
            If(isset($_POST["getOne"])){
                //выводим информацию о конкретном работнике
                $result = $clinicManager->getOnePers($_POST["idPerson"]);
                if(!empty($result["surname"])){
                    return $this->render('clinic/index', ["clinics" => $clinicsNames, "result" => [$result]]);
                }
                return $this->render('clinic/index', ["clinics" => $clinicsNames, "no" => "Работника с данным id или БЦ-ключом не существует"]);
            }
            // добавление поликлиники
            if(!empty($_POST["setOneCli"])) {
                if(!empty($_POST["number"]) && !empty($_POST["name"]) && !empty($_POST["shortName"]) && !empty($_POST["address"]) &&
                !empty($_POST["phone"]) && !empty($_POST["special"]) && !empty($_POST["email"])) {
                    $clinicManager->setOneCli($_POST['number'], $_POST['name'], $_POST['shortName'], $_POST['address'], $_POST['email'], $_POST['phone'], $_POST['special']);
                    //проверка добавления клиники
                    if(!empty(($clinicManager->getOneClinic($_POST['name'])['name']))){
                        return $this->render('clinic/index', ["clinics" => $clinicsNames,"no" => "Успешно добавлена"]);
                    }
                }
                return $this->render('clinic/index', ["clinics" => $clinicsNames,"no" => "Ошибка!Не все поля были заполненны верно!"]);
            }
            // редактирование поликлиники
            if(!empty($_POST["upOneCli"])) {
                if(!empty($_POST["idCli"]) && !empty($_POST["number"]) && !empty($_POST["name"]) && !empty($_POST["shortName"]) && !empty($_POST["address"]) &&
                !empty($_POST["phone"]) && !empty($_POST["special"])) {
                    $clinicManager->upOneCli($_POST['number'], $_POST['name'], $_POST['shortName'], $_POST['address'], $_POST['email'], $_POST['phone'], $_POST['special'], $_POST["idCli"]);
                    return $this->render('clinic/index', ["clinics" => $clinicsNames,"no" => "Запрос на редактирование отправлен,проверьте изменения"]);
                }
                return $this->render('clinic/index', ["clinics" => $clinicsNames,"no" => "Ошибка!Не все поля были заполненны верно!"]);
            }
            // удалить клинику
            if(!empty($_POST["delOneCli"]) && !empty($_POST["delCli"])){
                $clinicManager->delOneCli($_POST["delCli"]);
                return $this->render('clinic/index', ["clinics" => $clinicsNames,"no" => "Запрос на удаление отправлен,проверьте изменения"]);
            }
            // Добавить конкетной клинике уже существуещего работника
            if(!empty($_POST["addPer"]) && !empty($_POST["addCli"]) && !empty($_POST["add"])){
                $pers = explode(" ", $_POST["addPer"]);
                $clinicManager->addPerCli($pers, $_POST["addCli"]);
                return $this->render('clinic/index', ["clinics" => $clinicsNames,"no" => "Запрос на редактирование отправлен,проверьте изменения"]);
            }
            // добавить работника
            if(!empty($_POST["setOnePer"])){
                $works = explode(" ", $_POST["workPer"]);
                $clinicManager->setOnePers($_POST["surnamePer"], $_POST["namePer"], $_POST["patronymicPer"], $_POST["professionPer"], $_POST["uniqueKeyPer"],
                $_POST["dateStartPer"], $_POST["dateEndPer"], $works);
                //проверка добавления работника
                if(!empty($clinicManager->getOnePers($_POST["uniqueKeyPer"])["surname"])) {
                    return $this->render('clinic/index', ["clinics" => $clinicsNames,"no" => "Успешно добавлен"]);
                }
                return $this->render('clinic/index', ["clinics" => $clinicsNames,"no" => "Ошибка!Не все поля были заполненны верно!"]);
            }
            // редактировать работника
            if(!empty($_POST["upOnePer"])){
                $works = explode(" ",$_POST["workPer"]);
                $clinicManager->upOnePers($_POST["idPer"], $_POST["surnamePer"], $_POST["namePer"], $_POST["patronymicPer"], $_POST["professionPer"], $_POST["uniqueKeyPer"],
                $_POST["dateStartPer"], $_POST["dateEndPer"], $works);
                return $this->render('clinic/index', ["clinics" => $clinicsNames,"no" => "Запрос на редактирование отправлен,проверьте изменения"]);
            }
        // удалить работника
            if(!empty($_POST["delOnePer"]) && !empty($_POST["delPer"])){
            $clinicManager->delOnePers($_POST["delPer"]);
            return $this->render('clinic/index', ["clinics" => $clinicsNames,"no" => "Запрос на удаление отправлен,проверьте изменения"]);
            }
            return $this->render('clinic/index', ["clinics" => $clinicsNames]);
        }
    }
}