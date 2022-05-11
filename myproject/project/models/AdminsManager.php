<?php
namespace Project\Models;
	use \Core\Model;

	class AdminsManager extends Model {
        public function getOne($id){
            return $this->findOne("SELECT * FROM admins WHERE id='$id'");
        }
        public function issetLogin($login){
            $login=$this->findOne("SELECT * FROM admins WHERE login='$login'");
            return isset($login);
        }

        public function getAll(){
            return $this->findMany("SELECT * FROM admins");
        }
        public function setOne($login, $password, $rights){
            return $this->editor("INSERT INTO `admins`( `login`, `password`, `rights`) VALUES ('$login','$password','$rights')");
        }
        public function delOne($login){
            return $this->editor("DELETE FROM admins WHERE `admins`.`login` = '$login'");
        }
    }
    