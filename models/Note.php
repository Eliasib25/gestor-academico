<?php

require_once(__DIR__ . "/../components/conectmysql.php");

class Note extends ConectarMysql {
    private $table = "notes";

    // Guardar la nota en la base de datos
    public function save($score, $studentIdentification, $subjectId){
 
        $sqlInsert = "INSERT INTO ".$this->table. " (score, students_identification, subjects_id) VALUES (?, ?, ?)";
        $stmtInsert = $this->getconexion()->prepare($sqlInsert);
        $stmtInsert->bind_param("dii", $score, $studentIdentification, $subjectId);
        if ($stmtInsert->execute()) {
            return "success";
        } else {
            return "error"; 
        }
    }

    public function updateNote($score, $studentIdentification, $subjectId) {
        $sql = "UPDATE " . $this->table . " SET score = ? WHERE students_identification = ? AND subjects_id = ?";
        $stmt = $this->getconexion()->prepare($sql);
        $stmt->bind_param("dii", $score, $studentIdentification, $subjectId);
        if ($stmt->execute()) {
            return "success";
        } else {
            return "error"; 
        }
    }

    public function searchOneNote($studentIdentification, $subjectId){
        $sql = "SELECT 1 FROM ".$this->table. " WHERE students_identification = ? AND subjects_id = ?";
        $statement = $this->getconexion()->prepare($sql);
        $statement->bind_param("ii", $studentIdentification, $subjectId);
        $statement->execute();
        $result = $statement->get_result();
        if ($result->num_rows > 0) {
        return "noteExists"; // La nota ya existe
        } else {
            return "noteNotFound"; // No existe una nota para esa asignatura y estudiante
        }
    }
}
?>
