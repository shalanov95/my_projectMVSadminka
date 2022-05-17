<?php

namespace Project\Models;
	use \Core\Model;

	class UpData extends Model {
        public function admin($arr) {
            $id = $arr["id"];
            $login = $arr["setLogin"];
            $rights = $arr["setRights"];
            //хешируем пароль чтобы он хранился в бд в виде хеша
            $password = password_hash($arr["setPassword"], PASSWORD_DEFAULT);
            return $this->editor("UPDATE `admin` SET `login`='$login', `password`='$password', `rights`='$rights' WHERE 'id' = '$id' )");
        }
        public function clinic($arr) {
            $id = $arr['id'];
            $number = $arr['number'];
            $name = $arr['name'];
            $shortName =  $arr['shortName'];
            $address = $arr['address'];
            $email =  $arr['email'];
            $phone = $arr['phone'];
            $special = $arr['special'];
            $this->editor("UPDATE `clinic` SET `number`='$number',`name`='$name',
            `short_name`='$shortName',`address`='$address',`email`='$email',`phone`='$phone',`special`='$special' WHERE `IDclinic`= '$id'");
            return;
        }
        public function personal($arr) {
            $id = $arr['id'];
            $surname = $arr['surname'];
            $name = $arr['name'];
            $patronymic = $arr['patronymic'];
            $profession =  $arr['profession'];
            $uniqueKey = $arr['uniqueKey'];
            $dateStart = $arr['dateStart'];
            $dateEnd = $arr['dateEnd'];
            if(!empty($dateEnd)){
                $this->editor("UPDATE `personal` SET `surname`='$surname',`name`='$name',`patronymic`='$patronymic',`profession`='$profession',
               `unique_key`='$uniqueKey',`date_start`='$dateStart',`date_end`='$dateEnd' WHERE `IDpersonal`= '$id'");
            } else {
               $this->editor("UPDATE `personal` SET `surname`='$surname',`name`='$name',`patronymic`='$patronymic',`profession`='$profession',
               `unique_key`='$uniqueKey',`date_start`='$dateStart' WHERE `IDpersonal`= '$id'");
            }
        }
    }