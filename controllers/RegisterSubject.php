<?php
echo "Cargando controlador...<br>";
require_once(__DIR__ . "/../models/Grade.php");
require_once(__DIR__ . "/../models/Subject.php");

$gradeModel = new Grade();
$grades = $gradeModel->searchAll();
echo "Grados cargados: " . ($grades ? "sí" : "no") . "<br>";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["subjectName"] ?? null;
    $grados = $_POST["grades"] ?? [];

    echo "<pre>"; print_r($_POST); echo "</pre>";

    if ($nombre && !empty($grados)) {
        require_once(__DIR__ . "/../models/Subject.php");
        $subjectModel = new Subject();

        $subjectId = $subjectModel->save($nombre); 
        if ($subjectId) {
            $subjectModel->asignarGrados($subjectId, $grados);
            header("Location: /gestor-academico/views/viewscoordinator/managmentSubject/registerSubject.php");

            exit;
        } else {
            echo "<p style='color:red'> Error al guardar asignatura en la base de datos.</p>";
        }
    } else {
        echo "<p style='color:red'> Debes completar el nombre y seleccionar al menos un grado.</p>";
    }
}


include(__DIR__ . "/../views/viewscoordinator/managmentSubject/registerSubject.php");
