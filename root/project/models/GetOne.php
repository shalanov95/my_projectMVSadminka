<?php

namespace Project\Models;
	use \Core\Model;
    
	class GetOne extends Model {
        public function admin($arr){
            $login = $arr['setLogin'] ?? false;
            return $this->findOne("SELECT * FROM `admin` WHERE `login` = '$login'");
        }

        public function clinic($arr){
            $num = $arr['number'] ?? false;
            return $this->findOne("SELECT * FROM clinic WHERE `number` = '$num'");
        }

        public function personal($arr){
            $num = $arr['uniqueKey'] ?? false;
            return $this->findOne("SELECT * FROM personal WHERE `unique_key` = '$num'");
        }
    }