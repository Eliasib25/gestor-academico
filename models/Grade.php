<?php 

require_once(__DIR__ . "/../components/conectmysql.php");

Class Grade extends ConectarMysql {
    private $table = "grades";

    public function save($id, $gradeName = "", $journey = "", $classroom = "") {
        // Verificar si ya existe el mismo grado en la misma jornada
        $sqlCheckGrade = "SELECT 1 FROM ". $this->table. " WHERE name = ? AND journey = ?";
        $stmtGrade = $this->getconexion()->prepare($sqlCheckGrade);
        $stmtGrade->bind_param("ss", $gradeName, $journey);
        $stmtGrade->execute();
        $resultGrade = $stmtGrade->get_result();

        // Verificar si el salón ya está ocupado en la misma jornada
        $sqlCheckClassroom = "SELECT 1 FROM ". $this->table. " WHERE classroom = ? AND journey = ?";
        $stmtClassroom = $this->getconexion()->prepare($sqlCheckClassroom);
        $stmtClassroom->bind_param("ss", $classroom, $journey);
        $stmtClassroom->execute();
        $resultClassroom = $stmtClassroom->get_result();

        // Validaciones
        if ($resultGrade->num_rows > 0) {
            return "duplicate_grade"; // Grado ya existe en la jornada
        } elseif ($resultClassroom->num_rows > 0) {
            return "duplicate_classroom"; // Salón ya ocupado en la jornada
        } else {
            // Insertar nuevo registro
            $sqlInsert = "INSERT INTO ".$this->table. " VALUES (?, ?, ?, ?)";
            $stmtInsert = $this->getconexion()->prepare($sqlInsert);
            $stmtInsert->bind_param("isss", $id, $gradeName, $journey, $classroom);
            $stmtInsert->execute();
            return "success"; // Registro exitoso
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

    public function updateGrade($id, $name, $journey, $classroom) {
        $sql = "UPDATE " . $this->table . " SET name = ?, journey = ?, classroom = ? WHERE id = ?";
        $stmt = $this->getconexion()->prepare($sql);
        $stmt->bind_param("sssi", $name, $journey, $classroom, $id);
        $stmt->execute();
    }
    
}