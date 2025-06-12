<?php
require_once(__DIR__ . '/../models/Student.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identification = $_POST['identification'];
    $identificationType = $_POST['identificationType'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $dateBorn = $_POST['dateBorn'];
    $address = $_POST['address'];
    $identificationTypeAttendant = $_POST['identificationTypeAttendant'];
    $identificationAttendant = $_POST['identificationAttendant'];
    $nameAttendant = $_POST['nameAttendant'];
    $lastnameAttendant = $_POST['lastnameAttendant'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $gradesId = $_POST['gradesId'];

    $studentModel = new Student();
    $studentModel->updateStudent(
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

    header('Location: ../views/viewscoordinator/managmentStudent/listStudent.php');
    exit;
}
