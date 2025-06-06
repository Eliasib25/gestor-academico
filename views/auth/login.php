<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center mb-4">Inicio de sesión</h2>
        <form class="w-50 mx-auto" action="../../controllers/AuthController.php" method="POST" id="loginForm">
            <div class="mb-3">
                <label for="usuario">Usuario</label>
                <input type="text" name="user" id="user" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="contraseña">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary" name="login" value="login">Iniciar sesión</button>
        </form>
    </div>
</body>
</html>
