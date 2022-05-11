<?php
namespace Project\Models;
	use \Core\Model;

    class ClinicManager extends Model 
    {
        public function getOnePers($id) 
        {
            If(strlen($id) < 6){
            return $this->findOne("SELECT personal.IDpersonal, surname, personal.name, patronymic, profession, unique_key, date_start, 
            date_end, GROUP_CONCAT(clinic.short_name SEPARATOR ', ')  as work
            FROM personal
            LEFT JOIN pers_clin ON personal.IDpersonal=pers_clin.id_personal
            LEFT JOIN clinic ON clinic.IDclinic=pers_clin.id_clinic
            WHERE personal.IDpersonal='$id'");
            } else {
            return $this->findOne("SELECT personal.IDpersonal, surname, personal.name, patronymic, profession, unique_key, date_start, 
            date_end, GROUP_CONCAT(clinic.short_name SEPARATOR ', ') as work
            FROM personal
            LEFT JOIN pers_clin ON personal.IDpersonal=pers_clin.id_personal
            LEFT JOIN clinic ON clinic.IDclinic=pers_clin.id_clinic
            WHERE personal.unique_key='$id'");
            }
        }
        public function getAllClinic()
        {
            return $this->findMany("SELECT * FROM clinic");
        }
        public function getOneClinic($name)
        {
            return $this->findOne("SELECT * FROM clinic WHERE clinic.name='$name'");
        }
        public function getAllPers($id){
            return $this->findMany("SELECT personal.IDpersonal, surname, personal.name, patronymic, profession, unique_key, date_start, 
            date_end, clinic.short_name as work
            FROM personal
            LEFT JOIN pers_clin ON personal.IDpersonal=pers_clin.id_personal
            LEFT JOIN clinic ON clinic.IDclinic=pers_clin.id_clinic
            WHERE clinic.IDclinic ='$id'");
        }
        public function setOnePers($surname, $name, $patronymic, $profession, $uniqueKey, $dateStart, $dateEnd, $idClinics){
            // создаем запись в таблице перонала
            if(!empty($dateEnd)) {
                $this->editor("INSERT INTO personal (`surname`, `name`, `patronymic`, `profession`, `unique_key`, `date_start`, `date_end`) 
                VALUES ('$surname', '$name', '$patronymic', '$profession', '$uniqueKey', '$dateStart', '$dateEnd')");
            } else {
                $this->editor("INSERT INTO personal (`surname`, `name`, `patronymic`, `profession`, `unique_key`, `date_start`) 
                VALUES ('$surname', '$name', '$patronymic', '$profession', '$uniqueKey', '$dateStart')");
            }
            // Дальше узнаем IDpersonal новой записи
            $idPer = $this->findOne("SELECT personal.IDpersonal FROM personal WHERE unique_key = '$uniqueKey' ");
            $idPersonal=$idPer["IDpersonal"];
            // добавляем строку в таблицу связей
            foreach ($idClinics as $idClinic) {
            $this->editor("INSERT INTO `pers_clin`(`id_personal`, `id_clinic`) VALUES ('$idPersonal', '$idClinic')");
            }
            return;
        }
        //Редактируем запись в таблице персонала и связей
        public function upOnePers($idPer,$surname, $name, $patronymic, $profession, $uniqueKey, $dateStart, $dateEnd, $idClinics){
            if(!empty($dateEnd)){
                 $this->editor("UPDATE `personal` SET `surname`='$surname',`name`='$name',`patronymic`='$patronymic',`profession`='$profession',
                `unique_key`='$uniqueKey',`date_start`='$dateStart',`date_end`='$dateEnd' WHERE `IDpersonal`= '$idPer'");
            } else {
                $this->editor("UPDATE `personal` SET `surname`='$surname',`name`='$name',`patronymic`='$patronymic',`profession`='$profession',
                `unique_key`='$uniqueKey',`date_start`='$dateStart' WHERE `IDpersonal`= '$idPer'");
            }
            $this->editor("DELETE FROM pers_clin WHERE `pers_clin`.`id_personal` = '$idPer'");
            foreach ($idClinics as $idClinic) {
            $this->editor("INSERT INTO `pers_clin`(`id_personal`, `id_clinic`) VALUES ('$idPer', '$idClinic')");
            }
            return;
        }

        public function delOnePers($id)
        {
            $this->editor("DELETE FROM pers_clin WHERE `pers_clin`.`id_personal` = '$id'");
            $this->editor("DELETE FROM personal WHERE `personal`.`IDpersonal` = '$id'");
            return;
        }

        // добавление поликниники
        public function setOneCli($number, $name, $shortName, $address, $email, $phone, $special)
        {
            $this->editor("INSERT INTO `clinic`(`number`, `name`, `short_name`, `address`, `email`, `phone`, `special`)
            VALUES ('$number','$name','$shortName','$address','$email','$phone','$special')");
            return;
        }
        //редактирование больницы
        public function upOneCli( $number, $name, $shortName, $address, $email, $phone, $special, $idClin)
        {
             $this->editor("UPDATE `clinic` SET `number`='$number',`name`='$name',
            `short_name`='$shortName',`address`='$address',`email`='$email',`phone`='$phone',`special`='$special' WHERE `IDclinic`= '$idClin'");
        }

        public function delOneCli($id)
        {
            $this->editor("DELETE FROM pers_clin WHERE `pers_clin`.`id_clinic` = '$id'");
            $this->editor("DELETE FROM clinic WHERE `clinic`.`IDclinic` = '$id'");
            return;
        }
        // добавить специалистов клинике по их id
        public function addPerCli($idPersonals, $idClinic)
        {
            foreach ($idPersonals as $idPersonal) {
                $this->editor("INSERT INTO `pers_clin`(`id_personal`, `id_clinic`) VALUES ('$idPersonal', '$idClinic')");
                }

        }
    }