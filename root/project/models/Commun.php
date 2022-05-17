<?php

namespace Project\Models;
	use \Core\Model;

    class Commun extends Model 
    {
        public function comClinic($arr) {
        $idPersonals = explode(" ",$arr["idPer"]);
        $idClinic = $arr["idCli"];
        foreach ($idPersonals as $idPersonal) {
            $this->editor("INSERT INTO `pers_clin`(`id_personal`, `id_clinic`) VALUES ('$idPersonal', '$idClinic')");
            }
            return;
        }
        // на это ядре попытки внести трейды прошли безуспешно. Поэтому функция ниже удаляет связи
        // 
        public function comPersonal($arr) {
            $idClinics = explode(" ",$arr["idCli"]);
            $idPersonal = $arr["idPer"];
            foreach ($idClinics as $idClinic) {
                 $this->editor("DELETE FROM pers_clin WHERE `id_personal` = '$idPersonal' AND `id_clinic` = $idClinic");
            }
            return;
        }
    }