<?php
require_once(__DIR__ . '/../models/Grade.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $journey = $_POST['journey'];
    $classroom = $_POST['classroom'];

    $gradeModel = new Grade();
    $gradeModel->updateGrade($id, $name, $journey, $classroom);

    header('Location: ../views/viewscoordinator/managmentGrade/listGrade.php');
    exit;
}
