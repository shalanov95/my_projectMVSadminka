<?php

namespace Project\Models;
	use \Core\Model;
    
	 class GetData extends Model {
        public function admin(){
            return $this->findMany("SELECT * FROM admin");
        }
        public function clinic(){
            return $this->findMany("SELECT * FROM clinic");
        }
        public function personal(){
            return $this->findMany("SELECT personal.IDpersonal, surname, personal.name, patronymic, profession, unique_key, date_start, 
            date_end, GROUP_CONCAT(clinic.short_name SEPARATOR ', ') as work
            FROM personal
            LEFT JOIN pers_clin ON personal.IDpersonal=pers_clin.id_personal
            LEFT JOIN clinic ON clinic.IDclinic=pers_clin.id_clinic GROUP BY  personal.IDpersonal");
        }
    }