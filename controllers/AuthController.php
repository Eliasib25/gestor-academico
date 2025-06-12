<?php 

    require_once("../models/User.php");

    if(isset($_POST["login"])){
        $user = isset($_POST["user"]) ? $_POST["user"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";
        
        $User = new User();
        $result = $User->Login($user, $password);
        if($result !== null){
            $result = $result->fetch_assoc();
            session_start();
            $_SESSION["user"] = $result["user"]; 
            $_SESSION["role"] = $result["role"];
            $_SESSION["id"] = $result["id"];

            if($result["role"] == "teacher"){

                require_once("../models/Teacher.php");

                $teacher = new Teacher();

                $result = $teacher->searchGradeTeacher($_SESSION["id"]);

               if (is_string($result)){
                   echo "<script>alert($result)</script>";
                } else {
                    $_SESSION['gradesId'] = $result["grades_id"] ;   
                }

                header("Location: ../views/dashboard/teacher.php");

                
    
            } else if($result["role"] == "coordinator"){
                header("Location: ../views/dashboard/coordinator.php");
            } else if($result["role"] == "secretary"){
               header("Location: ../views/viewsecretary/managmentStudent.php");
               
            }
        } else {
            echo "<script>alert('Usuario o contraseña incorrectos');</script>";
            echo "<script>window.location.href = '../views/auth/login.php';</script>";
        }

    }

?>