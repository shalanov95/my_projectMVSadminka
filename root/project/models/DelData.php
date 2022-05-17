<?php

namespace Project\Models;
	use \Core\Model;

	class DelData extends Model {
        public function admin($arr){
            $login = $arr["delAdmin"];
            return $this->editor("DELETE FROM `admin`WHERE `admin`.`login` = '$login'");
        }

        public function clinic($arr){
            $id= $arr["delClinic"];
            // удаляем из таблицы связей
            $this->editor("DELETE FROM pers_clin WHERE`id_clinic` = '$id'");
            $this->editor("DELETE FROM clinic WHERE `IDclinic` = '$id'");
            return;
        }

        public function personal($arr){
            $id= $arr["delPersonal"];
            // удаляем из таблицы связей
            $this->editor("DELETE FROM pers_clin WHERE `id_personal` = '$id'");
            $this->editor("DELETE FROM personal WHERE `IDpersonal` = '$id'");
            return;
        }
    }