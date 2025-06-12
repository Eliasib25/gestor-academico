<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar profesor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div>
            <div class="text-start mt-4">
                <a href="../managmentTeacher.php" class="btn btn-secondary">Regresar</a>
            </div>
            <h2 class="text-center">Registrar profesor</h2>
            <p class="text-muted text-center">Aquí puedes registrar nuevos profesores para la institución.</p>
            <form class="w-50 mx-auto" action="../../../controllers/RegisterTeacherController.php" method="POST">
                <div class="mb-3">
                    <label for="identificationType" class="form-label"></label>Tipo de identificación</label>
                    <select class="form-select" id="identificationType" name="identificationType" required>
                        <option value="" disabled selected>Seleccione un tipo de identificación</option>
                        <option value="CC">Cédula de Ciudadanía</option>
                        <option value="CE">Cédula de Extranjería</option>
                        <option value="PA">Pasaporte</option>
                    </select>
                    <label for="identificationNumber" class="form-label">Número de identificación</label>
                    <input type="number" class="form-control" id="identificationNumber" name="identificationNumber" required>
                    <label for="name" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="name" name="names" required>
                    <label for="lastname" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="lastnames" name="lastnames" required>
                    <label for="dateBorn" class="form-label">Fecha de nacimiento</label>
                    <input type="date" class="form-control" id="dateBorn" name="dateBorn" required>
                    <label for="numberPhone" class="form-label">Número de teléfono</label>
                    <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" required>
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    <label for="confirmPassword" class="form-label">Confirmar contraseña</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-primary">Registrar profesor</button>
                </div>
            </form>

<script>
    document.querySelector("form").addEventListener("submit", function (e) {
        const password = document.getElementById("password").value;
        const confirmPassword = document.getElementById("confirmPassword").value;
        
        if (password !== confirmPassword) {
            e.preventDefault();
            alert("Las contraseñas no coinciden. Por favor, verifíquelas.");
        }
    } );
</script>

</body>
</html>