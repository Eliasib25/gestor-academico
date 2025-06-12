<?php 

require_once("../models/Note.php");
require_once("../models/Student.php");

$score = isset($_POST["score"]) ? $_POST["score"] : "";
$studentIdentification = isset($_POST["studentIdentification"]) ? $_POST["studentIdentification"] : "";
$subjectID = isset($_POST["subjectID"]) ? $_POST["subjectID"] : "";

$note = new Note();
$student = new Student();

// Buscar el estudiante
$result = $student->searchOne($studentIdentification);

if ($result == "studentNotFound") {
    // Si el estudiante no existe
    echo "<script>alert('El estudiante no existe');
    window.location.href='../views/viewteacher/managmentNote/registerNote.php';</script>";
} else {
    // Verificar si ya existe una nota registrada para este estudiante y asignatura
    $noteResult = $note->searchOneNote($studentIdentification, $subjectID);

    if ($noteResult == "noteExists") {
        // Si la nota ya existe, la actualizamos
        $updateResult = $note->updateNote($score, $studentIdentification, $subjectID);
        if ($updateResult == "success") {
            echo "<script>alert('Nota actualizada exitosamente');</script>";
        } else {
            echo "<script>alert('Error al actualizar la nota');</script>";
        }
    } else {
        // Si la nota no existe, la guardamos
        $saveResult = $note->save($score, $studentIdentification, $subjectID);
        if ($saveResult == "success") {
            echo "<script>alert('Nota registrada exitosamente');</script>";
        } else {
            echo "<script>alert('No se ha podido registrar la nota');</script>";
        }
    }

    // Redirigir después de registrar o actualizar la nota
    echo "<script>window.location.href = '../views/viewsteacher/managmentNote/registerNote.php';</script>";
}
?>
