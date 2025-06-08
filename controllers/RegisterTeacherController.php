<?php 

    require_once("../models/Teacher.php");
    require_once("../models/User.php");


    $identificationType = isset($_POST["identificationType"]) ? $_POST["identificationType"] : "";
    $identificationNumber = isset($_POST["identificationNumber"]) ? $_POST["identificationNumber"] :
        "";
    $names = isset($_POST["names"]) ? $_POST["names"] : "";
    $lastnames = isset($_POST["lastnames"]) ? $_POST["lastnames"] : "";
    $dateBorn = isset($_POST["dateBorn"]) ? $_POST["dateBorn"] : "";
    $phoneNumber = isset($_POST["phoneNumber"]) ? $_POST["phoneNumber"] : ""; 
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $confirmPassword = isset($_POST["confirmPassword"]) ? $_POST["confirmPassword"] : "";

    $user = new User();
    $teacher = new Teacher();

    $role = "teacher";

    





?>