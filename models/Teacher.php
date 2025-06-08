<?php 

    require_once("../components/conectmysql.php");

     Class Teacher extends ConectarMysql {

        private $table = "teachers";

        public function save($identificationType, $identificationNumber, $name, $lastname, $dateBorn, $numberPhone, $email, $passowrd, $confirmPassword, $userId){

            // Validar si el número de identificación ya existe
            $sqlCheck = "SELECT 1 FROM ". $this->table. " WHERE identification_number = ?";
            $stmtCheck = $this->getconexion()->prepare($sqlCheck);
            $stmtCheck->bind_param("s", $identificationNumber);
            $stmtCheck->execute();
            $resultCheck = $stmtCheck->get_result();

            if ($resultCheck->num_rows > 0) {
                return "duplicate_identification"; // Número de identificación ya existe
            } else {
                // Insertar nuevo registro
                $sqlInsert = "INSERT INTO ".$this->table. " (identification_type, identification_number, name, lastname, date_born, number_phone, email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stmtInsert = $this->getconexion()->prepare($sqlInsert);
                $stmtInsert->bind_param("ssssssss", $identificationType, $identificationNumber, $name, $lastname, $dateBorn, $numberPhone, $email, password_hash($passowrd, PASSWORD_DEFAULT), $userId);
                if ($stmtInsert->execute()) {
                    return "success"; // Registro exitoso
                } else {
                    return "error"; // Error al insertar
                }
            }

        }


    }

?>