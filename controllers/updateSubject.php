<?php
require_once("../models/Subject.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subjectId = $_POST['subjectId'];
    $subjectName = $_POST['subjectName'];

    $subject = new Subject();
    $result = $subject->updateSubject($subjectId, $subjectName);


    header("Location: ../views/viewscoordinator/managmentSubject/listSubject.php");

    exit;
}
?>
