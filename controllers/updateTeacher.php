<?php
require_once '../models/Teacher.php';

$teacher = new Teacher();

$identificationNumber = $_POST['identification'];
$userId = $teacher->obtenerUserId($identificationNumber);

if ($userId !== null) {
    $teacher->updateTeacher(
        $identificationNumber,
        $_POST['identificationType'],
        $_POST['name'],
        $_POST['lastname'],
        $_POST['dateBorn'],
        $_POST['phone'],
        $_POST['email'],
        $userId
    );
}

header('Location: ../views/viewscoordinator/managmentTeacher/listTeacher.php');
exit;
