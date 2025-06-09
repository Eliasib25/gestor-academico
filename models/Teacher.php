<?php 

    require_once("../components/conectmysql.php");

     Class Teacher extends ConectarMysql {

        private $table = "teachers";

        public function save($identificationNumber, $identificationType,$name, $lastname, $dateBorn, $numberPhone, $email, $userId){

                // Insertar nuevo registro
                $sqlInsert = "INSERT INTO ".$this->table. " (identification, identificationType, name, lastname, dateBorn, phone, email, userId) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stmtInsert = $this->getconexion()->prepare($sqlInsert);
                $stmtInsert->bind_param("ssssssss",$identificationNumber, $identificationType, $name, $lastname, $dateBorn, $numberPhone, $email, $userId);
                if ($stmtInsert->execute()) {
                    return "success"; // Registro exitoso
                } else {
                    return "error"; // Error al insertar
                }

        }

        public function searchTeacher($identificationNumber, $identificationType){
            $sqlCheck = "SELECT 1 FROM ". $this->table. " WHERE identification = ? AND identificationType = ?";
            $stmtCheck = $this->getconexion()->prepare($sqlCheck);
            $stmtCheck->bind_param("ss", $identificationNumber, $identificationType);
            $stmtCheck->execute();
            $resultCheck = $stmtCheck->get_result();

            if ($resultCheck->num_rows > 0) {
                return "teacherExist";
            } else {
                return "teacherNotFound";
            }
        }


    }

?>