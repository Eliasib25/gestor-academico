<?php 

    require_once(__DIR__ . "/../components/conectmysql.php");

    Class Teacher extends ConectarMysql {

        private $table = "teachers";

        public function save($identificationNumber, $identificationType,$name, $lastname, $dateBorn, $numberPhone, $email, $userId){

                
                $sqlInsert = "INSERT INTO ".$this->table. " (identification, identificationType, name, lastname, dateBorn, phone, email, userId) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stmtInsert = $this->getconexion()->prepare($sqlInsert);
                $stmtInsert->bind_param("ssssssss",$identificationNumber, $identificationType, $name, $lastname, $dateBorn, $numberPhone, $email, $userId);
                if ($stmtInsert->execute()) {
                    return "success";
                } else {
                    return "error"; 
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

        public function searchAll(){
            $sql = "SELECT * FROM ".$this->table;
            $statement = $this->getconexion()->prepare($sql);

            if ($statement->execute()){
                return $statement->get_result();
            } else {
                return "error: ".$statement->error;
            }

        }

        public function updateTeacher($identificationNumber, $identificationType, $name, $lastname, $dateBorn, $numberPhone, $email, $userId) {
            $sql = "UPDATE " . $this->table . " SET name = ?, lastname = ?, dateBorn = ?, phone = ?, email = ?, userId = ? 
                    WHERE identification = ? AND identificationType = ?";
            $stmt = $this->getconexion()->prepare($sql);
            $stmt->bind_param("ssssssis", $name, $lastname, $dateBorn, $numberPhone, $email, $userId, $identificationNumber, $identificationType);
            $stmt->execute();
        }

        public function obtenerUserId($username) {
            $sql = "SELECT id FROM users WHERE user = ?";
            $stmt = $this->getconexion()->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $resultado = $stmt->get_result();
            if ($fila = $resultado->fetch_assoc()) {
                return $fila['id'];
            }
        return null;
        } 

        public function assignAcademicLoad($identification, $identificationType, $gradeId) {

            $sql = "SELECT 1 FROM " . $this->table . " WHERE grades_id = ?";
            $statement = $this->getconexion()->prepare($sql);
            $statement->bind_param("i", $gradeId);
            $statement->execute();
            $result = $statement->get_result();

            if ($result->num_rows >= 1) {
                return "existGrade";
            } else {
                $sql = "UPDATE ".$this->table. " SET grades_id = ? WHERE identification = ? AND identificationType = ?";
                $statement = $this->getconexion()->prepare($sql);
                $statement->bind_param("iss", $gradeId, $identification,$identificationType);
                if($statement->execute()){
                    return "success";
                } else {
                    return "error: ".$statement->error;
                }
            }

        }

        public function showAcademicLoad(){
            $sql = "SELECT t.name, t.lastname, g.name AS grade_name, g.journey FROM ". $this->table. " t LEFT JOIN grades g ON t.grades_id = g.id";
            $statement = $this->getconexion()->prepare($sql);
            if ($statement->execute()){
                return $statement->get_result();
            } else {
                return "error: ".$statement->error;
            }
        }

        public function searchTeacherByUserId($userId){
            $sql = "SELECT identification, identificationType FROM ".$this->table . " WHERE userId = ?";
            $statement = $this->getconexion()->prepare($sql);
            $statement -> bind_param("i", $userId);
            if ($statement->execute()){
                $result = $statement->get_result();
                return $result->fetch_assoc();
            } else {
                return "error: ". $statement->eror;
            }

        }

    }
    


?>