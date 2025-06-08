<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard coordinador</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="container mt-5"> 
        <h2 class="">Bienvenido coordinador <?php echo $_SESSION["user"];  ?> </h2>
        <p class="text-muted">Aquí puedes gestionar todas las funcionalidades de tu rol</p>
        <div class="mt-4">
            <h3>Opciones disponibles:</h3>
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="../viewscoordinator/managmentGrade.php" class="text-decoration-none">Gestionar grados</a>
                </li>
                <li class="list-group-item">
                    <a href="../viewscoordinator/managmentSubjects.php" class="text-decoration-none">Gestionar asignaturas</a>
                </li>
                <li class="list-group-item">
                    <a href="../viewscoordinator/managmentTeacher.php" class="text-decoration-none">Gestionar profesores</a>
                </li>
                <li class="list-group-item">
                    <a href="../viewscoordinator/managmentStudent.php" class="text-decoration-none">Gestionar estudiantes</a>
                </li>
            </ul>
            <button class="btn btn-danger mt-3" onclick="window.location.href='../auth/login.php'">Cerrar sesión</button>
    </div>

</body>
</html>