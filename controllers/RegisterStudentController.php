<?php

require_once("../models/Student.php");

$identification = isset($_POST["studentID"]) ? $_POST["studentID"] :"";
$identificationType = isset($_POST["identificationType"]) ? $_POST["identificationType"] :"";
$name = isset($_POST["name"]) ? $_POST["name"] :"";
$lastname = isset($_POST["lastName"]) ? $_POST["lastName"] :"";
$dateBorn = isset($_POST["dateBorn"]) ? $_POST["dateBorn"] :"";
$address = isset($_POST["address"]) ? $_POST["address"] :"";
$identificationTypeAttendant = isset($_POST["identificationTypeAttendant"]) ? $_POST["identificationTypeAttendant"] :"";
$identificationAttendant = isset($_POST["attendantId"]) ? $_POST["attendantId"] :"";
$nameAttendant = isset($_POST["attendantName"]) ? $_POST["attendantName"] :"";
$lastnameAttendant = isset($_POST["attendantLastName"]) ? $_POST["attendantLastName"] :"";
$phone = isset($_POST["attendantPhone"]) ? $_POST["attendantPhone"] :"";
$email = isset($_POST["attendantEmail"]) ? $_POST["attendantEmail"] :"";
$gradesId = isset($_POST["grade"]) ? $_POST["grade"] :"";


$student = new Student();

$result = $student->searchOne($identification);

 if ($result == "userNotFound"){
    $resultStudent = $student->register(
        $identification, $identificationType, $name, $lastname, $dateBorn, $address, $identificationTypeAttendant, $identificationAttendant, $nameAttendant, $lastnameAttendant, $phone, $email, $gradesId
    );

    if ($resultStudent == "success"){
        echo "<script>alert('El estudiante fue registrado exitosamente');
        window.location.href='../views/viewscoordinator/managmentStudent/registerStudent.php'</script>";
    } else {
        echo "<script>alert('$resultStudent')</script>";
    }
} else {
    echo "<script>alert('El estudiante ya existe, pruebe editarlo en el apartado de editar estudiante');
    window.location.href= '../views/viewscoordinator/managmentStudent/registerStudent.php'</script>";
}


?>