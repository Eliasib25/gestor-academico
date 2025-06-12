<?php

require_once(__DIR__ . "/../components/conectmysql.php");

class Subject extends ConectarMysql {
    private $table = "subjects";

    public function save($name) {
        $conexion = $this->getconexion();
        $sql = "INSERT INTO " . $this->table . " (name) VALUES (?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("s", $name);
        if ($stmt->execute()) {
            return $conexion->insert_id; // ⬅️ Devuelve el ID insertado
        } else {
            return false;
        }
    }


    public function searchAll() {
        $sql = "SELECT * FROM " . $this->table;
        $stmt = $this->getconexion()->prepare($sql);
        if ($stmt->execute()) {
            return $stmt->get_result();
        }
        return "error: " . $stmt->error;
    }

    public function searchAllWithGrade() {
        $sql = "SELECT subjects.id AS subjectId, subjects.name AS subjectName, 
                    grades.id AS gradeId, grades.name AS gradeName, grades.journey, grades.classroom
                FROM subjects
                INNER JOIN subjectsgrades ON subjects.id = subjectsgrades.subjects_id
                INNER JOIN grades ON grades.id = subjectsgrades.grades_id";

        $stmt = $this->getconexion()->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        $subjects = [];
        while ($row = $result->fetch_assoc()) {
            $subjects[] = $row;
        }

        return $subjects;
    }

    public function asignarGrados($subjectId, $gradesIds) {
        $conexion = $this->getconexion();
        $sql = "INSERT INTO subjectsgrades (subjects_id, grades_id) VALUES (?, ?)";
        $stmt = $conexion->prepare($sql);

        foreach ($gradesIds as $gradeId) {
            $stmt->bind_param("ii", $subjectId, $gradeId);
            $stmt->execute();
        }
    }

    public function updateSubject($id, $name) {
        $sql = "UPDATE " . $this->table . " 
                SET name = ? 
                WHERE id = ?";

        $stmt = $this->getconexion()->prepare($sql);
        $stmt->bind_param("si", $name, $id);

        if ($stmt->execute()) {
            return "success";
        } else {
            return "error: " . $stmt->error;
        }
    }
}
