<?php 

require_once("../models/Teacher.php");

$teacher = isset($_POST["teacher"]) ? $_POST["teacher"] : "";
$gradeId = isset($_POST["grade"]) ? $_POST["grade"] : "";

list($identificationTeacher, $identificationTypeTeacher) = explode("-", $teacher);

$Teacher = new Teacher();

$result = $Teacher->assignAcademicLoad($identificationTeacher, $identificationTypeTeacher, $gradeId);

if ($result == "existGrade"){
    echo "<script>alert('Ya hay un profesor asignado a ese grado');
    window.history.back()</script>";
} else if ($result == "success") {
    echo "<script>alert('Se asignó la carga academica satisfactoriamente');
    window.location.href = '../views/viewscoordinator/managmentTeacher/academicLoad.php';
    </script>" ;
} else {
    echo "<script>alert('Ocurrió un error: $result')</script>";
}





?>