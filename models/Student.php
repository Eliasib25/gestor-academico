<?php 

require_once(__DIR__ . "/../components/conectmysql.php");

class Student extends ConectarMysql {
    private $table = "students";

    public function register($identification, $identificationType, $name, $lastname, $dateBorn, $address, $identificationTypeAttendant, $identificationAttendant, $nameAttendant, $lastnameAttendant, $phone, $email, $gradesId){
        // Verificar si el estudiante ya está registrado
        $sqlCheck = "SELECT 1 FROM ".$this->table." WHERE identification = ?";
        $stmtCheck = $this->getconexion()->prepare($sqlCheck);
        $stmtCheck->bind_param("s", $identification);
        $stmtCheck->execute();
        $result = $stmtCheck->get_result();

        if ($result->num_rows > 0) {
            return "duplicate_student";
        }

        // Insertar nuevo estudiante
        $sql = "INSERT INTO ".$this->table." VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $statement = $this->getconexion()->prepare($sql);
        $statement->bind_param("ssssssssssssi", 
            $identification, 
            $identificationType, 
            $name, 
            $lastname, 
            $dateBorn, 
            $address, 
            $identificationTypeAttendant, 
            $identificationAttendant, 
            $nameAttendant, 
            $lastnameAttendant, 
            $phone, 
            $email, 
            $gradesId
        );

        if ($statement->execute()) {
            return "success";
        } else {
            return "error: " . $statement->error;
        }
    }

    public function searchOne($identification){
        $sql = "SELECT * FROM ".$this->table." WHERE identification = ?";
        $statement = $this->getconexion()->prepare($sql);
        $statement->bind_param("s", $identification);
        $statement->execute();
        $result = $statement->get_result();
        if ($result->num_rows > 0){
            return $result->fetch_assoc();
        } else {
            return "userNotFound";
        }
    }

    public function searchAll(){
        $sql = "SELECT * FROM ".$this->table;
        $statement = $this->getconexion()->prepare($sql);

        if ($statement->execute()){
            return $statement->get_result();
        } else {
            return "error: " . $statement->error;
        }
    }

    public function updateStudent($identification, $identificationType, $name, $lastname, $dateBorn, $address, $identificationTypeAttendant, $identificationAttendant, $nameAttendant, $lastnameAttendant, $phone, $email, $gradesId) {
        $sql = "UPDATE " . $this->table . " 
                SET identificationType = ?, 
                    name = ?, 
                    lastname = ?, 
                    dateBorn = ?, 
                    address = ?, 
                    identificationTypeAttendant = ?, 
                    identificationAttendant = ?, 
                    nameAttendant = ?, 
                    lastnameAttendant = ?, 
                    phone = ?, 
                    email = ?, 
                    gradesId = ?
                WHERE identification = ?";
        
        $stmt = $this->getconexion()->prepare($sql);
        $stmt->bind_param("sssssssssssis", 
            $identificationType, 
            $name, 
            $lastname, 
            $dateBorn, 
            $address, 
            $identificationTypeAttendant, 
            $identificationAttendant, 
            $nameAttendant, 
            $lastnameAttendant, 
            $phone, 
            $email, 
            $gradesId,
            $identification
        );

        if ($stmt->execute()) {
            return "success";
        } else {
            return "error: " . $stmt->error;
        }
    }
}
?>
