<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carga académica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div>
            <div class="text-start mt-4">
                <a href="../managmentTeacher.php" class="btn btn-secondary">Regresar</a>
            </div>
            <h2 class="text-center">Asignar carga académica</h2>
            <p class="text-muted text-center">Aquí puedes asignar la carga académica a los profesores.</p>
            <form class="w-50 mx-auto" action="../../controllers/AcademicLoadController.php" method="POST">
                <div class="mb-3">
                    <label for="teacherId" class="form-label">Seleccionar profesor</label>
                    <select class="form-select" id="teacherId" name="teacherId" required>
                        <option value="" disabled selected>Seleccione un profesor</option>
                        <?php
                        //Aquí va el código para obtener la lista de profesores desde la base de datos
                        ?>
                        <option value="1">Profesor 1</option>
                        <option value="2">Profesor 2</option>
                        <option value="3">Profesor 3</option>
                    </select>
                    <label for="grade" class="form-label">Grado</label>
                    <select class="form-select" id="grade" name="grade" required>
                        <option value="" disabled selected>Seleccione un grado</option>
                        <?php
                        //Aquí va el código para obtener la lista de grados desde la base de datos
                        ?>
                        <option value="1">Grado 1</option>
                        <option value="2">Grado 2</option>
                        <option value="3">Grado 3</option>
                    </select>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-primary">Asignar carga académica</button>
                </div>
        </form>
    
</body>
</html>