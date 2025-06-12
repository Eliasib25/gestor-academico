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

    public function searchSubjectByGrade($gradeId) {
    $sql = "SELECT s.id, s.name FROM ". $this->table. " s JOIN subjectsgrades sg ON sg.subjects_id = s.id WHERE sg.grades_id = ?";
    $statement = $this->getconexion()->prepare($sql);
    $statement -> bind_param("i", $gradeId);
    if ($statement->execute()){
        $result = $statement->get_result();
        if ($result->num_rows > 0){
            return $result;
        } else {
            return "notSubjects";
        }  
    } else {
        return "error: ". $statement->error;
    }
    }

    public function getStudentScoresBySubject($gradesId) {
    // Obtener todas las asignaturas disponibles para el grado
    $sqlSubjects = "SELECT id, name FROM subjects";
    $stmtSubjects = $this->getconexion()->prepare($sqlSubjects);
    $stmtSubjects->execute();
    $resultSubjects = $stmtSubjects->get_result();

    // Verificar si hay asignaturas
    if ($resultSubjects->num_rows == 0) {
        return "No hay asignaturas registradas.";
    }

    // Generar dinámicamente los casos para cada asignatura
    $cases = '';
    $columns = [];
    while ($row = $resultSubjects->fetch_assoc()) {
        $subjectId = $row['id'];
        $subjectName = strtolower($row['name']);  // Usamos el nombre de la asignatura en minúsculas como alias dinámico
        $cases .= "MAX(CASE WHEN sb.id = $subjectId THEN n.score END) AS $subjectName, ";
        $columns[] = $subjectName; // Guardamos el nombre de la asignatura para mostrar después
    }

    // Eliminar la última coma y espacio extra
    $cases = rtrim($cases, ', ');

    // Construir la consulta final
    $sql = "
    SELECT 
        st.identification,
        st.name,
        st.lastname,
        $cases
    FROM students st
    JOIN notes n ON st.identification = n.students_identification
    JOIN subjects sb ON n.subjects_id = sb.id
    JOIN subjectsgrades sg ON sb.id = sg.subjects_id
    WHERE st.gradesId = ? AND sg.grades_id = ?
    GROUP BY st.identification, st.name, st.lastname;
    ";

    // Preparar la consulta
    $stmt = $this->getconexion()->prepare($sql);
    if ($stmt === false) {
        return "Error en la preparación de la consulta: " . $this->getconexion()->error;
    }

    // Vincular los parámetros (gradesId)
    $stmt->bind_param("ii", $gradesId, $gradesId);

    // Ejecutar la consulta
    $stmt->execute();
    $result = $stmt->get_result();

    // Comprobar si hay resultados
    if ($result->num_rows > 0) {
        // Crear un array con los resultados
        $studentsScores = [];
        while ($row = $result->fetch_assoc()) {
            // Guardar los resultados de cada estudiante
            $studentsScores[] = $row;
        }
        return $studentsScores;
    } else {
        return "No se encontraron resultados para el grado especificado.";
    }
    }


}
