<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar estudiante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div>
            <div class="text-start mt-4">
                <a href="../managmentStudent.php" class="btn btn-secondary">Regresar</a>
            </div>
            <h2 class="text-center">Registrar nuevo estudiante</h2>
            <p class="text-muted text-center">Completa el formulario para registrar un nuevo estudiante</p>
            <form class="w-50 mx-auto" action="../../controllers/StudentController.php" method="POST">
                <h4 class="text-center">Datos del estudiante</h4>
                <div class="mb-3">
                    <label for="identificationType" class="form-label">Tipo identificación</label>
                    <div class="input-group">
                        <select class="form-select" id="identificationType" name="identificationType" required>
                            <option value="" disabled selected>Seleccione un tipo de identificación</option>
                            <option value="CC">Cédula de Ciudadanía</option>
                            <option value="TI">Tarjeta de Identidad</option>
                            <option value="CE">Cédula de Extranjería</option>
                        </select>
                </div>
                </div>
                <div class="mb-3">
                    <label for="studentName" class="form-label">Número de identificación</label>
                    <input type="text" class="form-control" id="studentId" name="studentID" required>
                </div>
                <div class="mb-3">
                    <label for="nameStudent" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" required>
                </div>
                <div class="mb-3">
                    <label for="dateBorn" class="form-lable">Fecha de nacimiento</label>
                    <input type="date" class="form-control" id="dateBorn" name="dateBorn" required>
                </div>
                <div class="mb-3">
                    <label for="direction" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="direction" name="direction" required>
                </div>
                <div class="mb-3">
                    <label for="grade" class="form-label">Grado a cursar</label>
                    <select class="form-select" id="grade" name="grade" required>
                        <option value="" disabled selected>Seleccione un grado</option>
                        <?php
                        // Aquí va el código para obtener la lista de grados desde la base de datos
                        ?>
                        <option value="1">Grado 1</option>
                        <option value="2">Grado 2</option>
                        <option value="3">Grado 3</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Foto estudiante</label>
                    <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required>
                </div>

                <h4 class="text-center">Datos del acudiente</h4>
                <div class="mb-3">
                    <label for="identificationTypeAttendant" class="form-label">Tipo de identificación</label>
                    <div class="input-group">
                        <select class="form-select" id="identificationTypeAttendant" name="identificationTypeAttendant" required>
                            <option value="" disabled selected>Seleccione un tipo de identificación</option>
                            <option value="CC">Cédula de Ciudadanía</option>
                            <option value="TI">Tarjeta de Identidad</option>
                            <option value="CE">Cédula de Extranjería</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="attendantId" class="form-label">Número de identificación</label>
                    <input type="number" class="form-control" id="attendantId" name="attendantId" required>
                </div>
                <div class="mb-3">
                    <label for="attendantName" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="attendantName" name="attendantName" required>
                </div>
                <div class="mb-3">
                    <label for="attendantLastName" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="attendantLastName" name="attendantLastName" required>
                </div>
                <div class="mb-3">
                    <label for="attendantPhone" class="form-label">Télefono</label>
                    <input type="number" class="form-control" id="attendantPhone" name="attendantPhone" required>
                </div>
                <div class="mb-3">
                    <label for="attendantEmail" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="attendantEmail" name="attendantEmail" required>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-primary">Registrar estudiante</button>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>