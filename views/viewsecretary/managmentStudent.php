<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión estudiantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div>
            <h2 class="">Bienvenido secretaria <?php echo $_SESSION["user"];  ?> </h2>
            <p class="text-muted">Aquí puedes gestionar todas las funcionalidades de tu rol</p>
            <h2 class="text-center">Gestión de estudiantes</h2>
            <p class="text-muted text-center">Aquí puedes gestionar los estudiantes de la institución</p>
            <div class="mt-4 w-50 mx-auto">
                <h3>Opciones disponibles:</h3>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="managmentStudent/registerStudent.php" class="text-decoration-none">Registrar estudiante</a>
                    </li>
                    <li class="list-group-item">
                        <a href="managmentStudent/academicLoad.php" class="text-decoration-none">Listado de estudiantes</a> 
                    </li>
                </ul>
                <button class="btn btn-danger mt-3" onclick="window.location.href='../auth/login.php'">Cerrar sesión</button>
            </div>
        </div>
    </div>
</body>
</html>