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
        <p class="text-muted">Aquí puedes gestionar las actividades de los profesores y alumnos.</p>
        <div class="mt-4">
            <h3>Opciones disponibles:</h3>
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="manage_teachers.php" class="text-decoration-none">Gestionar profesores</a>
                </li>
                <li class="list-group-item">
                    <a href="manage_students.php" class="text-decoration-none">Gestionar alumnos</a>
                </li>
                <li class="list-group-item">
                    <a href="view_reports.php" class="text-decoration-none">Ver informes</a>
                </li>
                <li class="list-group-item">
                    <a href="settings.php" class="text-decoration-none">Configuración</a>
                </li>
                <li class="list-group-item">
                    <a href="../../controllers/AuthController.php?logout=true" class="text-decoration-none">Cerrar sesión</a>
                </li>
            </ul>
    </div>

</body>
</html>