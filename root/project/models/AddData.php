<?php

namespace Project\Models;
	use \Core\Model;


	class AddData extends Model {

        public function admin($arr) {
            $login = $arr["setLogin"];
            $rights = $arr["setRights"];
            //хешируем пароль чтобы он хранился в бд в виде хеша
            $password = password_hash($arr["setPassword"], PASSWORD_DEFAULT);
            return $this->editor("INSERT INTO `admin`( `login`, `password`, `rights`) VALUES ('$login','$password','$rights')");
        }

        public function clinic($arr) {
            $number = $arr['number'];
            $name = $arr['name'];
            $shortName =  $arr['shortName'];
            $address = $arr['address'];
            $email =  $arr['email'];
            $phone = $arr['phone'];
            $special = $arr['special'];
            $this->editor("INSERT INTO `clinic`(`number`, `name`, `short_name`, `address`, `email`, `phone`, `special`)
            VALUES ($number, $name, $shortName, $address,  $email ,  $phone, $special )");
            return;
        }

        public function personal($arr) {
            $surname = $arr['surname'];
            $name = $arr['name'];
            $patronymic = $arr['patronymic'];
            $profession =  $arr['profession'];
            $uniqueKey = $arr['uniqueKey'];
            $dateStart = $arr['dateStart'];
            $dateEnd = $arr['dateEnd'];
            if(!empty($dateEnd)) {
                $this->editor("INSERT INTO personal (`surname`, `name`, `patronymic`, `profession`, `unique_key`, `date_start`, `date_end`) 
                VALUES ('$surname', '$name', '$patronymic', '$profession', '$uniqueKey', '$dateStart', '$dateEnd')");
            } else {
                $this->editor("INSERT INTO personal (`surname`, `name`, `patronymic`, `profession`, `unique_key`, `date_start`) 
                VALUES ('$surname', '$name', '$patronymic', '$profession', '$uniqueKey', '$dateStart')");
            }
        }
    }