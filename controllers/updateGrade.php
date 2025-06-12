<?php
require_once(__DIR__ . '/../models/Grade.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $journey = $_POST['journey'];
    $classroom = $_POST['classroom'];

    $gradeModel = new Grade();
    $result = $gradeModel->updateGrade($id, $name, $journey, $classroom);

    if ($result === "duplicate_classroom") {
        header('Location: ../views/viewscoordinator/managmentGrade/editGrade.php?id=' . $id . '&error=aula_ocupada');
        exit;
    }

    header('Location: ../views/viewscoordinator/managmentGrade/listGrade.php?success=1');
    exit;
}
