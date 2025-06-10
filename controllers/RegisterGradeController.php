<?php 

require_once("../models/Grade.php");

if (isset($_POST["registerGrade"])) {

    $gradeName = isset($_POST["gradeName"]) ? strtolower($_POST["gradeName"]) : "";
    $journey = isset($_POST["journey"]) ? $_POST["journey"] : "";
    $classroom = isset($_POST["classroom"]) ? strtolower($_POST["classroom"]) : "";

    $Grade = new Grade();
    $result = $Grade->save(0, $gradeName, $journey, $classroom);

    switch ($result) {
        case "success":
            echo "<script>alert('Grado registrado exitosamente');</script>";
            break;
        case "duplicate_grade":
            echo "<script>alert('Error: Ya existe un grado con el mismo nombre en esta jornada');</script>";
            break;
        case "duplicate_classroom":
            echo "<script>alert('Error: El salón ya está ocupado en esta jornada');</script>";
            break;
        default:
            echo "<script>alert('Error desconocido');</script>";
    }

    // Redirigir siempre al formulario
    echo "<script>window.location.href = '../views/viewscoordinator/managmentGrade/registerGrade.php';</script>";

}