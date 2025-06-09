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

    $user = new User();
    $teacher = new Teacher();

    $role = "teacher";

    $resultTeacher = $teacher->searchTeacher($identificationNumber, $identificationType);

    switch ($resultTeacher) {
        case "teacherExist":
            echo "<script>alert('El profesor ya existe, dirijase al apartado de editar');
            window.location.href = '../views/viewscoordinator/managmentTeacher/registerTeacher.php';
            </script>";
            break;
        case "teacherNotFound":
             $resultUser = $user->searchOne($identificationNumber);

              if ($resultUser = "User not found") {
                $resultUser = $user->save(0, $identificationNumber, $password, $role);

                $userResult = $user->searchOne($identificationNumber);
                
                $userId= $userResult->fetch_assoc();

                $teacherResult = $teacher->save($identificationNumber, $identificationType, $names, $lastnames, $dateBorn, $phoneNumber, $email, $userId["id"]);

                if ($teacherResult == "success" && $resultUser == "success") {
                    echo "<script>
                    alert('Profesor registrado exitosamente');
                    window.location.href = '../views/viewscoordinator/managmentTeacher/registerTeacher.php';</script>";
                }

             } else {
                echo "<script>alert('El usuario ya existe');
                window.history.back();
                </script>";
             }
             break;
             default: 
                echo "<script>alert('Error desconocido');
                window.history.back();
                </script>";
    }

    





?>